<div id="create_template">

    <div class="modal fade bs-example-modal-lg" id="create_template_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable createTempMdSize">

        <form id="frm_saveTemplate" @submit.prevent="saveTemplate" autocomplete="off" class="needs-validation" novalidate style="width:100%">
        
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">{{title}}</h4>
                    <button type="button" class="close close_createTemplate" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-header">
                    <div class="row">
                        <div class="col-lg-12 form-inline">
                            <div class="custom-control custom-radio mb-5 ml-3">
                                <input type="radio" id="choiceTemplate_new" name="choiceTemplates" class="custom-control-input" value="new">
                                <label class="custom-control-label" for="choiceTemplate_new">สร้างใหม่</label>
                            </div>
                        
                            <div class="custom-control custom-radio mb-5 ml-3">
                                <input type="radio" id="choiceTemplate_copy" name="choiceTemplates" class="custom-control-input" value="copy">
                                <label class="custom-control-label" for="choiceTemplate_copy">คัดลอก</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <button type="submit" id="btn-saveNewTemplate" class="btn btn-success"><i class="fi-save mr-2"></i>บันทึก</button>
                          <!-- <button type="button" id="btn-calcelNewTemplate" class="btn btn-danger close_createTemplate" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                      </div>
                    </div>
                </div>

                <!-- <div id="btn_saveNewTemplate" class="modal-header">
                    <div class="row">
                      <div class="col-lg-12">
                          <button type="button" id="btn-saveNewTemplate" class="btn btn-success">บันทึก</button>
                          <button type="button" id="btn-calcelNewTemplate" class="btn btn-danger close_createTemplate" @click="close_createTemplate">ปิด</button>
                      </div>
                    </div>
                </div> -->

                <div id="createTemplateZone" class="modal-body" style="display:none;">

                    <!-- For new template -->
                    <div class="row">
                        <div class="col-md-4">
                            <div id="templateImageArea">
                                <img id="showImageTemplate" src="<?=base_url('uploads/noimage2.jpg')?>" alt="">
                            </div>  
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12 form-group cTemplateSource" style="display:none;">
                                    <label for=""><b>Template Source Name</b></label>
                                    <input type="text" name="templateSourceName" id="templateSourceName" class="form-control">
                                    <div id="showTemplateSource"></div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>Template Name</b>&nbsp;<span class="textRequest">*</span></label>
                                    <input type="text" name="templateName" id="templateName" class="form-control" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><b>Item Number</b></label>
                                    <input type="text" name="itemNumber" id="itemNumber" class="form-control">
                                    <div id="showItemidList"></div>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label for=""><b>Max. Temperature (°C)</b>&nbsp;<span class="textRequest">*</span></label>
                                    <input type="text" name="temperature" id="temperature" class="form-control" required>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label for=""><b>Upload Template Picture</b></label>
                                    <input type="file" name="templatePicture" id="templatePicture" class="form-control" onchange="loadimageTemplate(event)" accept=".png,.jpeg,.jpg">
                                    <input hidden type="text" name="templatePicture_o" id="templatePicture_o">
                                    <input hidden type="text" name="templatePicturePath_o" id="templatePicturePath_o">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>อัพโหลดรูปภาพอื่นๆ</b></label>
                            <input id="t_otherImage" name="t_otherImage[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for=""><b>หมายเหตุ</b></label>
                            <textarea name="t_remark" id="t_remark" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for=""><b>Item Sequence</b></label>
                            <div id="showItemSequenceArray" class="mt-3"></div>
                            <input type="text" name="itemSequence" id="itemSequence" class="form-control mt-3">
                            <div id="showItemidList2"></div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>

                    <label for=""><b>Step Sequence</b></label>
                    <div class="row mainStep">
                        <div class="col-md-10">
                            <input type="text" name="stepSequence" id="stepSequence" class="form-control" style="text-transform: uppercase;" required>
                        </div>
                        <div class="col-md-2 div_iAddStepSequence">
                            <span>
                                <i class="fa fa-save iAddStepSequence" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div id="stepSequenceDiv" class="row mt-1 form-group"></div>


                    <div class="row" style="display:none;">
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="searchRunscreenMain" id="searchRunscreenMain" class="form-control" placeholder="Search Run Screen Master">
                            <div class="mt-2">
                                <span><b>Total : <span id="totalRunMainCount"></span> รายการ</b></span>
                            </div>
                            <div id="showRunscreenMain" class="mt-2"></div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="searchRunscreenSelected" id="searchRunscreenSelected" class="form-control" placeholder="Search Run Screen Selected">
                            <div class="mt-2">
                                <span><b>Total : <span id="totalRunSelectedCount"></span> รายการ</b></span>
                                <div class="iconUpAndDown">
                                    <i id="runUp" class="fa fa-chevron-circle-up runUpArrow" aria-hidden="true" style="display:none;"></i>&nbsp;&nbsp;
                                    <i id="runDown" class="fa fa-chevron-circle-down runDownArrow" aria-hidden="true" style="display:none;"></i>
                                </div>
                            </div>
                            <div id="showRunscreenSelected" class="mt-2"></div>
                        </div>
                    </div>

                    
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div> -->
                
            </div>

            </form>
        

        </div>
    </div>

</div>

<script>

    $(document).ready(function(){
        let url = "<?php echo base_url(); ?>";

        // let runScreenMain = [];
        // let runScreenSelected = [];

        let itemSequenceArray = [];
        let stepSequenceArray = [];

        $(document).on('click' , '.run_spoint' , function(){
            const data_run_autoid = $(this).attr("data_run_autoid");
            console.log(data_run_autoid);
        });


        $(document).on('change' , 'input[type=radio][name=choiceTemplates]' , function(){
            // console.log($(this).val());
            $('#createTemplateZone').css('display' , '');
            if($(this).val() == "new"){
                // runScreenSelected = [];
                // createRunscreenSelectedList(runScreenSelected);
                $('#showImageTemplate').attr('src' , url+'uploads/noimage2.jpg');
                $('#frm_saveTemplate input[type=text]').val('');
                $('.cTemplateSource').css('display' , 'none');
            }else if($(this).val() == "copy"){
                // runScreenSelected = [];
                // createRunscreenSelectedList(runScreenSelected);
                $('#showImageTemplate').attr('src' , url+'uploads/noimage2.jpg');
                $('#frm_saveTemplate input[type=text]').val('');
                $('.cTemplateSource').css('display' , '');
            }
            // loadMainRunscreen();
        });


        $(document).on('keyup' , '#templateSourceName' , function(){
            if($(this).val() != ""){
                getTemplateSource();
            }else{
                $('#showTemplateSource').html('');
            }
        });

        $(document).on('click','.temSourceLi' , function(){
            itemSequenceArray = [];
            stepSequenceArray = [];

            const data_master_temcode = $(this).attr("data_master_temcode");
            const data_master_name = $(this).attr("data_master_name");
            const data_master_itemnumber = $(this).attr("data_master_itemnumber");
            const data_master_temperature = $(this).attr("data_master_temperature");
            const data_master_image = $(this).attr("data_master_image");
            const data_master_imagePath = $(this).attr("data_master_imagePath");
            const data_master_imagestatus = $(this).attr("data_master_imagestatus");


            $('#templateSourceName').val(data_master_name);
            $('#itemNumber').val(data_master_itemnumber);
            $('#temperature').val(data_master_temperature);
      
            $('#templatePicture_o').val(data_master_image);
            $('#templatePicturePath_o').val(data_master_imagePath);

            $('#showImageTemplate').attr('src' , url+data_master_imagePath+data_master_image);

            $('#showTemplateSource').html('');
            // loadSelectedRunscreen_copy(data_master_temcode);

            loadSubDetailData(data_master_temcode);

            
        });

        $(document).on('click' , '.close_createTemplate' , function(){
            $('#frm_saveTemplate input[type=text]').val('');
            $('#frm_saveTemplate input[type=radio]').prop('checked' , false);
            $('.cTemplateSource').css('display','none');
            $('#showTemplateSource , #showItemidList').html('');

            itemSequenceArray = [];
            stepSequenceArray = [];

            createItemBadge(itemSequenceArray);
            createStepSequenceList(stepSequenceArray);
        });


        $(document).on('keyup' , '#itemNumber' , function(){
            if($(this).val() != ""){
                loadItemidFormTable();
            }else{
                $('#showItemidList').html('');
            }
        });

        $(document).on('keyup' , '#itemSequence' , function(){
            if($(this).val() != ""){
                loadItemidFormTable2();
            }else{
                $('#showItemidList2').html('');
            }
        });

        $(document).on('click' , '.itemidA2' , function(){
            const itemid = $(this).attr("data_itemid");
            itemSequenceArray.push(itemid);
            // console.log(itemSequenceArray);
            $('#showItemidList2').html('');
            $('#itemSequence').val('');

            removeDuplicateName(itemSequenceArray);
            createItemBadge(itemSequenceArray);

        });

        $(document).on('click' , '.iClose' , function(){
            const itemIndex = $(this).attr('data_index');
            removeItem(itemIndex);
        })


        $(document).on('click','.itemidA' , function(){
            const itemid = $(this).attr("data_itemid");
            $('#itemNumber').val(itemid);
            $('#showItemidList').html('');
        });

        $(document).on('keyup' , '#searchRunscreenMain' , function(){
            const value = $(this).val().toLowerCase(); 
            $('.runRightLi').filter(function(){ 
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) 
            });
        });

        $(document).on('keyup' , '#searchRunscreenSelected' , function(){
            const value = $(this).val().toLowerCase(); 
            $('.runSelectLeftLi').filter(function(){ 
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) 
            });
        });


        $(document).on('click' , '.iAddStepSequence' , function(){
            const stepSequence = $('#stepSequence').val();
            stepSequenceArray.push(stepSequence.toUpperCase());
            $('#stepSequence').val('');

            createStepSequenceList(stepSequenceArray);
        });

        $(document).on('click' , '.iDelStep' , function(){
            const itemIndex = $(this).attr('data_index');
            removeStep(itemIndex);
        })

        
        




        let create_template = new Vue({
            el:'#create_template',
            data:{
                title:'หน้า สร้างเทมเพลต',
                addnewTemp:null,
                runscreenMain:'',
                totalMain:0,
                templateSource:''
            },
            methods: {

                saveTemplate()
                {
                    // Check Template name Input
                    if(itemSequenceArray.length == 0){
                        swal({
                            title: 'กรุณากำหนด Item Sequence',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if(stepSequenceArray.length == 0){
                        swal({
                            title: 'กรุณากำหนด Step Sequence',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else if($('#templateName').val() == ""){
                        swal({
                            title: 'กรุณากำหนดชื่อ Template',
                            type: 'error',
                            showConfirmButton: false,
                            timer:1000
                        });
                    }else{
                        $('#btn-saveNewTemplate').prop('disabled' , true);
                        $('#create_template_modal').modal('hide');
                        $('.loader').fadeIn(100);

                        const form = $('#frm_saveTemplate')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/machine/saveTemplate',data ,{
                            header:{
                                'Content-Type' : 'multipart/form-data'
                            },
                        }).then(res=>{
                            console.log(res);
                            if(res.data.status == "Insert Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    location.reload();
                                });
                            }else{
                                $('#btn-saveNewTemplate').prop('disabled' , false);
                                $('#create_template_modal').modal('show');
                                $('.loader').fadeOut(100);
                            }
                        }).catch(err=>{
                            console.error('Err' , err);
                        });
                    }




               
                },
                
            },
            mounted() {
                
            },

        });



        function moveElement(array,initialIndex,finalIndex) 
        {
            array.splice(finalIndex,0,array.splice(initialIndex,1)[0])
            console.log(array);
            return array;
        }



        function loadItemidFormTable()
        {
            axios.post(url+'main/machine/loadItemidFormTable' , {
                action:'loadItemidFormTable',
                itemNumber:$('#itemNumber').val()
            }).then(res=>{
                console.log(res.data.status);
                $('#showItemidList').html(res.data.outputHtml);
            }).catch(err=>{
                console.error('Error' , err);
            });
        }

        function loadItemidFormTable2()
        {
            axios.post(url+'main/machine/loadItemidFormTable2' , {
                action:'loadItemidFormTable2',
                itemNumber:$('#itemSequence').val()
            }).then(res=>{
                console.log(res.data.status);
                $('#showItemidList2').html(res.data.outputHtml);
            }).catch(err=>{
                console.error('Error' , err);
            });
        }



        function getTemplateSource()
        {
            axios.post(url+'main/machine/getTemplateSource' , {
                action:"getTemplateSource",
                tempSource:$('#templateSourceName').val()
            }).then(res=>{
                console.log(res.data);
                let templateSourceData = res.data.templateSource;
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    output +=`
                    <ul class="list-group temSourceLiUl">
                    `;
                    for(let i = 0; i < templateSourceData.length; i++){
                        output +=`
                        <li class="list-group-item temSourceLi"
                            data_master_temcode="`+templateSourceData[i].master_temcode+`"
                            data_master_name="`+templateSourceData[i].master_name+`"
                            data_master_itemnumber="`+templateSourceData[i].master_itemnumber+`"
                            data_master_temperature="`+templateSourceData[i].master_temperature+`"
                            data_master_image="`+templateSourceData[i].master_image+`"
                            data_master_imagePath="`+templateSourceData[i].master_imagePath+`"
                            data_master_imagestatus="`+templateSourceData[i].master_imagestatus+`"
                        >`+templateSourceData[i].master_name+`</li>
                        `;
                    }
                    output +=`
                    </ul>
                    `;

                    $('#showTemplateSource').html(output);
                }
            });
        }


        function removeDuplicateName(inputArray){
            return itemSequenceArray = [...new Set(inputArray)];
        }


        function createItemBadge(itemArray)
        {
            let itemSequenceBadge = '';
            for(let i = 0; i < itemArray.length; i++){
                itemSequenceBadge +=`
                <span class="itemTag"><b>`+itemArray[i]+`</b>
                <i class="fa fa-close iClose" aria-hidden="true"
                    data_index="`+i+`"
                ></i>
                </span>
                <input hidden type="text" id="itemSequenceInput" name="itemSequenceInput[]" value="`+itemArray[i]+`">
                `;
            }
            $('#showItemSequenceArray').html(itemSequenceBadge);
            console.log(itemArray);
        }


        function removeItem(index)
        {
            itemSequenceArray.splice(index , 1);
            createItemBadge(itemSequenceArray);
        }

        function removeStep(index)
        {
            stepSequenceArray.splice(index , 1);
            createStepSequenceList(stepSequenceArray);
        }

        function createStepSequenceList(stepArray)
        {
            let stepArrayHtml = `
            <div class="col-md-10">
            <ul class="list-group">`;
            for(let i = 0; i < stepArray.length; i++){
                stepArrayHtml +=`
                <li class="list-group-item list-group-item list-group-item-action stepLi">
                    `+stepArray[i]+`
                    <i class="fa fa-close iDelStep" aria-hidden="true"
                        data_index="`+i+`"
                    ></i>
                </li>
                <input hidden type="text" id="stepSequence_input" name="stepSequence_input[]" value="`+stepArray[i]+`">
                `;
            }
            stepArrayHtml +=`
            </div>
            </ul>`;
            $('#stepSequenceDiv').html(stepArrayHtml);
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
                            itemSequenceArray.push(res.data.itemSequence[i].detail_name);
                        }
                        for(let i = 0; i < res.data.stepSequence.length; i++){
                            stepSequenceArray.push(res.data.stepSequence[i].detail_name);
                        }

                        createItemBadge(itemSequenceArray);
                        createStepSequenceList(stepSequenceArray);
                    }
                });
            }
        }



    }); //End document function




    let loadimageTemplate = function(event) { 
        let reader = new FileReader(); 
        reader.onload = function(){ 
        let output = document.getElementById('showImageTemplate'); 
        output.src = reader.result; 
        }; 
            reader.readAsDataURL(event.target.files[0]); 
    };
</script>