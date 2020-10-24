<?php
session_start();

require "php/conn.php";
require "php/func.php";

existeSessao();

$sqlDentista = "SELECT CODIGO_DENTISTA, NOME_DENTISTA FROM DENTISTA";
$queryDentista = mysqli_query($conn, $sqlDentista);

$sqlPaciente = "SELECT CODIGO_PACIENTE, NOME_PACIENTE FROM PACIENTE";
$queryPaciente = mysqli_query($conn, $sqlPaciente);

$sqlProcedimento = "SELECT CODIGO_PROCEDIMENTO, NOME_PROCEDIMENTO FROM PROCEDIMENTO";
$queryProcedimento = mysqli_query($conn, $sqlProcedimento);

if (isset($_POST['novaConsulta'])) {
    $dentista = $_POST['inputNomeDentista'];
    $paciente = $_POST['inputNomePaciente'];
    $procedimento = $_POST['inputNomeProcedimento'];
    $data = $_POST['inputDataConsulta'];
    $inicio = $_POST['inputInicioConsulta'];
    $fim = $_POST['inputFimConsulta'];

    $sql = "INSERT INTO CONSULTA (CODIGO_DENTISTA, CODIGO_PACIENTE, CODIGO_PROCEDIMENTO, DATA_CONSULTA, HORARIO_INICIO, HORARIO_FIM) VALUES ('$dentista', '$paciente', '$procedimento', '$data', '$inicio', '$fim')";
    mysqli_query($conn, $sql);

    header("Location: agenda.php");
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
    <title>OdontoMax - Nova consulta</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">OdontoMax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="agenda.php">Agenda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
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
                    Nessa página, você pode agendar uma nova <a href="#" class="alert-link">consulta</a>. Sinta-se livre para agendar consultas.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Agendamento de Consulta</h1>
                <hr>
            </div>
        </div>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputNomePaciente">Paciente:*</label>
                    <select name="inputNomePaciente" id="inputNomePaciente" class="form-control">
                        <?php while ($paciente = mysqli_fetch_array($queryPaciente)) { ?>
                            <option value="<?php echo $paciente['CODIGO_PACIENTE']; ?>"><?php echo $paciente['NOME_PACIENTE']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputNomeDentista">Dentista:*</label>
                    <select name="inputNomeDentista" id="inputNomeDentista" class="form-control">
                        <?php while ($dentista = mysqli_fetch_array($queryDentista)) { ?>
                            <option value="<?php echo $dentista['CODIGO_DENTISTA']; ?>"><?php echo $dentista['NOME_DENTISTA']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputNomeProcedimento">Procedimento:</label>
                    <select name="inputNomeProcedimento" id="inputNomeProcedimento" class="form-control">
                        <?php while ($procedimento = mysqli_fetch_array($queryProcedimento)) { ?>
                            <option value="<?php echo $procedimento['CODIGO_PROCEDIMENTO']; ?>"><?php echo $procedimento['NOME_PROCEDIMENTO']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputDataConsulta">Data:*</label>
                    <input type="date" class="form-control" name="inputDataConsulta" id="inputDataConsulta">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputInicioConsulta">Início:*</label>
                    <select name="inputInicioConsulta" id="inputInicioConsulta" class="form-control">
                        <option valu="09:00:00">09:00</option>
                        <option valu="09:30:00">09:30</option>
                        <option valu="10:00:00">10:00</option>
                        <option valu="10:30:00">10:30</option>
                        <option valu="11:00:00">11:00</option>
                        <option valu="11:30:00">11:30</option>
                        <option valu="12:00:00">12:00</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputFimConsulta">Término:</label>
                    <select name="inputFimConsulta" id="inputFimConsulta" class="form-control">
                        <option valu="09:00:00">09:00</option>
                        <option valu="09:30:00">09:30</option>
                        <option valu="10:00:00">10:00</option>
                        <option valu="10:30:00">10:30</option>
                        <option valu="11:00:00">11:00</option>
                        <option valu="11:30:00">11:30</option>
                        <option valu="12:00:00">12:00</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="novaConsulta" id="novaConsulta">Agendar</button>
            <a href="agenda.php"><button type="button" class="btn btn-success">Voltar</button></a>
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