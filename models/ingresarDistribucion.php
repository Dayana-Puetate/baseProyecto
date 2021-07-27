<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$ID_PRO_VEN = $_POST['ID_PRO_VEN'];
$ID_BOD_VEN = $_POST['ID_BOD_VEN'];
$CANT_VEN = $_POST['CANT_VEN'];

$sqlInsert="INSERT INTO distribucion(ID_PRO_VEN, ID_BOD_VEN, CANT_VEN) VALUES('$ID_PRO_VEN','$ID_BOD_VEN','$CANT_VEN')";
if($mysqli->query($sqlInsert)===TRUE){
    echo json_encode("Se guardo correctamente");
}else{
    echo"Error".$sqlInsert.$mysqli->error;
}
$mysqli->close();
?>