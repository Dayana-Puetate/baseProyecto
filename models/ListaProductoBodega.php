<?php
//TABLA FORMULARIOS PRODUCTOS_BODEGAS
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';

$sqlSelect = "SELECT productos.NOM_PRO, bodegas.NOM_BOD, producto_bodega.CANT_STOCK FROM productos 
INNER JOIN producto_bodega
    on productos.ID_PRO = producto_bodega.ID_PRO_PB
    INNER JOIN bodegas
        on producto_bodega.ID_BOD_PB = bodegas.ID_BOD";
$respuesta = $conn->query($sqlSelect);
$result = array();
if($respuesta->num_rows>0)
{
    while($filaEstudiante=$respuesta->fetch_assoc())
    {
        array_push($result,$filaEstudiante);
    }
}else
{
    $result = "base de datos vacia";
}
echo json_encode($result);//
?>