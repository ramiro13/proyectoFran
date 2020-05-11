<?php
session_start();
require_once '../../config/parameters.php';
require_once base_url . 'autoload.php';
require_once base_url . 'config/db.php';
require_once base_url . 'helpers/utils.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url ?>vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" <?= !isset($_SESSION['identity']) ? "class='bg-gradient-primary'" : ""; ?>>

	<div class="container">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
					<div class="col-lg-7">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
							</div>
							<form class="user" action="<?= base_url ?>usuario/save" method="post">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" id="nombre" name="nombre" placeholder="Nombres" required value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="apellidos" name="apellidos" placeholder="Apellidos" required>
									</div>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Correo Eletrónico" required>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="repeatPassword" name="repeatPassword" placeholder="Repita Password" required>
									</div>
								</div>
								<?php

								if (session_status() !== PHP_SESSION_ACTIVE) session_start();

								require_once '../../config/parameters.php';
								require_once '../../helpers/utils.php';
								?>
								<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
									<strong class="alert_green">Registro completado correctamente</strong>
								<?php elseif (isset($_SESSION['register'])) : ?>
									<strong class="alert_red">Registro fallido, introduce bien los datos, <?= $_SESSION['register'] ?></strong>
								<?php endif; ?>
								<?php Utils::deleteSession('register'); ?>

								<input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" />
								</a>
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="login">Already have an account? Login!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url ?>vendor/components/jquery/jquery.min.js"></script>
	<script src="<?= base_url ?>assets/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url ?>assets/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url ?>assets/js/sb-admin-2.min.js"></script>
</body>

</html>