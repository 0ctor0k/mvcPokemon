<?php
include_once "../models/producto.php";

$nombrePro = $_POST["txtNombre"];
$precioPro = $_POST["txtPrecio"];
$contidadPro = $_POST["txtCantidad"];
$descripPro = $_POST["txtDescripcion"];
$id = $_POST["id"];

$rolM = new \modelo\Productos();
$rolM->setId($id);
$rolM->setNombreProducto($nombrePro);
$rolM->setPrecioProducto($precioPro);
$rolM->setCantidadProducto($contidadPro);
$rolM->setDescripcionProducto($descripPro);


$response=$rolM->update();
echo json_encode($response);

unset($rolM);
unset($response);