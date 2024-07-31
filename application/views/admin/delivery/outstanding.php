<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">
	</div>

	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header py-2">
							<div class="row">
								<h5><?= $title; ?></h5>
								<div class="ml-auto">
									<a href="<?= base_url() ?>master/receiveSafetyStock" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a>

								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th class="text-center" width="3%">Year/Month</th>
											<th class="text-center">Nama Customer</th>
											<th class="text-center">No PO</th>
											<th class="text-center">Brand</th>
											<th class="text-center">Qty</th>
											<th class="text-center">Description</th>
											<th class="text-center">Due Date</th>
											<th class="text-center" width="15%">Log</th>
											<th class="text-center" style="width: 7%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>2024/12</td>
											<td>Mega Surya</td>
											<td>6500020378</td>
											<td>IFM</td>
											<td>2</td>
											<td>E70213</td>
											<td>12-12-2024</td>
											<td>Pengiriman dari jakarta</td>
											<td>
												<div class="row justify-content-around">
													<a href="" class="btn btn-sm btn-primary"><i class="fa fa-file"></i></a>
													<a href="" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
												</div>
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
				"targets": 7
			}],
			"order": [
				[1, 'asc']
			]
		});


	});
</script>
<!-- /.content-wrapper -->