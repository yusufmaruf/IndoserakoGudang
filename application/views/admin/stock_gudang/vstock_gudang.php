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
	<div class="content-header">

	</div>

	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-header py-2">
							Data Inventaris Project
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th style="width: 10px">No</th>
											<th class="text-center">Project</th>
											<th class="text-center">Nama Barang</th>
											<th class="text-center">Jumlah</th>
											<th class="text-center">Satuan</th>
											<th class="text-center">category</th>
											<th class="text-center" style="width: 5%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>1</td>
											<td>Project 1</td>
											<td>Barang 1</td>
											<td>100</td>
											<td>pcs</td>
											<td>Category 1</td>
											<td><a href="<?= base_url(); ?>pbb/detail" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							<h5 class="m-0">Log Penggadaan</h5>
						</div>
						<div class="card-body py-1 px-2 m-0" style="max-height: 500px; overflow-y: auto;">
							<ul class="timeline mb-0">
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">
									<h6 class="mb-0 pt-2"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</h6>
									<p class="text-small  font-weight-light p-0 m-0 mb-2">barang 1 sejumlah 100 dikirimkan</p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 py-0 px-3 border border-grey ">

									<h6 class="mb-0 pt-2"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</h6>
									<p class="text-small  font-weight-light p-0 m-0 mb-2">barang 1 sejumlah 200 diterima </p>
								</li>

							</ul>

						</div>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-4">
					<div class="card">
						<div class="card-header">
							Gudang Surabaya
						</div>
						<div class="card-body py-2 px-2">
							<div class="card p-0 m-1 mb-2">
								<div class="card-header">
									Project Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold mb-0">100</h5>
											<p class="mb-0 p-0">Project</p>
										</div>
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-4 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Company Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Safety Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card">
						<div class="card-header">
							Gudang Semarang
						</div>
						<div class="card-body py-2 px-2">
							<div class="card p-0 m-1 mb-2">
								<div class="card-header">
									Project Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold mb-0">100</h5>
											<p class="mb-0 p-0">Project</p>
										</div>
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-4 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Company Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Safety Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card">
						<div class="card-header">
							Gudang Jakarta
						</div>
						<div class="card-body py-2 px-2">
							<div class="card p-0 m-1 mb-2">
								<div class="card-header">
									Project Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold mb-0">100</h5>
											<p class="mb-0 p-0">Project</p>
										</div>
										<div class="col-4 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-4 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Company Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-0 m-1  mb-2">
								<div class="card-header">
									Safety Inventory
								</div>
								<div class="card-body p-2">
									<div class="row text-center">
										<div class="col-6 text-center border-right mb-0 p-0">
											<h5 class="text-bold  mb-0">100</h5>
											<p class="mb-0 p-0">Stock Produk</p>
										</div>
										<div class="col-6 text-center mb-0 p-0 ">
											<h5 class="text-bold  mb-0 p-0">100</h5>
											<p class="mb-0 p-0">Category Produk</p>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>



			</div> -->
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
				"targets": [0, 6]
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