 <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
   <?php require_once 'secciones/encabezado.php';
   ?>
   


        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Crear Nuevo Cliente</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="indexadm.php">Inicio</a></li>
              <li class="breadcrumb-item">Clientes</li>
              <li class="breadcrumb-item active" aria-current="page">Alta Clientes</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Ingreso datos del nuevo cliente -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Datos personales</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="registrar.php" >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="nombre" aria-describedby="" name="nombre" required>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Apellido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="apellido" required>
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
 
                      <select class="form-control" id="tipodoc" placeholder= "Tipo Documento" name="tipodoc">
                        <option> DNI</option>
                        <option>Libreta Cívica</option>
                        <option>Pasaporte</option>
                     </select>
     
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="documento" name="documento" required>
                  </div>
                  <br>
                    <div class="form-group">
                        <h6 class="m-0 font-weight-bold text-primary">Datos Contacto</h6>
                        <br>
                      <div class="form-group">
                      <label for="validationServer01">Correo Electrónico</label>
                      <input type="email" class="form-control is-valid" id="email" name="email" 
                        placeholder="email@ejemplo.com" value="" required>
                     
                      <br>
                      <div class="form-group">
                      <label for="validationServer01">Teléfono</label>
                      <input type="text" class="form-control is-valid" id="telefono" name="telefono" 
                        placeholder="351323084563"  required>
                      <div class="valid-feedback">
                        Ingrese sin 0 ni 15
                      </div>
                   
                    </div>
                   
                </div>
              </div>
             
                </div>
              </div>
            </div>
            
           <div class="col-lg-6">
              <!-- General Element -->

              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Asignar Cliente a Puesto Mercado</h6>
                </div>
                <div class="card-body">
                                
                  
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Provincia</label>
                      <?php require_once 'db.php'; ?> 
                      <select class="form-control" id="lista1" name="lista1">

                        
        <?php
            require_once "conexionbd.php";
          $query = $connection -> query ("SELECT * FROM provincia");
         
          while ($valoresloc = mysqli_fetch_array($query)) {?>
            <option  value=" <?php echo $valoresloc ['idProv'];?> " > <?php echo $valoresloc['nombreProv'];


             ?></option>
          <?php 
          }
           
                   
        ?>
      </select>
                    </div>
                      <label for="exampleFormControlSelect1">Localidad</label>
                      
                      <select class="form-control" id="local" name="local">

                        
        <?php
            
            if (isset($_POST['lista1']))
            {
              require_once "conexionbd.php";
             $provincia=$_POST ['lista1'];
             $valor=$provincia;
          $query = $connection -> query ("SELECT * FROM localidad where idProv= '$provincia' ");
         
          while ($valoresprov = mysqli_fetch_array($query)) {?>
            <option  value=" <?php echo $valoresprov ['idLocalidad'];?> " > <?php echo $valoresprov['nombreLocalidad'];


             ?></option>
          <?php 
          }}
           
                   
        ?>
      </select>

                     <div class="form-group">
                      <label for="exampleFormControlSelect1">Razón Social</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="razonsocial" id="razonsocial">
                        <option value="0"></option>
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
                     <div class="form-group">
                      <label for="exampleFormControlTextarea1">Observaciones</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observaciones"></textarea>
                      <br>
                      <br>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="crear" >Crear Cliente</button>
                    
                    
                    <?php // Mensaje sobre el registro (éxito o fracaso)- Ver registrar.php
 
                      if(isset($Mensaje))
                      {
                        echo $Mensaje;
                        
                    
                      }
                   ?>
        
                    </div>
                    </div>
                  </form>
                </div>
              </div>

          <?php require_once 'secciones/modallogout.php'; ?>
          <?php require_once 'secciones/footer.php'; ?>

        
        <!---Container Fluid-->
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

