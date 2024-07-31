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
								<h5 class="m-0">Data Supplier</h5>
								<div class="ml-auto">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"> </i> &nbsp; Add</button>
								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead>
										<th class="w5">No.</th>
										<th>Name</th>
										<th>Lokasi</th>
										<th>Contact Person</th>
										<th>Phone</th>
										<th class="text-center" style="width: 10%;">Action</th>
									</thead>
									<tbody>
										<tr>
											<td> 1 </td>
											<td>Supplier 1</td>
											<td>Jakarta</td>
											<td>CP 1</td>
											<td>Phone 1</td>
											<td class="text-center">
												<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="modal-add" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('supplier/save') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Name Supplier</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Supplier" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Address</label>
								<input type="text" class="form-control" placeholder="Masukan Address Supplier" name="address">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">CP</label>
								<input type="text" class="form-control" placeholder="Masukan Nama CP" name="cp">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Phone" name="phone">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Link</label>
							<input type="text" class="form-control" value="" name="link">
						</div>
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
				<h4 class="modal-title">Edit Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Name Supplier</label>
								<input type="hidden" class="form-control" value="" name="id" id="id">
								<input type="text" class="form-control" value="" name="name" id="nameedit">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Address</label>
								<input type="text" class="form-control" value="" name="address" id="addressedit">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">CP</label>
								<input type="text" class="form-control" value="" name="cp" id="cpedit">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" class="form-control" value="" name="phone" id="phoneedit">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Link</label>
							<input type="text" class="form-control" value="" name="link" id="linkedit">
						</div>
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
				<h4 class="modal-title">Hapus Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('supplier/delete'); ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus data <span class="namedelete"></span> ?</p>
					<input type="hidden" id="idDelete" name="id">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
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
				"targets": [0, 5]
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
<script>
	function edit(id) {
		$.ajax({
			url: "<?= base_url('supplier/edit/') ?>" + id,
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
						$('#idEdit').val($obj.id);
						$('#nameedit').val($obj.name);
						$('#addressedit').val($obj.address);
						$('#cpedit').val($obj.cp);
						$('#phoneedit').val($obj.phone);
						$('#linkedit').val($obj.link);
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
<script>
	function remove(id) {
		$.ajax({
			url: "<?= base_url('supplier/edit/') ?>" + id,
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
						$('.namedelete').text($obj.name); // Target the span with class namedelete
						$('#idDelete').val($obj.id); // Set the hidden input field with the id
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