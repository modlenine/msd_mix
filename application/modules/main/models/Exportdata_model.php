<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exportdata_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        require("PHPExcel/Classes/PHPExcel.php");
        
    }



    public function exportdata_fromtemplate($mainformno)
    {

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->setActiveSheetIndex(0);
            //กำหนดส่วนหัวเป็น Column แบบ Fix ไม่มีการเปลี่ยนแปลงใดๆ
            $objPHPExcel->getActiveSheet()->setCellValue('a1', 'Run Screen');
            $objPHPExcel->getActiveSheet()->setCellValue('b1', 'S/Point');
            //กำหนดส่วนหัวเป็น Column แบบ Fix ไม่มีการเปลี่ยนแปลงใดๆ


            //สรา้งส่วนหัวตามการ Loop ของข้อมูลโดยใช้สูตรการรนับตัวอักษรเข้ามาช่วย เพื่อให้ให้ PhpExcel นั้นสร้างข้อมูลใน Column ถัดๆไปของ Excel นั่นเองตัวอย่างเช่น ข้อมูลตั้งต้นอยู่ที่ Column C1 ข้อมูลชุดถัดไปนั้นจะต้องสร้างที่ Column D1 และ E1 ....ถัดไปเรื่อยๆจนจบชุดข้อมูล
            $ii = 1;
            $cha = "b";
            if(getWorktime2($mainformno)->num_rows() != 0){
                  foreach(getWorktime2($mainformno)->result() as $rs){//Main Loop
              
                      $detailFormno[]=$rs->far_detail_formno;
                      
                      $next_cha = ++$cha; 
                      //The following if condition prevent you to go beyond 'z' or 'Z' and will reset to 'a' or 'A'.
                      // if (strlen($next_cha) > 1) 
                      // {
                      // $next_cha = $next_cha[0];
                      // }
                      $objPHPExcel->getActiveSheet()->setCellValue($next_cha.$ii, convertTimeToShift($rs->far_worktime)."\n".$rs->far_worktime);
                      $objPHPExcel->getActiveSheet()->getStyle($next_cha.$ii)->getAlignment()->setWrapText(true);                 
                  
                        $i = 2;
                        foreach(get_runscreen_name($mainformno)->result() as $rsx){//Loop runscreen name , S/Point

                              $objPHPExcel->getActiveSheet()->setCellValue('a' . $i , $rsx->far_runscreen_name);
                              $objPHPExcel->getActiveSheet()->getColumnDimension('a')->setAutoSize(true);
                              $objPHPExcel->getActiveSheet()->setCellValue('b' . $i , valueFormat($rsx->far_runscreen_value));

                              foreach($detailFormno as $rss){//Loop Runscreen Value
                                  $runValue = get_time_value($rss , $rsx->far_runscreen_linenum , $mainformno);
                                  $objPHPExcel->getActiveSheet()->setCellValue($next_cha.$i , valueFormat($runValue));
                              }
                              $i++;
                        }
                  }//Main Loop
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Export Machine Setup เลขที่ '.$mainformno.'.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            echo $objWriter->save('php://output');
    }

    public function exportdata($m_code)
    {

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->setActiveSheetIndex(0);
            //กำหนดส่วนหัวเป็น Column แบบ Fix ไม่มีการเปลี่ยนแปลงใดๆ


            $machinenameEx = "Machine Name : ".getviewfulldata($m_code)->m_template_name;
            $batchnumberEx = "Batch Number : ".getviewfulldata($m_code)->m_batch_number;
            $productionnumberEx = "Production Number : ".getviewfulldata($m_code)->m_product_number;
            $itemnumberEx = "Item Number : ".getviewfulldata($m_code)->m_item_number;


            $objPHPExcel->getActiveSheet()->setCellValue('a1', $machinenameEx);
            $objPHPExcel->getActiveSheet()->setCellValue('e1', $batchnumberEx);
            $objPHPExcel->getActiveSheet()->setCellValue('a2', $productionnumberEx);
            $objPHPExcel->getActiveSheet()->setCellValue('e2', $itemnumberEx);

            $objPHPExcel->getActiveSheet()->setCellValue('a5', 'Start Time');
            $objPHPExcel->getActiveSheet()->setCellValue('b5', 'Batch');
            $objPHPExcel->getActiveSheet()->setCellValue('c5', 'Mix Status');
            $objPHPExcel->getActiveSheet()->setCellValue('d5', 'Status');
            $objPHPExcel->getActiveSheet()->setCellValue('e5', 'Finish Time');
            $objPHPExcel->getActiveSheet()->setCellValue('f5', 'Lead Time');
            $objPHPExcel->getActiveSheet()->setCellValue('g5', 'Memo');
            $objPHPExcel->getActiveSheet()->setCellValue('h5', 'Item Sequence');
            $objPHPExcel->getActiveSheet()->setCellValue('i5', 'Step Sequence');
            // $runCha = "g";
            // foreach(getRunScreen_exportData($m_code)->result() as $rs1){
            //     $objPHPExcel->getActiveSheet()->setCellValue($runCha.'4', $rs1->d_run_name);
            //     $objPHPExcel->getActiveSheet()->getColumnDimension($runCha)->setAutoSize(true);
            //     ++$runCha;
            // }

            // Loop Time
            $t1 = 6;
            foreach(getDataRun($m_code)->result() as $rs2){

                $queryItemsequence = getdataTemplateDetail($m_code , "item sequence" , $rs2->d_ref_code);
                $queryStepsequence = getdataTemplateDetail($m_code , "step sequence" , $rs2->d_ref_code);
    
                $itemSequenceArray = "";
                if($queryItemsequence->num_rows() != 0){
                    foreach($queryItemsequence->result() as $rs){
    
                        if($itemSequenceArray != ""){
                            $itemSequenceArray .= " , ".$rs->ref_detail_name;
                        }else{
                            $itemSequenceArray .= $rs->ref_detail_name;
                        }
                    }
                }
    
                $stepSequenceArray = "";
                if($queryStepsequence->num_rows() != 0){
                    foreach($queryStepsequence->result() as $rs){
    
                        if($stepSequenceArray != ""){
                            $stepSequenceArray .= " , ".$rs->ref_detail_name;
                        }else{
                            $stepSequenceArray .= $rs->ref_detail_name;
                        }
                    }
                }
                
                $objPHPExcel->getActiveSheet()->setCellValue('a'.$t1, $rs2->d_worktime);
                $objPHPExcel->getActiveSheet()->setCellValue('b'.$t1, $rs2->d_batchcount);
                $objPHPExcel->getActiveSheet()->setCellValue('c'.$t1, $rs2->d_action);
                $objPHPExcel->getActiveSheet()->setCellValue('d'.$t1, $rs2->d_status);
                $objPHPExcel->getActiveSheet()->setCellValue('e'.$t1, $rs2->d_finishtime);
                $objPHPExcel->getActiveSheet()->setCellValue('f'.$t1, $rs2->d_leadtime);
                $objPHPExcel->getActiveSheet()->setCellValue('g'.$t1, getDetailMemo($m_code , $rs2->d_detailcode));
                $objPHPExcel->getActiveSheet()->setCellValue('h'.$t1, $itemSequenceArray);
                $objPHPExcel->getActiveSheet()->setCellValue('i'.$t1, $stepSequenceArray);
                $t1++;
            }
            // Loop Time

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Export Machine Mix เลขที่ '.getMainFormno($m_code).'.xlsx"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                echo $objWriter->save('php://output');
    }





    public function exportdata_templateList()
    {

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->setActiveSheetIndex(0);
            //กำหนดส่วนหัวเป็น Column แบบ Fix ไม่มีการเปลี่ยนแปลงใดๆ
 
            $objPHPExcel->getActiveSheet()->setCellValue('a1', 'No');
            $objPHPExcel->getActiveSheet()->setCellValue('b1', 'Template Name');
            $objPHPExcel->getActiveSheet()->setCellValue('c1', 'Item Number');

            // Loop Time
            $t1 = 2;
            $count = 1;
            foreach(getdataForExportMasterList()->result() as $rs){

                $objPHPExcel->getActiveSheet()->setCellValue('a'.$t1,$count);
                $objPHPExcel->getActiveSheet()->setCellValue('b'.$t1, $rs->master_name);
                $objPHPExcel->getActiveSheet()->getColumnDimension('b')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->setCellValue('c'.$t1, $rs->master_itemnumber);
                $objPHPExcel->getActiveSheet()->getColumnDimension('c')->setAutoSize(true);

                $t1++;
                $count++;
            }
            // Loop Time

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Export Machine Mix Template Master List.xlsx"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                echo $objWriter->save('php://output');
    }
    

    

}
/* End of file ModelName.php */

?>
