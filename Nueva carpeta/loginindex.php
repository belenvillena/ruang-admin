<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo1.jpg" rel="icon">
  <title>Inicar sesión - Transporte Rodriguez</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido </h1>
                  </div>
                  <form class="user" method="POST">
           
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Ingrese su usuario" name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Contraseña" name="password" required>
                    </div>
                    
                    
                    <div class="form-group">
                    
                     
                      <select class="form-control" id="perfil" name="perfil">
                        

                        
        <?php
            require_once "conexionbd.php";
          $query = $connection -> query ("SELECT DISTINCT (rol) FROM cliente order by rol desc");
         
          while ($valoresloc = mysqli_fetch_array($query)) {?>
            <option   name= "perfil" value=" <?php echo $valoresloc ['rol'];?> " > <?php echo $valoresloc['rol'];


             ?></option>
          <?php 
          }
           
                   
        ?>
      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-block">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                       
                                  <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
           
                      </div>
                    </div>

                   
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Contactar al administrador</a>
                  </div>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>