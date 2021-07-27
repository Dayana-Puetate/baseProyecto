<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
  
$seleccion = isset($_POST['NOM_PRO']) ? $conn->real_escape_string($_POST['NOM_PRO']) : ''; 
  
$offset = ($page-1)*$rows; 
  
$result = array(); 
 
$respuestaBusqueda = "NOM_PRO LIKE '$seleccion%'"; 
$result = $conn->query("SELECT COUNT(*) FROM productos WHERE $respuestaBusqueda"); 
$row = $result->fetch_row(); 
$response["total"] = $row[0]; 
 
$result = $conn->query( "SELECT * FROM productos WHERE $respuestaBusqueda ORDER BY ID_PRO ASC LIMIT $offset,$rows"); 
  
$pro = array(); 
while($row = $result->fetch_assoc()){ 
    array_push($pro, $row); 
} 
$response["rows"] = $pro; 
 
echo json_encode($response);
?>