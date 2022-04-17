<?php 
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);

                

if (isset($_POST['modificar'])) //verifico que se haya presionado el botón
    {
                $email=$_POST['email'];
                $telefono=$_POST['telefono'];
              
                $puestoMercado=$_POST['razonsocial'];
                $documento=$_POST['codigo'];

              $sqlmodif=  "UPDATE persona
                            SET email = '$email', telefono = '$telefono', puestoMercado='$puestoMercado' WHERE nroDocumento = '$documento'";

 //Verifico que no se duplique el email
              

                //Verifico que no se duplique el telefono
             

                $resultadomod= mysqli_query($connection,$sqlmodif);

                if($documento == "Documento") // Verifico que si no trae datos el campo me diga que debe usar el combobox
{
                    $Mensajemod= 'Debe seleccionar datos de producto ';
                    include 'modifcliente.php';
                    exit();
                }
                else
                {
                     $Mensajemod= "Se realizaron las modificaciones";
                    include 'modifcliente.php';
                    exit();
                }
            }
       
        

                
       

            mysqli_close($connection);      

        ?>