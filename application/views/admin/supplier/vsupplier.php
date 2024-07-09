<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<style>
	.w5 {
		width: 5%;
	}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('global')) {
				unset($_SESSION['global']);
			} ?>
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">User Table</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Main</a></li>
						<li class="breadcrumb-item">Setting</li>
						<li class="breadcrumb-item active">Supplier</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="mb-2">
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<h5 class="m-0">Data Supplier</h5>
								<div class="ml-auto">
									<a href="<?= base_url() . 'master/user_add' ?>" class="btn btn-primary mr-2 mb-2"><i class="fa fa-plus mr-2"></i> Add New Supplier</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead>
										<th class="w5">No.</th>
										<th>Name</th>
										<th>Lokasi</th>
										<th>Contact Person</th>
										<th>Phone</th>
										<th class="text-center w5" colspan="2">Action</th>
									</thead>
									<tbody>
										<?php
										foreach ($row as $key => $value) { ?>
											<tr>
												<td></td>
												<td><?= $value['name'] ?></td>
												<td><?= $value['address'] ?></td>
												<td><?= $value['cp'] ?></td>
												<td><?= $value['phone'] ?></td>
												<td class="text-center">
													<a type="button" title="Reset Password" class="text-danger"><i class="fa fa-trash" onclick="reset_confirm(<?= $value['id'] ?>)"></i></a>
												</td>
												<td class="text-center">
													<a href="<?= base_url() . 'master/user_edit/' . $value['id'] ?>" title="Edit"><i class="fa fa-edit"></i></a>
												</td>
											</tr>
										<?php
										}
										?>
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
<!-- /.content-wrapper -->

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

	function reset_confirm(params) {
		event.preventDefault();
		$("#reset_modal").modal();
		$("#reset_pass").attr("href", "<?= base_url() ?>" + 'master/user_reset/' + params);
	}
</script>