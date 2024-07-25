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
							Data Barang Project
						</div>
						<div class="card-body p-2">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center">
										<tr>
											<th class="text-center">Last Update</th>
											<th class="text-center">Brand</th>
											<th class="text-center">Customer Name</th>
											<th class="text-center">Project Name</th>
											<th class="text-center">PO Number</th>
											<th class="text-center">Item</th>
											<th class="text-center">Quantity</th>
											<th class="text-center" style="width: 5%;">Action</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
											<td>01-01-2024</td>
											<td>Brand</td>
											<td>Customer Name1</td>
											<td>Project Name1</td>
											<td>PO Number1</td>
											<td>Item1</td>
											<td>10 Pcs</td>
											<td><a href="<?= base_url(); ?>pbb/detail" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
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
				"targets": 7
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
<!-- /.content-wrapper -->