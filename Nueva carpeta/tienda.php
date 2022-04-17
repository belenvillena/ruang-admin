

        <?php include 'conexionbd.php';?>
        <?php require_once 'seccionado/encabezado.php'; ?> 
         
        
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
                                    <a href="viewCart.php"><i class="zmdi zmdi-close"></i></a>
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
                        <div class="product__list another-product-style" id="products">
                            
                            <!-- Start Single Product -->
                            <?php
        include 'conexion.php';
         $sql = "SELECT *
                FROM producto WHERE Estado = 'Activo' ";
        $resultado = $connection->query($sql);
        $verificar= mysqli_query($connection,$sql);
         if (mysqli_num_rows($verificar)>0) // pregunto si encontró el registro en la tabla
        {
 
      while($row = $resultado->fetch_assoc()) //Cargo los datos en los campos
    { ?>  
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                <form method="POST">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="images/product/<?php  echo $row['idProducto']; ?>.jpg" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                
                                                <li><a  title="Add TO Cart" href="carrito.php"><span class="ti-shopping-cart"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details" >
                                        <h2><a href="detalleprod.php"><?php  echo $row['descripcionProd']; ?></a></h2>
                                        <ul class="product__price">
                                            
                                            <li class="new__price"><?php  echo $row['precioProd']; ?>  </li> 
  
                                        </ul>
                                   
                                    </div>
                                
                                </div>
                            </div>
                                
                              
                        <?php }}?>

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
        

        <?php require_once 'seccionado/footer.php'; ?> 

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