<?php
session_start();
define("PAGE_NAME", "Nova consulta");
include("php/Functions.php");
logged();
include("includes/header.php");
include("php/Crud.php");

$crud = new Crud();
$patient = $crud->selectDB("*", "patients", "", array());
$dentist = $crud->selectDB("*", "dentists", "", array());
$procedure = $crud->selectDB("*", "procedures", "", array());
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Consultas / Nova consulta</h1>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Dados da consulta</h6>
							</div>
							<div class="card-body">
                                <form method="POST" action="" name="newConsultation">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="patient_id">Paciente:*</label>
                                            <select name="patient_id" class="form-control">
<?php while ($rpatient = $patient->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rpatient['id']; ?>"><?php echo $rpatient['name']; ?></option>
<?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dentist_id">Dentista:*</label>
                                            <select name="dentist_id" class="form-control">
<?php while ($rdentist = $dentist->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rdentist['id']; ?>"><?php echo $rdentist['name']; ?></option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="procedure_id">Procedimento:</label>
                                            <select name="procedure_id" class="form-control">
<?php while ($rprocedure = $procedure->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rprocedure['id']; ?>"><?php echo $rprocedure['description']; ?></option>
<?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="date">Data:*</label>
                                            <input type="date" class="form-control" name="date" min="<?php $date = new DateTime(); $date->modify("+1 day"); echo $date->format("Y-m-d") ?>" max="<?php $date = new DateTime(); $date->modify("+60 day"); echo $date->format("Y-m-d") ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="hour">Horário:*</label>
                                            <select name="hour" class="form-control">
                                                <option value="09:00:00">09:00</option>
                                                <option value="09:30:00">09:30</option>
                                                <option value="10:00:00">10:00</option>
                                                <option value="10:30:00">10:30</option>
                                                <option value="11:00:00">11:00</option>
                                                <option value="11:30:00">11:30</option>
                                                <option value="13:00:00">13:00</option>
                                                <option value="13:30:00">13:30</option>
                                                <option value="14:00:00">14:00</option>
                                                <option value="14:30:00">14:30</option>
                                                <option value="15:00:00">15:00</option>
                                                <option value="15:30:00">15:30</option>
                                                <option value="16:00:00">16:00</option>
                                                <option value="16:30:00">16:30</option>
                                                <option value="17:00:00">17:00</option>
                                                <option value="17:30:00">17:30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Nova consulta</button>
                                    <a href="consultations.php"><button type="button" class="btn btn-success">Voltar</button></a>
                                </form>
							</div>
						</div>
					</div>
				</div>
<?php include("includes/footer.php"); ?>