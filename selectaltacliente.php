<?php

            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
            mysql_select_db("transprodriguez") ord die ("No se pudo seleccionar DB");

            $provincia= $_REQUEST['provincia'];

            $query= "select* from provincia";
            $res= mysqli_query ($query);