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
							<form action="<?= base_url('bpp/bppproject/savepbb'); ?>" method="POST" mb-0 enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> No PO</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No PO" name="noform">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> No SJ</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No SJ" name="noso">

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex  mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Nama Perusahaan</label>
											<select autofocus="" id="customers" name="customers" class="form-control select2">
												<option value="">Pilih Perusahaan</option>
												<option value="1">Perusahaan 2</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Nama Project</label>
											<select autofocus="" id="Project" name="projects" class="form-control select2">
												<option value="">Pilih Project</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label for="" class="col-lg-4 p-0">Gambar</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="previewImgedit" name="ttd" accept="image/*" onchange="previewImageedit(event)">
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
												<div class="input-group-append">
													<button type="button" class="btn btn-block input-group-text" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-eye"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Tanggal </label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>

									</div>
								</div>
								<div class="row mb-1">
									<div class="col-lg-12 px-1 ">
										<div class="form-group d-flex mb-2 ">
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
													<tr>
														<td>IMF</td>
														<td>10</td>
														<td>e70213</td>
														<td>
															<button type="button" class="btn btn-sm btn-danger" onclick="addRow()"><i class="fa fa-trash"></i></button>
														</td>
													</tr>

												</tbody>

											</table>
										</div>
									</div>

								</div>
								<div class="row px-0">
									<div class="col-lg-12 px-1 text-right">
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
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Brand</label>
											<select autofocus="" id="barang" name="category" class="form-control select2">
												<option value="">Pilih Brand</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Qty</label>
											<input type="number" class="form-control" placeholder="Qty" id="qty" name="NoForm">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Description</label>
									<input type="text" class="form-control" placeholder="Description" id="qty" name="NoForm">
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
</div>
<script>
	$(document).ready(function() {
		$('#satuan').select2({
			theme: 'bootstrap4',
		});
		$('#customers').select2({
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
		$('#status').select2({
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
					url: '<?= base_url() ?>master/getsatuan/' + selectedBarang, // Adjust the URL to match your controller and method
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
						<td class="text-center"> <input type="hidden" class="form-control " style="max-height: 30px;" value="${barangId}" name="id_barang[]">${barangName}</td>
                        <td class="text-center"><input type="number" class="form-control" style="max-height: 30px;" value="${qty}" name="qty[]"></td>
                        <td class="text-center">${satuan}</td>
						<td class="text-center"><input type="hidden" class="form-control" style="max-height: 30px;" value="${picId}" name="iduser[]"> ${picName}</td>
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
<script>
	function previewImageedit(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('img01');
			output.src = reader.result;
		};

		var file = event.target.files[0]; // Ambil file yang diunggah
		if (file) {
			reader.readAsDataURL(file); // Jika ada file, baca sebagai data URL
		} else {}
		const input = event.target;
		const label = input.nextElementSibling; // This gets the <label> element

		if (input.files.length > 0) {
			const fileName = input.files[0].name;
			label.textContent = fileName;
		} else {
			label.textContent = 'Choose file';
		}

	}
	$('#modal-edit').on('hidden.bs.modal', function() {
		// Kosongkan preview gambar dan sembunyikan area preview saat modal ditutup
		document.getElementById('previewImgedit').src = "";
		document.getElementById('previewAreaedit').style.display = 'none';
	});
</script>
<!-- /.content-wrapper -->