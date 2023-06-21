<?php
include_once "../models/producto.php";

$id = $_POST['id'];
$rolM = new \modelo\Productos;
$rolM->setId($id);
$response = $rolM->delete();

echo json_encode($response);
unset($rolM);
unset($response);