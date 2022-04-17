<?php
// conexion base de datos
include 'config/database.php';
 
// parámetros
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$user_id=1;
$created=date('Y-m-d H:i:s');
 
// instrucción de inserción de items en carrito
$query = "INSERT INTO cart_items SET product_id=?, quantity=?, user_id=?, created=?";
 

$stmt = $con->prepare($query);
 
// enlazamos los valores
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $quantity);
$stmt->bindParam(3, $user_id);
$stmt->bindParam(4, $created);
 
// Si la inserción es correcta
if($stmt->execute()){
    header('Location: productos (2).php?action=added&id=' . $id . '&name=' . $name);
}
 
// Si la inserción es incorrecta
else{
     header('Location: productos (2).php?action=failed&id=' . $id . '&name=' . $name);
}
 