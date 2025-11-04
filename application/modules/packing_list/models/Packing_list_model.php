<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_list_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Bangkok");
        $this->db5 = $this->load->database("mssql_prodplan" , true);
    }

    public function testcode()
    {
        echo "test code";
    }

    public function loadDataPackinglist()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDataPackinglist"){

            $productionId = $received_data->productionId;
            $areaid = $received_data->areaid;

            $mainData = "";
            $slcpackingtransrefid = "";

            $sqlFrist = $this->db5->query("SELECT slc_packingtransrefid FROM prodtable WHERE prodid = '$productionId' AND dataareaid ='$areaid' ");

            if($sqlFrist->num_rows() != 0){
                $slcpackingtransrefid = $sqlFrist->row()->slc_packingtransrefid;

                    $sql = $this->db5->query("SELECT TOP 1
                    a.packinglistid,
                    a.custaccount,
                    a.palletid,
                    a.packageremark,
                    a.itemid,
                    a.isneedcoa,
                    a.isstandardlabel,
                    a.filenametype,
                    a.filename,
                    a.filepath,
                    a.packingtransrefid,
                    a.doctransrefid,
                    a.refrecid,
                    a.prodtransrefid,
                    a.dataareaid,
                    a.recid
                FROM slc_packinglisttableused a
                WHERE a.prodtransrefid = '$productionId' and a.dataareaid = '$areaid' and packingtransrefid = '$slcpackingtransrefid' ORDER BY recid DESC
                ");

                if($sql->num_rows() != 0){
                    $mainData = $sql->row();

                    $sql_package = $this->db5->query("SELECT 
                    a.slc_packageid ,
                    a.slc_packinglistidused,
                    b.packagetxt,
                    b.containweight,
                    a.qtysched,
                    a.dlvdate,
                    a.qtystup
                FROM prodtable a
                left join slc_packagespc b on a.slc_packageid = b.packageid
                where a.slc_packingtransrefid = '$mainData->packingtransrefid' and b.dataareaid = '$mainData->dataareaid'
                ");

                    $package_number = "";
                    $package_text = "";
                    $packinglistid = "";
                    if($sql_package->num_rows() != 0){
                        $package_number = $sql_package->row()->slc_packageid;
                        $package_text = $sql_package->row()->packagetxt;
                        $package_containweight = $sql_package->row()->containweight;
                        $qtysched = $sql_package->row()->qtysched;
                        $dlvdate = conDateFromDb($sql_package->row()->dlvdate);
                        $packinglistid = $sql_package->row()->slc_packinglistidused;
                    }

                    // Check File attach
                    $fileattach = "";
                    $fileattach_list = "";
                    if($mainData->filename == "" || $mainData->filename == null){
                        $fileattach = "No";
                    }else{
                        $fileattach = "Yes";
                        $fileattach_list = array(
                            $mainData->filename,
                            $mainData->filepath,
                            $mainData->filenametype
                        );
                    }
                    // Check File attach


                    // Query Photo
                    $sqlGetPhoto = $this->db5->query("SELECT 
                        packinglistid
                        ,filenametype
                        ,filename
                        ,filepath
                        ,packingtransrefid
                        ,dataareaid
                        ,recid
                    FROM slc_packinglistphotoused
                    where packingtransrefid = '$mainData->packingtransrefid' and dataareaid = '$mainData->dataareaid'");

                    // Check Photo
                    $photoattach = "";
                    $photoattach_list = "";
                    $photoPath = "";
                    $photoListNew = [];
                    if($sqlGetPhoto->num_rows() != 0){
                        $photoattach = "Yes";
                        $photoattach_list = $sqlGetPhoto->result();
                        $photoPath = $sqlGetPhoto->row()->filepath;

                        $cutPath = substr($photoPath , 2);
                        $conPath = str_replace('\\', '/', $cutPath);

                        foreach($sqlGetPhoto->result() as $rs){
                            $photoName = $rs->filename.$rs->filenametype;
                            $photoUse = base_url('packing_list/loadPhoto').$conPath.$photoName;
                            array_push($photoListNew , $photoUse);
                        }
                    }else{
                        $photoattach = "No";
                    }
                    // Query Photo





                    // Query Sticker label
                    $sqlGetStickerLabel = $this->db5->query("SELECT 
                        packinglabelfieldid,
                        packinglabeltext,
                        linenum,
                        packingtransrefid
                    FROM slc_packinglistlabeltransused
                    WHERE packingtransrefid = '$mainData->packingtransrefid' and dataareaid = '$mainData->dataareaid' ORDER BY linenum ASC
                    ");

                    $stickerLabel = "";
                    if($sqlGetStickerLabel->num_rows() != 0){
                        $stickerLabel = $sqlGetStickerLabel->result();
                    }
                    // Query Sticker label


                    // Query Pallet Detail
                    $sqlGetPalletDetail = $this->db5->query("SELECT 
                        palletid,
                        palletdesc,
                        pallettype,
                        palletsort,
                        palletcondition,
                        stretchhood,
                        labelpallet,
                        palletwrap,
                        palletcontainerweight,
                        packinglistid,
                        packingtransrefid
                    FROM slc_pallettableused
                    WHERE packingtransrefid = '$mainData->packingtransrefid' and dataareaid = '$mainData->dataareaid'
                    ");
                    $palletD = "";
                    if($sqlGetPalletDetail->num_rows() != 0){
                        $palletDetail = $sqlGetPalletDetail->row();
                    }
                    // Query Pallet Detail


                    //Query Master picture
                    $queryMasterPicture = $this->db5->query("SELECT
                        packinglistid,
                        filenametype,
                        filename,
                        filepath
                        FROM slc_packinglistphoto
                        WHERE packinglistid = ? AND dataareaid = ?
                    " , array($packinglistid , $mainData->dataareaid));

                    $output = array(
                        "msg" => "ดึงข้อมูลสำเร็จ",
                        "status" => "Select Data Succes",
                        "package_number" => $package_number,
                        "package_text" => $package_text,
                        "package_containweight" => $package_containweight,
                        "qtysched" => $qtysched,
                        "packing_list_remark" => $mainData->packageremark,
                        "need_coa" => $mainData->isneedcoa,
                        "standard_label" => $mainData->isstandardlabel,
                        "file_attach" => $fileattach,
                        "file_attach_list" => $fileattach_list,
                        "photo_attach" => $photoattach,
                        "photo_attach_list_master" => $queryMasterPicture->result(),
                        "photo_attach_list" => $photoattach_list,
                        "stickerLabel" => $stickerLabel,
                        "pallet_detail" => $palletDetail,
                        "deliverydate" => $dlvdate,
                        "photoUse" => $photoListNew
                    );

                }else{
                    $output = array(
                        "msg" => "ดึงข้อมูลสำเร็จ",
                        "status" => "Select Data Succes",
                        "package_number" => null,
                        "package_text" => null,
                        "package_containweight" => null,
                        "qtysched" => null,
                        "packing_list_remark" => null,
                        "need_coa" => null,
                        "standard_label" => null,
                        "file_attach" => null,
                        "file_attach_list" => null,
                        "photo_attach" => null,
                        "photo_attach_list_master" => null,
                        "photo_attach_list" => null,
                        "stickerLabel" => null,
                        "pallet_detail" => null,
                        "deliverydate" => null
                    );
                }
            }else{
                $output = array(
                    "msg" => "ดึงข้อมูลไม่สำเร็จ",
                    "status" => "Select Data Succes",
                    "package_number" => null,
                    "package_text" => null,
                    "package_containweight" => null,
                    "qtysched" => null,
                    "packing_list_remark" => null,
                    "need_coa" => null,
                    "standard_label" => null,
                    "file_attach" => null,
                    "file_attach_list" => null,
                    "photo_attach" => null,
                    "photo_attach_list_master" => null,
                    "photo_attach_list" => null,
                    "stickerLabel" => null,
                    "pallet_detail" => null,
                    "deliverydate" => null
                );
            }
        }
        echo json_encode($output);
    }

    

    public function loadPhoto($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoPath6 , $photoName)
    {
        $ftpPath = "ftp://ant:Ant1234@192.168.10.56:821/$photoPath1/$photoPath2/$photoPath3/$photoPath4/$photoPath5/$photoPath6/$photoName";
        $data = @file_get_contents($ftpPath);
        if($data === false){
            header('HTTP/1.1 404 Not Found');
            exit;
        }

        $img = @imagecreatefromstring($data);
        if($img === false){
            header('Content-Type: image/jpeg');
            echo $data;
            return;
        }

        // Rotate left (counterclockwise) 90 degrees
        $rotated = @imagerotate($img, 0, 0);
        if($rotated){
            imagedestroy($img);
            $img = $rotated;
        }

        header('Content-Type: image/jpeg');
        imagejpeg($img, null, 90);
        imagedestroy($img);
    }


    public function loadPhotoMaster($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoName)
    {
        $ftpPath = "ftp://ant:Ant1234@192.168.10.56:821/$photoPath1/$photoPath2/$photoPath3/$photoPath4/$photoPath5/$photoName";
        $data = @file_get_contents($ftpPath);
        if($data === false){
            header('HTTP/1.1 404 Not Found');
            exit;
        }

        $img = @imagecreatefromstring($data);
        if($img === false){
            header('Content-Type: image/jpeg');
            echo $data;
            return;
        }

        // Rotate left (counterclockwise) 90 degrees
        $rotated = @imagerotate($img, 0, 0);
        if($rotated){
            imagedestroy($img);
            $img = $rotated;
        }

        header('Content-Type: image/jpeg');
        imagejpeg($img, null, 90);
        imagedestroy($img);
    }


    public function loadFile($filePath1 , $filePath2 , $filePath3 , $filePath4 , $filePath5 , $filePath6 , $fileName)
    {
        header('Content-type: application/pdf'); 
        readfile("ftp://ant:Ant1234@192.168.10.56:821/$filePath1/$filePath2/$filePath3/$filePath4/$filePath5/$filePath6/$fileName");
    }
    

}

/* End of file ModelName.php */


?>
