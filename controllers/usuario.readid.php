<?php
include_once "../models/usuario.php";
$id = $_GET["id"];

$rolM = new \modelo\Usuarios();
$rolM->setId($id);
$response = $rolM->readId();
echo json_encode($response);

unset($rolM);
unset($response);