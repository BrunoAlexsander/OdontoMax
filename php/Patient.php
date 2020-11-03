<?php
include("Variables.php");
include("Crud.php");

if ($action == "") {
    header("Location: ../index.php");
    exit();
} else {
    $action = $_POST['action'];
    if ($action == "0") {
        // Create
        if ($name == "" || $cpf == "" || $birth == "" || $genre == "" || $email == "" || $cellphone == "" || $cep == "" || $address == "" || $number == "" || $district == "" || $city == "" || $state == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            $crud = new Crud();
            $rows = $crud->selectDB("*", "patients", "where cpf = '$cpf'", array());
            if ($rows->fetchColumn() > 0) {
                $response['msg'] = 1; // CPF já cadastrado!
            } else {
                $crud->insertDB("patients", "?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?", array($patient_id, $name, $cpf, $rg, $birth, $genre, $email, $cellphone, $telephone, $cep, $address, $number, $district, $complement, $city, $state));
                $response['msg'] = 2; // Paciente cadastrado com sucesso!
            }
        }
    } elseif ($action == "1") {
        // Update
        if ($name == "" || $cpf == "" || $birth == "" || $genre == "" || $email == "" || $cellphone == "" || $cep == "" || $address == "" || $number == "" || $district == "" || $city == "" || $state == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            $crud = new Crud();
            $crud->updateDB("patients", "name = ?, cpf = ?, rg = ?, birth = ?, genre = ?, email = ?, cellphone = ?, telephone = ?, cep = ?, address = ?, number = ?, district = ?, complement = ?, city = ?, state = ?", "id = ?", array($name, $cpf, $rg, $birth, $genre, $email, $cellphone, $telephone, $cep, $address, $number, $district, $complement, $city, $state, $patient_id));
            if (!$crud) {
                $response['msg'] = 1; // CPF já cadastrado!
            } else {
                $response['msg'] = 2; // Paciente editado com sucesso!
                $response['id'] = $patient_id;
            }
        }
    } elseif ($action == "2") {
        // Delete
        if ($patient_id == "" || $patient_id == 0) {
            $response['msg'] = 0; // Don't have a consultation id
        } else {
            $crud = new Crud();
            $crud->deleteDB("patients", "id = ?", array($patient_id));
            if (!$crud) {
                $response['msg'] = 1; // Error data deleted
            } else {
                $response['msg'] = 2; // Success data deleted
            }
        }
    }
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($response);