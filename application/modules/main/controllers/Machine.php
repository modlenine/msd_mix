<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Machine extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model("machine_model" , "machine");
    }
    

    public function index()
    {
        $data = array(
            "title" => "Machine page"
        );
        getHead();
        getContent("machine/index" , $data);
        getFooter();

    }



    // Runscreen Zone

    public function loadItemidFormTable()
    {
        $this->machine->loadItemidFormTable();
    }
    public function loadItemidFormTable2()
    {
        $this->machine->loadItemidFormTable2();
    }
    public function loadItemidFormTable3()
    {
        $this->machine->loadItemidFormTable3();
    }
    public function loadItemidFormTable_mdv()
    {
        $this->machine->loadItemidFormTable_mdv();
    }
    public function loadItemidFormTable_mdve()
    {
        $this->machine->loadItemidFormTable_mdve();
    }
    public function loadItemidFormTable_mdve2()
    {
        $this->machine->loadItemidFormTable_mdve2();
    }
    public function saveTemplate()
    {
        $this->machine->saveTemplate();
    }

    public function checkFolder()
    {
        // $yearNow = date("Y");
        // $dateNow = date("Y-m-d");
        // $paths = 'uploads\images';

        // if(!file_exists($paths."\\".$yearNow)){
        //     mkdir($paths."\\".$yearNow , 0755 , true);
        // }

        // if(!file_exists($paths."\\".$yearNow."\\".$dateNow)){
        //     mkdir($paths."\\".$yearNow."\\".$dateNow , 0755 , true);
        // }
        $date = date_create();
        echo date_timestamp_get($date);

    }
     // Runscreen Zone




    //  Template Zone
     public function loadTemplateList()
     {
         $this->machine->loadTemplateList();
     }

     public function saveEditTemplate()
     {
         $this->machine->saveEditTemplate();
     }
     public function deleteTemplate()
     {
         $this->machine->deleteTemplate();
     }

     public function getTemplateSource()
     {
         $this->machine->getTemplateSource();
     }

    public function loadSubDetailData()
    {
        $this->machine->loadSubDetailData();
    }

    public function loadOtherImage()
    {
        $this->machine->loadOtherImage();
    }

    public function delOtherImage()
    {
        $this->machine->delOtherImage();
    }

    public function countTemplate()
    {
        $this->machine->countTemplate();
    }

    public function loadTemplateMasterList()
    {
        $this->machine->loadTemplateMasterList();
    }


}/* End of file Machine.php */


?>