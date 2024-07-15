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
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="mb-2">
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header py-2">
							<div class="row">
								<h5 class="m-0">Data <?= $title; ?></h5>
								<div class="ml-auto">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"> </i> &nbsp; Add</button>
								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead>
										<th class="w5 text-center">No.</th>
										<th class="text-center">Category</th>
										<th class="text-center" style="width: 7%;">Action</th>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($category as $c) : ?>
											<tr>
												<td class="text-center"><?= $i++; ?></td>
												<td class="text-center"><?= $c['name'] ?></td>
												<td class="text-center">
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit" onclick="edit(<?= $c['idCategory'] ?>)"><i class="fa fa-pencil"> </i> </button>
													<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash "> </i> </button>
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

<div class="modal fade" id="modal-add" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Tambah Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/save'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Category</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Category" name="name">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-edit" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('category/update'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Category</label>
						<input type="hidden" class="form-control" name="idCategory" id="idEdit">
						<input type="text" class="form-control" placeholder="Masukan Nama Category" name="name" id="nameEdit">
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
<div class="modal fade" id="modal-delete" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus data ini ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</form>
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
				"targets": [0, 2]
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
<script>
	function edit(id) {
		$.ajax({
			url: "<?= base_url('category/edit/') ?>" + id,
			type: "GET",
			success: function(data) {
				console.log(data); // Log the server response
				try {
					var $obj;

					// If the data is already an object, use it directly
					if (typeof data === "object") {
						$obj = data;
					} else {
						// Trim the data and parse it as JSON
						data = data.trim();
						$obj = JSON.parse(data);
					}

					if ($obj.error) {
						alert($obj.error);
					} else {
						$('#idEdit').val($obj.idCategory);
						$('#nameEdit').val($obj.name);
						$('#modal-edit').modal('show');
					}
				} catch (e) {
					console.error("Parsing error:", e);
					alert("An error occurred while parsing the data.");
				}
			},
			error: function(xhr, status, error) {
				console.error("AJAX error:", status, error);
				alert("An error occurred while fetching the data.");
			}
		});
	}
</script>