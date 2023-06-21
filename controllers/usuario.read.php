<?php

include_once "../models/usuario.php";

$rolM = new \modelo\Usuarios();
$response = $rolM->read();
echo json_encode($response);
unset($rolM);
unset($response);