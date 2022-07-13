
    
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

</body>

<script>
	$(document).ready(function(){
		// $('.datetimepicker1 , .datetimepicker2 , .datetimepicker3 , .datetimepicker4 , .datetimepicker5 , .datetimepicker6').datetimepicker({
		// 	format: "DD-MM-yyyy HH:mm",
		// 	showClose: true
    	// });

		$('#mdrd_chooseTime').Zebra_DatePicker({
        	format: 'Y-m-d H:i'
    	});
		$('#mdrd_chooseTime_edit').Zebra_DatePicker({
        	format: 'Y-m-d H:i'
    	});
		$('#mdrd_chooseTimeFinish_edit').Zebra_DatePicker({
        	format: 'Y-m-d H:i'
    	});

		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true,
			});
		});





			// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();






	});

</script>
</html>