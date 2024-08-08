<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<div class="content-wrapper">
	<div class="content mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card p-0">
						<div class="card-header px-4">
							<div class="row">
								<h5 class="m-0">Detail Delivery</h5>
								<div class="ml-auto">
									<?php if ($delivery['receive_date'] == null) : ?>
										<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-terima"> &nbsp; Terima Barang</button>
									<?php endif; ?>
									<?php if ($delivery['delivery_date'] == null) : ?> <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-kirimCust"> &nbsp; Kirim Cust</button>
									<?php endif; ?>
									<?php if ($delivery['report_date'] == null) : ?>
										<button class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-kirimJKT"> &nbsp; Report JKT</button>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="card-body pt-2 ">
							<div class="row ">
								<div class="col-lg-6">
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4" for=""> No PO</label>
										<input class="col-lg-8 form-control" type="text" value="<?= $delivery['nomor_po']; ?>" name="noform" readonly>
									</div>
									<div class="form-group d-flex  mb-1 align-items-center">
										<label class="col-lg-4" for=""> Customer</label>
										<select autofocus="" id="customers" name="customers" class="form-control select2" disabled>
											<option value="" selected><?= $delivery['customer_name']; ?></option>
										</select>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4 " for=""> Receive Date</label>
										<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" value="<?= $delivery['receive_date'] ? date('Y-m-d', strtotime($delivery['receive_date'])) : ''; ?>" name="duedate" readonly>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4 " for=""> Delivery Date</label>
										<input class="col-lg-8 form-control" type="date" value="<?= $delivery['delivery_date'] ? date('Y-m-d', strtotime($delivery['delivery_date'])) : ''; ?>" name="duedate" disabled>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4 " for=""> Report Date </label>
										<input class="col-lg-8 form-control" type="date" placeholder="Masukan Tanggal" value="<?= $delivery['report_date'] ? date('Y-m-d', strtotime($delivery['report_date'])) : ''; ?>" name="duedate" disabled>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4" for=""> No SJ</label>
										<input class="col-lg-8 form-control" type="text" value="<?= $delivery['nomor_sj']; ?>" name="noso" readonly>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4 " for=""> Date Created </label>
										<input class="col-lg-8 form-control" type="date" value="<?= date('Y-m-d', strtotime($delivery['created_at'])); ?>" name="duedate" readonly>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4" for=""> Recipient</label>
										<input class="col-lg-8 form-control" type="text" value="<?= $delivery['recipient']; ?>" name="duedate" disabled>
									</div>
									<div class="form-group d-flex mb-1 align-items-center">
										<label class="col-lg-4" for="">Sender</label>
										<input class="col-lg-8 form-control" type="text" value="<?= $delivery['sender']; ?>" name="duedate" disabled>
									</div>
									<div class="input-group m-0">
										<label class="col-lg-4" for=""> Foto SJ</label>
										<input type="text" class="form-control" style="border-radius: 5px 0 0 5px;" value="<?= $delivery['image_sj']; ?>" readonly name="image">
										<div class=" input-group-append">
											<span class="input-group-text bg-light" id="previewBtn"><i class="fas fa-eye"></i></span>
										</div>
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
												<?php foreach ($delivery_detail as $delivery_detail_key => $delivery_detail_value) : ?>
													<tr>
														<td><?= $delivery_detail_value['brand_name'] ?></td>
														<td><?= $delivery_detail_value['qty_delivery'] ?></td>
														<td><?= $delivery_detail_value['desc'] ?></td>
													</tr>
												<?php endforeach ?>


											</tbody>

										</table>
									</div>
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


						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<h5 class="m-0">Log Pengiriman</h5>
								<div class="ml-auto">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addLog"> &nbsp; Add Notes</button>
								</div>
							</div>
						</div>
						<div class="card-body py-1 px-2 m-0">
							<div class="timeline-wrapper" style="height: calc(100vh - 200px); overflow-y: scroll;">
								<div class="timeline-content">
									<?php foreach ($log as $logkey => $logvalue) { ?>
										<div class="timeline-item bg-white rounded  py-0 px-3 border border-grey mb-1">
											<h6 class="mb-0 pt-1"><?= $logvalue['date']; ?> &nbsp; - &nbsp;<span class="text-muted"><?= $logvalue['created_by']; ?></span></h6>
											<p class=" mb-0 m-0" style="line-height: 20px"> <a href="<?= base_url() ?>delivery/delivery/detail/<?= $logvalue['id_delivery']; ?>""><?= $logvalue['nomor_sj']; ?> </a>
												<span class=" text-small font-weight-light"> - <?= $logvalue['message']; ?> : </span>
											</p>
											<?php foreach ($logvalue['detail'] as $detailkey => $detailvalue) { ?>
												<p class="text-small font-weight-light mb-0 m-0" style="line-height: 20px"><?= $detailvalue; ?> </p>
											<?php } ?>
										</div>
									<?php } ?>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->

<!-- Modal for displaying image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img id="modalImage" src="<?= base_url('uploads/surat_jalan/' . $delivery['image_sj']); ?>" alt="Image Preview" style="width: 100%;" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- modal Terima -->
<div class="modal fade" id="modal-terima" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Terima Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('delivery/delivery/terimaBarang/' . $idDelivery); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="">Tanggal Terima Barang</label>
								<input type="date" class="form-control" name="receive_date" value="<?= date('Y-m-d'); ?>" readonly">
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
<!-- end modal terima  -->
<!-- modal kirim cust  -->
<div class="modal fade" id="modal-kirimCust" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Kirim Barang Ke Customer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('delivery/delivery/kirimBarang/' . $idDelivery); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Kirim Barang</label>
								<input type="datetime-local" class="form-control datetime" class="form-control" name="delivery_date">
							</div>
						</div>
						<div class=" col-md-6">
							<label for="">Nama Pengirim </label>
							<input type="text" class="form-control" name="sender">
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
				<h4 class="modal-title">Upluod Surat Jalan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="uploadForm" action="<?= base_url('delivery/delivery/kirimJkt/' . $idDelivery); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Kirim</label>
								<input type="date" class="form-control" name="report_date">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-1 align-items-center">
								<label for="" class="col-lg-4 p-0">Foto SJ</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input form-control" id="suratJalan" name="image_sj" accept="image/*" onchange="previewImageedit(event)">
										<label class="custom-file-label" for="suratJalan" id="suratJalanLabel">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<img id="imgPreview" src="" alt="Image Preview" style="display:none; width: 100%;" />
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
				<h4 class="modal-title">Add Notes</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('delivery/delivery/addNotes/' . $idDelivery); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Notes</label>
						<input type="text" class="form-control" id="" placeholder="Add Notes" name="message">
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
		$('#selectPenerima').click(function() {
			$('#selectPenerima').select2('readonly', true);
		});
		document.getElementById('previewBtn').addEventListener('click', function() {
			$('#imageModal').modal('show');
		});
	});
</script>

<script>
	function previewImageedit(event) {
		var input = event.target;
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('imgPreview');
			output.src = reader.result;
			output.style.display = 'block';
		};
		reader.readAsDataURL(input.files[0]);

		// Update the label text
		var fileName = input.files[0].name;
		var label = document.getElementById('suratJalanLabel');
		label.innerText = fileName;

	}
	$('#modal-kirimJKT').on('hidden.bs.modal', function() {
		var form = document.getElementById('uploadForm');
		form.reset();

		var imgPreview = document.getElementById('imgPreview');
		imgPreview.src = "";
		imgPreview.style.display = 'none';

		var label = document.getElementById('suratJalanLabel');
		label.innerText = "Choose file";
	});
</script>