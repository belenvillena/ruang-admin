<?php
session_start();
//vacio el array y procedo a destruir la sesion para luego ubicarme de nuevo en el login
$_SESSION=array();
session_destroy();

  header('Location: l2.php');


?>