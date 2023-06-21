<?php
include_once "../models/rol.php";

$nombreRol = $_POST["txtRol"];
$id = $_POST["id"];

$rolM = new \modelo\Roles();
$rolM->setNombreRol($nombreRol);
$rolM->setId($id);
$response=$rolM->update();
echo json_encode($response);

unset($rolM);
unset($response);