<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแสดงรายการใบงาน</title>

		<!-- Date picker -->
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />
		
</head>
<body>
    <div class="main-container">
		<div class="pd-ltr-20">
		
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<div class="mt-5"></div>
						<div class="row mb-3">
							<div class="col-md-6">
								<button type="button" id="btn-addMachineData" class="btn btn-primary btnIndex" style="display:none;">
									<i class="fi-plus mr-2"></i>เพิ่มข้อมูล</button>
								<button type="button" id="btn-graphMachineData" class="btn btn-secondary btnIndex">
									<i class="fi-graph-bar mr-2"></i>กราฟ</button>
							</div>
						</div>
						<hr>
						<div class="mt-4"></div>
						<h3 style="text-align:center;">ข้อมูลเครื่องมิกซ์</h3>

						<div class="row mt-4">
							<div class="col-md-12">
								<div id="searchBydate" class="row">
									<div class="col-md-6">
										<select name="dataFilterDept" id="dataFilterDept" class="form-control">
											<option value="all">All</option>
											<option value="pd">PD</option>
											<option value="lab">LAB</option>
										</select>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
											<input type="text" name="datestart" id="datestart" class="form-control" placeholder="วันที่เริ่มต้น">
											</div>
											<div class="col-md-6">
											<input type="text" name="dateend" id="dateend" class="form-control" placeholder="วันที่สิ้นสุด">
											</div>
										</div>
									</div>
									
									
								</div>
								<div id="btn_searchBydateDiv" class="mt-2">
									<button type="button" id="btn_clearSearchByDate" class="btn btn-warning"><i class="fa fa-rotate-left mr-2" aria-hidden="true"></i>ล้างการค้นหา</button>

									<button type="button" id="btn_searchBydate" class="btn btn-success"><i class="fa fa-search mr-2" aria-hidden="true"></i>ค้นหา</button>
									
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table id="dataMainList" class="table table-striped table-bordered" cellspacing="0">
								<thead>
									<tr>
										<th>Form Number</th>
										
										<th>STD. Name</th>
										<th>Item Number</th>
										<th>Machine Name</th>
										<th>Production Number</th>
										<th>Job Number</th>
										<th>Batch Number</th>
										<th>Order</th>
										<th>Work Type</th>
										<th>Run</th>
										<th>Date</th>
										<th>Status</th>
										<th>Memo</th>
									</tr>
								</thead>
							</table>
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
		checkProductionUser();
		localStorage.removeItem('tab');
		let deptcode = "<?php echo getUser()->DeptCode; ?>";

		let url = "<?php echo base_url(); ?>";

		$('#btn-addMachineData').click(function(){
			$('#addNewData_modal').modal('show');

			$('#frm_savemainData input').val('');
			$('#frm_savemainData select option[value=""]').prop("selected" , true);
			// Check Dept
			if(deptcode == 1014 || deptcode == 1015){
				$('#m_product_number').attr('disabled' , true).removeAttr('required');
				$('.divProdid').css('display','none');
				$('.divjob').css('display','');
				$('.divTypeofbag').css('display' , 'none');
				$('.divBagtext').css('display' , 'none');
				$('.divBatchSize').css('display' , 'none');

            }
		});

		let datestart = "";
		let dateend = "";
		// loadDataList();
		checkDateSearch();

		// $(document).on('click' , '.l_viewmain' , function(){
		// 	const data_mainformno = $(this).attr("data_mainformno");
		// 	const data_maincode = $(this).attr("data_maincode");
		// 	$('#getMaincode').val(data_maincode);
		// 	let link = url+'viewfulldata.html/'+data_mainformno;
		// 	window.open(link, '_blank');
		// });


		$(document).on('click' , '#btn-graphMachineData' , function(){
			location.href = url+'main/graph/graphPage';
		});


		$(document).on('click' , '#btn_searchBydate' , function(){
			// if($('#datestart').val() != "" && $('#dateend').val() != ""){
			// 	let date_start = $('#datestart').val();
			// 	let date_end = $('#dateend').val();
			// 	loadDataListByDate(date_start , date_end);
			// }

			let datestart = $('#datestart').val();
            let dateend = $('#dateend').val();

            if(datestart != "" && dateend != ""){
                let dateSearch_value = {
                'dateStart':datestart,
                'dateEnd':dateend
                }
                sessionStorage.setItem('dateSearch_mix',JSON.stringify(dateSearch_value));
                checkDateSearch();
                // console.log(datestart+dateend);
            }else{
                swal(
                        {
                            type: 'error',
                            title: 'กรุณาเลือกวันที่ต้องการค้นหา',
                            showConfirmButton: false,
                            timer: 1500
                        }
                    );
                    $('#datestart').val('');
                    $('#dateend').val('');
            }
		});

		$(document).on('click' , '#btn_clearSearchByDate' , function(){
			// let table = $('#dataMainList').DataTable();
			// table.state.clear();
			// location.reload();

			sessionStorage.removeItem('dateSearch_mix');
			sessionStorage.removeItem('dataFilter_mix');
            $('#dataMainList').DataTable().state.clear();
            checkDateSearch();
		});


		$(document).on('change' , '#dataFilterDept' , function(){
			let filterdept = $('#dataFilterDept').val();
			let dataSearch_value = {
                'filterdept':filterdept
                }
			sessionStorage.setItem('dataFilter_mix',JSON.stringify(dataSearch_value));
			checkDateSearch();
			console.log(filterdept);
		});


		$('#datestart').Zebra_DatePicker({
            pair: $('#dateend')
        });
        $('#dateend').Zebra_DatePicker({
            direction: true
        });



	// Function zone
		function loadDataList()
		{
			$('#dataMainList').DataTable().destroy();

			let thid = 1;
			$('#dataMainList thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="mainlist_'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});

				var widthss;
				const browserWidth = $(window).width();
					if(browserWidth > 768){
						$('#dataMainList').css('width' , '800px');
					}else if(browserWidth > 1023){
						$('#dataMainList').css('width' , '1400px');
					}

				$(window).resize(function(){
					if(browserWidth > 768 && browserWidth < 1024){
						$('#dataMainList').css('width' , '800px');
					}else if(browserWidth > 1023){
						$('#dataMainList').css('width' , '1300px');
					}
				});

				// if(datestart != "" && dateend != ""){
				// 	$('#dataMainList').DataTable().destroy();
					
				// }
				
					var table = $('#dataMainList').removeAttr('width').DataTable({
								"scrollX": true,
								"processing": true,
								"serverSide": true,
								"stateSave": true,
								stateLoadParams: function(settings, data) {
									for (i = 0; i < data.columns["length"]; i++) {
										let col_search_val = data.columns[i].search.search;
										if (col_search_val !== "") {
											$("input", $("#dataMainList thead th")[i]).val(col_search_val);
										}
									}
								},
								"ajax": {
									"url":"<?php echo base_url('main/loadMainData') ?>",
								},
								order: [
									[0, 'desc']
								],
								columnDefs: [{
										targets: "_all",
										orderable: false
									},
									{"width": "80","targets": 0},
									{"width": "200","targets": 1},
									{"width": "200","targets": 2},
									{"width": "100","targets": 3},
									{"width": "100","targets": 4},
									{"width": "100","targets": 5},
									{"width": "100","targets": 6},
									{"width": "50","targets": 7},
									{"width": "100","targets": 8},
									{"width": "100","targets": 9},
									{"width": "150","targets": 10}
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

				$('#mainlist_8').prop('readonly' , true).css({
					'background-color':'#F5F5F5',
					'cursor':'no-drop'
				});
		}

		function loadDataListByDate(date_start , date_end , dept_type)
		{

			if(date_start == ""){
				date_start = "0";
			}

			if(date_end == ""){
				date_end = "0"
			}

			if(dept_type == ""){
				dept_type = "10"
			}

			$('#dataMainList').DataTable().destroy();

			let thid = 1;
			$('#dataMainList thead th').each(function() {
				var title = $(this).text();
				$(this).html(title + ' <input type="text" id="mainlist_'+thid+'" class="col-search-input" placeholder="Search ' + title + '" />');
				thid++;
			});

				var widthss;
				const browserWidth = $(window).width();
					if(browserWidth > 768){
						$('#dataMainList').css('width' , '800px');
					}else if(browserWidth > 1023){
						$('#dataMainList').css('width' , '1400px');
					}

				$(window).resize(function(){
					if(browserWidth > 768 && browserWidth < 1024){
						$('#dataMainList').css('width' , '800px');
					}else if(browserWidth > 1023){
						$('#dataMainList').css('width' , '1300px');
					}
				});

				// if(date_start != "" && date_end != ""){
				// 	$('#dataMainList').DataTable().destroy();
					
				// }
				
					var table = $('#dataMainList').removeAttr('width').DataTable({
								"scrollX": true,
								"processing": true,
								"serverSide": true,
								"stateSave": true,
								stateLoadParams: function(settings, data) {
									for (i = 0; i < data.columns["length"]; i++) {
										let col_search_val = data.columns[i].search.search;
										if (col_search_val !== "") {
											$("input", $("#dataMainList thead th")[i]).val(col_search_val);
										}
									}
								},
								"ajax": {
									"url":"<?php echo base_url('main/loadMainDataByDate/') ?>"+date_start+"/"+date_end+"/"+dept_type,
								},
								order: [
									[0, 'desc']
								],
								columnDefs: [{
										targets: "_all",
										orderable: false
									},
									{"width": "80","targets": 0},
									{"width": "200","targets": 1},
									{"width": "200","targets": 2},
									{"width": "100","targets": 3},
									{"width": "100","targets": 4},
									{"width": "100","targets": 5},
									{"width": "100","targets": 6},
									{"width": "50","targets": 7},
									{"width": "100","targets": 8},
									{"width": "100","targets": 9},
									{"width": "150","targets": 10}
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

				$('#mainlist_8').prop('readonly' , true).css({
					'background-color':'#F5F5F5',
					'cursor':'no-drop'
				});
		}

		function checkProductionUser()
		{
			const deptcode = "<?php echo getUser()->DeptCode; ?>";
			const ecode = "<?php echo getUser()->ecode; ?>";
			if(deptcode == "1007" || deptcode == "1014" || deptcode == "1015" || deptcode == "1002"){

				$('#btn-addMachineData').css('display' , '');

			}else{
				$('#btn-addMachineData').css('display' , 'none');
			}
		}


		function checkDateSearch()
		{
			let dataDateSearch = sessionStorage.getItem('dateSearch_mix');
			let dataFilter = sessionStorage.getItem('dataFilter_mix');
			console.log(JSON.parse(dataDateSearch));

			let dateStart_value , dataEnd_value;
			let dataFilter_value;

			if(dataDateSearch !== null){
				console.log('มีค่า');
				dateStart_value = JSON.parse(dataDateSearch).dateStart;
				dataEnd_value = JSON.parse(dataDateSearch).dateEnd;
				$('#datestart').val(dateStart_value);
				$('#dateend').val(dataEnd_value);
			}else{
				// loadDataList();
				dateStart_value = "";
				dataEnd_value = "";
				$('#datestart').val('');
				$('#dateend').val('');
			}

			if(dataFilter !== null){
				dataFilter_value = JSON.parse(dataFilter).filterdept;
				$('#dataFilterDept').val(dataFilter_value);
			}else{
				dataFilter_value = "all";
				$('#dataFilterDept').val('all');
			}

			loadDataListByDate(dateStart_value,dataEnd_value,dataFilter_value);
		}


	});
</script>
