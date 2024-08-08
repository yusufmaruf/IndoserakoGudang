<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<style>
	p {
		line-height: 2px;
	}

	.tdtable {
		padding: 1px !important;
	}
</style>

<div class="content-wrapper">
	<div class="content-header">
	</div>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<h3 class="card-title">Memo Delivery</h3>
								<div class="ml-auto">
									<?php if ($list_memo['no_memo'] != null) { ?>
										<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNotesModal"><i class="fa fa-plus mr-2"></i> Add Notes</a>
										<a href="#" class="btn btn-warning btn-sm text-white" onclick="printDiv('print')"><i class=" fa fa-print mr-2"></i> Print</a>
									<?php }  ?>
								</div>
							</div>
						</div>
						<div class="card-body" id="print">
							<style>
								p {
									line-height: 2px;
								}

								.tdtable {
									padding: 1px !important;
								}
							</style>
							<div class="row justify-content-center align-items-center mb-1">
								<div class="col-sm-6">
									<img src="<?= base_url('assets/logo.png'); ?>" width="100%" alt="">
								</div>
								<div class="col-sm-6 text-right">
									<p><strong>Branch Surabaya</strong></p>
									<p>Jl. Yos Sudarso No. 38, Sidoarjo</p>
									<p>T: 031-8943008</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<hr style="border: 2px solid;" class="m-0 mb-3 text-primary">
								</div>
							</div>
							<div class="row justify-content-center align-items-center mb-2">
								<div class="col-sm-8">
									<h5 class="text-primary"> <strong>MEMO: A<?= $list_memo['no_memo'] ?></strong></h5>
								</div>
								<div class="col-sm-4 text-right">
									<h5 class=""> <strong>Sidoarjo, <span class="print-date"><?= date('Y-m-d') ?></span></strong></h5>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-sm-12">
									<h5><strong>To: Ci Yen</strong></h5>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="text-center" width="5%">No</th>
												<th class="">Customer</th>
												<th width="10%" class="">No. SP</th>
												<th class="">Keterangan</th>
											</tr>

										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($list_memo['detail'] as $row) : ?>

												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row['nama'] ?></td>
													<td><?= $row['nomor_sj'] ?></td>
													<td></td>
												<tr></tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h5><strong>Note : </strong></h5>
									<p> <strong><?= $list_memo['desc'] ?></strong></p>
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
<div class="modal fade" id="addNotesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Notes</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal Body -->
			<div class="modal-body">
				<form action="<?= base_url('delivery/delivery/addNote/' . $list_memo['id']) ?>" method="post">
					<div class="form-group">
						<label for="noteContent">Notes:</label>
						<textarea class="form-control" id="noteContent" name="desc" rows="4" required><?= $list_memo['desc'] ?></textarea>
					</div>
					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;

	}

	function formatDateToIndonesian(dateString) {
		const dateParts = dateString.split('-');
		// Ensure we have the right number of parts
		if (dateParts.length === 3) {
			// Create a new Date object using the parts
			const date = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]); // Months are 0-based in JavaScript
			const options = {
				day: 'numeric',
				month: 'long',
				year: 'numeric'
			};
			return date.toLocaleDateString('id-ID', options);
		} else {
			// Handle invalid date format
			return 'Invalid Date';
		}
	}
	$(document).ready(function() {
		const printDateElement = $('.print-date');
		const printDate = printDateElement.text();
		printDateElement.text(formatDateToIndonesian(printDate));

	});
</script>