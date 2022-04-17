<?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
        
        
        
         if (isset($_POST['modificar'])) //verifico que se haya presionado el botón
                {


$buscid= $_POST['codigo'];
$precionuevo= $_POST['precionuevo'];


$sqlmod = "UPDATE producto
            SET precioProd='$precionuevo'
            WHERE idProducto='$buscid'";
if($precionuevo == '0,00')
    {
         $Mensajemod= "Debe ingresar nuevo precio";
                    include 'modifproducto.php';
                    exit();
    }
    else
    {
$resultadomod= mysqli_query($connection,$sqlmod);
}


if($buscid == 'Código producto:') // Verifico que si no trae datos el campo me diga que debe usar el combobox
{
                    $Mensajemod= 'Debe seleccionar datos de producto ';
                    include 'modifproducto.php';
                    exit();
                }
                else
                {
                     $Mensajemod= "Se modificó exitosamente el producto";
                    include 'modifproducto.php';
                    exit();
                }
       
        }

    
            mysqli_close($connection); 