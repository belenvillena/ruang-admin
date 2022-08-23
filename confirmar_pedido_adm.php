<?php

session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
   header('Location: logout1.php');
    exit;
}


?>