<?php
session_start();

require "php/conn.php";

if (isset($_POST['entrarUsuario'])) {
    $email = $_POST['inputEmailUsuario'];
    $senha = $_POST['inputSenhaUsuario'];
    if ($email == "" || $senha == "") {
        echo  "<script>alert('Informe todos os campos!');</script>";
    } else {
        $senha = md5($senha);
        $sql = "SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result < 1) {
            echo  "<script>alert('Email e senha invalidos!');</script>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                foreach ($row as $key => $val) {
                    $$key = stripslashes($val);
                }
                $_SESSION['CODIGO_USUARIO'] = $CODIGO_USUARIO;
                $_SESSION['NOME_USUARIO'] = $NOME_USUARIO;
                $_SESSION['EMAIL'] = $EMAIL;
                header("Location: dashboard.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OdontoMax - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-3">
                <h1>Entre com sua conta</h1>
                <hr>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="inputEmailUsuario">E-mail:</label>
                        <input type="text" class="form-control" name="inputEmailUsuario" id="inputEmailUsuario">
                    </div>
                    <div class="form-group">
                        <label for="inputSenhaUsuario">Senha:</label>
                        <input type="password" class="form-control" name="inputSenhaUsuario" id="inputSenhaUsuario">
                    </div>
                    <button type="submit" class="btn btn-primary" name="entrarUsuario">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>