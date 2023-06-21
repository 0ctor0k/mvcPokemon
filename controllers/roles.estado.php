<?php
include_once "../models/rol.php";

$id = $_POST["id"];
$estado = $_POST["estado"];
    if($estado =='A'){
        $estado = 'I';
    } else {
        $estado = 'A';
    }
$rolM = new \modelo\Roles();
$rolM->setId($id);
$rolM->setEstado($estado);
$response = $rolM->estado();
echo json_encode($response);
unset($rolM);
unset($response);

