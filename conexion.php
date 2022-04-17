<?php

            //$servidor = "localhost";
            //$nombreusuario = "root";
            //$password = "";
            //$db = "transprodriguez";
        
            //$connection = new mysqli($servidor, $nombreusuario, $password, $db);
            

//estos son los datos de conexion de mi localhost
function ConexionBD($servidor = 'localhost' ,  $nombreusuario = 'root',  $password = '', $db='transprodriguez' ) {

    //procedo al intento de conexion con los parametros ingreasdos más arriba
     $connection = new mysqli($servidor, $nombreusuario, $password, $db);
    if ($connection!=false) 
        return $connection;
    else 
        die ('No se pudo establecer la conexión.');

}
?>
