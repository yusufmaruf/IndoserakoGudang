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
						<div class="card-header p-2">
							<h5 class="m-0">Data Inventaris Project PB/01/09/07/2024</h5>
						</div>
						<div class="card-body p-2">
							<table class="table table-bordered" id="datatable">
								<thead class="text-center">
									<tr>
										<th style="width: 10px">No</th>
										<th>Nama Barang</th>
										<th>Qty</th>
										<th>Sat</th>
										<th>PIC</th>
										<th>Pengiriman</th>
										<th>Status</th>
										<th style="width: 10%;">Act</th>
									</tr>
								</thead>
								<tbody class="text-center p-0">
									<tr>
										<td class=" text-center px-1">1</td>
										<td class=" text-center px-1"> <a href="<?= base_url() ?>pbb/detail" class="text-dark">PC Siemens</a></td>
										<td class=" text-center px-1">4 </td>
										<td class=" text-center px-1"> Pcs </td>
										<td class=" text-center px-1">Achmad </td>
										<td class=" text-center px-1 ">
											<div class="progress-outer px-1">
												<div class="progress">
													<div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%;"></div>
													<div class="progress-value">80%</div>
												</div>
											</div>
										</td>
										<td class=" text-center  px-1">
											<span class=" rounded-pill badge badge-success px-3 py-1">Open</span>
										</td>
										<td class=" text-center  px-1">
											<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-terima"> Terima</button>
											<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-kirim"> Kirim</button>
										</td>
									</tr>
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



<script>
	$(document).ready(function() {
		const t = $('#datatable').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": false,
			"iDisplayLength": 10,
			"columnDefs": [{
				"orderable": false,
				"targets": [0, 7]
			}],
			"order": [
				[1, 'asc']
			]
		});

		t.on('order.dt search.dt', function() {
			let i = 1;

			t.cells(null, 0, {
				search: 'applied',
				order: 'applied'
			}).every(function(cell) {
				this.data(i + ". ");
				i++;
			});
		}).draw();
	});
</script>
<!-- /.content-wrapper -->