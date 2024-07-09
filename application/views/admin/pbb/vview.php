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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<h2>Form Permintaan Barang</h2>
								</div>
								<div class="col-lg-6">
									<div class="form-group d-flex">
										<label class="col-lg-4" for=""> No Form</label>
										<input class="col-lg-8" type="text" class="form-control" value="PPB/01/07/09/2024" placeholder="No Form" name="NoForm" disabled>
									</div>
									<div class="form-group d-flex">
										<label class="col-lg-4" for=""> No SO</label>
										<input class="col-lg-8" type="text" class="form-control" value="SO/01/07/09/2024" placeholder="No Form" name="NoForm" disabled>
									</div>
								</div>
							</div>
							<div class="form-group d-flex">
								<label class="col-lg-4" for=""> Nama Perusahaan</label>
								<input class="col-lg-8" type="text" class="form-control" value="PT. ABC" disabled placeholder="No Form" name="NoForm">
							</div>
							<div class="form-group d-flex">
								<label class="col-lg-4" for=""> Nama Project</label>
								<input class="col-lg-8" type="text" class="form-control" value="Project ABC" disabled placeholder="No Form" name="NoForm">
							</div>
							<div class="form-group d-flex">
								<label class="col-lg-4" for=""> No PO</label>
								<input class="col-lg-8" type="text" class="form-control" value="PO/01/07/09/2024" disabled placeholder="No Form" name="NoForm">
							</div>
							<div class="form-group d-flex">
								<label class="col-lg-4" for=""> Tanggal Dibutuhkan</label>
								<input class="col-lg-8" type="date" class="form-control" value="2024-07-09" disabled placeholder="No Form" name="NoForm">
							</div>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="width: 10px">No</th>
										<th>Nama Barang</th>
										<th>Qty</th>
										<th>Sat</th>
										<th>PIC</th>
										<th>Progress</th>
										<th>Status</th>
										<th colspan="2">Act</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="PC Siemens" disabled>
											</div>
										</td>
										<td>
											<div class="form-group d-flex">
												<input type="number" class="form-control" placeholder="No Form" name="NoForm" value="2" disabled>
											</div>
										</td>
										<td>
											<div class="form-group d-flex">
												<input type="text" class="form-control" placeholder="No Form" value="Pcs" name="NoForm" disabled>
											</div>
										</td>
										<td>
											<div class="form-group d-flex">
												<input type="text" class="form-control" placeholder="Nama PIC" value="Achmad" name="NoForm" disabled>
											</div>
										</td>
										<td class=" text-center">
											<div class="progress">
												<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
											</div>
										</td>
										<td>
											<h5><span class="badge badge-success">Open</span></h5>
										</td>
										<td class="text-center">
											<a type="button" href="<?= base_url() . 'pbb/kirim' ?>" title="Kirim Barang"><i class="fa fa-truck fa-gold"></i></a>
										</td>
										<td class="text-center">
											<a href="<?= base_url() . 'pbb/terima' ?>" title="Penerimaan Barang"><i class="fa fa-cart-plus"></i></a>
										</td>
									</tr>
								</tbody>

							</table>
							<div class="row">
								<div class="col-4">
									<div class="form-group text-center">
										<label for="">Management</label>
										<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager" disabled>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group text-center">
										<label for="">Gudang</label>
										<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager" disabled>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group text-center">
										<label for="">Pemohon</label>
										<input type="text" class="form-control" placeholder="No Form" name="NoForm" value="Manager" disabled>
									</div>
								</div>
							</div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-success">Selesai</button>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
<!-- /.content-wrapper -->