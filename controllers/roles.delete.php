<?php
include_once "../models/rol.php";

$id = $_POST['id'];
$rolM = new \modelo\Roles;
$rolM->setId($id);
$response = $rolM->delete();

echo json_encode($response);
unset($rolM);
unset($response);