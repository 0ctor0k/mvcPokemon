<?php
include_once "../models/producto.php";

//1 paso
$nombrePro = $_POST["txtNombre"];
$precioPro = $_POST["txtPrecio"];
$contidadPro = $_POST["txtCantidad"];
$descripPro = $_POST["txtDescripcion"];
//2 paso
$rolM = new \modelo\Productos();
//3 paso
$rolM->setNombreProducto($nombrePro);
$rolM->setPrecioProducto($precioPro);
$rolM->setCantidadProducto($contidadPro);
$rolM->setDescripcionProducto($descripPro);
//4 paso
$response = $rolM->create();
//5 paso
unset($rolM);
//6 paso
echo json_encode($response);