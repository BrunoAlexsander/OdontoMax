<?php
session_start();
define("PAGE_NAME", "Procedimentos");
include("php/Functions.php");
logged();
include("includes/header.php");
include("php/Crud.php");
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Procedimentos</h1>
							<form class="form-inline" method="POST" name="newProcedure" action="">
								<div class="form-group mt-3 mt-sm-0">
									<label class="mr-sm-2">Descrição:</label>
									<input type="text" class="form-control mb-3 mb-sm-0 mr-sm-2" name="description">
									<button type="submit" class="btn btn-primary">Novo</button>
								</div>
							</form>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Todos os procedimentos</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Código</th>
												<th>Descrição</th>
												<th>Ação</th>
											</tr>
										</thead>
										<tbody>
<?php
$crud = new Crud();
$res = $crud->selectDB("*", "procedures", "", array());
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
?>
											<tr>
												<td><?= $row['id']; ?></td>
												<td><?= $row['description']; ?></td>
												<td>
													<a href="php/Procedure.php?hash=&id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm deleteProcedure">
														<i class="fas fa-trash"></i>
													</a>
												</td>
											</tr>
<?php
}
?>
										</tbody>
										<tfoot>
											<tr>
												<th>Código</th>
												<th>Descrição</th>
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