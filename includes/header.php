<?php
include("php/Config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?= SITE_NAME ?> - <?= PAGE_NAME ?></title>
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="css/sb-admin-2.min.css" rel="stylesheet">
		<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<div id="wrapper">
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-tooth"></i>
					</div>
					<div class="sidebar-brand-text mx-3">OdontoMax <sup>3</sup></div>
				</a>
				<hr class="sidebar-divider my-0">
				<li class="nav-item<?php if (strpos(PAGE_NAME, "ashboar")) echo " active"; ?>">
					<a class="nav-link" href="dashboard.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
				</li>
				<hr class="sidebar-divider">
				<div class="sidebar-heading">
					Páginas
				</div>
				<li class="nav-item<?php if (strpos(PAGE_NAME, "onsulta")) echo " active"; ?>">
					<a class="nav-link" href="consultations.php">
					<i class="fas fa-calendar-alt"></i>
					<span>Consultas</span></a>
				</li>
				<li class="nav-item<?php if (strpos(PAGE_NAME, "aciente")) echo " active"; ?>">
					<a class="nav-link" href="patients.php">
					<i class="fas fa-user-injured"></i>
					<span>Pacientes</span></a>
				</li>
				<li class="nav-item<?php if (strpos(PAGE_NAME, "entist")) echo " active"; ?>">
					<a class="nav-link" href="dentists.php">
					<i class="fas fa-user-md"></i>
					<span>Dentistas</span></a>
				</li>
				<hr class="sidebar-divider">
				<div class="sidebar-heading">
					Ferramentas
				</div>
				<li class="nav-item<?php if (strpos(PAGE_NAME, "rocediment")) echo " active"; ?>">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Opções</span>
					</a>
					<div id="collapseTwo" class="collapse<?php if (strpos(PAGE_NAME, "rocediment")) echo " show"; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Opções gerais:</h6>
							<a class="collapse-item<?php if (strpos(PAGE_NAME, "rocediment")) echo " active"; ?>" href="procedures.php">Procedimentos</a>
						</div>
					</div>
				</li>
				<hr class="sidebar-divider d-none d-md-block">
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul>
			<div id="content-wrapper" class="d-flex flex-column">
				<div id="content">
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
						</button>
						<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown no-arrow d-sm-none">
								<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</li>
							<div class="topbar-divider d-none d-sm-block"></div>
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
								<img class="img-profile rounded-circle" src="https://i.imgur.com/4l8GDxx.jpg">
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
								</div>
							</li>
						</ul>
					</nav>