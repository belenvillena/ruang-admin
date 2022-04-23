

<?php

//session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
   header('Location: logout1.php');
    exit;
}



// conexion a la base de datos
include 'config/database.php';
require_once 'secciones/encabezadotienda1.php';

// Head de la página
//$page_title="Lista de productos";
//include 'head.php';

 
// Tomo valores
$action = isset($_GET['action']) ? $_GET['action'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
$name = isset($_GET['descripcionProd']) ? $_GET['descripcionProd'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "1";
 
// Mensaje de agregado o de error al agregar
if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> ¡agregado a tu carrito!";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> No se pudo agregar a su carrito!";
    echo "</div>";
}
 
// select a la base de productos e items
$query = "SELECT p.idProducto, p.descripcionProd, p.precioProd, ci.quantity 
        FROM producto p 
            LEFT JOIN cart_items ci
                ON p.idProducto = ci.product_id 
        ORDER BY p.descripcionProd";
 
$stmt = $con->prepare( $query );
$stmt->execute();
 
// verificamos cantidad de productos que retorna el select
$num = $stmt->rowCount();
 
if($num>0){
     
    //Tabla vista 
    echo ' <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selección de productos</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="productos (2v).php">Inicio</a></li>
              <li class="breadcrumb-item">Acceso tienda</li>
              <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
          </div>
            <div class="col-lg-12">
              <div class="card mb-4">';
    echo '<div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">';
     
        // Títulos tablas
        echo ' <thead class="thead-light"><tr>';
            
            echo "<th class='textAlignLeft'>Nombre del producto</th>";
             echo "<th>Precio</th>";
           
            echo "<th style='width:5em;'>Cantidad</th>";
            echo "<th>Acciones</th>";
        echo "</tr></thead>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            //Creación de filas de tablas a partir del WHILE
            echo "<tr>";
                echo "<td>";
                
                    echo "<div class='product-id' style='display:none;'alt='product images' >{$idProducto}
                    </div>";

                    echo "<div class='product-name'><a><img src='images/product/{$idProducto}.jpg' width = '50' height = '50'>     {$descripcionProd}</a></div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($precioProd, 2, '.' , ',') . "</td>";
                if(isset($quantity)){
                    echo "<td>";
                             echo "<input type='text' name='quantity' value='{$quantity}' disabled class='form-control' />";
                    echo "</td>";
                    echo "<td>";
                        echo "<button class='btn btn-success' disabled>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Agregado!";
                        echo "</button>";
                    echo "</td>";             
                }else{
                    echo "<td>";
                             echo "<input type='number' name='quantity' value='1' class='form-control' />";
                    echo "</td>";
                    echo "<td>";
                        echo "<button class='btn btn-primary add-to-cart'>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Añadir a la cesta";
                        echo "</button>";
                    echo "</td>";
                }
            echo "</tr>";
        }
         
    echo "</table> </div>
              </div>
            </div>";

}
 
// Si no hay productos en la tabla se notifica con un mensaje
else{
    echo "No hay productos encontrados.";
}
 //pie de página

  require_once 'secciones/modallogout.php';
       
    echo '  </div>';

    
     require_once 'secciones/footer.php';
      
   echo  '</div>
  </div>';
  echo '<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>';

  
?>

  <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="libs/js/bootstrap.min.js"></script>
<script src="libs/js/holder.js"></script>
 
<script>
$(document).ready(function(){
    $('.add-to-cart').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "agregar.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
    });
     
    $('.update-quantity').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "actualizar.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
    });
});
</script>

 
 
 

    
  