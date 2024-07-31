<style>
	ul.timeline {
		list-style-type: none;
		position: relative;
		padding-left: 1.5rem;
	}

	/* Timeline vertical line */
	ul.timeline:before {
		content: ' ';
		background: #a5b3c9;
		display: inline-block;
		position: absolute;
		left: 16px;
		width: 4px;
		height: 100%;
		z-index: 400;
		border-radius: 1rem;
	}

	li.timeline-item {
		margin: 10px 0;
	}

	/* Timeline item arrow */
	.timeline-arrow {
		border-top: 0.5rem solid transparent;
		border-right: 0.5rem solid #a5b3c9;
		border-bottom: 0.5rem solid transparent;
		display: block;
		position: absolute;
		left: 2rem;
	}

	/* Timeline item circle marker */
	li.timeline-item::before {
		content: ' ';
		background: #a5b3c9;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #fff;
		left: 11px;
		width: 14px;
		height: 14px;
		z-index: 400;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
	}
</style>
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<div class="content-wrapper">
	<div class="content mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<div class="card p-0">
						<div class="card-header px-4">
							<div class="row">
								<h5 class="m-0">Detail Delivery</h5>
								<div class="ml-auto">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add"> &nbsp; Terima Barang</button>
									<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-add"> &nbsp; Kirim Cust</button>
									<button class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-add"> &nbsp; Kirim JKT</button>
								</div>
							</div>
						</div>
						<div class="card-body ">
							<form action="<?= base_url('bpp/bppproject/savepbb'); ?>" method="POST" mb-0 enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> No PO</label>
											<input class="col-lg-8 form-control" type="text" placeholder="6500020486" name="noform" readonly>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> No SJ</label>
											<input class="col-lg-8 form-control" type="text" placeholder="6500020489" name="noso" readonly>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex  mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Nama Perusahaan</label>
											<select autofocus="" id="customers" name="customers" class="form-control select2" disabled>
												<option value="" selected>Mega Surya</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 " for=""> Nama Project</label>
											<select autofocus="" id="Project" name="projects" class="form-control select2" disabled>
												<option value="" selected>Migration and Humadity</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="input-group m-0">
											<label class="col-lg-4 p-0" for=""> Foto SJ</label>
											<input type="text" class="form-control" style="border-radius: 5px 0 0 5px;" value="logo.png" readonly>
											<div class=" input-group-append">
												<span class="input-group-text"><i class="fas fa-eye"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 " for=""> Due Date </label>
											<input class="col-lg-8 form-control" type="date" value="12/12/2024" name="duedate">
										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Tanggal Terima</label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Penerima </label>
											<input class="col-lg-8 form-control" type="text" placeholder="Nama Penerima" name="duedate">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Tanggal Pengiriman</label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Pengirim</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Nama Pengirim" name="duedate">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Tanggal Kirim </label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for="">No Memo </label>
											<input class="col-lg-8 form-control" type="text" placeholder="Masukan No Memo" name="duedate">
										</div>
									</div>
								</div>
								<div class="row mb-1">
									<div class="col-lg-12 px-1 ">
										<div class="form-group d-flex mb-2 ">
											<table class="table table-bordered mb-0 text-center ">
												<thead>
													<tr class="text-center">
														<th>Brand</th>
														<th width="10%">Qty</th>
														<th>Desc</th>
													</tr>
												</thead>
												<tbody class="text-center" id="table-body">
													<tr>
														<td>IFM</td>
														<td>2</td>
														<td>E70213</td>
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

				<div class="col-lg-3">
					<div class="card">
						<div class="card-header">
							<div class="row">

								<h5 class="m-0">Log Pengiriman</h5>
								<div class="ml-auto">
									<a href="<?= base_url() ?>delivery/delivery/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
								</div>
							</div>
						</div>
						<div class="card-body py-1 px-2 m-0">
							<ul class="timeline">
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">
									<h6 class="mb-0 pt-1"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</h6>
									<p class="text-small  font-weight-light p-0 m-0 ">barang dikirimkan</p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">
									<h6 class="mb-0 pt-1"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</h6>
									<p class="text-small  font-weight-light p-0 m-0">barang diterima</p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3  border border-grey">
									<h6 class="mb-0 pt-1"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</h6>
									<p class="text-small  font-weight-light p-0 m-0 ">Data PPB Dibuat</p>
								</li>

							</ul>

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