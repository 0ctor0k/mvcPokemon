<?php

include_once "../models/usuario.php";

$tipoDoc = $_POST["selTipoDoc"];
$identificacion = $_POST["txtnumDoc"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$correo = $_POST["txtCorreo"];
$password = $_POST["txtPassword"];
$direccion = $_POST["txtDireccion"];
$telefono = $_POST["txtTelefono"];
$genero = $_POST["selGenero"];
$idRol = $_POST["selRol"];

$usuarioM = new \modelo\Usuarios();

$usuarioM->setTipoDoc($tipoDoc);
$usuarioM->setIdentificacion($identificacion);
$usuarioM->setNombre($nombre);
$usuarioM->setApellido($apellido);
$usuarioM->setCorreo($correo);
$usuarioM->setPassword($password);
$usuarioM->setDireccion($direccion);
$usuarioM->setTelefono($telefono);
$usuarioM->setGenero($genero);
$usuarioM->setidRol($idRol);

$response = $usuarioM->create();

echo json_encode($response);

unset($usuarioM);