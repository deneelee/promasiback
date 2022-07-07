<?php

$servidor="mysql:dbname=promasi;host=127.0.0.1";
$usuario="root";
$password="";


      try {
          $conn = new PDO($servidor, $usuario, $password);

     } catch(PDOException $e) {

  echo "Conexión fallida: " . $e->getMessage();
  echo "<br/>";
  
}






?>
