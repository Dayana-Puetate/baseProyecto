<?php
//TABLA FORMULARIOS BODEGAS
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';

$sqlSelect = "SELECT productos.ID_PRO,productos.NOM_PRO,productos.MARCA_PRO, producto_bodega.ID_BOD_PB, producto_bodega.CANT_STOCK FROM productos 
INNER JOIN producto_bodega
    on productos.ID_PRO = producto_bodega.ID_PRO_PB
        WHERE producto_bodega.ID_BOD_PB = 'B03'
        AND producto_bodega.CANT_STOCK<>0";
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