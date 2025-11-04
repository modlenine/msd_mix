<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_list extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("packing_list/packing_list_model" , "packinglist");
    }

    public function data($productionId , $areaid)
    {
        $data = array(
            "productionId" => $productionId,
            "areaid" => $areaid
        );
        $this->load->view('index',$data);
    }

    public function loadDataPackinglist()
    {
        $this->packinglist->loadDataPackinglist();
    }

    public function loadPhoto($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoPath6 , $photoName)
    {
        $this->packinglist->loadPhoto($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoPath6 , $photoName);
    }

    public function loadPhotoMaster($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoName)
    {
        $this->packinglist->loadPhotoMaster($photoPath1 , $photoPath2 , $photoPath3 , $photoPath4 , $photoPath5 , $photoName);
    }

    public function loadFile($filePath1 , $filePath2 , $filePath3 , $filePath4 , $filePath5 , $filePath6 , $fileName)
    {
        $this->packinglist->loadFile($filePath1 , $filePath2 , $filePath3 , $filePath4 , $filePath5 , $filePath6 , $fileName);
    }


    

}

/* End of file Controllername.php */

?>
