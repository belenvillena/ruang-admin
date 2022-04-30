<?php

session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
   header('Location: logout1.php');
    exit;
}
?>



<?php include 'config/database.php';
require_once 'secciones/encabezado.php';
?>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>


        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pedidos generados pendientes de confirmación</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Inicio</a></li>
              <li class="breadcrumb-item">Ordenes</li>
              <li class="breadcrumb-item active" aria-current="page">Pedidos Generados</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>N° pedido</th>
                        <th>Cliente</th>
                        <th>Fecha pedido</th>
                        <th>Monto total</th>
                        <th>Cantidad Bultos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>N° pedido</th>
                        <th>Cliente</th>
                        <th>Fecha pedido</th>
                        <th>Monto total</th>
                        <th>Cantidad Bultos</th>
                        <th>Estado</th>
                         <th>Acciones</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                     
                     <?php 
require_once "conexionbd.php";

foreach ($connection  ->query("SELECT a.id, b.puestoMercado, a.fecha, a.total, SUM( z.cantidad ) AS cant, c.nombreEstado
FROM pedidos a, persona b, estadopedido c, detalle_pedido z
WHERE a.idEstado = c.idEstado
AND z.idPedido = a.id
AND a.user_id = b.idPersona
GROUP BY a.id") as $row)
  { ?> 
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['puestoMercado']; ?></td>
    <td><?php echo $row['fecha']; ?></td>
    <td><?php echo $row['total'] ; ?></td>
    <td><?php echo $row['cant'] ; ?></td>
     <td><?php echo $row['nombreEstado']; ?></td>
     <td><a href="#" class="btn btn-success btn-sm">
                    <i class="fas fa-check"></i>
                  </a>
                  <a href="#" class="btn btn-info btn-sm">
                    <i class="fas fa-info-circle"></i>
                  </a>
                   <a href="#" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </a> </td>
   
      
 </tr>
<?php
  }
?>
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              
            </div>
          </div>

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