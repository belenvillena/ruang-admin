<?php
include "conexionbd.php";
$db =  connect();
$query=$db->query("select * from detalle_pedido");
$detalles = array();
$n=0;
while($r=$query->fetch_object()){ $detalles[]=$r; $n++;}
?>