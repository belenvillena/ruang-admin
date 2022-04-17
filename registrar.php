<?php

            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
           
            
                $nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
                $tipodoc= $_POST['tipodoc'];
                $documento= $_POST['documento'];
                $email= $_POST['email'];
                $telefono= $_POST['telefono'];
                $provincia=$_POST ['provincia'];
                $localidad=$_POST ['localidad'];
                $puestoMercado=$_POST ['razonsocial'];
                $observaciones= $_POST ['observaciones'];


                                     $insertarCliente = "INSERT INTO persona(nombre,nombreDato,nombrePersona,apellidoPersona, nroDocumento,telefono,email, provincia, localidad, puestoMercado,loguin, password, observaciones)
                                    VALUES('$tipodoc','Cliente','$nombre','$apellido','$documento', '$telefono','$email','$provincia','$localidad','$puestoMercado','$documento', MD5('$apellido$documento'),'$observaciones' )";
                

                //Verifico que no se duplique el docuemtno
                $verificarUsuario = mysqli_query($connection, "SELECT * FROM persona  WHERE nroDocumento= '$documento'");
                if (mysqli_num_rows($verificarUsuario)>0) 
                {
                    echo ' <script>
                    alert ("El cliente ya existe");
                    </script>';
                    $Mensaje= 'El cliente ya está registrado';
                    include 'altacliente.php';

                    exit();
                }
                //Verifico que no se duplique el email
                $verificarCorreo = mysqli_query($connection, "SELECT * FROM persona  WHERE email= '$email'");
                if (mysqli_num_rows($verificarCorreo)>0) 
                {
                    echo ' <script>
                    alert ("El correo ya existe");
                    </script>';
                    $Mensaje= 'El correo ya está registrado';
                                      
                    include 'altacliente.php';
                    exit();
                }

                //Verifico que no se duplique el telefono
                 $verificarTelefono = mysqli_query($connection, "SELECT * FROM persona  WHERE telefono= '$telefono'");
                if (mysqli_num_rows($verificarTelefono)>0) 
                {
                    echo ' <script>
                    alert ("El telefono ingresado ya existe");
                    </script>';
                    $Mensaje= 'El teléfono ya está registrado';
   
                    include 'altacliente.php';
                    exit();
                }
                
                
                $resultado= mysqli_query($connection,$insertarCliente);


                if(!$resultado)
                {
                    $Mensaje= 'Error al ingresar cliente';
                    include 'altacliente.php';
                }
                else{
                   
                    $Mensaje= 'Se registró el cliente exitosamente';
                    include 'altacliente.php';

                }

              mysqli_close($connection);      

        ?>