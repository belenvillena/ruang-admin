

<?php 
function DatosLogin($Vusuario, $Vpass, $vConexion){
    $Usuario=array();
    
    //consulto a la tabla de usuarios por los campos ingresados y tomados mediante POST
    $sql = "SELECT * FROM persona WHERE loguin = '$Vusuario'
    AND password ='$Vpass' ";

    $rs = mysqli_query($vConexion, $sql);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Usuario['NOMBRE'] = $data['nombrePersona'];
        $Usuario['APELLIDO'] = $data['apellidoPersona'];
        $Usuario['PUESTO'] = $data['puestoMercado'];
        $Usuario['NIVEL'] = $data['nombreDato'];
        $Usuario['ID'] = $data['idPersona'];

    }

    
   
    return $Usuario;
}

?>
   
