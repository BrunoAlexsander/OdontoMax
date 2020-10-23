<?php
require "php/func.php";
require "php/conn.php";

if (isset($_POST['novoDentista'])) {
    $nome = $_POST['inputNomeDentista'];
    $cpf = $_POST['inputCPFDentista'];
    $cro = $_POST['inputCRODentista'];
    $rg = $_POST['inputRGDentista'];
    $nascimento = $_POST['inputNascimentoDentista'];
    $genero = $_POST['inputGeneroDentista'];
    $email = $_POST['inputEmailDentista'];
    $celular = $_POST['inputCelularDentista'];
    $telefone = $_POST['inputTelefoneDentista'];
    $endereco = $_POST['inputEnderecoDentista'];
    $numero = $_POST['inputNumeroDentista'];
    $complemento = $_POST['inputComplementoDentista'];
    $bairro = $_POST['inputBairroDentista'];
    $cidade = $_POST['inputCidadeDentista'];
    $estado = $_POST['inputEstadoDentista'];
    $cep = $_POST['inputCEPDentista'];

    $sql = "INSERT INTO DENTISTA (NOME_DENTISTA, CPF, RG, CRO, NASCIMENTO, GENERO, EMAIL, CELULAR, TELEFONE, CEP, ENDERECO, NUMERO, BAIRRO, COMPLEMENTO, CIDADE, ESTADO) VALUES ('$nome', '$cpf', '$rg', '$cro', '$nascimento', '$genero', '$email', '$celular', '$telefone', '$cep', '$endereco', '$numero', '$bairro', '$complemento', '$cidade', '$estado')";
    mysqli_query($conn, $sql);

    header("Location: dentistas.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/7e4be4c189.js"></script>
    <title>OdontoMax - Novo dentista</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">OdontoMax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php">Agenda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pacientes.php">Pacientes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="dentistas.php">Dentistas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="procedimentos.php">Procedimentos</a>
                        <a class="dropdown-item" href="anamnase.php">Anamnese</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="configuracoes.php">Configurações</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col pt-3">
                <div class="alert alert-primary" role="alert">
                    Nessa página, você pode cadastrar um novo <a href="#" class="alert-link">dentista</a> credenciado. Sinta-se livre para adicionar novos dentistas.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Novo Dentista</h1>
                <hr>
            </div>
        </div>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNomeDentista">Nome:*</label>
                    <input type="text" class="form-control" name="inputNomeDentista" id="inputNomeDentista">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCPFDentista">CPF:*</label>
                    <input type="text" class="form-control" name="inputCPFDentista" id="inputCPFDentista">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCRODentista">CRO:</label>
                    <input type="text" class="form-control" name="inputCRODentista" id="inputCRODentista">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRGDentista">RG:</label>
                    <input type="text" class="form-control" name="inputRGDentista" id="inputRGDentista">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputNascimentoDentista">Nascimento:*</label>
                    <input type="date" class="form-control" name="inputNascimentoDentista" id="inputNascimentoDentista">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputGeneroDentista">Gênero:*</label>
                    <select name="inputGeneroDentista" id="inputGeneroDentista" class="form-control">
                        <option value="H" selected>Homem</option>
                        <option value="M">Mulher</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmailDentista">E-mail:*</label>
                    <input type="email" class="form-control" name="inputEmailDentista" id="inputEmailDentista">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCelularDentista">Celular:*</label>
                    <input type="text" class="form-control" name="inputCelularDentista" id="inputCelularDentista">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputTelefoneDentista">Telefone:</label>
                    <input type="text" class="form-control" name="inputTelefoneDentista" id="inputTelefoneDentista">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="inputEnderecoDentista">Endereço:*</label>
                    <input type="text" class="form-control" name="inputEnderecoDentista" id="inputEnderecoDentista">
                </div>
                <div class="form-group col-2">
                    <label for="inputNumeroDentista">Número:*</label>
                    <input type="text" class="form-control" name="inputNumeroDentista" id="inputNumeroDentista">
                </div>
                <div class="form-group col-3">
                    <label for="inputComplementoDentista">Complemento:</label>
                    <input type="text" class="form-control" name="inputComplementoDentista" id="inputComplementoDentista">
                </div>
                <div class="form-group col-3">
                    <label for="inputBairroDentista">Bairro:*</label>
                    <input type="text" class="form-control" name="inputBairroDentista" id="inputBairroDentista">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCidadeDentista">Cidade:*</label>
                    <input type="text" class="form-control" name="inputCidadeDentista" id="inputCidadeDentista">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstadoDentista">Estado:*</label>
                    <select name="inputEstadoDentista" id="inputEstadoDentista" class="form-control">
                        <option value="SP" selected>São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="BH">Bahia</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEPDentista">CEP:*</label>
                    <input type="text" class="form-control" name="inputCEPDentista" id="inputCEPDentista">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="novoDentista" id="novoDentista">Cadastrar</button>
            <a href="dentistas.php"><button type="button" class="btn btn-success">Voltar</button></a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#agenda').DataTable({
                "scrollX": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</body>

</html>