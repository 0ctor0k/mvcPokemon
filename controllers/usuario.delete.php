<?php
include_once "../models/usuario.php";

$id = $_POST['id'];
$rolM = new \modelo\Usuarios;
$rolM->setId($id);
$response = $rolM->delete();

echo json_encode($response);
unset($rolM);
unset($response);