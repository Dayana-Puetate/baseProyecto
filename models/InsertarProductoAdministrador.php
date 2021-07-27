<?php
//INGRESAR PRODUCTOS
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$ID_PRO= $_POST['ID_PRO'];
$NOM_PRO = $_POST['NOM_PRO'];
$MARCA_PRO = $_POST['MARCA_PRO'];
$DES_PRO = $_POST['DES_PRO'];
$STOCK=$_POST['STOCK'];
$sqlInsert="INSERT INTO productos(ID_PRO, NOM_PRO, MARCA_PRO, DES_PRO,STOCK,STOCK_G,ESTADO_PRO) VALUES('$ID_PRO','$NOM_PRO','$MARCA_PRO','$DES_PRO','$STOCK','$STOCK','ACTIVO')";
if($mysqli->query($sqlInsert)===TRUE){
    echo json_encode("Se guardo correctamente");
}else{
    echo"Error".$sqlInsert.$mysqli->error;
}
$mysqli->close();
?>