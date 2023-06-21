<?php
include_once "../models/usuario.php";

$id = $_POST["id"];
$estado = $_POST["estado"];
    if($estado =='A'){
        $estado = 'I';
    } else {
        $estado = 'A';
    }
$rolM = new \modelo\Usuarios();
$rolM->setId($id);
$rolM->setEstado($estado);
$response = $rolM->estado();
echo json_encode($response);
unset($rolM);
unset($response);