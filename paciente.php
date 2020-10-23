<?php
require "php/func.php";
require "php/conn.php";

if (!isset($_GET['id'])) {
    header("Location: pacientes.php");
} else if ($_GET['id'] == "") {
    header("Location: pacientes.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM PACIENTE WHERE CODIGO_PACIENTE = ('$id')";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
}

if (isset($_POST['alterarPaciente'])) {
    $nome = $_POST['inputNomePaciente'];
    $cpf = $_POST['inputCPFPaciente'];
    $cro = $_POST['inputCROPaciente'];
    $rg = $_POST['inputRGPaciente'];
    $nascimento = $_POST['inputNascimentoPaciente'];
    $genero = $_POST['inputGeneroPaciente'];
    $email = $_POST['inputEmailPaciente'];
    $celular = $_POST['inputCelularPaciente'];
    $telefone = $_POST['inputTelefonePaciente'];
    $endereco = $_POST['inputEnderecoPaciente'];
    $numero = $_POST['inputNumeroPaciente'];
    $complemento = $_POST['inputComplementoPaciente'];
    $bairro = $_POST['inputBairroPaciente'];
    $cidade = $_POST['inputCidadePaciente'];
    $estado = $_POST['inputEstadoPaciente'];
    $cep = $_POST['inputCEPPaciente'];

    $sql = "UPDATE PACIENTE SET NOME_PACIENTE = ('$nome'), CPF = ('$cpf'), RG = ('$rg'), NASCIMENTO = ('$nascimento'), GENERO = ('$genero'), EMAIL = ('$email'), CELULAR = ('$celular'), TELEFONE = ('$telefone'), CEP = ('$cep'), ENDERECO = ('$endereco'), NUMERO = ('$numero'), BAIRRO = ('$bairro'), COMPLEMENTO = ('$complemento'), CIDADE = ('$cidade'), ESTADO  = ('$estado') WHERE CODIGO_PACIENTE = ('$id')";
    mysqli_query($conn, $sql);

    header("Location: paciente.php?id=$id");
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
    <title>OdontoMax - Paciente <?php echo $row['NOME_PACIENTE']; ?></title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="pacientes.php">Pacientes</a>
                </li>
                <li class="nav-item">
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
                    Nessa página, você pode visualizar e alterar determinado <a href="#" class="alert-link">paciente</a>. Sinta-se livre para fazer alterações.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Paciente : <?php echo $row['NOME_PACIENTE']; ?></h1>
                <hr>
            </div>
        </div>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNomePaciente">Nome:*</label>
                    <input type="text" class="form-control" name="inputNomePaciente" id="inputNomePaciente" value="<?php echo $row['NOME_PACIENTE']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCPFPaciente">CPF:*</label>
                    <input type="text" class="form-control" name="inputCPFPaciente" id="inputCPFPaciente" value="<?php echo $row['CPF']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputRGPaciente">RG:</label>
                    <input type="text" class="form-control" name="inputRGPaciente" id="inputRGPaciente" value="<?php echo $row['RG']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputNascimentoPaciente">Nascimento:*</label>
                    <input type="date" class="form-control" name="inputNascimentoPaciente" id="inputNascimentoPaciente" value="<?php echo $row['NASCIMENTO']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputGeneroPaciente">Gênero:*</label>
                    <select name="inputGeneroPaciente" id="inputGeneroPaciente" class="form-control">
                        <option value="H" <?php if ($row['GENERO'] == "H") echo "selected"; ?>>Homem</option>
                        <option value="M"  <?php if ($row['GENERO'] == "M") echo "selected"; ?>>Mulher</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmailPaciente">E-mail:*</label>
                    <input type="email" class="form-control" name="inputEmailPaciente" id="inputEmailPaciente" value="<?php echo $row['EMAIL']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCelularPaciente">Celular:*</label>
                    <input type="text" class="form-control" name="inputCelularPaciente" id="inputCelularPaciente" value="<?php echo $row['CELULAR']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputTelefonePaciente">Telefone:</label>
                    <input type="text" class="form-control" name="inputTelefonePaciente" id="inputTelefonePaciente" value="<?php echo $row['TELEFONE']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="inputEnderecoPaciente">Endereço:*</label>
                    <input type="text" class="form-control" name="inputEnderecoPaciente" id="inputEnderecoPaciente" value="<?php echo $row['ENDERECO']; ?>">
                </div>
                <div class="form-group col-2">
                    <label for="inputNumeroPaciente">Número:*</label>
                    <input type="text" class="form-control" name="inputNumeroPaciente" id="inputNumeroPaciente" value="<?php echo $row['NUMERO']; ?>">
                </div>
                <div class="form-group col-3">
                    <label for="inputComplementoPaciente">Complemento:</label>
                    <input type="text" class="form-control" name="inputComplementoPaciente" id="inputComplementoPaciente" value="<?php echo $row['COMPLEMENTO']; ?>">
                </div>
                <div class="form-group col-3">
                    <label for="inputBairroPaciente">Bairro:*</label>
                    <input type="text" class="form-control" name="inputBairroPaciente" id="inputBairroPaciente" value="<?php echo $row['BAIRRO']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCidadePaciente">Cidade:*</label>
                    <input type="text" class="form-control" name="inputCidadePaciente" id="inputCidadePaciente" value="<?php echo $row['CIDADE']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstadoPaciente">Estado:*</label>
                    <select name="inputEstadoPaciente" id="inputEstadoPaciente" class="form-control">
                        <option value="SP" <?php if ($row['ESTADO'] == "SP") echo "selected"; ?>>São Paulo</option>
                        <option value="RJ" <?php if ($row['ESTADO'] == "RJ") echo "selected"; ?>>Rio de Janeiro</option>
                        <option value="BH" <?php if ($row['ESTADO'] == "BH") echo "selected"; ?>>Bahia</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEPPaciente">CEP:*</label>
                    <input type="text" class="form-control" name="inputCEPPaciente" id="inputCEPPaciente" value="<?php echo $row['CEP']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="alterarPaciente" id="alterarPaciente">Alterar</button>
            <a href="pacientes.php"><button type="button" class="btn btn-success">Voltar</button></a>
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