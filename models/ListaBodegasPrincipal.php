<?php
//TABLA BODEGAS PRINCIPAL
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$sqlSelect = "SELECT * FROM bodegas";

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