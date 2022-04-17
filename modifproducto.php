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
   <?php require_once 'secciones/encabezado.php'; //traigo el encabezado de la pagina
   ?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modificación productos</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="indexadm.php">Inicio</a></li>
              <li class="breadcrumb-item">Productos</li>
              <li class="breadcrumb-item active" aria-current="page">Modificación producto</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buscar Producto</h6>
                </div>
                <div class="card-body">
                  <form method="POST" >
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nombre producto</label>
                      <select class="form-control mb-3" name="prod" id="prod">
                        <option  value="0" ></option>
                         <?php //muestro los productos existentes
            require_once "conexionbd.php";
          $query = $connection -> query ("SELECT * FROM producto");
          while ($valoresprov = mysqli_fetch_array($query)) {?>
            <option  value=" <?php echo $valoresprov ['idProducto'];?> " > <?php echo $valoresprov['descripcionProd'];

             ?></option>
          <?php 
          }
           
                   
        ?>
                   
                  </select>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Temporada</label>
                      <select class="form-control mb-3" name="cat" id="cat">
                        <option  value="0" ></option>
                    <?php //muestro las temporadas existentes
            require_once "conexionbd.php";
          $query = $connection -> query ("SELECT * FROM categoria");
          while ($valoresprov = mysqli_fetch_array($query)) {?>
            <option  value=" <?php echo $valoresprov ['nroCategoria'];?> " > <?php echo $valoresprov['descrCategoria'];

             ?></option>
          <?php 
          }          
        ?>
                  </select>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                       <label for="exampleInputPassword1">Origen</label>
                      <select class="form-control mb-3" name="origen" id="origen">
                        <option  value="0" ></option>
                             <?php //muestro los origenes existentes
            require_once "conexionbd.php";
          $query = $connection -> query ("SELECT * FROM origen");
          while ($valoresprov = mysqli_fetch_array($query)) {?>
            <option  value=" <?php echo $valoresprov ['idOrigen'];?> " > <?php echo $valoresprov['descrOrigen'];

             ?></option>
          <?php 
          }            
        ?>
                  </select>
                      </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br><br>
                    
 <button type="submit" class="btn btn-primary" name="buscar" id="buscar" formaction="buscarprod.php" >Buscar Producto</button>
               <?php // Mensaje sobre resultado busqueda (éxito o fracaso)- Ver buscarprod.php
 
                      if(isset($Mensaje1))
                      {
                        echo $Mensaje1;

                      }
                   ?>    </div>

                </div>
              </div>
              
               <div class="col-lg-6">
                  <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Datos del Producto seleccionado </h6> 
                </div>
                
                <div class="card-body">
     
      
                    <div class="form-group">
 <?php  
       

        if ($_SERVER['REQUEST_METHOD'] === 'POST') // consulto al método post del formulario
{

if (isset($_POST['buscar'])) //verifico que se haya presionado el botón

  
          require_once ("conexionbd.php");
          $prod= $_POST['prod'];
          $cat=$_POST['cat'];
          $origen=$_POST['origen'];
          $buscprod=$prod;
          $busccat=$cat;
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

        if (mysqli_num_rows($verificarprod)>0) // pregunto si encontró el registro en la tabla
        {
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
     
    { ?>
                      
                      <input class="form-control" type="text" placeholder="Nombre producto:  <?php  echo $row['descripcionProd']; ?>"
                        id="exampleFormControlReadonly" readonly>
                    </div>
                    <div class="form-group">
                    <input class="form-control" type="text" name="codigo" id="codigo" value="<?php  echo $row['idProducto']; ?>"   placeholder="Código producto:  <?php  echo $row['idProducto']; ?>"
                        id="exampleFormControlReadonly" onclick="submitForm('modprod.php')" readonly>
                    </div>
                    <div class="form-group">
                     
                      <input class="form-control" type="text" placeholder="Precio actual: $ <?php  echo $row['precioProd']; ?>"
                        id="exampleFormControlReadonly" readonly>
                    </div>

                <?php  }}
          else{

             require_once "codigohtml2.php"; //traigo maquetado inicial

          }} // Mostramos los datos vacios hasta que se preione el botón
          else { 

              require_once "codigohtml2.php"; //traigo maquetado inicial
                }?>

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Modificar precio del producto</h6> 
                  <br>
                </div>
                    <label for="exampleInputEmail1">Ingrese nuevo precio de lista</label>
                     <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precionuevo" id="precionuevo" value="0,00" pattern="^[0-9]+(.[0-9]+)?$" onclick="submitForm('modprod.php')" >
                    <div class="input-group-append">
                      
                    </div>

                  </div>
                  <small id="emailHelp" class="form-text text-muted">Ingrese con formato número decimal con punto (Ej: 1800.50)</small>
                  <br>

                    <button type="submit" class="btn btn-primary" name="modificar" id="modificar" formaction="modprod.php" >Guardar cambio</button>
                <?php // Mensaje sobre modificación (éxito o fracaso)- Ver modprod.php
 
                      if(isset($Mensajemod))
                      {
                        echo $Mensajemod;

                      }
                   ?>
     
                </div>
               
              
           </div>
                    </div>
                  </form>
                </div>
              </div>
            

         
          <?php require_once 'secciones/modallogout.php'; ?>
          <?php require_once 'secciones/footer.php'; ?>
      <!-- Footer -->
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
  
  <script>
    function submitForm(action)
    {
        document.getElementById('columnarForm').action = action;
        document.getElementById('columnarForm').submit();
    }
</script>

</body>

</html>