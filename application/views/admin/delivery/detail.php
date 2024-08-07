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
									<button class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-kirimJKT"> &nbsp; Kirim JKT</button>
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
											<span class="input-group-text bg-light"><i class="fas fa-eye"></i></span>
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
							<div class="timeline-wrapper">
								<div class="timeline-content" style="max-height: 380px; overflow-y: auto;">
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
			<form action="<?= base_url('delivery/delivery/terimaBarang/' . $idDelivery); ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tanggal Terima Barang</label>
								<input type="date" class="form-control" name="receive_date" value="<?= date('Y-m-d'); ?>" readonly">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Penerima Barang</label>
							<input type="text" class="form-control" value="<?= $user ?>" name="recipient" readonly>
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
				<h4 class="modal-title">Add Notes</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('delivery/delivery/addNotes/' . $idDelivery); ?>" method="post">
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
	});
</script>