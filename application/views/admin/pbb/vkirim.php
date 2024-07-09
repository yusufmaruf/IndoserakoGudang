<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Form Pengiriman Barang Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Main</a></li>
						<li class="breadcrumb-item active">PBB</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-6">
									<h5 class="m-0">Pengiriman Barang : PPB/01/09/07/2024</h5>
								</div>
								<div class="col-6">
									<div class="float-right">
										<div class="row">

											<h5>PC Siemens : </h5>
											<h5 class="m-0">&nbsp; 4 Pcs</h5>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="">
								<div class="row">
									<div class="col-lg-6 mb-3">
										<h5>Data Pengiriman Barang PC Siemens</h5>
									</div>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>Tanggal Kirim</th>
											<th>Tanggal Terima</th>
											<th>Tujuan Pengiriman</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>2</td>
											<td> pcs </td>
											<td>01-01-2021</td>
											<td></td>
											<td>Gudang Surabaya</td>
											<td><button class="btn btn-success" type="button">terima</button></td>

										</tr>
									</tbody>

								</table>
							</form>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Log Penggadaan</h5>
						</div>
						<div class="card-body">
							<div class="timeline ">
								<div>
									<i class="fas fa-truck bg-blue"></i>
									<div class="timeline-item">
										<span class="time"><i class="fas fa-date"></i> 10 Feb. 2014</span>
										<h3 class="timeline-header"><a href="#">Pengiriman Dibuat</a> sent you an email</h3>
									</div>
								</div>
								<div>
									<i class="fas fa-user bg-green"></i>
									<div class="timeline-item">
										<span class="time"><i class="fas fa-clock"></i>10 Feb. 2014</span>
										<h3 class="timeline-header no-border"><a href="#">Pengiriman di terima</a> </h3>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Buat Pengiriman</h5>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group">
									<label for="">Nama Barang</label>
									<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="PC Siemens" disabled>
								</div>
								<div class="form-group">
									<label for="">Qty</label>
									<input type="number" class="form-control" placeholder="Qty" name="NoForm">
								</div>
								<div class="form-group">
									<label for="">Satuan</label>
									<input type="text" class="form-control" placeholder="Pcs" name="NoForm" disabled>
								</div>
								<div class="form-group">
									<label for="">Tujuan Pengiriman</label>
									<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm" value="">
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Tambahkan

									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.content-wrapper -->