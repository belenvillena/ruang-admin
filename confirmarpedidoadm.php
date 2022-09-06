<?php

            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);

            $id=$_GET['id']; 
           
            if (isset($_POST['confirmarpedido'])) //verifico que se haya presionado el botón
    {
        

                $confirmar_pedido= "UPDATE  pedidos set idEstado= '2' where id= '$id'";

        $resultadoconfirmar= mysqli_query($connection,$confirmar_pedido);

    }
    include 'pedido_pendientes.php';
    exit();

    mysqli_close($connection);   

            ?>