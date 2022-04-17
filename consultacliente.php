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
   <?php require_once 'secciones/encabezado.php';  ?>
   
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Consulta Clientes</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="indexadm.html">Inicio</a></li>
              <li class="breadcrumb-item">Clientes</li>
              <li class="breadcrumb-item active" aria-current="page">Consulta Clientes</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Puesto</th>
                        <th>Nro Doc</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                     <tfoot>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Puesto</th>
                        <th>Nro Doc</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                      </tr>
                    </tfoot>
                   
                    <tbody>
<?php 
require_once "conexionbd.php";

foreach ($connection  ->query('SELECT * from persona') as $row)
  { ?> 
<tr>
  <td><?php echo $row['nombrePersona']; ?></td>
    <td><?php echo $row['apellidoPersona']; ?></td>
    <td><?php echo $row['puestoMercado'] ; ?></td>
     <td><?php echo $row['nroDocumento']; ?></td>
      <td><?php echo $row['telefono'] ; ?></td>
      <td><?php echo $row['email']; ?></td>
 </tr>
<?php
  }
?>

        
                      <br>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          <!--Row-->

          
         <?php require_once 'secciones/modallogout.php'; ?>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <?php require_once 'secciones/footer.php'; ?>
      <!-- Footer -->
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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
 
 <script>
    $(document).ready(function () {
    
      $('#dataTable').DataTable({ "language": {

            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

        }});
        $('#dataTableHover').DataTable();
      
} ); 


    
  </script>


</body>

</html>