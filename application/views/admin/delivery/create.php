<style>

</style>
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<div class="content-wrapper">
	<div class="content mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card p-0">
						<div class="card-header">
							<h5 class="m-0">Form Delivery</h5>
						</div>
						<div class="card-body ">
							<form action="<?= base_url('delivery/delivery/store'); ?>" method="POST" mb-0 enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group d-flex  mb-1 align-items-center">
											<label class="col-lg-4" for="">Customer</label>
											<select autofocus="" id="nama_customer" name="id_customer" class="form-control select2">
												<option value="">Pilih Customer</option>
												<?php foreach ($customer as $key => $value) : ?>
													<option value="<?= $value['id']; ?>"><?= $value['nickname']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> No SJ</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No SJ" name="nomor_sj">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 " for=""> No PO</label>
											<select name="nomor_po" id="nomor_po" class="form-control">
											</select>
										</div>
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 " for=""> Tanggal </label>
											<input class="col-lg-8 form-control" type="date" name="created_at" value="<?= date('Y-m-d'); ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-lg-12 ">

										<table class="table table-bordered mb-0 text-center ">
											<thead>
												<tr class="text-center">
													<th>Nama Barang</th>
													<th width="10%">Qty</th>
													<th>Desc</th>
													<th width="10%">Act</th>
												</tr>
											</thead>
											<tbody class="text-center" id="table-body">


											</tbody>

										</table>

									</div>

								</div>
								<div class="row ">
									<div class="col-lg-12  text-right">
										<button type="submit" class="btn  btn-primary">Submit</button>
									</div>
								</div>

								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">

											<div class="modal-body">
												<img class="modal-content" src="<?= base_url() ?>assets/no-preview.png" id="img01">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>


							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Tambah Barang Pengiriman</h5>
						</div>
						<div class="card-body">
							<form id="add-item-form">
								<div class="row">
									<div class="col-lg-9">
										<div class="form-group">
											<label for="">Item</label>
											<select autofocus="" id="id_brand" name="id_brand" class="form-control select2">
												<option value="">Pilih Brand</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="">Qty</label>
											<input type="number" class="form-control" id="qty_item" name="qty">
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Tambahkan

								</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#nomor_po').select2({
			theme: 'bootstrap4',
		});
		$('#id_brand').select2({
			theme: 'bootstrap4',
		});
		$('#nama_customer').select2({
			theme: 'bootstrap4',
		});
		$('#nama_customer').on('change', function() {
			getnomor_po($(this).val());

		});
		$('#nomor_po').on('change', function() {
			getProduk($(this).val());
		})
	});

	function getProduk(id) {
		$.ajax({
			url: '<?= base_url() ?>master/getcustom',
			type: 'POST',
			data: {
				nomor_po: id,
				table: 'po_list_detail',
				field: 'id_po_list'
			},
			success: function(response) {
				try {
					var data = JSON.parse(response);
					console.log(response);
					$('#id_brand').empty();
					if (Array.isArray(data) && data.length) {
						data.forEach(function(value) {
							$('#id_brand').append('<option value="' + value['id'] + '" data-name="' + value['brand_name'] + '" data-desc="' + value['description'] + '" >' + value['brand_name'] + ' | ' + value['description'] + ' | ' + value['totalOutstanding'] + '</option>'); // Use forEach to iterate over the array
						});
					}
					console.log(data[0]['totalOutstanding']);
					$('#qty').attr('max', data[0]['totalOutstanding']);
				} catch (e) {
					console.error('Parsing Error:', e);
				}
			},
			error: function(xhr, status, error) {
				console.error('AJAX Error: ', status, error);
			}
		});

	}

	function getnomor_po(id) {
		$('#nomor_po').empty();
		$('#id_brand').empty();
		$('#id_brand').append('<option value="">Tidak Ada Data</option>');

		$.ajax({
			url: '<?= base_url() ?>master/getcustom',
			type: 'POST',
			data: {
				nomor_po: id,
				table: 'po_list',
				field: 'id_customer'
			},
			success: function(response) {
				try {
					var data = JSON.parse(response);
					if (Array.isArray(data) && data.length) {
						data.forEach(function(value) { // Use forEach to iterate over the array
							$('#nomor_po').append('<option value="' + value['id'] + '" >' + value['nomor_po'] + '</option>');

						});
						// console.log(data[0]['id']);
						getProduk(data[0]['id']);
					} else {
						// Handle the case where datas is empty or not an array
						$('#nomor_po').append('<option value="">Tidak Ada Data</option>');
					}
				} catch (e) {
					console.error('Parsing Error:', e);
				}
			},
			error: function(xhr, status, error) {
				console.error('AJAX Error: ', status, error);
			}
		})
	}
</script>
<script>
	$(document).ready(function() {

		// Handle form submission
		$('#add-item-form').on('submit', function(event) {
			event.preventDefault(); // Prevent form from submitting normally

			// Get form values
			var id_po_list_detail = $('#id_brand').val();
			var name_po_list_detail = $('#id_brand option:selected').data('name');
			var desc_po_list_detail = $('#id_brand option:selected').data('desc');
			var qty = $('#qty_item').val(); // Validate form values
			if (!id_po_list_detail || !name_po_list_detail || !qty) {
				alert('Please fill in all fields.');
				return;
			}
			// Append new row to the table
			var newRow = `
                    <tr class="text-center">
						<td class="text-center"> <input type="hidden" class="form-control " style="max-height: 30px;" value="${id_po_list_detail}" name="id_po_list_detail[]">${name_po_list_detail}</td>
                        <td class="text-center"><input type="number" class="form-control" style="max-height: 30px;" value="${qty}" name="qty_delivery[]"></td>
						<td class="text-center">${desc_po_list_detail}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm delete-row" title="Delete"><i class="fa fa-xmark"></i></button>
                        </td>
                    </tr>
                `;
			$('#table-body').append(newRow);
			// Clear form
			$('#add-item-form')[0].reset();
			$('#id_brand').val('').trigger('change');
			$('#qty_item').val('');
		});


		// Delete row
		$(document).on('click', '.delete-row', function() {
			$(this).closest('tr').remove();
		});
	});
</script>


<!-- /.content-wrapper -->