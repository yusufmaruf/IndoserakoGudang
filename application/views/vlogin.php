<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mega Surya Vibration | Log in</title>
	<link href="<?php echo base_url('assets'); ?>/dist/img/logo-square.png" rel="shortcut icon" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/custom/override.css">
	<style>
		.bg {
			animation: slide 3s ease-in-out infinite alternate;
			background-image: linear-gradient(-60deg, #d4d4d4 50%, #e2e2e2 50%);
			bottom: 0;
			left: -50%;
			opacity: .5;
			position: fixed;
			right: -50%;
			top: 0;
			z-index: -1;
		}

		.bg2 {
			animation-direction: alternate-reverse;
			animation-duration: 4s;
		}

		.bg3 {
			animation-duration: 5s;
		}

		.login-page {
			justify-content: unset;
			padding-top: 20vh;
		}

		@keyframes slide {
			0% {
				transform: translateX(-25%);
			}

			100% {
				transform: translateX(25%);
			}
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url(); ?>"><b></b> Name Application</a>
			<!-- <img src="<?= base_url('assets'); ?>/dist/img/logo-only.png" alt="" width="100" height="100"> -->
		</div>
		<!-- /.login-logo -->
		<div class="card py-4">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Masukan Username dan Password</p>

				<form method="post">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> <!-- CSRF protection untuk form -->
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" name="username" id="txt_username" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3" id="show_hide_password">
						<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fa fa-eye-slash" id="icon"></span>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-8">

						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block" name="submit" value="1">Sign In</button>
						</div>
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->



	<!-- jQuery -->
	<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Toastr -->
	<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>

	<!-- AdminLTE App -->
	<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>

	<script>
		$(document).ready(function() {
			document.getElementById("txt_username").focus();
		});
		<?php if ($this->session->flashdata('login')) { ?>
			toastr.error('<?= $this->session->flashdata('login'); ?>');
		<?php } ?>
		// </?php if ($this->session->flashdata('login') == 'no_username') { ?>
		// 	toastr.error("Username not found");
		// </?php } else if ($this->session->flashdata('login') == 'wrong_password') { ?>
		// 	toastr.error("Wrong Password");
		// </?php } else if ($this->session->flashdata('login') == 'lost_conn') { ?>
		// 	toastr.error("Lost connection to data server");
		// </?php } ?>

		$(document).ready(function() {
			$("#show_hide_password #icon").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password #icon').addClass("fa-eye-slash");
					$('#show_hide_password #icon').removeClass("fa-eye");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password #icon').removeClass("fa-eye-slash");
					$('#show_hide_password #icon').addClass("fa-eye");
				}
			});
		});
	</script>


</body>

</html>