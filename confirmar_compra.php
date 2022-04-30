<?php
session_start ();
// conexion base de datos
include 'config/database.php';
 
// parámetros

$total_pedido = isset($_GET['total_pedido']) ? $_GET['total_pedido'] : "";
$user_id=$_SESSION['Usuario_idPersona'];
$created=date('Y-m-d H:i:s');
 
// instrucción de eliminación
$query = "INSERT INTO pedidos(fecha, total, user_id, idEstado) VALUES (?, ?, ?, '1')";
 

$stmt = $con->prepare($query);
 
// enlazamos valores
$stmt->bindParam(1, $created);
$stmt->bindParam(2, $total_pedido);
$stmt->bindParam(3, $user_id);


if($stmt->execute()){

	$cargar="INSERT INTO detalle_pedido(idProd,idPedido,cantidad) SELECT a.product_id, b.id, a.quantity
				FROM cart_items a, pedidos b
					WHERE a.user_id = b.user_id
						AND a.user_id = '$user_id'";

	$insert = $con->prepare($cargar);

	

	if($insert->execute())
	{
		$del="DELETE FROM cart_items where user_id = '$user_id'";
		$borrar = $con->prepare($del);

	}
	if($borrar->execute())
	{
		header('Location: carro.php?action=confirm');
	}
}
 
// si la eliminación falla
else{
    // Redirige e indica el error
    header('Location: carro.php?action=failed&id=' . $id . '&name=' . $name);
}
?>
