<?php

 
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
        
        if (isset($_POST['buscar'])) //verifico que se haya presionado el botón
    {
          if(isset($_POST['doc'])){
            $docucliente= $_POST['doc'];
          
          $verificarcliente= mysqli_query($connection, "SELECT * FROM persona  WHERE nroDocumento= '$docucliente'");
         

                if (mysqli_num_rows($verificarcliente)>0) 
                {
                    
                    $Mensaje1= 'Se detecto el cliente en la base de datos';

                    include 'modifcliente.php';
                    exit();

                 }
                else
                {
                    $Mensaje1= 'No se detecto el cliente en la base de datos';
                    include 'modifcliente.php';
                    exit();
                }
            }
          }


//Modificación de registros en la tabla
mysqli_close($connection);  ?>

                


                  
                

     