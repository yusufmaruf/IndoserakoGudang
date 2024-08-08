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
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th class="text-center" width="10%" nowrap>Nomor Memo</th>
											<th class="text-center" width="10%">Print Date</th>
											<th class="text-center">Desc</th>
											<th class="text-center" width="10%">Status</th>
											<th class="text-center" width="5%" nowrap>Jumlah SJ</th>
											<th class="text-center" style="width: 7%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($list_memo as $key => $value) : ?>
											<tr>
												<td class="tdtable"><?= 'A' . $value['no_memo'] ?></td>
												<td class="tdtable"><?= $value['print_date'] ?></td>
												<td class="tdtable"><?= $value['desc'] ?></td>
												<td class="tdtable">
													<?php if ($value['status'] == 1) : ?>
														<span class="badge badge-warning">not completed</span>
													<?php elseif ($value['status'] == 2) : ?>
														<span class="badge badge-success">completed</span>
													<?php endif; ?>
												</td>
												<td class="tdtable"><?= $value['detail_count'] ?></td>
												<td class="tdtable">
													<?php if ($value['status'] == 1) : ?>
														<a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check"></i></a>
													<?php elseif ($value['status'] == 2) : ?>
														<a target="_blank" href="<?= base_url() ?>delivery/delivery/memodetail/<?= $value['id'] ?>"><i class="fa fa-eye"></i></a>
													<?php endif; ?>
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
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							This is the content of the modal.
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
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
				"targets": 5
			}],
			"order": [
				[0, 'DESC']
			]

		});


	});
</script>
<!-- /.content-wrapper -->