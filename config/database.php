<?php
$host = "localhost";
$db_name = "transprodriguez";
$username = "root";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
//mensaje error ante fallas
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}

?>