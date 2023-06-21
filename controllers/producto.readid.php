<?php
include_once "../models/producto.php";
$id = $_GET["id"];

$rolM = new \modelo\Productos();
$rolM->setId($id);
$response = $rolM->readId();
echo json_encode($response);

unset($rolM);
unset($response);