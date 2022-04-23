
<?php

session_start();
//valido si tengo una sesion abierta y si no la tengo vuelvo al login
if (empty($_SESSION['Usuario_Nombre']) ) {
   header('Location: logout1.php');
    exit;
}

// conexion a la base de datos
include 'config/database.php';
require_once 'secciones/encabezadotiendacarro.php';

// Header
//$page_title="Carrito";
//include 'head.php';
 
// Parametros necesarios
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$total_pedido= isset($_GET['total_pedido']) ? $_GET['total_pedido'] : "";
 
 //Encabezado
echo ' <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Carro de compras</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="productos (2).php">Inicio</a></li>
              <li class="breadcrumb-item">Acceso tienda</li>
              <li class="breadcrumb-item active" aria-current="page">Ver carro</li>
            </ol>
          </div>';


// Mensaje de modificaciones (eliminado, cambia cantidad o errores en mensaje)
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "El producto fue eliminado del carrito!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "Se actualizo la cantidad de <strong>{$name}</strong> ";
    echo "</div>";
}
 
else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo " No se pudo actualizar la cantidad de <strong>{$name}</strong> ";
    echo "</div>";
}
 
else if($action=='invalid_value'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> cantidad es inválida!";
    echo "</div>";
}
else if($action=='confirm'){
        echo "<div class='alert alert-info'>";
        echo "<strong>Gracias, </strong> se generó su pedido y se encuentra pendiente de confirmación!";
    echo "</div>";
}
else if($action=='vaciar'){
    echo "<div class='alert alert-info'>";
        echo "Se eliminaron los productos del carrito!";
    echo "</div>";
}
 
// Seleccionamos de la tabla items los productos
$query="SELECT p.idProducto, p.descripcionProd, p.precioProd, ci.quantity, ci.user_id, ci.quantity * p.precioProd AS subtotal  
            FROM cart_items ci  
                LEFT JOIN producto p 
                    ON ci.product_id = p.idProducto"; 
 
$stmt=$con->prepare( $query );
$stmt->execute();
 
// Contamos la cantidad que retorna la consulta
$num=$stmt->rowCount();
 
if($num>0){
     
     //Encabezado tabla
     
       echo'     <div class="col-lg-12">
              <div class="card mb-4">';
    echo '<div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">';
    // Títulos de la tabla
    echo '<thead class="thead-light"><tr>';
        echo "<th class='textAlignLeft'>Nombre del producto</th>";
        echo "<th>Precio ($)</th>";
            echo "<th style='width:15em;'>Cantidad</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Acciones</th>";
    echo "</tr></thead>";
         
    $total=0;
     
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
       
        echo "<tr>";
            echo "<td>";
                        echo "<div class='product-id' style='display:none;'>{$idProducto}</div>";
                        echo "<div class='product-name'><a><img src='images/product/{$idProducto}.jpg' width = '50' height = '50'>   {$descripcionProd}</a></div>";
            echo "</td>";
            echo "<td>&#36;" . number_format($precioProd, 2, '.', ',') . "</td>";
            echo "<td>";
                        echo "<div class='input-group'>";
                            echo "<input type='number' name='quantity' value='{$quantity}' class='form-control'>";
                             
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-info update-quantity' type='button'><i class='glyphicon glyphicon-refresh'></i> Actualizar</button>";
                            echo "</span>";
                             
                        echo "</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($subtotal, 2, '.', ',') . "</td>";

                echo "<td>";
            echo "<a href='eliminar.php?id={$idProducto}&name={$name}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Quitar del carrito";
            echo "</a>";

            echo "</td>";
        echo "</tr>";

             
        $total += $subtotal;
    }
     
    echo "<tr>";
    echo "<form method='GET' >";
    echo "<td><b>Total Pedido</b></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td name='total_pedido'>&#36;" . number_format($total, 2, '.', ',') . "</td>";
    echo "<td>";
            echo "<a href='confirmar_compra.php?total_pedido={$total}'' class='btn btn-success'>";
          
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Confirmar pedido";
            echo "</a>";
    echo "</td>";
    
    echo "</tr>";
    echo "<tr>";
    echo "<td><b></b></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>";
            echo "<a href='vaciar_carrito.php?total_pedido={$total}'' class='btn btn-danger'>";
          
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Vaciar carrito";
            echo "</a>";
    echo "</td>";
    
    echo "</tr>";
         
    echo "</table> </div>
              </div>
            ";
}else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No se han encontrado productos</strong> en tu carrito!";
    
}
 
 //Pie de página


  require_once 'secciones/modallogout.php';
       
    echo '</div>  </div>';

    
     require_once 'secciones/footer.php';
      
  

  
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