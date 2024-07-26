<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
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
<div class="content-wrapper">


	<div class="content mt-3">
		<div class="container-fluid">
			<div class="row mb-1">
				<div class="col-12 mb-1">
					<div class="card mb-1">
						<div class="card-header py-2 ">
							<div class="row">
								<h5 class="m-0">Detail PBB : PPB/01/09/07/2024</h5>
								<div class="ml-auto">PC Siemens 4 Pcs</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row p-0">
				<div class="col-lg-8">
					<div class="card p-0">
						<div class="card-header py-1">
							Data Peneriman Barang PC Siemens
						</div>
						<div class="card-body py-2 px-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable1">
									<thead class="text-center">
										<tr>
											<th style="width: 10px">No</th>
											<th class="text-center">Qty</th>
											<th class="text-center">Sat</th>
											<th class="text-center">Sender</th>
											<th class="text-center">Tgl Masuk</th>
											<th class="text-center">Harga</th>
											<th class="text-center">Penerima</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>1</td>
											<td>100</td>
											<td>pcs</td>
											<td>Sender 1</td>
											<td>01-09-2024</td>
											<td>Rp. 100.000</td>
											<td>Penerima 1</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header py-1">
							Data Pengiriman Barang PC Siemens
						</div>
						<div class="card-body py-2 px-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable2">
									<thead class="text-center">
										<tr>
											<th style="width: 10px">No</th>
											<th class="text-center">Qty</th>
											<th class="text-center">Sat</th>
											<th class="text-center">Tgl Kirim</th>
											<th class="text-center">Tujuan Pengiriman</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>1</td>
											<td>2</td>
											<td>pcs</td>
											<td>01-09-2024</td>
											<td>Gudang Surabaya</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-1">
							<h5 class="m-0">Log Pengadaan</h5>
						</div>
						<div class="card-body py-1 px-2 m-0" style="max-height: 300px; overflow-y: auto;">
							<ul class="timeline mb-0">
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">
									<h6 class="mb-0 pt-2"><i class="fa fa-clock-o mr-1"></i>21 March, 2024</h6>
									<p class="text-small  font-weight-light p-0 m-0 ">barang 1 sejumlah 100 dikirimkan</p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">

									<h6 class="mb-0 pt-2"><i class="fa fa-clock-o mr-1"></i>21 March, 2024</h6>
									<p class="text-small  font-weight-light p-0 m-0 ">barang 1 sejumlah 200 diterima </p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">
									<h6 class="mb-0 pt-2"><i class="fa fa-clock-o mr-1"></i>21 March, 2024</h6>
									<p class="text-small  font-weight-light p-0 m-0 ">PBB dibuat</p>
								</li>

							</ul>

						</div>
					</div>
				</div>
			</div>
			<div class="row">


			</div>

		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		const t = $('#datatable1').DataTable({
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
				"targets": 0
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


		const t2 = $('#datatable2').DataTable({
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
				"targets": 0
			}],
			"order": [
				[1, 'asc']
			]
		});

		t2.on('order.dt search.dt', function() {
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