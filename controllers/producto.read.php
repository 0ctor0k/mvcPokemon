<?php

include_once "../models/producto.php";

$rolM = new \modelo\Productos();
$response = $rolM->read();
echo json_encode($response);
unset($rolM);
unset($response);