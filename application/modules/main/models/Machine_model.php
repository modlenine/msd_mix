<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class machine_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->db4 = $this->load->database("mssql_prodplan", true);
    }

    public function loadItemidFormTable()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg')
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA" class="itemidA"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function loadItemidFormTable2()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable2"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg') 
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl2">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA2" class="itemidA2"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi2">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function loadItemidFormTable3()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable3"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg') 
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl3">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA3" class="itemidA3"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi3">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function loadItemidFormTable_mdv()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable_mdv"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg') 
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl_mdv">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA_mdv" class="itemidA_mdv"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi_mdv">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function loadItemidFormTable_mdve()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable_mdve"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg') 
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl_mdve">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA_mdve" class="itemidA_mdve"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi_mdve">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function loadItemidFormTable_mdve2()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemidFormTable_mdve2"){
            $itemNumber = $received_data->itemNumber;
            $sql = $this->db4->query("SELECT TOP 50
                itemid 
            FROM
                inventtable WHERE itemid LIKE '%$itemNumber%' AND batchnumgroupid in ('rm' , 'fg') 
            GROUP BY
                itemid 
            ORDER BY
                itemid ASC");

            $output = '';
            $output .= '<ul class="list-group itemidUl_mdve2">';
                foreach ($sql->result() as $rs) {
            
                    $output .= '
                    <a href="javascript:void(0)" id="itemidA_mdve2" class="itemidA_mdve2"
                        data_itemid = "'.$rs->itemid.'"
                    ><li class="list-group-item mb-1 itemidLi_mdve2">
                    <span>' . $rs->itemid . '</span><br>
                    </li></a>
                ';
                }
            $output .= '</ul>';
            $result = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "outputHtml" => $output
            );
        }else{
            $result = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($result);
    }
    public function saveTemplate()
    {
        if($this->input->post("templateName") != "" &&
        $this->input->post("temperature") != ""
        ){
            // Save Detail Table
            $date = date_create();
            $dateTimeStamp = date_timestamp_get($date);

            $fileInput = "templatePicture";
            $this->saveMasterTable($fileInput , $dateTimeStamp);
            $this->saveDetailsTable($dateTimeStamp);

            $templatename = $this->input->post("templateName");
            
            $output = array(
                "msg" => "สร้าง Template สำเร็จ",
                "status" => "Insert Data Success"
            );
        }else{
            $output = array(
                "msg" => "สร้าง Template ไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }

        echo json_encode($output);
    }
    private function saveMasterTable($fileInput , $dateTimeStamp)
    {
        $imageFile = uploadImageTemplate($fileInput);
        $yearNow = date("Y");
        $dateNow = date("Y-m-d");
        $imagePath = "uploads/template_images/".$yearNow."/".$dateNow."/";

        if($imageFile != null){
            $rsImageFile = $imageFile;
            $rsImagePath = $imagePath;
            $imageStatus = "yes";
        }else{

            if($this->input->post("choiceTemplates") == "new"){
                $rsImageFile = "noimage2.jpg";
                $rsImagePath = "uploads/";
                $imageStatus = "no";
            }else if($this->input->post("choiceTemplates") == "copy"){

                $rsImagePath = $this->input->post("templatePicturePath_o");
                

                if($this->input->post("templatePicture_o") != "noimage2.jpg"){
                    
                    $imageOld = $this->input->post("templatePicture_o");
                    $rsImageFile = "copy-".getRuningCode(9)."-".$this->input->post("templatePicture_o");
                    $imageStatus = "yes";

                    $pathSource = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$rsImagePath.$imageOld;
                    $pathDestination = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$rsImagePath.$rsImageFile;
                    // Copy Image
                    copy($pathSource , $pathDestination);
                }else{
                    $imageStatus = "no";
                    $rsImageFile = $this->input->post("templatePicture_o");
                }

                
                
                
            }
            
        }

        //Upload the template other image
        $fileInput = "t_otherImage";
        uploadTemplateOtherImage($fileInput , $dateTimeStamp);


            $arInsertTemplate = array(
                "master_temcode" => $dateTimeStamp,
                "master_name" => $this->input->post("templateName"),
                "master_itemnumber" => $this->input->post("itemNumber"),
                "master_temperature" => $this->input->post("temperature"),
                "master_image" => $rsImageFile,
                "master_imagePath" => $rsImagePath,
                "master_imagestatus" => $imageStatus,
                "master_user" => getUser()->Fname." ".getUser()->Lname,
                "master_ecode" => getUser()->ecode,
                "master_deptcode" => getUser()->DeptCode,
                "master_datetime" => date("Y-m-d H:i:s"),
                "master_remark" => $this->input->post("t_remark")
            );
            $this->db->insert("template_master" , $arInsertTemplate);
    }
    private function saveDetailsTable($dateTimeStamp)
    {
        // Insert Item Sequence
        $itemSequenceInput = $this->input->post("itemSequenceInput");
        $itemLinenum = 1;
        $stepLinenum = 1;
        
        foreach($itemSequenceInput as $itemSequenceInputs){
            $arInsertItem = array(
                "detail_mastercode" => $dateTimeStamp,
                "detail_column_name" => "item sequence",
                "detail_name" => $itemSequenceInputs,
                "detail_linenum" => $itemLinenum,
                "detail_user" => getUser()->Fname." ".getUser()->Lname,
                "detail_ecode" => getUser()->ecode,
                "detail_deptcode" => getUser()->DeptCode,
                "detail_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->insert("template_details" , $arInsertItem);
            $itemLinenum++;
        }


        // Insert Step Sequence
        $stepSequence = $this->input->post("stepSequence_input");
        foreach($stepSequence as $key => $value){
            $arInsertStepSequence = array(
                "detail_mastercode" => $dateTimeStamp,
                "detail_column_name" => "step sequence",
                "detail_name" => strtoupper($value),
                "detail_linenum" => $stepLinenum,
                "detail_user" => getUser()->Fname." ".getUser()->Lname,
                "detail_ecode" => getUser()->ecode,
                "detail_deptcode" => getUser()->DeptCode,
                "detail_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->insert("template_details" , $arInsertStepSequence);
            $stepLinenum++;
        }
    }



    // Template Zone
    public function loadTemplateList()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        $template = [];
        $deptcode = "";
        if(getUser()->DeptCode == 1015 || getUser()->DeptCode == 1014){
            $deptcode = "AND master_deptcode IN (1015,1014)";
        }else{
            $deptcodeDefault = getUser()->DeptCode;
            $deptcode = "AND master_deptcode = '$deptcodeDefault'";
        }
         if($received_data->action == "loadTemplateList"){
            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_temperature,
            template_master.master_image,
            template_master.master_imagePath,
            template_master.master_user,
            template_master.master_ecode,
            template_master.master_deptcode,
            template_master.master_datetime,
            template_master.master_remark
            FROM
            template_master
            WHERE master_name LIKE '%$received_data->searchTemplate%' $deptcode
            ORDER BY template_master.master_autoid DESC LIMIT 50");

            foreach($sql->result() as $rs){
                $result = array(
                    "master_autoid" => $rs->master_autoid,
                    "master_temcode" => $rs->master_temcode,
                    "master_name" => $rs->master_name,
                    "master_itemnumber" => $rs->master_itemnumber,
                    "master_temperature" => $rs->master_temperature,
                    "master_image" => $rs->master_image,
                    "master_imagePath" => $rs->master_imagePath,
                    "master_memo" => $rs->master_remark
                );
                $template[] = $result;
            }

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "getTemplate" => $template,
                "ecode" => getUser()->DeptCode
            );
            

         }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "getTemplate" => null
            );
         }
         echo json_encode($output);
    }

    public function saveEditTemplate()
    {
        if($this->input->post("templateName_edit") != ""){
            // Save Detail Table
            $master_temcode = $this->input->post("tempCode_edit");
            $fileInput = "templatePicture_edit";
            $this->saveEditMasterTable($fileInput , $master_temcode);
            $this->saveEditDetailsTable($master_temcode);
            
            $output = array(
                "msg" => "แก้ไข Template สำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "แก้ไข Template ไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }
    private function saveEditMasterTable($fileInput , $master_temcode)
    {
        $yearNow = date("Y");
        $dateNow = date("Y-m-d");
        $imageStatus = "";

        if($_FILES[$fileInput]['tmp_name'] != ""){

            if(getFileForCheck($master_temcode) == "yes"){
                $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$this->input->post("imagePath_edit").$this->input->post("imageFile_edit");
                unlink($path);
            }

            $imageStatus = "yes";
            $imageFile = uploadImageTemplate($fileInput);
            $imagePath = "uploads/template_images/".$yearNow."/".$dateNow."/";
        }else{
            $imageFile = $this->input->post("imageFile_edit");
            $imagePath = $this->input->post("imagePath_edit");
            if(getFileForCheck($master_temcode) == "yes"){
                $imageStatus = "yes";
            }else{
                $imageStatus = "no";
            }
        }

            //Upload the template other image
            $fileInput = "t_otherImageEdit";
            uploadTemplateOtherImage($fileInput , $master_temcode);

            $arInsertTemplate = array(
                "master_name" => $this->input->post("templateName_edit"),
                "master_itemnumber" => $this->input->post("itemNumber_edit"),
                "master_image" => $imageFile,
                "master_imagePath" => $imagePath,
                "master_imagestatus" => $imageStatus,
                "master_temperature" => $this->input->post("temperature_edit"),
                "master_user_modify" => getUser()->Fname." ".getUser()->Lname,
                "master_ecode_modify" => getUser()->ecode,
                "master_deptcode_modify" => getUser()->DeptCode,
                "master_datetime_modify" => date("Y-m-d H:i:s"),
                "master_remark" => $this->input->post("templateremark_edit")
            );
            $this->db->where("master_temcode" , $master_temcode);
            $this->db->update("template_master" , $arInsertTemplate);
    }
    private function saveEditDetailsTable($master_temcode)
    {
        //Delete old template data
        $this->db->where("detail_mastercode" , $master_temcode);
        $this->db->delete("template_details");


        // Insert Item Sequence
        $itemSequenceInput = $this->input->post("itemSequenceInput_edit");
        $itemLinenum = 1;
        $stepLinenum = 1;
        
        foreach($itemSequenceInput as $itemSequenceInputs){
            $arInsertItem = array(
                "detail_mastercode" => $master_temcode,
                "detail_column_name" => "item sequence",
                "detail_name" => $itemSequenceInputs,
                "detail_linenum" => $itemLinenum,
                "detail_user" => getUser()->Fname." ".getUser()->Lname,
                "detail_ecode" => getUser()->ecode,
                "detail_deptcode" => getUser()->DeptCode,
                "detail_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->insert("template_details" , $arInsertItem);
            $itemLinenum++;
        }


        // Insert Step Sequence
        $stepSequence = $this->input->post("stepSequence_input");
        foreach($stepSequence as $key => $value){
            $arInsertStepSequence = array(
                "detail_mastercode" => $master_temcode,
                "detail_column_name" => "step sequence",
                "detail_name" => strtoupper($value),
                "detail_linenum" => $stepLinenum,
                "detail_user" => getUser()->Fname." ".getUser()->Lname,
                "detail_ecode" => getUser()->ecode,
                "detail_deptcode" => getUser()->DeptCode,
                "detail_datetime" => date("Y-m-d H:i:s")
            );
            $this->db->insert("template_details" , $arInsertStepSequence);
            $stepLinenum++;
        }
    }

    public function deleteTemplate()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "deleteTemplate"){
            //Delete Master table
            $this->db->where("master_temcode" , $received_data->templateCode);
            $this->db->delete("template_master");

            // Delete Detail table
            $this->db->where("detail_mastercode" , $received_data->templateCode);
            $this->db->delete("template_details");

            if($received_data->imageFile != "noimage2.jpg"){
                // Unlink File
                $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$received_data->imagePath.$received_data->imageFile;
                unlink($path);
            }


            // ลบ Other Image
            $getOtherImage = $this->db->query("SELECT
            template_image.tm_autoid,
            template_image.tm_templatecode,
            template_image.tm_imagename,
            template_image.tm_imagepath,
            template_image.tm_imagetype
            FROM
            template_image
            WHERE tm_templatecode = '$received_data->templateCode' ORDER BY tm_autoid ASC
            ");

            if($getOtherImage->num_rows() != 0){
                foreach($getOtherImage->result() as $rs){
                    $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$rs->tm_imagepath.$rs->tm_imagename;
                    @unlink($path);
                }
                
            }
            $this->db->where("tm_templatecode" , $received_data->templateCode);
            $this->db->delete("template_image");
            

            $output = array(
                "msg" => "ลบ เทมเพลต สำเร็จ",
                "status" => "Delete Template Success"
            );
        }else{
            $output = array(
                "msg" => "ลบ เทมเพลต ไม่สำเร็จ",
                "status" => "Delete Template Not Success"
            );
        }

        echo json_encode($output);
    }

    public function getTemplateSource()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getTemplateSource"){
            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_temperature,
            template_master.master_image,
            template_master.master_imagePath,
            template_master.master_imagestatus
            FROM
            template_master
            WHERE master_name LIKE '%$received_data->tempSource%'
            ORDER BY master_name ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "templateSource" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function loadSubDetailData()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadSubDetailData"){
            $templatecode = $received_data->templatecode;
            // Get item sequence
            $getItemQuery = $this->queryTemplateDetail($templatecode , "item sequence");

            // Get Step Sequence
            $getStepQuery = $this->queryTemplateDetail($templatecode , "step sequence");

            $output = array(
                "status" => "Select Data Success",
                "itemSequence" => $getItemQuery->result(),
                "stepSequence" => $getStepQuery->result()
            );

        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "itemSequence" => null,
                "stepSequence" => null
            );
        }
        echo json_encode($output);
    }
    private function queryTemplateDetail($templatecode , $detailcolumnname)
    {
        $sql = $this->db->query("SELECT
            template_details.detail_autoid,
            template_details.detail_mastercode,
            template_details.detail_column_name,
            template_details.detail_name,
            template_details.detail_linenum
            FROM
            template_details
            WHERE detail_mastercode = '$templatecode' AND detail_column_name = '$detailcolumnname'
            ORDER BY detail_linenum ASC
            ");
        return $sql;
    }



    // Other Image
    public function loadOtherImage()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadOtherImage"){
            $templatecode = $received_data->templatecode;

            // Select Template Other Image
            $sqlgetOtherImage = $this->db->query("SELECT
            template_image.tm_autoid,
            template_image.tm_templatecode,
            template_image.tm_imagename,
            template_image.tm_imagepath,
            template_image.tm_imagetype
            FROM
            template_image
            WHERE tm_templatecode = '$templatecode' AND tm_imagetype = 'Other Image' ORDER BY tm_autoid ASC
            ");

            $output = array(
                "msg" => "ดึงรูปภาพ Other Image สำเร็จ",
                "status" => "Select Data Success",
                "otherImage" => $sqlgetOtherImage->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงรูปภาพ Other Image ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "otherImage" => null
            );
        }
        echo json_encode($output);
    }


    public function delOtherImage()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "delOtherImage"){
            $autoid = $received_data->data_autoid;
            $filename = $received_data->data_filename;
            $filepath = $received_data->data_filepath;

            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$filepath.$filename;
            unlink($path);

            $this->db->where("tm_autoid" , $autoid);
            $this->db->delete("template_image");

            $output = array(
                "msg" => "ลบรูปภาพ Other Image สำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรูปภาพ Other Image ไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function countTemplate()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "countTemplate"){

            $deptcode = "";
            if(getUser()->DeptCode == 1015 || getUser()->DeptCode == 1014){
                $deptcode = "master_deptcode IN (1015,1014)";
            }else{
                $deptcodeDefault = getUser()->DeptCode;
                $deptcode = "master_deptcode = '$deptcodeDefault'";
            }

            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_remark
            FROM
            template_master where $deptcode");

            $output = array(
                "msg" => "ดึงข้อมูล Template Count สำเร็จ",
                "status" => "Select Data Success",
                "templateCount" => $sql->num_rows()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Template Count ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "templateCount" => null
            );
        }
        echo json_encode($output);
    }



    public function loadTemplateMasterList()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadTemplateMasterList"){

            $deptcode = "";
            if(getUser()->DeptCode == 1015 || getUser()->DeptCode == 1014){
                $deptcode = "master_deptcode IN (1015,1014)";
            }else{
                $deptcodeDefault = getUser()->DeptCode;
                $deptcode = "master_deptcode = '$deptcodeDefault'";
            }

            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_remark
            FROM
            template_master WHERE $deptcode
            ORDER BY master_autoid ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูล Master template list สำเร็จ",
                "status" => "Select Data Success",
                "result" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Master template list ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "result" => null
            );
        }
        echo json_encode($output);
    }
    
    

}/* End of file machine_model.php */
?>