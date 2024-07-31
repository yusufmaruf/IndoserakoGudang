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
<style>
	.preview-image {
		max-width: 100%;
		height: auto;
		margin-top: 10px;
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
										<th class="text-center">Foto</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Brand</th>
										<th class="text-center">Type</th>
										<th class="text-center">Category</th>
										<th class="text-center" style="width: 7%;">Action</th>
									</thead>
									<tbody>

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
			<form action="<?= base_url('barang/save'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Barang" name="name">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Brand</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Brand" name="brand">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Type</label>
								<input type="text" class="form-control" placeholder="Masukan Nama Type" name="type">
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
									<?php foreach ($category as $c) : ?>
										<option value="<?= $c['id_category'] ?>"><?= $c['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Gambar</label>
								<input type="file" class="form-control" name="foto" id="photoProduct" accept="image/*" onchange="previewImage(event)">
							</div>
							<div class="preview" id="previewArea" style="display: none;"> <!-- Tambahkan style display: none; -->
								<img id="previewImg" src="" alt="Preview Image" class="preview-image">
							</div>
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
				<h4 class="modal-title">Form Edit Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('barang/update'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="hidden" class="form-control" id="idEdit" name="id_barang">
						<input type=" text" class="form-control" id="nameedit" placeholder="Masukan Nama Barang" value="" name="name">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Brand</label>
								<input type="text" class="form-control" id="brandedit" placeholder="Masukan Nama Brand" name="brand">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Type</label>
								<input type="text" class="form-control" id="typeedit" placeholder="Masukan Nama Type" name="type">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<select autofocus="" id="satuanedit" name="satuan" id="satuan" class="form-control select2">
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
								<select autofocus="" id="categoryedit" name="category" class="form-control select2">
									<option value="">Pilih Category</option>
									<?php foreach ($category as $c) : ?>
										<option value="<?= $c['id_category'] ?>"><?= $c['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Gambar <span class="text-secondary">Upload Foto Product Jika Ingin Menghapus</span></label>
								<input type="file" class="form-control" name="foto" id="photoProductedit" accept="image/*" onchange="previewImageedit(event)">
							</div>
							<div class="previewedit" id="previewAreaedit" style="display: none;"> <!-- Tambahkan style display: none; -->
								<img id="previewImgedit" src="" alt="Preview Image" style="width: 200px;" class="preview-imageedit">
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
		</div>
		</form>
	</div>
</div>
</div>
<div class="modal fade" id="modal-delete" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= base_url('barang/delete'); ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus data <span class="namedelete"></span> ?</p>
					<input type="hidden" id="idDelete" name="id_barang" class="form-control">
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
	function previewImage(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('previewImg');
			output.src = reader.result;
			// Tampilkan area preview ketika gambar sudah diunggah
			document.getElementById('previewArea').style.display = 'block';
		};

		var file = event.target.files[0]; // Ambil file yang diunggah
		if (file) {
			reader.readAsDataURL(file); // Jika ada file, baca sebagai data URL
		} else {
			// Jika tidak ada file yang dipilih, kosongkan preview dan sembunyikan area preview
			document.getElementById('previewImg').src = "";
			document.getElementById('previewArea').style.display = 'none';
		}
	}
</script>

<script>
	function previewImageedit(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('previewImgedit');
			output.src = reader.result;
			// Tampilkan area preview ketika gambar sudah diunggah
			document.getElementById('previewAreaedit').style.display = 'block';
		};

		var file = event.target.files[0]; // Ambil file yang diunggah
		if (file) {
			reader.readAsDataURL(file); // Jika ada file, baca sebagai data URL
		} else {
			// Jika tidak ada file yang dipilih, kosongkan preview dan sembunyikan area preview
			document.getElementById('previewImgedit').src = "";
			document.getElementById('previewAreaedit').style.display = 'none';
		}

	}
	$('#modal-edit').on('hidden.bs.modal', function() {
		// Kosongkan preview gambar dan sembunyikan area preview saat modal ditutup
		document.getElementById('previewImgedit').src = "";
		document.getElementById('previewAreaedit').style.display = 'none';
	});
</script>

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
				[2, 'asc']
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
		$('#modal-edit').modal('show');
		$.ajax({
			url: "<?= base_url('barang/edit/') ?>" + id,
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
						$('#idEdit').val($obj.id_barang);
						$('#nameedit').val($obj.name);
						$('#brandedit').val($obj.brand);
						$('#typeedit').val($obj.type);
						$('#categoryedit').val($obj.category);
						$('#satuanedit').val($obj.satuan);
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
			url: "<?= base_url('barang/edit/') ?>" + id,
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
						$('#idDelete').val($obj.id_barang); // Set the hidden input field with the id
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