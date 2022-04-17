<?php

            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
           
            
                $nombreprod= $_POST['nombreProd'];
                $temporada= $_POST['temporada'];
                $origen= $_POST['origen'];
                $precio= $_POST['precio'];
                $coment= $_POST['coment'];
               

                $insertarProducto = "INSERT INTO producto(descripcionProd,nroCategoria,idOrigen,precioProd,observaciones)
                                    VALUES('$nombreprod','$temporada','$origen','$precio', '$coment')";

                //Verifico que no se duplique el nombre del producto
                $verificarUsuario = mysqli_query($connection, "SELECT * FROM producto  WHERE descripcionProd= '$nombreprod' and nroCategoria='$temporada' and idOrigen= '$origen'");
                if (mysqli_num_rows($verificarUsuario)>0) 
                {
                    echo ' <script>
                    alert ("El producto ya existe");
                    </script>';
                    $Mensaje= 'El producto ya existe';
                    include 'altaproducto.php';
                    exit();
                }

                $resultado= mysqli_query($connection,$insertarProducto);


                if(!$resultado)
                {
                    $Mensaje= 'Error al ingresar producto';
                    include 'altaproducto.php';
                }
                else{

                    $Mensaje= 'Se registró el producto exitosamente';
                    include 'altaproducto.php';

                }

              mysqli_close($connection);      
