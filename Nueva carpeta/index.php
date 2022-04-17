<?php
include_once 'user.php';
include_once 'user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
   // echo "hay sesion";
    session_unset();
        session_destroy();
    

  $user->setUser($userSession->getCurrentUser());
    //include_once 'indexadm.php';

}else if(isset($_POST['username']) && isset($_POST['password']))
{
   // echo 'validacion de login';
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
   
    

   // $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'indexadm.php';
    }else{
        //echo "No existe el usuario";
       $errorLogin = "Nombre de usuario y/o password incorrecto";
    include_once 'loginindex.php';
    }
}else{
    //echo "login";
    include_once 'loginindex.php';
}



