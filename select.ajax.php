<?php

include 'datos.php';
$id = $_POST["id"];

$estadosdb = ModeloPaises::mdlTraerDependencias($id);

foreach ($estadosdb as $key => $value) {
    echo '<option value="'.$value["idLocalidad"].'">'.$value["nombreLocalidad"].'</option>';
}



?>