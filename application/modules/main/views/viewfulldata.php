<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>


	<!-- <link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/font-icons.css" type="text/css" /> -->

	<!-- Date & Time Picker CSS -->
	<!-- <link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/timepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/daterangepicker.css" type="text/css" /> -->


    <script src="<?=base_url('assets/js/custom/highcharts.js?v='.filemtime('./assets/js/custom/highcharts.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/series-label.js?v='.filemtime('./assets/js/custom/series-label.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/exporting.js?v='.filemtime('./assets/js/custom/exporting.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/export-data.js?v='.filemtime('./assets/js/custom/export-data.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/accessibility.js?v='.filemtime('./assets/js/custom/accessibility.js'))?>"></script>





</head>
<body>

    <div class="main-container">
		<div id="viewfulldata_vue" class="pd-ltr-20">


        <!-- Set Point Zone -->
        <div class="modal fade bs-example-modal-lg" id="setpoint_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveSpoint" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveSetpoint" name="btn-saveSetpoint" @click="saveSpoint"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <input hidden type="text" name="checkTemplateCode" id="checkTemplateCode">
                    <input hidden type="text" name="mdsp_m_code" id="mdsp_m_code">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for=""><b>Item Sequence</b></label>
                                <div id="showItemSequenceArray_mdv" class="mt-3"></div>
                                <input type="text" name="itemSequence_mdv" id="itemSequence_mdv" class="form-control mt-3">
                                <div id="showItemidList_mdv"></div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                        <label for=""><b>Step Sequence</b></label>
                        <div class="row mainStep">
                            <div class="col-md-10">
                                <input type="text" name="stepSequence_mdv" id="stepSequence_mdv" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="col-md-2 div_iAddStepSequence">
                                <span>
                                    <i class="fa fa-save iAddStepSequence_mdv" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div id="stepSequenceDiv_mdv" class="row mt-1"></div>
                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- Set Point Zone -->


        <!-- Set Point Zone -->
        <div class="modal fade bs-example-modal-lg" id="setpointEdit_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveEditSpoint" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointEditTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveEditSetpoint" name="btn-saveEditSetpoint" @click="saveEditSpoint"><i class="fi-save mr-2"></i>บันทึกการแก้ไข</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <input hidden type="text" name="mdspe_m_code" id="mdspe_m_code">
                    <input hidden type="text" name="mdspe_ref_code" id="mdspe_ref_code">
                    <input hidden type="text" name="mdspe_ref_version" id="mdspe_ref_version">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for=""><b>Item Sequence</b></label>
                                <div id="showItemSequenceArray_mdve" class="mt-3"></div>
                                <input type="text" name="itemSequence_mdve" id="itemSequence_mdve" class="form-control mt-3">
                                <div id="showItemidList_mdve"></div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                        <label for=""><b>Step Sequence</b></label>
                        <div class="row mainStep">
                            <div class="col-md-10">
                                <input type="text" name="stepSequence_mdve" id="stepSequence_mdve" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="col-md-2 div_iAddStepSequence">
                                <span>
                                    <i class="fa fa-save iAddStepSequence_mdve" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div id="stepSequenceDiv_mdve" class="row mt-1"></div>
                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- Set Point Zone -->


        <!-- Set Point Zone -->
        <div class="modal fade bs-example-modal-lg" id="setpointEdit2_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveEditSpointReal" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointEditTitle2"></div>
                        <div>
                            <button type="button" class="close closeEditRef" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveEditSetpointReal" name="btn-saveEditSetpointReal" @click="saveEditSpointReal"><i class="fi-save mr-2"></i>บันทึกการแก้ไข</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <input type="text" name="mdspe_m_code2" id="mdspe_m_code2">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for=""><b>Item Sequence</b></label>
                                <div id="showItemSequenceArray_mdve2" class="mt-3"></div>
                                <input type="text" name="itemSequence_mdve2" id="itemSequence_mdve2" class="form-control mt-3">
                                <div id="showItemidList_mdve2"></div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                        <label for=""><b>Step Sequence</b></label>
                        <div class="row mainStep">
                            <div class="col-md-10">
                                <input type="text" name="stepSequence_mdve2" id="stepSequence_mdve2" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="col-md-2 div_iAddStepSequence">
                                <span>
                                    <i class="fa fa-save iAddStepSequence_mdve2" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div id="stepSequenceDiv_mdve2" class="row mt-1"></div>
                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- Set Point Zone -->


        <!-- runDetail_modal Zone -->
        <div class="modal fade bs-example-modal-lg" id="runDetail_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modalRunSize">

                <form @submit.prevent="saveRunDetail" id="frm_saveRunDetail" class="needs-validation" novalidate style="width:100%;" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailTitle"></div>
                        <div>
                            <button type="button" class="close close_runDetail_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveRunDetail" name="btn-saveRunDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger close_runDetail_modal" data-dismiss="modal" id="btn-closeRunDetail"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <span><b>สถานะ : </b><span id="showProcess">Waiting Run</span></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <input hidden type="text" name="mdrd_m_code" id="mdrd_m_code">
                        <input hidden type="text" name="mdrd_d_code" id="mdrd_d_code">
                        <input hidden type="text" name="mdrd_sd_status" id="mdrd_sd_status">
                        <input hidden type="text" name="mdrd_refcode" id="mdrd_refcode">
                        <input hidden type="text" name="mdrd_worktime_view" id="mdrd_worktime_view">


                        <!-- <div id="div_remarkview" class="for form-group" style="display:none;">
                            <label for=""><b>Remark.</b></label>
                            <textarea name="templateremark_view" id="templateremark_view" cols="30" rows="10" class="form-control" readonly></textarea>
                        </div> -->

                        <div id="div_choice_method" class="row" style="display:none;">
                            <div class="col-lg-12 form-inline">
                                <div class="custom-control custom-radio mb-5 mr-3">
                                    <input type="radio" id="choice_mix" name="choice_method" value="mix" class="custom-control-input" required> 
                                    <label for="choice_mix" class="custom-control-label">มิกซ์</label>
                                </div> 
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="choice_remix" name="choice_method" value="remix" class="custom-control-input" required> 
                                    <label for="choice_remix" class="custom-control-label">รีมิกซ์</label>
                                </div>
                            </div>
                        </div>

                    <section id="addRun_section" style="display:none;">

                        <div id="div_batchlist_remix" class="row" style="display:none;">
                            <div class="col-md-12 form-group">
                                <label for=""><b>กรุณาเลือก Bacth ที่ต้องการ Remix</b></label>
                                <div id="showListBatch_remix"></div>
                            </div>
                        </div>

                        <div id="div_batchlist_remix_count" class="row" style="display:none;">
                            <div class="col-md-12 form-group">
                                <label for=""><b>กรุณาเลือกจำนวนครั้งของการ Remix</b></label>
                                <div id="showListBatch_remix_count"></div>
                            </div>
                        </div>

                        <div id="show_template" style="display:none;"></div>
                        <div id="show_actual" style="display:none;"></div>
                        <div id="show_realActual" style="display:none;"></div>


                        <section id="itemCheckList_section">
                            <div id="showItemCheckList"></div>
                        </section>


                        <div class="row mt-3 form-group">
                            <div class="col-md-6">
                                <label id="textTime" for=""><b>กรุณาเลือกเวลาเดินงาน</b></label>

                                <!-- <div class="">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker1">
                                        <input type="text" id="mdrd_chooseTime" name="mdrd_chooseTime" class="form-control datetimepicker-input datetimepicker1" data-target=".datetimepicker1" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div> -->
                                <input type="text" name="mdrd_chooseTime" id="mdrd_chooseTime" class="form-control" placeholder="กรุณาเลือกเวลา">
                            </div>

                            <div class="col-md-6">
                                <label for=""><b>Batch</b></label>
                                <input type="text" name="batchCount" id="batchCount" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>Batch</b></label>
                                <input type="text" name="batchCount" id="batchCount" class="form-control" readonly>
                            </div>
                        </div> -->

                        <div class="row form-group imageZone" style="display:none;">

                            <div class="col-lg-12 bottommargin">
                                <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                <input id="mdrd_f_start" name="mdrd_f_start[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*" required>
                            </div>

                        </div>

                        <div style="margin-bottom:50px;"></div>

                        <div class="row form-group">
                            <div class="col-md-12 form-group">
                                <label for="">หมายเหตุ</label>
                                <textarea name="mdrd_d_run_memo" id="mdrd_d_run_memo" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                    </section>
                        
                    </div>
                
                </div>
                </form>
                
            </div>
        </div>
        <!-- runDetail_modal Zone -->


        <!-- Image View Modal -->
        <div class="modal fade bs-example-modal-lg" id="runDetailImage_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailImageTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-body">

                        <div id="showImageRunDetail"></div>
                  
                    </div>
                </div>
    
                
            </div>
        </div>
        <!-- Image View Modal -->



        <!-- Run Memo View -->
        <div class="modal fade bs-example-modal-lg" id="runDetailMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailMemoTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div id="showMemoRunDetail"></div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Run Memo View -->



        <!-- Stop Memo -->
        <div class="modal fade bs-example-modal-lg" id="mainMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mainMemoTitle"></div>
                        <div>
                            <button type="button" class="close close_mainMemo_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveMainMemo" name="btn-saveMainMemo" @click="saveMemoStop"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger close_mainMemo_modal" data-dismiss="modal" id="btn-closeMainMemo"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div></div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">หมายเหตุ</label>
                                <textarea name="m_memo_v" id="m_memo_v" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Stop Memo -->



        <!-- Stop Memo -->
        <div class="modal fade bs-example-modal-lg" id="cancelMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="cancelMemoTitle"></div>
                        <div>
                            <button type="button" class="close close_cancelMemo_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveMainMemo" name="btn-saveMainMemo" @click="saveMemoCancel"><i class="fi-save mr-2"></i>บันทึก</button>
                            <button type="button" class="btn btn-danger close_cancelMemo_modal" data-dismiss="modal" id="btn-closeMainMemo"><i class="fi-x mr-2"></i>ปิด</button>
                        </div>
                        <div></div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">หมายเหตุ</label>
                                <textarea name="m_memo_v2" id="m_memo_v2" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Stop Memo -->



        <!-- Edit Run Data Modal -->
        <div class="modal fade bs-example-modal-lg" id="editRunDetail_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveRunDetailEdit" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailEditTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveRunDetail_edit" name="btn-saveRunDetail_edit" @click="saveRunDetailEdit"><i class="fi-save mr-2"></i>บันทึก การแก้ไข</button>
                            <button type="button" class="btn btn-danger" id="btn-deleteRunDetail" @click="deleteRunDetail"><i class="fa fa-trash mr-2" aria-hidden="true"></i>ลบรายการ</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeRunDetail" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <span id="mdEditShowStatus"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <input hidden type="text" name="mdrde_m_code" id="mdrde_m_code">

                        <div id="showRunGroupList"></div>
                        <div class="dropdown-divider"></div>   
           
                        <section id="editRunDetail_section" style="display:none;">

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for=""><b>แก้ไขเวลาเดินงาน (Start)</b></label>
                                    <input type="text" name="mdrd_chooseTime_edit" id="mdrd_chooseTime_edit" class="form-control" placeholder="แก้ไขเวลาเดินงาน">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for=""><b>แก้ไขเวลาจบงาน (Finish)</b></label>
                                    <input type="text" name="mdrd_chooseTimeFinish_edit" id="mdrd_chooseTimeFinish_edit" class="form-control" placeholder="แก้ไขเวลาเดินงาน">
                                </div>
                            </div>


                            <div id="showItemCheckList_edit"></div>

                            <div id="startimage_editview"></div>

                            <div id="startImage_section" class="row form-group imageZone">
                                <div class="col-lg-12 bottommargin">
                                    <label>แก้ไขรูปภาพ เริ่มงาน</label><br>
                                    <input id="start_image_edit" name="start_image_edit[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*" required>
                                </div>
                            </div>
                            <div style="margin-bottom:10px;"></div>



                            <div id="finishimage_editview"></div>

                            <div id="finishImage_section" class="row form-group imageZone" style="display:none;">
                                <div class="col-lg-12 bottommargin">
                                    <label>แก้ไขรูปภาพ หลังเสร็จงาน</label><br>
                                    <input id="finish_image_edit" name="finish_image_edit[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*" required>
                                </div>
                            </div>
                            <div style="margin-bottom:50px;"></div>

                            <div id="memo_section"></div>


                        </section>

                        
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Edit Run Data Modal -->



        <!-- Edit Head Modal -->
        <div class="modal fade bs-example-modal-lg" id="editHead_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id=""><b>แก้ไขข้อมูลหลัก : </b><span id="ehTitle"></span></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveHead_edit" name="btn-saveHead_edit" @click="saveEditHead"><i class="fi-save mr-2"></i>บันทึก การแก้ไข</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeHead" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="ehmd_mcode" id="ehmd_mcode">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for=""><b>Order (kg.)</b></label>
                                <input type="text" name="ehmd_order" id="ehmd_order" class="form-control">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for=""><b>Batch Size</b></label>
                                <input type="text" name="ehmd_batchsize" id="ehmd_batchsize" class="form-control">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for=""><b>Work Type</b></label>
                                <!-- <input type="text" name="ehmd_worktype" id="ehmd_worktype" class="form-control"> -->
                                <select name="ehmd_worktype" id="ehmd_worktype" class="form-control">
                                    <option value="">กรุณาเลือกประเภทงาน</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Remix">Remix</option>
                                    <option value="Adjust">Adjust</option>
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for=""><b>Work Type No. </b></label>
                                <div id="showWorkTypeNoList_edit"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for=""><b>Run</b></label>
                                <select name="ehmd_run" id="ehmd_run" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
        <!-- Edit Head Modal -->



        <!-- Machine Check Modal -->
        <div class="modal fade bs-example-modal-lg" id="machineCheck_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_saveMachineCheck" autocomplete="off" style="width:100%;" @submit.prevent="saveMachineCheck">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mcmdTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveMachineCheck" name="btn-saveMachineCheck" @click=""><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeMachineCheck" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="mcmd_mcode" id="mcmd_mcode">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>Machine Name</b></label>
                                <input type="text" name="mck_machinename" id="mck_machinename" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>วันที่</b></label>
                                <input type="text" name="mck_datetime" id="mck_datetime" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>Item Number</b></label>
                                <input type="text" name="mck_itemnumber" id="mck_itemnumber" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>Batch Number</b></label>
                                <input type="text" name="mck_batchnumber" id="mck_batchnumber" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div id="showMachineCheckList_md"></div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Machine Check Modal -->



        <!-- Machine Check Modal -->
        <div class="modal fade bs-example-modal-lg" id="machineCheckEdit_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_saveMachineCheckEdit" autocomplete="off" style="width:100%;" @submit.prevent="saveEditMachineCheck">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mcmdTitleEdit"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveMachineCheckEdit" name="btn-saveMachineCheckEdit"><i class="fi-save mr-2"></i>บันทึกการแก้ไข</button>
                            <button type="button" class="btn btn-danger" id="btn-delMachineCheckEdit" @click="deleteMachineCheck"><i aria-hidden="true" class="fa fa-trash mr-2"></i>ลบ</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeMachineCheckEdit" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="mcmd_mcodeEdit" id="mcmd_mcodeEdit">
                        </div>
                    </div>

                    <div class="modal-body">

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">เลือกข้อมูลที่ต้องการแก้ไข</label>
                                <div id="showCheckListGroupEdit"></div>
                            </div> 
                        </div>
                        <hr>


                        <div id="sectionEditData" style="display:none;">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for=""><b>Machine Name</b></label>
                                    <input type="text" name="mck_machinenameEdit" id="mck_machinenameEdit" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>วันที่</b></label>
                                    <input type="text" name="mck_datetimeEdit" id="mck_datetimeEdit" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for=""><b>Item Number</b></label>
                                    <input type="text" name="mck_itemnumberEdit" id="mck_itemnumberEdit" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>Batch Number</b></label>
                                    <input type="text" name="mck_batchnumberEdit" id="mck_batchnumberEdit" class="form-control" readonly>
                                </div>
                            </div>
                            <hr>
                            <div id="showMachineCheckListEdit_md"></div>
                        </div>


                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Machine Check Modal -->




        <!-- Show Ref use Modal -->
        <div class="modal fade bs-example-modal-lg" id="showRefUse_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modalRunSize">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="showRefTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>


                    <div class="modal-body">

                        <!-- Show Ref Data -->
                        <div id="refDataUse"></div>

                    </div>
                </div>
  
            </div>
        </div>
        <!-- Show Ref use Modal -->


        <!-- Show item check Modal -->
        <div class="modal fade bs-example-modal-lg" id="itemcheck_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modalRunSize">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="showItemCheckTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>


                    <div class="modal-body">

                        <!-- Show Ref Data -->
                        <div id="itemCheckShow_view"></div>

                    </div>
                </div>
  
            </div>
        </div>
        <!-- Show Ref use Modal -->


        <!-- Show memo Modal -->
        <div class="modal fade bs-example-modal-lg" id="viewmemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="showMemoTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>


                    <div class="modal-body">

                        <!-- Show Ref Data -->
                        <div id="showViewMemo"></div>

                    </div>
                </div>
  
            </div>
        </div>
        <!-- Show memo Modal -->

		
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<h3 style="text-align:center;">หน้าแสดงรายละเอียด</h3>

                        <h5 style="text-align:center;margin-top:10px;">เอกสารเลขที่ : <?=$mainformno?></h5>

                        <input hidden type="text" name="getMaincode" id="getMaincode" value="<?=getMaincode($mainformno)?>">
                        <input hidden type="text" name="getFormStatus" id="getFormStatus" value="<?=getviewfulldata(getMaincode($mainformno))->m_status?>">

                        <!-- Head zone -->
						<div class="row headzone mt-3">

                        <!-- Edit Button -->
                        <a href="javascript:void(0)" class="editHeadDataA"
                            data_m_code="<?=getMaincode($mainformno)?>"
                            data_m_formno="<?=$mainformno?>"
                            data_m_order="<?=number_format(getviewfulldata(getMaincode($mainformno))->m_order , 3)?>"
                            data_m_batchsize="<?=number_format(getviewfulldata(getMaincode($mainformno))->m_batchsize , 3)?>"
                            data_m_run="<?=getviewfulldata(getMaincode($mainformno))->m_run?>"
                            data_m_worktype="<?=getviewfulldata(getMaincode($mainformno))->m_worktype?>"
                            data_m_worktype_no="<?=getviewfulldata(getMaincode($mainformno))->m_worktype_no?>"
                            data_m_pd="<?=getviewfulldata(getMaincode($mainformno))->m_product_number?>"
                            data_m_areaid="<?=getviewfulldata(getMaincode($mainformno))->m_areaid?>"
                        >
                            <i class="fa fa-edit mr-2 editHeadData" aria-hidden="true"></i>
                        </a>
                        <!-- Edit Button -->
                            <div class="col-md-4 form-group">
                                <label for=""><b>Machine Name</b></label>
                                <input type="text" name="m_template_name_v" id="m_template_name_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_template_name?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Production Number</b></label>
                                <input type="text" name="m_product_number_v" id="m_product_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_product_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Item Number</b></label>
                                <input type="text" name="m_item_number_v" id="m_item_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_item_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Batch Number</b></label>
                                <input type="text" name="m_batch_number_v" id="m_batch_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_batch_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Order (kg.)</b></label>
                                <input type="text" name="m_order_v" id="m_order_v" class="form-control" readonly value="<?=number_format(getviewfulldata(getMaincode($mainformno))->m_order , 3)?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Type of bag</b></label>
                                <input type="text" name="m_batchsize_v" id="m_batchsize_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_typeofbag?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Bag Text</b></label>
                                <input type="text" name="m_batchsize_v" id="m_batchsize_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_typeofbagtxt?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Batch Size</b></label>
                                <input type="text" name="m_batchsize_v" id="m_batchsize_v" class="form-control" readonly value="<?=number_format(getviewfulldata(getMaincode($mainformno))->m_batchsize , 3)?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Max. Temperature (°C)</b></label>
                                <input type="text" name="m_temperature_v" id="m_temperature_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_temperature?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Work Type</b></label>
                                <input type="text" name="m_worktype_v" id="m_worktype_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_worktype." ".getviewfulldata(getMaincode($mainformno))->m_worktype_no?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Run</b></label>
                                <input type="text" name="m_run_v" id="m_run_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_run?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Date</b></label>
                                <input type="text" name="m_datetime_v" id="m_datetime_v" class="form-control" readonly value="<?=conDateFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime)?>">
                            </div>

                            
                        </div>
                        <input hidden type="text" name="m_dataareaid_v" id="m_dataareaid_v" value="<?=getviewfulldata(getMaincode($mainformno))->m_dataareaid?>">
                        <input hidden type="text" name="sd_lastStatusCheck" id="sd_lastStatusCheck">
                        <!-- Head zone -->

                        

							
							<div class="tab mt-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a id="tabpage1" class="nav-link text-gray" data-toggle="tab" href="#page1" role="tab" aria-selected="true"><b>รายละเอียดเครื่องจักร</b></a>
									</li>
                                    <li class="nav-item">
										<a id="tabpage2" class="nav-link text-gray" data-toggle="tab" href="#page2" role="tab" aria-selected="true"><b>ตรวจสอบเครื่องจักร</b></a>
									</li>
									<li class="nav-item">
										<a id="tabpage3" class="nav-link text-gray" data-toggle="tab" href="#page3" role="tab" aria-selected="false"><b>Qc Sampling</b></a>
									</li>
                                    <li class="nav-item">
										<a id="tabpage4" class="nav-link text-gray" data-toggle="tab" href="#page4" role="tab" aria-selected="false"><b>Job Card</b></a>
									</li>
								</ul>
								<div class="tab-content">

									<div class="tab-pane fade" id="page1" role="tabpanel">
										<div class="pd-20">

                                            <div id="forPd_v">
                                                <!-- start button zone -->
                                                <div class="row startButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveStart" type="button" id="btn-start" class="btn btn-primary btn-start"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        ><i class="fa fa-play mr-2" aria-hidden="true"></i>Start</button>
                                                    </div>
                                                </div>
                                                <!-- start button zone -->

                                                <!-- stop button zone -->
                                                <div class="row stopButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveStop" type="button" id="btn-stop" class="btn btn-danger btn-stop"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        ><i class="fa fa-stop mr-2" aria-hidden="true"></i>Stop</button>
                                                    </div>
                                                </div>
                                                <!-- stop button zone -->

                                                <!-- Spoint Zone -->
                                                <div class="row spointzone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button type="button" class="btn btn-primary" id="btn-openSetPoint"
                                                            data_m_product_number="<?=getviewfulldata(getMaincode($mainformno))->m_product_number?>"
                                                            data_m_batch_number="<?=getviewfulldata(getMaincode($mainformno))->m_batch_number?>"
                                                            data_m_template_name="<?=getviewfulldata(getMaincode($mainformno))->m_template_name?>"
                                                            data_m_template_code="<?=getviewfulldata(getMaincode($mainformno))->m_template_code?>"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                            data_m_item_number="<?=getviewfulldata(getMaincode($mainformno))->m_item_number?>"
                                                        ><i class="fi-save mr-2"></i>บันทึก Reference</button>
                                                    </div>
                                                </div>
                                                <!-- Spoint Zone -->

                                                <!-- cancel button zone -->
                                                <div class="row cancelButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveCancel" type="button" id="btn-cancel" class="btn btn-danger btn-cancel"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        >Cancel</button>
                                                    </div>
                                                </div>
                                                <!-- cancel button zone -->
                                            </div>

                                            <div id="line_forPd_v" class="dropdown-divider"></div>


                                            <div id="speacial_section" class="row align-items-center mt-3" style="display:none;">
                                                <div class="col-md-12 text-center">
                                                    <h4>ข้อแนะนำพิเศษ</h4>
                                                </div>
                                            </div>

                                            <div id="otherImage_view_section" class="row form-group" style="display:none;">
                                                <div class="col-md-12">
                                                    <label for=""><b>รูปภาพอื่นๆ</b></label>
                                                    <div id="show_otherImage_viewpage"></div>
                                                </div>
                                            </div>

                                            <div id="templateRemark_view_section" class="row form-group" style="display:none;">
                                                <div class="col-md-12">
                                                    <label for=""><b>หมายเหตุ</b></label>
                                                    <textarea name="show_templateRemark" id="show_templateRemark" cols="30" rows="10" class="form-control" style="height:100px;" readonly></textarea>
                                                </div>
                                            </div>


                                            <!-- Show Detail Zone -->
                                            <div id="show_ref"></div>
                                            <div id="show_detail"></div>
										</div>
									</div>

									<div class="tab-pane fade" id="page2" role="tabpanel">
										<div class="pd-20">
                                            <div id="showMachineCheck"></div>
										</div>
									</div>

                                    <div class="tab-pane fade" id="page3" role="tabpanel">
										<div class="pd-20">
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div id="showQcSampling" class="col-lg-10" style="width:100%"></div>
                                                <div class="col-lg-1"></div>
                                            </div>

                                            <div id="showCheckGraph" class="row mt-5"></div>


                                            <div class="row mt-4">
                                                <div class="col-lg-12">
                                                    <div id="showGraphMain"></div>
                                                </div>
                                            </div>
										</div>
									</div>

                                    <div class="tab-pane fade" id="page4" role="tabpanel">
										<div class="pd-20">
                                            <div id="showJobcard" class="row"></div>
                                        </div>
									</div>

								</div>
							</div>

                        <div class="row form-group text-center">
                            <div class="col-md-4">
                                <span><b>Start By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_start?></span><br>
                                <span><b>Start Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_start)?></span>
                            </div>
                            <div class="col-md-4">
                                <span><b>Modify By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_modify?></span><br>
                                <span><b>Modify Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_modify)?></span>
                            </div>
                            <div class="col-md-4">
                                <span><b>Stop By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_stop?></span><br>
                                <span><b>End Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_stop)?></span>
                            </div>
                        </div>

					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>



<script>

$(document).ready(function(){
    clearLocalstorage();
    // checkFormStatus();

    // $(document).on('click' , '#btn-saveSetpoint' , function (){
    //     saveSpoint();
    // });
    let userposi = "<?php echo getUser()->posi; ?>";
    let userdeptcode = "<?php echo getUser()->DeptCode; ?>";
    let userecode = "<?php echo getUser()->ecode; ?>";
    let get_templatecode = "<?php echo getviewfulldata(getMaincode($mainformno))->m_template_code ?>";


    loadTabSelect();


    let spointData = [];
    let runData = [];
    let beforeStartImage = "";

    let itemSequenceArray_mdv = [];
    let stepSequenceArray_mdv = [];

    let itemSequenceArray_mdve = [];
    let stepSequenceArray_mdve = [];

    let itemSequenceArray_mdve2 = [];
    let stepSequenceArray_mdve2 = [];

    let itemcheckTemplateArray = [];
    let itemCheckListArray = [];

    let m_code = $('#getMaincode').val();
    loadRefActual_edit(m_code);


    checkFormStatus();
    // loadDetailData();
    loadRunDetailData();

    let viewfulldata_vue = new Vue({
        el:"#viewfulldata_vue",
        data:{
            title:"test",
        },
        methods: {
            saveSpoint()
            {
                $('#setpoint_modal').modal('hide');
                $('.loader').fadeIn(800);
                const form = $('#frm_saveSpoint')[0]
                const data = new FormData(form);

                axios.post(url+'main/saveSpoint' , data ,{
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res => {
                    console.log(res);
                    // location.reload();
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                        // $('.loader').fadeOut(800);
                        // viewfulldata_vue.checkFormStatus();
                        location.reload();
                    });
                }).catch(err => {
                    console.error('Err' , err);
                });
            },

            saveEditSpoint()
            {
                $('#setpointEdit_modal').modal('hide');
                $('.loader').fadeIn(800);
                const form = $('#frm_saveEditSpoint')[0]
                const data = new FormData(form);

                axios.post(url+'main/saveEditSpoint' , data ,{
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res => {
                    console.log(res);
                    // location.reload();
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                        // $('.loader').fadeOut(800);
                        // viewfulldata_vue.checkFormStatus();
                        location.reload();
                    });
                }).catch(err => {
                    console.error('Err' , err);
                });
            },

            saveEditSpointReal()
            {
                $('#setpointEdit2_modal').modal('hide');
                $('.loader').fadeIn(800);
                const form = $('#frm_saveEditSpointReal')[0]
                const data = new FormData(form);

                axios.post(url+'main/saveEditSpointReal' , data ,{
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res => {
                    console.log(res);
                    // location.reload();
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                        // $('.loader').fadeOut(800);
                        // viewfulldata_vue.checkFormStatus();
                        location.reload();
                    });
                }).catch(err => {
                    console.error('Err' , err);
                });
            },

            saveStart()
            {
                $('.loader').fadeIn(400);
                const data_m_code = $('.btn-start').attr("data_m_code");
                axios.post(url+'main/saveStart',{
                    action:"saveStart",
                    m_code:data_m_code
                }).then(res=>{
                    console.log(res);
                    if(res.data.status == "Update Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });

                    }else{
                        swal({
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });
                    }
                })
            },

            saveCancel()
            {
                swal({
                    title: 'ต้องการยกเลิกเอกสารใบนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {
                    if(result.value == true){
                        $('#cancelMemo_modal').modal('show');

                        const machineName = $('#m_template_name_v').val();
                        const batchNumber = $('#m_batch_number_v').val();
                        const productNumber = $('#m_product_number_v').val();
                        const itemNumber = $('#m_item_number_v').val();

                        let title = '';
                        title +=`
                        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
                        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
                        `;

                        $('#cancelMemoTitle').html(title);
                    }
                });
            },


            saveMemoCancel()
            {
                $('.loader').fadeIn(400);
                const data_m_code = $('.btn-cancel').attr("data_m_code");
                const m_memo_v2 = $('#m_memo_v2').val();
                axios.post(url+'main/saveCancel',{
                    action:"saveCancel",
                    m_code:data_m_code,
                    m_memo:m_memo_v2
                }).then(res=>{
                    console.log(res);
                    if(res.data.status == "Update Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });

                    }else{
                        swal({
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });
                    }
                });
            },

            saveStop()
            {
                swal({
                    title: 'ต้องการ Stop เอกสารนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {

                    if(result.value == true){
                        $('#mainMemo_modal').modal('show');

                        const machineName = $('#m_template_name_v').val();
                        const batchNumber = $('#m_batch_number_v').val();
                        const productNumber = $('#m_product_number_v').val();
                        const itemNumber = $('#m_item_number_v').val();

                        let title = '';
                        title +=`
                        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
                        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
                        `;

                        $('#mainMemoTitle').html(title);
                    }

                });

            },

            saveMemoStop()
            {
                const getMaincode = $('#getMaincode').val();
                const m_memo_v = $('#m_memo_v').val();

                axios.post(url+'main/saveMemoStop' , {
                    action:"saveMemoStop",
                    maincode:getMaincode,
                    mainmemo:m_memo_v
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        axios.post(url+'main/saveStop',{
                            action:"saveStop",
                            m_code:getMaincode
                        }).then(res=>{
                            console.log(res);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });

                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            },


            saveRunDetail()
            {
                // Check Data Request
                $('#btn-saveRunDetail').prop('disabled' , true);

                if($('#mdrd_chooseTime').val() != ""){

                    const form = $('#frm_saveRunDetail')[0];
                    const data = new FormData(form);

                    axios.post(url+'main/saveRunDetail' ,data, {
                        header:{
                            'Content-Type' : 'multipart/form-data'
                        },
                    }).then(res=>{
                        console.log(res.data);
                        if(res.data.status == "Insert Data Success"){
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                // $('.loader').fadeOut(800);
                                // viewfulldata_vue.checkFormStatus();
                                location.reload();
                            });
                        }else{
                            swal({
                                title: 'บันทึกข้อมูลไม่สำเร็จ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:800
                            });
                        }
                    });
                }else if($('#mdrd_chooseTime').val() == ""){
                    swal({
                        title: 'กรุณาเลือกเวลาเดินงาน',
                        type: 'error',
                        showConfirmButton: false,
                        timer:800
                    });
                    $('#btn-saveRunDetail').prop('disabled' , false);
                }

                

            },

            saveRunDetailEdit()
            {
                if($('#listOfRunGroup').val() != ""){

                    // check Start time and finish time
                    let startTime = $('#mdrd_chooseTime_edit').val();
                    let finishTime = $('#mdrd_chooseTimeFinish_edit').val();

                    const dates_start = Date.parse(startTime);
                    const dates_finish = Date.parse(finishTime);

                    if(dates_start > dates_finish){
                        console.log('เงื่อนไขไม่ถูกต้อง');
                    }else{
                        console.log('เงื่อนไขถูกต้อง');
                    }

                    if(startTime == ""){
                        swal({
                            title: 'กรุณาระบุเวลาเริ่ม',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                    }else if(finishTime == ""){
                        swal({
                            title: 'กรุณาระบุเวลาจบ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                    }else if(dates_start > dates_finish){
                        swal({
                            title: 'กรุณาตรวจสอบเวลาเริ่มและเวลาจบอีกครั้ง',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                    }else{
                        $('#btn-saveRunDetail_edit').prop('disabled' , true);
                        const form = $('#frm_saveRunDetailEdit')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveRunDetailEdit' , data , {
                            header:{
                                'Content-Type' : 'multipart/form-data'
                            },
                        }).then(res => {
                            console.log(res.data);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'แก้ไขข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    location.reload();
                                });
                                
                            }else{
                                $('#btn-saveRunDetail_edit').prop('disabled' , false);
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จกรุณาลองใหม่',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                })
                            }
                        });
                    }

                }else{
                    swal({
                        title: 'กรุณาเลือกช่วงเวลาที่ต้องการแก้ไข',
                        type: 'warning',
                        showConfirmButton: false,
                        timer:800
                    });
                }
            },


            deleteRunDetail()
            {
                if($('#listOfRunGroup').val() != ""){

                    swal({
                            title: 'ต้องการลบรายการนี้ ใช่หรือไม่',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText:'ยกเลิก'
                        }).then((result)=> {
                            if(result.value == true){
                                const form = $('#frm_saveRunDetailEdit')[0];
                                const data = new FormData(form);

                                axios.post(url+'main/deleteRunDetail' , data , {
                                    header:{
                                        'Content-Type' : 'multipart/form-data'
                                    },
                                }).then(res => {
                                    console.log(res.data);
                                    if(res.data.status == "Delete Data Success"){
                                        swal({
                                            title: 'ลบข้อมูลสำเร็จ',
                                            type: 'success',
                                            showConfirmButton: false,
                                            timer:800
                                        }).then(function(){
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        });
                    

                        

                    
                }else{
                    swal({
                        title: 'กรุณาเลือกรายการที่ต้องการลบ',
                        type: 'warning',
                        showConfirmButton: false,
                        timer:800
                    });
                }

                console.log($('#listOfRunGroup').val());
            },

            saveEditHead()
            {
                axios.post(url+'main/saveEditHead' ,{
                    action:"saveEditHead",
                    m_order:$('#ehmd_order').val(),
                    m_code:$('#ehmd_mcode').val(),
                    m_run:$('#ehmd_run').val(),
                    m_batchsize:$('#ehmd_batchsize').val(),
                    m_worktype:$('#ehmd_worktype').val(),
                    m_worktype_no:$('#ehmd_worktype_no').val(),
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                // $('.loader').fadeOut(800);
                                // viewfulldata_vue.checkFormStatus();
                                location.reload();
                            });
                    }
                });
            },

            saveMachineCheck()
            {
                if($('#mcmd_mcode').val() != ""){
                    const form = $('#frm_saveMachineCheck')[0];
                    const data = new FormData(form);
                    axios.post(url+'main/saveMachineCheck' , data , {

                    }).then(res=>{
                        console.log(res.data);
                        if(res.data.status == "Insert Data Success"){
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                location.reload();
                            });
                        }else if(res.data.status == "Insert Data Not Success Found Duplicate Data"){
                            swal({
                                title: 'บันทึกข้อมูลไม่สำเร็จ พบข้อมูลซ้ำในระบบ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }
                    });
                }
            },

            saveEditMachineCheck()
            {
                if($('#lineGroupForEdit').val() != ""){
                    const form = $('#frm_saveMachineCheckEdit')[0];
                    const data = new FormData(form);

                    axios.post(url+'main/saveEditMachineCheck' , data , {

                    }).then(res => {
                        console.log(res.data);
                        if(res.data.status == "Update Data Success"){
                            swal({
                                title: 'อัพเดตข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                location.reload();
                            });
                        }
                    });
                }else{
                    $('#lineGroupForEdit').addClass('inputNull');
                }
            },

            deleteMachineCheck()
            {
                swal({
                title: 'ต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        let lineGroupForEdit = $('.lineGroupForEdit').val();
                        let m_code = $('#mcmd_mcodeEdit').val();

                        if(lineGroupForEdit != "" && m_code != ""){
                            axios.post(url+'main/deleteMachineCheck' , {
                                action:"deleteMachineCheck",
                                m_code:m_code,
                                linenum_group:lineGroupForEdit
                            }).then(res=>{
                                console.log(res.data);
                                if(res.data.status == "Delete Data Success"){
                                    swal({
                                        title: 'ลบข้อมูลสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer:800
                                    }).then(function(){
                                        location.reload();
                                    });
                                }
                            });
                        }
                    }
                });
            },



        },
        created() {
            // this.checkFormStatus();
            // this.loadDetailData();
            // this.loadRunDetailData();
            console.log('create');
        },
        mounted() {
            console.log('mounted');
        },
    });

    loadQcSampling();

    $('#btn-openSetPoint').click(function(){
        itemSequenceArray_mdv = [];
        stepSequenceArray_mdv = [];

        const data_m_product_number = $(this).attr("data_m_product_number");
        const data_m_batch_number = $(this).attr("data_m_batch_number");
        const data_m_template_name = $(this).attr("data_m_template_name");
        const data_m_template_code = $(this).attr("data_m_template_code");
        const data_m_code = $(this).attr("data_m_code");
        const data_m_item_number = $(this).attr("data_m_item_number");

        $('#setpoint_modal').modal('show');

        let spointTextTitle = `
            <span><b>Machine Name : </b>`+data_m_template_name+`</span>&nbsp;&nbsp;
            <span><b>Batch Number : </b>`+data_m_batch_number+`</span><br>
            <span><b>Product Number : </b>`+data_m_product_number+`</span>&nbsp;&nbsp;
            <span><b>Item Number : </b>`+data_m_item_number+`</span>
        `;
        $('#spointTitle').html(spointTextTitle);
        $('#mdsp_m_code').val(data_m_code);
        $('#checkTemplateCode').val(data_m_template_code);
        // loadSpoint(data_m_template_code);
        loadSubDetailData(data_m_template_code);
    });


    //Zone เพิ่มข้อมูลการทำงาน
    $(document).on('click' , '.add-detail' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_ref_code = $('#ref_code_input').val();
        const data_ref_typeactive = $(this).attr("data_ref_typeactive");

        // check ref active
        if($('#ref_code_input').val() != ""){
            $('#runDetail_modal').modal('show');
            $('.imageZone').css('display' , '');
            $('#mdrd_m_code').val(data_m_code);
            $('#div_choice_method').css('display','');
            $('#mdrd_refcode').val(data_ref_code);
            // loadSpointInMainData(data_m_code);
            getbatchCount(data_m_code);

            const machineName = $('#m_template_name_v').val();
            const batchNumber = $('#m_batch_number_v').val();
            const productNumber = $('#m_product_number_v').val();
            const itemNumber = $('#m_item_number_v').val();

            let title = '';
            title +=`
            <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
            <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
            `;

            $('#runDetailTitle').html(title);

            loadReferenceActual(data_m_code);
            loadReferenceTemplate(data_m_code);
            loadReferenceRealActual(data_m_code);
            loadRefActual_edit2(m_code);
            // show_reflistfn(m_code);

            if(data_ref_typeactive == "Actual"){
                $('#show_actual').css('display','');
                $('#show_template').css('display','none');
            }else if(data_ref_typeactive == "Template"){
                $('#show_template').css('display','');
                $('#show_actual').css('display','none');
            }


            //Zone load item check list
            loaditemForusecheckList(data_m_code , data_ref_code);
        }else{
            swal({
                title: 'กรุณาเลือก Reference ที่ต้องการใช้งาน',
                type: 'warning',
                showConfirmButton: false,
                timer:1000
            });
        }
    });
    //Zone เพิ่มข้อมูลการทำงาน



    function loaditemForusecheckList(data_m_code , data_ref_code)
    {
        if(data_m_code != "" && data_ref_code != ""){
            axios.post(url+'main/loaditemForusecheckList',{
                action:"loaditemForusecheckList",
                m_code:data_m_code,
                ref_code:data_ref_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let itemList = res.data.itemSequenceForcheck;
                    let itemcheckTemplate = res.data.itemchecklistTemplate;

                    itemcheckTemplateArray = res.data.itemchecklistTemplate;
                    itemCheckListArray = res.data.itemSequenceForcheck;

                    let output ='';

                    output +=`
                <div class="table-responsive">
                    <table id="itemcheck_tbl" class="table table-bordered table-striped">
                        <tr>
                            <th class="itemcheck_tbl_c1" style="text-align:center;">วัตถุดิบ</th>
                            <th class="itemcheck_tbl_c2" style="text-align:center;">
                                <span>การตรวจใช้วัตถุดิบในการผลิต</span><br>
                                <input class="itemcb cbuse_all" type="checkbox" id="cbuse_all" name="cbuse_all">
                            </th>`;
                        for(let i = 0; i < itemcheckTemplate.length; i++){
                            output +=`
                            <th class="itemcheck_tbl_c3" style="text-align:center;">
                                <span>`+itemcheckTemplate[i].it_listname+`</span><br>
                            <input style="text-align:center;" class="itemcb cb_all" type="checkbox" id="cb_all_`+itemcheckTemplate[i].it_autoid+`" name="cb_all" value="`+itemcheckTemplate[i].it_autoid+`">
                            </th>
                            `;
                        }
                    output +=`        
                        </tr>`;

                        for(let i = 0; i < itemList.length; i++){
                            output +=`
                        <tr>
                            <td style="text-align:center;">`+itemList[i].ref_detail_name+`</td>
                            <td style="text-align:center;">
                                <input class="itemcbm cbuse" type="checkbox" id="itemcheckBoxUse" name="itemcheckBoxUse[]" value="ผ่าน" data_linenum="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" class="itemvalm" id="item_valuem_`+itemList[i].ref_linenum+`" name="item_valuem[]">
                                <input hidden type="text" id="itemUseCheck" name="itemUseCheck[]" value="`+itemList[i].ref_detail_name+`">
                                <input hidden type="text" id="item_linenum" name="item_linenum[]" value="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" id="item_ref_code" name="item_ref_code[]" value="`+itemList[i].ref_code+`">
                                <input hidden type="text" id="item_listnameUse" name="item_listnameUse[]" value="การตรวจใช้">
                            </td>
                            `;
                            for(let ii = 0; ii < itemcheckTemplate.length; ii++){
                                output +=`
                            <td style="text-align:center;">
                                <input class="itemcb itemcheckBox_`+itemcheckTemplate[ii].it_autoid+`" type="checkbox" id="itemcheckBox_`+itemList[i].ref_linenum+itemcheckTemplate[ii].it_autoid+`" name="itemcheckBox[]" value="ok" data_autoid="`+itemcheckTemplate[ii].it_autoid+`" data_linenum="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" class="itemval_`+itemcheckTemplate[ii].it_autoid+`" id="item_value_`+itemList[i].ref_linenum+itemcheckTemplate[ii].it_autoid+`" name="item_value2[]">
                                <input hidden type="text" id="item_listname" name="item_listname[]" value="`+itemcheckTemplate[ii].it_listname+`">
                                <input hidden type="text" id="item_ref_code2" name="item_ref_code2[]" value="`+itemList[i].ref_code+`">
                                <input hidden type="text" id="item_linenum2" name="item_linenum2[]" value="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" id="itemUseCheck2" name="itemUseCheck2[]" value="`+itemList[i].ref_detail_name+`">
                            </td>
                                `;
                            }
                    output +=`
                        </tr>`;
                        }

                    output +=`
                    </table>
                </div>
                    `;

                    $('#showItemCheckList').html(output);


                }
            });
        }
    }

    function loaditemForusecheckList_edit(data_m_code , data_ref_code)
    {
        if(data_m_code != "" && data_ref_code != ""){
            axios.post(url+'main/loaditemForusecheckList_edit',{
                action:"loaditemForusecheckList_edit",
                m_code:data_m_code,
                ref_code:data_ref_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let itemList = res.data.itemSequenceForcheck;
                    let itemcheckTemplate = res.data.itemchecklistTemplate;

                    itemcheckTemplateArray = res.data.itemchecklistTemplate;
                    itemCheckListArray = res.data.itemSequenceForcheck;

                    let output ='';

                    output +=`
                <div class="table-responsive">
                    <table id="itemcheck_tbl" class="table table-bordered table-striped">
                        <tr>
                            <th style="text-align:center;">วัตถุดิบ</th>
                            <th style="text-align:center;">
                                <span>การตรวจใช้วัตถุดิบในการผลิต</span><br>
                                <input class="itemcb cbuse_all" type="checkbox" id="cbuse_all" name="cbuse_all">
                            </th>`;
                        for(let i = 0; i < itemcheckTemplate.length; i++){
                            output +=`
                            <th style="text-align:center;"><span>`+itemcheckTemplate[i].it_listname+`</span><br>
                            <input style="text-align:center;" class="itemcb cb_all" type="checkbox" id="cb_all_`+itemcheckTemplate[i].it_autoid+`" name="cb_all" value="`+itemcheckTemplate[i].it_autoid+`">
                            </th>
                            `;
                        }
                    output +=`        
                        </tr>`;

                        for(let i = 0; i < itemList.length; i++){
                            output +=`
                        <tr>
                            <td style="text-align:center;">`+itemList[i].ref_detail_name+`</td>
                            <td style="text-align:center;">
                                <input class="itemcb cbuse" type="checkbox" id="itemcheckBoxUse" name="itemcheckBoxUse[]" value="ผ่าน">
                                <input hidden type="text" id="itemUseCheck" name="itemUseCheck[]" value="`+itemList[i].ref_detail_name+`">
                                <input hidden type="text" id="item_linenum" name="item_linenum[]" value="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" id="item_ref_code" name="item_ref_code[]" value="`+itemList[i].ref_code+`">
                                <input hidden type="text" id="item_listnameUse" name="item_listnameUse[]" value="การตรวจใช้">
                            </td>
                            `;
                            for(let ii = 0; ii < itemcheckTemplate.length; ii++){
                                output +=`
                            <td style="text-align:center;">
                                <input class="itemcb itemcheckBox_`+itemcheckTemplate[ii].it_autoid+`" type="checkbox" id="itemcheckBox_`+itemList[i].ref_linenum+itemcheckTemplate[ii].it_autoid+`" name="itemcheckBox[]" value="ok" data_autoid="`+itemcheckTemplate[ii].it_autoid+`" data_linenum="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" class="itemval_`+itemcheckTemplate[ii].it_autoid+`" id="item_value_`+itemList[i].ref_linenum+itemcheckTemplate[ii].it_autoid+`" name="item_value2[]">
                                <input hidden type="text" id="item_listname" name="item_listname[]" value="`+itemcheckTemplate[ii].it_listname+`">
                                <input hidden type="text" id="item_ref_code2" name="item_ref_code2[]" value="`+itemList[i].ref_code+`">
                                <input hidden type="text" id="item_linenum2" name="item_linenum2[]" value="`+itemList[i].ref_linenum+`">
                                <input hidden type="text" id="itemUseCheck2" name="itemUseCheck2[]" value="`+itemList[i].ref_detail_name+`">
                            </td>
                                `;
                            }
                    output +=`
                        </tr>`;
                        }

                    output +=`
                    </table>
                </div>
                    `;

                    $('#showItemCheckList_edit').html(output);


                }
            });
        }
    }

    $(document).on('click' , '.cbuse_all' , function(){
        
        if($(this).prop('checked') == true){
            $('input:checkbox[id=itemcheckBoxUse]').prop('checked' , true);
            $('.itemvalm').val('ผ่าน');
            console.log('click');
        }else{
            $('input:checkbox[id=itemcheckBoxUse]').prop('checked' , false);
            console.log('not click');
            $('.itemvalm').val('');
        }
    });

    $(document).on('click' , '.cb_all' , function(){
        const autoid = $(this).val();

        if($(this).prop('checked') == true){
            $('.itemval_'+autoid).val('ผ่าน');
            $('.itemcheckBox_'+autoid).prop('checked' , true);
            console.log('click');
        }else{
            console.log('not click');
            $('.itemval_'+autoid).val('');
            $('.itemcheckBox_'+autoid).prop('checked' , false);
        }
    });

    $(document).on('click' , '.itemcb' , function(){
        const data_autoid = $(this).attr("data_autoid");
        const data_linenum = $(this).attr("data_linenum");

        if($(this).prop('checked') == true){
            console.log('click');
            $('#item_value_'+data_linenum+data_autoid).val('ผ่าน');
        }else{
            console.log('not click');
            $('#item_value_'+data_linenum+data_autoid).val('');
        }

        
    });


    $(document).on('click' , '.cbuse' , function(){
        const data_linenum = $(this).attr("data_linenum");
        if($(this).prop('checked') == true){
            console.log('click');
            $('#item_valuem_'+data_linenum).val('ผ่าน');
        }else{
            console.log('not click');
            $('#item_valuem_'+data_linenum).val('');
        }
    });







    $(document).on('click' , '.runImageI' , function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>รูปภาพ</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        loadImageRunDetailForShow(data_maincode , data_detailcode);
    });

    $(document).on('click','.beforeImageI',function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");
        const data_imageType = $(this).attr("data_imageType");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>รูปภาพก่อนเดินเครื่อง</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        loadImageBeforeStart(data_maincode,data_detailcode,data_imageType);
    });

    $(document).on('click' , '.runMemo' , function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");
        const data_memo = $(this).attr("data_memo");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>หมายเหตุ</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailMemoTitle').html(title);

        $('#runDetailMemo_modal').modal('show');
        let memoText = `
        <textarea id="" name="" cols="10" rows="10" class="form-control" readonly>`+data_memo+`</textarea>
        `;
        $('#showMemoRunDetail').html(memoText);
    });


    $(document).on('click','.edit-detail',function(){
        const m_code = $('#getMaincode').val();

        $('#mdrde_m_code').val(m_code);
        $('#editRunDetail_modal').modal('show');
        loadRunGroupList(m_code);
 
        $('#editRunDetail_section').css('display' , 'none');

        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;

        $('#runDetailEditTitle').html(title);


    });


    $(document).on('change' ,'.selectDetailEdit' , function(){
        const d_code = $(this).val();
        const m_code = $('#getMaincode').val();
        const ref_code = $('#ref_code_input').val();

        $('#editRunDetail_section').css('display' , '');


        //Zone load item check list
        // loaditemForusecheckList_edit(m_code , ref_code);
        loadItemcheckview_edit(m_code , d_code);


        loadDataForEdit(m_code , d_code);
        
    });


    $(document).on('click' , '.imageDelEdit' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_d_code = $(this).attr("data_d_code");
        const data_f_name = $(this).attr("data_f_name");
        const data_f_path = $(this).attr("data_f_path");
        const data_f_autoid = $(this).attr("data_f_autoid");

            swal({
                title: 'ต้องการลบรูปนี้ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        deleteFileEdit(data_m_code , data_d_code , data_f_name , data_f_path , data_f_autoid);
                    }
                });
    });


    $(document).on('click' , '.imageDelSpointEdit' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_f_name = $(this).attr("data_f_name");
        const data_f_path = $(this).attr("data_f_path");
        const data_f_autoid = $(this).attr("data_f_autoid");

            swal({
                title: 'ต้องการลบรูปนี้ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        deleteFileSpointEdit(data_m_code , data_f_name , data_f_path , data_f_autoid);
                    }
                });
    });


    $(document).on('click' , '.close_runDetail_modal' , function(){
        // $('#frm_saveRunDetail input').val('');
        $('.fileinput-remove').trigger('click');
        
        $('input:radio[name="choice_method"]').prop('checked' , false);

        $('#addRun_section').css('display','none');

        $('#mdrd_chooseTime').val('');
        $('#mdrd_d_run_memo').val('');

        itemSequenceArray_mdve2 = [];
        stepSequenceArray_mdve2 = [];
    });



    $(document).on('click' , '.areaD' , function(){
        $('.arrowArea').css('display' , '');
        const data_linenum_group = $(this).attr("data_linenum_group");
        dataGroupSelected(data_linenum_group);
    });


    $(document).on('click' , '.runDownArrow_detail' , function(){
        const initialIndex = parseInt($(this).attr('data_indexofarray'));
        const finalIndex = initialIndex+1 ;
        const data_linenum_group = $(this).attr('data_linenum_group');

        // console.log(data_linenum_group);

        runData = moveElement(runData,initialIndex,finalIndex);
        checkFormStatus();
        dataGroupSelected(data_linenum_group);
        // document.getElementById("selectTime_"+data_linenum_group).scrollIntoView();
        console.log(runData);

        for(let i = 0; i < runData.length; i ++){
            axios.post(url+'main/updateLinenumGroup',{
                action:"updateLinenumGroup",
                detailcode:runData[i].detailcode,
                d_linenum_group:i+1
            }).then(res=>{
                console.log(res.data);
            });
        }
    });



    $(document).on('click' , '.runUpArrow_detail' , function(){
        const initialIndex = $(this).attr('data_indexofarray');
        const finalIndex = initialIndex-1 ;
        const data_linenum_group = $(this).attr('data_linenum_group');

        console.log(data_linenum_group);

        runData = moveElement(runData,initialIndex,finalIndex);
        checkFormStatus();
        // $('#selectTime_'+data_linenum_group).prop('checked' , true);
        dataGroupSelected(data_linenum_group);
        // document.getElementById("selectTime_"+data_linenum_group).scrollIntoView();
        for(let i = 0; i < runData.length; i ++){
            axios.post(url+'main/updateLinenumGroup',{
                action:"updateLinenumGroup",
                detailcode:runData[i].detailcode,
                d_linenum_group:i+1
            }).then(res=>{
                console.log(res.data);
            });
        }
    });


    $('#tabpage1').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_mix' , 'tabpage1');
    });
    $('#tabpage2').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_mix' , 'tabpage2');
      loadCheckMachinePage();
    });
    $('#tabpage3').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_mix' , 'tabpage3');
    });
    $('#tabpage4').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_mix' , 'tabpage4');
        let prodid = $('#m_product_number_v').val();
        let dataareaid = $('#m_dataareaid_v').val();
        let status = $('#getFormStatus').val();
        let formno = "<?php echo $mainformno; ?>";
      loaddatajobcard(prodid , dataareaid , status , formno);
    });


    $(document).on('click' , '.qclink' , function(){
        const data_qcSampleId = $(this).attr("data_qcSampleId");
        const data_qcSampleNum = $(this).attr("data_qcSampleNum");
        const data_areaId = $(this).attr("data_areaId");
        loadQcsamplingByLinenum(data_qcSampleId, data_qcSampleNum, data_areaId);

        $('#titleQcnumber').html(data_qcSampleNum);
        $('#qcsampling_modal').modal('show');

    });
    

    $(document).on('click','.testid_check',function(){
        const data_testid = $(this).attr("data_testid");
        const data_maincode = $(this).attr("data_maincode");
        // console.log(data_testid);
        // console.log(testIDShowArray.length);

        if($(this).prop('checked') == true){
            // console.log("Not check");
            testIDShowArray.push(data_testid);
            updateTestIDUse(testIDShowArray,data_maincode);
        }else{
            // console.log("check");
            testIDShowArray = arrayRemove(testIDShowArray , data_testid);
            updateTestIDUse(testIDShowArray,data_maincode);
        }
    });


    $(document).on('click' , '.editHeadDataA' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_m_formno = $(this).attr("data_m_formno");
        const data_m_order = $(this).attr("data_m_order");
        const data_m_batchsize = $(this).attr("data_m_batchsize");
        const data_m_run = $(this).attr("data_m_run");
        const data_m_worktype = $(this).attr("data_m_worktype");
        const data_m_worktype_no = $(this).attr("data_m_worktype_no");

        const data_m_pd = $(this).attr("data_m_pd");
        const data_m_areaid = $(this).attr("data_m_areaid");
        loadWorkTypeNoList_edit();

        $('#editHead_modal').modal('show');

        $('#ehmd_mcode').val(data_m_code);
        $('#ehTitle').html(data_m_formno);
        $('#ehmd_order').val(data_m_order);
        $('#ehmd_batchsize').val(data_m_batchsize);
        $('#ehmd_run').val(data_m_run);
        $('#ehmd_worktype').val(data_m_worktype);
        $('#ehmd_worktype_no').val(data_m_worktype_no);

        if(data_m_worktype == "Normal"){
            $('#ehmd_worktype_no').attr({
                "style": "pointer-events: none;",
            });
        }else{
            $('#ehmd_worktype_no').removeAttr("style");
        }

        $('#ehmd_worktype').attr({
            "data_m_pd":data_m_pd,
            "data_m_areaid":data_m_areaid,
            "data_m_worktype":data_m_worktype,
            "data_m_code":data_m_code,
            "data_m_formno":data_m_formno
        });

    });

    //Condition for edit head
    $(document).on('change' , '#ehmd_worktype' , function(){
        const data_m_pd = $(this).attr("data_m_pd");
        const data_m_areaid = $(this).attr("data_m_areaid");
        const data_m_worktype = $(this).attr("data_m_worktype");
        const data_m_code = $(this).attr("data_m_code");
        const data_m_formno = $(this).attr("data_m_formno");

        if($(this).val() == "Normal"){
            $('#ehmd_worktype_no').val('');
            $('#ehmd_worktype_no').attr({
                "style": "pointer-events: none;",
            });
        }else if($(this).val() == "Adjust"){
            checkpdforvalidatework_edit(data_m_pd , data_m_areaid , data_m_worktype , data_m_code , data_m_formno);
        }else{
            $('#ehmd_worktype_no').removeAttr("style");
        }
    });



    $(document).on('click' , '.export-detail' , function(){
        const data_m_code = $(this).attr('data_m_code');
        location.href = url+'main/exportdata/exportdataRun/'+data_m_code;
    });


    $(document).on('click' , '.addMachineCheck' , function(){
        const m_code = $(this).attr('data_m_code');
        const machine_name = $(this).attr('data_machine_name');
        const datetime = $(this).attr('data_datetime');
        const item_number = $(this).attr('data_item_number');
        const batch_number = $(this).attr('data_batch_number');


        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>รายการตรวจสอบเครื่องจักร</b></span><br>
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;


        $('#machineCheck_modal').modal('show');
        $('#mcmdTitle').html(title);
        $('#mck_machinename').val(machine_name);
        $('#mck_datetime').val(datetime);
        $('#mck_itemnumber').val(item_number);
        $('#mck_batchnumber').val(batch_number);
        $('#mcmd_mcode').val(m_code);
    });


    $(document).on('click' , '.editMachineCheck' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_machine_name = $(this).attr('data_machine_name');


        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>แก้ไขรายการตรวจสอบเครื่องจักร</b></span><br>
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;
      

        $('#machineCheckEdit_modal').modal('show');
        $('#mcmdTitleEdit').html(title);
        $('#mcmd_mcodeEdit').val(data_m_code);
        $('#mck_machinenameEdit').val(data_machine_name);
        
        loadCheckGroupForEdit(data_m_code);
    });


    $(document).on('change' , '.lineGroupForEdit' , function(){
        console.log($(this).val());
        if($(this).val() != ""){
            $('#lineGroupForEdit').removeClass('inputNull');
            $('#sectionEditData').css('display' , '');
            let m_code = $('#mcmd_mcodeEdit').val();
            let linegroup = $('#lineGroupForEdit').val();
            loadCheckMainPageEdit(m_code,linegroup);
        }else{
            $('#sectionEditData').css('display' , 'none');
        }
    });

    $(document).on('focus' , '.mdsp_d_run_value' , function(){
        $(this).select();
    });

    $(document).on('focus' , '.mdrd_d_run_value' ,function(){
        $(this).select();
    });

    $(document).on('focus' , '.mdrde_d_run_value' , function(){
        $(this).select();
    });

    $(document).on('click' , '.textAreaM' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_d_code = $(this).attr('data_d_code');
        const data_sd_status = $(this).attr('data_sd_status');
        const data_d_worktime = $(this).attr('data_d_worktime');
        const data_memo = $(this).attr('data_memo');
        const data_batchcount = $(this).attr('data_batchcount');
        const data_starttime = $(this).attr("data_starttime");

        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        // Check Dept
        if(userdeptcode == 1007 || userecode == "M1809"){
            let title = '';
            title +=`
            <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
            <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
            `;

            $('#runDetailTitle').html(title);

            if(data_sd_status != "Finish"){
                let timeNow = "<?php echo date('Y-m-d H:i:s');?>";
                $('#runDetail_modal').modal('show');
                $('.imageZone').css('display' , '');
                $('#addRun_section').css('display','');

                $('#mdrd_m_code').val(data_m_code);
                $('#mdrd_d_code').val(data_d_code);
                $('#mdrd_sd_status').val(data_sd_status);
                $('#mdrd_chooseTime').val(timeNow);
                $('#batchCount').val(data_batchcount);
                $('#mdrd_d_run_memo').val(data_memo);
                $('#mdrd_worktime_view').val(data_starttime);

                let textTime = `<b>กรุณาเลือกเวลาจบงาน</b>`;
                $('#textTime').html(textTime);
                $('#showProcess').html(data_sd_status);
                
            }else{
                swal({
                    title: 'การมิกซ์รอบนี้เสร็จเรียบร้อยแล้ว',
                    type: 'warning',
                    showConfirmButton: false,
                    timer:1000
                });
            }
        }else{
            swal({
                title: 'ท่านไม่สามารถเข้าใช้งานในส่วนนี้ได้',
                type: 'warning',
                showConfirmButton: false,
                timer:1000
            });
        }




    });

    $(document).on('click' , '.runImageII' , function(){
        const data_maincode = $(this).attr('data_maincode');
        const data_detailcode = $(this).attr('data_detailcode');

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        let title = '';
        title +=`
        <span><b>รูปภาพ โหลดของใส่ถาด</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        getImageLoadOven(data_maincode,data_detailcode,"โหลดของใส่ถาด");
    });


    $(document).on('click' , '.runImageIII' , function(){
        const data_maincode = $(this).attr('data_maincode');
        const data_detailcode = $(this).attr('data_detailcode');

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        let title = '';
        title +=`
        <span><b>รูปภาพ เทสี</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        getImageLoadOven(data_maincode,data_detailcode,"เทสี");
    });


    // Mix Zone
    $(document).on('click' , '.editHeadRefActual' , function(){

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();
        const maincode = $('#getMaincode').val();
        const data_ref_code = $(this).attr("data_ref_code");
        const data_ref_version = $(this).attr("data_ref_version");

        $('#mdspe_m_code').val(maincode);
        $('#mdspe_ref_code').val(data_ref_code);
        $('#mdspe_ref_version').val(data_ref_version);

        let title = '';
        title +=`
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#spointEditTitle').html(title);
        $('#runDetail_modal').modal('hide');
        $('#setpointEdit_modal').modal('show');
        createItemSequenceList_mdve(itemSequenceArray_mdve);
        createStepSequenceList_mdve(stepSequenceArray_mdve);
        
    });

    $(document).on('click' , '.editHeadRefActual2' , function(){

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();
        const maincode = $('#getMaincode').val();

        $('#mdspe_m_code2').val(maincode);

        let title = '';
        title +=`
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#spointEditTitle2').html(title);
        $('#runDetail_modal').modal('hide');
        $('#setpointEdit2_modal').modal('show');
        createItemSequenceList_mdve2(itemSequenceArray_mdve2);
        createStepSequenceList_mdve2(stepSequenceArray_mdve2);

    });

    function loadRefActual_edit(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadRefActual_edit' , {
                action:"loadRefActual_edit",
                maincode:m_code
            }).then(res=>{
                console.log(res.data);

                for(let i = 0; i < res.data.actualRef_item.length; i++){
                    itemSequenceArray_mdve.push(res.data.actualRef_item[i].ref_detail_name);
                }
                for(let i = 0; i < res.data.actualRef_step.length; i++){
                    stepSequenceArray_mdve.push(res.data.actualRef_step[i].ref_detail_name);
                }

            });
        }
    }

    function loadRefActual_edit2(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadRefActual_edit' , {
                action:"loadRefActual_edit",
                maincode:m_code
            }).then(res=>{
                console.log(res.data);

                for(let i = 0; i < res.data.actualRef_item.length; i++){
                    itemSequenceArray_mdve2.push(res.data.actualRef_item[i].ref_detail_name);
                }
                for(let i = 0; i < res.data.actualRef_step.length; i++){
                    stepSequenceArray_mdve2.push(res.data.actualRef_step[i].ref_detail_name);
                }

            });
        }
    }

// Condition Zone ######################################################################














// Function Zone ##########################################################################

    function loadCheckMainPageEdit(m_code,linegroup)
    {
        if(m_code != "" && linegroup != ""){
            axios.post(url+'main/loadCheckMainPageEdit' , {
                action:"loadCheckMainPageEdit",
                m_code:m_code,
                linegroup:linegroup
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let getCheckData = res.data.mcCheckEdit;
                    $('#mck_datetimeEdit').val(res.data.datetime);
                    $('#mck_itemnumberEdit').val(res.data.itemno);
                    $('#mck_batchnumberEdit').val(res.data.batchno);


                    let outputmd = '';
                    for(let i = 0; i < getCheckData.length; i++){
                        outputmd +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <label>`+getCheckData[i].mck_list+`</label>
                                <input hidden type="text" id="mck_autoid_edit" name="mck_autoid_edit[]" value="`+getCheckData[i].mck_autoid+`">
                            </div>
                            <div class="col-md-6">
                                <select id="mckval_edit" name="mckval_edit[]" class="form-control">
                                    <option value="`+getCheckData[i].mck_value+`">`+getCheckData[i].mck_value+`</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ผิดปกติ">ผิดปกติ</option>
                                    <option value="ไม่มีการใช้งาน">ไม่มีการใช้งาน</option>
                                    <option value="เครื่องจอด">เครื่องจอด</option>
                                </select>
                            </div>
                        </div>
                        `;
                    }

                    $('#showMachineCheckListEdit_md').html(outputmd);
                }
            })
        }
    }



    function loadTabSelect()
    {
        let tabSelect = localStorage.getItem('tab_mix');
        console.log(tabSelect);

        if(tabSelect == "tabpage1"){
            $('#tabpage1').addClass('active');
            $('#page1').addClass('active').addClass('show');
        }else if(tabSelect == "tabpage2"){
            $('#tabpage2').addClass('active');
            $('#page2').addClass('active').addClass('show');
            loadCheckMachinePage();
        }else if(tabSelect == "tabpage3"){
            $('#tabpage3').addClass('active');
            $('#page3').addClass('active').addClass('show');
        }else if(tabSelect == "tabpage4"){
            $('#tabpage4').addClass('active');
            $('#page4').addClass('active').addClass('show');

            let prodid = $('#m_product_number_v').val();
            let dataareaid = $('#m_dataareaid_v').val();
            let status = $('#getFormStatus').val();
            let formno = "<?php echo $mainformno; ?>";
            loaddatajobcard(prodid , dataareaid , status , formno);
        }else{
            $('#tabpage1').addClass('active');
            $('#page1').addClass('active').addClass('show');
        }
    }


    function loadSpoint(templatecode)
    {
        if(templatecode != ""){
            axios.post(url+'main/loadSpoint',{
                action:"loadSpoint",
                templatecode:templatecode
            }).then(res=>{
                console.log(res.data);
                let spointData = res.data.resultSetpoint;
                let output = '';

                for(let i = 0; i < spointData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointData[i].detail_column_name+`</b></span>
                                <input hidden type="text" id="mdsp_d_run_name" name="mdsp_d_run_name[]" value="`+spointData[i].detail_column_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdsp_d_run_value" name ="mdsp_d_run_value[]" class="form-control mdsp_d_run_value" value="`+spointData[i].detail_spoint+`">
                                <input hidden type="text" id="mdsp_d_run_min" name ="mdsp_d_run_min[]" value="`+spointData[i].detail_min+`">
                                <input hidden type="text" id="mdsp_d_run_max" name ="mdsp_d_run_max[]" value="`+spointData[i].detail_max+`">
                                <input hidden type="text" id="mdsp_d_linenum" name ="mdsp_d_linenum[]" value="`+spointData[i].detail_linenum+`">
                                <input hidden type="text" id="mdsp_d_templatecode" name ="mdsp_d_templatecode[]" value="`+spointData[i].detail_mastercode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromTemplate').html(output);
            });
        }
    }


    function loadSpointInMainData(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadSpointInMainData',{
                action:"loadSpointInMainData",
                m_code:m_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let output = '';

                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrd_d_run_name" name="mdrd_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrd_d_run_value" name ="mdrd_d_run_value[]" class="form-control mdrd_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrd_d_run_min" name ="mdrd_d_run_min[]" value="`+spointMainData[i].d_run_min+`">
                                <input hidden type="text" id="mdrd_d_run_max" name ="mdrd_d_run_max[]" value="`+spointMainData[i].d_run_max+`">
                                <input hidden type="text" id="mdrd_d_linenum" name ="mdrd_d_linenum[]" value="`+spointMainData[i].d_linenum+`">
                                <input hidden type="text" id="mdrd_d_templatecode" name ="mdrd_d_templatecode[]" value="`+spointMainData[i].d_templatecode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromMain').html(output);
            });
        }
    }


    function loadSpointForEdit(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadSpointForEdit',{
                action:"loadSpointForEdit",
                m_code:m_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let spointImage = res.data.spointImage;
                let output = '';

                output +=`
                    <h3>Run Screen</h3>
                    <div class="dropdown-divider"></div>
                    `;
                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrde_d_run_name" name="mdrde_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrde_d_run_value" name ="mdrde_d_run_value[]" class="form-control mdrde_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrde_d_autoid" name="mdrde_d_autoid[]" value="`+spointMainData[i].d_autoid+`"> 
                            </div>
                        </div>
                    `;
                }
                $('#showGroupDetailEdit').html(output);

                // Get Image Zone
                let imageSpointImageHtml = '';

                imageSpointImageHtml +=`
                <span><b>รูปก่อนการทำงาน</b></span>
                <div class="row form-group">`;
                    if(spointImage != null){
                        for(let i = 0; i < spointImage.length; i++){
                            imageSpointImageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 divImage mt-2">
                                    <img class="runImageView" src="`+url+spointImage[i].f_path+spointImage[i].f_name+`">
                                    <div class="iconZone">
                                        <i class="fa fa-trash imageDelSpointEdit" aria-hidden="true"
                                            data_m_code="`+m_code+`"
                                            data_f_name="`+spointImage[i].f_name+`"
                                            data_f_path="`+spointImage[i].f_path+`"
                                            data_f_autoid="`+spointImage[i].f_autoid+`"
                                        ></i>
                                    </div>
                                </div>
                                `;
                        }
                    }else{
                        imageSpointImageHtml +=`
                            <div class="col-md-12">
                                <span>ไม่พบรูปภาพ</span>
                            </div>
                            `;
                    }
                    imageSpointImageHtml +=`
                </div>
                `;
                $('#edit_showSpointImage').html(imageSpointImageHtml);
            });
        }
    }


    function loadDataProcessing(m_code , d_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadDataProcessing',{
                action:"loadDataProcessing",
                m_code:m_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let output = '';

                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrd_d_run_name" name="mdrd_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrd_d_run_value" name ="mdrd_d_run_value[]" class="form-control mdrd_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrd_d_run_min" name ="mdrd_d_run_min[]" value="`+spointMainData[i].d_run_min+`">
                                <input hidden type="text" id="mdrd_d_run_max" name ="mdrd_d_run_max[]" value="`+spointMainData[i].d_run_max+`">
                                <input hidden type="text" id="mdrd_d_linenum" name ="mdrd_d_linenum[]" value="`+spointMainData[i].d_linenum+`">
                                <input hidden type="text" id="mdrd_d_templatecode" name ="mdrd_d_templatecode[]" value="`+spointMainData[i].d_templatecode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromMain').html(output);
            });
        }
    }

    function loadImageRunDetailForShow(m_code,d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadImageRunDetailForShow',{
                action:"loadImageRunDetailForShow",
                m_code:m_code,
                d_code:d_code
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImage = res.data.imageRunDetail;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImage.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImage[i].f_path+resultImage[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImage[i].f_path+resultImage[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }

    function loadImageBeforeStart(m_code,d_code,imageType)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadImageBeforeStart',{
                action:"loadImageBeforeStart",
                m_code:m_code,
                d_code:d_code,
                imageType:imageType
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImageBeforeStart = res.data.imageBeforeStart;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImageBeforeStart.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImageBeforeStart[i].f_path+resultImageBeforeStart[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImageBeforeStart[i].f_path+resultImageBeforeStart[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }

    function getImageLoadOven(m_code,d_code,imageType)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/getImageLoadOven',{
                action:"getImageLoadOven",
                m_code:m_code,
                d_code:d_code,
                imageType:imageType
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImageLoadOven = res.data.imageLoadOven;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImageLoadOven.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImageLoadOven[i].f_path+resultImageLoadOven[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImageLoadOven[i].f_path+resultImageLoadOven[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }
    

    function loadRunGroupList(m_code)
    {
        axios.post(url+'main/loadRunGroupList',{
            action:"loadRunGroupList",
            m_code:m_code
        }).then(res => {
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let output =`
                <div class="row form-group">
                    <div class="col-md-12">
                `;
                output +=`
                <select name="listOfRunGroup" id="listOfRunGroup" class="form-control selectDetailEdit">
                <option value="">กรุณาเลือกรายการที่ต้องการแก้ไข</option>
                `;
                
                let runGroupLists = res.data.runGroupList;
                    for(let i = 0; i < runGroupLists.length; i++){
                        let condate = moment(runGroupLists[i].d_worktime).format('HH:mm:ss');

                        output +=`<option value="`+runGroupLists[i].d_detailcode+`">`+condate+`</option>`;
                    }
                output += `</select>`;
                output +=`
                    </div>               
                </div>`;

                $('#showRunGroupList').html(output);
            }
        });
    }


    function loadDataForEdit(m_code , d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadDataForEdit',{
                action:"loadDataForEdit",
                m_code:m_code,
                d_code:d_code
            }).then(res => {
                console.log(res.data);

                if(res.data.status == "Select Data Success"){
                    let startImageArray = res.data.startImage;
                    let finishImageArray = res.data.finishImage;
                    let memo = res.data.memo;
                    let starttime = res.data.detailTime.d_worktime;
                    let finishtime = res.data.detailTime.d_finishtime;

                    $('#mdrd_chooseTime_edit').val(starttime);
                    $('#mdrd_chooseTimeFinish_edit').val(finishtime);


                    let outputStartImage = '' ;
                    outputStartImage +=`
                    <div class="mt-3"></div>
                    <span><b>รูปภาพก่อนเริ่มงาน</b></span>
                        <div class="row form-group">`;

                    for(let i = 0; i < startImageArray.length; i++){
                        outputStartImage +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2 dImageEdit">
                                <a href="`+url+startImageArray[i].f_path+startImageArray[i].f_name+`" data-toggle="lightbox">
                                    <img class="runImageView" src="`+url+startImageArray[i].f_path+startImageArray[i].f_name+`">
                                </a>
                                <i aria-hidden="true" class="fa fa-trash mr-2 delStartImage"
                                    data_autoid="`+startImageArray[i].f_autoid+`"
                                    data_f_path="`+startImageArray[i].f_path+`"
                                    data_f_name="`+startImageArray[i].f_name+`"
                                    data_m_code="`+m_code+`"
                                    data_d_code="`+d_code+`"
                                ></i>
                            </div>
                        `;
                    }
                        outputStartImage +=`
                        </div>
                        `;
                    $('#startimage_editview').html(outputStartImage);


                    // Finish Image Section control
                    if(finishImageArray.length != 0){
                        $('#finishImage_section').css('display' , '');

                        let outputFinishImage = '' ;
                        outputFinishImage +=`
                        <div class="mt-3"></div>
                        <span><b>รูปภาพหลังเสร็จงาน</b></span>
                            <div class="row form-group">`;

                        for(let i = 0; i < finishImageArray.length; i++){
                            outputFinishImage +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 dImageEdit">
                                    <a href="`+url+finishImageArray[i].f_path+finishImageArray[i].f_name+`" data-toggle="lightbox">
                                        <img class="runImageView" src="`+url+finishImageArray[i].f_path+finishImageArray[i].f_name+`">
                                    </a>
                                    <i aria-hidden="true" class="fa fa-trash mr-2 delStartImage"
                                        data_autoid="`+finishImageArray[i].f_autoid+`"
                                        data_f_path="`+finishImageArray[i].f_path+`"
                                        data_f_name="`+finishImageArray[i].f_name+`"
                                        data_m_code="`+m_code+`"
                                        data_d_code="`+d_code+`"
                                    ></i>
                                </div>
                            `;
                        }
                            outputFinishImage +=`
                            </div>
                            `;
                        $('#finishimage_editview').html(outputFinishImage);
                    }else{
                        $('#finishimage_editview').html('');
                        $('#finishImage_section').css('display' , '');
                    }
                    // Finish Image Section control


                    // Memo Section Control
                    let resmemo = '';
                    if(memo != null){
                        resmemo = memo.me_memo;
                    }else{
                        resmemo = '';
                    }

                    let outputMemo = '';
                    outputMemo +=`
                    <div class="row form-group">
                        <div class="col-md-12 form-group">
                            <label for="">หมายเหตุ</label> 
                            <textarea name="edit_memo" id="edit_memo" cols="10" rows="5" class="form-control">`+resmemo+`</textarea>
                        </div>
                    </div>
                    `;

                    $('#memo_section').html(outputMemo);


                }

                
            });
        }
    }

    $(document).on('click' , '.delStartImage' , function(){
        const data_autoid = $(this).attr("data_autoid");
        const data_f_path = $(this).attr("data_f_path");
        const data_f_name = $(this).attr("data_f_name");
        const data_m_code = $(this).attr("data_m_code");
        const data_d_code = $(this).attr("data_d_code");

        deleteFileEdit(data_m_code , data_d_code , data_f_name , data_f_path , data_autoid);
    });


    function deleteFileEdit(m_code , d_code , f_name , f_path , f_autoid)
    {
        if(m_code != "" &&
        d_code != "" &&
        f_name != "" &&
        f_path != "" &&
        f_autoid != "")
        {
            axios.post(url+'main/deleteFileEdit' , {
                action:"deleteFileEdit",
                m_code:m_code,
                d_code:d_code,
                f_name:f_name,
                f_path:f_path,
                f_autoid:f_autoid
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Delete Data Success"){
                    swal({
                        title: 'ลบข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        loadDataForEdit(m_code , d_code);
                    });
                }else{
                    swal({
                        title: 'ลบข้อมูลไม่สำเร็จ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:800
                    })
                }
            });
        }
    }

 
    function deleteFileSpointEdit(m_code , f_name , f_path , f_autoid)
    {
        if(m_code != "" &&
        f_name != "" &&
        f_path != "" &&
        f_autoid != "")
        {
            axios.post(url+'main/deleteFileSpointEdit' , {
                action:"deleteFileSpointEdit",
                m_code:m_code,
                f_name:f_name,
                f_path:f_path,
                f_autoid:f_autoid
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Delete Data Success"){
                    swal({
                        title: 'ลบข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        loadSpointForEdit(m_code);
                    });
                }else{
                    swal({
                        title: 'ลบข้อมูลไม่สำเร็จ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:800
                    })
                }
            });
        }
    }


    function dataGroupSelected(linenum_group)
    {
        // console.log(linenum_group);
        // console.log(data_run_autoid);
        let linenumGroupArray = [];
        for(let i = 0; i < runData.length; i++){
            linenumGroupArray.push(runData[i].d_linenum_group);
        }
        console.log('LineGroup :'+linenumGroupArray);
        console.log('LineGroupNow :'+linenum_group);
        let index = linenumGroupArray.indexOf(linenum_group);
        console.log('index :'+index);

        // control arrow fix min and max
        let min = 0;
        let max = runData.length-1;

        if(index == min){
            $('.runDownArrow_detail').css('display' , '');
        }else if(index > min && index != max){
            $('.runDownArrow_detail').css('display' , '');
        }else if(index == max){
            $('.runDownArrow_detail').css('display' , 'none');
        }

        if(index == max){
            $('.runUpArrow_detail').css('display' , '');
        }else if(index < max && index != min){
            $('.runUpArrow_detail').css('display' , '');
        }else if(index == min){
            $('.runUpArrow_detail').css('display' , 'none');
        }

        if(min == 0 && max == 0){
            $('.runUpArrow_detail').css('display' , 'none');
            $('.runDownArrow_detail').css('display' , 'none');
        }

        // ส่งข้อมูลไปเก็บไว้ที่ Attr ของลูกศร
        $('.runDownArrow_detail , .runUpArrow_detail').attr({
            'data_indexofarray':index,
            'data_linenum_group':linenum_group
        });


        console.log('Min:'+min+' Max:'+max);
        console.log(linenum_group);
        // runAutoidArray = [];
        // index = null;

        localStorage.setItem('linenumGroup' , linenum_group);
        localStorage.setItem('indexofarray' , index);
    }


    function moveElement(array,initialIndex,finalIndex) 
    {
        array.splice(finalIndex,0,array.splice(initialIndex,1)[0])
        console.log(array);
        return array;
    }


    function checkFormStatus()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/checkFormStatus' , {
            action:"checkFormStatus",
            m_code:m_code
        }).then(res=>{
            // console.log(res);
            if(res.data.status == "Select Data Success"){
                let deptcode = "<?php echo getUser()->DeptCode; ?>";
                let ecode = "<?php echo getUser()->ecode; ?>";
                let posi = "<?php echo getUser()->posi; ?>";

                if(deptcode != "1007"){

                    if(ecode == "M1809" || ecode == "M0282"){
                        if(res.data.form_status == "Wait Start"){

                            $('.startButtonZone').css('display' , '');
                            $('.spointzone').css('display' , 'none');
                            createDataPage(m_code);

                        }else if(res.data.form_status == "Open"){

                            $('.spointzone').css('display' , '');
                            $('.startButtonZone').css('display' , 'none');
                            $('.cancelButtonZone').css('display' , '');
                            $('#checkPageMenu').css('display' , '');

                        }else if(res.data.form_status == "Start"){

                            $('.startButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');

                            if(userdeptcode == 1007 && userposi > 15 || userecode == "M1809"){
                                $('.stopButtonZone').css('display' , '');
                            }

                            $('.cancelButtonZone').css('display' , 'none');
                            // console.log(spointData);
                            createDataPage(m_code);

                            $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , '');
                            $('#checkPageMenu').css('display' , '');
                            $('.mainDivTable').css('display','');

                            $('#show_template_remark').css('display','');

                            // Other Image
                            getSpeacialData(get_templatecode);


                        }else if(res.data.form_status == "Cancel"){

                            $('.cancelButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');
                            $('.startButtonZone').css('display' , 'none');
                            $('.stopButtonZone').css('display' , 'none');

                            $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , 'none');
                            $('#checkPageMenu').css('display' , 'none');

                            $('.textAreaM').prop('disabled' , true);
                            $('.editHeadData').css('display' , 'none');

                        }else if(res.data.form_status == "Stop"){

                            $('.cancelButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');
                            
                            $('.startButtonZone').css('display' , 'none');
                            $('.stopButtonZone').css('display' , 'none');

                            $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                            $('#checkPageMenu').css('display' , 'none');

                            createDataPage(m_code);

                            $('.textAreaM').prop('disabled' , true);
                            $('.editHeadData').css('display' , 'none');
                            $('.mainDivTable').css('display','');
                            $('.export-detail').css('display' , '');
                            $('#show_template_remark').css('display','');

                            // Other Image
                            getSpeacialData(get_templatecode);

                        }
                    }else{
                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');
                        $('.startButtonZone').css('display' , 'none');
                        $('.stopButtonZone').css('display' , 'none');
                        $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        createDataPage(m_code);
                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');
                        $('.mainDivTable').css('display','');
                    }

                }else{
                    if(res.data.form_status == "Wait Start"){

                        $('.startButtonZone').css('display' , '');
                        $('.spointzone').css('display' , 'none');
                        createDataPage(m_code);

                    }else if(res.data.form_status == "Open"){

                        $('.spointzone').css('display' , '');
                        $('.startButtonZone').css('display' , 'none');
                        $('.cancelButtonZone').css('display' , '');
                        $('#checkPageMenu').css('display' , '');

                    }else if(res.data.form_status == "Start"){

                        $('.startButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');

                        if(userdeptcode == 1007 && userposi > 15 || userecode == "M1809"){
                            $('.stopButtonZone').css('display' , '');
                        }

                        $('.cancelButtonZone').css('display' , 'none');
                        // console.log(spointData);
                        createDataPage(m_code);

                        $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , '');
                        $('#checkPageMenu').css('display' , '');
                        $('.mainDivTable').css('display','');

                        $('#show_template_remark').css('display','');

                        // Other Image
                        getSpeacialData(get_templatecode);

                    }else if(res.data.form_status == "Cancel"){

                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');
                        $('.startButtonZone').css('display' , 'none');
                        $('.stopButtonZone').css('display' , 'none');

                        $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');

                    }else if(res.data.form_status == "Stop"){

                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');
                        
                        if(ecode == "M0085"){
                            $('.startButtonZone').css('display' , '');
                        }else{
                            $('.startButtonZone').css('display' , 'none');
                        }
                        
                        $('.stopButtonZone').css('display' , 'none');

                        $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        createDataPage(m_code);

                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');
                        $('.mainDivTable').css('display','');
                        $('.export-detail').css('display' , '');
                        $('#show_template_remark').css('display','');

                        // Other Image
                        getSpeacialData(get_templatecode);

                    }
                }





            }
        });
    }



    function createDataPage(m_code)
    {
        loadReferenceAll(m_code);
        let output = '';
        output +=`
            <div id="forPd_v2" class="row form-group">
                <div class="col-md-12">
                    <button style="display:none;" type="button" id="add-detail" class="btn btn-primary add-detail"
                        data_m_code="`+m_code+`"
                    ><i class="fi-plus mr-2"></i>เพิ่มข้อมูล</button>
                    <button style="display:none;" type="button" id="edit-detail" class="btn btn-warning edit-detail">
                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>แก้ไขข้อมูล</button>
                    <button style="display:none;" type="button" id="export-detail" class="btn btn-info export-detail"
                        data_m_code="`+m_code+`"
                    ><i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>ส่งออกข้อมูล</button>
                </div>
            </div>
            
            <div style="display:none;" class="dropdown-divider btnGroup"></div>
            `;

            console.log(runData);
            if(runData.length != 0){
                output +=`
                    <div class="row mainDivTable" style="display:none;">
                        <div class="col-md-12 table-responsive">
                            <table id="tb_detail_main" class="table table-bordered table-striped">
                                <tr>
                                    <th class="t_time">Time</th>
                                    <th class="t_batch">Batch</th>
                                    <th class="t_batch">Mix. Status</th>
                                    <th class="t_imageS">Start Image</th>
                                    <th class="t_status">Status</th>
                                    <th class="t_imageE">Finish Image</th>
                                    <th class="t_time">Finish Time </th>
                                    <th class="t_time">Lead Time </th>
                                    <th class="t_time">Lead Time #2 </th>
                                    <th class="t_imageE">Ref</th>
                                    <th class="t_imageE">Item Check</th>
                                    <th class="t_memo">Memo</th>
                                </tr>`;

                        for(let i = 0; i < runData.length; i++){
                            let startImageI = '';
                            let finishImage = '';
                            let ref_codeImage = '';
                            let itemcheckImage = '';

                            if(runData[i].startImage != ""){
                                startImageI = `
                                <i class="fa fa-file-picture-o beforeImageI" aria-hidden="true" 
                                    data_maincode="`+runData[i].startImage+`" 
                                    data_detailcode="`+runData[i].detailcode+`"
                                    data_imageType="start image"
                                ></i>`;

                               
                            }else{
                                startImageI ='';
                                
                            }

                            if(runData[i].ItemcheckImage != ""){
                                itemcheckImage = `
                                <i class="fa fa-file-text itemcheckI" aria-hidden="true" 
                                    data_maincode="`+runData[i].ItemcheckImage+`" 
                                    data_detailcode="`+runData[i].detailcode+`"
                                ></i>
                                `;
                            }else{
                                itemcheckImage = '';
                            }

                            if(runData[i].finishImage != ""){
                                finishImage = `
                                <i class="fa fa-file-picture-o beforeImageI" aria-hidden="true" 
                                    data_maincode="`+runData[i].startImage+`" 
                                    data_detailcode="`+runData[i].detailcode+`"
                                    data_imageType="finish image"
                                ></i>`;
                            }else{
                                finishImage ='';
                            }

                            if(runData[i].runByGroup.d_ref_code != ""){
                                ref_codeImage = `
                                <i class="fa fa-file-text refImageI" aria-hidden="true"
                                    data_ref_code = "`+runData[i].runByGroup.d_ref_code+`"
                                    data_m_code = "`+m_code+`"
                                    data_d_code ="`+runData[i].detailcode+`"
                                >
                                </i>
                                `;
                            }else{
                                ref_codeImage = '';
                            }

                            // Check Null
                            if(runData[i].d_finishtime == null){
                                runData[i].d_finishtime = "";
                            }

                            // Check Remix
                            if(runData[i].runByGroup.d_action == "Remix"){
                                runData[i].runByGroup.d_action = runData[i].runByGroup.d_action+' #'+runData[i].runByGroup.d_batchcount_remix;
                            }

                            let countMemoChar = runData[i].memo.length;
                            let resultMemoCut = '';

                            if(countMemoChar > 60){
                                resultMemoCut = runData[i].memo.slice(0,50)+`
                                <br>
                                <a href="javascript:void(0)" class="viewMemo" 
                                    data_m_code="`+m_code+`"
                                    data_d_code="`+runData[i].detailcode+`"
                                >
                                    <span class="mt-2"><b>[ อ่านเพิ่มเติม ]</b></span>
                                </a>`;
                            }else{
                                resultMemoCut = runData[i].memo;
                            }
                        
                            output +=`
                                <tr>
                                    <td>
                                        <b>
                                            <span class="textAreaM"
                                                data_m_code="`+m_code+`"
                                                data_d_code="`+runData[i].detailcode+`"
                                                data_sd_status="`+runData[i].runByGroup.d_status+`"
                                                data_d_worktime="`+runData[i].d_worktime+`"
                                                data_starttime="`+runData[i].runByGroup.d_worktime+`"
                                                data_memo="`+runData[i].memo+`"
                                                data_batchcount="`+runData[i].runByGroup.d_batchcount+`"
                                            >`+runData[i].d_worktime+`</span>
                                        </b>
                                    </td>
                                    <td>`+runData[i].runByGroup.d_batchcount+`</td>
                                    <td>`+runData[i].runByGroup.d_action+`</td>
                                    <td>`+startImageI+`</td>
                                    <td>`+runData[i].runByGroup.d_status+`</td>
                                    <td>`+finishImage+`</td>
                                    <td>`+runData[i].d_finishtime+`</td>
                                    <td>`+runData[i].d_leadtime+`</td>
                                    <td>`+runData[i].d_leadtime_com+`</td>
                                    <td>`+ref_codeImage+`</td>
                                    <td>`+itemcheckImage+`</td>
                                    <td class="memoArea">`+resultMemoCut+`</td>
                                </tr>`;

                        }

                        
                    output +=`</table>
                        </div>
                    </div>
                `;
            }

    
        
        
        $('#show_detail').html(output);



        checkProductionUser();
        if($('#sd_lastStatusCheck').val() != "Finish" && $('#sd_lastStatusCheck').val() != ""){
            $('#add-detail').prop('disabled' , true);
        }else if($('#sd_lastStatusCheck').val() == ""){
            $('#add-detail').prop('disabled' , false);
        }else{
            $('#add-detail').prop('disabled' , false);
        }
    }


    $(document).on('click' , '.viewMemo' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_d_code = $(this).attr('data_d_code');

        $('#viewmemo_modal').modal('show');
        loadmemoforshow(data_m_code , data_d_code);


        

    });

    function loadmemoforshow(data_m_code , data_d_code)
    {
        if(data_m_code != "" && data_d_code != ""){
            axios.post(url+'main/loadmemoforshow',{
                action:"loadmemoforshow",
                m_code:data_m_code,
                d_code:data_d_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let memo = res.data.memo.me_memo;
                    let memoHtml = `<textarea id="memo_view" class="form-control" rows="7">`+memo+`</textarea>`;
                    $('#showViewMemo').html(memoHtml);
                }
            });
        }
    }



    $(document).on('click' , '.itemcheckI' , function(){
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");
        

        $('#itemcheck_modal').modal('show');

        loadItemcheckview(data_maincode , data_detailcode);
        
    });

    function loadItemcheckview(m_code , d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadItemcheckview' , {
                action:"loadItemcheckview",
                m_code:m_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let itemList = res.data.itemCheckMain;
                    let itemcheckTemplate = res.data.itemcheckMat;
                    let itemCheckListTemplate = res.data.itemCheckListTemplate;

                    let output ='';

                    output +=`
                    <div class="table-responsive">
                    <table id="itemcheckview_tbl" class="table table-bordered table-striped">
                        <tr>
                            <th class="itemcheckview_tbl_c1">วัตถุดิบ</th>
                            <th class="itemcheckview_tbl_c2">
                                <span>การตรวจใช้วัตถุดิบในการผลิต</span>
                            </th>`;
                        for(let i = 0; i < itemCheckListTemplate.length; i++){
                            output +=`
                            <th class="itemcheckview_tbl_c3"><span>`+itemCheckListTemplate[i].it_listname+`</span>
                            </th>
                            `;
                        }
                    output +=`        
                        </tr>`;

                        for(let i = 0; i < itemList.length; i++){
                            let colorTextCheck = '';
                            if(itemList[i].i_value == "ผ่าน"){
                                colorTextCheck ='style="color:#00CC00"';
                            }else if(itemList[i].i_value == "ไม่ผ่าน"){
                                colorTextCheck ='style="color:#FF0000"';
                            }else{
                                colorTextCheck ='';
                            }

                            output +=`
                        <tr>
                            <td>`+itemList[i].i_itemid+`</td>
                            <td>
                                <span `+colorTextCheck+`>`+itemList[i].i_value+`</span>
                            </td>
                            `;
                            for(let ii = 0; ii < itemcheckTemplate[i].length; ii++){

                                let colorTextCheckI = '';
                                if(itemcheckTemplate[i][ii].i_value == "ผ่าน"){
                                    colorTextCheckI ='style="color:#00CC00"';
                                }else if(itemcheckTemplate[i][ii].i_value == "ไม่ผ่าน"){
                                    colorTextCheckI ='style="color:#FF0000"';
                                }else{
                                    colorTextCheckI ='';
                                }

                                output +=`
                            <td>
                                <span `+colorTextCheckI+`>`+itemcheckTemplate[i][ii].i_value+`</span>
                            </td>
                                `;
                            }
                    output +=`
                        </tr>`;
                        }

                    output +=`
                    </table>
                    </div>
                    `;

                    $('#itemCheckShow_view').html(output);

                }
            });
        }
    }



    function loadItemcheckview_edit(m_code , d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadItemcheckview_edit' , {
                action:"loadItemcheckview_edit",
                m_code:m_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let itemList = res.data.itemCheckMain;
                    let itemcheckTemplate = res.data.itemcheckMat;
                    let itemCheckListTemplate = res.data.itemCheckListTemplate;

                    let output ='';

                    output +=`
                    <div class="table-responsive">
                    <table id="itemcheckview_tbl" class="table table-bordered table-striped">
                        <tr>
                            <th>วัตถุดิบ</th>
                            <th>
                                <span>การตรวจใช้วัตถุดิบในการผลิต</span>
                            </th>`;
                        for(let i = 0; i < itemCheckListTemplate.length; i++){
                            output +=`
                            <th>
                                <span>`+itemCheckListTemplate[i].it_listname+`</span>
                            </th>
                            `;
                        }
                    output +=`        
                        </tr>`;

                        for(let i = 0; i < itemList.length; i++){
                            let colorTextCheck = '';
                            if(itemList[i].i_value == "ผ่าน"){
                                colorTextCheck ='style="color:#00CC00"';
                            }else if(itemList[i].i_value == "ไม่ผ่าน"){
                                colorTextCheck ='style="color:#FF0000"';
                            }else{
                                colorTextCheck ='';
                            }


                            let checkwork = '';
                            if(itemList[i].i_value == "ผ่าน"){
                                checkwork = 'checked';
                            }else{
                                checkwork = '';
                            }



                            output +=`
                        <tr>
                            <td>`+itemList[i].i_itemid+`</td>
                            <td>
                                <span hidden `+colorTextCheck+`>`+itemList[i].i_value+`</span>
                                <input `+checkwork+` class="itemcb_edit cbuse_edit" type="checkbox" id="icheckB_`+itemList[i].i_autoid+`" name="itemcheckBoxUse[]" value="ผ่าน" data_autoid="`+itemList[i].i_autoid+`">
                                <input hidden type="text" id="i_autoid_edit" name="i_autoid_edit[]" value="`+itemList[i].i_autoid+`">
                                <input hidden type="text" id="i_value_edit_`+itemList[i].i_autoid+`" name="i_value_edit[]" value="`+itemList[i].i_value+`">
                            </td>
                            `;





                            for(let ii = 0; ii < itemcheckTemplate[i].length; ii++){

                                let colorTextCheckI = '';
                                if(itemcheckTemplate[i][ii].i_value == "ผ่าน"){
                                    colorTextCheckI ='style="color:#00CC00"';
                                }else if(itemcheckTemplate[i][ii].i_value == "ไม่ผ่าน"){
                                    colorTextCheckI ='style="color:#FF0000"';
                                }else{
                                    colorTextCheckI ='';
                                }


                                let checkworkII = ''
                                if(itemcheckTemplate[i][ii].i_value == "ผ่าน"){
                                    checkworkII = 'checked';
                                }else{
                                    checkworkII = '';
                                }

                                output +=`
                            <td>
                                <span hidden `+colorTextCheckI+`>`+itemcheckTemplate[i][ii].i_value+`</span>
                                <input `+checkworkII+` class="itemcb_edit itemBox_edit" type="checkbox" id="itemBox_edit_`+itemcheckTemplate[i][ii].i_autoid+`" name="itemBox_edit[]" data_autoid="`+itemcheckTemplate[i][ii].i_autoid+`">
                                <input hidden type="text" id="i_autoidII_edit" name="i_autoidII_edit[]" value="`+itemcheckTemplate[i][ii].i_autoid+`">
                                <input hidden type="text" id="i_valueII_edit_`+itemcheckTemplate[i][ii].i_autoid+`" name="i_valueII_edit[]" value="`+itemcheckTemplate[i][ii].i_value+`">
                                
                            </td>
                                `;
                            }
                    output +=`
                        </tr>`;
                        }

                    output +=`
                    </table>
                    </div>
                    `;

                    $('#showItemCheckList_edit').html(output);

                }
            });
        }
    }


    $(document).on('click' , '.cbuse_edit' , function(){
        const data_autoid = $(this).attr("data_autoid");

        if($(this).prop('checked') == true){
            console.log('clicked '+data_autoid);
            $('#i_value_edit_'+data_autoid).val('ผ่าน');
        }else{
            console.log('unclick '+data_autoid);
            $('#i_value_edit_'+data_autoid).val('ไม่ผ่าน');
        }
    });


    $(document).on('click' , '.itemBox_edit' , function(){
        const data_autoid = $(this).attr("data_autoid");

        if($(this).prop('checked') == true){
            console.log('clicked '+data_autoid);
            $('#i_valueII_edit_'+data_autoid).val('ผ่าน');
        }else{
            console.log('unclick '+data_autoid);
            $('#i_valueII_edit_'+data_autoid).val('ไม่ผ่าน');
        }
    });






    function loadReferenceAll(maincode)
    {
        if(maincode != ""){
            axios.post(url+'main/loadReferenceAll' , {
                action:"loadReferenceAll",
                maincode:maincode
            }).then(res=>{
                console.log(res.data);
                let templateRef_itemArr = [];
                let templateRef_stepArr = [];
                let actualRef_itemArr = [];
                let actualRef_stepArr = [];
                let refoutput = '';

                let tItemList = [];
                let aItemList = [];

                templateRef_itemArr = res.data.templateRef_item;
                templateRef_stepArr = res.data.templateRef_step;
                actualRef_itemArr = res.data.actualRef_item;
                actualRef_stepArr = res.data.actualRef_step;

                for(let i = 0; i < templateRef_itemArr.length; i++){
                    tItemList.push(templateRef_itemArr[i].ref_detail_name);
                }

                for(let i = 0; i < actualRef_itemArr.length; i++){
                    aItemList.push(actualRef_itemArr[i].ref_detail_name);
                }

                let display = '';
                if(res.data.m_status == "Start"){
                    if(res.data.lastStatus != null){
                        if(res.data.lastStatus.d_status == "Runing"){
                            display = 'style="display:none;"';
                        }else{
                            display = '';
                        }
                    }else{
                        display = '';
                    }
                    
                }else{
                    display = 'style="display:none;"';
                }

                let radioDisplay = '';
                if(res.data.lastStatus != null){

                    if(res.data.lastStatus.d_status == "Runing"){
                        radioDisplay = 'disabled';
                    }else{
                        
                        if(res.data.m_status == "Stop"){
                            radioDisplay = 'disabled';
                        }else if(res.data.m_status == "Cancel"){
                            radioDisplay = 'disabled';
                        }else if(res.data.m_status == "Wait Start"){
                            radioDisplay = 'disabled';
                        }else{
                            radioDisplay = '';
                        }
                    }
                }else{
                    if(res.data.m_status == "Stop"){
                            radioDisplay = 'disabled';
                        }else if(res.data.m_status == "Cancel"){
                            radioDisplay = 'disabled';
                        }else if(res.data.m_status == "Wait Start"){
                            radioDisplay = 'disabled';
                        }
                }
                

                // Show Ref
                refoutput +=`
                <input hidden type="text" id="ref_code_input" name="ref_code_input">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-info text-white card-box">
                            <div class="card-header">
                                Template Reference
                                <input type="radio" id="selectRef_radio_template" name="selectRef_radio" class="selectRef_radio" value="Template" `+radioDisplay+`>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span><b>Item Sequence</b></span><br>
                                        <span id="tItem">`+tItemList+`</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Step Sequence</b></span><br>
                                        `;
                                for(let i = 0; i < templateRef_stepArr.length; i++){
                                    refoutput +=`
                                        <span>`+templateRef_stepArr[i].ref_linenum+`. `+templateRef_stepArr[i].ref_detail_name+`</span><br>
                                    `
                                }
                    refoutput +=`
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-white bg-success card-box">
                            <div class="card-header divHeadRefActual">
                                Actual Reference
                                <i id="editHeadRefActual" class="fa fa-edit mr-2 editHeadRefActual" `+display+`></i>
                                <input type="radio" id="selectRef_radio_actual" name="selectRef_radio" class="selectRef_radio" value="Actual" `+radioDisplay+`>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span><b>Item Sequence</b></span><br>
                                        <span id="tItem">`+aItemList+`</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Step Sequence</b></span><br>
                                        `;
                                for(let i = 0; i < actualRef_stepArr.length; i++){
                                    refoutput +=`
                                        <span>`+actualRef_stepArr[i].ref_linenum+`. `+actualRef_stepArr[i].ref_detail_name+`</span><br>
                                    `
                                }
                        refoutput +=`
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                    
                `;

                $('#show_ref').html(refoutput);

                if(res.data.ref_status != null){
                    if(res.data.ref_status.ref_type == "Actual"){
                        $('input:radio[id="selectRef_radio_actual"]').prop('checked' , true);
                    }else if(res.data.ref_status.ref_type == "Template"){
                        $('input:radio[id="selectRef_radio_template"]').prop('checked' , true);
                    }

                    $('#ref_code_input').val(res.data.ref_status.ref_code);
                    // assign attr to add-detial btn
                    $('#add-detail').attr({
                        'data_ref_typeActive':res.data.ref_status.ref_type,
                    });


                }

                if(res.data.ref_actualRef != null){
                    $('#editHeadRefActual').attr({
                        'data_ref_code':res.data.ref_actualRef.ref_code,
                        'data_ref_version':res.data.ref_actualRef.ref_version
                    });
                }


                

            });
        }
    }


    function loadReferenceTemplate(maincode)
    {
        if(maincode != ""){
            axios.post(url+'main/loadReferenceAll' , {
                action:"loadReferenceAll",
                maincode:maincode
            }).then(res=>{
                console.log(res.data);
                let templateRef_itemArr = [];
                let templateRef_stepArr = [];
                let actualRef_itemArr = [];
                let actualRef_stepArr = [];
                let refoutput = '';

                let tItemList = [];
                let aItemList = [];

                templateRef_itemArr = res.data.templateRef_item;
                templateRef_stepArr = res.data.templateRef_step;
                actualRef_itemArr = res.data.actualRef_item;
                actualRef_stepArr = res.data.actualRef_step;

                for(let i = 0; i < templateRef_itemArr.length; i++){
                    tItemList.push(templateRef_itemArr[i].ref_detail_name);
                }

                for(let i = 0; i < actualRef_itemArr.length; i++){
                    aItemList.push(actualRef_itemArr[i].ref_detail_name);
                }

                let display = '';
                if(res.data.m_status == "Start"){
                    display = '';
                }else{
                    display = 'style="display:none;"';
                }

                // Show Ref
                refoutput +=`
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-info text-white card-box">
                            <div class="card-header">Template Reference</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span><b>Item Sequence</b></span><br>
                                        <span id="tItem">`+tItemList+`</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Step Sequence</b></span><br>
                                        `;
                                for(let i = 0; i < templateRef_stepArr.length; i++){
                                    refoutput +=`
                                        <span>`+templateRef_stepArr[i].ref_linenum+`. `+templateRef_stepArr[i].ref_detail_name+`</span><br>
                                    `
                                }
                    refoutput +=`
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="dropdown-divider"></div>
                    
                `;

                $('#show_template').html(refoutput);
            });
        }
    }


    function loadReferenceActual(maincode)
    {
        if(maincode != ""){
            axios.post(url+'main/loadReferenceAll' , {
                action:"loadReferenceAll",
                maincode:maincode
            }).then(res=>{
                console.log(res.data);
                let templateRef_itemArr = [];
                let templateRef_stepArr = [];
                let actualRef_itemArr = [];
                let actualRef_stepArr = [];
                let refoutput = '';

                let tItemList = [];
                let aItemList = [];

                templateRef_itemArr = res.data.templateRef_item;
                templateRef_stepArr = res.data.templateRef_step;
                actualRef_itemArr = res.data.actualRef_item;
                actualRef_stepArr = res.data.actualRef_step;

                for(let i = 0; i < templateRef_itemArr.length; i++){
                    tItemList.push(templateRef_itemArr[i].ref_detail_name);
                }

                for(let i = 0; i < actualRef_itemArr.length; i++){
                    aItemList.push(actualRef_itemArr[i].ref_detail_name);
                }

                let display = '';
                if(res.data.m_status == "Start"){
                    display = 'style="display:none;"';
                }else{
                    display = 'style="display:none;"';
                }

                // Show Ref
                refoutput +=`
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-white bg-success card-box">
                            <div class="card-header divHeadRefActual">
                                Actual Reference
                                <i id="editHeadRefActual" class="fa fa-edit mr-2 editHeadRefActual2" `+display+`></i>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span><b>Item Sequence</b></span><br>
                                        <span id="tItem">`+aItemList+`</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Step Sequence</b></span><br>
                                        `;
                                for(let i = 0; i < actualRef_stepArr.length; i++){
                                    refoutput +=`
                                        <span>`+actualRef_stepArr[i].ref_linenum+`. `+actualRef_stepArr[i].ref_detail_name+`</span><br>
                                    `
                                }
                        refoutput +=`
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                    
                `;

                $('#show_actual').html(refoutput);
            });
        }
    }


    function loadReferenceRealActual(maincode)
    {
        if(maincode != ""){
            axios.post(url+'main/loadReferenceRealActual' , {
                action:"loadReferenceRealActual",
                maincode:maincode
            }).then(res=>{
                console.log(res.data);

                let actualRef_itemArr = [];
                let actualRef_stepArr = [];
                let refoutput = '';

                let tItemList = [];
                let aItemList = [];

                actualRef_itemArr = res.data.actualRef_item;
                actualRef_stepArr = res.data.actualRef_step;


                for(let i = 0; i < actualRef_itemArr.length; i++){
                    aItemList.push(actualRef_itemArr[i].ref_detail_name);
                }

                let display = '';
                if(res.data.m_status == "Start"){
                    display = '';
                }else{
                    display = 'style="display:none;"';
                }

                // Show Ref
                refoutput +=`
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-warning card-box">
                            <div class="card-header divHeadRefActual">
                                Actual Reference
                                <i id="editHeadRefActual" class="fa fa-edit mr-2 editHeadRefActual2" `+display+`></i>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span><b>Item Sequence</b></span><br>
                                        <span id="tItem">`+aItemList+`</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span><b>Step Sequence</b></span><br>
                                        `;
                                for(let i = 0; i < actualRef_stepArr.length; i++){
                                    refoutput +=`
                                        <span>`+actualRef_stepArr[i].ref_linenum+`. `+actualRef_stepArr[i].ref_detail_name+`</span><br>
                                    `
                                }
                        refoutput +=`
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                    
                `;

                $('#show_realActual').html(refoutput);
            });
        }
    }

    


    function loadDetailData()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/loadDetailData',{
            action:"loadDetailData",
            m_code:m_code
        }).then(res => {
            
            spointData = res.data.spoint;
            beforeStartImage = res.data.beforeStartImage;
            checkFormStatus();
            console.log(beforeStartImage);
        })
    }

    function loadRunDetailData()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/loadRunDetailData',{
            action:"loadRunDetailData",
            m_code:m_code
        }).then(res => {
            if(res.data.run != ""){
                $('#sd_lastStatusCheck').val(res.data.sd_lastStatus.d_status);
                console.log(res.data);
                runData = res.data.run;
                checkFormStatus();
            }
            
        })
    }

    function clearLocalstorage()
    {
        localStorage.removeItem("indexofarray");
        localStorage.removeItem("linenumGroup");
    }


    function loadQcSampling() 
    {
        const batchNo = $('#m_batch_number_v').val();
        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const dataareaid = $('#m_dataareaid_v').val();

        $.ajax({
            url: "/intsys/msd_mix/main/loadQcSampling",
            method: "POST",
            data: {
            batchNo: batchNo,
            productionNo: productionNo,
            itemNo: itemNo,
            dataareaid: dataareaid
            },
            beforeSend: function () {},
            success: function (res) {

                // console.log(res);

                $("#showQcSampling").html(res);

                const browserWidth = $(window).width();
                if (browserWidth <= 768) {
                    $("#qcSamplingTable").addClass("table-responsive");
                }

                $(window).resize(function () {
                    if (browserWidth <= 768) {
                    $("#qcSamplingTable").addClass("table-responsive");
                    }
                });

                var table = $("#qcSamplingTable").DataTable({
                    paging: false,
                    searching: false,
                    columnDefs: [
                    {
                        searching: false,
                        orderable: false,
                        targets: "_all",
                    },
                    { width: "120", targets: 0 },
                    { width: "100", targets: 1 },
                    { width: "50", targets: 2 },
                    { width: "100", targets: 3 },
                    { width: "100", targets: 4 },
                    { width: "80", targets: 5 },
                    { width: "80", targets: 6 },
                    { width: "80", targets: 7 },
                    { width: "80", targets: 8 },
                    { width: "80", targets: 9 },
                    { width: "200", targets: 10 }
                    ],
                    ordering: false,
                });

                const checkQcID = $('#checkQcID').val();
                const maincode = $('#getMaincode').val();
                if(checkQcID != "" && maincode != ""){
                    loadGraphByItem(checkQcID , maincode);
                }
            

            }
        });
    }




    function loadQcsamplingByLinenum(data_qcSampleId, data_qcSampleNum, data_areaId)
    {
        $.ajax({
            url:"/intsys/msd/main/loadQcsamplingByLinenum",
            method:"POST",
            data:{
                data_qcSampleId:data_qcSampleId,
                data_qcSampleNum:data_qcSampleNum,
                data_areaId:data_areaId
            },
            beforeSend:function(){},
            success:function(res){
                // console.log(res);
                $('#showQcSamplingByLinenum').html(res);

                const browserWidth = $(window).width();

                // if (browserWidth <= 768) {
                //     $("#qcSamplingTableByLinenum").addClass("table-responsive");
                // }

                // $(window).resize(function () {
                //     if (browserWidth <= 768) {
                //     $("#qcSamplingTableByLinenum").addClass("table-responsive");
                //     }
                // });

                var table = $("#qcSamplingTableByLinenum").DataTable({
                    paging: false,
                    searching: false,
                    columnDefs: [
                    {
                        searching: false,
                        orderable: false,
                        targets: "_all",
                    },
                    // { width: "80", targets: 0 },
                    // { width: "200", targets: 1 },
                    // { width: "80", targets: 2 },
                    // { width: "80", targets: 3 },
                    // { width: "80", targets: 4 },
                    // { width: "200", targets: 5 },
                    ],
                    ordering: false,
                });

            }
        });
    }


    function loadGraphByItem(checkQcID , maincode)
    {
        $.ajax({
            url:"/intsys/msd_mix/main/graph",
            method:"POST",
            data:{
                checkQcID:checkQcID,
                maincode:maincode
            },
            beforeSend:function(){
                testIDShowArray = [];
                // $('.loader').fadeIn(1000);
            },
            success:function(res){

                // console.log(JSON.parse(res).linenum.length);
                console.log(JSON.parse(res));

                if(JSON.parse(res).status == "Select Data Success"){
                    let totalQcline = JSON.parse(res).totalQcline;
                    let graphDataArray = [];
                    let newResult = [];
                    
                    for(let i =0; i < JSON.parse(res).checkData.length;i++){
                        
                        let graphdata = {
                            "name":JSON.parse(res).checkData[i].testid,
                            "data":JSON.parse(res).checkData[i].value,
                            "unitId":JSON.parse(res).checkData[i].unitid,
                            "lowerLimit":JSON.parse(res).checkData[i].lowerlimit,
                            "upperLimit":JSON.parse(res).checkData[i].upperlimit,
                            "valueOutcome":JSON.parse(res).checkData[i].valueOutcome,
                            "sumValueOutcome":JSON.parse(res).checkData[i].sumOutcome,
                        }
                        testIDShowArray.push(JSON.parse(res).checkData[i].testid);
                        graphDataArray.push(graphdata);
                    }

                    // console.log(graphDataArray);             
                    // console.log(testIDShowArray);
                    // console.log(totalQcline);
                    let areaGraph = '';
                    for(let i = 0; i < graphDataArray.length;i++){
                        // Loop for create graph
                        areaGraph += `<div id="areaGraphShow_`+i+`" class="mt-5">`+graphDataArray[i].name+`</div>`;
                        $('#showGraphMain').html(areaGraph);
                    }

                    // graphByLot(totalQcline , graphDataArray);
                    loadCheckGraph(maincode);
                    let resultData;
                    let maxLimit;
                    let conUnitid;
                    for(let i = 0; i < graphDataArray.length;i++){

                        if(graphDataArray[i].sumValueOutcome == 0){
                            resultData = graphDataArray[i].data;
                            maxLimit = graphDataArray[i].upperLimit;
                            if(graphDataArray[i].unitId == null){
                                conUnitid = "";
                            }else{
                                conUnitid = graphDataArray[i].unitId;
                            }
                        }else{
                            resultData = graphDataArray[i].valueOutcome;
                            maxLimit = 1;
                        }
                        // Loop for create graph
                        graphByLot(totalQcline , graphDataArray[i].name , resultData , i , conUnitid , graphDataArray[i].lowerLimit , maxLimit , graphDataArray[i].sumValueOutcome);
                    }

                    $('.loader').fadeOut(1000);
                }else{
                    loadCheckGraph(maincode);
                }
            }
        });
    }



    function loadCheckGraph(maincode)
    {
        $.ajax({
            url:"/intsys/msd_mix/main/graph/loadCheckGraph",
            method:"POST",
            data:{
                maincode:maincode
            },
            beforeSend:function(){},
            success:function(res){
                // console.log(res);
                $('#showCheckGraph').html(res);
            }
        });
    }


    function graphByLot(totalQcline , graphDataArrayName , graphDataArrayData , graphNumber , unitid , lowerLimit , upperLimit , sumOutcome)
    {
        let dataLabelShow;
        if(sumOutcome == 0){
            dataLabelShow = false;
        }else{
            dataLabelShow = true;
        }

        let minwidth = 0;
        if(graphDataArrayData.length > 300){
            minwidth = 4000;
        }else{
            minwidth = 1200;
        }

        return Highcharts.chart('areaGraphShow_'+graphNumber, {

                chart: {
                    type: 'spline',
                    scrollablePlotArea: {
                    minWidth: minwidth,
                    scrollPositionX: 1
                    }
                },
                title: {
                    text: graphDataArrayName
                },

                subtitle: {
                    text: 'Min: '+lowerLimit+' , Max: '+upperLimit+' &nbsp;'+unitid
                },

                yAxis: {
                    // floor: lowerLimit,
                    // max: upperLimit,
                    title: {
                        text: 'รายการ'
                    },
                    allowDecimals:true,
                },

                xAxis: {
                    categories: totalQcline
                },

                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    itemMarginTop: 5,
                    itemMarginBottom: 5,
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        dataLabels: {
                            enabled: dataLabelShow,
                            // format: '<span style="font-size:10px;">{point.y:.3f}'+unitid+'</span>'
                            formatter: function() {
                                if(sumOutcome == 0){
                                    return '<span style="font-size:10px;">'+this.point.y.toFixed(3)+' '+unitid+'</span>';
                                }else{
                                    if (this.y == 0) {
                                        return '<span style="font-size:10px;"> ' + this.point.y + ' = Fail</span>';
                                    }else{
                                        return '<span style="font-size:10px;"> ' + this.point.y + ' = Pass</span>';
                                    }
                                }
                            },
                            rotation: 310,
                            y: -30
                        },
                        pointStart: 0
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.category}</span>: <b>{point.y:,.3f} '+unitid+'</b><br/>',
                    animation:true,
                },

                series: [
                    {
                        name:graphDataArrayName,
                        data:graphDataArrayData,
                        label:false
                    }
                ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
        });
    }



    function arrayRemove(array , value)
    {
        return array.filter(function(ele){
            return ele != value;
        });
    }


    function updateTestIDUse(testIDShowArray,data_maincode)
    {
        $.ajax({
            url:"/intsys/msd_mix/main/graph/updateTestIDUse",
            method:"POST",
            data:{
                testIDShowArray:testIDShowArray,
                data_maincode:data_maincode
            },
            beforeSend:function(){
                $('.loader').fadeIn();
            },
            success:function(res){
                
                console.log(JSON.parse(res));
                if(JSON.parse(res).status == "Update Success"){
                    const checkQcID = $('#checkQcID').val();
                    loadGraphByItem(checkQcID , data_maincode);
                }else{
                    $('#showGraphMain').html('');
                    $('.loader').fadeOut(1000);
                }

            }
        });
    }

    function conValOutcomeToString(valueOutcome , sumOutcome , unitid)
    {
        if(sumOutcome == 0){
            return unitid;
        }else{
            if(valueOutcome == 1){
                return "Pass";
            }else{
                return "Fail";
            }
        }
        
    }



    function checkProductionUser()
    {
        const deptcode = "<?php echo getUser()->DeptCode; ?>";
        const ecode = "<?php echo getUser()->ecode; ?>";
        if(deptcode != "1007"){
            if(ecode == "M1809" || ecode == "M0282"){
                $('#forPd_v , #forPd_v2').css('display' , '');
                $('#line_forPd_v').css('display' , '');
            }else{
                $('#forPd_v , #forPd_v2').css('display' , 'none');
                $('#line_forPd_v').css('display' , 'none');
            }

        }else{
            $('#forPd_v , #forPd_v2').css('display' , '');
            $('#line_forPd_v').css('display' , '');
        }
    }

    function eh_searchBag(bagCode)
    {
        if(bagCode != ""){
            axios.post(url+'main/searchBag' , {
                action:"searchBag",
                bagCode:bagCode
            }).then(res => {
                // console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let resultOfBagData = res.data.resultBag;
                    let outputHtml = `<ul class="list-group mt-2 eh_searchBagUl">`;
                    for(let i = 0; i < resultOfBagData.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action eh_searchBagLi"
                            data_m_typeofbag="`+resultOfBagData[i].packageid+`"
                            data_m_typeofbagtxt="`+resultOfBagData[i].packagetxt+`"
                        >
                            <span><b>`+resultOfBagData[i].packageid+`</b></span><br>
                            <span>`+resultOfBagData[i].packagetxt+`</span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#eh_showBagCode').html(outputHtml);
                }
            });
        }
    }

    function loadCheckMachinePage()
    {
        const m_code = $('#getMaincode').val();
        const machine_name = $('#m_template_name_v').val();
        const datetime = $('#m_datetime_v').val();
        const item_number = $('#m_item_number_v').val();
        const batch_number = $('#m_batch_number_v').val();

        axios.post(url+'main/loadCheckMachinePage',{
            action:"loadCheckMachinePage",
            m_code:m_code
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let output ='';
                let checktemplate = res.data.check_template;
                let checkValue = res.data.value;
                let linegroup = res.data.lineGroup;
                let loop = 1;
                output +=`
                <div id="checkPageMenu" class="row form-group" style="display:none;">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary addMachineCheck"
                            data_m_code="`+m_code+`"
                            data_machine_name="`+machine_name+`"
                            data_datetime="`+datetime+`"
                            data_item_number="`+item_number+`"
                            data_batch_number="`+batch_number+`"
                        ><i class="fi-plus mr-2"></i>เพิ่ม</button>
                        <button type="button" class="btn btn-secondary editMachineCheck"
                            data_m_code="`+m_code+`"
                            data_machine_name="`+machine_name+`"
                            data_batch_number="`+batch_number+`"
                        ><i class="fa fa-edit mr-2" aria-hidden="true"></i>แก้ไข</button>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped table-bordered mck_tbl">
                    <tr>
                        <th class="mck_no">ลำดับ</th>
                        <th class="mck_list">รายการตรวจเช็ค</th>`;
                        for(let li = 0; li < linegroup.length; li++){
                            output +=`
                            <th class="mck_val"><span>Item Number : </span><span class="subItemTbl">`+linegroup[li].itemno+`</span><br>
                            <span>Batch Number : </span><span class="subItemTbl">`+linegroup[li].batchno+`</span><br>
                            <span>Date : </span><span class="subItemTbl">`+linegroup[li].datetime+`</span></th>
                            `;
                            loop++;
                        }
                    output +=`
                    </tr>`;
                    let no = 1;
                    let icon = '';
                    let textStatus = '';
                    for(let i = 0; i < checktemplate.length; i++){
                        output +=`
                        <tr>
                            <td>`+no+`</td>
                            <td>`+checktemplate[i].mckt_checklist+`</td>`;
                
                                for(let j = 0; j < checkValue.length; j++){

                                    if(checkValue[j][i].mck_value == "ปกติ"){
                                        icon = '<i class="fa fa-check iNormal" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNormal">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "ไม่มีการใช้งาน"){
                                        icon = '<i class="fa fa-circle-o iNotuse" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNotuse">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "ผิดปกติ"){
                                        icon = '<i class="fa fa-close iNotOk" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNotOk">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "เครื่องจอด"){
                                        icon = '<i class="fa fa-minus iStop" aria-hidden="true"></i>';
                                        textStatus = '<span class="iStop">'+checkValue[j][i].mck_value+'</span>';
                                    }

                                    output +=`
                                    <td>`+textStatus+`</td>
                                    `;
                                }
                          
                            
                        output +=`
                        </tr>
                        `;
                        no++;
                    }

                output +=`
                </table>
                </div>
                `;

                $('#showMachineCheck').html(output);


                let outputmd = '';
                for(let i = 0; i < checktemplate.length; i++){
                    outputmd +=`
                    <div class="row form-group flex-container">
                        <div class="col-md-6" style="align-self: center">
                            <label>`+checktemplate[i].mckt_checklist+`</label>
                            <input hidden type="text" id="mcklist" name="mcklist[]" value="`+checktemplate[i].mckt_checklist+`">
                            <input hidden type="text" id="mcklinenum" name="mcklinenum[]" value="`+checktemplate[i].mckt_checklist_linenum+`">
                        </div>
                        <div class="col-md-6">
                            <select id="mckval" name="mckval[]" class="form-control">
                                <option value="">กรุณาเลือกรายการ</option>
                                <option value="ปกติ">ปกติ</option>
                                <option value="ผิดปกติ">ผิดปกติ</option>
                                <option value="ไม่มีการใช้งาน">ไม่มีการใช้งาน</option>
                                <option value="เครื่องจอด">เครื่องจอด</option>
                            </select>
                        </div>
                    </div>
                    `;
                }

                $('#showMachineCheckList_md').html(outputmd);
                checkFormStatus();
                
            }
        });
    }

    function loadCheckGroupForEdit(m_code)
    {
        axios.post(url+'main/loadCheckGroupForEdit' , {
            action:"loadCheckGroupForEdit",
            m_code:m_code
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let linegroupResult = res.data.lineGroupEdit;
                let output ='';

                output +=`
                <select id="lineGroupForEdit" name="lineGroupForEdit" class="form-control lineGroupForEdit">
                    <option value="">กรุณาเลือกข้อมูล</option>`;
                    for(let i = 0; i < linegroupResult.length; i++){
                        output +=`
                        <option value="`+linegroupResult[i].mck_linenumgroup+`">`+linegroupResult[i].mck_itemno+` | `+linegroupResult[i].mck_batchno+`</option>
                        `;
                    }
                output +=`
                </select>
                `;

                $('#showCheckListGroupEdit').html(output);
            }
        });
    }




    // Function Mix Zone
    function createItemSequenceList_mdv(itemSequenceArray_mdv)
    {
        console.log(itemSequenceArray_mdv);
        // Item Sequence Zone
        let itemSeqHtml = '';
        for(let i = 0; i < itemSequenceArray_mdv.length; i++){
            itemSeqHtml +=`
            <span class="itemTag"><b>`+itemSequenceArray_mdv[i]+`</b>
            <i class="fa fa-close iDelItem_mdv" aria-hidden="true"
                data_index="`+i+`"
            ></i>
            </span>
            <input hidden type="text" id="itemSequenceInput_mdv" name="itemSequenceInput_mdv[]" value="`+itemSequenceArray_mdv[i]+`">
            `;
        }
        $('#showItemSequenceArray_mdv').html(itemSeqHtml);
        // Item Sequence Zone
    }

    function createItemSequenceList_mdve(itemSequenceArray_mdve)
    {
        console.log(itemSequenceArray_mdve);
        // Item Sequence Zone
        let itemSeqHtml = '';
        for(let i = 0; i < itemSequenceArray_mdve.length; i++){
            itemSeqHtml +=`
            <span class="itemTag"><b>`+itemSequenceArray_mdve[i]+`</b>
            <i class="fa fa-close iDelItem_mdve" aria-hidden="true"
                data_index="`+i+`"
            ></i>
            </span>
            <input hidden type="text" id="itemSequenceInput_mdve" name="itemSequenceInput_mdve[]" value="`+itemSequenceArray_mdve[i]+`">
            `;
        }
        $('#showItemSequenceArray_mdve').html(itemSeqHtml);
        // Item Sequence Zone
    }

    function createItemSequenceList_mdve2(itemSequenceArray_mdve2)
    {
        console.log(itemSequenceArray_mdve2);
        // Item Sequence Zone
        let itemSeqHtml = '';
        for(let i = 0; i < itemSequenceArray_mdve2.length; i++){
            itemSeqHtml +=`
            <span class="itemTag"><b>`+itemSequenceArray_mdve2[i]+`</b>
            <i class="fa fa-close iDelItem_mdve2" aria-hidden="true"
                data_index="`+i+`"
            ></i>
            </span>
            <input hidden type="text" id="itemSequenceInput_mdve2" name="itemSequenceInput_mdve2[]" value="`+itemSequenceArray_mdve2[i]+`">
            `;
        }
        $('#showItemSequenceArray_mdve2').html(itemSeqHtml);
        // Item Sequence Zone
    }


    
    function loadSubDetailData(data_templatecode)
    {
        if(data_templatecode != ""){
            axios.post(url+'main/machine/loadSubDetailData' , {
                action:"loadSubDetailData",
                templatecode:data_templatecode
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    // itemSequenceArray_edit = res.data.itemSequence;
                    // stepSequenceArray_edit = res.data.stepSequence;
                    for(let i = 0; i < res.data.itemSequence.length; i++){
                        itemSequenceArray_mdv.push(res.data.itemSequence[i].detail_name);
                    }
                    for(let i = 0; i < res.data.stepSequence.length; i++){
                        stepSequenceArray_mdv.push(res.data.stepSequence[i].detail_name);
                    }

                    createItemSequenceList_mdv(itemSequenceArray_mdv);
                    createStepSequenceList_mdv(stepSequenceArray_mdv);
                }
            });
        }
    }



    function createStepSequenceList_mdv(stepSequenceArray_mdv)
    {
        console.log(stepSequenceArray_mdv);
        // Step Sequence Zone
        let stepArrayHtml = `
        <div class="col-md-10">
        <ul class="list-group">`;
        for(let i = 0; i < stepSequenceArray_mdv.length; i++){
            stepArrayHtml +=`
            <li class="list-group-item list-group-item list-group-item-action stepLi">
                `+stepSequenceArray_mdv[i]+`
                <i class="fa fa-close iDelStep_mdv" aria-hidden="true"
                    data_index="`+i+`"
                ></i>
            </li>
            <input hidden type="text" id="stepSequenceInput_mdv" name="stepSequenceInput_mdv[]" value="`+stepSequenceArray_mdv[i]+`">
            `;
        }
        stepArrayHtml +=`
        </div>
        </ul>`;
        $('#stepSequenceDiv_mdv').html(stepArrayHtml);
    }


    function createStepSequenceList_mdve(stepSequenceArray_mdve)
    {
        console.log(stepSequenceArray_mdve);
        // Step Sequence Zone
        let stepArrayHtml = `
        <div class="col-md-10">
        <ul class="list-group">`;
        for(let i = 0; i < stepSequenceArray_mdve.length; i++){
            stepArrayHtml +=`
            <li class="list-group-item list-group-item list-group-item-action stepLi">
                `+stepSequenceArray_mdve[i]+`
                <i class="fa fa-close iDelStep_mdve" aria-hidden="true"
                    data_index="`+i+`"
                ></i>
            </li>
            <input hidden type="text" id="stepSequenceInput_mdve" name="stepSequenceInput_mdve[]" value="`+stepSequenceArray_mdve[i]+`">
            `;
        }
        stepArrayHtml +=`
        </div>
        </ul>`;
        $('#stepSequenceDiv_mdve').html(stepArrayHtml);
    }


    function createStepSequenceList_mdve2(stepSequenceArray_mdve2)
    {
        console.log(stepSequenceArray_mdve2);
        // Step Sequence Zone
        let stepArrayHtml = `
        <div class="col-md-10">
        <ul class="list-group">`;
        for(let i = 0; i < stepSequenceArray_mdve2.length; i++){
            stepArrayHtml +=`
            <li class="list-group-item list-group-item list-group-item-action stepLi">
                `+stepSequenceArray_mdve2[i]+`
                <i class="fa fa-close iDelStep_mdve2" aria-hidden="true"
                    data_index="`+i+`"
                ></i>
            </li>
            <input hidden type="text" id="stepSequenceInput_mdve2" name="stepSequenceInput_mdve2[]" value="`+stepSequenceArray_mdve2[i]+`">
            `;
        }
        stepArrayHtml +=`
        </div>
        </ul>`;
        $('#stepSequenceDiv_mdve2').html(stepArrayHtml);
    }


    function loadItemidFormTable_mdv()
    {
        axios.post(url+'main/machine/loadItemidFormTable_mdv' , {
            action:'loadItemidFormTable_mdv',
            itemNumber:$('#itemSequence_mdv').val()
        }).then(res=>{
            console.log(res.data.status);
            $('#showItemidList_mdv').html(res.data.outputHtml);
        }).catch(err=>{
            console.error('Error' , err);
        });
    }

    function loadItemidFormTable_mdve()
    {
        axios.post(url+'main/machine/loadItemidFormTable_mdve' , {
            action:'loadItemidFormTable_mdve',
            itemNumber:$('#itemSequence_mdve').val()
        }).then(res=>{
            console.log(res.data.status);
            $('#showItemidList_mdve').html(res.data.outputHtml);
        }).catch(err=>{
            console.error('Error' , err);
        });
    }


    function loadItemidFormTable_mdve2()
    {
        axios.post(url+'main/machine/loadItemidFormTable_mdve2' , {
            action:'loadItemidFormTable_mdve2',
            itemNumber:$('#itemSequence_mdve2').val()
        }).then(res=>{
            console.log(res.data.status);
            $('#showItemidList_mdve2').html(res.data.outputHtml);
        }).catch(err=>{
            console.error('Error' , err);
        });
    }


    $(document).on('keyup' , '#itemSequence_mdv' , function(){
        if($(this).val() != ""){
            loadItemidFormTable_mdv();
        }else{
            $('#showItemidList_mdv').html('');
        }
    });

    $(document).on('keyup' , '#itemSequence_mdve' , function(){
        if($(this).val() != ""){
            loadItemidFormTable_mdve();
        }else{
            $('#showItemidList_mdve').html('');
        }
    });

    $(document).on('keyup' , '#itemSequence_mdve2' , function(){
        if($(this).val() != ""){
            loadItemidFormTable_mdve2();
        }else{
            $('#showItemidList_mdve2').html('');
        }
    });




    $(document).on('click' , '.itemidA_mdv' , function(){
        const itemid = $(this).attr("data_itemid");
        itemSequenceArray_mdv.push(itemid);
        // console.log(itemSequenceArray);
        $('#showItemidList_mdv').html('');
        $('#itemSequence_mdv').val('');

        removeDuplicateName_mdv(itemSequenceArray_mdv);
        createItemSequenceList_mdv(itemSequenceArray_mdv);

    });
    $(document).on('click' , '.itemidA_mdve' , function(){
        const itemid = $(this).attr("data_itemid");
        itemSequenceArray_mdve.push(itemid);
        // console.log(itemSequenceArray);
        $('#showItemidList_mdve').html('');
        $('#itemSequence_mdve').val('');

        removeDuplicateName_mdve(itemSequenceArray_mdve);
        createItemSequenceList_mdve(itemSequenceArray_mdve);

    });

    $(document).on('click' , '.itemidA_mdve2' , function(){
        const itemid = $(this).attr("data_itemid");
        itemSequenceArray_mdve2.push(itemid);
        // console.log(itemSequenceArray);
        $('#showItemidList_mdve2').html('');
        $('#itemSequence_mdve2').val('');

        removeDuplicateName_mdve2(itemSequenceArray_mdve2);
        createItemSequenceList_mdve2(itemSequenceArray_mdve2);

    });

    function removeDuplicateName_mdv(inputArray){
        return itemSequenceArray_mdv = [...new Set(inputArray)];
    }
    function removeDuplicateName_mdve(inputArray){
        return itemSequenceArray_mdve = [...new Set(inputArray)];
    }
    function removeDuplicateName_mdve2(inputArray){
        return itemSequenceArray_mdve2 = [...new Set(inputArray)];
    }



    $(document).on('click' , '.iDelItem_mdv' , function(){
        const index = $(this).attr('data_index');
        removeItem_mdv(index);
    });
    function removeItem_mdv(index)
    {
        itemSequenceArray_mdv.splice(index , 1);
        createItemSequenceList_mdv(itemSequenceArray_mdv);
    }



    $(document).on('click' , '.iAddStepSequence_mdv' , function(){
        const stepSequence = $('#stepSequence_mdv').val();
        stepSequenceArray_mdv.push(stepSequence.toUpperCase());
        $('#stepSequence_mdv').val('');

        createStepSequenceList_mdv(stepSequenceArray_mdv);
    });
    $(document).on('click' , '.iDelStep_mdv' , function(){
        const index = $(this).attr('data_index');
        removeStep_mdv(index);
    });
    function removeStep_mdv(index)
    {
        stepSequenceArray_mdv.splice(index , 1);
        createStepSequenceList_mdv(stepSequenceArray_mdv);
    }



    $(document).on('click' , '.iAddStepSequence_mdve' , function(){
        const stepSequence = $('#stepSequence_mdve').val();
        stepSequenceArray_mdve.push(stepSequence.toUpperCase());
        $('#stepSequence_mdve').val('');

        createStepSequenceList_mdve(stepSequenceArray_mdve);
    });

    $(document).on('click' , '.iDelStep_mdve' , function(){
        const index = $(this).attr('data_index');
        removeStep_mdve(index);
    });
    function removeStep_mdve(index)
    {
        stepSequenceArray_mdve.splice(index , 1);
        createStepSequenceList_mdve(stepSequenceArray_mdve);
    }


    $(document).on('click' , '.iAddStepSequence_mdve2' , function(){
        const stepSequence = $('#stepSequence_mdve2').val();
        stepSequenceArray_mdve2.push(stepSequence.toUpperCase());
        $('#stepSequence_mdve2').val('');

        createStepSequenceList_mdve2(stepSequenceArray_mdve2);
    });
    $(document).on('click' , '.iDelStep_mdve2' , function(){
        const index = $(this).attr('data_index');
        removeStep_mdve2(index);
    });
    function removeStep_mdve2(index)
    {
        stepSequenceArray_mdve2.splice(index , 1);
        createStepSequenceList_mdve2(stepSequenceArray_mdve2);
    }



    $(document).on('click' , '.iDelItem_mdve' , function(){
        const index = $(this).attr('data_index');
        removeItem_mdve(index);
    });
    function removeItem_mdve(index)
    {
        itemSequenceArray_mdve.splice(index , 1);
        createItemSequenceList_mdve(itemSequenceArray_mdve);
    }


    $(document).on('click' , '.iDelItem_mdve2' , function(){
        const index = $(this).attr('data_index');
        removeItem_mdve2(index);
    });
    function removeItem_mdve2(index)
    {
        itemSequenceArray_mdve2.splice(index , 1);
        createItemSequenceList_mdve2(itemSequenceArray_mdve2);
    }


    function getbatchCount(maincode)
    {
        axios.post(url+'main/getbatchCount',{
            action:"getbatchCount",
            maincode:maincode
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let batchCount = res.data.batchCount++;
                if(batchCount == 0){
                    batchCount = 1;
                }else{
                    batchCount++;
                }
                console.log(batchCount);
                $('#batchCount').val(batchCount);
            }
        });
    }

    $(document).on('change' , 'input[type=radio][name=choice_method]' , function(){
        // console.log($(this).val());
        $('#addRun_section').css('display' , '');
        if($(this).val() == "mix"){
            $('#div_batchlist_remix').css('display' , 'none');
          
        }else if($(this).val() == "remix"){
            $('#div_batchlist_remix').css('display' , '');
            $('#div_batchlist_remix_count').css('display' , '');
            loadBatchList_remix(m_code);
            loadbatch_count();
        }
        // loadMainRunscreen();
        console.log($(this).val());
    });

    function loadBatchList_remix(m_code='')
    {
        axios.post(url+'main/loadBatchList_remix' , {
            action:"loadBatchList_remix",
            m_code:m_code
        }).then(res=>{
            console.log(res.data);

            if(res.data.status == "Select Data Success"){
                let batchList = res.data.batchList;
                let output =`
                <select id="batchlist_remix" name="batchlist_remix" class="form-control">`
                if(res.data.batchList != null){
                    output +=`
                    <option value="">กรุณาเลือก Batch ที่ต้องการ Remix</option>
                    `;
                    for(let i = 0; i < batchList.length; i ++){
                        output +=`
                        <option value="`+batchList[i].d_detailcode+`">Batch `+batchList[i].d_batchcount+`</option>
                        `;
                    }
                }else{
                    output +=`
                    <option value="">ยังไม่พบข้อมูลการ มิกซ์</option>
                    `;
                }
                output +=`
                </select>
                `;

                $('#showListBatch_remix').html(output);
            }

        });
    }


    $(document).on('change' , '#batchlist_remix' , function(){
        if($(this).val() != ""){
            const m_code = $('#mdrd_m_code').val();
            const d_code = $(this).val();

            loadRefBatMix(m_code , d_code);
        }
    });

    function loadRefBatMix(m_code , d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadRefBatMix' , {
                action:"loadRefBatMix",
                m_code:m_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    $('#batchCount').val(res.data.refBatchCount.d_batchcount);
                }
            });
        }
    }

    $(document).on('click' , '.closeEditRef' , function(){
        $('#setpointEdit_modal').modal('hide');
        $('#runDetail_modal').modal('show');

    });


    // function show_reflistfn(m_code)
    // {
    //     if(m_code != ""){
    //         axios.post(url+'main/show_reflistfn',{
    //             action:"show_reflistfn",
    //             m_code:m_code
    //         }).then(res=>{
    //             console.log(res.data);
    //             if(res.data.status == "Select Data Success"){
    //                 let refList = res.data.refList;
    //                 let output = `
    //                 <select id="reflist" name="reflist" class="form-control mb-3">
    //                     <option value="">กรุณาเลือก Reference</option>`;
    //                     for(let i = 0; i < refList.length; i++){
    //                         output +=`
    //                         <option value="`+refList[i].ref_code+`">`+refList[i].ref_type+`</option>
    //                         `;
    //                     }
    //                 output +=`
    //                 </select>
    //                 `;

    //                 $('#show_reflist').html(output);
    //             }
    //         });
    //     }

        
    // }


    // $(document).on('change' , '#reflist' , function(){
    //     if($(this).val() != ""){
    //         if($(this).text() == "Template"){
    //             $('#show_template').css('display' , '');
    //             $('#show_actual').css('display' , 'none');
    //             $('#show_realActual').css('display' , 'none');
    //         }else if($(this).text() == "Actual"){
    //             $('#show_template').css('display' , 'none');
    //             $('#show_actual').css('display' , '');
    //             $('#show_realActual').css('display' , 'none');
    //         }else if($(this).text() == "Real Actual"){
    //             $('#show_template').css('display' , 'none');
    //             $('#show_actual').css('display' , 'none');
    //             $('#show_realActual').css('display' , '');
    //         }
    //     }
    // });


    $(document).on('click' , '.selectRef_radio' , function(){
        const selectRef_radio = $(this).val();
        const m_code = $('#getMaincode').val();

        console.log(selectRef_radio);

        axios.post(url+'main/actionRef' , {
            action:"activeReference",
            selectRef_radio:selectRef_radio,
            m_code:m_code
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Update Data Success"){
                $('#mdrd_refcode').val(res.data.ref_code);
                $('#add-detail').attr('data_ref_typeactive',res.data.ref_type);
                $('#ref_code_input').val(res.data.ref_code);
            }
            
        });
    });



    $(document).on('click' , '.refImageI' , function(){
        const data_ref_code = $(this).attr("data_ref_code");
        const data_m_code = $(this).attr("data_m_code");
        const data_d_code = $(this).attr("data_d_code");

        //Open Modal For show Ref
        loadRefDataUse(data_m_code , data_ref_code , data_d_code);
        $('#showRefUse_modal').modal('show');

    });

    function loadRefDataUse(m_code , ref_code , d_code)
    {
        if(m_code != "" && ref_code != ""){
            axios.post(url+'main/loadRefDataUse' , {
                action:'loadRefDataUse',
                m_code:m_code,
                ref_code:ref_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let refoutput ='';
                    let ref_type = res.data.refUse_type.ref_type+` Reference`;
                    let classCard = '';
                    let aItemList = [];
                    let startImage = res.data.startImage;
                    let finishImage = res.data.finishImage;

                    for(let i = 0; i < res.data.refUse_Item.length; i++){
                        aItemList.push(res.data.refUse_Item[i].ref_detail_name);
                    }


                    if(res.data.refUse_type.ref_type == 'Actual'){
                        classCard = 'text-white bg-success';
                    }else{
                        classCard = 'bg-info text-white';
                    }

                                    // Show Ref
                    refoutput +=`
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card `+classCard+` card-box">
                                <div class="card-header">
                                    `+ref_type+`
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <span><b>Item Sequence</b></span><br>
                                            <span id="tItem">`+aItemList+`</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <span><b>Step Sequence</b></span><br>
                                            `;
                                    for(let i = 0; i < res.data.refUse_Step.length; i++){
                                        refoutput +=`
                                            <span>`+res.data.refUse_Step[i].ref_linenum+`. `+res.data.refUse_Step[i].ref_detail_name+`</span><br>
                                        `
                                    }
                            refoutput +=`
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                        
                    `;

                    refoutput +=`
                    <div class="row form-group">
                        <div class="col-md-6 col-lg-6">
                            <span><b>Start Image</b></span>
                            <div class="row">`;
                            
                            for(let i = 0; i < startImage.length; i++){
                                refoutput +=`
                                <div class="col-md-6 col-lg-4 col-6 mt-2">
                                    <a href="`+url+startImage[i].f_path+startImage[i].f_name+`" data-toggle="lightbox">
                                        <img class="runImageViewRef" src="`+url+startImage[i].f_path+startImage[i].f_name+`">
                                    </a>
                                </div>
                                `;
                            }

                    refoutput +=`
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <span><b>Finish Image</b></span>
                            <div class="row">`;

                            for(let i = 0; i < finishImage.length; i++){
                                refoutput +=`
                                <div class="col-md-6 col-lg-4 col-6 mt-2">
                                    <a href="`+url+finishImage[i].f_path+finishImage[i].f_name+`" data-toggle="lightbox">
                                        <img class="runImageViewRef" src="`+url+finishImage[i].f_path+finishImage[i].f_name+`">
                                    </a>
                                </div>
                                `;
                            }
                            
                    refoutput +=`        
                            </div>
                        </div>

                    </div>
                    `;

                    $('#refDataUse').html(refoutput);
                }



            });
        }
    }


    function loadbatch_count()
    {
        let batch_count = 10;
        let output = '';
        output +=`
        <select id="d_batchcount_remix" name="d_batchcount_remix" class="form-control">
            <option value="">กรุณาเลือกรายการ</option>
        `;
        for(let i = 1; i <= batch_count ; i ++){
            output +=`
            <option value="`+i+`">`+i+`</option>
            `;
        }
        output +=`
        </select>
        `;
        $('#showListBatch_remix_count').html(output);
    }


    function getSpeacialData(get_templatecode)
    {
        if(get_templatecode != ""){
            axios.post(url+'main/getSpeacialData' , {
                action:"getSpeacialData",
                get_templatecode:get_templatecode
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let templateremark = res.data.templateRemark;

                    // Show Other Image
                    let outputOtherImage ='';
                        let resultOtherImage = res.data.imageOther;
                        outputOtherImage +=`<div class="row form-group">`;
                            for(let i = 0; i < resultOtherImage.length; i++){
                                outputOtherImage +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 divOtherImage">
                                <a href="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`" data-toggle="lightbox">
                                    <img class="runImageView" src="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`">
                                </a>
                                </div>`;
                            }
                        outputOtherImage += `</div>`;
                        $('#show_otherImage_viewpage').html(outputOtherImage);
                        // Show Other Image
                        $('#show_templateRemark').val(templateremark);

                        // check publish
                        if(resultOtherImage.length != 0){
                            $('#speacial_section').css('display' , '');
                            $('#otherImage_view_section').css('display' , '');
                            // $('#templateRemark_view_section').css('display' , '');
                        }else{
                            $('#otherImage_view_section').css('display' , 'none');
                        }

                        if(templateremark != null){
                            $('#speacial_section').css('display' , '');
                            $('#templateRemark_view_section').css('display' , '');
                        }else{
                            $('#templateRemark_view_section').css('display' , 'none');
                        }

                        if(resultOtherImage.length == 0 && templateremark == null){
                            $('#speacial_section').css('display' , 'none');
                        }else{
                            $('#speacial_section').css('display' , '');
                        }
                }
            });
        }
    }


    function loaddatajobcard(prodid , dataareaid , status , formno)
    {
        if(prodid != "" && dataareaid != "" && status != "" && formno != ""){
            // convert status 
            if(status == "Start"){
                status = 0;
            }else if(status == "Stop"){
                status = 1;
            }

            if(localStorage.getItem('tab_mix') == "tabpage4"){
                let output =`
                <div class="col-md-12">
                    <div class="">
                        <iframe class="" width="100%" height="1000" frameBorder="0" src="https://intranet.saleecolour.com/intsys/production_plan/machine/jobcard/`+prodid+`/`+dataareaid+`/1/1/`+status+`/`+formno+`/"></iframe>
                    </div>
                </div>
                `;
                $('#showJobcard').html(output);
            }else{
                $('#showJobcard').html('');
            }




            console.log(prodid);
            console.log(dataareaid);
            console.log(status);
            console.log(formno);
        }
    }

    function loadWorkTypeNoList_edit()
    {
        let maxrun = 15;
        let output = '';
        output +=`
        <select id="ehmd_worktype_no" name="ehmd_worktype_no" class="form-control">
            <option value="">กรุณาเลือกรายการ</option>
        `;
        for(let i = 1; i <= maxrun ; i ++){
            output +=`
            <option value="`+i+`">`+i+`</option>
            `;
        }
        output +=`
        </select>
        `;
        $('#showWorkTypeNoList_edit').html(output);
        
    }


    function checkpdforvalidatework_edit(productionNumber , dataareaid , data_m_worktype , data_m_code , data_m_formno)
    {
        if(productionNumber != "" && dataareaid != ""){
            axios.post(url+'main/checkpdforvalidatework_edit' , {
                action:"checkpdforvalidatework_edit",
                productionNumber:productionNumber,
                dataareaid:dataareaid,
                data_m_code:data_m_code,
                data_m_formno:data_m_formno
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){

                    if(res.data.pdtype == "Normal"){
                        swal({
                            title: 'PD เลขที่ '+productionNumber+' ยังไม่เคยมิกซ์งาน ไม่สามารถ Adjust ได้',
                            type: 'error',
                            showConfirmButton: true,
                        }).then(function(){
                            $('#ehmd_worktype').val(res.data.pdtype);
                        });
                    }else if(res.data.pdtype == "Adjust"){
                        if(res.data.pdstatus == 1){
                            $('#ehmd_worktype').val(res.data.pdtype);
                            $('#ehmd_worktype_no').removeAttr("style");
                        }else if(res.data.pdstatus == 0){
                            swal({
                                title: 'กรุณารันงานของ PD เลขที่ '+productionNumber+' ให้จบก่อน',
                                type: 'error',
                                showConfirmButton: true,
                            }).then(function(){
                                $('#ehmd_worktype').val(data_m_worktype);
                                if(data_m_worktype == "Normal"){
                                    $('#ehmd_worktype_no').attr({
                                        "style": "pointer-events: none;",
                                    });
                                }else{
                                    $('#ehmd_worktype_no').removeAttr("style");
                                }
                            });
                        }
                    }
                }
            });
        }
    }








}); //End ready function 


</script>
