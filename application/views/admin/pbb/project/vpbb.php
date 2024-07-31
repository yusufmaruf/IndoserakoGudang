<!-- Content Wrapper. Contains page content -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>


<style>
	.progress {
		height: 20px;
		margin: 0;
		overflow: visible;
		border-radius: 50px;
		/* background: #eaedf3; */
	}

	.progress .progress-bar {
		border-radius: 10px;
	}

	.progress .progress-value {
		position: relative;
		left: -45px;
		top: 10px;
		font-size: 14px;
		font-weight: bold;
		color: #fff;
		letter-spacing: 2px;
	}

	.progress-bar.active {
		animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
	}

	@-webkit-keyframes animate-positive {
		0% {
			width: 0%;
		}
	}

	@keyframes animate-positive {
		0% {
			width: 0%;
		}
	}
</style>

<div class="content-wrapper">
	<div class="content-header">
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="row p-0">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header p-2 m-0">
							<div class="row px-2">
								<form action="">
									<input type="month" name="from" class="form-control" value="<?= date('Y-m') ?>">
								</form>
								<div class="ml-auto">
									<a href="<?= base_url() ?>bpp/bppproject/create" class="btn btn-primary">
										<i class="fa fa-plus mr-2"></i> Add New PBB
									</a>

								</div>
							</div>
						</div>

						<div class="card-body p-1">
							<div class="col-12">
								<table class="table table-bordered" id="datatable">
									<thead class="text-center p-1">
										<tr>
											<th width="5%">No.</th>
											<th width="10%">Due Date</th>
											<th>No. BPP</th>
											<th>Customer</th>
											<th>Project</th>
											<th width="5%">Status</th>
											<th width="10%" colspan="3">Action</th>
										</tr>
									</thead>
									<tbody class="text-center p-1">
										<td>1</td>
										<td>12/12/2020</td>
										<td>123</td>
										<td>PT. ABC</td>
										<td>Project 1</td>
										<td>
											Open
										</td>
										<td><a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
										<td><a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
										<td><a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
									</tbody>
								</table>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-edit" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<img src="<?= base_url() ?>assets/" alt="" id="viewbpp" width="100%">
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
				"targets": [0, 7, 8]
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
<script>
	function show(id) {
		$('#modal-edit').modal('show');
		$.ajax({
			url: "<?= base_url('bpp/bppproject/show/') ?>" + id,
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
						$('#viewbpp').attr('src', '<?= base_url() ?>' + $obj.imagepath);
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
<!-- /.content-wrapper -->