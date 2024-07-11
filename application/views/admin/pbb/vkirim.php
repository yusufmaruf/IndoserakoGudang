<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body p-2">
							<form action="">
								<div class="row mb-0">
									<div class="col-6  mb-0">
										<div class="form-group  mb-0">
											<label for="">No. PBB</label>
											<input type="text" class="form-control" placeholder="Masukan No. PBB" name="NoForm" value="PBB/09/012/2024" disabled>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group  mb-0">
											<label for="">Tujuan Kirim</label>
											<input type="text" class="form-control" placeholder="Masukan Tujuan Pengiriman" name="NoForm" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="">Catatan</label>
											<input type="text" class="form-control" name="NoForm">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Surat Jalan</label>
											<input type="file" class="form-control" name="NoForm">
										</div>
									</div>
								</div>


								<table class=" table table-bordered mb-0">
									<thead class="text-center">
										<tr>
											<th style="width: 10px">No</th>
											<th>Barang</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>act</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>1</td>
											<td>PC Siemens</td>
											<td><input type="number" class="form-control" style="height: 30px;"></td>
											<td>pcs</td>
											<td><i class="fa fa-trash"></i></td>
										</tr>
									</tbody>

								</table>
							</form>
						</div>
					</div>


				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							<h5 class="m-0">Buat Pengiriman</h5>
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
								<div class="form-group mb-1">
									<label for="">Qty</label>
									<input type="number" class="form-control" name="NoForm">
								</div>
								<div class="form-group mb-3">
									<label for="">Satuan</label>
									<input type="text" class="form-control" placeholder="Pcs" name="NoForm" disabled>
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