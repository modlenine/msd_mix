<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packing List Online</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>vendors/styles/style.css">
	

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>src/plugins/sweetalert2/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/custom.css">

	<!-- Bootstrap File Upload CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>fileupload/bs-filestyle.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>fileupload/bootstrap-icons.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url()?>assets/ekko_lightbox/ekko-lightbox.css" type="text/css"/>


	<!-- Date picker -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/default/zebra_datepicker.min.css" type="text/css" />

    <script src="<?=base_url('assets/js/jquery.min.js?v='.filemtime('./assets/js/jquery.min.js'))?>"></script>
	<script src="<?=base_url('assets/js/vue.js')?>"></script>
	<script src="<?=base_url('assets/js/axios.min.js')?>"></script>

    <style>
		/* thai */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aAFJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
		}

		/* vietnamese */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBpJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
		}

		/* latin-ext */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBtJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}

		/* latin */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBVJnw.woff2') ?>) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		* {
			font-family: 'Sarabun', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		label {
			font-family: 'Sarabun', sans-serif !important;
		}

		body {
			font-size: .9rem !important;
			height:fit-content !important;
			min-height:fit-content !important;
		}

		.form-control {
			font-size: .9rem !important;
		}

		.process-steps li h5 {
			font-size: .85rem !important;
		}

		.col-search-input {
			width: 100% !important;
		}


		
	</style>

</head>
<body>
<div class="container">

		
			<div class="row mt-2">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">

						<section id="production_order_detail">
							<div>
								<h3><u>PRODUCTION ORDER DETAILS</u></h3>
								<p></p>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label for=""><b>ORDER QTY : </b><span id="order_qty"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>DELIVERY DATE : </b><span id="deliverydate"></span></label>
									</div>
								</div>
							</div>
							<hr>
						</section>

						<section id="packing_list_detail">
							<div style="height:250px;">
								<h3><u>PACKING LIST DETAILS</u></h3>
								<p></p>
								<p>
									<label for=""><b>Package number : </b><span id="package_number_txt"></span> : <span id="package_text_txt"></span></label>
									<br>
									<label for=""><b>Packing list remark : </b><span id="packing_list_remark_txt"></span></label>
								</p>
							</div>
							<div>
								<p class="d-flex justify-content-between">
									<label for=""><b>Need COA : </b><span id="need_coa_txt"></span></label>
									<label for=""><b>Standard label : </b><span id="standard_label_txt"></span></label>
									<label for=""><b>File attach : </b><span id="file_attach_txt"></span></label>
									<label for=""><b>Photo attach : </b><span id="photo_attach_txt"></span></label>
								</p>
							</div>
							<section id="fileAttach" style="display:none;">
								<div id="showFileAttach"></div>
							</section>

							<section id="photoAttach" style="display:none;">
								<div id="showPhotoAttach"></div>
							</section>
							<hr>
						</section>

						<section id="sticker_label_detail">
							<div>
								<h3><u>STICKER LABEL DETAILS</u></h3>
								<p></p>
								<div id="sticker_label_section" class="row">
									<div class="col-md-6 col-sm-6">
										<label for=""><b>DESCRIPTION : </b><span id="description_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>PRODUCT CODE : </b></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>LOT NO : </b></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>NET WEIGHT : </b></label>
									</div>
								</div>
							</div>
							<hr>
						</section>

						<section id="pallet_details">
							<div>
								<h3><u>PALLET DETAILS</u></h3>
								<p></p>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Pallet number : </b><span id="pallet_number_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Pallet type : </b><span id="pallet_type_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Pallet sort : </b><span id="pallet_sort_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Stretch hood : </b><span id="stretch_hood_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Pallet warpping : </b><span id="pallet_wrap_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Label pallet : </b><span id="label_pallet_txt"></span></label>
									</div>
									<div class="col-md-6 col-sm-6">
										<label for=""><b>Pallet container weight : </b><span id="pallet_containerweight_txt"></span></label>
									</div>
								</div>
								
							</div>
							<hr>
						</section>

						<section id="package_summary">
							<div>
								<h3><u>PACKAGE SUMMARY</u></h3>
								<p></p>
								<p>
									<label for=""><b>Total packages : </b><span id="total_package"></span></label><br>
									<label for=""><b>Total pallets : </b><span id="total_pallet"></span></label>
								</p>
							</div>
							<hr>
						</section>



					</div>
				</div>
			</div>



	</div>
</body>

    <!-- js -->
	<script src="<?=base_url('assets/')?>vendors/scripts/core.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/script.min.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/process.js"></script>
	<script src="<?=base_url('assets/')?>vendors/scripts/layout-settings.js"></script>

	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>


    <!-- add sweet alert js & css in footer -->
	<script src="<?=base_url('assets/')?>src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="<?=base_url('assets/')?>src/plugins/sweetalert2/sweet-alert.init.js"></script>

	<!-- Bootstrap File Upload Plugin -->
	<script src="<?=base_url('assets/')?>fileupload/bs-filestyle.js"></script>


	<!-- Date & Time Picker JS -->
	<script src="<?=base_url('assets/')?>timepicker/js/components/moment.js"></script>
	<script src="<?=base_url('assets/')?>timepicker/js/components/timepicker.js"></script>
	<script src="<?=base_url('assets/')?>timepicker/js/components/datepicker.js"></script>
	<!-- Include Date Range Picker -->
	<script src="<?=base_url('assets/')?>timepicker/js/components/daterangepicker.js"></script>
	<!-- Date & Time Picker JS -->
	<script src="<?=base_url()?>assets/dist/zebra_datepicker.min.js"></script>
	<script src="<?=base_url()?>assets/ekko_lightbox/ekko-lightbox.min.js"></script>

	<!-- Moment -->
	<script src="<?=base_url('assets/moment/moment.min.js')?>"></script>


</html>

<script>
	$(document).ready(function(){
		const url = "<?php echo base_url()?>";
		loadDataPackinglist();
		

		function loadDataPackinglist()
		{
			let productionId = "<?php echo $productionId;?>";
			let areaid = "<?php echo $areaid;?>";

			if(productionId != "" && areaid != ""){
				axios.post(url+'packing_list/loadDataPackinglist' , {
					action:"loadDataPackinglist",
					productionId:productionId,
					areaid:areaid
				}).then(res=>{
					console.log(res.data);

					if(res.data.package_number != null){
						// Production order detail
						let deliverydate = res.data.deliverydate;
						let orderqty = res.data.qtysched;

						$('#order_qty').html(Number(orderqty).toFixed(3));
						$('#deliverydate').html(deliverydate);
						// Production order detail


						// Packing list detail
						let package_number_txt = res.data.package_number;
						let package_text_txt = res.data.package_text;
						let	packing_list_remark_txt = res.data.packing_list_remark;
						let need_coa_txt = conValueYesNo(res.data.need_coa);
						let standard_label_txt = conValueYesNo(res.data.standard_label);
						let file_attach_txt = res.data.file_attach;
						let photo_attach_txt = res.data.photo_attach;

						$('#package_number_txt').html(package_number_txt);
						$('#package_text_txt').html(package_text_txt);
						$('#packing_list_remark_txt').html(packing_list_remark_txt);
						$('#need_coa_txt').html(need_coa_txt);
						$('#standard_label_txt').html(standard_label_txt);
						$('#file_attach_txt').html(file_attach_txt);
						$('#photo_attach_txt').html(photo_attach_txt);

						if(standard_label_txt == "Yes"){
							$('#sticker_label_detail').css('display' , 'none');
						}

						//Fetch Photo
						if(photo_attach_txt == "Yes"){
							$('#photoAttach').css('display' , '');
							let photo_list = res.data.photo_attach_list;


							let html = `
							<h5>Photo Attach</h5>
							<div class="row form-group">
							`;
							for(let i = 0; i < photo_list.length; i++){

								// Con photo path
								let conpathFromDb = photo_list[i].filepath.replace(/\\/g, '/');

								// Del 'R:'
								let cutR = conpathFromDb.substring(2);

								// Push Path
								let packingPathNew = 'https://intranet.saleecolour.com/intsys/msd_mix/uploads/packing_photo';
								console.log(packingPathNew+cutR+'/'+photo_list[i].filename+photo_list[i].filenametype);

								let fullDataPhoto = packingPathNew+cutR+'/'+photo_list[i].filename+photo_list[i].filenametype;

								html +=`
								<div class="col-md-4 col-lg-3 col-6 mt-2">
								<a href="`+fullDataPhoto+`" target="_blank">
									<img class="runImageView" src="`+fullDataPhoto+`">
								</a>
								</div>`;
							}
							html +=`</div>`;
							$('#showPhotoAttach').html(html);
						}
						//Fetch Photo

						// Fetch File
						if(file_attach_txt == "Yes"){
							$('#fileAttach').css('display' , '');
							let file_name = res.data.file_attach_list[0];
							let file_path = res.data.file_attach_list[1];
							let file_type = res.data.file_attach_list[2];

							// Con File path
							let conpathFromDb = file_path.replace(/\\/g, '/');

							// Del 'R:'
							let cutR = conpathFromDb.substring(2);

							// Push Path
							let packingPathNew = 'https://intranet.saleecolour.com/intsys/msd_mix/uploads/packing_file';
							console.log(packingPathNew+cutR+'/'+file_name+file_type);

							let fullDataPhoto = packingPathNew+cutR+'/'+file_name+file_type;


							let html = `
							<h5>File Attach</h5>
							<div class="row form-group">
							`;
							html +=`
								<div class="col-md-6 col-lg-6 col-6 mt-2">
                                    <embed src="`+fullDataPhoto+`" width="100%" frameborder="0" allowfullscreen="">
                                    <a href="`+fullDataPhoto+`" target="_blank"><b>`+file_name+file_type+`</b></a>
                                </div>
							`;
							html +=`
							</div>
							`;
							$('#showFileAttach').html(html);
						}


						// Packing list detail



						// Sticker label details
						let stickerlabelData = res.data.stickerLabel;

						if(stickerlabelData != ""){
							let html = ``;
							for(let i = 0; i < stickerlabelData.length; i++){
								html +=`
									<div class="col-md-12 col-sm-12">
										<label for=""><b>`+stickerlabelData[i].packinglabelfieldid+` : </b><span id="description_txt">`+stickerlabelData[i].packinglabeltext+`</span></label>
									</div>
								`;
							}
							$('#sticker_label_section').html(html);
						}
						// Sticker label details



						// Pallet Details
						let palletDetailsData = res.data.pallet_detail;
						if(palletDetailsData != ""){
							let pallet_number_txt = palletDetailsData.palletid;
							let pallet_description_txt = palletDetailsData.palletdesc;
							let pallet_type = conPalletType(palletDetailsData.pallettype);
							let pallet_sort = palletDetailsData.palletsort;
							let pallet_hood = conValueYesNo(palletDetailsData.stretchhood);
							let pallet_wrap = conValueYesNo(palletDetailsData.palletwrap);
							let label_pallet = palletDetailsData.labelpallet;
							let pallet_containerweight = palletDetailsData.palletcontainerweight;

							$('#pallet_number_txt').html(pallet_number_txt+' : '+pallet_description_txt);
							$('#pallet_type_txt').html(pallet_type);
							$('#pallet_sort_txt').html(pallet_sort);
							$('#stretch_hood_txt').html(pallet_hood);
							$('#pallet_wrap_txt').html(pallet_wrap);
							$('#label_pallet_txt').html(label_pallet);
							$('#pallet_containerweight_txt').html(Number(pallet_containerweight).toFixed(3));
						}
						// Pallet Details



						// Package summary
						let total_package = 0;
						let total_pallets = 0;
						let package_containweight_sum = parseFloat(res.data.package_containweight);
						let qtysched = parseFloat(res.data.qtysched);
						let pallet_containerweight_sum = parseFloat(palletDetailsData.palletcontainerweight);

						console.log(package_containweight_sum);
						console.log(qtysched);
						console.log(pallet_containerweight_sum);

						if(package_containweight_sum != 0){
							total_package = ( qtysched / package_containweight_sum );
							console.log(total_package);
							$('#total_package').html(Math.ceil(total_package));
						}

						

						if(pallet_containerweight_sum != 0){
							total_pallets = ( qtysched / pallet_containerweight_sum );
							console.log(total_pallets);
							$('#total_pallet').html(Math.ceil(total_pallets));
						}


						// Package summary
					}





				});
			}
		}

		

		function conValueYesNo(enumNumber)
		{
			let valueTxt = "";
			switch(enumNumber){
				case 1:
					valueTxt = "Yes";
					break;
				case 0:
					valueTxt = "No";
			}

			return valueTxt;
		}

		function conPalletType(enumNumber)
		{
			let palletTypeTxt = '';
			switch(enumNumber){
				case 0:
					palletTypeTxt = "None";
					break;
				case 1:
					palletTypeTxt = "Plastic";
					break;
				case 2:
					palletTypeTxt = "Wood";
					break;
			}
			return palletTypeTxt;
		}

		// function numberWithCommas(x) {
		// 	var parts = x.toString().split(".");
		// 	parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		// 	return parts.join(".");
        // }
		
	});
</script>