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
									<a href="<?= base_url() ?>delivery/delivery/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create</a>
								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th style="width: 5%;">No</th>
											<th class="text-center">Name Customer</th>
											<th class="text-center">No PO</th>
											<th class="text-center">No SJ</th>
											<th class="text-center">Date SJ</th>
											<th class="text-center" width="40%">Log</th>
											<th class="text-center" style="width: 5%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php $no = 1;
										foreach ($delivery as $key => $value) : ?>
											<tr>
												<td class="tdtable"><?= $no++; ?></td>
												<td class="tdtable"><?= $value['customer_name']; ?></td>
												<td class="tdtable"><?= $value['nomor_po']; ?></td>
												<td class="tdtable"><?= $value['nomor_sj']; ?></td>
												<td class="tdtable"><?= $value['created_at']; ?></td>
												<td class="tdtable"><?= $value['delivery_message']; ?></td>
												<td class="tdtable">
													<a href="<?= base_url() ?>delivery/delivery/detail/<?= $value['id']; ?>"><i class="fas fa-search"></i></a>
												</td>
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
				"targets": 4
			}],
		});


	});
</script>
<!-- /.content-wrapper -->