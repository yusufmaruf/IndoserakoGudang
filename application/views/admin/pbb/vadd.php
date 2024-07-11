<!-- Content Wrapper. Contains page content -->
<!-- select 2  -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>


<div class="content-wrapper">
	<div class="content mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card p-0">
						<div class="card-body mb-0 p-3">
							<form action="" mb-0>
								<div class="row mb-0 p-0">
									<div class="col-lg-6 mb-1">
										<h2>Form Permintaan Barang</h2>
									</div>
									<div class="col-lg-6 p-1 ">
										<div class="form-group d-flex p-0 mb-1">
											<label class="col-lg-4" for=""> No Form</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No Form" name="NoForm">
										</div>
										<div class="form-group d-flex mb-1">
											<label class="col-lg-4" for=""> No SO</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No SO" name="NoForm">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group d-flex p-0 mb-1">
											<label class="col-lg-4" for=""> Nama Perusahaan</label>
											<select autofocus="" id="perusahaan" name="perusahaan" class="form-control select2">
												<option value="">Pilih Perusahaan</option>
												<option value="unit">Perusahaan 2</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group d-flex mb-1">
											<label class="col-lg-4" for=""> Nama Project</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan Nama Project" name="NoForm">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group d-flex mb-1">
											<label class="col-lg-4" for=""> No PO</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No PO" name="NoForm">
										</div>

									</div>
									<div class="col-lg-6">
										<div class="form-group d-flex mb-2">
											<label class="col-lg-4" for=""> Tanggal </label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="NoForm">
										</div>

									</div>
								</div>





								<table class="table table-bordered p-0 m-0 mb-2" id="table-body">
									<thead>
										<tr>
											<th>Nama Barang</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>PIC</th>
											<th>Act</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td> Pc Siemens </td>
											<td> <input type="number" class="form-control" style="max-height: 30px;" placeholder="2" name="NoForm">
											</td>
											<td> Pcs </td>
											<td>Achmad </td>
											<td>
												<button type="button" class="btn btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
										<tr>
											<td> <input type="hidden" name="idProduct" value=""> Pc Siemens </td>
											<td> <input type="number" class="form-control" style="max-height: 30px;" placeholder="2" name="NoForm">
											</td>
											<td> Pcs </td>
											<td> <input type="hidden" name="idPIC">Achmad </td>
											<td>
												<button type="button" class="btn btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
									</tbody>

								</table>
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="form-group text-center">
											<label for="">Gudang</label>
											<select autofocus="" id="gudang" name="category" class="form-control select2">
												<option value="">Pilih User</option>
												<option value="unit">User 1</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="form-group text-center">
											<label for="">Pemohon</label>
											<select autofocus="" id="pemohon" name="category" class="form-control select2">
												<option value="">Pilih User</option>
												<option value="unit">User 1</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group text-right mb-0">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							<h5 class="m-0">Tambah Barang Penggadaan</h5>

						</div>
						<div class="card-body p-2">
							<form id="add-item-form">

								<div class="form-group mb-1">
									<label for="">Nama Barang</label>
									<select autofocus="" id="barang" name="category" class="form-control select2">
										<option value="">Pilih Barang</option>
										<?php foreach ($barang as $key => $value) { ?>
											<option value="<?= $value['id'] ?>" data-name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group mb-1">
											<label for="">Qty</label>
											<input type="number" class="form-control" placeholder="Qty" id="qty" name="NoForm">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group mb-1">
											<label for="">Satuan</label>
											<select autofocus="" id="satuan" name="satuan" class="form-control select2 " disabled>

											</select>
										</div>
									</div>
								</div>


								<div class="form-group mb-1">
									<label for="">PIC</label>
									<select autofocus="" id="pic" name="category" class="form-control select2">
										<option value="">Pilih User</option>
										<option value="unit" data-name="User 1">User 1</option>
									</select>
								</div>
								<div class="form-group mb-2">
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
</div>
<script>
	$(document).ready(function() {
		$('#satuan').select2({
			theme: 'bootstrap4',
		});
		$('#perusahaan').select2({
			theme: 'bootstrap4',
		});
		$('#gudang').select2({
			theme: 'bootstrap4',
		});
		$('#pemohon').select2({
			theme: 'bootstrap4',
		});
		$('#pic').select2({
			theme: 'bootstrap4',
		});
		$('#barang').select2({
			theme: 'bootstrap4',
		});


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

		// Handle form submission
		$('#add-item-form').on('submit', function(event) {
			event.preventDefault(); // Prevent form from submitting normally

			// Get form values
			var barangId = $('#barang').val();
			var barangName = $('#barang option:selected').data('name');
			var qty = $('#qty').val();
			var satuan = $('#satuan').val();
			var picId = $('#pic').val();
			var picName = $('#pic option:selected').data('name');

			// Validate form values
			if (!barangId || !qty || !satuan || !picId) {
				alert('Please fill in all fields.');
				return;
			}

			// Append new row to the table
			var newRow = `
                    <tr class="text-center">
                        <td class="text-center">${barangName}</td>
                        <td class="text-center"><input type="number" class="form-control" style="max-height: 30px;" value="${qty}" name="NoForm"></td>
                        <td class="text-center">${satuan}</td>
                        <td class="text-center">${picName}</td>
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
			$('#pic').val('').trigger('change');
		});


		// Delete row
		$(document).on('click', '.delete-row', function() {
			$(this).closest('tr').remove();
		});
	});
</script>
<!-- /.content-wrapper -->