<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->db3 = $this->load->database("mssql_prodplan" , true);
        $this->db4 = $this->load->database("prodplan" , true);
    }


    public function loadMainData()
    {


        // DB table to use
        $table = 'datalist';

        // Table's primary key
        $primaryKey = 'm_autoid';

        $columns = array(
            array(
                'db' => 'm_formno', 'dt' => 0,
                'formatter' => function ($d, $row) {
                    $output = '';
                    $output .= '
                <a id="l_viewmain" class="l_viewmain" href="'.base_url('viewfulldata.html/').$d.'"
                    data_mainformno="'.$d.'"
                ><b>' . $d . '</b></a>
                ';
                    return $output;
                }
            ),
            array('db' => 'm_template_name', 'dt' => 1),
            array('db' => 'm_item_number', 'dt' => 2),
            array('db' => 'm_machine', 'dt' => 3),
            array('db' => 'm_product_number', 'dt' => 4),
            array('db' => 'm_job_number', 'dt' => 5),
            array('db' => 'm_batch_number', 'dt' => 6),
            array(
                'db' => 'm_order', 'dt' => 7,
                'formatter' => function($d , $row){
                    return valueFormat3($d);
                }
            ),
            array('db' => 'm_worktype_new', 'dt' => 8),
            array('db' => 'm_run', 'dt' => 9),
            array(
                'db' => 'm_datetime', 'dt' => 10,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array(
                'db' => 'm_status', 'dt' => 11,
                'formatter' => function($d , $row){
                    $output = '';
                    if($d == "Start"){
                        $output .='
                            <span class="badge badge-success" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Cancel"){
                        $output .='
                            <span class="badge badge-danger" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Stop"){
                        $output .='
                            <span class="badge badge-danger" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Open"){
                        $output .='
                            <span class="badge badge-info" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Wait Start"){
                        $output .='
                            <span class="badge badge-info" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }
                    return $output;
                }
            ),
            array(
                'db' => 'm_memo', 'dt' => 12),
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }

        echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );

        
    }


    public function loadMainDataByDate($date_start , $date_end , $dept )
    {


        // DB table to use
        $table = 'datalist';

        // Table's primary key
        $primaryKey = 'm_autoid';

        $columns = array(
            array(
                'db' => 'm_formno', 'dt' => 0,
                'formatter' => function ($d, $row) {
                    $output = '';
                    $output .= '
                <a id="l_viewmain" class="l_viewmain" href="'.base_url('viewfulldata.html/').$d.'"
                    data_mainformno="'.$d.'"
                ><b>' . $d . '</b></a>
                ';
                    return $output;
                }
            ),
            array('db' => 'm_template_name', 'dt' => 1),
            array('db' => 'm_item_number', 'dt' => 2),
            array('db' => 'm_machine', 'dt' => 3),
            array('db' => 'm_product_number', 'dt' => 4),
            array('db' => 'm_job_number', 'dt' => 5),
            array('db' => 'm_batch_number', 'dt' => 6),
            array(
                'db' => 'm_order', 'dt' => 7,
                'formatter' => function($d , $row){
                    return valueFormat3($d);
                }
            ),
            array('db' => 'm_worktype_new', 'dt' => 8),
            array('db' => 'm_run', 'dt' => 9),
            array(
                'db' => 'm_datetime', 'dt' => 10,
                'formatter' => function($d , $row){
                    return conDateTimeFromDb($d);
                }
            ),
            array(
                'db' => 'm_status', 'dt' => 11,
                'formatter' => function($d , $row){
                    $output = '';
                    if($d == "Start"){
                        $output .='
                            <span class="badge badge-success" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Cancel"){
                        $output .='
                            <span class="badge badge-danger" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Stop"){
                        $output .='
                            <span class="badge badge-danger" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Open"){
                        $output .='
                            <span class="badge badge-info" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }else if($d == "Wait Start"){
                        $output .='
                            <span class="badge badge-info" style="font-size:12px;padding:5px;"><b>'.$d.'</b></span>
                        ';
                    }
                    return $output;
                }
            ),
            array(
                'db' => 'm_memo', 'dt' => 12,)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }
        $searchDate = "";
        if($date_start != "0" && $date_end != "0"){
            $searchDate = "m_datetime BETWEEN '$date_start 00:00:01' AND '$date_end 23:59:59'";
        }else{
            $searchDate = "";
        }

        $filterDept = "";
        $filterDeptCondition = "";
        if($dept != "10"){
            if($dept == "all"){
                $filterDeptCondition = "m_deptcode IN ('1015' , '1014' , '1007')";
            }else if($dept == "pd"){
                $filterDeptCondition = "m_deptcode IN ('1007')";
            }else if($dept == "lab"){
                $filterDeptCondition = "m_deptcode IN ('1015' , '1014')";
            }else{
                $filterDeptCondition = "m_deptcode IN ('1015' , '1014' , '1007')";
            }

            if($date_start != "0" && $date_end != "0"){
                $filterDept = "AND $filterDeptCondition";
            }else{
                $filterDept = "$filterDeptCondition";
            }
        }else{
            $filterDept = "";
        }
        

        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "$searchDate $filterDept")
        );

        
    }


    public function searchTemplate()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "searchTemplate"){
            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_image,
            template_master.master_imagePath,
            template_master.master_temperature
            FROM
            template_master
            WHERE template_master.master_name LIKE '%$received_data->templatename%'
            ORDER BY template_master.master_name ASC LIMIT 50
            ");

            $result = [];

            foreach($sql->result() as $rs){
                $resultArray = array(
                    "master_name" => $rs->master_name,
                    "master_temcode" => $rs->master_temcode,
                    "master_temperature" => $rs->master_temperature,
                );
                $result[] = $resultArray;
            }

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "templatedata" => $result
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function searchTemplateByItemnumber()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "searchTemplate"){

            $userDeptCode = getUser()->DeptCode;
            $sqlQuery = "";
            if($userDeptCode == "1007"){
                $sqlQuery = "AND master_deptcode = '1007'";
            }else if($userDeptCode == "1015"){
                $sqlQuery = "AND master_deptcode = '1015'";
            }else{
                $sqlQuery = "";
            }

            $sql = $this->db->query("SELECT
            template_master.master_autoid,
            template_master.master_temcode,
            template_master.master_name,
            template_master.master_itemnumber,
            template_master.master_image,
            template_master.master_imagePath,
            template_master.master_temperature
            FROM
            template_master
            WHERE template_master.master_itemnumber LIKE '%$received_data->itemnumber%' $sqlQuery
            ORDER BY template_master.master_name ASC LIMIT 50
            ");

            $result = [];

            foreach($sql->result() as $rs){
                $resultArray = array(
                    "master_name" => $rs->master_name,
                    "master_temcode" => $rs->master_temcode,
                    "master_temperature" => $rs->master_temperature
                );
                $result[] = $resultArray;
            }

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "templatedata" => $result
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function searchProductNo()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "searchProductNo"){

            $dataareaid = $received_data->m_areaid;
            $searchProdid = $received_data->m_product_number;

            $output = '';

            $sql = $this->db3->query("SELECT TOP 20
                prodtable.itemid,
                prodtable.dataareaid,
                prodtable.prodid,
                prodtable.inventdimid,
                inventdim.inventbatchid,
                prodtable.slc_orgreference,
                prodtable.bpc_batchsize,
                prodtable.qtysched,
                slc_packagespc.packageid,
                slc_packagespc.packagetxt
                FROM
                prodtable
                LEFT JOIN inventdim ON inventdim.inventdimid = prodtable.inventdimid AND inventdim.dataareaid = prodtable.dataareaid
                LEFT JOIN slc_packagespc ON slc_packagespc.packageid = prodtable.slc_packageid AND slc_packagespc.dataareaid = prodtable.dataareaid
                WHERE prodtable.dataareaid = '$dataareaid' AND prodtable.prodid like '%$searchProdid%' AND prodtable.prodstatus NOT IN (7, 8)
                ");

            $output = '<ul class="list-group lgprodid">';
            foreach ($sql->result() as $rs) {

                $itemid = $rs->itemid;
                $prodid = $rs->prodid;

                if(substr($rs->slc_orgreference , 0 , 2) == "PD"){
                    $wipProdid = $this->checkPDWip($prodid , $dataareaid , $itemid);

                    $sql2 = $this->db3->query("SELECT TOP 20
                        prodtable.itemid,
                        prodtable.dataareaid,
                        prodtable.prodid,
                        prodtable.inventdimid,
                        inventdim.inventbatchid,
                        prodtable.slc_orgreference,
                        prodtable.bpc_batchsize,
                        prodtable.qtysched,
                        slc_packagespc.packageid,
                        slc_packagespc.packagetxt
                        FROM
                        prodtable
                        LEFT JOIN inventdim ON inventdim.inventdimid = prodtable.inventdimid AND inventdim.dataareaid = prodtable.dataareaid
                        LEFT JOIN slc_packagespc ON slc_packagespc.packageid = prodtable.slc_packageid AND slc_packagespc.dataareaid = prodtable.dataareaid
                        WHERE prodtable.dataareaid = '$dataareaid' AND prodtable.prodid = '$wipProdid'
                        ");

                    foreach($sql2->result() as $rss){
                        $output .= '
                        <a href="#" id="prodid_attr" class="prodid_attr"
                        data_prodid = "' . $rs->prodid . '"
                        data_prodiduse = "'.$rss->prodid.'"
                        data_itemid = "' . $rss->itemid . '"
                        data_inventbatchid = "' . $rss->inventbatchid . '"
                        data_dataareaid = "' . $rss->dataareaid . '"
                        data_slc_orgreference = "'.substr($rss->slc_orgreference , 0 , 2).'"
                        data_bpc_batchsize = "'.$rss->bpc_batchsize.'"
                        data_qtysched = "'.$rss->qtysched.'"
                        data_typeofbag = "'.$rss->packageid.'"
                        data_typeofbagtxt = "'.$rss->packagetxt.'"
                        ><li class="list-group-item">' . $rs->prodid . '</li></a>
                        ';
                    }

                }else{
                    $output .= '
                    <a href="#" id="prodid_attr" class="prodid_attr"
                    data_prodid = "' . $rs->prodid . '"
                    data_prodiduse = ""
                    data_itemid = "' . $rs->itemid . '"
                    data_inventbatchid = "' . $rs->inventbatchid . '"
                    data_dataareaid = "' . $rs->dataareaid . '"
                    data_slc_orgreference = "'.substr($rs->slc_orgreference , 0 , 2).'"
                    data_bpc_batchsize = "'.$rs->bpc_batchsize.'"
                    data_qtysched = "'.$rs->qtysched.'"
                    data_typeofbag = "'.$rs->packageid.'"
                    data_typeofbagtxt = "'.$rs->packagetxt.'"
                    ><li class="list-group-item">' . $rs->prodid . '</li></a>
                    ';
                }


                
            }
            $output .= '</ul>';
            echo $output;

        }
    }


    public function searchJobNo()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "searchJobNo"){

            $dataareaid = $received_data->m_areaid;
            $searchJobnumber = $received_data->m_job_number;
            $resultCheckJobRunning = $this->checkJobRuning($searchJobnumber , $dataareaid);



            $output = '';
            $yearNow = date("Y");

            if($resultCheckJobRunning->num_rows() == 0){
                $sql = $this->db3->query("SELECT TOP 20
                itemid , 
                jobrequisitionid , 
                temperature , 
                qtysample , 
                submitdate , 
                dataareaid ,
                commentsaletxt
                FROM bpc_matchingrequisition 
                WHERE canceljob = 0 AND dataareaid = '$dataareaid' AND jobrequisitionid LIKE '%$searchJobnumber%' AND year(submitdate) = $yearNow ORDER BY jobrequisitionid DESC
                    ");
    
                $output = '<ul class="list-group lgjobnumber">';
                foreach ($sql->result() as $rs) {
    
                    $itemid = $rs->itemid;
                    $jobnumber = $rs->jobrequisitionid;
    
                    $output .= '
                    <a href="#" id="jobnumber_attr" class="jobnumber_attr"
                    data_jobnumber = "' . $rs->jobrequisitionid . '"
                    data_itemid = "' . $rs->itemid . '"
                    data_qtysample= "'.number_format($rs->qtysample , 3).'"
                    data_batchid = "' . $rs->jobrequisitionid . '"
                    data_dataareaid = "' . $rs->dataareaid . '"
                    data_temperature = "'.number_format($rs->temperature , 2).'"
                    ><li class="list-group-item">' . $rs->jobrequisitionid . '</li></a>
                    ';
                    
                }
                $output .= '</ul>';
                echo $output;
            }else{
                $output = '<ul class="list-group lgjobnumber">';
                $output .='<h3>Job number ดังกล่าวอยู่ในสถานะ Start</h3>';
                $output .= '</ul>';
                echo $output;
            }
        }
    }
    private function checkJobRuning($jobnumber , $dataareaid)
    {
        if($jobnumber != "" && $dataareaid != ""){
            $sql = $this->db->query("SELECT
            m_job_number
            FROM main WHERE m_job_number = '$jobnumber' AND m_dataareaid = '$dataareaid'
            ");
            return $sql;
        }
    }


    public function searchBag()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "searchBag"){

            $searchText = $received_data->bagCode; 
            $idArr = explode(" ", $searchText); 
            $context = " CONCAT(packageid,' ', 
            packagetxt) "; 
            $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' "; 

            $sql = $this->db3->query("SELECT TOP 20
            packageid,
            packagetxt,
            containweight
            FROM slc_packagespc
            WHERE $condition
            ORDER BY packageid ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูล Bag สำเร็จ",
                "status" => "Select Data Success",
                "resultBag" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Bag ไม่สำเร็จ",
                "status" => "Select Data Not Success",
            );
        }
        echo json_encode($output);
    }

    //Recursive Function loop
    public function checkPDWip($prodid , $dataareaid , $itemid)
    {
        $checkWip = "";
        $sql = $this->db3->query("SELECT TOP 20
                prodtable.itemid,
                prodtable.dataareaid,
                prodtable.prodid,
                prodtable.inventdimid,
                prodtable.slc_orgreference
                FROM
                prodtable
                WHERE prodtable.dataareaid = '$dataareaid' AND prodtable.itemid = '$itemid' AND prodtable.prodid like '%$prodid%'
                ");
        if($sql->num_rows() != 0){
            $checkWip = $sql->row()->slc_orgreference;
            $itemidWip = $sql->row()->itemid;
            $dataareaidWup = $sql->row()->dataareaid;
            
            if(substr($checkWip , 0 , 2) == "PD"){
                if($itemid == $itemidWip){
                    return $this->checkPDWip($checkWip , $dataareaidWup , $itemidWip);
                }
                
            }else{
                return $sql->row()->prodid;
            }
        }  
    }
    //Recursive Function loop



    public function saveMaindata()
    {

        if(getUser()->DeptCode == 1014 || getUser()->DeptCode == 1015){
            if(
                $this->input->post("m_areaid") != "" &&
                $this->input->post("m_job_number") != "" &&
                $this->input->post("m_template_name") != "" &&
                $this->input->post("m_order") != "" &&
                $this->input->post("m_temperature") != "" &&
                $this->input->post("m_batch_number") != "" &&
                $this->input->post("m_worktype") != "" &&
                $this->input->post("m_run") != "" &&
                $this->input->post("m_machine") != ""
            ){
                $formno = getFormNo();

                $arSaveData = array(
                    "m_formno" => $formno,
                    "m_code" => getRuningCode(100),
                    "m_areaid" => $this->input->post("m_areaid"),

                    "m_template_name" => $this->input->post("m_template_name"),
                    "m_machine" => $this->input->post("m_machine"),
                    "m_order" => $this->input->post("m_order"),
                    "m_temperature" => $this->input->post("m_temperature"),
                    "m_item_number" => $this->input->post("m_item_number"),
                    "m_batch_number" => $this->input->post("m_batch_number"),

                    "m_worktype" => $this->input->post("m_worktype"),
                    "m_worktype_no" => $this->input->post("m_worktypeNo"),
                    "m_run" => $this->input->post("m_run"),
                    "m_template_code" => $this->input->post("m_template_code"),
                    "m_job_number" => $this->input->post("m_job_number"),

                    "m_user" => getUser()->Fname." ".getUser()->Lname,
                    "m_ecode" => getUser()->ecode,
                    "m_deptcode" => getUser()->DeptCode,
                    "m_datetime" => date("Y-m-d H:i:s"),
                    "m_status" => "Open",
                    "m_dataareaid" => $this->input->post("m_areaid")
                );
                $this->db->insert("main" , $arSaveData);

                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success",
                    "templateformno" => $formno
                );

            }else{
                $output = array(
                    "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                    "status" => "Insert Data Not Success"
                );
            }
        }else{
            if(
                $this->input->post("m_areaid") != "" &&
                $this->input->post("m_product_number") != "" &&
                $this->input->post("m_template_name") != "" &&
                $this->input->post("m_order") != "" &&
                $this->input->post("m_temperature") != "" &&
                $this->input->post("m_item_number") != "" &&
                $this->input->post("m_batch_number") != "" &&
                $this->input->post("m_worktype") != "" &&
                $this->input->post("m_run") != "" &&
                $this->input->post("m_machine") != ""
            ){
                $formno = getFormNo();

                $arSaveData = array(
                    "m_formno" => $formno,
                    "m_code" => getRuningCode(100),
                    "m_areaid" => $this->input->post("m_areaid"),
                    "m_product_number" => $this->input->post("m_product_number"),
                    "m_template_name" => $this->input->post("m_template_name"),
                    "m_machine" => $this->input->post("m_machine"),
                    "m_order" => $this->input->post("m_order"),
                    "m_temperature" => $this->input->post("m_temperature"),
                    "m_item_number" => $this->input->post("m_item_number"),
                    "m_batch_number" => $this->input->post("m_batch_number"),
                    "m_batchsize" => $this->input->post("m_batchsize"),
                    "m_worktype" => $this->input->post("m_worktype"),
                    "m_worktype_no" => $this->input->post("m_worktypeNo"),
                    "m_run" => $this->input->post("m_run"),
                    "m_template_code" => $this->input->post("m_template_code"),
                    "m_typeofbag" => $this->input->post("m_typeofbag"),
                    "m_typeofbagtxt" => $this->input->post("m_typeofbagtxt"),
                    "m_user" => getUser()->Fname." ".getUser()->Lname,
                    "m_ecode" => getUser()->ecode,
                    "m_deptcode" => getUser()->DeptCode,
                    "m_datetime" => date("Y-m-d H:i:s"),
                    "m_status" => "Open",
                    "m_dataareaid" => $this->input->post("m_areaid")
                );
                $this->db->insert("main" , $arSaveData);

                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success",
                    "templateformno" => $formno
                );

            }else{
                $output = array(
                    "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                    "status" => "Insert Data Not Success"
                );
            }
        }



        echo json_encode($output);
    }


    public function loadSpoint()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadSpoint"){
            $sql = $this->db->query("SELECT
            template_details.detail_autoid,
            template_details.detail_mastercode,
            template_details.detail_column_name,
            template_details.detail_name,
            template_details.detail_min,
            template_details.detail_max,
            template_details.detail_spoint,
            template_details.detail_linenum,
            template_details.detail_runautoid,
            template_details.detail_user,
            template_details.detail_ecode,
            template_details.detail_deptcode,
            template_details.detail_datetime
            FROM
            template_details
            WHERE detail_mastercode = '$received_data->templatecode'
            ORDER BY detail_linenum ASC");

            $resultData = [];
            foreach($sql->result() as $rs){
                $arrayResult = array(
                    "detail_mastercode" => $rs->detail_mastercode,
                    "detail_column_name" => $rs->detail_column_name,
                    "detail_name" => $rs->detail_name,
                    "detail_min" => $rs->detail_min,
                    "detail_max" => $rs->detail_max,
                    "detail_spoint" => $rs->detail_spoint,
                    "detail_linenum" => $rs->detail_linenum,
                    "detail_runautoid" => $rs->detail_runautoid
                );
                $resultData[] = $arrayResult;
            }

            $output = array(
                "msg" => "ดึงข้อมูล Set Point สำเร็จ",
                "status" => "Select Data Success",
                "resultSetpoint" => $resultData
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Set Point ไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function saveSpoint()
    {
        $detailcode = getRuningCode(200);
        $maincode = $this->input->post("mdsp_m_code");
        $templatecode = $this->input->post("checkTemplateCode");

 

        // Save Data Reference
        // Ref From Template
        $this->saveRef($maincode , $templatecode);


        //  Update Status Main Data
        $arUpdateMainData = array(
            "m_status" => "Wait Start",
        );
        $this->db->where("m_code" , $this->input->post("mdsp_m_code"));
        $this->db->update("main" , $arUpdateMainData);


        $output = array(
            "msg" => "บันทึก Spoint สำเร็จ",
            "status" => "Insert Data Success",
        );

        echo json_encode($output);
    }
    private function saveRef($maincode , $templatecode)
    {
        if($maincode != ""){
            // Get Ref From template
            $sqlGetRefFromTemplate = $this->db->query("SELECT
            template_details.detail_autoid,
            template_details.detail_mastercode,
            template_details.detail_column_name,
            template_details.detail_name,
            template_details.detail_linenum
            FROM
            template_details
            WHERE detail_mastercode = '$templatecode'
            ORDER BY detail_autoid ASC
            ");
            // Insert Ref From Template to Ref Table
            $ref_template_code = getRuningCode(301);
            foreach($sqlGetRefFromTemplate->result() as $rs){
                $arInsertRefStand = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_template_code,
                    "ref_type" => "Template",
                    "ref_column_name" => $rs->detail_column_name,
                    "ref_detail_name" => $rs->detail_name,
                    "ref_linenum" => $rs->detail_linenum,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s"),
                    "ref_online_status" => "online"
                );
                $this->db->insert("reference" , $arInsertRefStand);
            }


            // Insert Ref Actual ro ref table
            // Insert Item
            $ref_actual_code = getRuningCode(302);
            $itemSequenceInput_mdv = $this->input->post("itemSequenceInput_mdv");
            $itemLinenum = 1;
            foreach($itemSequenceInput_mdv as $key => $value){
                $arInsertRefItemActual = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_actual_code,
                    "ref_type" => "Actual",
                    "ref_column_name" => "item sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $itemLinenum,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s"),
                    "ref_online_status" => "online",
                    "ref_status" => "active",
                    "ref_version" => 1
                );
                $this->db->insert("reference" , $arInsertRefItemActual);
                $itemLinenum++;
            }

            // Insert Step
            $stepSequenceInput_mdv = $this->input->post("stepSequenceInput_mdv");
            $stepLinenum = 1;
            foreach($stepSequenceInput_mdv as $key => $value){
                $arInsertRefStepActual = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_actual_code,
                    "ref_type" => "Actual",
                    "ref_column_name" => "step sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $stepLinenum,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s"),
                    "ref_online_status" => "online",
                    "ref_status" => "active",
                    "ref_version" => 1
                );
                $this->db->insert("reference" , $arInsertRefStepActual);
                $stepLinenum++;
            }


        }
    }

    public function saveEditSpoint()
    {

        $maincode = $this->input->post("mdspe_m_code");

        if($maincode != ""){
            $templatecode = $this->input->post("checkTemplateCode");
            $mdspe_ref_code = $this->input->post("mdspe_ref_code");
            $refversion = $this->input->post("mdspe_ref_version");
 
            $arOfflineOld = array(
                "ref_online_status" => "offline",
                "ref_status" => "inactive"
            );
            $this->db->where("ref_m_code" , $maincode);
            $this->db->where("ref_type" , 'Actual');
            $this->db->update("reference" , $arOfflineOld);
            // Save Data Reference
            // Ref From Template
            $this->saveEditRef($maincode , $templatecode , $refversion);
    
    
            $output = array(
                "msg" => "อัพเดต Spoint สำเร็จ",
                "status" => "Insert Data Success",
            );
        }else{
            $output = array(
                "msg" => "อัพเดต Spoint ไม่สำเร็จ",
                "status" => "Insert Data Not Success",
            );
        }

        echo json_encode($output);
    }
    private function saveEditRef($maincode , $templatecode , $refversion)
    {
        if($maincode != ""){

            // Insert Ref Actual ro ref table
            // Insert Item
            $refversion = $refversion+1;

            $ref_actual_codeEdit = getRuningCode(302);
            $itemSequenceInput_mdve = $this->input->post("itemSequenceInput_mdve");
            $itemLinenum = 1;
            foreach($itemSequenceInput_mdve as $key => $value){
                $arInsertRefItemActual = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_actual_codeEdit,
                    "ref_type" => "Actual",
                    "ref_column_name" => "item sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $itemLinenum,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s"),
                    "ref_online_status" => "online",
                    "ref_version" => $refversion,
                    "ref_status" => "active"
                );
                $this->db->insert("reference" , $arInsertRefItemActual);
                $itemLinenum++;
            }

            // Insert Step
            $stepSequenceInput_mdve = $this->input->post("stepSequenceInput_mdve");
            $stepLinenum = 1;
            foreach($stepSequenceInput_mdve as $key => $value){
                $arInsertRefStepActual = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_actual_codeEdit,
                    "ref_type" => "Actual",
                    "ref_column_name" => "step sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $stepLinenum,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s"),
                    "ref_online_status" => "online",
                    "ref_version" => $refversion,
                    "ref_status" => "active"
                );
                $this->db->insert("reference" , $arInsertRefStepActual);
                $stepLinenum++;
            }


        }
    }

    public function saveEditSpointReal()
    {

        $maincode = $this->input->post("mdspe_m_code2");

        if($maincode != ""){
            
            $checkRealActual = $this->db->query("SELECT ref_m_code FROM reference WHERE ref_m_code = '$maincode' AND ref_type = 'Real Actual' GROUP BY ref_m_code ");
            if($checkRealActual->num_rows()!= 0){
                $this->db->where("ref_m_code" , $maincode);
                $this->db->where("ref_type" , "Real Actual");
                $this->db->delete("reference");
            }
            
            // Save Data Reference
            // Ref From Template
            $this->saveEditRefReal($maincode);
    
    
            $output = array(
                "msg" => "อัพเดต Spoint สำเร็จ",
                "status" => "Insert Data Success",
            );
        }else{
            $output = array(
                "msg" => "อัพเดต Spoint ไม่สำเร็จ",
                "status" => "Insert Data Not Success",
            );
        }

        echo json_encode($output);
    }
    private function saveEditRefReal($maincode)
    {
        if($maincode != ""){

            // Insert Ref Actual ro ref table
            // Insert Item
            $ref_realActual_codeEdit = getRuningCode(303);
            $itemSequenceInput_mdve2 = $this->input->post("itemSequenceInput_mdve2");
            $itemLinenumReal = 1;
            foreach($itemSequenceInput_mdve2 as $key => $value){
                $arInsertRefItemActualReal = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_realActual_codeEdit,
                    "ref_type" => "Real Actual",
                    "ref_column_name" => "item sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $itemLinenumReal,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("reference" , $arInsertRefItemActualReal);
                $itemLinenumReal++;
            }

            // Insert Step
            $stepSequenceInput_mdve2 = $this->input->post("stepSequenceInput_mdve2");
            $stepLinenumReal = 1;
            foreach($stepSequenceInput_mdve2 as $key => $value){
                $arInsertRefStepActualReal = array(
                    "ref_m_code" => $maincode,
                    "ref_code" => $ref_realActual_codeEdit,
                    "ref_type" => "Real Actual",
                    "ref_column_name" => "step sequence",
                    "ref_detail_name" => $value,
                    "ref_linenum" => $stepLinenumReal,
                    "ref_user" => getUser()->Fname." ".getUser()->Lname,
                    "ref_ecode" => getUser()->ecode,
                    "ref_deptcode" => getUser()->DeptCode,
                    "ref_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("reference" , $arInsertRefStepActualReal);
                $stepLinenumReal++;
            }


        }
    }









    public function checkFormStatus()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "checkFormStatus"){
            $sql = $this->db->query("SELECT
            main.m_formno,
            main.m_code,
            main.m_areaid,
            main.m_job_number,
            main.m_product_number,
            main.m_status
            FROM
            main
            WHERE m_code = '$received_data->m_code'
            ");

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "form_status" => $sql->row()->m_status,
                "job_number" => $sql->row()->m_job_number,
                "product_number" => $sql->row()->m_product_number
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function loadDetailData()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDetailData"){
            $sqlSpoint = $this->db->query("SELECT
            details.d_autoid,
            details.d_maincode,
            details.d_detailcode,
            details.d_templatecode,
            details.d_worktime,
            details.d_action,
            details.d_run_name,
            details.d_run_min,
            details.d_run_max,
            details.d_run_value,
            details.d_linenum,
            details.d_linenum_group,
            details.d_user,
            details.d_ecode,
            details.d_deptcode,
            details.d_datetime,
            details.d_user_modify,
            details.d_ecode_modify,
            details.d_deptcode_modify,
            details.d_datetime_modify
            FROM
            details
            WHERE d_maincode = '$received_data->m_code' AND
            d_action = 'Spoint'
            ORDER BY d_linenum ASC
            ");

            // $result[] = $sqlSpoint->result();
            // Check ว่ามีการแนบไฟล์หรือไม่
            $getImageSpoint = $this->getImageBeforeStart($received_data->m_code);
            if($getImageSpoint->num_rows() != 0){
                $imageBeforeStart = $getImageSpoint->row()->f_maincode;
            }else{
                $imageBeforeStart = "";
            }

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "beforeStartImage" => $imageBeforeStart,
                "spoint" => $sqlSpoint->result()
            );

            echo json_encode($output);
        }
    }
    private function getImageBeforeStart($maincode)
    {
        $sql = $this->db->query("SELECT
        f_name,
        f_path,
        f_maincode
        FROM files
        WHERE f_maincode = '$maincode' AND f_type = 'Before Start'
        ");

        return $sql;
    }

    public function loadRunDetailData()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadRunDetailData"){

            $lastStatus = "";
            $resultRunByGroup = [];

            $sqlRunGroup = $this->db->query("SELECT 
            d_linenum_group , d_worktime , d_detailcode , d_finishtime
            FROM details 
            WHERE d_maincode = '$received_data->m_code'
            ORDER BY d_autoid ASC
            ");

            $sqlGetLastStatus = $this->db->query("SELECT 
            d_status
            FROM details 
            WHERE d_maincode = '$received_data->m_code'
            ORDER BY d_autoid DESC LIMIT 1
            ");

            if($sqlGetLastStatus->num_rows() != 0){
                $lastStatus = $sqlGetLastStatus->row();
            }else{
                $lastStatus = "";
            }

            if($sqlRunGroup->num_rows() != 0){
                foreach($sqlRunGroup->result() as $rs){

                    $sqlRun = $this->db->query("SELECT
                    details.d_autoid,
                    details.d_maincode,
                    details.d_detailcode,
                    details.d_detailcode_ref,
                    details.d_worktime,
                    details.d_finishtime,
                    details.d_action,
                    details.d_run_memo,
                    details.d_batchcount,
                    details.d_batchcount_remix,
                    details.d_batchstatus,
                    details.d_linenum,
                    details.d_linenum_group,
                    details.d_status,
                    details.d_ref_code
                    FROM
                    details
                    WHERE d_maincode = '$received_data->m_code' AND 
                    d_detailcode = '$rs->d_detailcode' AND
                    d_linenum_group = '$rs->d_linenum_group'
                    ORDER BY d_autoid ASC
                    ");

                    // Check Image Data
                    $startImage = "";
                    $getImageRunData = $this->loadStartImage($received_data->m_code , $rs->d_detailcode , "start image");
                    if($getImageRunData->num_rows() != 0){
                        $startImage = $received_data->m_code;
                    }else{
                        $startImage = "";
                    }

                    $finishImage = "";
                    $getImageRunDataFinish = $this->loadStartImage($received_data->m_code , $rs->d_detailcode , "finish image");
                    if($getImageRunDataFinish->num_rows() != 0){
                        $finishImage = $received_data->m_code;
                    }else{
                        $finishImage = "";
                    }

                    $itemcheckImage = "";
                    $getImageItemcheck = $this->loadItemCheckImage($received_data->m_code , $rs->d_detailcode);
                    if($getImageItemcheck->num_rows() != 0){
                        $itemcheckImage = $received_data->m_code;
                    }else{
                        $itemcheckImage = "";
                    }

                    $leadtime = getLeadtime($rs->d_worktime , $rs->d_finishtime);
                    $leadtimeCom = conTimeToComTime($leadtime);
                    if($sqlRun->num_rows() != 0){
                        $resultLineGroup = array(
                            "d_worktime" => conOnlyTimeFromDb($rs->d_worktime),
                            "d_workdate" => conDateFromDb($rs->d_worktime),
                            "d_linenum_group" => $rs->d_linenum_group,
                            "detailcode" => $rs->d_detailcode,
                            "startImage" => $startImage,
                            "finishImage" => $finishImage,
                            "ItemcheckImage" => $itemcheckImage,
                            "memo" => $this->loadMemoRunDetail($received_data->m_code , $rs->d_detailcode),
                            "runByGroup" => $sqlRun->row(),
                            "d_finishtime" => conOnlyTimeFromDb($rs->d_finishtime),
                            "d_finishdate" => conDateFromDb($rs->d_finishtime),
                            "d_leadtime" => $leadtime,
                            "d_leadtime_com" => $leadtimeCom,
                            "lastStatus" => $lastStatus
                        );
                        $resultRunByGroup[] =  $resultLineGroup;
                    }else{
                        $resultRunByGroup = null;
                    }

                }
            }else{
                $resultLineGroup = "ไม่พบข้อมูล";
            }

            

            // $result[] = $sqlSpoint->result();

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "run" => $resultRunByGroup,
                "sd_lastStatus" => $lastStatus,
            );

            
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "run" => "",
                "sd_lastStatus" => "",
            );
        }
        echo json_encode($output);
    }



    private function loadMemoRunDetail($m_code , $detailcode)
    {
        if($detailcode != ""){
            $sql = $this->db->query("SELECT
            me_memo
            FROM memo
            WHERE me_maincode = '$m_code' AND me_detailcode = '$detailcode'
            ");
            $memo = "";
            if($sql->num_rows() != 0){
                $memo = $sql->row()->me_memo;
            }else{
                $memo = "";
            }

            return $memo;
        } 
    }
    private function loadStartImage($maincode , $detailcode , $imageType)
    {
        if($detailcode != ""){
            $sql = $this->db->query("SELECT
            f_name,
            f_path
            FROM files
            WHERE f_maincode = '$maincode' AND f_detailcode = '$detailcode' AND f_type = '$imageType'
            ");

            return $sql;
        }
    }
    private function loadItemCheckImage($maincode , $detailcode)
    {
        if($maincode != "" && $detailcode != ""){
            $sql = $this->db->query("SELECT * FROM item_checklist WHERE i_m_code = '$maincode' AND i_d_code = '$detailcode' ");
            return $sql;
        }
    }

    

    public function saveStart()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "saveStart"){
            $arUpdateStatus = array(
                "m_status" => "Start",
                "m_user_start" => getUser()->Fname." ".getUser()->Lname,
                "m_ecode_start" => getUser()->ecode,
                "m_datetime_start" => date("Y-m-d H:i:s")
            );
            $this->db->where("m_code" , $received_data->m_code);
            $this->db->update("main" , $arUpdateStatus);


            //Update user activity
            $action = "กดปุ่ม Start และบันทึกข้อมูล Formcode : ".$received_data->m_code." สำเร็จ";
            saveActivity(
                $action,
                getActivityData($received_data->m_code)->m_product_number,
                getActivityData($received_data->m_code)->m_batch_number,
                getActivityData($received_data->m_code)->m_item_number,
                getActivityData($received_data->m_code)->m_dataareaid
            );
            //Update user activity

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function saveCancel()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "saveCancel"){
            $arUpdateStatus = array(
                "m_status" => "Cancel",
                "m_memo" => $received_data->m_memo,
                "m_user_cancel" => getUser()->Fname." ".getUser()->Lname,
                "m_ecode_cancel" => getUser()->ecode,
                "m_datetime_cancel" => date("Y-m-d H:i:s")
            );
            $this->db->where("m_code" , $received_data->m_code);
            $this->db->update("main" , $arUpdateStatus);


            //Update user activity
            $action = "กดปุ่ม Cancel และบันทึกข้อมูล Formcode : ".$received_data->m_code." สำเร็จ";
            saveActivity(
                $action,
                getActivityData($received_data->m_code)->m_product_number,
                getActivityData($received_data->m_code)->m_batch_number,
                getActivityData($received_data->m_code)->m_item_number,
                getActivityData($received_data->m_code)->m_dataareaid
            );
            //Update user activity

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function saveStop()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "saveStop"){
            $arUpdateStatus = array(
                "m_status" => "Stop",
                "m_user_stop" => getUser()->Fname." ".getUser()->Lname,
                "m_ecode_stop" => getUser()->ecode,
                "m_datetime_stop" => date("Y-m-d H:i:s")
            );
            $this->db->where("m_code" , $received_data->m_code);
            $this->db->update("main" , $arUpdateStatus);


            //Update user activity
            $action = "กดปุ่ม Stop และบันทึกข้อมูล Formcode : ".$received_data->m_code." สำเร็จ";
            saveActivity(
                $action,
                getActivityData($received_data->m_code)->m_product_number,
                getActivityData($received_data->m_code)->m_batch_number,
                getActivityData($received_data->m_code)->m_item_number,
                getActivityData($received_data->m_code)->m_dataareaid
            );
            //Update user activity

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }

    public function loadSpointInMainData()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadSpointInMainData"){
            $sql = $this->db->query("SELECT
            details.d_autoid,
            details.d_maincode,
            details.d_detailcode,
            details.d_templatecode,
            details.d_worktime,
            details.d_action,
            details.d_run_name,
            details.d_run_min,
            details.d_run_max,
            details.d_run_value,
            details.d_linenum
            FROM
            details
            WHERE d_maincode = '$received_data->m_code' AND d_action = 'Spoint'
            ORDER BY d_linenum ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูล สำเร็จ",
                "status" => "Select Data Success",
                "spointMainData" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "spointMainData" => null
            );
        }

        echo json_encode($output);
    }

    public function loadSpointForEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadSpointForEdit"){
            $sql = $this->db->query("SELECT
            details.d_autoid,
            details.d_maincode,
            details.d_detailcode,
            details.d_templatecode,
            details.d_worktime,
            details.d_action,
            details.d_run_name,
            details.d_run_min,
            details.d_run_max,
            details.d_run_value,
            details.d_linenum
            FROM
            details
            WHERE d_maincode = '$received_data->m_code' AND d_action = 'Spoint'
            ORDER BY d_linenum ASC
            ");

            // Get Image Spoint For Edit
            $sqlGetImageSpoint = $this->db->query("SELECT * FROM files WHERE f_maincode = '$received_data->m_code' AND f_type = 'Before Start' ORDER BY f_autoid ASC ");
            // Get Image Spoint For Edit

            $output = array(
                "msg" => "ดึงข้อมูล สำเร็จ",
                "status" => "Select Data Success",
                "spointMainData" => $sql->result(),
                "spointImage" => $sqlGetImageSpoint->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "spointMainData" => null,
                "spointImage" => null
            );
        }

        echo json_encode($output);
    }

    public function loadDataProcessing()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDataProcessing"){
            $sql = $this->db->query("SELECT
            details.d_autoid,
            details.d_maincode,
            details.d_detailcode,
            details.d_templatecode,
            details.d_worktime,
            details.d_action,
            details.d_run_name,
            details.d_run_min,
            details.d_run_max,
            details.d_run_value,
            details.d_linenum
            FROM
            details
            WHERE d_maincode = '$received_data->m_code' AND d_detailcode = '$received_data->d_code'
            ORDER BY d_linenum ASC
            ");

            $output = array(
                "msg" => "ดึงข้อมูล สำเร็จ",
                "status" => "Select Data Success",
                "spointMainData" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "spointMainData" => null
            );
        }

        echo json_encode($output);
    }

    public function saveRunDetail()
    {
        $maincode = $this->input->post("mdrd_m_code");
        $ref_code = $this->input->post("mdrd_refcode");
        // Check Insert or update 
        if($this->input->post("mdrd_d_code") == "" && $this->input->post("mdrd_sd_status") == ""){
            // Insert Method
            
            // Check Mix or Remix
            if($this->input->post("choice_method") == "mix"){

                if($this->input->post("mdrd_chooseTime") != ""){
                    // Check Group Linenum
                    $groupLinenum = $this->checkGroupNumber($maincode , "Mix");
        
                    $detailcode = getRuningCode(200);
        
                    // Upload Image And Save File Data
                    $fileInput = "mdrd_f_start";
                    $typeImage ="start image";
                    uploadImageStart($fileInput , $detailcode , $maincode , $typeImage);
        
                    // Save Run Detail
                    $arSaveRunDetail = array(
                        "d_maincode" => $maincode,
                        "d_detailcode" => $detailcode ,
                        "d_ref_code" => $ref_code,
                        "d_worktime" => $this->input->post("mdrd_chooseTime"),
                        "d_action" => "Mix",
                        "d_batchcount" => $this->input->post("batchCount"),
                        "d_linenum_group" => $groupLinenum,
                        "d_status" => "Runing",
                        "d_user" => getUser()->Fname." ".getUser()->Lname,
                        "d_ecode" => getUser()->ecode,
                        "d_deptcode" => getUser()->DeptCode,
                        "d_datetime" => date("Y-m-d H:i:s")
                    );
    
                    $this->db->insert("details" , $arSaveRunDetail);
        
                    // Save Memo Data
                    if($this->input->post("mdrd_d_run_memo") != "" || $this->input->post("mdrd_d_run_memo") == ""){
                        $arSavememo = array(
                            "me_maincode" => $maincode,
                            "me_detailcode" => $detailcode,
                            "me_memo" => $this->input->post("mdrd_d_run_memo"),
                            "me_user" => getUser()->Fname." ".getUser()->Lname,
                            "me_ecode" => getUser()->ecode,
                            "me_deptcode" => getUser()->DeptCode,
                            "me_datetime" => date("Y-m-d H:i:s")
                        );
                        $this->db->insert("memo" , $arSavememo);
                    }
        
                    $output = array(
                        "msg" => "บันทึกข้อมูลการทำงานสำเร็จ",
                        "status" => "Insert Data Success"
                    );
                }else{
                    $output = array(
                        "msg" => "บันทึกข้อมูลการทำงานไม่สำเร็จ",
                        "status" => "Insert Data Not Success"
                    );
                }

            }else if($this->input->post("choice_method") == "remix"){

                if($this->input->post("mdrd_chooseTime") != ""){
                    // Check Group Linenum
                    $groupLinenum = $this->checkGroupNumber($maincode , "Remix");
        
                    $detailcode = getRuningCode(200);
        
                    // Upload Image And Save File Data
                    $fileInput = "mdrd_f_start";
                    $typeImage ="start image";
                    uploadImageStart($fileInput , $detailcode , $maincode , $typeImage);
        
                    // Save Run Detail
                    $arSaveRunDetail = array(
                        "d_maincode" => $maincode,
                        "d_detailcode" => $detailcode ,
                        "d_detailcode_ref" => $this->input->post("batchlist_remix"),
                        "d_ref_code" => $ref_code,
                        "d_worktime" => $this->input->post("mdrd_chooseTime"),
                        "d_action" => "Remix",
                        "d_batchcount" => $this->input->post("batchCount"),
                        "d_batchcount_remix" => $this->input->post("d_batchcount_remix"),
                        "d_linenum_group" => $groupLinenum,
                        "d_status" => "Runing",
                        "d_user" => getUser()->Fname." ".getUser()->Lname,
                        "d_ecode" => getUser()->ecode,
                        "d_deptcode" => getUser()->DeptCode,
                        "d_datetime" => date("Y-m-d H:i:s")
                    );
    
                    $this->db->insert("details" , $arSaveRunDetail);
        
                    // Save Memo Data
                    if($this->input->post("mdrd_d_run_memo") != "" || $this->input->post("mdrd_d_run_memo") == ""){
                        $arSavememo = array(
                            "me_maincode" => $maincode,
                            "me_detailcode" => $detailcode,
                            "me_memo" => $this->input->post("mdrd_d_run_memo"),
                            "me_user" => getUser()->Fname." ".getUser()->Lname,
                            "me_ecode" => getUser()->ecode,
                            "me_deptcode" => getUser()->DeptCode,
                            "me_datetime" => date("Y-m-d H:i:s")
                        );
                        $this->db->insert("memo" , $arSavememo);
                    }
        
                    $output = array(
                        "msg" => "บันทึกข้อมูลการทำงานสำเร็จ",
                        "status" => "Insert Data Success"
                    );
                }else{
                    $output = array(
                        "msg" => "บันทึกข้อมูลการทำงานไม่สำเร็จ",
                        "status" => "Insert Data Not Success"
                    );
                }

            }

            // Save item Check
            $itemForcheck = $this->input->post("itemUseCheck");
            foreach($itemForcheck as $key => $value){

                if($this->input->post("item_valuem")[$key] != ""){
                    $ivaluemain = $this->input->post("item_valuem")[$key];
                }else{
                    $ivaluemain = "ไม่ผ่าน";
                }

                $arInsert = array(
                    "i_m_code" => $maincode,
                    "i_d_code" => $detailcode,
                    "i_ref_code" => $this->input->post("item_ref_code")[$key],
                    "i_itemid" => $value,
                    "i_item_linenum" => $this->input->post("item_linenum")[$key],
                    "i_listname" => $this->input->post("item_listnameUse")[$key],
                    "i_value" => $ivaluemain,
                    "i_user" => getUser()->Fname." ".getUser()->Lname,
                    "i_ecode" => getUser()->ecode,
                    "i_deptcode" => getUser()->DeptCode,
                    "i_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("item_checklist" , $arInsert);

            }


            $itemUseCheck = $this->input->post("itemUseCheck2");
            foreach($itemUseCheck as $keys => $itemUseChecks){

                if($this->input->post("item_value2")[$keys] != ""){
                    $ivalue = $this->input->post("item_value2")[$keys];
                }else{
                    $ivalue = "ไม่ผ่าน";
                }
                
                $arInsert2 = array(
                    "i_m_code" => $maincode,
                    "i_d_code" => $detailcode,
                    "i_ref_code" => $this->input->post("item_ref_code2")[$keys],
                    "i_itemid" => $itemUseChecks,
                    "i_item_linenum" => $this->input->post("item_linenum2")[$keys],
                    "i_listname" => $this->input->post("item_listname")[$keys],
                    "i_value" => $ivalue,
                    "i_user" => getUser()->Fname." ".getUser()->Lname,
                    "i_ecode" => getUser()->ecode,
                    "i_deptcode" => getUser()->DeptCode,
                    "i_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("item_checklist" , $arInsert2);
            }





        }else if($this->input->post("mdrd_d_code") != "" && $this->input->post("mdrd_sd_status") == "Runing"){
            // Update Method
            $maincode = $this->input->post("mdrd_m_code");
            $detailcode = $this->input->post("mdrd_d_code");
            $finishTime = $this->input->post("mdrd_chooseTime");

            // Get Start Time
            $getStartTime = $this->input->post("mdrd_worktime_view");
            if($getStartTime != ""){
               $leadtime = getLeadtime($getStartTime , $finishTime);
            }else{
                $leadtime = "";
            }

            // Upload Image And Save File Data
            $fileInput = "mdrd_f_start";
            $typeImage ="finish image";
            uploadImageStart($fileInput , $detailcode , $maincode , $typeImage);

            // Update Run Detail
            $arUpdateRunDetail = array(
                "d_finishtime" => $finishTime,
                "d_leadtime" => $leadtime,
                "d_status" => "Finish",
                "d_user_finish" => getUser()->Fname." ".getUser()->Lname,
                "d_ecode_finish" => getUser()->ecode,
                "d_deptcode_finish" => getUser()->DeptCode,
                "d_datetime_finish" => date("Y-m-d H:i:s")
            );
            $this->db->where("d_maincode" , $maincode);
            $this->db->where("d_detailcode" , $detailcode);
            $this->db->update("details" , $arUpdateRunDetail);

            // Update Memo
            $arUpdatememo = array(

                "me_memo" => $this->input->post("mdrd_d_run_memo"),
                "me_user_modify" => getUser()->Fname." ".getUser()->Lname,
                "me_ecode_modify" => getUser()->ecode,
                "me_datecode_modify" => getUser()->DeptCode,
                "me_datetime_modify" => date("Y-m-d H:i:s")
            );
            $this->db->where("me_maincode",$maincode);
            $this->db->where("me_detailcode",$detailcode);
            $this->db->update("memo" , $arUpdatememo);

            $output = array(
                "msg" => "บันทึกข้อมูลการทำงานสำเร็จ",
                "status" => "Insert Data Success"
            );
            
        }


        echo json_encode($output);
    }
    private function checkGroupNumber($m_code , $d_action)
    {
        $grouplinenum = 0;

        if($m_code != ""){
            $sql = $this->db->query("SELECT 
            d_linenum_group 
            FROM details 
            WHERE d_maincode = '$m_code' 
            AND d_action = '$d_action'
            ORDER BY d_linenum_group DESC
            ");

            if($sql->num_rows() == 0){
                $grouplinenum = 1;
            }else{
                $grouplinenum = $sql->row()->d_linenum_group;
                $grouplinenum++;
            }

            return $grouplinenum;
        }
    }
    // private function getstartTime($m_code , $d_code)
    // {
    //     if($m_code != "" && $d_code){
    //         $sql = $this->db->query("SELECT d_worktime FROM details WHERE d_maincode = '$m_code' AND d_detailcode = '$d_code' ");
    //         return $sql;
    //     }
    // }


    public function saveOven2()
    {
        if($this->input->post("mdrd_closeoven") != ""){
            $m_code = $this->input->post("mdrd_m_code");
            $d_code = $this->input->post("mdrd_d_code");

            // Update Detail Table
            $mdrd_d_run_value = $this->input->post("mdrd_d_run_value");
            foreach($mdrd_d_run_value as $key => $value){
                $arupdateDetail = array(
                    "d_run_value" => $value,
                );
                $this->db->where("d_detailcode" , $this->input->post("mdrd_d_code"));
                $this->db->where("d_linenum" , $this->input->post("mdrd_d_linenum")[$key]);
                $this->db->update("details" , $arupdateDetail);
            }

            //Update Memo
            // Check memo
            $checkMemo = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code' ");
            if($checkMemo->num_rows() != 0){
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode_modify" => getUser()->ecode,
                    "me_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("me_maincode" , $m_code);
                $this->db->where("me_detailcode" , $d_code);
                $this->db->update("memo" , $arupDateMemo);
            }else{
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_maincode" => $m_code,
                    "me_detailcode" => $d_code,
                    "me_user" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode" => getUser()->ecode,
                    "me_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("memo" , $arupDateMemo);
            }
            

            // Update sub detail table
            $arupdateSubDetail = array(
                "sd_closeoven" => $this->input->post("mdrd_closeoven"),
                "sd_closeoven_user" => getUser()->Fname." ".getUser()->Lname,
                "sd_closeoven_ecode" => getUser()->ecode,
                "sd_closeoven_sys_datetime" => date("Y-m-d H:i:s"),
                "sd_status" => "ปิดตู้ตั้งอุณหภูมิแล้วรอ เริ่มอบ"
            );
            $this->db->where("sd_maincode" , $m_code);
            $this->db->where("sd_detailcode" , $d_code);
            $this->db->update("sub_details" , $arupdateSubDetail);

            $output = array(
                "msg" => "อัพเดตข้อมูลเรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function saveOven3()
    {
        if($this->input->post("mdrd_runoven") != ""){
            $m_code = $this->input->post("mdrd_m_code");
            $d_code = $this->input->post("mdrd_d_code");
            // Update Detail Table
            $mdrd_d_run_value = $this->input->post("mdrd_d_run_value");
            foreach($mdrd_d_run_value as $key => $value){
                $arupdateDetail = array(
                    "d_run_value" => $value,
                );
                $this->db->where("d_detailcode" , $this->input->post("mdrd_d_code"));
                $this->db->where("d_linenum" , $this->input->post("mdrd_d_linenum")[$key]);
                $this->db->update("details" , $arupdateDetail);
            }

            //Update Memo
            // Check memo
            $checkMemo = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code' ");
            if($checkMemo->num_rows() != 0){
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode_modify" => getUser()->ecode,
                    "me_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("me_maincode" , $m_code);
                $this->db->where("me_detailcode" , $d_code);
                $this->db->update("memo" , $arupDateMemo);
            }else{
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_maincode" => $m_code,
                    "me_detailcode" => $d_code,
                    "me_user" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode" => getUser()->ecode,
                    "me_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("memo" , $arupDateMemo);
            }

            // Update sub detail table
            $arupdateSubDetail = array(
                "sd_runoven" => $this->input->post("mdrd_runoven"),
                "sd_runoven_user" => getUser()->Fname." ".getUser()->Lname,
                "sd_runoven_ecode" => getUser()->ecode,
                "sd_runoven_sys_datetime" => date("Y-m-d H:i:s"),
                "sd_status" => "เริ่มอบแล้ว"
            );
            $this->db->where("sd_maincode" , $m_code);
            $this->db->where("sd_detailcode" , $d_code);
            $this->db->update("sub_details" , $arupdateSubDetail);

            $output = array(
                "msg" => "อัพเดตข้อมูลเรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function saveOven4()
    {
        if($this->input->post("mdrd_stopoven") != ""){
            $m_code = $this->input->post("mdrd_m_code");
            $d_code = $this->input->post("mdrd_d_code");
            // Update Detail Table
            $mdrd_d_run_value = $this->input->post("mdrd_d_run_value");
            foreach($mdrd_d_run_value as $key => $value){
                $arupdateDetail = array(
                    "d_run_value" => $value,
                );
                $this->db->where("d_detailcode" , $this->input->post("mdrd_d_code"));
                $this->db->where("d_linenum" , $this->input->post("mdrd_d_linenum")[$key]);
                $this->db->update("details" , $arupdateDetail);
            }

            //Update Memo
            // Check memo
            $checkMemo = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code' ");
            if($checkMemo->num_rows() != 0){
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode_modify" => getUser()->ecode,
                    "me_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("me_maincode" , $m_code);
                $this->db->where("me_detailcode" , $d_code);
                $this->db->update("memo" , $arupDateMemo);
            }else{
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_maincode" => $m_code,
                    "me_detailcode" => $d_code,
                    "me_user" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode" => getUser()->ecode,
                    "me_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("memo" , $arupDateMemo);
            }

            // Update sub detail table
            $arupdateSubDetail = array(
                "sd_stopoven" => $this->input->post("mdrd_stopoven"),
                "sd_stopoven_user" => getUser()->Fname." ".getUser()->Lname,
                "sd_stopoven_ecode" => getUser()->ecode,
                "sd_stopoven_sys_datetime" => date("Y-m-d H:i:s"),
                "sd_status" => "อบเสร็จแล้วรอเทสี"
            );
            $this->db->where("sd_maincode" , $m_code);
            $this->db->where("sd_detailcode" , $d_code);
            $this->db->update("sub_details" , $arupdateSubDetail);

            $output = array(
                "msg" => "อัพเดตข้อมูลเรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function saveOven5()
    {
        if($this->input->post("mdrd_endoven") != ""){
            $m_code = $this->input->post("mdrd_m_code");
            $d_code = $this->input->post("mdrd_d_code");
            // Update Detail Table
            $mdrd_d_run_value = $this->input->post("mdrd_d_run_value");
            foreach($mdrd_d_run_value as $key => $value){
                $arupdateDetail = array(
                    "d_run_value" => $value,
                );
                $this->db->where("d_detailcode" , $this->input->post("mdrd_d_code"));
                $this->db->where("d_linenum" , $this->input->post("mdrd_d_linenum")[$key]);
                $this->db->update("details" , $arupdateDetail);
            }

            // Upload Image And Save File Data
            $fileInput = "mdrd_f_endoven";
            $typeImage ="เทสี";
            uploadImageOven($fileInput , $d_code , $m_code , $typeImage);

            //Update Memo
            // Check memo
            $checkMemo = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code' ");
            if($checkMemo->num_rows() != 0){
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode_modify" => getUser()->ecode,
                    "me_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("me_maincode" , $m_code);
                $this->db->where("me_detailcode" , $d_code);
                $this->db->update("memo" , $arupDateMemo);
            }else{
                $arupDateMemo = array(
                    "me_memo" => $this->input->post("mdrd_d_run_memo"),
                    "me_maincode" => $m_code,
                    "me_detailcode" => $d_code,
                    "me_user" => getUser()->Fname." ".getUser()->Lname,
                    "me_ecode" => getUser()->ecode,
                    "me_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->insert("memo" , $arupDateMemo);
            }

            // Update sub detail table
            $arupdateSubDetail = array(
                "sd_endoven" => $this->input->post("mdrd_endoven"),
                "sd_endoven_user" => getUser()->Fname." ".getUser()->Lname,
                "sd_endoven_ecode" => getUser()->ecode,
                "sd_endoven_sys_datetime" => date("Y-m-d H:i:s"),
                "sd_status" => "เทสีเสร็จเรียบร้อย"
            );
            $this->db->where("sd_maincode" , $m_code);
            $this->db->where("sd_detailcode" , $d_code);
            $this->db->update("sub_details" , $arupdateSubDetail);

            $output = array(
                "msg" => "อัพเดตข้อมูลเรียบร้อยแล้ว",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function loadImageRunDetailForShow()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadImageRunDetailForShow")
        {
            $sql = $this->db->query("SELECT * FROM files WHERE f_maincode='$received_data->m_code' AND f_detailcode = '$received_data->d_code' AND f_type = 'Run Detail' ORDER BY f_autoid ASC");

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "imageRunDetail" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "imageRunDetail" => null
            );
        }

        echo json_encode($output);
    }


    public function loadImageBeforeStart()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadImageBeforeStart")
        {
            $sql = $this->db->query("SELECT * FROM files WHERE f_maincode='$received_data->m_code' AND f_detailcode = '$received_data->d_code' AND f_type = '$received_data->imageType' ORDER BY f_autoid ASC");

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "imageBeforeStart" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "imageBeforeStart" => null
            );
        }

        echo json_encode($output);
    }


    public function getImageLoadOven()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getImageLoadOven")
        {
            $sql = $this->db->query("SELECT * FROM files WHERE f_maincode='$received_data->m_code' AND f_detailcode = '$received_data->d_code' AND f_type = '$received_data->imageType' ORDER BY f_autoid ASC");

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "imageLoadOven" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "imageLoadOven" => null
            );
        }

        echo json_encode($output);
    }


    public function loadRunGroupList()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadRunGroupList"){
            $sql = $this->db->query("SELECT
            d_worktime,
            d_detailcode,
            d_maincode
            FROM details
            WHERE d_maincode = '$received_data->m_code'
            ORDER BY d_autoid ASC
            ");


            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "runGroupList" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "runGroupList" => null
            );
        }

        echo json_encode($output);
    }


    public function loadDataForEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadDataForEdit"){
            $m_code = $received_data->m_code;
            $d_code = $received_data->d_code;

            // Get Start Image
            $startImage = $this->loadImageForedit($m_code , $d_code , "start image");
            $finishImage = $this->loadImageForedit($m_code , $d_code , "finish image");
            $memo = $this->loadmemo($m_code , $d_code);
            $detailTime = $this->loaddetaildata_foredit($m_code , $d_code);

            

            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "startImage" => $startImage->result(),
                "finishImage" => $finishImage->result(),
                "memo" => $memo->row(),
                "detailTime" => $detailTime->row()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Not Success",
                "startImage" => null,
                "finishImage" => null,
                "memo" => null,
                "detailTime" => null
            );
        }

        echo json_encode($output);
    }
    private function loadImageForedit($m_code , $d_code , $imageType)
    {
        if($m_code != "" && $d_code != "" && $imageType != ""){
            $sql = $this->db->query("SELECT
            files.f_autoid,
            files.f_name,
            files.f_maincode,
            files.f_detailcode,
            files.f_path,
            files.f_type
            FROM
            files
            WHERE f_maincode = '$m_code' AND f_detailcode = '$d_code' AND f_type = '$imageType'
            ORDER BY f_autoid ASC
            ");

            return $sql;
        }
    }
    private function loadmemo($m_code , $d_code)
    {
        if($m_code != "" && $d_code != ""){
            $sql = $this->db->query("SELECT
            memo.me_autoid,
            memo.me_maincode,
            memo.me_detailcode,
            memo.me_memo
            FROM
            memo
            WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code'
            ");

            return $sql;
        }
    }
    private function loaddetaildata_foredit($m_code , $d_code)
    {
        if($m_code != "" && $d_code != ""){
            $sql = $this->db->query("SELECT
                details.d_worktime,
                details.d_finishtime,
                details.d_leadtime,
                details.d_action,
                details.d_batchcount,
                details.d_batchcount_remix,
                details.d_detailcode_ref
                FROM details WHERE d_maincode = '$m_code' AND d_detailcode = '$d_code'
            ");
            return $sql;
        }
    }


    public function saveRunDetailEdit()
    {
        if($this->input->post("listOfRunGroup") != ""){

            $detailcode = $this->input->post("listOfRunGroup");
            $maincode = $this->input->post("mdrde_m_code");


                // อัพโหลดรูปภาพ โหลดของใส่ถาด
                $fileInput = "start_image_edit";
                $typeImage ="start image";
                uploadImageStart($fileInput , $detailcode , $maincode , $typeImage);
                // อัพโหลดรูปภาพ โหลดของใส่ถาด



                // อัพโหลดรูปภาพ โหลดของใส่ถาด
                $fileInput2 = "finish_image_edit";
                $typeImage2 ="finish image";
                uploadImageStart($fileInput2 , $detailcode , $maincode , $typeImage2);
                // อัพโหลดรูปภาพ โหลดของใส่ถาด




                
            // Update Item Check list
            // Save item Check
            $i_autoid_edit = $this->input->post("i_autoid_edit");
            foreach($i_autoid_edit as $key => $value){

                $arUpdate = array(
                    "i_value" => $this->input->post("i_value_edit")[$key],
                    "i_user" => getUser()->Fname." ".getUser()->Lname,
                    "i_ecode" => getUser()->ecode,
                    "i_deptcode" => getUser()->DeptCode,
                    "i_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->where("i_autoid" , $value);
                $this->db->update("item_checklist" , $arUpdate);

            }
            
            
            $i_autoidII_edit = $this->input->post("i_autoidII_edit");
            foreach($i_autoidII_edit as $keys => $i_autoidII_edits){
                
                $arUpdate2 = array(

                    "i_value" => $this->input->post("i_valueII_edit")[$keys],
                    "i_user" => getUser()->Fname." ".getUser()->Lname,
                    "i_ecode" => getUser()->ecode,
                    "i_deptcode" => getUser()->DeptCode,
                    "i_datetime" => date("Y-m-d H:i:s")
                );
                $this->db->where("i_autoid" , $i_autoidII_edits);
                $this->db->update("item_checklist" , $arUpdate2);
            }
            // Update Item Check list




            // Update Memo
                // Check memo Data
                $sqlCheckMemo = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$maincode' AND me_detailcode = '$detailcode' ");

                if($sqlCheckMemo->num_rows() != 0){
                    $arupDatememo = array(
                        "me_memo" => $this->input->post("edit_memo")
                    );

                    $this->db->where("me_maincode" , $maincode);
                    $this->db->where("me_detailcode" , $detailcode);
                    $this->db->update("memo" , $arupDatememo);
                }else{
                    $arInsertMemo = array(
                        "me_memo" => $this->input->post("edit_memo"),
                        "me_maincode" => $maincode,
                        "me_detailcode" => $detailcode,
                        "me_user" => getUser()->Fname." ".getUser()->Lname,
                        "me_ecode" => getUser()->ecode,
                        "me_deptcode" => getUser()->DeptCode,
                        "me_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("memo" , $arInsertMemo);
                }
             // Update Memo



            //  Update Detail table
            if($this->input->post("mdrd_chooseTime_edit") != ""){
                $arUpdateDetail = array(
                    "d_worktime" => $this->input->post("mdrd_chooseTime_edit"),
                    "d_finishtime" => $this->input->post("mdrd_chooseTimeFinish_edit"),
                    "d_leadtime" => getLeadtime($this->input->post("mdrd_chooseTime_edit") , $this->input->post("mdrd_chooseTimeFinish_edit")),
                    "d_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "d_ecode_modify" => getUser()->ecode,
                    "d_deptcode_modify" => getUser()->DeptCode,
                    "d_datetime_modify" => date("Y-m-d H:i:s"),

                    "d_batchcount" => $this->input->post("d_batchcount_edit"),
                    "d_batchcount_remix" => $this->input->post("batchcount_remix_edit"),
                    "d_detailcode_ref" => $this->input->post("batchlist_remix_edit")
                );
                $this->db->where("d_maincode" , $maincode);
                $this->db->where("d_detailcode" , $detailcode);
                $this->db->update("details" , $arUpdateDetail);
            }
            
            //  Update Detail table


            // Update main modify user
                $arUpdateMain = array(
                    "m_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "m_ecode_modify" => getUser()->ecode,
                    "m_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("m_code" , $maincode);
                $this->db->update("main" , $arUpdateMain);
            // Update main modify user


            $output = array(
                "msg" => "อัพเดตข้อมูลเรียบร้อย",
                "status" => "Update Data Success"
            );

            
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function deleteRunDetail()
    {
        if($this->input->post("listOfRunGroup") != ""){
            $detailcode = $this->input->post("listOfRunGroup");
            $maincode = $this->input->post("mdrde_m_code");

            // ลบไฟล์ออกก่อน
            $sqlGetFile = $this->db->query("SELECT
            f_name,
            f_path
            FROM files
            WHERE f_maincode = '$maincode' AND f_detailcode = '$detailcode'
            ORDER BY f_autoid ASC
            ");

            if($sqlGetFile->num_rows() != 0){
                foreach($sqlGetFile->result() as $rsImage){
                    $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$rsImage->f_path.$rsImage->f_name;
                    unlink($path);
                }

                $this->db->where("f_maincode" , $maincode);
                $this->db->where("f_detailcode" , $detailcode);
                $this->db->delete("files");
            }
            // ลบไฟล์ออกก่อน

            // ลบ Memo 
            $this->db->where("me_maincode" , $maincode);
            $this->db->where("me_detailcode" , $detailcode);
            $this->db->delete("memo");
            // ลบ Memo 


            // ลบ Rundetail
            $this->db->where("d_maincode" , $maincode);
            $this->db->where("d_detailcode" , $detailcode);
            $this->db->delete("details");
            // ลบ Rundetail


            // ลบ item check list
            $this->db->where("i_m_code" , $maincode);
            $this->db->where("i_d_code" , $detailcode);
            $this->db->delete("item_checklist");
            // ลบ item check list


            $output = array(
                "msg" => "ลบรายการที่เลือกเรียบร้อยแล้ว",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรายการที่เลือกไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function deleteFileEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "deleteFileEdit"){
            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_mix/".$received_data->f_path.$received_data->f_name;
            unlink($path);

            // Delete From Table
            $this->db->where("f_autoid" , $received_data->f_autoid);
            $this->db->delete("files");
            

            $output = array(
                "msg" => "ลบรูปภาพสำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรูปภาพไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function deleteFileSpointEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "deleteFileSpointEdit"){
            $path = $_SERVER['DOCUMENT_ROOT']."/intsys/msd_oven/".$received_data->f_path.$received_data->f_name;
            unlink($path);

            // Delete From Table
            $this->db->where("f_autoid" , $received_data->f_autoid);
            $this->db->delete("files");
            

            $output = array(
                "msg" => "ลบรูปภาพสำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรูปภาพไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function updateLinenumGroup()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "updateLinenumGroup"){
            $arUpdate = array(
                "d_linenum_group" => $received_data->d_linenum_group
            );
            $this->db->where("d_detailcode" , $received_data->detailcode);
            $this->db->update("details" , $arUpdate);
            $output = array(
                "msg" => "อัพเดตสำเร็จ",
                "status" => "Update Data Success",
                "detailcode" => $received_data->detailcode,
                "linenum_group" => $received_data->d_linenum_group
            );
        }else{
            $output = array(
                "msg" => "อัพเดตไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }



    public function loadQcSampling()
    {
            $batchNo = $this->input->post("batchNo");
            $productionNo = $this->input->post("productionNo");
            $itemNo = $this->input->post("itemNo");
            $dataareaid = $this->input->post("dataareaid");

            $sql = $this->db4->query("SELECT
            slc_qcsampletable.QCSampleId,
            slc_qcsampletable.QualityOrderId,
            slc_qcsampletable.InventBatchId,
            slc_qcsampletable.ItemId,
            slc_qcsampletable.SampleNo,
            slc_qcsampletable.Approve,
            slc_qcsampletable.ApproveBy,
            slc_qcsampletable.ApproveDateTime,
            slc_qcsampletable.QcBy,
            slc_qcsampletable.QCDateTime,
            slc_qcsampletable.Remark,
            slc_qcsampletable.TestGroupId,
            slc_qcsampletable.SamplingGroupId,
            slc_qcsampletable.LineNum,
            slc_qcsampletable.TestStatus,
            slc_qcsampletable.InventRefId,
            slc_qcsampletable.COAuse,
            slc_qcsampletable.modifiedDateTime,
            slc_qcsampletable.modifiedBy,
            slc_qcsampletable.createdDateTime,
            slc_qcsampletable.createBy,
            slc_qcsampletable.dataAreaId
            FROM
            slc_qcsampletable
            WHERE ItemId = '$itemNo' AND 
            InventBatchId = '$batchNo' AND 
            InventRefId = '$productionNo' AND 
            dataAreaId = '$dataareaid'
            ORDER BY LineNum ASC");

            if($sql->num_rows() != 0){
                $qCSampleId = $sql->row()->QCSampleId;
            }else{
                $qCSampleId = '';
            }

            $output = '
            <input hidden type="text" id="checkQcID" name="checkQcID" value="'.$qCSampleId.'">
            <table id="qcSamplingTable" class="table table-bordered table-responsive nowrap" cellspacing="0" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th class="table-secondary">QC Sampling No.</th>
                        <th class="table-secondary">Sample Series</th>
                        <th class="table-secondary">Item Number</th>
                        <th class="table-secondary">Batch Number</th>
                        <th class="table-secondary">Reference</th>
                        <th class="table-secondary">Status</th>
                        <th class="table-secondary">Sample No.</th>
                        <th class="table-secondary">QC By</th>
                        <th class="table-secondary">QC Date Time</th>
                        <th class="table-secondary">Approve By</th>
                        <th class="table-secondary">Remark</th>
                    </tr>
                </thead>
                <tbody>';

                    foreach ($sql->result() as $rs)
                    {
                        $testStatus = '';
                        switch($rs->TestStatus){
                            case 0:
                                $testStatus = "Open";
                                break;
                            case 1:
                                $testStatus = "Fail";
                                break;
                            case 2:
                                $testStatus = "Pass";
                                break;
                        }

                        $output .= '
                            <tr>
                                <td><span class="qclink"
                                    data_qcSampleId="'.$rs->QCSampleId.'"
                                    data_qcSampleNum="'.$rs->LineNum.'"
                                    data_areaId="'.$rs->dataAreaId.'"
                                >' . $rs->QCSampleId . '</span></td>
                                <td>' . $rs->LineNum . '</td>
                                <td>' . $rs->ItemId . '</td>
                                <td>' . $rs->InventBatchId . '</td>
                                <td>' . $rs->InventRefId . '</td>
                                <td>' . $testStatus . '</td>
                                <td>' . $rs->SampleNo . '</td>
                                <td>' . $rs->QcBy . '</td>
                                <td>' . conDatetimeFromDb($rs->QCDateTime) . '</td>
                                <td>' . $rs->ApproveBy . '</td>
                                <td>' . $rs->Remark . '</td>
                            </tr>
                        ';
                    }


                    $output .= '
                </tbody>
            </table>
            ';

            // $output = '
            //     Batch Number : '.$batchnumber.'
            //     Product Number : '.$productnumber.'
            //     Product Code : '.$productcode.'
            //     Data areaid : '.$dataareaid.'
            // ';

            
            echo $output;
    }



    public function loadQcsamplingByLinenum()
    {
        if($this->input->post("data_qcSampleId") != ""){

            $data_qcSampleId = $this->input->post("data_qcSampleId");
            $data_qcSampleNum = $this->input->post("data_qcSampleNum");
            $data_areaId = $this->input->post("data_areaId");

            $sql = $this->db4->query("SELECT
            slc_qcsampleline.SLC_QCSampleId,
            slc_qcsampleline.TestSequence,
            slc_qcsampleline.TestId,
            slc_qcsampleline.TestResult,
            slc_qcsampleline.StandardValue,
            slc_qcsampleline.LowerLimit,
            slc_qcsampleline.UpperLimit,
            slc_qcsampleline.LowerTolerance,
            slc_qcsampleline.VariableId,
            slc_qcsampleline.VariableOutcomeIdStandard,
            slc_qcsampleline.CertificateOfAnalysisReport,
            slc_qcsampleline.ActionOnFailure,
            slc_qcsampleline.TestInstrumentId,
            slc_qcsampleline.TestUnitID,
            slc_qcsampleline.IncludeResults,
            slc_qcsampleline.AcceptableQualityLevel,
            slc_qcsampleline.TestResultValueReal,
            slc_qcsampleline.QCSampleNum,
            slc_qcsampleline.TestResultValueOutcome,
            slc_qcsampleline.LABComment,
            slc_qcsampleline.BPC_SpecificationId,
            slc_qcsampleline.dataAreaId,
            slc_qcsampleline.TestOutcomeStatus,
            slc_qcsampleline.StandardValue,
            slc_qcsampleline.LowerLimit,
            slc_qcsampleline.UpperLimit
            FROM
            slc_qcsampleline
            WHERE SLC_QCSampleId = '$data_qcSampleId' AND
            QCSampleNum = '$data_qcSampleNum' AND
            dataAreaId = '$data_areaId' ORDER BY TestSequence ASC");

            $output = '
            <table id="qcSamplingTableByLinenum" class="table table-bordered" cellspacing="0" style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th class="table-secondary">Seq No.</th>
                        <th class="table-secondary" style="width:200px;">Test ID</th>
                        <th class="table-secondary">Test Value</th>
                        <th class="table-secondary" style="width:80px;">Pass / Fail</th>
                        <th class="table-secondary">Test Result</th>
                        <th class="table-secondary">Standard</th>
                        <th class="table-secondary">Min</th>
                        <th class="table-secondary">Max</th>
                        <th class="table-secondary" style="width:300px;">Comment From LAB</th>
                    </tr>
                </thead>
                <tbody>';

                    foreach ($sql->result() as $rs)
                    {
                        $testStatus = '';
                        switch($rs->TestOutcomeStatus){
                            case "Open":
                                $testStatus = '<i class="icon-minus1 iconTestFail"></i>';
                                break;
                            case "Pass":
                                $testStatus = '<i class="icon-ok iconTestPass"></i>';
                                break;
                            case "Fail":
                                $testStatus = '<i class="icon-remove iconTestFail"></i>';
                        }

                        // check ค่า 0.000 หากพบไม่ต้องแสดง
                        $rsStandardValue = "";
                        $rsLowerLimit = "";
                        $rsUpperLimit = "";
                        if(
                            $rs->StandardValue == 0.000 || 
                            $rs->LowerLimit == 0.000 || 
                            $rs->UpperLimit == 0.000
                        ){
                            $rsStandardValue = "";
                            $rsLowerLimit = "";
                            $rsUpperLimit = "";
                        }else{
                            $rsStandardValue = $rs->StandardValue;
                            $rsLowerLimit = $rs->LowerLimit;
                            $rsUpperLimit = $rs->UpperLimit;
                        }

                        

                        $output .= '
                            <tr>
                                <td class="text-center">' . $rs->TestSequence . '</td>
                                <td>' . $rs->TestId . '</td>
                                <td>' . $rs->TestResultValueReal . '</td>
                                <td>' . $rs->TestResultValueOutcome . '</td>
                                <td class="text-center">' . $testStatus . '</td>
                                <td>' . $rsStandardValue . '</td>
                                <td>' . $rsLowerLimit . '</td>
                                <td>' . $rsUpperLimit . '</td>
                                <td>' . $rs->LABComment . '</td>
                            </tr>
                        ';
                    }


                    $output .= '
                </tbody>
            </table>
            ';


            echo $output;

        }

        
    }



    public function saveMemoStop()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "saveMemoStop"){
            $arMemo = array(
                "m_memo" => $received_data->mainmemo
            );
            $this->db->where("m_code" , $received_data->maincode);
            $this->db->update("main" , $arMemo);

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }
        echo json_encode($output);
    }



    public function saveEditHead()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "saveEditHead"){
            $arUpdateHead = array(
                "m_order" => conPrice($received_data->m_order),
                "m_run" => $received_data->m_run,
                "m_batchsize" => $received_data->m_batchsize,
                "m_worktype" => $received_data->m_worktype,
                "m_worktype_no" => $received_data->m_worktype_no,
                "m_machine" => $received_data->m_machine
            );
            $this->db->where("m_code" , $received_data->m_code);
            $this->db->update("main" , $arUpdateHead);

            $m_formno = getMainFormno($received_data->m_code);

            $action = "แก้ไขข้อมูลส่วน Head สำเร็จ เอกสารเลขที่ : $m_formno";
            
            // Update main modify user
            $arUpdateMain = array(
                "m_user_modify" => getUser()->Fname." ".getUser()->Lname,
                "m_ecode_modify" => getUser()->ecode,
                "m_datetime_modify" => date("Y-m-d H:i:s")
            );
            $this->db->where("m_code" , $received_data->m_code);
            $this->db->update("main" , $arUpdateMain);
             // Update main modify user

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function loadCheckMachinePage()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadCheckMachinePage"){

            // Get Machine Check Template
            $sql = $this->db->query("SELECT * FROM machine_check_template order by mckt_checklist_linenum asc");
            // Get Machine Check Template

            // Get Item , Batch Number
            $getItemBatch = $this->db->query("SELECT mck_itemno , mck_batchno , mck_linenumgroup , mck_datetime from machine_check where mck_m_code = '$received_data->m_code' group by mck_linenumgroup order by mck_linenumgroup asc ");
            if($getItemBatch->num_rows() !=0){
                foreach($getItemBatch->result() as $rss){
                    $groupLine = array(
                        "batchno" => $rss->mck_batchno,
                        "itemno" => $rss->mck_itemno,
                        "linenumgroup" => $rss->mck_linenumgroup,
                        "datetime" => conDateTimeFromDb($rss->mck_datetime)
                    );
    
                    $resultByGroup[] = $groupLine;
                }
            }else{
                $resultByGroup = [];
            }
            
            // Get Item , Batch Number

            // Get value of Machine Check
            $valueArray = [];
            if($getItemBatch->num_rows() !=0){
                foreach($getItemBatch->result() as $rs){
                    $getValue = $this->db->query("SELECT mck_value , mck_linenumgroup from machine_check where mck_m_code = '$received_data->m_code' and mck_linenumgroup = '$rs->mck_linenumgroup' order by mck_linenum asc ");
    
                    $valueArray[] = $getValue->result();
                }
            }else{
                $valueArray = [];
            }
            
            

            if($getItemBatch->num_rows() != 0){
                $itemno = $getItemBatch->row()->mck_itemno;
                $batchno = $getItemBatch->row()->mck_batchno;
            }else{
                $itemno = null;
                $batchno = null;
            }


            $output = array(
                "msg" => "ดึงข้อมูลสำเร็จ",
                "status" => "Select Data Success",
                "check_template" => $sql->result(),
                "itemno" => $itemno,
                "batchno" => $batchno,
                "value" => $valueArray,
                "lineGroup" => $resultByGroup
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "check_template" => null,
            );
        }

        echo json_encode($output);
    }



    public function saveMachineCheck()
    {
        if($this->input->post("mcmd_mcode") != ""){
            $mckList = $this->input->post("mcklist");
            $m_code = $this->input->post("mcmd_mcode");


            $itemNumber = $this->input->post("mck_itemnumber");
            $batchNumber = $this->input->post("mck_batchnumber");

            // check Duplicate batch and item
                $sqlCheckDup = $this->db->query("SELECT
                machine_check.mck_autoid,
                machine_check.mck_m_code,
                machine_check.mck_itemno,
                machine_check.mck_batchno,
                machine_check.mck_user,
                machine_check.mck_ecode,
                machine_check.mck_deptcode,
                machine_check.mck_datetime
                FROM
                machine_check
                WHERE mck_itemno = '$itemNumber' AND mck_batchno = '$batchNumber' AND mck_m_code = '$m_code'
                GROUP BY mck_batchno
                ");
            if($sqlCheckDup->num_rows() != 0){
                $output = array(
                    "msg" => "บันทึกข้อมูลไม่สำเร็จพบข้อมูลซ้ำในระบบ",
                    "status" => "Insert Data Not Success Found Duplicate Data"
                );
            }else{
                $checkLinenumGroup = $this->db->query("SELECT mck_linenumgroup FROM machine_check WHERE mck_m_code = '$m_code' group by mck_linenumgroup order by mck_linenumgroup desc ");
                if($checkLinenumGroup->num_rows() != 0){
                    $linenumgroup = $checkLinenumGroup->row()->mck_linenumgroup;
                    $linenumgroup++;
                }else{
                    $linenumgroup = 1;
                }
    
                foreach($mckList as $key => $value){
                    $arInsertMachineCheck = array(
                        "mck_m_code" => $m_code,
                        "mck_list" => $value,
                        "mck_value" => $this->input->post("mckval")[$key],
                        "mck_itemno" => $this->input->post("mck_itemnumber"),
                        "mck_batchno" => $this->input->post("mck_batchnumber"),
                        "mck_linenumgroup" => $linenumgroup,
                        "mck_linenum" => $this->input->post("mcklinenum")[$key],
                        "mck_user" => getUser()->Fname." ".getUser()->Lname,
                        "mck_ecode" => getUser()->ecode,
                        "mck_deptcode" => getUser()->DeptCode,
                        "mck_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("machine_check" , $arInsertMachineCheck);
                }

                $output = array(
                    "msg" => "บันทึกข้อมูลสำเร็จ",
                    "status" => "Insert Data Success"
                );
            }



            // $m_formno = getMainFormno($m_code);
            // $action = "บันทึกผลการตรวจสอบเครื่องจักรของเอกสารเลขที่ : $m_formno สำเร็จ";
            // saveActivity(
            //     $action,
            //     getActivityData($m_code)->m_product_number,
            //     getActivityData($m_code)->m_batch_number,
            //     getActivityData($m_code)->m_item_number,
            //     getActivityData($m_code)->m_dataareaid
            // );


        }else{
            $output = array(
                "msg" => "บันทึกข้อมูลไม่สำเร็จ",
                "status" => "Insert Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function loadCheckGroupForEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadCheckGroupForEdit"){
            $sql = $this->db->query("SELECT mck_linenumgroup , mck_m_code , mck_batchno , mck_itemno from machine_check where mck_m_code = '$received_data->m_code' group by mck_linenumgroup order by mck_linenumgroup asc ");


            $output = array(
                "msg" => "ดึงข้อมูลเรียบร้อยแล้ว",
                "status" => "Select Data Success",
                "lineGroupEdit" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "lineGroupEdit" => null
            );
        }

        echo json_encode($output);
    }


    public function loadCheckMainPageEdit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadCheckMainPageEdit"){
            $sql = $this->db->query("SELECT * FROM machine_check 
            where mck_m_code = '$received_data->m_code' and 
            mck_linenumgroup = '$received_data->linegroup' ");

            if($sql->num_rows() != 0){
                $output = array(
                    "msg" => "ดึงข้อมูลสำเร็จ",
                    "status" => "Select Data Success",
                    "mcCheckEdit" => $sql->result(),
                    "batchno" => $sql->row()->mck_batchno,
                    "itemno" => $sql->row()->mck_itemno,
                    "datetime" => conDateTimeFromDb($sql->row()->mck_datetime)
                );
            }
            
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "mcCheckEdit" => null,
                "batchno" => null,
                "itemno" => null,
                "datetime" => null
            );
        }

        echo json_encode($output);
    }

    public function saveEditMachineCheck()
    {
        if($this->input->post("mcmd_mcodeEdit") != ""){

            $machineCheckValue = $this->input->post("mckval_edit");
            foreach($machineCheckValue as $key => $machineCheckValues){
                $arUpdate = array(
                    "mck_value" => $machineCheckValues,
                    "mck_user_modify" => getUser()->Fname." ".getUser()->Lname,
                    "mck_ecode_modify" => getUser()->ecode,
                    "mck_deptcode_modify" => getUser()->DeptCode,
                    "mck_datetime_modify" => date("Y-m-d H:i:s")
                );
                $this->db->where("mck_m_code" , $this->input->post("mcmd_mcodeEdit"));
                $this->db->where("mck_linenumgroup" , $this->input->post("lineGroupForEdit"));
                $this->db->where("mck_autoid" , $this->input->post("mck_autoid_edit")[$key]);
                $this->db->update("machine_check" , $arUpdate);
            }

            $m_code = $this->input->post("mcmd_mcodeEdit");
            $m_formno = getMainFormno($m_code);
            $action = "บันทึกผลการแก้ไข การตรวจสอบเครื่องจักรของเอกสารเลขที่ : $m_formno สำเร็จ";
            saveActivity(
                $action,
                getActivityData($m_code)->m_product_number,
                getActivityData($m_code)->m_batch_number,
                getActivityData($m_code)->m_item_number,
                getActivityData($m_code)->m_dataareaid
            );

            $output = array(
                "msg" => "อัพเดตข้อมูลสำเร็จ",
                "status" => "Update Data Success"
            );
            
        }else{
            $output = array(
                "msg" => "อัพเดตข้อมูลไม่สำเร็จ",
                "status" => "Update Data Not Success"
            );
        }

        echo json_encode($output);
    }


    public function deleteMachineCheck()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "deleteMachineCheck"){
            $this->db->where("mck_m_code" , $received_data->m_code);
            $this->db->where("mck_linenumgroup" , $received_data->linenum_group);
            $this->db->delete("machine_check");


            $m_formno = getMainFormno($received_data->m_code);
            $action = "ลบรายการ ตรวจสอบเครื่องจักรของเอกสารเลขที่ : $m_formno สำเร็จ";
            saveActivity(
                $action,
                getActivityData($received_data->m_code)->m_product_number,
                getActivityData($received_data->m_code)->m_batch_number,
                getActivityData($received_data->m_code)->m_item_number,
                getActivityData($received_data->m_code)->m_dataareaid
            );

            $output = array(
                "msg" => "ลบรายการสำเร็จ",
                "status" => "Delete Data Success"
            );
        }else{
            $output = array(
                "msg" => "ลบรายการไม่สำเร็จ",
                "status" => "Delete Data Not Success"
            );
        }

        echo json_encode($output);
    }





    // Mix Function
    public function loadReferenceAll()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadReferenceAll"){
            $maincode = $received_data->maincode;
            $m_status = "";
            $m_job_number = "";
            $m_product_number = "";

            $sqlGetStatus = $this->db->query("SELECT m_status , m_product_number , m_job_number FROM main WHERE m_code = '$maincode' ");
            if($sqlGetStatus->num_rows() != 0){
                $m_status = $sqlGetStatus->row()->m_status;
                $m_job_number = $sqlGetStatus->row()->m_job_number;
                $m_product_number = $sqlGetStatus->row()->m_product_number;
            }else{
                $m_status = "";
                $m_job_number = "";
                $m_product_number = "";
            }
            // Get Template Ref
            // Get Item
            $sqlRefTem_item = $this->queryReference($maincode , "Template" , "item sequence");

            // Get Step
            $sqlRefTem_step = $this->queryReference($maincode , "Template" , "step sequence");

            // Get Actual Ref
            // Get Item
            $sqlRefAct_item = $this->queryReference($maincode , "Actual" , "item sequence");

            // Get Step
            $sqlRefAct_step = $this->queryReference($maincode , "Actual" , "step sequence");

            // Get ref status
            $refStatus = $this->loadActiveRef($maincode);

            // Get Ref Actual
            $actualRef = $this->loadActualRef($maincode);

            // Load Last Status
            $laststatus = $this->loadLaststatus($maincode);


            $output = array(
                "status" => "Select Data Success",
                "templateRef_item" => $sqlRefTem_item->result(),
                "templateRef_step" => $sqlRefTem_step->result(),
                "actualRef_item" => $sqlRefAct_item->result(),
                "actualRef_step" => $sqlRefAct_step->result(),
                "m_status" => $m_status,
                "ref_status" => $refStatus->row(),
                "ref_actualRef" => $actualRef->row(),
                "lastStatus" => $laststatus->row(),
                "job_number" => $m_job_number,
                "product_number" => $m_product_number
            );

        }else{
            $output = array(
                "status" => "Select Data Not Success"
            );
        }
        echo json_encode($output);
    }
    private function queryReference($maincode , $reftype , $columnname)
    {
        $sql = $this->db->query("SELECT
        reference.ref_autoid,
        reference.ref_m_code,
        reference.ref_type,
        reference.ref_column_name,
        reference.ref_detail_name,
        reference.ref_linenum
        FROM
        reference
        WHERE ref_m_code = '$maincode' AND ref_type = '$reftype' AND ref_column_name = '$columnname' AND ref_online_status = 'online'
        ORDER BY ref_linenum ASC
        ");
        return $sql;
    }
    private function loadActiveRef($m_code)
    {
        $sql = $this->db->query("SELECT ref_type , ref_status ,ref_code FROM reference WHERE ref_m_code = '$m_code' AND ref_status = 'active' GROUP BY ref_code ");
        return $sql;
    }
    private function loadActualRef($m_code)
    {
        $sql = $this->db->query("SELECT 
        ref_type , 
        ref_status ,
        ref_code ,
        ref_version
        FROM reference 
        WHERE ref_m_code = '$m_code' AND 
        ref_type = 'Actual' 
        GROUP BY ref_code ORDER BY ref_autoid DESC");
        return $sql;
    }
    private function loadLaststatus($m_code)
    {
        $sql = $this->db->query("SELECT
        d_status
        FROM details WHERE d_maincode = '$m_code' ORDER BY d_autoid DESC
        ");
        return $sql;
    }


    public function loadReferenceRealActual()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadReferenceRealActual"){
            $maincode = $received_data->maincode;
            $m_status = "";

            $sqlGetStatus = $this->db->query("SELECT m_status FROM main WHERE m_code = '$maincode' ");
            if($sqlGetStatus->num_rows() != 0){
                $m_status = $sqlGetStatus->row()->m_status;
            }else{
                $m_status = "";
            }
            // Get Template Ref

            // Get Actual Ref
            // Get Item
            $sqlRefAct_item = $this->queryReference($maincode , "Real Actual" , "item sequence");

            // Get Step
            $sqlRefAct_step = $this->queryReference($maincode , "Real Actual" , "step sequence");

            $output = array(
                "status" => "Select Data Success",
                "actualRef_item" => $sqlRefAct_item->result(),
                "actualRef_step" => $sqlRefAct_step->result(),
                "m_status" => $m_status
            );

        }else{
            $output = array(
                "status" => "Select Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function loadRefActual_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadRefActual_edit"){
            $maincode = $received_data->maincode;

            // Get Actual Ref
            // Get Item
            $sqlRefAct_item = $this->queryReference($maincode , "Actual" , "item sequence");

            // Get Step
            $sqlRefAct_step = $this->queryReference($maincode , "Actual" , "step sequence");

            $output = array(
                "status" => "Select Data Success",
                "actualRef_item" => $sqlRefAct_item->result(),
                "actualRef_step" => $sqlRefAct_step->result()
            );
        }else{
            $output = array(
                "status" => "Select Data Not Success"
            );
        }
        echo json_encode($output);
    }


    public function getbatchCount()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getbatchCount"){
            $maincode = $received_data->maincode;
            $sql = $this->db->query("SELECT d_batchcount FROM details WHERE d_maincode = '$maincode' AND d_action = 'Mix' GROUP BY d_detailcode ORDER BY d_linenum_group DESC");
            if($sql->num_rows() != 0){
                $batchCount = $sql->row()->d_batchcount;
            }else{
                $batchCount = 0;
            }

            $output = array(
                "status" => "Select Data Success",
                "batchCount" => $batchCount
            );
        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "batchCount" => null
            );
        }

        echo json_encode($output);
    }



    public function loadBatchList_remix()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadBatchList_remix"){
            $m_code = $received_data->m_code;
            $output = "";

            if($m_code != ""){
                $sqlGet = $this->db->query("SELECT
                d_maincode,
                d_detailcode,
                d_batchcount
                FROM details
                WHERE d_maincode = '$m_code' AND d_action = 'Mix'
                ORDER BY d_linenum_group ASC
                ");

                if($sqlGet->num_rows() != 0){
                    $output = array(
                        "status" => "Select Data Success",
                        "batchList" => $sqlGet->result()
                    );
                }

                
            }else{
                $output = array(
                    "status" => "Select Data Success",
                    "batchList" => null
                );
            }

            echo json_encode($output);
        }
    }


    public function loadRefBatMix()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadRefBatMix"){
            $m_code = $received_data->m_code;
            $d_code = $received_data->d_code;

            $sql = $this->db->query("SELECT
            d_batchcount
            FROM details
            WHERE d_maincode = '$m_code' AND d_detailcode = '$d_code'
            ");

            if($sql->num_rows() != 0){
                $output = array(
                    "status" => "Select Data Success",
                    "refBatchCount" => $sql->row()
                );
            }else{
                $output = array(
                    "status" => "Select Data Not Success",
                    "refBatchCount" => null
                );
            }
        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "refBatchCount" => null
            );
        }

        echo json_encode($output);
    }




    public function show_reflistfn()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "show_reflistfn"){
            $m_code = $received_data->m_code;

            $sql = $this->db->query("SELECT
            ref_code,
            ref_m_code,
            ref_type
            FROM reference WHERE ref_m_code = '$m_code' GROUP BY ref_code ORDER BY ref_autoid
            ");

            $output = array(
                "status" => "Select Data Success",
                "refList" => $sql->result()
            );
        }else{
            $output = array(
                "status" => "Select Data Success",
                "refList" => null
            );
        }

        echo json_encode($output);
    }


    public function actionRef()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "activeReference"){
            $refType = $received_data->selectRef_radio;
            $m_code = $received_data->m_code;

            // Update inactive
            $arInActiveRef = array(
                "ref_status" => "inactive"
            );
            $this->db->where("ref_m_code" , $m_code);
            $this->db->update("reference" , $arInActiveRef);



            $arActiveRef = array(
                "ref_status" => "active"
            );
            $this->db->where("ref_m_code" , $m_code);
            $this->db->where("ref_type" , $refType);
            $this->db->where("ref_online_status" , "online");
            $this->db->update("reference" , $arActiveRef);


            



            // Get Ref Code Active
            $getRefcode = $this->db->query("SELECT ref_code , ref_type FROM reference WHERE ref_m_code = '$m_code' AND ref_status = 'active' GROUP BY ref_code ");
            $ref_code = "";
            $ref_type = "";
            if($getRefcode->num_rows() != 0){
                $ref_code = $getRefcode->row()->ref_code;
                $ref_type = $getRefcode->row()->ref_type;
            }

            $output = array(
                "status" => "Update Data Success",
                "ref_code" => $ref_code,
                "ref_type" => $ref_type
            );
        }else{
            $output = array(
                "status" => "Update Data Not Success",
                "ref_code" => $ref_code,
                "ref_type" => $ref_type
            );
        }

        echo json_encode($output);
    }



    public function loadRefDataUse()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadRefDataUse")
        {
            $m_code = $received_data->m_code;
            $ref_code = $received_data->ref_code;
            $d_code = $received_data->d_code;

            $queryItem = $this->queryRefUse($m_code , $ref_code , "item sequence");
            $queryStep = $this->queryRefUse($m_code , $ref_code , "step sequence");
            $queryType = $this->queryRefUseRow($m_code , $ref_code);
            $queryStartImage = $this->queryImageAll($m_code , $d_code , "start image");
            $queryFinishImage = $this->queryImageAll($m_code , $d_code , "finish image");

            $output = array(
                "status" => "Select Data Success",
                "refUse_Item" => $queryItem->result(),
                "refUse_Step" => $queryStep->result(),
                "refUse_type" => $queryType->row(),
                "startImage" => $queryStartImage->result(),
                "finishImage" => $queryFinishImage->result()
            );
        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "refUse_Item" => null,
                "refUse_Step" => null,
                "refUse_type" => null,
                "startImage" => null,
                "finishImage" => null
            );
        }
        echo json_encode($output);
    }
    private function queryRefUse($m_code , $ref_code , $ref_column_name)
    {
        if($ref_code != "" && $m_code != "" && $ref_column_name != ""){
            $sql = $this->db->query("SELECT
            reference.ref_autoid,
            reference.ref_code,
            reference.ref_m_code,
            reference.ref_d_code,
            reference.ref_type,
            reference.ref_column_name,
            reference.ref_detail_name,
            reference.ref_linenum,
            reference.ref_status,
            reference.ref_online_status,
            reference.ref_version,
            reference.ref_user,
            reference.ref_ecode,
            reference.ref_deptcode,
            reference.ref_datetime
            FROM
            reference
            WHERE
            reference.ref_m_code = '$m_code' AND ref_code = '$ref_code' AND ref_column_name = '$ref_column_name'
            ORDER BY ref_linenum ASC
            ");
            return $sql;
        }
    }
    private function queryRefUseRow($m_code , $ref_code)
    {
        if($ref_code != "" && $m_code != ""){
            $sql = $this->db->query("SELECT
            reference.ref_type
            FROM
            reference
            WHERE
            reference.ref_m_code = '$m_code' AND ref_code = '$ref_code'
            ");
            return $sql;
        }
    }
    private function queryImageAll($m_code , $d_code , $imageType)
    {
        if($m_code != "" && $d_code != "" && $imageType != ""){
            $sql = $this->db->query("SELECT
            files.f_autoid,
            files.f_name,
            files.f_maincode,
            files.f_detailcode,
            files.f_path,
            files.f_type
            FROM
            files
            WHERE f_maincode = '$m_code' AND f_detailcode = '$d_code' AND f_type = '$imageType'
            ORDER BY f_autoid ASC
            ");
            return $sql;
        }
    }



    public function loaditemForusecheckList()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loaditemForusecheckList"){
            $m_code = $received_data->m_code;
            $ref_code = $received_data->ref_code;

            // get item check template
            $itemcheckListTemplate = $this->loadItemcheckTemplate();

            // get item by reference selected
            $itemSequence = $this->loaditemSequenceForuseChecklist($m_code , $ref_code);

            $output = array(
                "status" => "Select Data Success",
                "itemSequenceForcheck" => $itemSequence->result(),
                "itemchecklistTemplate" => $itemcheckListTemplate->result()
            );

        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "itemSequenceForcheck" => null,
                "itemchecklistTemplate" => null
            );
        }

        echo json_encode($output);

    }
    private function loadItemcheckTemplate()
    {
        $sql = $this->db->query("SELECT * FROM item_checklist_template ORDER BY it_autoid ASC");
        return $sql;
    }
    private function loaditemSequenceForuseChecklist($m_code , $ref_code)
    {
        if($m_code != "" && $ref_code != ""){
            $sql = $this->db->query("SELECT
            reference.ref_autoid,
            reference.ref_code,
            reference.ref_m_code,
            reference.ref_d_code,
            reference.ref_type,
            reference.ref_column_name,
            reference.ref_detail_name,
            reference.ref_linenum,
            reference.ref_status,
            reference.ref_online_status,
            reference.ref_version
            FROM
            reference
            WHERE
            reference.ref_m_code = '$m_code' AND 
            reference.ref_code = '$ref_code' AND 
            reference.ref_column_name = 'item sequence' 
            ORDER BY ref_linenum ASC
            ");

            return $sql;
        }
    }



    public function loaditemForusecheckList_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loaditemForusecheckList_edit"){
            $m_code = $received_data->m_code;
            $ref_code = $received_data->ref_code;

            // get item check template
            $itemcheckListTemplate = $this->loadItemcheckTemplate_edit();

            // get item by reference selected
            $itemSequence = $this->loaditemSequenceForuseChecklist_edit($m_code , $ref_code);

            $output = array(
                "status" => "Select Data Success",
                "itemSequenceForcheck" => $itemSequence->result(),
                "itemchecklistTemplate" => $itemcheckListTemplate->result()
            );

        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "itemSequenceForcheck" => null,
                "itemchecklistTemplate" => null
            );
        }

        echo json_encode($output);

    }
    private function loadItemcheckTemplate_edit()
    {
        $sql = $this->db->query("SELECT * FROM item_checklist_template ORDER BY it_autoid ASC");
        return $sql;
    }
    private function loaditemSequenceForuseChecklist_edit($m_code , $ref_code)
    {
        if($m_code != "" && $ref_code != ""){
            $sql = $this->db->query("SELECT
            reference.ref_autoid,
            reference.ref_code,
            reference.ref_m_code,
            reference.ref_d_code,
            reference.ref_type,
            reference.ref_column_name,
            reference.ref_detail_name,
            reference.ref_linenum,
            reference.ref_status,
            reference.ref_online_status,
            reference.ref_version
            FROM
            reference
            WHERE
            reference.ref_m_code = '$m_code' AND 
            reference.ref_code = '$ref_code' AND 
            reference.ref_column_name = 'item sequence' 
            ORDER BY ref_linenum ASC
            ");

            return $sql;
        }
    }




    public function loadItemcheckview()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemcheckview"){
            $m_code = $received_data->m_code;
            $d_code = $received_data->d_code;
            $itemCheckMat = [];

            $sql = $this->db->query("SELECT
            i_itemid,
            i_item_linenum,
            i_listname,
            i_value
            FROM item_checklist
            WHERE i_m_code = '$m_code' AND i_d_code = '$d_code' AND i_listname = 'การตรวจใช้'
            ORDER BY i_item_linenum ASC
            ");

            $sqlcheckListTemplate = $this->db->query("SELECT
            it_listname,
            it_autoid
            FROM item_checklist_template ORDER BY it_autoid ASC
            ");

            foreach($sql->result() as $rs){
                $sqlsub = $this->db->query("SELECT
                i_itemid,
                i_item_linenum,
                i_listname,
                i_value
                FROM item_checklist
                WHERE i_m_code = '$m_code' AND i_d_code = '$d_code' AND i_item_linenum = '$rs->i_item_linenum' AND i_listname != 'การตรวจใช้'
                ORDER BY i_autoid ASC
                ");
                $itemCheckMat[] = $sqlsub->result();
            }

            $output = array(
                "status" => "Select Data Success",
                "itemCheckMain" => $sql->result(),
                "itemcheckMat" => $itemCheckMat,
                "itemCheckListTemplate" => $sqlcheckListTemplate->result()
            );
        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "itemCheckMain" => null,
                "itemcheckMat" => null,
                "itemCheckListTemplate" => null
            );
        }

        echo json_encode($output);
    }



    public function loadItemcheckview_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "loadItemcheckview_edit"){
            $m_code = $received_data->m_code;
            $d_code = $received_data->d_code;
            $itemCheckMat = [];

            $sql = $this->db->query("SELECT
            i_itemid,
            i_item_linenum,
            i_listname,
            i_value,
            i_autoid
            FROM item_checklist
            WHERE i_m_code = '$m_code' AND i_d_code = '$d_code' AND i_listname = 'การตรวจใช้'
            ORDER BY i_item_linenum ASC
            ");

            $sqlcheckListTemplate = $this->db->query("SELECT
            it_listname,
            it_autoid
            FROM item_checklist_template ORDER BY it_autoid ASC
            ");

            foreach($sql->result() as $rs){
                $sqlsub = $this->db->query("SELECT
                i_itemid,
                i_item_linenum,
                i_listname,
                i_value,
                i_autoid
                FROM item_checklist
                WHERE i_m_code = '$m_code' AND i_d_code = '$d_code' AND i_item_linenum = '$rs->i_item_linenum' AND i_listname != 'การตรวจใช้'
                ORDER BY i_autoid ASC
                ");
                $itemCheckMat[] = $sqlsub->result();
            }

            $output = array(
                "status" => "Select Data Success",
                "itemCheckMain" => $sql->result(),
                "itemcheckMat" => $itemCheckMat,
                "itemCheckListTemplate" => $sqlcheckListTemplate->result()
            );
        }else{
            $output = array(
                "status" => "Select Data Not Success",
                "itemCheckMain" => null,
                "itemcheckMat" => null,
                "itemCheckListTemplate" => null
            );
        }

        echo json_encode($output);
    }



    public function checkpdforvalidatework()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        $newPD = "";
        if($received_data->action == "checkpdforvalidatework"){
            $productionNumber = $received_data->productionNumber;
            $dataareaid = $received_data->dataareaid;
            $dataitemid = $received_data->data_itemid;

            // Check WIP
            $MainPD = $this->checkPDWip($productionNumber , $dataareaid , $dataitemid);

            $sql = $this->db->query("SELECT
            main.m_autoid,
            main.m_formno,
            main.m_code,
            main.m_product_number,
            main.m_status,
            main.m_dataareaid
            
            FROM
            main
            WHERE
            main.m_dataareaid = '$dataareaid' AND m_product_number = '$MainPD'
            
            ");

            // 1 คือสามารถเดินงาน Adjust ได้  , 0 คือตรวจพบว่า pd ดังกล่าวมีการเดินงานค้างไว้อยู่
            $numCheckStatus = 1;
            $pdworktype = '';
            if($sql->num_rows() != 0){
                $pdworktype = "Adjust";
                foreach($sql->result() as $rs){
                    if($rs->m_status == "Stop"){
                        $numCheckStatus = $numCheckStatus * 1;
                    }else if($rs->m_status == "Cancel"){
                        $numCheckStatus = $numCheckStatus * 1;
                    }else{
                        $numCheckStatus = $numCheckStatus * 0;
                    }
                }
            }else{
                $pdworktype = "Normal";
                $numCheckStatus = 2;
            }
            
            $output = array(
                "msg" => "เช็ค pd เรียบร้อย",
                "status" => "Select Data Success",
                "pdstatus" => $numCheckStatus,
                "pdtype" => $pdworktype
            );
        }else{
            $output = array(
                "msg" => "เช็ค pd เรียบร้อย",
                "status" => "Select Data Success",
                "pdstatus" => null,
                "pdtype" => null
            );
        }

        echo json_encode($output);
    }

    public function checkpdforvalidatework_edit()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "checkpdforvalidatework_edit"){
            $productionNumber = $received_data->productionNumber;
            $dataareaid = $received_data->dataareaid;
            $m_code = $received_data->data_m_code;
            $m_formno = $received_data->data_m_formno;

            $sql = $this->db->query("SELECT
            main.m_autoid,
            main.m_formno,
            main.m_code,
            main.m_product_number,
            main.m_status,
            main.m_dataareaid
            
            FROM
            main
            WHERE
            main.m_dataareaid = '$dataareaid' AND m_product_number = '$productionNumber'
            
            ");

            // 1 คือสามารถเดินงาน Adjust ได้  , 0 คือตรวจพบว่า pd ดังกล่าวมีการเดินงานค้างไว้อยู่
            $numCheckStatus = 1;
            $pdworktype = '';
            if($sql->num_rows() != 0){
                $pdworktype = "Adjust";
                foreach($sql->result() as $rs){

                    if($rs->m_code == $m_code && $rs->m_formno == $m_formno){
                        if($rs->m_status == "Stop"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else if($rs->m_status == "Cancel"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else if($rs->m_status == "Open"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else if($rs->m_status == "Wait Start"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else if($rs->m_status == "Start"){
    
                        }else{
                            $numCheckStatus = $numCheckStatus * 0;
                        }
                    }else{
                        if($rs->m_status == "Stop"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else if($rs->m_status == "Cancel"){
                            $numCheckStatus = $numCheckStatus * 1;
                        }else{
                            $numCheckStatus = $numCheckStatus * 0;
                        }
                    }

                }
            }else{
                $pdworktype = "Normal";
                $numCheckStatus = 2;
            }
            
            $output = array(
                "msg" => "เช็ค pd เรียบร้อย",
                "status" => "Select Data Success",
                "pdstatus" => $numCheckStatus,
                "pdtype" => $pdworktype
            );
        }else{
            $output = array(
                "msg" => "เช็ค pd เรียบร้อย",
                "status" => "Select Data Success",
                "pdstatus" => null,
                "pdtype" => null
            );
        }

        echo json_encode($output);
    }


    public function loadmemoforshow()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "loadmemoforshow"){
            $m_code = $received_data->m_code;
            $d_code = $received_data->d_code;

            $sql = $this->db->query("SELECT me_memo FROM memo WHERE me_maincode = '$m_code' AND me_detailcode = '$d_code' ");

            $output = array(
                "msg" => "ดึงข้อมูล Memo สำเร็จ",
                "status" => "Select Data Success",
                "memo" => $sql->row()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Memo สำเร็จ",
                "status" => "Select Data Success",
                "memo" => null
            );
        }

        echo json_encode($output);
    }



    public function getSpeacialData()
    {
        $received_data = json_decode(file_get_contents("php://input"));

        if($received_data->action == "getSpeacialData"){
            $templatecode = $received_data->get_templatecode;

            $sqlGetOtherImage = $this->db->query("SELECT
            template_image.tm_autoid,
            template_image.tm_templatecode,
            template_image.tm_imagename,
            template_image.tm_imagepath,
            template_image.tm_imagetype
            FROM
            template_image
            WHERE tm_templatecode = '$templatecode' AND tm_imagetype = 'Other Image' ORDER BY tm_autoid ASC
            ");

            $sqlgetRemark = $this->db->query("SELECT master_remark FROM template_master WHERE master_temcode = '$templatecode' ");

            if($sqlgetRemark->num_rows() != 0){
                $templateRemark = $sqlgetRemark->row()->master_remark;
            }else{
                $templateRemark = null;
            }
            $output = array(
                "msg" => "ดึงข้อมูล Speacial Data สำเร็จ",
                "status" => "Select Data Success",
                "imageOther" => $sqlGetOtherImage->result(),
                "templateRemark" => $templateRemark
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูล Speacial Data ไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "imageOther" => null,
                "templateRemark" => null
            );
        }
        echo json_encode($output);
    }


    public function getMachine()
    {
        $received_data = json_decode(file_get_contents("php://input"));
        if($received_data->action == "getMachine"){
            $sql = $this->db3->query("SELECT 
            a.wrkctrid as mach_name,
            a.prodfactory,
            a.enummatchinetype,
            case
                when a.enummatchinetype = 0 then 'NONE'
                when a.enummatchinetype = 1 then 'MIXER'
                when a.enummatchinetype = 2 then 'EXTRUDER'
                when a.enummatchinetype = 3 then 'BUSS'
                when a.enummatchinetype = 4 then 'FARREL'
                when a.enummatchinetype = 5 then 'TE75'
                when a.enummatchinetype = 6 then 'TE58'
                when a.enummatchinetype = 7 then 'TE96'
                when a.enummatchinetype = 8 then 'GRINDER'
                when a.enummatchinetype = 9 then 'VIBRATOR'
                when a.enummatchinetype = 10 then 'PACKING'
                when a.enummatchinetype = 11 then 'OVEN'
                when a.enummatchinetype = 12 then 'OUTSOURCE'
                when a.enummatchinetype = 13 then 'RM PREPARE'
            end as factory ,
            b.name as mach_desc
            from slc_wrkctrfactable a
                left join wrkctrtable b on a.wrkctrid = b.wrkctrid
            where 
            (
                b.recid IN (SELECT MAX(recid) as recid FROM wrkctrtable GROUP BY wrkctrid)
            ) 
        
            and a.enummatchinetype in (1)
            and a.enummatchinetype not in (7 , 5)
            group by a.wrkctrid , a.prodfactory , a.enummatchinetype , b.name
            order by a.prodfactory asc");

            $output = array(
                "msg" => "ดึงข้อมูลเครื่องจักรสำเร็จ",
                "status" => "Select Data Success",
                "result" => $sql->result()
            );
        }else{
            $output = array(
                "msg" => "ดึงข้อมูลเครื่องจักรไม่สำเร็จ",
                "status" => "Select Data Not Success",
                "result" => null
            );
        }

        echo json_encode($output);
    }





    
    

}/* End of file ModelName.php */



?> 