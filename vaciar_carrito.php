<?php
session_start ();
// conexion base de datos
include 'config/database.php';
 
// procedo a eliminar los productos de la tabla de carrito
 $vaciar="DELETE FROM cart_items";
 $vac = $con->prepare($vaciar);
	
	if($vac->execute())
	{
		header('Location: carro.php');
	}


// si la eliminación falla
else{
    // Redirige e indica el error
    header('Location: carro.php?action=failed&id=' . $id . '&name=' . $name);
}
?>

