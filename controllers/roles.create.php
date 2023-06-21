<?php
include_once "../models/rol.php";

//1 paso
$nombreRol = $_POST["txtRol"];
//2 paso
$rolM = new \modelo\Roles();
//3 paso
$rolM->setNombreRol($nombreRol);
//4 paso
$response = $rolM->create();
//5 paso
unset($rolM);
//6 paso
echo json_encode($response);
