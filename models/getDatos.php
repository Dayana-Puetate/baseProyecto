<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
  
$seleccionP = isset($_POST['NOM_PRO']) ? $conn->real_escape_string($_POST['NOM_PRO']) : '';
$seleccionB = isset($_POST['NOM_BOD']) ? $conn->real_escape_string($_POST['NOM_BOD']) : ''; 
  
$offset = ($page-1)*$rows; 
  
$result = array(); 

$respuestaBusqueda = "NOM_PRO LIKE '$seleccionP%' AND NOM_BOD LIKE '$seleccionB%'"; 
$result = $conn->query("SELECT productos.ID_PRO, productos.NOM_PRO,productos.MARCA_PRO, bodegas.ID_BOD, bodegas.NOM_BOD, producto_bodega.CANT_STOCK FROM productos 
INNER JOIN producto_bodega
    on productos.ID_PRO = producto_bodega.ID_PRO_PB
    INNER JOIN bodegas
        on producto_bodega.ID_BOD_PB = bodegas.ID_BOD WHERE $respuestaBusqueda"); 
$row = $result->fetch_row(); 
$response["total"] = $row[0]; 
 
$result = $conn->query( "SELECT productos.ID_PRO, productos.NOM_PRO,productos.MARCA_PRO, bodegas.ID_BOD, bodegas.NOM_BOD, producto_bodega.CANT_STOCK FROM productos 
INNER JOIN producto_bodega
    on productos.ID_PRO = producto_bodega.ID_PRO_PB
    INNER JOIN bodegas
        on producto_bodega.ID_BOD_PB = bodegas.ID_BOD WHERE $respuestaBusqueda"); 
  
$pro = array(); 
while($row = $result->fetch_assoc()){ 
    array_push($pro, $row); 
} 
$response["rows"] = $pro; 
 
echo json_encode($response);
?>