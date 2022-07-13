<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



    <!-- Set Point Zone -->
    <div class="modal fade bs-example-modal-lg" id="templateCount_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <div id="templateCountTitle"></div>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                </div>

                <div class="modal-body">
                    
                <div class="row form-group">
                    <div class="col-md-12">
                        <button id="export_templateMasterList" class="btn btn-info">ส่งออกข้อมูล</button>
                    </div>
                </div>

                <div id="show_templatemasterlistdata"></div>

                </div>
            
            </div>

        </div>
    </div>
    <!-- Set Point Zone -->


<body>
<div id="machine_page">
    <div class="main-container">
		<div class="pd-ltr-20">


			<div class="card-box pd-20 height-100-p mb-30">
            <h3 style="text-align:center;">{{title}}</h3><br>
				<div class="row align-items-center">
                    <div class="col-lg-12 mainTemBtn">
                        <button type="button" class="btn btn-primary btnCreTem"><i class="fi-plus mr-2"></i>สร้าง เทมเพลต</button>
                        <!-- <button type="button" class="btn btn-primary btnCreRun"><i class="fi-plus mr-2"></i>จัดการ รันสกรีน</button> -->
                    </div>
				</div>
			</div>


            <div class="card-box pd-20 height-100-p mb-30">
                <h3 style="text-align:center;">รายการ เทมเพลต ทั้งหมด ( <span id="totalTemCount"></span> )</h3>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <input type="text" name="searchTemplate" id="searchTemplate" placeholder="ค้นหา Template" class="form-control" @keyup="loadTemplateList">
                    </div>
                </div>

                <div id="showTemplateList"></div>
			</div>


		</div>
	</div>
</div>
</body>
<script>
    

    $(document).ready(function(){
        let url = "<?php echo base_url() ?>";
        let runScreenMain = [];
        let runScreenSelected = [];

        let stepSequenceArray_edit = [];
        let itemSequenceArray_edit = [];

        // loadMainRunscreen_edit();
        countTemplate();

        $(document).on('click','.btnCreRun',function(){
            $('#manage_runscreen_modal').modal('show');
        });

        $(document).on('click' , '.btnCreTem' , function(){
            $('#create_template_modal').modal('show');
            $('#createTemplateZone').css('display' , 'none');
        });

        $(document).on('click' , '.templateBoxSelect' , function(){
            // For Clear array
            stepSequenceArray_edit = [];
            itemSequenceArray_edit = [];

            const data_autoid = $(this).attr("data_autoid");
            const data_templatename = $(this).attr("data_templatename");
            const data_templatecode = $(this).attr("data_templatecode");
            const data_temperature = $(this).attr("data_temperature");
            const data_itemnumber = $(this).attr("data_itemnumber");
            const data_imagePath = $(this).attr("data_imagePath");
            const data_image = $(this).attr("data_image");
            const data_memo = $(this).attr("data_memo");

            $('#tempCode_edit').val(data_templatecode);
            $('#templateName_edit').val(data_templatename);
            $('#itemNumber_edit').val(data_itemnumber);
            $('#temperature_edit').val(data_temperature);

            $('#showImageTemplate_edit').attr('src' , url+data_imagePath+data_image)
            $('#imageFile_edit').val(data_image);
            $('#imagePath_edit').val(data_imagePath);

            $('#templateremark_edit').val(data_memo);

            loadSubDetailData(data_templatecode);
            
            
            $('#edit_template_modal').modal('show');

            
        });


        $(document).on('click' , '.runSelectLeft_edit' , function(){
            const data_run_autoid = $(this).attr("data_run_autoid");
            const data_run_name = $(this).attr("data_run_name");
            const data_run_min = $(this).attr("data_run_min");
            const data_run_max = $(this).attr("data_run_max");
            const data_run_spoint = $(this).attr("data_run_spoint");

            $('.runDownArrow_edit').css('display' , 'none');
            $('.runUpArrow_edit').css('display' , 'none');

            let resultarray = {
                "run_autoid":data_run_autoid,
                "run_name":data_run_name,
                "run_min":data_run_min,
                "run_max":data_run_max,
                "run_spoint":data_run_spoint
            }
            // runScreenSelected.push(resultarray);
            // console.log(runScreenSelected);
            for(let i = 0; i < runScreenSelected.length; i++){
                runScreenSelected = runScreenSelected.filter(function(value , index , arr){
                    return value.detail_runautoid != data_run_autoid;
                })
            }
            runScreenMain.push(resultarray);
            // console.log(runScreenSelected);
            createRunscreenSelectedList_edit(runScreenSelected);
            createRunscreenMainList_edit(runScreenMain);
            
        });



        $(document).on('click' , '.runRight_edit' , function(){
            const data_run_autoid = $(this).attr("data_run_autoid");
            const data_run_name = $(this).attr("data_run_name");
            const data_run_min = $(this).attr("data_run_min");
            const data_run_max = $(this).attr("data_run_max");
            const data_run_spoint = $(this).attr("data_run_spoint");

            let resultarray = {
                "detail_runautoid":data_run_autoid,
                "detail_column_name":data_run_name,
                "detail_min":data_run_min,
                "detail_max":data_run_max,
                "detail_spoint":data_run_spoint
            }
            runScreenSelected.push(resultarray);
            // console.log(runScreenSelected);
            
            for(let i = 0; i < runScreenSelected.length; i++){
                runScreenMain = runScreenMain.filter(function(value , index , arr){
                    return value.run_autoid != runScreenSelected[i].detail_runautoid;
                });
            }
            console.log(runScreenMain);
            createRunscreenMainList_edit(runScreenMain);
            createRunscreenSelectedList_edit(runScreenSelected);
        });



        $(document).on('click' , '.rSelectedRun_edit' , function(){
            const data_run_autoid = $(this).attr("data_run_autoid");
            runSelected(data_run_autoid);
        });



        $(document).on('click' , '.runDownArrow_edit' , function(){
            const initialIndex = parseInt($(this).attr('data_indexofarray'));
            const finalIndex = initialIndex+1 ;
            const data_run_autoid = $(this).attr('data_run_autoid');

            runScreenSelected = moveElement(runScreenSelected,initialIndex,finalIndex);
            createRunscreenSelectedList_edit(runScreenSelected);
            $('#rSelectedRun_edit_'+data_run_autoid).prop('checked' , true);
            runSelected(data_run_autoid); 
            document.getElementById("rSelectedRun_edit_"+data_run_autoid).scrollIntoView();
        });

        $(document).on('click' , '.runUpArrow_edit' , function(){
            const initialIndex = $(this).attr('data_indexofarray');
            const finalIndex = initialIndex-1 ;
            const data_run_autoid = $(this).attr('data_run_autoid');

            runScreenSelected = moveElement(runScreenSelected,initialIndex,finalIndex);
            createRunscreenSelectedList_edit(runScreenSelected);
            $('#rSelectedRun_edit_'+data_run_autoid).prop('checked' , true);
            runSelected(data_run_autoid);
            document.getElementById("rSelectedRun_edit_"+data_run_autoid).scrollIntoView();
        });



        $(document).on('click' , '#btn-saveRsEdit' ,function(){
            let templatecode = $('#tempCode_edit').val();
            saveRunscreenEdit(templatecode);
        });



        //Edit Sequence
        $(document).on('click' , '.iDelStep_edit' , function(){
            const index = $(this).attr('data_index');
            removeStep_edit(index);
        });


        $(document).on('click' , '.iAddStepSequence_edit' , function(){
            const stepSequence = $('#stepSequence_edit').val();
            stepSequenceArray_edit.push(stepSequence.toUpperCase());
            $('#stepSequence_edit').val('');

            createStepSequenceList_edit(stepSequenceArray_edit);
        });

        
        $(document).on('click' , '.iDelItem_edit' , function(){
            const index = $(this).attr('data_index');
            removeItem_edit(index);
        });


        $(document).on('keyup' , '#itemSequence_edit' , function(){
            if($(this).val() != ""){
                loadItemidFormTable3();
            }else{
                $('#showItemidList2_edit').html('');
            }
        });


        $(document).on('click' , '.itemidA3' , function(){
            const itemid = $(this).attr("data_itemid");
            itemSequenceArray_edit.push(itemid);
            // console.log(itemSequenceArray);
            $('#showItemidList2_edit').html('');
            $('#itemSequence_edit').val('');

            removeDuplicateName(itemSequenceArray_edit);
            createItemSequenceList_edit(itemSequenceArray_edit);

        });



        let machine_page = new Vue({
            el:"#machine_page",
            data:{
                title:"หน้าจัดการ เทมเพลต",
            },
            methods: {
                loadTemplateList()
                {
                    axios.post(url+'main/machine/loadTemplateList',{
                        action:"loadTemplateList",
                        searchTemplate:$('#searchTemplate').val()
                    }).then(res=>{
                        console.log(res.data);
                        if(res.data.status == "Select Data Success"){
                            this.createTemplateBox(res.data.getTemplate);
                        }else{
                            $('#showTemplateList').html(`<h1>ไม่พบข้อมูล</h1>`);
                        }
                    }).catch(err=>{
                        console.error('Error' , err);
                    });
                },

                createTemplateBox(templateData)
                {
                 
                    let output = `
                    <div class="row mt-2">
                    `;
                    for(let i = 0; i < templateData.length; i++){
                        output += `
                        <div class="col-md-4 col-lg-3 col-6 form-group">
                            <div id="mainBox" class="templateBoxSelect"
                                data_autoid = "`+templateData[i].master_autoid+`"
                                data_templatename = "`+templateData[i].master_name+`"
                                data_templatecode = "`+templateData[i].master_temcode+`"
                                data_temperature = "`+templateData[i].master_temperature+`"
                                data_itemnumber = "`+templateData[i].master_itemnumber+`"
                                data_imagePath = "`+templateData[i].master_imagePath+`"
                                data_image = "`+templateData[i].master_image+`"
                                data_memo = "`+templateData[i].master_memo+`"
                            >
                                <img id="box_image" src="`+url+templateData[i].master_imagePath+templateData[i].master_image+`">
                                <span class="box_templatename">`+templateData[i].master_name+`</span>
                            </div>
                        </div>
                        `;
                    }

                    output += `
                    </div>
                    `;

                    $('#showTemplateList').html(output);
                },


            },
            created() {
                this.loadTemplateList();
            },
        }); //End vue cdn


        function moveElement(array,initialIndex,finalIndex) 
        {
            array.splice(finalIndex,0,array.splice(initialIndex,1)[0])
            console.log(array);
            return array;
        }




        // Mix Function Zone

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
                            itemSequenceArray_edit.push(res.data.itemSequence[i].detail_name);
                        }
                        for(let i = 0; i < res.data.stepSequence.length; i++){
                            stepSequenceArray_edit.push(res.data.stepSequence[i].detail_name);
                        }

                        createItemSequenceList_edit(itemSequenceArray_edit);
                        createStepSequenceList_edit(stepSequenceArray_edit);
                        loadOtherImage(data_templatecode);
                    }
                });
            }
        }


        function removeStep_edit(index)
        {
            stepSequenceArray_edit.splice(index , 1);
            createStepSequenceList_edit(stepSequenceArray_edit);
        }

        function removeItem_edit(index)
        {
            itemSequenceArray_edit.splice(index , 1);
            createItemSequenceList_edit(itemSequenceArray_edit);
        }

        function createStepSequenceList_edit(stepSequenceArray_edit)
        {
            console.log(stepSequenceArray_edit);
            // Step Sequence Zone
            let stepArrayHtml = `
            <div class="col-md-10">
            <ul class="list-group">`;
            for(let i = 0; i < stepSequenceArray_edit.length; i++){
                stepArrayHtml +=`
                <li class="list-group-item list-group-item list-group-item-action stepLi">
                    `+stepSequenceArray_edit[i]+`
                    <i class="fa fa-close iDelStep_edit" aria-hidden="true"
                        data_index="`+i+`"
                    ></i>
                </li>
                <input hidden type="text" id="stepSequence_input" name="stepSequence_input[]" value="`+stepSequenceArray_edit[i]+`">
                `;
            }
            stepArrayHtml +=`
            </div>
            </ul>`;
            $('#stepSequenceDiv_edit').html(stepArrayHtml);
        }

        function createItemSequenceList_edit(itemSequenceArray_edit)
        {
            console.log(itemSequenceArray_edit);
            // Item Sequence Zone
            let itemSeqHtml = '';
            for(let i = 0; i < itemSequenceArray_edit.length; i++){
                itemSeqHtml +=`
                <span class="itemTag"><b>`+itemSequenceArray_edit[i]+`</b>
                <i class="fa fa-close iDelItem_edit" aria-hidden="true"
                    data_index="`+i+`"
                ></i>
                </span>
                <input hidden type="text" id="itemSequenceInput_edit" name="itemSequenceInput_edit[]" value="`+itemSequenceArray_edit[i]+`">
                `;
            }
            $('#showItemSequenceArray_edit').html(itemSeqHtml);
            // Item Sequence Zone
        }

        function loadItemidFormTable3()
        {
            axios.post(url+'main/machine/loadItemidFormTable3' , {
                action:'loadItemidFormTable3',
                itemNumber:$('#itemSequence_edit').val()
            }).then(res=>{
                console.log(res.data.status);
                $('#showItemidList2_edit').html(res.data.outputHtml);
            }).catch(err=>{
                console.error('Error' , err);
            });
        }

        function removeDuplicateName(inputArray){
            return itemSequenceArray = [...new Set(inputArray)];
        }






        function loadOtherImage(templatecode)
        {
            if(templatecode != ""){
                axios.post(url+'main/machine/loadOtherImage' , {
                    action:"loadOtherImage",
                    templatecode:templatecode
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Select Data Success"){
                        // Show Other Image
                        let outputOtherImage ='';
                        let resultOtherImage = res.data.otherImage;
                        outputOtherImage +=`<div class="row form-group">`;
                            for(let i = 0; i < resultOtherImage.length; i++){
                                outputOtherImage +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 divOtherImage">
                                <a href="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`" data-toggle="lightbox">
                                    <img class="runImageView" src="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`">
                                </a>
                                <i aria-hidden="true" class="fa fa-trash mr-2 delOtherImage"
                                    data_autoid="`+resultOtherImage[i].tm_autoid+`"
                                    data_filename="`+resultOtherImage[i].tm_imagename+`"
                                    data_filepath="`+resultOtherImage[i].tm_imagepath+`"
                                    data_templatecode="`+templatecode+`"
                                ></i>
                                </div>`;
                            }
                        outputOtherImage += `</div>`;
                        $('#show_otherimage').html(outputOtherImage);
                        // Show Other Image
                    }
                });
            }

        }


        $(document).on('click' , '.delOtherImage' , function(){
            const data_autoid = $(this).attr("data_autoid");
            const data_filename = $(this).attr("data_filename");
            const data_filepath = $(this).attr("data_filepath");
            const data_templatecode = $(this).attr("data_templatecode");
            if(data_autoid != ""){
                swal({
                    title: 'ต้องการลบรูปนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {
                    if(result.value == true){
                        delOtherImage(data_autoid , data_filename , data_filepath , data_templatecode);
                    }
                });
            }
        });


        function delOtherImage(data_autoid , data_filename , data_filepath , data_templatecode)
        {
            if(data_autoid != ""){
                axios.post(url+'main/machine/delOtherImage' , {
                    action:"delOtherImage",
                    data_autoid:data_autoid,
                    data_filename:data_filename,
                    data_filepath:data_filepath
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Delete Data Success"){
                        swal({
                            title: 'ลบรูปภาพสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            loadOtherImage(data_templatecode);
                        });
                    }
                });
            }
        }


        function countTemplate()
        {
            axios.post(url+'main/machine/countTemplate' , {
                action:"countTemplate"
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let temcountHtml = `<a href="javascript:void(0)" class="clickTemCount">`+res.data.templateCount+` รายการ </a>`;
                    $('#totalTemCount').html(temcountHtml);
                }
            });
        }


        $(document).on('click','.clickTemCount' , function(){
            $('#templateCount_modal').modal('show');
            let tctitle = `<h3>รายการ Template ทั้งหมด</h3>`;
            $('#templateCountTitle').html(tctitle);
            masterTemplateList();
            
        });


        function masterTemplateList()
		{
            axios.post(url+'main/machine/loadTemplateMasterList' , {
                action:"loadTemplateMasterList"
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let result = res.data.result;
                    let html = `
                    <div class="table-responsive">
                    <table id="tbl_template_masterlist_result" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="runname">#</th>
                                <th class="runmin">Template Name</th>
                                <th class="runmax">Item Number</th>
                            </tr>
                        </thead>
                        <tbody>
                    `;
                    for(let i = 0; i < result.length; i++){
                        html +=`
                        <tr>
                            <td></td>
                            <td>`+result[i].master_name+`</td>
                            <td>`+result[i].master_itemnumber+`</td>
                        </tr>
                        `;
                    }
                        html += `
                        </tbody>
                    </table>
                    </div>
                        `;

                        $('#show_templatemasterlistdata').html(html);

                        let thid = 1;
                        $('#tbl_template_masterlist_result thead th').each(function() {
                            var title = $(this).text();
                            $(this).html(title + '<input type="text"  class="col-search-input" placeholder="Search ' + title + '" />');
                            thid++;
                        });
                            
                        var table = $('#tbl_template_masterlist_result').DataTable({
                            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                                $('td:eq(0)', nRow).html(iDisplayIndexFull +1);
                            },
                            "stateSave": true,
                            stateLoadParams: function(settings, data) {
                                for (i = 0; i < data.columns["length"]; i++) {
                                    let col_search_val = data.columns[i].search.search;
                                    if (col_search_val !== "") {
                                        $("input", $("#tbl_template_masterlist_result thead th")[i]).val(col_search_val);
                                    }
                                }
                            },
                            
                            // order: [
                            //     [0, 'desc']
                            // ],
                            columnDefs: [{
                                    targets:'_all',
                                    orderable: false
                                },
                                // {"width": "80","targets": 0},
                                // {"width": "200","targets": 1},
                                // {"width": "100","targets": 2},
                            ],
                            
                        });


                        table.columns().every(function() {
                            var table = this;
                            $('input', this.header()).on('keyup change', function() {
                                if (table.search() !== this.value) {
                                    table.search(this.value).draw();
                                }
                            });
                        });
                }
            });      
		}

        $(document).on('click' , '#export_templateMasterList' , function(){
            location.href = url+'main/exportdata/exportdata_templateList';
        });



    }); //End document ready
</script>
</html>