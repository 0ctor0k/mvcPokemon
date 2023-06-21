<?php
include_once "../models/rol.php";
$id = $_GET["id"];

$rolM = new \modelo\Roles();
$rolM->setId($id);
$response = $rolM->readId();
echo json_encode($response);

unset($rolM);
unset($response);