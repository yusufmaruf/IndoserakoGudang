<!-- Content Wrapper. Contains page content -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Data Penggadaan Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Main</a></li>
						<li class="breadcrumb-item active">Data PB</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-6">
									<h5 class="m-0">Data Penggadaan Barang</h5>
								</div>
								<div class="col-6">
									<div class="float-right">
										<a href="<?= base_url() . '/pbb/create' ?>" class="btn btn-primary"><i class="fa fa-plus mr-2"></i> Add New PBB</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="col-12">
								<table class="table table-bordered" id="datatable">
									<thead>
										<tr>
											<th>No.</th>
											<th>No. PPB</th>
											<th>Nama Perusahaan</th>
											<th>Nama Project</th>
											<th>Progress</th>
											<th>Status</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>PPB/001/07/09/2024</td>
											<td>PT. ABC</td>
											<td>Project ABC</td>
											<td>
												<div class="progress">
													<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
												</div>
											</td>
											<td>
												<h5><span class="badge badge-success">Open</span></h5>
											</td>
											<td class="text-center">
												<a type="button" href="<?= base_url() . 'pbb/view' ?>" title="Reset Password"><i class="fa fa-eye fa-gold"></i></a>
											</td>
											<td class="text-center">
												<a href="" title="Edit"><i class="fa fa-print"></i></a>
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
				"targets": [0, 6, 7]
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