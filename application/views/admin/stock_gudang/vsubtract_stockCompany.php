<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-header py-1">
							<h5 class="m-0">Form Subtract Stock</h5>
						</div>
						<div class="card-body p-2">
							<form action="">
								<div class="row mb-0">
									<div class="col-6  mb-0">
										<div class="form-group  mb-0">
											<label for="">Tanggal</label>
											<input type="date" class="form-control" placeholder="Masukan No. PBB" value="<?= date('Y-m-d') ?>" name="NoForm" disabled>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group  mb-0">
											<label for="">SO Number</label>
											<input type="text" class="form-control" placeholder="Masukan No SO" name="NoForm" value="">
										</div>
									</div>
								</div>

								<table class="table table-bordered mt-2 mb-0">
									<thead>
										<tr>
											<th>Nama Barang</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>Supplier</th>
											<th>Harga</th>
											<th style="width: 10px">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td>PC Siemens</td>
											<td>2</td>
											<td> pcs </td>
											<td>Offical Siemens</td>
											<td>Rp. 50.000.000</td>
											<td><button class="btn btn-sm btn-danger">Hapus</button></td>
										</tr>
									</tbody>

								</table>
								<div class="row mt-2 px-1">
									<div class="ml-auto">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							<h5 class="m-0">Pilih Barang</h5>
						</div>
						<div class="card-body p-2">
							<form action="">
								<div class="form-group mb-1">
									<label for="">Nama Barang</label>
									<select autofocus="" id="barang" name="category" class="form-control select2">
										<option value="">Pilih Barang</option>
										<option value="unit">Barang 1</option>
									</select>
								</div>

								<div class="row ">
									<div class="col-lg-6 ">
										<div class="form-group mb-1">
											<label for="">Qty</label>
											<input type="number" class="form-control" placeholder="" name="NoForm">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group mb-1">
											<label for="">Satuan</label>
											<input type="text" class="form-control" placeholder="Pcs" name="NoForm" disabled>
										</div>
									</div>
								</div>
								<div class="form-group mb-2 mt-0">
									<label for="">Reason Deduction</label>
									<input type="text" class="form-control" placeholder="" name="">
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Tambahkan </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#barang').select2({
			theme: 'bootstrap4',
		});
	});
</script>
<!-- /.content-wrapper -->