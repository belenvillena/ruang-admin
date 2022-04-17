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
            <h1 class="h3 mb-0 text-gray-800">Alta de Nuevos Productos</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="indexadm.php">Inicio</a></li>
              <li class="breadcrumb-item">Productos</li>
              <li class="breadcrumb-item active" aria-current="page">Alta producto</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Carga datos Producto</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="altap.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre producto</label>
                      <input type="text" class="form-control" id="nombreProd" name="nombreProd" aria-describedby="" required>
                      <small id="emailHelp" class="form-text text-muted">Nombre para mostrar al cliente en la tienda</small>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Temporada</label>
                      <select class="form-control mb-3" name="temporada" id="temporada" >
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
                     
                       <label for="exampleInputPassword1">Origen</label>
                      <select class="form-control mb-3" name="origen" id="origen" >
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
                    <br>
                    <br>
                    

                </div>
              
        
                </div>
              </div>
              
               <div class="col-lg-6">
                  <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6> </h6> <h6> </h6>
                </div>
                <div class="card-body">
     <br>
                    <label for="exampleInputEmail1">Precio de lista</label>
                     <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio" id="precio" pattern="^[0-9]+(.[0-9]+)?$">
                    <div class="input-group-append">
                      
                    </div>

                  </div>
                  <small id="emailHelp" class="form-text text-muted">Ingrese con formato número decimal (Ej: 1800,50)</small>
                  <br>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Comentarios del producto</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="coment" id="coment"></textarea>
                      <small id="emailHelp" class="form-text text-muted">No visible para el cliente</small>
                    </div>
                   <br><br>
                    
                    <button type="submit" class="btn btn-primary">Crear producto</button>
                     <?php // Mensaje sobre el registro (éxito o fracaso)- Ver registrar.php
 
                      if(isset($Mensaje))
                      {
                        echo $Mensaje;
                        
                    
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

</body>

</html>