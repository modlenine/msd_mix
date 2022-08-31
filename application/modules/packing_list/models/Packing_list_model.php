<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_list_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Bangkok");
        $this->db5 = $this->load->database("mssql_prodplan_test" , true);
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
            WHERE a.prodtransrefid = '$productionId' and a.dataareaid = '$areaid' ORDER BY recid DESC
            ");

            if($sql->num_rows() != 0){
                $mainData = $sql->row();

                $sql_package = $this->db5->query("SELECT 
                a.slc_packageid ,
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
            if($sql_package->num_rows() != 0){
                $package_number = $sql_package->row()->slc_packageid;
                $package_text = $sql_package->row()->packagetxt;
                $package_containweight = $sql_package->row()->containweight;
                $qtysched = $sql_package->row()->qtysched;
                $dlvdate = conDateFromDb($sql_package->row()->dlvdate);
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
            if($sqlGetPhoto->num_rows() != 0){
                $photoattach = "Yes";
                $photoattach_list = $sqlGetPhoto->result();
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
                "photo_attach_list" => $photoattach_list,
                "stickerLabel" => $stickerLabel,
                "pallet_detail" => $palletDetail,
                "deliverydate" => $dlvdate
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
                    "photo_attach_list" => null,
                    "stickerLabel" => null,
                    "pallet_detail" => null,
                    "deliverydate" => null
                );
            }






        }
        echo json_encode($output);
    }
    
    

}

/* End of file ModelName.php */


?>