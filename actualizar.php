<?php
// conexion a base de datos
include 'config/database.php';
 
// Tomo parámetros
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
$quantity=intval($quantity);
$user_id=1;
 
// elimino los productos que deseo sacar del carrito
$query = "UPDATE cart_items SET quantity=? WHERE product_id=? AND user_id=?";
 

$stmt = $con->prepare($query);
 
// enlazamos los valores
$stmt->bindParam(1, $quantity);
$stmt->bindParam(2, $id);
$stmt->bindParam(3, $user_id);
 
// ejecutamos el query
if($stmt->execute()){
    // Redirige y confirmamos que se eliminó el producto.
    header('Location: carro.php?action=quantity_updated&id=' . $id . '&name=' . $name);
}
 
// si falla la eliminación
else{
    // Redirige y alerta de la falla
    header('Location: carro.php?action=failed&id=' . $id . '&name=' . $name);
}
?>