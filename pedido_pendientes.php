
<?php

session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
   header('Location: logout1.php');
    exit;
}
?>


<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js\dist\jspdf.plugin.autotable.min.js"></script>
<meta charset="utf-8">

<?php 
require_once 'secciones/encabezado.php';
?>
 



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
                    <thead class="thead-light" >
                      <tr>
                        <th>N° pedido</th>
                        <th>Cliente</th>
                        <th>Fecha pedido</th>
                        <th>Monto total</th>
                        <th >Cantidad Bultos</th>
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
    <td>$ <?php echo $row['total'] ; ?></td>
    <td ><?php echo $row['cant'] ; ?></td>
     <td><span class="badge badge-danger"><?php echo $row['nombreEstado']; ?></td>
     <td><button href="#" class="btn btn-success btn-sm">
                   <i class="fas fa-check"></i>
                  </button>
                  
                 
                  <button id="GenerarMysql" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i>
</button>                   

                  
                   <button href="#" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </button> 
</td>
   
      
 </tr>
<?php
  }
?>
 <?php
 require_once "conexion1.php";
$db =  connect();
$query=$db->query("SELECT a.id, b.apellidoPersona, b.puestoMercado, c.idProd, e.descripcionProd, e.precioProd,
                     c.cantidad, (c.cantidad * e.precioProd) AS precioTotal
                  FROM pedidos a, persona b, detalle_pedido c, producto e
                  WHERE a.user_id = b.idPersona
                  AND a.id = c.idPedido
                  AND c.idProd = e.idProducto
                  AND a.id = $row[id]");
$detalles = array();
$n=0;
while($r=$query->fetch_object()){ $detalles[]=$r; $n++;}

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

<script>
$("#GenerarMysql").click(function(){
  var pdf = new jsPDF();
  pdf.text(20,20,"Pedidos generados pendientes de Confirmación de Stock");

  var columns = ["Pedido", "Apellido", "Puesto", "Codigo", "Nombre Producto",
                  "Precio unitario", "Cantidad", "Total item"];
  var data = [
    <?php foreach($detalles as $c):?>
 [ "<?php echo $c->id; ?>", "<?php echo $c->apellidoPersona; ?>", "<?php echo $c->puestoMercado; ?>"
 , "<?php echo $c->idProd; ?>", "<?php echo $c->descripcionProd; ?>", "<?php echo $c->precioProd; ?>", "<?php echo $c->cantidad; ?>", "<?php echo $c->precioTotal; ?>"],
<?php endforeach; ?>
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 25  }}
  );

  pdf.save('PedidosGenerados.pdf');

});
</script>


</body>

</html>