<!-- Esta es la vista principal de la sección de Loguin -->

<?php 
session_start();
//llamo a mi conexion y la creo el el script
require_once 'conexion.php';
$MiConexion=ConexionBD(); 

//verificamos las acciones al presionar Login

if (!empty($_POST['BotonLogin'])){

    require_once 'processLogin.php';
    $UsuarioLogueado = DatosLogin($_POST['username'], $_POST['password'], $MiConexion);

    //la consulta con la BD para que encuentre un usuario registrado con el usuario y clave 
    if ( !empty($UsuarioLogueado)){      

       //generar los valores del usuario en mi array SESSION

        $_SESSION['Usuario_Nombre']     =   $UsuarioLogueado['NOMBRE'];
        $_SESSION['Usuario_Apellido']   =   $UsuarioLogueado['APELLIDO'];
        $_SESSION['Usuario_Puesto']      =   $UsuarioLogueado['PUESTO'];
        $_SESSION['Usuario_nombreDato']      =   $UsuarioLogueado['NIVEL'];
        $_SESSION['Usuario_idPersona']      =   $UsuarioLogueado['ID'];


 if($UsuarioLogueado['NIVEL'] == 'Administrador'){
     include_once 'indexadm.php';
     exit;
  }
     
   
   // si la contraseña es incorrecta devuelvo al index
   if($UsuarioLogueado['NIVEL'] == 'Cliente') 
   {
      include'productos (2).php';
      exit;
   }
}

else{
        //echo "No existe el usuario";
       $errorLogin = "Nombre de usuario y/o password incorrecto";
    include_once 'l2.php';
    }
            
       

}



?>
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
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido a Transporte Rodriguez</h1>
                  </div>
                  <form class="user" method="POST" > <!-- Llamo a mi archivo php de inicio -->
           
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Ingrese su usuario" name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Contraseña" name="password" required>
                    </div>
                   <!-- Login Content 
                    
                    <div class="form-group">
                    
                     
                      <select class="form-control" id="perfil" name="perfil">
                        

                        
  
      </select>
                    </div>-->  
                    <div class="form-group">
                      <input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-block" name="BotonLogin">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                    

  
           
           
                      </div>
                    </div>

                   
                  <div class="text-center">
                    <a class="font-weight-bold small" href="l2.php"></a>

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