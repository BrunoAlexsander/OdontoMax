<?php
require "php/conn.php";

$sql = "SELECT * FROM PROCEDIMENTO";
$query = mysqli_query($conn, $sql);

if (isset($_POST['novoProcedimento'])) {
    $nomeProcedimento = $_POST['inputNomeProcedimento'];
    if ($nomeProcedimento == "") {
        echo "<script>alert('Informe o nome do procedimento!');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO PROCEDIMENTO (NOME_PROCEDIMENTO) VALUES ('$nomeProcedimento')");
        header("Location: procedimentos.php");
    }
}

if (isset($_GET['excluir'])) {
    $excluir = $_GET['excluir'];
    mysqli_query($conn, "DELETE FROM PROCEDIMENTO WHERE CODIGO_PROCEDIMENTO = ('$excluir')");
    header("Location: procedimentos.php");
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
    <title>OdontoMax - Procedimentos</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="dentistas.php">Dentistas</a>
                </li>
                <li class="nav-item active dropdown">
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
                    Nessa página, você encontrará todos os <a href="#" class="alert-link">procedimentos</a> que a clínica oferece. Sinta-se livre para adicionar novos procedimentos.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="form-inline mb-md-3 p-0" method="POST" action="">
                    <div class="form-group mr-2">
                        <label for="inputNomeProcedimento">Nome do Procedimento:</label>
                    </div>
                    <div class="form-group mr-2">
                        <input type="text" class="form-control" name="inputNomeProcedimento" id="inputNomeProcedimento">
                    </div>
                    <button type="submit" class="btn btn-primary" name="novoProcedimento" id="novoProcedimento">Salvar</button>
                </form>
            </div>
        </div>
        <table id="agenda" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Procedimento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['CODIGO_PROCEDIMENTO']; ?></td>
                        <td><?php echo $row['NOME_PROCEDIMENTO']; ?></td>
                        <td><a href="procedimentos.php?excluir=<?php echo $row['CODIGO_PROCEDIMENTO']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Procedimento</th>
                    <th>Ação</th>
                </tr>
            </tfoot>
        </table>
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