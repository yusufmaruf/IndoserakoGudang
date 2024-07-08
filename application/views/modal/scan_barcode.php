<div class="modal fade" id="change_prod_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Scanned Barcode</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="" method="post">
				<div class="modal-body">
					<table>
						<tr>
							<td style="width: 50%;">Barcode</td>
							<td>: <span class="text-bold" id="nbrtemp_">Product1</span></td>
						</tr>
						<tr>
							<td>Code</td>
							<td>: <span class="text-bold" id="nbrhum_">4025515078159</span></td>
						</tr>
						<tr>
							<td>Date</td>
							<td>: <span class="text-bold" id="nbrhum_">30/05/2024 16:00</span></td>
						</tr>
					</table>
					<div class="form-group">
						
					</div>
				</div>
				<div class="modal-footer justify-content-center">
				
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
	var base_url = '<?php echo base_url() ?>';
	$(document).ready(function () {
		$('#form_change_pass').submit(function () {
			event.preventDefault();
			var queryString = $('#form_change_pass').serializeArray();
			$.ajax({
				type: "POST",
				url: base_url + "main/changepassword",
				data: queryString,
				dataType: 'json',
				success: function(data) {
					if(data){
						window.location.reload();
						$('#dupe_error_oldpass').hide();
					}else{
						$('#dupe_error_oldpass').show();
					}
				},
				complete: function() {}
			});
		});
	});
	function password_match(event) {
		let pass = $('#txt_password').val().toUpperCase();
		let cpass = $('#txt_confirm_pass').val().toUpperCase();
		
		if (pass != cpass) {
			document.getElementById("btn_submit_pass").disabled = true;
			$("#dupe_error_cpass").show()
			return false;
		} else if (cpass == "" || pass == cpass) {
			document.getElementById("btn_submit_pass").disabled = false;
			$("#dupe_error_cpass").hide()
			return true;
		}
	}
</script>