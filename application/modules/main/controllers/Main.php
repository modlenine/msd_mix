<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model("main_model" , "main");
    }
    

    public function index()
    {
        $data = array(
            "title" => "Index page"
        );
        getHead();
        getContent("index" , $data);
        getFooter();
    }

    public function loadMainData()
    {
        $this->main->loadMainData();
    }

    public function loadMainDataByDate($date_start , $date_end)
    {
        $this->main->loadMainDataByDate($date_start , $date_end);
    }

    public function searchTemplate()
    {
        $this->main->searchTemplate();
    }

    public function searchTemplateByItemnumber()
    {
        $this->main->searchTemplateByItemnumber();
    }

    public function searchProductNo()
    {
        $this->main->searchProductNo();
    }

    public function searchBag()
    {
        $this->main->searchBag();
    }

    public function saveMaindata()
    {
        $this->main->saveMaindata();
    }

    public function viewfulldata($datamainform)
    {
        $data = array(
            "title" => "หน้าแสดงรายละเอียดของรายการ" . $datamainform,
            "mainformno" => $datamainform
        );
        getHead();
        getContent("viewfulldata" , $data);
        getFooter();
    }
    
    public function loadSpoint()
    {
        $this->main->loadSpoint();
    }

    public function saveSpoint()
    {
        $this->main->saveSpoint();
    }

    public function saveEditSpoint()
    {
        $this->main->saveEditSpoint();
    }

    public function saveEditSpointReal()
    {
        $this->main->saveEditSpointReal();
    }

    public function checkFormStatus()
    {
        $this->main->checkFormStatus();
    }

    public function loadDetailData()
    {
        $this->main->loadDetailData();
    }

    public function saveStart()
    {
        $this->main->saveStart();
    }

    public function saveCancel()
    {
        $this->main->saveCancel();
    }

    public function saveStop()
    {
        $this->main->saveStop();
    }

    public function loadSpointInMainData()
    {
        $this->main->loadSpointInMainData();
    }

    public function loadSpointForEdit()
    {
        $this->main->loadSpointForEdit();
    }

    public function loadDataProcessing()
    {
        $this->main->loadDataProcessing();
    }

    public function saveRunDetail()
    {
        $this->main->saveRunDetail();
    }

    public function saveOven2()
    {
        $this->main->saveOven2();
    }

    public function saveOven3()
    {
        $this->main->saveOven3();
    }

    public function saveOven4()
    {
        $this->main->saveOven4();
    }

    public function saveOven5()
    {
        $this->main->saveOven5();
    }

    public function loadRunDetailData()
    {
        $this->main->loadRunDetailData();
    }

    public function loadMemoRunDetail()
    {
        $this->main->loadMemoRunDetail();
    }

    public function loadImageRunDetailForShow()
    {
        $this->main->loadImageRunDetailForShow();
    }

    public function loadImageBeforeStart()
    {
        $this->main->loadImageBeforeStart();
    }

    public function getImageLoadOven()
    {
        $this->main->getImageLoadOven();
    }

    public function loadRunGroupList()
    {
        $this->main->loadRunGroupList();
    }

    public function loadDataForEdit()
    {
        $this->main->loadDataForEdit();
    }

    public function saveRunDetailEdit()
    {
        $this->main->saveRunDetailEdit();
    }

    public function deleteFileEdit()
    {
        $this->main->deleteFileEdit();
    }

    public function deleteFileSpointEdit()
    {
        $this->main->deleteFileSpointEdit();
    }

    public function deleteRunDetail()
    {
        $this->main->deleteRunDetail();
    }

    public function updateLinenumGroup()
    {
        $this->main->updateLinenumGroup();
    }

    public function testcode()
    {
        getLeadtime();
    }


    public function loadQcSampling()
    {
        $this->main->loadQcSampling();
    }


    public function loadQcsamplingByLinenum()
    {
        $this->main->loadQcsamplingByLinenum();
    }

    public function saveMemoStop()
    {
        $this->main->saveMemoStop();
    }

    public function saveEditHead()
    {
        $this->main->saveEditHead();
    }

    public function loadCheckMachinePage()
    {
        $this->main->loadCheckMachinePage();
    }

    public function saveMachineCheck()
    {
        $this->main->saveMachineCheck();
    }

    public function loadCheckGroupForEdit()
    {
        $this->main->loadCheckGroupForEdit();
    }

    public function loadCheckMainPageEdit()
    {
        $this->main->loadCheckMainPageEdit();
    }

    public function saveEditMachineCheck()
    {
        $this->main->saveEditMachineCheck();
    }

    public function deleteMachineCheck()
    {
        $this->main->deleteMachineCheck();
    }






    // Mix Zone
    public function loadReferenceAll()
    {
        $this->main->loadReferenceAll();
    }
    public function loadReferenceRealActual()
    {
        $this->main->loadReferenceRealActual();
    }
    public function loadRefActual_edit()
    {
        $this->main->loadRefActual_edit();
    }
    public function getbatchCount()
    {
        $this->main->getbatchCount();
    }

    public function loadBatchList_remix()
    {
        $this->main->loadBatchList_remix();
    }

    public function loadRefBatMix()
    {
        $this->main->loadRefBatMix();
    }

    public function show_reflistfn()
    {
        $this->main->show_reflistfn();
    }

    public function actionRef()
    {
        $this->main->actionRef();
    }

    public function loadRefDataUse()
    {
        $this->main->loadRefDataUse();
    }

    public function loaditemForusecheckList()
    {
        $this->main->loaditemForusecheckList();
    }

    public function loaditemForusecheckList_edit()
    {
        $this->main->loaditemForusecheckList_edit();
    }

    public function loadItemcheckview()
    {
        $this->main->loadItemcheckview();
    }


    public function loadItemcheckview_edit()
    {
        $this->main->loadItemcheckview_edit();
    }

    public function checkpdforvalidatework()
    {
        $this->main->checkpdforvalidatework();
    }

    public function checkpdforvalidatework_edit()
    {
        $this->main->checkpdforvalidatework_edit();
    }

    public function loadmemoforshow()
    {
        $this->main->loadmemoforshow();
    }

    public function getTemplateMemo()
    {
        $this->main->getTemplateMemo();
    }

    public function getSpeacialData()
    {
        $this->main->getSpeacialData();
    }

    public function getMachine()
    {
        $this->main->getMachine();
    }


}/* End of file Main.php */
?>