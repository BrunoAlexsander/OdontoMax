<?php
session_start();
define("PAGE_NAME", "Dashboard");
include("php/Functions.php");
logged();
include("includes/header.php");
include_once("php/Crud.php");

$crud = new Crud();
$consultations=$crud->selectDB("COUNT(*)", "consultations", "", array());
$contoday=$crud->selectDB("COUNT(*)", "consultations", "WHERE date = CURDATE()", array());
$patients=$crud->selectDB("COUNT(*)", "patients", "", array());
$dentists=$crud->selectDB("COUNT(*)", "dentists", "", array());
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						</div>
						<div class="row">
							<div class="col">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
									  <h6 class="m-0 font-weight-bold text-primary">Bem-vindo, <?= $_SESSION['username']; ?>!</h6>
									</div>
									<div class="card-body">
									  <div class="text-center">
										<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_doctors_hwty.svg" alt="">
									  </div>
									  <p>Nesse painel será possível fazer uso do gerencimento completo de sua clínica odontológica. Desde fazer alterações em cadastros de pacientes, dentistas credenciados e até mesmo puxar o histórico de um determinado paciente. Veja toda a documentação clicando no link abaixo.</p>
									  <a target="_blank" rel="nofollow" href="https://github.com/BrunoAlexsander/OdontoMax">GitHub &rarr;</a>
									</div>
								  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consultas de Hoje</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $contoday->fetchColumn(); ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Todas as Consultas</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $consultations->fetchColumn(); ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pacientes</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $patients->fetchColumn(); ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-injured fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-warning shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dentistas</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dentists->fetchColumn(); ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-md fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Consultas de Hoje</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Data</th>
												<th>Horário</th>
												<th>Paciente</th>
												<th>Dentista</th>
												<th>Procedimento</th>
												<th>Ação</th>
											</tr>
										</thead>
										<tbody>
<?php
$loop = $crud->selectDB("c.*, d.name AS dentist_name, p.name AS patient_name, pr.description", "consultations c", "INNER JOIN dentists d ON c.dentist_id = d.id INNER JOIN patients p ON c.patient_id = p.id INNER JOIN procedures pr ON c.procedure_id = pr.id WHERE date = CURDATE()", array());
while ($row = $loop->fetch(PDO::FETCH_ASSOC)) {
?>
											<tr>
												<td><?= date('d/m/Y', strtotime($row['date'])); ?></td>
												<td><?= date('H:i', strtotime($row['hour'])); ?></td>
												<td><?= $row['patient_name']; ?></td>
												<td><?= $row['dentist_name']; ?></td>
												<td><?= $row['description']; ?></td>
												<td>
													<a href="php/Consultation.php?hash=37CBED723FAA73E496BC1C0AB5648646A2994468DBFDB905693226D1F4DB6FA9&=&id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm deleteConsultation">
														<i class="fas fa-trash"></i>
													</a>
													<a href="consultation.php?id=<?= $row['id']; ?>" class="btn btn-info btn-circle btn-sm">
														<i class="fas fa-eye"></i>
													</a>
												</td>
											</tr>
<?php
}
?>
										</tbody>
										<tfoot>
											<tr>
												<th>Data</th>
												<th>Horário</th>
												<th>Paciente</th>
												<th>Dentista</th>
												<th>Procedimento</th>
												<th>Ação</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php include("includes/footer.php"); ?>