<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<div class="content-wrapper">
	<div class="content-header">

	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="tabel-kanan col-lg-8">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header py-2">
								Detail Data Inventaris Project Receive
							</div>
							<div class="card-body p-2">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable">
										<thead class="text-center">
											<tr>
												<th class="text-center">Tanggal</th>
												<th class="text-center">Barang</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Satuan</th>
												<th class="text-center">Penerima</th>
												<th class="text-center">Supplier</th>
												<th class="text-center">price</th>
												<th class="text-center">reason</th>
											</tr>
										</thead>
										<tbody class="text-center">
											<?php foreach ($receive as $key => $value) : ?>
												<tr>
													<td><?= $value['tanggal'] ?></td>
													<td><?= $value['namaProduk'] ?></td>
													<td><?= $value['qty'] ?></td>
													<td><?= $value['satuan'] ?></td>
													<td><?= $value['penerima'] ?></td>
													<td><?= $value['supplier'] ?></td>
													<td><?= "Rp. " . number_format($value['totalprice'], 0)  ?></td>
													<td><?= $value['reason'] ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header py-2">
								Detail Data Inventaris Project Substrack
							</div>
							<div class="card-body p-2">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable2">
										<thead class="text-center">
											<tr>
												<th class="text-center">Tanggal</th>
												<th class="text-center">Barang</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Satuan</th>
												<th class="text-center">Reason</th>
											</tr>
										</thead>
										<tbody class="text-center">
											<?php foreach ($return as $key => $value) : ?>
												<tr>
													<td><?= $value['tanggal'] ?></td>
													<td><?= $value['namaProduk'] ?></td>
													<td><?= $value['qty'] ?></td>
													<td><?= $value['satuan'] ?></td>
													<td><?= $value['reason'] ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header py-2">
							LOG Inventaris
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th class="text-center" width="30%">Tanggal</th>
											<th class="text-center">Message</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($log as $key => $value) : ?>
											<tr>
												<td><?= $value['date'] ?></td>
												<td><?= $value['messages'] ?></td>
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
				"targets": 6
			}],

		});
	});
</script>
<script>
	$(document).ready(function() {
		const t = $('#datatable2').DataTable({
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
				"targets": 4
			}],
		});
	});
</script>
<!-- /.content-wrapper -->