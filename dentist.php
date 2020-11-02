<?php
session_start();
define("PAGE_NAME", "Dentista");
include("php/Functions.php");
logged();
include("includes/header.php");
include("php/Crud.php");

$dentist_id = $_GET['id'];

$crud = new Crud();
$res = $crud->selectDB("*", "dentists", "WHERE id = '$dentist_id'", array());

$row = $res->fetch(PDO::FETCH_ASSOC);
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dentista / <?= $row['name']; ?></h1>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Dados cadastrais</h6>
							</div>
							<div class="card-body">
                                <form method="POST" action="" name="editDentist">
                                    <div class="form-row">
                                        <input type="hidden" name="dentist_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group col-md-3">
                                            <label for="name">Nome:*</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cpf">CPF:*</label>
                                            <input type="text" class="form-control" name="cpf" value="<?php echo $row['cpf']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cro">CRO:</label>
                                            <input type="text" class="form-control" name="cro" value="<?php echo $row['cro']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="rg">RG:</label>
                                            <input type="text" class="form-control" name="rg" value="<?php echo $row['rg']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="birth">Nascimento:*</label>
                                            <input type="date" class="form-control" name="birth" value="<?php echo $row['birth']; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="genre">Gênero:*</label>
                                            <select name="genre" class="form-control">
                                                <option value="h"<?php if ($row['genre'] == "h") echo " selected"; ?>>Homem</option>
                                                <option value="m"<?php if ($row['genre'] == "m") echo " selected"; ?>>Mulher</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">E-mail:*</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cellphone">Celular:*</label>
                                            <input type="text" class="form-control" name="cellphone" value="<?php echo $row['cellphone']; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="telephone">Telefone:</label>
                                            <input type="text" class="form-control" name="telephone" value="<?php echo $row['telephone']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="address">Endereço:*</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="number">Número:*</label>
                                            <input type="text" class="form-control" name="number" value="<?php echo $row['number']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="complement">Complemento:</label>
                                            <input type="text" class="form-control" name="complement" value="<?php echo $row['complement']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="district">Bairro:*</label>
                                            <input type="text" class="form-control" name="district" value="<?php echo $row['district']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="city">Cidade:*</label>
                                            <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="state">Estado:*</label>
                                            <select name="state" class="form-control">
                                                <option value="sp" <?php if ($row['state'] == "sp") echo "selected"; ?>>São Paulo</option>
                                                <option value="rj" <?php if ($row['state'] == "rj") echo "selected"; ?>>Rio de Janeiro</option>
                                                <option value="bh" <?php if ($row['state'] == "bh") echo "selected"; ?>>Bahia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cep">CEP:*</label>
                                            <input type="text" class="form-control" name="cep" value="<?php echo $row['cep']; ?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a href="dentists.php"><button type="button" class="btn btn-success">Voltar</button></a>
                                </form>
							</div>
						</div>
					</div>
				</div>
<?php include("includes/footer.php"); ?>