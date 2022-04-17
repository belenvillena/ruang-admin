<?php 
session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
    header('Location: logout1.php');
    exit;
}
require_once 'secciones/encabezado.php';

 ?>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
   <?php require_once 'secciones/encabezado.php'; 
  
           ?>
   

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Baja Modificación Clientes</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="indexadm.html">Inicio</a></li>
              <li class="breadcrumb-item">Clientes</li>
              <li class="breadcrumb-item active" aria-current="page">Baja/Modificación</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Consulta Cliente</h6>
                </div>
                <div class="card-body">
                  <form method="POST" >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ingrese documento</label>
                       <input type="text" pattern="[0-9]{1,20}" class="form-control" aria-label="emailHelp" id="doc" name="doc" >    
                        <?php // Mensaje sobre el registro (éxito o fracaso)- Ver registrar.php
 
                      if(isset($Mensaje1))
                      {
                        echo $Mensaje1;
                        
                    
                      }
                   ?>                
                  
                    <br>
                    <button type="submit" class="btn btn-primary" name="buscar" id="buscar" formaction="buscarcliente.php" >Buscar Cliente</button>
                   
                     </div>
                  
                </div>
              </div>

              <!-- Form Sizing -->
              <div class="card mb-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Datos Cliente Ingresado</h6>
                </div>
                <div class="card-body" id="lista11" name="lista11" >              
                  
             <!---Carga de datos obtenidos desde tablas para el documento ingresado-->             
     
  <?php 
       
if ($_SERVER['REQUEST_METHOD'] === 'POST') // consulto al método post del formulario
{

if (isset($_POST['buscar'])) //verifico que se haya presionado el botón
  
        require_once ("conexionbd.php");
       $docucliente= $_POST['doc'];
        $busqueda=$docucliente;     
       $sql = "SELECT * FROM persona AS p1 INNER JOIN localidad AS p3 ON p1.localidad = p3.idLocalidad INNER JOIN provincia AS p2 ON p1.provincia = p2.idProv WHERE p1.nroDocumento='$busqueda' ";
        $resultado = $connection->query($sql);
        $verificarcliente= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificarcliente)>0) // pregunto si encontró el registro en la tabla
        {
{ 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>

           
                  <div class="form-group">  
    <input class="form-control" type="text" placeholder="Nombre: <?php  echo $row['nombrePersona']; ?> "
                        id="nombre" name="nombre" readonly>

    </div>
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Apellido: <?php echo $row['apellidoPersona'];?> "
                        id="apellido" name="apellido" readonly>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Teléfono: <?php echo $row['telefono']; ?> "
                        id="telefono" name="telefono"readonly>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Email: <?php echo $row['email'];?> "
                        id="email" name="email" readonly>
                    </div>
                    <div class="form-group">
         
        
             
    <input class="form-control" id="lugar"  name="lugar" type="text" readonly placeholder=" Provincia: <?php echo $row['nombreProv'];?> 
 
                      "> 

 
                    </div>
                     <div class="form-group">
                      <input class="form-control" type="text" placeholder="Localidad: <?php echo $row['nombreLocalidad'];?>"
                        id="localidad" name="localidad" readonly>
                    </div>
                     <div class="form-group">
                      <input class="form-control" type="text" placeholder="Puesto: <?php echo $row['puestoMercado'];}
                        ?> "
                        id="puesto" name="puesto" readonly>
                    </div>
                      <br>
          <?php }}
          else{

             require_once "codigohtml1.php";

          }} // Mostramos los datos vacios hasta que se preione el botón
          else { 

              require_once "codigohtml1.php";
                }?>

          
                </div>
              </div>
             </div>
            

            <div class="col-lg-6">
              <!-- General Element -->
               <div class="card mb-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Modificar Datos</h6>
                </div>
                <div class="card-body">
     
      
                    <div class="form-group">
                
                  <label for="exampleInputEmail1" >Documento cliente</label>
                  <?php  
       

        if ($_SERVER['REQUEST_METHOD'] === 'POST') // consulto al método post del formulario
{

if (isset($_POST['buscar'])) //verifico que se haya presionado el botón

  
          require_once ("conexionbd.php");
            $docucliente= $_POST['doc'];


      $sql = "SELECT * FROM persona  WHERE nroDocumento= '$docucliente'";
        $resultado = $connection->query($sql);
        $verificarprod= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificarprod)>0) // pregunto si encontró el registro en la tabla
        {
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
     
    { ?>

    
                    <input class="form-control" type="text" name="codigo" id="codigo" value="<?php  echo $row['nroDocumento']; ?>"   placeholder="Código cliente:  <?php  echo $row['nroDocumento']; ?>"
                        id="exampleFormControlReadonly" onclick="submitForm('modificacion.php')" readonly>
                    
                  
                  <?php  }}
          else{

             echo '
                    <input class="form-control" type="text" name="codigo" id="codigo"    placeholder="Código cliente:  "
                        id="exampleFormControlReadonly"  readonly>
                    ';

          }} // Mostramos los datos vacios hasta que se preione el botón
          else { 

              echo '
                    <input class="form-control" type="text" name="codigo" id="codigo"    placeholder="Código cliente:  "
                        id="exampleFormControlReadonly"  readonly>
                    ';//traigo maquetado inicial
                }?>
                </div></div>

                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="validationServer01">Correo Electrónico</label>
                      <input type="email" class="form-control is-valid" id="email" name="email" placeholder="Modificar email"
                        
                         <?php 
       
if ($_SERVER['REQUEST_METHOD'] === 'POST') // consulto al método post del formulario
{

if (isset($_POST['buscar'])) //verifico que se haya presionado el botón
  {
        require_once ("conexionbd.php");
       $docucliente= $_POST['doc'];
        $busqueda=$docucliente;     
       $sql = "SELECT * FROM persona AS p1 INNER JOIN localidad AS p3 ON p1.localidad = p3.idLocalidad INNER JOIN provincia AS p2 ON p1.provincia = p2.idProv WHERE p1.nroDocumento='$busqueda' ";
        $resultado = $connection->query($sql);
        $verificarcliente= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificarcliente)>0) // pregunto si encontró el registro en la tabla
        {

      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?> value="<?php echo $row['email'];
  }} }}?>


                        " onclick="submitForm('modificacion.php')" >
                     
                      <br>
                      <div class="form-group">
                      <label for="validationServer01">Teléfono</label>
                      <input type="text" class="form-control is-valid" id="telefono"  name="telefono" 
                        placeholder="Modificar telefono" 
 <?php 
       
if ($_SERVER['REQUEST_METHOD'] === 'POST') // consulto al método post del formulario
{

if (isset($_POST['buscar'])) //verifico que se haya presionado el botón
  {
        require_once ("conexionbd.php");
       $docucliente= $_POST['doc'];
        $busqueda=$docucliente;     
       $sql = "SELECT * FROM persona AS p1 INNER JOIN localidad AS p3 ON p1.localidad = p3.idLocalidad INNER JOIN provincia AS p2 ON p1.provincia = p2.idProv WHERE p1.nroDocumento='$busqueda' ";
        $resultado = $connection->query($sql);
        $verificarcliente= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificarcliente)>0) // pregunto si encontró el registro en la tabla
        {

      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  value="<?php echo $row['telefono'];
  }} }}?>
                        "  onclick="submitForm('modificacion.php')"  >
                      <div class="valid-feedback">
                        Ingrese sin 0 ni 15
                      </div>
                      <br>
                      
                     </div>
                  <!---Carga de opciones de Localidad desde datos.php-->  
                     
                     <div class="form-group">
                      <label for="exampleFormControlSelect1">Razón Social</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="razonsocial" id="razonsocial">
                     <!---   <option value="0">Seleccione</option>-->  

                  <!---Carga de opciones de Puesto Mercado-->         
        <?php
          require_once "conexionbd.php";
          $query = $connection -> query ("SELECT * FROM puestomercado");
          while ($valorespuesto = mysqli_fetch_array($query)) {?>
            <option value=" <?php echo $valorespuesto['nombrePuesto'];?> " name= "puesto"> <?php echo $valorespuesto['nombrePuesto'];?></option>';
          <?php }

           ?>
                     </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="modificar" formaction="modificacion.php">Modificar Cliente</button>

                      <?php // Mensaje sobre modificación (éxito o fracaso)- Ver modprod.php
 
                      if(isset($Mensajemod))
                      {
                        echo $Mensajemod;

                      }
                   ?>
                    
                    </div>                    
                    </div>
                  </form>
                </div>
              </div>
              
           <?php require_once 'secciones/modallogout.php'; ?>
          <?php require_once 'secciones/footer.php'; ?>

     
      </div>
     
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>


     <!---Script recarga de Combobox Localidad-->  

  <script type="text/javascript">
  $(document).ready(function(){
    $('#lista1').val(1);
    recargarLista();

    $('#lista1').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"datos.php",
      data:"provincia=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>
 <script>
    function submitForm(action)
    {
        document.getElementById('columnarForm').action = action;
        document.getElementById('columnarForm').submit();
    }
</script>


</body>

</html>