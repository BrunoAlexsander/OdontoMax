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
        if ($patient_id == "" || $dentist_id == "" || $procedure_id == "" || $date == "" || $hour == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            $crud = new Crud();
            $rows = $crud->selectDB("*", "consultations", "where dentist_id = '$dentist_id' AND date = '$date' AND hour = '$hour'", array());
            if ($rows->fetchColumn() > 0) {
                $response['msg'] = 1; // Data, hora e dentista indisponíveis!
            } else {
                $crud->insertDB("consultations", "?, ?, ?, ?, ?, ?", array($consultation_id, $patient_id, $dentist_id, $procedure_id, $date, $hour));
                $response['msg'] = 2; // Consulta cadastrada com sucesso!
            }
        }
    } elseif ($action == "1") {
        // Update
        if ($patient_id == "" || $dentist_id == "" || $procedure_id == "" || $date == "" || $hour == "") {
            $response['msg'] = 0; // Preencha todos os campos
        } else {
            //$consultation_id = $_POST['id_consultation'];
            $crud = new Crud();
            $rows = $crud->selectDB("*", "consultations", "where dentist_id = '$dentist_id' AND date = '$date' AND hour = '$hour'", array());
            if ($rows->fetchColumn() > 1) {
                $response['msg'] = 1; // Data, hora e dentista indisponíveis!
            } else {
                $crud->updateDB("consultations", "patient_id = ?, dentist_id = ?, procedure_id = ?, date = ?, hour = ?", "id = ?", array($patient_id, $dentist_id, $procedure_id, $date, $hour, $consultation_id));
                $response['msg'] = 2; // Consulta cadastrada com sucesso!
                $response['id'] = $consultation_id;
            }
        }
    } elseif ($action == "2") {
        // Delete
        if ($consultation_id == "" || $consultation_id == 0) {
            $response['msg'] = 0; // Don't have a consultation id
        } else {
            $crud = new Crud();
            $crud->deleteDB("consultations", "id = ?", array($consultation_id));
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