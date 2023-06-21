<?php
include_once "../models/usuario.php";

$correo = $_POST["correo"];
$password = $_POST["password"];

$loginM = new \modelo\Usuarios;
$loginM->setCorreo($correo);
$loginM->setPassword($password);
$response = $loginM->login();

echo json_encode($response);

unset($loginM);
unset($response);
