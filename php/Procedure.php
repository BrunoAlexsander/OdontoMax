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
        if ($description == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            $crud = new Crud();
            $crud->insertDB("procedures", "?, ?", array($procedure_id, $description));
            if (!$crud) {
                $response['msg'] = 1; // Date, hour and dentist unavailable
            } else {
                $response['msg'] = 2; // Success consultations inserted
            }
        }
    } elseif ($action == "1") {
        // Update
    } elseif ($action == "2") {
        // Delete
        if ($procedure_id == "" || $procedure_id == 0) {
            $response['msg'] = 0; // Don't have a consultation id
        } else {
            $crud = new Crud();
            $crud->deleteDB("procedures", "id = ?", array($procedure_id));
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