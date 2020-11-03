<?php
session_start();

include("Variables.php");
include("Crud.php");

// Instantiate the CRUD
$crud = new Crud;

// User authentication
if ($email == "" || $password == "") {
    $response['msg'] = 0; // Fill in all the fields!
} else {
    $password = md5($password);
    $result=$crud->selectDB("*", "users", "WHERE email = '$email' AND password = '$password'", array());
    $res=$crud->selectDB("COUNT(*)", "users", "WHERE email = '$email' AND password = '$password'", array());
    if ($res->fetchColumn() < 1) {
        $response['msg'] = 1; // Credentials error!
    } else {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $val) {
                $$key = stripslashes($val);
            }
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $name;
            $response['msg'] = 2; // Login successfully!!
        }
    }
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($response);