<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?= isset($title) ? $title . ' - ' : ''; ?>Utility | PT Indoserako Sejahtera
	</title>
	<link href="<?php echo base_url('assets'); ?>/dist/img/logo-square.png" rel="shortcut icon" type="image/x-icon">

	<link href="<?= base_url('assets'); ?>/custom/loader.css" rel="stylesheet" type="text/css" />
	<script src="<?= base_url('assets'); ?>/custom/loader.js"></script>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Font Awesome -->
	<script src="<?= base_url('assets'); ?>/plugins/fontawesome-free/c90686c14b.js"></script>

	<!--
	==============================
		Local Assets
	==============================
	-->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/custom/override.css">

	<!-- jQuery -->
	<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url('assets'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>

	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
	<script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
	<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
	<script src="<?= base_url('assets'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<script src="<?= base_url('assets'); ?>/dist/js/adminlte.js"></script>

	<!-- Bootstrap Switch -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

	<!-- Important! -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/custom/override.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
	<?php include(__DIR__ . "/modal/change_password.php"); ?>
	<!-- Preloader -->
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-light shadow">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<!-- <li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Main Page</a>
				</li> -->
				<li class="nav-item d-inline-block">
					<a href="<?= base_url() . 'dashboard/index/1/2/3'; ?>" class="nav-link">Main Page</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li> -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fas fa-th-large"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a id="change_pass" class="dropdown-item" style="cursor: pointer;">
							Change Password
						</a>
						<!-- <a href="#" class="dropdown-item">
							Settings
						</a> -->
						<div class="dropdown-divider"></div>
						<a href="<?= base_url() . 'main/logout'; ?>" class="dropdown-item">
							<i class="fas fa-power-off mr-2"></i>Log out
						</a>
					</div>
				</li>

				<li class="nav-item" hidden>
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url(); ?>" class="brand-link text-center">
				<img src="<?= base_url('assets'); ?>/dist/img/logo-square.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-bold">Indoserako Utility</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets'); ?>/dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<?php if ($this->session->userdata('user') != '') { ?>
							<p class="m-0"><?= ucfirst($this->session->userdata('name')) ?></p>
							<?php $level = array(
								0 => 'Not assigned',
								//1 => 'Viewer',
								1 => 'Viewer',
								99 => 'Administrator',
								//99 => 'Administrator'
							); ?>
							<p class="text-muted text-xs m-0"><?= $level[$this->session->userdata('level')] ?></p>
						<?php } else { ?>
							<p class="m-0">Invalid User</p>
							<p class="text-muted text-xs m-0">Please log in first</p>
						<?php } ?>
					</div>
				</div>



				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<?php if (in_array($this->session->userdata('level'), [99])) { ?>
							<li class="nav-item">
								<a href="<?= base_url() . 'report' ?>" class="nav-link <?php if ($this->uri->segment('1') == 'dashboard') echo 'active'; ?>">
									<i class="nav-icon fas fa-home"></i>
									<p>Dashboard</p>
								</a>
							</li>
							<li class="nav-header">MAIN</li>

							<li class="nav-item">
								<a href="<?= base_url() . 'pbb' ?>" class="nav-link <?php if ($this->uri->segment('1') == 'pbb') echo 'active'; ?>">
									<i class="nav-icon fas fa-file-invoice"></i>
									<p>PPB</p>
								</a>
							</li>
							<li class="nav-item <?php if ($this->uri->segment('1') == 'stock') echo 'menu-open'; ?>">
								<a href="#" class="nav-link <?php if ($this->uri->segment('1') == 'stock') echo 'active'; ?>">
									<i class="nav-icon fas fa-warehouse"></i>
									<p>Penyimpanan <i class="right fas fa-angle-left"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() . 'stock/inventarisProject'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'inventarisProject') echo 'active'; ?>">
											<i class="fas fa-server  nav-icon"></i>
											<p>Barang Project</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() . 'stock/inventarisCompany'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'inventarisCompany') echo 'active'; ?>">
											<i class="fas fa-server  nav-icon"></i>
											<p>Inventaris</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() . 'stock/safetyStock'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'safetyStock') echo 'active'; ?>">
											<i class="fas fa-server  nav-icon"></i>
											<p>Stock</p>
										</a>
									</li>

								</ul>
							</li>

						<?php } ?>

						<?php if (in_array($this->session->userdata('level'), [99])) { ?>
							<li class="nav-header">Data Master</li>

							<li class="nav-item <?php if ($this->uri->segment('1') == 'master') echo 'menu-open'; ?>">
								<a href="#" class="nav-link <?php if ($this->uri->segment('1') == 'master') echo 'active'; ?>">
									<i class="nav-icon fas fa-database"></i>
									<p>Data Master <i class="right fas fa-angle-left"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() . 'master/user'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'user') echo 'active'; ?>">
											<i class="fas fa-user  nav-icon"></i>
											<p>User</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="<?= base_url() . 'master/category'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'category') echo 'active'; ?>">
											<i class="fas fa-cubes  nav-icon"></i>
											<p>Category Barang</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() . 'master/barang'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'barang') echo 'active'; ?>">
											<i class="fas fa-book  nav-icon"></i>
											<p>Barang</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() . 'master/supplier'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'supplier') echo 'active'; ?>">
											<i class="fas fa-users  nav-icon"></i>
											<p>Suppliers</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() . 'master/consumer'; ?>" class="nav-link <?php if ($this->uri->segment('2') == 'consumer') echo 'active'; ?>">
											<i class="fas fa-building  nav-icon"></i>
											<p>Consumers</p>
										</a>
									</li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<script>
			<?php if ($this->session->flashdata('password')) { ?>
				toastr.success('<?= $this->session->flashdata('password'); ?>');
			<?php unset($_SESSION['password']);
			} ?>
			$(document).ready(function() {
				$('#change_pass').click(function() {
					$('#change_pass_modal').modal();
				});
			});
		</script>