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
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-terima"> &nbsp; Terima Barang</button>
									<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-kirimCust"> &nbsp; Kirim Cust</button>
									<button class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-kirimJKT"> &nbsp; Kirim JKT</button>
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
											<label class="col-lg-4 p-0" for=""> Customer</label>
											<select autofocus="" id="customers" name="customers" class="form-control select2" disabled>
												<option value="" selected>Mega Surya</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="input-group m-0">
											<label class="col-lg-4 p-0" for=""> Foto SJ</label>
											<input type="text" class="form-control" style="border-radius: 5px 0 0 5px;" value="logo.png">
											<div class=" input-group-append">
												<span class="input-group-text"><i class="fas fa-eye"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 " for=""> Date Created </label>
											<input class="col-lg-8 form-control" type="date" value="12/12/2024" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Receipt Date</label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Penerima </label>
											<input class="col-lg-8 form-control" type="text" placeholder="Nama Penerima" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Delivery Date</label>
											<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" name="duedate">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4" for=""> Pengirim</label>
											<input class="col-lg-8 form-control" type="text" placeholder="Nama Pengirim" name="duedate">
										</div>
									</div>
									<div class="col-lg-6 px-1">
										<div class="form-group d-flex mb-1 align-items-center">
											<label class="col-lg-4 p-0" for=""> Report Date </label>
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
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addLog"> &nbsp; Add Log</button>
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
<!-- /.content-wrapper -->


<!-- modal Terima -->
<div class="modal fade" id="modal-terima" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Terima Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/save'); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Terima Barang</label>
								<input type="date" class="form-control" placeholder="Masukan Nama Category" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Penerima Barang</label>
							<select name="" class="form-control" id="selectPenerima">
								<option value="">-- Pilih Penerima --</option>
								<option value="penerima 1">Rosa</option>
							</select>

						</div>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal terima  -->
<!-- modal kirim cust  -->
<div class="modal fade" id="modal-kirimCust" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Terima Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/save'); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Terima Barang</label>
								<input type="date" class="form-control" placeholder="Masukan Nama Category" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Nama Pengirim </label>
							<select name="" class="form-control" id="selectPenerima">
								<option value="">-- Pilih Penerima --</option>
								<option value="penerima 1">Salim</option>
							</select>

						</div>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal kirim cust  -->
<!-- modal add kirim jkt  -->
<div class="modal fade" id="modal-kirimJKT" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Kirim Ke Jakarta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/save'); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Kirim</label>
								<input type="date" class="form-control" placeholder="Masukan Nama Category" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-1 align-items-center">
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
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal add kirim jkt  -->
<!-- modal add log  -->
<div class="modal fade" id="modal-addLog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Kirim Ke Jakarta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/save'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Log</label>
						<input type="text" name="log" class="form-control" id="">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal log  -->


<script>
	$(document).ready(function() {
		$('#selectPenerima').select2({
			theme: 'bootstrap4',
		});
	})
</script>