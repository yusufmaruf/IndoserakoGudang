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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header py-2">
							<div class="row">
								<h5>Data Inventaris</h5>
								<div class="ml-auto">
									<a href="<?= base_url() ?>master/receiveStockCompany" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Receive</a>
									<a href="<?= base_url() ?>master/subtractStockCompany" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i> Subtract</a>
								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th>Last Update</th>
											<th class="text-center">Nama Barang</th>
											<th class="text-center">Nama Brand</th>
											<th class="text-center">Jumlah</th>
											<th class="text-center">Satuan</th>
											<th class="text-center">category</th>
											<th class="text-center" style="width: 5%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>12-12-2020</td>
											<td>Barang 1</td>
											<td>Brand 1</td>
											<td>100</td>
											<td>pcs</td>
											<td>Category 1</td>
											<td><a href="" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
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
			"order": [
				[1, 'asc']
			]
		});


	});
</script>
<!-- /.content-wrapper -->