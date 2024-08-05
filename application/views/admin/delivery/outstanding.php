<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<style>
	.tdtable {
		padding: 1px !important;
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
											<th class="text-center">Log</th>
											<th class="text-center" style="width: 7%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($list_po as $key => $value) : ?>

											<tr>
												<td class="tdtable"><?= $value['year'] . '/' . $value['month'] ?></td>
												<td class="tdtable"><?= $value['customer'] ?></td>
												<td class="tdtable"><?= $value['nomor_po'] ?></td>
												<td class="tdtable"><?= $value['brand_name'] ?></td>
												<td class="tdtable"><?= $value['totalOutstanding'] ?></td>
												<td class="tdtable"><?= $value['desc'] ?></td>
												<td class="tdtable"><?= $value['due_date'] ?></td>
												<td class="tdtable"><?= $value['log_message'] ?></td>
												<td class="tdtable"><a href="<?= base_url() ?>delivery/delivery/detail/<?= $value['id_delivery'] ?>"><i class="fa fa-eye"></i></a></td>

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
			}]
		});


	});
</script>
<!-- /.content-wrapper -->