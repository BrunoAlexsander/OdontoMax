<?php
session_start();
define("PAGE_NAME", "Novo dentista");
include("php/Functions.php");
logged();
include("includes/header.php");
?>

                    <div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dentistas / Novo dentista</h1>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Dados cadastrais</h6>
							</div>
							<div class="card-body">
                                <form method="POST" action="" name="newDentist">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="name">Nome:*</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cpf">CPF:*</label>
                                            <input type="text" class="form-control" name="cpf">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cro">CRO:</label>
                                            <input type="text" class="form-control" name="cro">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="rg">RG:</label>
                                            <input type="text" class="form-control" name="rg">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="birth">Nascimento:*</label>
                                            <input type="date" class="form-control" name="birth">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="genre">Gênero:*</label>
                                            <select name="genre" class="form-control">
                                                <option value="h" selected>Homem</option>
                                                <option value="m">Mulher</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">E-mail:*</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cellphone">Celular:*</label>
                                            <input type="text" class="form-control" name="cellphone">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="telephone">Telefone:</label>
                                            <input type="text" class="form-control" name="telephone">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="address">Endereço:*</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="number">Número:*</label>
                                            <input type="text" class="form-control" name="number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="complement">Complemento:</label>
                                            <input type="text" class="form-control" name="complement">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="district">Bairro:*</label>
                                            <input type="text" class="form-control" name="district">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="city">Cidade:*</label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="state">Estado:*</label>
                                            <select name="state" class="form-control">
                                                <option value="sp" selected>São Paulo</option>
                                                <option value="rj">Rio de Janeiro</option>
                                                <option value="bh">Bahia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="cep">CEP:*</label>
                                            <input type="text" class="form-control" name="cep">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Novo dentista</button>
                                    <a href="dentists.php"><button type="button" class="btn btn-success">Voltar</button></a>
                                </form>
							</div>
						</div>
					</div>
				</div>
<?php include("includes/footer.php"); ?>