<?php
//INGRESAR PRODUCTO_BODEGA
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';

$ID_PRO_ENVIO = $_POST['ID_PRO_ENVIO'];
$ID_BOD_ENVIO = $_POST['ID_BOD_ENVIO'];
$CANT_ENVIO = $_POST['CANT_ENVIO'];

$sqlInsert="INSERT INTO ENVIO(ID_PRO_ENVIO, ID_BOD_ENVIO, CANT_ENVIO) VALUES('$ID_PRO_ENVIO','$ID_BOD_ENVIO','$CANT_ENVIO')";
if($mysqli->query($sqlInsert)===TRUE){
    echo json_encode("Se guardo correctamente");
}else{
    echo"Error".$sqlInsert.$mysqli->error;
}
$mysqli->close();
?>