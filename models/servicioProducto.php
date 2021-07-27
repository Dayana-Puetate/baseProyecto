<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: application/json');
include 'conexion.php';
$op=$_POST['op'];
if($op===null)
{
    echo "Error";
}
else{
switch($op)
{  
            case 'editarProducto':
                header('Content-Type: application/json');
                $ID_PRO= $_POST['ID_PRO'];
                $NOM_PRO = $_POST['NOM_PRO'];
                $MARCA_PRO = $_POST['MARCA_PRO'];
                $DES_PRO = $_POST['DES_PRO'];
                $sqlUpdate = "UPDATE productos SET NOM_PRO = '$NOM_PRO', MARCA_PRO = ' $MARCA_PRO', DES_PRO = '$DES_PRO' WHERE ID_PRO = '$ID_PRO'";
                if ($mysqli->query($sqlUpdate) === TRUE) {
                    echo json_encode("Se actualizo correctamente");
                } else {
                    echo "Error:" . $sqlUpdate . "<br>" . $mysqli->error;
                }
                $mysqli->close();
            break;
            case 'agregarStock':
                header('Content-Type: application/json');
                $ID_PRO = $_POST['ID_PRO'];
                $CANT_S = $_POST['CANT_S'];
                $sqlUpdate = "INSERT INTO agregar_stock(ID_PRO_S, CANT_S) VALUES('$ID_PRO','$CANT_S')";
                if ($mysqli->query($sqlUpdate) === TRUE) {
                    echo json_encode("Se actualizo correctamente");
                } else {
                    echo "Error:" . $sqlUpdate . "<br>" . $mysqli->error;
                }
                $mysqli->close();
            break;
            case 'distribuir':
                header('Content-Type: application/json');
                $NOM_BOD = $_POST['ID_BOD'];
                $ID_PRO_BOD = $_POST['ID_PRO'];
                $CANT_DIS = $_POST['CANT_DIS'];
                $sqlUpdate1 = "INSERT INTO distribucion(ID_PRO_BOD, ID_BOD_DIS, CANT_DIS) VALUES('$ID_PRO_BOD','$NOM_BOD','$CANT_DIS')";
                if ($mysqli->query($sqlUpdate1) === TRUE) {
                    echo json_encode("Se actualizo correctamente");
                } else {
                    echo "Error:" . $sqlUpdate1 . "<br>" . $mysqli->error;
                }
                $mysqli->close();
            break;
            case 'distribuirCiudades':
                header('Content-Type: application/json');
                $NOM_BOD = $_POST['ID_BOD_PB'];
                $ID_PRO_BOD = $_POST['ID_PRO'];
                $CANT_DIS = $_POST['CANT_DIS'];
                $sqlUpdate1 = "INSERT INTO distribucion(ID_PRO_BOD, ID_BOD_DIS, CANT_DIS) VALUES('$ID_PRO_BOD','$NOM_BOD','$CANT_DIS')";
                if ($mysqli->query($sqlUpdate1) === TRUE) {
                    echo json_encode("Se actualizo correctamente");
                } else {
                    echo "Error:" . $sqlUpdate1 . "<br>" . $mysqli->error;
                }
                $mysqli->close();
            break;


    }
}

?>

