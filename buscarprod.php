<?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);
        

if(isset($_POST['prod']) && isset($_POST['cat']) && isset($_POST['origen'])) //verifico que se seleccionen combobox
{
        $prod= $_POST['prod'];
        $buscprod=$prod;

        $cat=$_POST['cat'];
        $busccat=$cat;

        $origen=$_POST['origen']; 
        $buscorigen=$origen;

        $sql = "SELECT *
        FROM producto AS p1
        INNER JOIN categoria AS p3 ON p1.nroCategoria = p3.nroCategoria
        INNER JOIN origen AS p2 ON p1.idOrigen = p2.idOrigen
        WHERE p1.idProducto = '$buscprod'
        AND p2.idOrigen = '$buscorigen'
        AND p3.nroCategoria = '$busccat'";

        $resultado = $connection->query($sql);
        $verificarprod= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificarprod)>0) //verifico si encontró en la base de datos la combinación
                {
                    $Mensaje1= 'Producto Detectado';
                    include 'modifproducto.php';
                    exit();
                 }
                else
                {
                    $Mensaje1= 'No existe la combinación seleccionada';
                    include 'modifproducto.php';
                    exit();
                }
            }

mysqli_close($connection); 
                
                
         