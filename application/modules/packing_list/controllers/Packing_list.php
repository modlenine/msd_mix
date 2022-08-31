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


    

}

/* End of file Controllername.php */

?>
