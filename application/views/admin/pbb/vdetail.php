<!-- Content Wrapper. Contains page content -->
<style>
	ul.timeline {
		list-style-type: none;
		position: relative;
		padding-left: 1.5rem;
	}

	/* Timeline vertical line */
	ul.timeline:before {
		content: ' ';
		background: #a5b3c9;
		display: inline-block;
		position: absolute;
		left: 16px;
		width: 4px;
		height: 100%;
		z-index: 400;
		border-radius: 1rem;
	}

	li.timeline-item {
		margin: 20px 0;
	}

	/* Timeline item arrow */
	.timeline-arrow {
		border-top: 0.5rem solid transparent;
		border-right: 0.5rem solid #a5b3c9;
		border-bottom: 0.5rem solid transparent;
		display: block;
		position: absolute;
		left: 2rem;
	}

	/* Timeline item circle marker */
	li.timeline-item::before {
		content: ' ';
		background: #a5b3c9;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #a5b3c9;
		left: 11px;
		width: 14px;
		height: 14px;
		z-index: 400;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
	}
</style>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Form Penerimaan Barang</h1>
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
									<h5 class="m-0">Penerimaan Barang : PPB/01/09/07/2024</h5>
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
										<h5>Data Penerimaan Barang PC Siemens</h5>
									</div>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Qty</th>
											<th>Sat</th>
											<th>Sender</th>
											<th>Tanggal Masuk</th>
											<th>Harga</th>
											<th>Gudang</th>
											<th>Penerima</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>2</td>
											<td> pcs </td>
											<td>Offical Siemens</td>
											<td>01-01-2021</td>
											<td>Rp. 50.000.000</td>
											<td>Gudang Surabaya</td>
											<td>Achmad</td>

										</tr>
									</tbody>

								</table>
							</form>
						</div>
					</div>
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
											<th>Tujuan Pengiriman</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>2</td>
											<td> pcs </td>
											<td>01-01-2021</td>
											<td>Gudang Surabaya</td>
										</tr>
									</tbody>

								</table>
							</form>
						</div>
					</div>


				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h5 class="m-0">Log Penggadaan</h5>
						</div>
						<div class="card-body py-0 m-0 ">
							<ul class="timeline px-0 m-0 ">
								<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
									<div class="timeline-arrow"></div>
									<h2 class="h5 mb-0">Barang Diterima</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 March, 2019</span>
									<p class="text-small mt-2 font-weight-light">PC Siemens dengan jumlah 9 pcs diterima di Gudang Surabaya oleh Achmad </p>
								</li>
								<li class="timeline-item bg-white rounded ml-3 p-4 shadow">
									<div class="timeline-arrow"></div>
									<h2 class="h5 mb-0">Barang Dikirim</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>5 April, 2019</span>
									<p class="text-small mt-2 font-weight-light">PC Siemens dengan 9 pcs dikirim ke Gudang Surabaya</p>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.content-wrapper -->