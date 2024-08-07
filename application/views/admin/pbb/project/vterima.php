<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-header py-1">
							<h5 class="m-0">Form Penerimaan PBB</h5>
						</div>
						<div class="card-body p-2">
							<form action="">
								<div class="row mb-0">
									<div class="col-6  mb-0">
										<div class="form-group  mb-0">
											<label for="">No. PBB</label>
											<input type="text" class="form-control" placeholder="Masukan No. PBB" value="PBB/09/012/2024" name="NoForm" disabled>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group  mb-0">
											<label for="">Penerima</label>
											<input type="text" class="form-control" placeholder="Masukan Nama Penerima" name="NoForm" value="">
										</div>
									</div>
								</div>
								<div class="row mb-0">
									<div class="col-6  mb-0">
										<div class="form-group  mb-0">
											<label for="">Tanggal</label>
											<input type="date" class="form-control" placeholder="Masukan No. PBB" value="<?= date('Y-m-d') ?>" name="NoForm" disabled>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group  mb-0">
											<label for="">Catatan</label>
											<input type="text" class="form-control" placeholder="Masukan Catatan" name="NoForm" value="">
										</div>
									</div>
								</div>

								<table class="table table-bordered mt-2 mb-0" id="table-body">
									<thead>
										<tr class="text-center">
											<th>Nama Barang</th>
											<th width="15%">Qty</th>
											<th>Sat</th>
											<th>Supplier</th>
											<th>Harga</th>
											<th style="width: 10px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td>PC Siemens</td>
											<td width="15%"><input type="number" class="form-control" style="max-height: 30px;" value="2" name="NoForm"></td>
											<td> pcs </td>
											<td>Offical Siemens</td>
											<td>200000</td>
											<td>
												<button type="button" class="btn btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
									</tbody>

								</table>
								<div class="row mt-2 px-1">
									<div class="ml-auto">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							<h5 class="m-0">Buat Penerimaan</h5>
						</div>
						<div class="card-body p-2">
							<form id="add-item-form">
								<div class="form-group mb-1">
									<label for="">Nama Barang</label>
									<select autofocus="" id="barang" name="barang" class="form-control select2">
										<option value="">Pilih Barang</option>
										<?php foreach ($barang as $key => $value) { ?>
											<option value="<?= $value['id'] ?>" data-name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="row mb-1">
									<div class="col-lg-6 mb-1">
										<div class="form-group mb-1">
											<label for="">Qty</label>
											<input type="number" class="form-control" placeholder="" name="qty" id="qty">
										</div>
									</div>
									<div class="col-lg-6 mb-1">
										<div class="form-group mb-1">
											<label for="">Satuan</label>
											<select autofocus="" id="satuan" name="satuan" class="form-control select2 " disabled>

											</select>
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-lg-6 mb-1">
										<div class="form-group mb-1">
											<label for="">Harga</label>
											<input type="text" class="form-control" placeholder="Harga" name="price" id="price">
										</div>
									</div>
									<div class="col-lg-6 mb-1">
										<div class="form-group mb-1">
											<label for="">Supplier</label>
											<input type="text" class="form-control" placeholder="Supplier" name="supplier" id="supplier">
										</div>
									</div>
								</div>




								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Tambahkan

									</button>
								</div>
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
		$('#barang').select2({
			theme: 'bootstrap4',
		});
		$('#satuan').select2({
			theme: 'bootstrap4',
		});
	});
</script>
<!-- get value satuan  -->
<script>
	$(document).ready(function() {

		$('#barang').on('change', function() {
			var selectedBarang = $(this).val();
			console.log(selectedBarang);

			// Clear satuan select options
			$('#satuan').empty();

			// Add default option
			// $('#satuan').append('<option value="">Pilih Satuan</option>');

			if (selectedBarang) {
				// AJAX request to fetch satuan options
				$.ajax({
					url: '<?= base_url() ?>pbb/getsatuan/' + selectedBarang, // Adjust the URL to match your controller and method
					type: 'GET',
					success: function(response) {
						var satuan = JSON.parse(response).satuan;
						console.log(satuan);
						// Append the retrieved satuan as the selected option
						$('#satuan').append('<option value="' + satuan + '" selected>' + satuan + '</option>');
					},
					error: function(xhr, status, error) {
						console.error('AJAX Error: ', status, error);
					}
				});
			}
		});

	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('click', '.delete-row', function() {
			$(this).closest('tr').remove();
		});
	});
</script>

<script>
	$(document).ready(function() {

		// Handle form submission
		$('#add-item-form').on('submit', function(event) {
			event.preventDefault(); // Prevent form from submitting normally

			// Get form values
			var barangId = $('#barang').val();
			var barangName = $('#barang option:selected').data('name');
			var qty = $('#qty').val();
			var satuan = $('#satuan').val();
			var price = $('#price').val();
			var supplier = $('#supplier').val();

			// Validate form values
			if (!barangId || !qty || !satuan || !price || !supplier) {
				alert('Please fill in all fields.');
				return;
			}

			// Append new row to the table
			var newRow = `
                    <tr class="text-center">
                        <td class="text-center">${barangName}</td>
                        <td class="text-center"><input type="number" class="form-control" style="max-height: 30px;" value="${qty}" name="NoForm"></td>
                        <td class="text-center">${satuan}</td>
                        <td class="text-center">${supplier}</td>
                        <td class="text-center">${price}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `;

			$('#table-body').append(newRow);


			// Clear form
			$('#add-item-form')[0].reset();
			$('#barang').val('').trigger('change');
			$('#satuan').empty().prop('disabled', true);
			$('#supplier').val('').trigger('change');
			$('#price').val('').trigger('change');

		});
	});
</script>
<!-- /.content-wrapper -->