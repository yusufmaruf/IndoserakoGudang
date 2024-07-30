<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<style>
	.progress {
		height: 20px;
		margin: 0;
		overflow: visible;
		border-radius: 50px;
		/* background: #eaedf3; */
	}

	.progress .progress-bar {
		border-radius: 10px;
	}

	.progress .progress-value {
		position: relative;
		left: -45px;
		top: 10px;
		font-size: 14px;
		font-weight: bold;
		color: #fff;
		letter-spacing: 2px;
	}

	.progress-bar.active {
		animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
	}

	@-webkit-keyframes animate-positive {
		0% {
			width: 0%;
		}
	}

	@keyframes animate-positive {
		0% {
			width: 0%;
		}
	}
</style>

<div class="content-wrapper">
	<div class="content-header">

	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body p-2">
							<div class="row">
								<div class="col-lg-4">
									<h5 class="text-bold">Detail Project</h5>
									<div class="row">
										<div class="col-lg-6">
											<h5>No. PBB : <?= $bpp['noform'] ?></h5>
											<h5>No. SO : <?= $bpp['noso'] ?></h5>
										</div>
										<div class="col-lg-6">
											<h5>NO. PO : <?= $bpp['nopo'] ?></h5>
											<h5>Due Date : <?= $bpp['duedate'] ?></h5>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<h5 class="text-bold">Detail Customers</h5>
									<div class="row">
										<div class="col-lg-6">
											<h5>Customers : <?= $bpp['customers'] ?></h5>
										</div>
										<div class="col-lg-6">
											<h5>Name Project : <?= $bpp['nameproject'] ?></h5>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-bordered" id="datatable">
								<thead class="text-center">
									<tr>
										<th>Nama Barang</th>
										<th>Qty</th>
										<th>Sat</th>
										<th>PIC</th>
										<th>Progress</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody class="text-center p-0">
									<?php foreach ($detailbpp as $key => $value) : ?>
										<tr>
											<td> <a href="<?= base_url() ?>bpp/bppproject/detail/<?= $value['id'] ?>"><?= $value['name'] ?></a></td>
											<td><?= $value['qty'] ?></td>
											<td><?= $value['satuan'] ?></td>
											<td><?= $value['pic'] ?></td>
											<td></td>
											<td><?= $value['status'] ?></td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>

						</div>
					</div>
				</div>


			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="modal-kirim" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Kirim Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="">Nama Barang</label>
								<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="PC Siemens" disabled>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="">Qty</label>
								<input type="number" class="form-control" placeholder="Qty" name="NoForm">
							</div>
						</div>
					</div>



					<div class="form-group">
						<label for="">Satuan</label>
						<input type="text" class="form-control" placeholder="Pcs" name="NoForm" disabled>
					</div>
					<div class="form-group">
						<label for="">Tujuan Pengiriman</label>
						<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="">
					</div>
					<div class="form-group">
						<label for="">Surat Jalan</label>
						<input type="file" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-terima" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Terima Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="">Nama Barang</label>
								<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="PC Siemens" disabled>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<input type="text" class="form-control" placeholder="Pcs" name="NoForm" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="">Qty</label>
								<input type="number" class="form-control" placeholder="Qty" name="NoForm">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" class="form-control" placeholder="Harga" name="NoForm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
						</div>
						<div class="col-6">
						</div>
					</div>



					<div class="form-group">
						<label for="">Supplier</label>
						<input type="text" class="form-control" placeholder="Nama Supplier" name="NoForm">
					</div>

					<div class="form-group">
						<label for="">Penyimpanan</label>
						<input type="text" class="form-control" placeholder="Pilih Gudang" name="NoForm" value="">
					</div>
					<div class="form-group">
						<label for="">Penerima</label>
						<input type="text" class="form-control" placeholder="Nama Penerima" name="NoForm" value="">
					</div>


				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- /.content-wrapper -->