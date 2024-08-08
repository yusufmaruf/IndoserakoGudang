<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print Memo</title>
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<style>
		p {
			line-height: 2px;
		}

		tbody {
			font-family: Arial, sans-serif;
			/* Change font family */
			font-size: 14px;
			/* Change font size */
			color: black;
			font-weight: bold;
			/* Change background color */
		}

		.table-bordered-dark {
			border: 2px solid black;
			/* Border around the table */
		}

		.table thead th {
			border-bottom: 2px solid black;
		}

		.table-bordered-dark tr,
		.table-bordered-dark th,
		.table-bordered-dark td,
		.table-bordered-dark thead,
		.table-bordered-dark tbody {
			border: 2px solid black;
			/* Borders around cells */
		}

		/* Optional: Add styles for print preview */
		@media print {
			.btn-print {
				display: none;
				/* Hide the print button during printing */
			}
		}
	</style>
</head>

<body>
	<div class="container mt-4">
		<div class="row justify-content-center align-items-center mb-1">
			<div class="col-sm-8">
				<img src="<?= base_url('assets/logo.png'); ?>" width="100%" alt="">
			</div>
			<div class="col-sm-4 text-right">
				<p><strong>Branch Surabaya</strong></p>
				<p>Jl. Yos Sudarso No. 38, Sidoarjo</p>
				<p>T: 031-8943008</p>
			</div>
		</div>
		<hr style="border: 2px solid;" class="m-0 mb-3 text-primary">
		<div class="row justify-content-center align-items-center mb-4">
			<div class="col-sm-8">
				<h5 class="text-primary"> <strong>MEMO: <?= $no_memo ?></strong></h5>
			</div>
			<div class="col-sm-4 text-right">
				<h5 class=""> <strong>Sidoarjo, <?= date('d M Y',) ?></strong></h5>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-sm-12">
				<h5><strong>To: Ci Yen</strong></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered-dark">
					<thead>
						<tr>
							<th class="text-center" width="5%">No</th>
							<th class="text-center">Customer</th>
							<th width="10%" class="text-center">No. SP</th>
							<th class="text-center">Keterangan</th>
						</tr>

					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Mega Surya</td>
							<td>SP-12331</td>
							<td></td>
						</tr>
						<tr>
							<td>1</td>
							<td>Mega Surya</td>
							<td>SP-12331</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h5><strong>Note : </strong></h5>
			</div>

		</div>


	</div>

	<!-- Bootstrap JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Font Awesome (optional, for icons) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

	<!-- JavaScript for print functionality -->
	<script>
		window.onload = function() {
			window.print();
		};
	</script>
</body>

</html>