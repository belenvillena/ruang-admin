<?php
session_start ();
// conexion base de datos
include 'config/database.php';
 
// parámetros
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$user_id=$_SESSION['Usuario_idPersona'];
 
// instrucción de eliminación
$query = "DELETE FROM cart_items WHERE product_id=? AND user_id=?";
 

$stmt = $con->prepare($query);
 
// enlazamos valores
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $user_id);
 

if($stmt->execute()){
    // Redirige e indica que el producto fue removido
    header('Location: carro.php?action=removed&id=' . $id . '&name=' . $name);
}
 
// si la eliminación falla
else{
    // Redirige e indica el error
    header('Location: carro.php?action=failed&id=' . $id . '&name=' . $name);
}
?>