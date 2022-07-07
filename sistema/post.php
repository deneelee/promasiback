<?php

//$bd = include_once "bd.php";
$bd = new mysqli("localhost", "root", "", "promasi");

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

    $nombre =  mysqli_real_escape_string($bd, $request->nombre) ;
    $correo =  mysqli_real_escape_string($bd, $request->correo);
    $telefono = mysqli_real_escape_string($bd, $request->telefono);
    $interes = mysqli_real_escape_string($bd, $request->interes);

  $sql = "INSERT INTO contacto(id,nombre,correo,telefono,interes) VALUES ( '0','{$nombre}','{$correo}', '{$telefono}', '{$interes}')"; 

   if(mysqli_query($bd, $sql))
  {
    http_response_code(201);
    $data = [
      'id'    => mysqli_insert_id($bd),
      'nombre' => $nombre,
      'correo' => $correo,
      'telefono'=>$telefono,
      'interes'=> $interes,

    ];
    echo json_encode(['data'=>$data]);
  }
  else
  {
    http_response_code(422);
  } 
}

mysqli_close($bd);

?>