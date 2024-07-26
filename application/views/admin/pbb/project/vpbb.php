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
			<div class="row p-0">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header p-2 m-0">
							<div class="row px-2">
								<form action="">
									<input type="month" name="from" class="form-control" value="<?= date('Y-m') ?>">
								</form>
								<div class="ml-auto">
									<a href="<?= base_url() ?>pbb/create" class="btn btn-primary">
										<i class="fa fa-plus mr-2"></i> Add New PBB
									</a>
								</div>
							</div>
						</div>

						<div class="card-body p-1">
							<div class="col-12">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center p-1">
										<tr>
											<th>No.</th>
											<th>Date Required</th>
											<th>No. PPB</th>
											<th>Nama Perusahaan</th>
											<th>Nama Project</th>
											<th>Delivered</th>
											<th>Status</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody class="text-center p-1">
										<tr>
											<td>1</td>
											<td>01-07-2024</td>
											<td>PPB/001/07/09/2024</td>
											<td>PT. ABC</td>
											<td>Project ABC</td>
											<td class=" text-center">
												<div class="progress-outer">
													<div class="progress">
														<div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%;"></div>
														<div class="progress-value">80%</div>
													</div>
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
				"targets": [0, 7, 8]
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