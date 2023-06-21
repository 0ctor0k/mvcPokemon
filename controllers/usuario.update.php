<?php
include_once "../models/usuario.php";

$tipoDoc = $_POST["selTipoDoc"];
$identificacion = $_POST["txtnumDoc"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$direccion = $_POST["txtDireccion"];
$password = $_POST["txtPassword"];
$telefono = $_POST["txtTelefono"];
$genero = $_POST["selGenero"];
$idRol = $_POST["selRol"];
$id = $_POST["id"];

$rolM = new \modelo\Usuarios();

$rolM->setTipoDoc($tipoDoc);
$rolM->setIdentificacion($identificacion);
$rolM->setNombre($nombre);
$rolM->setApellido($apellido);
$rolM->setCorreo($correo);
$rolM->setDireccion($direccion);
$rolM->setTelefono($telefono);
$rolM->setGenero($genero);
$rolM->setIdRol($idRol);
$rolM->setPassword($password);
$rolM->setId($id);


$response=$rolM->update();
echo json_encode($response);

unset($rolM);
unset($response);