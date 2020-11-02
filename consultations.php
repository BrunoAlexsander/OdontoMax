<?php
session_start();
define("PAGE_NAME", "Consultas");
include("php/Functions.php");
logged();
include("includes/header.php");
include("php/Crud.php");
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Consultas</h1>
                            <a href="new-consultation.php" class="btn btn-success mt-3 mt-sm-0 btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-calendar-plus"></i>
                                </span>
                                <span class="text">Nova consulta</span>
                            </a>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Todas as consultas</h6>
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
$crud = new Crud();
$loop = $crud->selectDB("c.*, d.name AS dentist_name, p.name AS patient_name, pr.description", "consultations c", "INNER JOIN dentists d ON c.dentist_id = d.id INNER JOIN patients p ON c.patient_id = p.id INNER JOIN procedures pr ON c.procedure_id = pr.id", array());
while ($row = $loop->fetch(PDO::FETCH_ASSOC)) {
?>
											<tr>
												<td><?= date('d/m/Y', strtotime($row['date'])); ?></td>
												<td><?= date('H:i', strtotime($row['hour'])); ?></td>
												<td><?= $row['patient_name']; ?></td>
												<td><?= $row['dentist_name']; ?></td>
												<td><?= $row['description']; ?></td>
												<td>
													<a href="php/Consultation.php?hash=&id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm deleteConsultation">
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