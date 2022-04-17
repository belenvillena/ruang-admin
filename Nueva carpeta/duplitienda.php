
        <?php require_once 'secciones/encabezado.php'; ?>     
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/page3.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Tienda Virtual</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Inicio</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Tienda Virtual</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product__menu">
                                    <button data-filter="*"  class="is-checked">Ver todo</button>
                                    <button data-filter=".cat--1">Vegetales</button>
                                    <button data-filter=".cat--2">Pimientos y Ajies</button>
                                    <button data-filter=".cat--3">Tomates</button>
                                    <button data-filter=".cat--4">Frutas</button>
                                </div>
                                <div class="filter__box">
                                    <a class="filter__menu" href="#">Filtros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Filter Menu -->
                    <div class="filter__wrap">
                        <div class="filter__cart">
                            <div class="filter__cart__inner">
                                <div class="filter__menu__close__btn">
                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                </div>
                                <div class="filter__content">
                                    <!-- Start Single Content -->
                                    <div class="fiter__content__inner">
                                        <div class="single__filter">
                                            <h2>Ordenar por</h2>
                                            <ul class="filter__list">
                                                <li><a href="#default">Menor precio</a></li>
                                                <li><a href="#accessories">Mayor precio</a></li>
                                                <li><a href="#bags">Productos en stock</a></li>
                                                <li><a href="#chair">Temporada</a></li>
                                                
                                            </ul>
                                        </div>
                                        
                                        
                                        <div class="single__filter">
                                            <h2>Temporada</h2>
                                            <ul class="filter__list">
                                                <li><a href="#">Norte</a></li>
                                                <li><a href="#">La Plata</a></li>
                                                <li><a href="#">Mendoza</a></li>
                                                                                           </ul>
                                        </div>
                                        <div class="single__filter">
                                            <h2>Etiquetas</h2>
                                            <ul class="filter__list">
                                                <li><a href="#">Pimiento</a></li>
                                                <li><a href="#">Tomate</a></li>
                                                <li><a href="#">Chaucha</a></li>
                                                <li><a href="#">Zapallito</a></li>
                                                <li><a href="#">Frutas</a></li>
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <!-- End Single Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Menu -->
                    <!-- End Product MEnu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                <form method="POST">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/pimiento_amarillo.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details" >
                                        <h2><a href="product-details.html">Pimiento amarillo</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price"> 
          <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =7
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  $ <?php  echo $row['precioProd']; ?> </li> <?php }} ?>
  
                                        </ul>
                                    </div>
                                
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/pimiento-rojo.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Pimiento rojo</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">
                                                <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =6
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  $ <?php  echo $row['precioProd']; ?> </li> <?php }} ?>

                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--2">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/pimiento_verde.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Pimiento verde</a></h2>
                                        <ul class="product__price">
                                         
                                            <li class="new__price">
                                                         <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =3
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  $ <?php  echo $row['precioProd']; ?> </li> <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--4">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/tomate_perita.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html" name="nombreProd"> <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =1
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    {   echo $row['descripcionProd']; ?></a></h2> <?php }} ?>
                                        <ul class="product__price">
                                           
                                            <li class="new__price">
                                                         <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =1
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  $ <?php  echo $row['precioProd']; ?> </li> <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12 cat--2">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/pepino.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html" name="nombreProd"> <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =4
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    {   echo $row['descripcionProd']; ?></a></h2> <?php }} ?>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">
                                                         <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto
                WHERE idProducto =4
                AND Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);

        if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  $ <?php  echo $row['precioProd']; ?> </li> <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/tomate_redondo.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Tomate redondo</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1900.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                           <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/zapallito.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Zapallito redondo</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1900.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--2">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/zucchini.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Zucchini</a></h2>
                                        <ul class="product__price">
                                          
                                            <li class="new__price">$1600.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--4">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/chau.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Chaucha Rolliza</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1900.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/berenjena.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Berenjena</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1800.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--4">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/frutillas.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Frutillas</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1200.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/cherry.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Tomate Cherry Rojo</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$2300.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/chaucha.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Chaucha Manteca</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1900.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--4">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/arvejas.png" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Arvejas</a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price">$1000.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12 cat--4">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/ajidulce.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Aji Dulce</a></h2>
                                        <ul class="product__price">
                                           
                                            <li class="new__price">$1000.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-md-3 single__pro col-lg-3 hidden-sm col-xs-12 cat--3">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/16.png" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details.html">Wood Simple Clock</a></h2>
                                        <ul class="product__price">
                                            <li class="old__price">$16.00</li>
                                            <li class="new__price">$10.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    </div>
                    <!-- Start Load More BTn -->
                    <div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                <a href="#">Ver más productos</a>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Load More BTn -->
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="ft__widget">
                                <div class="ft__logo">
                                    <a href="index.html">
                                        <img src="images/logo/logo.png" alt="footer logo">
                                    </a>
                                </div>
                                <div class="footer-address">
                                    <ul>
                                       
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="address-text">
                                                <a href="#"> transprodriguez@transp.com</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-phone-in-talk"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>+54 345 678 102 </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="social__icon">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Productos</h2>
                                <ul class="footer-categories">
                                    <li><a href="shop-sidebar.html">Pimientos y Ajies</a></li>
                                    <li><a href="shop-sidebar.html">Tomates</a></li>
                                    <li><a href="shop-sidebar.html">Frutas</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Información</h2>
                                <ul class="footer-categories">
                                    <li><a href="about.html">Nosotros</a></li>
                                    <li><a href="contact.html">Contactenos</a></li>
                                    <li><a href="#">Terminos y condiciones</a></li>
                                    <li><a href="#">Política de Envíos</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-lg-offset-1 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                
                                <div class="newsletter__form">
                                    
                                    <div class="input__box">
                                        <div id="mc_embed_signup">
                                            <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                    <div class="news__input">
                                                        
                                                    </div>
                                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                    <div class="clearfix subscribe__btn"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color">
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2021 <a href="https://freethemescloud.com/"></a>
                                    All Right Reserved.</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="index.html">Inicio</a></li>
                                    <li><a href="shop.html">Nosotros</a></li>
                                    <li><a href="contact.html">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>