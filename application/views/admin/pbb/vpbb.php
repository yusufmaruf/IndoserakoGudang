<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Form Penggadaan Barang</h1>
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
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="">
								<div class="row">
									<div class="col-lg-6">
										<h2>Form Permintaan Barang</h2>
									</div>
									<div class="col-lg-6">
										<div class="form-group d-flex">
											<label class="col-lg-4" for=""> No Form</label>
											<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm">
										</div>
										<div class="form-group d-flex">
											<label class="col-lg-4" for=""> No SO</label>
											<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm">
										</div>
									</div>
								</div>
								<div class="form-group d-flex">
									<label class="col-lg-4" for=""> Nama Perusahaan</label>
									<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm">
								</div>
								<div class="form-group d-flex">
									<label class="col-lg-4" for=""> Nama Project</label>
									<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm">
								</div>
								<div class="form-group d-flex">
									<label class="col-lg-4" for=""> No PO</label>
									<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm">
								</div>
								<div class="form-group d-flex">
									<label class="col-lg-4" for=""> Tanggal Dibutuhkan</label>
									<input class="col-lg-8" type="date" class="form-control" placeholder="No Form" name="NoForm">
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Nama Barang</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>PIC</th>
											<th>Act</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<div class="form-group d-flex">
													<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" name="NoForm" value="PC Siemens" disabled>
												</div>
											</td>
											<td>
												<div class="form-group d-flex">
													<input class="col-lg-8" type="number" class="form-control" placeholder="No Form" name="NoForm">
												</div>
											</td>
											<td>
												<div class="form-group d-flex">
													<input class="col-lg-8" type="text" class="form-control" placeholder="No Form" value="Pcs" name="NoForm" disabled>
												</div>
											</td>
											<td>
												<div class="form-group d-flex">
													<input class="col-lg-8" type="text" class="form-control" placeholder="Nama PIC" value="Achmad" name="NoForm" disabled>
												</div>
											</td>
											<td>
												<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
									</tbody>

								</table>
								<div class="row">
									<div class="col-4">
										<div class="form-group text-center">
											<label for="">Management</label>
											<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager">
										</div>
									</div>
									<div class="col-4">
										<div class="form-group text-center">
											<label for="">Gudang</label>
											<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager">
										</div>
									</div>
									<div class="col-4">
										<div class="form-group text-center">
											<label for="">Pemohon</label>
											<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager">
										</div>
									</div>
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Tambah Barang Penggadaan</h5>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group">
									<label for="">Nama Barang</label>
									<input type="text" class="form-control" placeholder="Pilih Nama Barang" name="NoForm">
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
									<label for="">PIC</label>
									<input type="text" class="form-control" placeholder="Nama PIC" name="NoForm">
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