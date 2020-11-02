<?php
session_start();
define("PAGE_NAME", "Dentistas");
include("php/Functions.php");
logged();
include("includes/header.php");
include("php/Crud.php");
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dentistas</h1>
                            <a href="new-dentist.php" class="btn btn-success mt-3 mt-sm-0 btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <span class="text">Novo dentista</span>
                            </a>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Todos os dentistas</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Nome</th>
												<th>CPF</th>
												<th>CRO</th>
												<th>Celular</th>
												<th>E-mail</th>
												<th>Ação</th>
											</tr>
										</thead>
										<tbody>
<?php
$crud = new Crud();
$res = $crud->selectDB("*", "dentists", "", array());
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
?>
											<tr>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo Mask("###.###.###-##", $row['cpf']); ?></td>
												<td><?php if (!$row['cro'] == "") echo $row['cro']; else echo "Indefinido"; ?></td>
												<td><?php echo Mask("(##) #####-####", $row['cellphone']); ?></td>
												<td><?php echo $row['email']; ?></td>
												<td>
													<a href="php/Dentist.php?hash=&id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm deleteDentist">
														<i class="fas fa-trash"></i>
													</a>
													<a href="dentist.php?id=<?= $row['id']; ?>" class="btn btn-info btn-circle btn-sm">
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
												<th>Nome</th>
												<th>CPF</th>
												<th>CRO</th>
												<th>Celular</th>
												<th>E-mail</th>
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