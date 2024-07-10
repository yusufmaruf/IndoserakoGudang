<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<!-- select 2  -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>

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
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Brand</th>
										<th class="text-center">Type</th>
										<th class="text-center">Category</th>
										<th class="text-center" style="width: 7%;">Action</th>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">1</td>
											<td class="text-center">PC Siemens</td>
											<td class="text-center">Pcs</td>
											<td class="text-center">Siemens</td>
											<td class="text-center">PC</td>
											<td class="text-center">Computer</td>
											<td class="text-center">
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"> </i></button>
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"> </i></button>
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
				<h4 class="modal-title">Form Tambah Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Barang" name="NoForm">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Brand</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Brand" name="NoForm">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Type</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Type" name="NoForm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<select autofocus="" id="satuan" name="satuan" class="form-control select2">
									<option value="">Pilih Satuan</option>
									<option value="unit">Unit</option>
									<option value="buah">Buah</option>
									<option value="pcs">Pcs</option>
									<option value="pasang">Pasang</option>
									<option value="lembar">lembar</option>
									<option value="keping">keping</option>
									<option value="batang">batang</option>
									<option value="bungkus">bungkus</option>
									<option value="potong">potong</option>
									<option value="tablet">tablet</option>
									<option value="ekor">Ekor</option>
									<option value="rim">rim</option>
									<option value="karat">karat</option>
									<option value="botol">botol</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Category</label>
								<select autofocus="" id="category" name="category" class="form-control select2">
									<option value="">Pilih Category</option>
									<option value="unit">Category</option>
								</select>
							</div>
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
<div class="modal fade" id="modal-edit" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Tambah Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Barang" value="PC Siemens" name="NoForm">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Brand</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Brand" value="Siemens" name="NoForm">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Type</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Type" value="Computer" name="NoForm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<select autofocus="" id="satuan" name="satuan" class="form-control select2">
									<option value="">Pilih Satuan</option>
									<option value="unit">Unit</option>
									<option value="buah">Buah</option>
									<option value="pcs" selected>Pcs</option>
									<option value="pasang">Pasang</option>
									<option value="lembar">lembar</option>
									<option value="keping">keping</option>
									<option value="batang">batang</option>
									<option value="bungkus">bungkus</option>
									<option value="potong">potong</option>
									<option value="tablet">tablet</option>
									<option value="ekor">Ekor</option>
									<option value="rim">rim</option>
									<option value="karat">karat</option>
									<option value="botol">botol</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Category</label>
								<select autofocus="" id="category" name="category" class="form-control select2">
									<option value="">Pilih Category</option>
									<option value="unit" selected>Category</option>
								</select>
							</div>
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
		$('#satuan').select2({
			theme: 'bootstrap4',
		});
		$('#category').select2({
			theme: 'bootstrap4',
		});

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