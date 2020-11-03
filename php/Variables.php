<?php

/* AÇÃO */

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $action = "";
}

/* CONSULTA */ 

if (isset($_POST['consultation_id'])) {
    $consultation_id = filter_input(INPUT_POST, 'consultation_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['consultation_id'])) {
    $consultation_id = filter_input(INPUT_GET, 'consultation_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $consultation_id = 0;
}

/* USUÁRIO */

if (isset($_POST['user_id'])) {
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['user_id'])) {
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $user_id = 0;
}

/* PACIENTE */

if (isset($_POST['patient_id'])) {
    $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['patient_id'])) {
    $patient_id = filter_input(INPUT_GET, 'patient_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $patient_id = 0;
}

/* DENTISTA */

if (isset($_POST['dentist_id'])) {
    $dentist_id = filter_input(INPUT_POST, 'dentist_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['dentist_id'])) {
    $dentist_id = filter_input(INPUT_GET, 'dentist_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $dentist_id = 0;
}

/* PROCEDIMENTO */

if (isset($_POST['procedure_id'])) {
    $procedure_id = filter_input(INPUT_POST, 'procedure_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['procedure_id'])) {
    $procedure_id = filter_input(INPUT_GET, 'procedure_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $procedure_id = 0;
}

/* HISTÓRICO */

if (isset($_POST['history_id'])) {
    $history_id = filter_input(INPUT_POST, 'history_id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['history_id'])) {
    $history_id = filter_input(INPUT_GET, 'history_id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $history_id = 0;
}

/* GENERIC */

if (isset($_POST['genre'])) {
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['genre'])) {
    $genre = filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $genre = "";
}

if (isset($_POST['date'])) {
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['date'])) {
    $date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $date = "";
}

if (isset($_POST['hour'])) {
    $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['hour'])) {
    $hour = filter_input(INPUT_GET, 'hour', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $hour = "";
}

if (isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['email'])) {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $email = "";
}

if (isset($_POST['password'])) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['password'])) {
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $password = "";
}

if (isset($_POST['name'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['name'])) {
    $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $name = "";
}

if (isset($_POST['cpf'])) {
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['cpf'])) {
    $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $cpf = "";
}

if (isset($_POST['cro'])) {
    $cro = filter_input(INPUT_POST, 'cro', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['cro'])) {
    $cro = filter_input(INPUT_GET, 'cro', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $cro = "";
}

if (isset($_POST['rg'])) {
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['rg'])) {
    $rg = filter_input(INPUT_GET, 'rg', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $rg = "";
}

if (isset($_POST['birth'])) {
    $birth = filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['birth'])) {
    $birth = filter_input(INPUT_GET, 'birth', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $birth = "";
}

if (isset($_POST['cellphone'])) {
    $cellphone = filter_input(INPUT_POST, 'cellphone', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['cellphone'])) {
    $cellphone = filter_input(INPUT_GET, 'cellphone', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $cellphone = "";
}

if (isset($_POST['telephone'])) {
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['telephone'])) {
    $telephone = filter_input(INPUT_GET, 'telephone', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $telephone = "";
}

if (isset($_POST['cep'])) {
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['cep'])) {
    $cep = filter_input(INPUT_GET, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $cep = "";
}

if (isset($_POST['address'])) {
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['address'])) {
    $address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $address = "";
}

if (isset($_POST['number'])) {
    $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['number'])) {
    $number = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $number = "";
}

if (isset($_POST['district'])) {
    $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['district'])) {
    $district = filter_input(INPUT_GET, 'district', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $district = "";
}

if (isset($_POST['complement'])) {
    $complement = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['complement'])) {
    $complement = filter_input(INPUT_GET, 'complement', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $complement = "";
}

if (isset($_POST['city'])) {
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['city'])) {
    $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $city = "";
}

if (isset($_POST['state'])) {
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['state'])) {
    $state = filter_input(INPUT_GET, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $state = "";
}

if (isset($_POST['description'])) {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['description'])) {
    $description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $description = "";
}