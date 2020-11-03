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
            $rows = $crud->selectDB("*", "dentists", "where cpf = '$cpf'", array());
            if ($rows->fetchColumn() > 0) {
                $response['msg'] = 1; // CPF já cadastrado!
            } else {
                $crud->insertDB("dentists", "?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?", array($dentist_id, $name, $cpf, $cro, $rg, $birth, $genre, $email, $cellphone, $telephone, $cep, $address, $number, $district, $complement, $city, $state));
                $response['msg'] = 2; // Dentista cadastrado com sucesso!
            }
        }
    } elseif ($action == "1") {
        // Update
        if ($name == "" || $cpf == "" || $birth == "" || $genre == "" || $email == "" || $cellphone == "" || $cep == "" || $address == "" || $number == "" || $district == "" || $city == "" || $state == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            $crud = new Crud();
            $crud->updateDB("dentists", "name = ?, cpf = ?, cro = ?, rg = ?, birth = ?, genre = ?, email = ?, cellphone = ?, telephone = ?, cep = ?, address = ?, number = ?, district = ?, complement = ?, city = ?, state = ?", "id = ?", array($name, $cpf, $cro, $rg, $birth, $genre, $email, $cellphone, $telephone, $cep, $address, $number, $district, $complement, $city, $state, $dentist_id));
            if (!$crud) {
                $response['msg'] = 1; // CPF já cadastrado!
            } else {
                $response['msg'] = 2; // Success consultations inserted
                $response['id'] = $dentist_id;
            }
        }
    } elseif ($action == "2") {
        // Delete
        if ($dentist_id == "" || $dentist_id == 0) {
            $response['msg'] = 0; // Don't have a consultation id
        } else {
            $crud = new Crud();
            $crud->deleteDB("dentists", "id = ?", array($dentist_id));
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