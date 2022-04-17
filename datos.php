<?php
$servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "transprodriguez";
        
            $connection = new mysqli($servidor, $nombreusuario, $password, $db);

$provincia=$_POST['provincia'];


$sql="SELECT * 
        from localidad
        where idProv='$$provincia'";

    $result=mysqli_query($connection,$sql);

    $cadena="<select name= 'familia' class='form-control familia2' >";

    while ($ver=mysqli_fetch_row($result)) {
        $cadena= $cadena. '<option value="'.$value["idLocalidad"].'">'.$value["nombreLocalidad"].'</option>';;
    }

    echo  $cadena."</select>";

?>