<?php
session_start();

require "php/conn.php";
require "php/func.php";

existeSessao();

if (!isset($_GET['id'])) {
    header("Location: dentistas.php");
} else if ($_GET['id'] == "") {
    header("Location: dentistas.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM DENTISTA WHERE CODIGO_DENTISTA = ('$id')";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
}

if (isset($_POST['alterarDentista'])) {
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

    $sql = "UPDATE DENTISTA SET NOME_DENTISTA = ('$nome'), CPF = ('$cpf'), RG = ('$rg'), CRO = ('$cro'), NASCIMENTO = ('$nascimento'), GENERO = ('$genero'), EMAIL = ('$email'), CELULAR = ('$celular'), TELEFONE = ('$telefone'), CEP = ('$cep'), ENDERECO = ('$endereco'), NUMERO = ('$numero'), BAIRRO = ('$bairro'), COMPLEMENTO = ('$complemento'), CIDADE = ('$cidade'), ESTADO  = ('$estado') WHERE CODIGO_DENTISTA = ('$id')";
    mysqli_query($conn, $sql);

    header("Location: dentista.php?id=$id");
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
    <title>OdontoMax - Dentista <?php echo $row['NOME_DENTISTA']; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">OdontoMax</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="deslogar.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col pt-3">
                <div class="alert alert-primary" role="alert">
                    Nessa página, você pode visualizar e alterar determinado <a href="#" class="alert-link">dentista</a>. Sinta-se livre para fazer alterações.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Dentista : <?php echo $row['NOME_DENTISTA']; ?></h1>
                <hr>
            </div>
        </div>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputNomeDentista">Nome:*</label>
                    <input type="text" class="form-control" name="inputNomeDentista" id="inputNomeDentista" value="<?php echo $row['NOME_DENTISTA']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCPFDentista">CPF:*</label>
                    <input type="text" class="form-control" name="inputCPFDentista" id="inputCPFDentista" value="<?php echo $row['CPF']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCRODentista">CRO:</label>
                    <input type="text" class="form-control" name="inputCRODentista" id="inputCRODentista" value="<?php echo $row['CRO']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRGDentista">RG:</label>
                    <input type="text" class="form-control" name="inputRGDentista" id="inputRGDentista" value="<?php echo $row['RG']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputNascimentoDentista">Nascimento:*</label>
                    <input type="date" class="form-control" name="inputNascimentoDentista" id="inputNascimentoDentista" value="<?php echo $row['NASCIMENTO']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputGeneroDentista">Gênero:*</label>
                    <select name="inputGeneroDentista" id="inputGeneroDentista" class="form-control">
                        <option value="H" <?php if ($row['GENERO'] == "H") echo "selected"; ?>>Homem</option>
                        <option value="M"  <?php if ($row['GENERO'] == "M") echo "selected"; ?>>Mulher</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmailDentista">E-mail:*</label>
                    <input type="email" class="form-control" name="inputEmailDentista" id="inputEmailDentista" value="<?php echo $row['EMAIL']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCelularDentista">Celular:*</label>
                    <input type="text" class="form-control" name="inputCelularDentista" id="inputCelularDentista" value="<?php echo $row['CELULAR']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputTelefoneDentista">Telefone:</label>
                    <input type="text" class="form-control" name="inputTelefoneDentista" id="inputTelefoneDentista" value="<?php echo $row['TELEFONE']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="inputEnderecoDentista">Endereço:*</label>
                    <input type="text" class="form-control" name="inputEnderecoDentista" id="inputEnderecoDentista" value="<?php echo $row['ENDERECO']; ?>">
                </div>
                <div class="form-group col-2">
                    <label for="inputNumeroDentista">Número:*</label>
                    <input type="text" class="form-control" name="inputNumeroDentista" id="inputNumeroDentista" value="<?php echo $row['NUMERO']; ?>">
                </div>
                <div class="form-group col-3">
                    <label for="inputComplementoDentista">Complemento:</label>
                    <input type="text" class="form-control" name="inputComplementoDentista" id="inputComplementoDentista" value="<?php echo $row['COMPLEMENTO']; ?>">
                </div>
                <div class="form-group col-3">
                    <label for="inputBairroDentista">Bairro:*</label>
                    <input type="text" class="form-control" name="inputBairroDentista" id="inputBairroDentista" value="<?php echo $row['BAIRRO']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCidadeDentista">Cidade:*</label>
                    <input type="text" class="form-control" name="inputCidadeDentista" id="inputCidadeDentista" value="<?php echo $row['CIDADE']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstadoDentista">Estado:*</label>
                    <select name="inputEstadoDentista" id="inputEstadoDentista" class="form-control">
                        <option value="SP" <?php if ($row['ESTADO'] == "SP") echo "selected"; ?>>São Paulo</option>
                        <option value="RJ" <?php if ($row['ESTADO'] == "RJ") echo "selected"; ?>>Rio de Janeiro</option>
                        <option value="BH" <?php if ($row['ESTADO'] == "BH") echo "selected"; ?>>Bahia</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEPDentista">CEP:*</label>
                    <input type="text" class="form-control" name="inputCEPDentista" id="inputCEPDentista" value="<?php echo $row['CEP']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="alterarDentista" id="alterarDentista">Alterar</button>
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