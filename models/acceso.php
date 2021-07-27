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
        case 'ingresarCuenta':
            header('Content-Type: application/json');
            session_start();
            $ID_USU = $_POST['ID_USU'];
            $CONT_USU = $_POST['CONT_USU'];
            //$clave_cifrada=hash('sha512', $clave);
            $query= mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_USU = '".$ID_USU."' AND CONT_USU = '".$CONT_USU."' AND TIPO_USU = 'ADMIN'");
            $nf = mysqli_num_rows($query);
            $query1= mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_USU = '".$ID_USU."' AND CONT_USU = '".$CONT_USU."' AND TIPO_USU = 'CUENCA'");
            $nf1 = mysqli_num_rows($query1);
            $query2= mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_USU = '".$ID_USU."' AND CONT_USU = '".$CONT_USU."' AND TIPO_USU = 'GUAYAQUIL'");
            $nf2 = mysqli_num_rows($query2);
            $query3= mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_USU = '".$ID_USU."' AND CONT_USU = '".$CONT_USU."' AND TIPO_USU = 'QUITO'");
            $nf3 = mysqli_num_rows($query3);
            if ($nf === 1) {
                session_start();
                $_SESSION['usu'] = $_POST['ID_USU'];
                header("location: ../indexAdmin.php?action=inicioAdmin.php");
            }else if ($nf1 === 1) {
                session_start();
                $_SESSION['usu'] = $_POST['ID_USU'];
                header("location: ../indexC.php?action=inicioC.php");
            }else if ($nf2 === 1) {
                session_start();
                $_SESSION['usu'] = $_POST['ID_USU'];
                header("location: ../indexG.php?action=inicioG.php");
            }else if ($nf3 === 1) {
                session_start();
                $_SESSION['usu'] = $_POST['ID_USU'];
                header("location: ../indexQ.php?action=inicioQ.php");
            }else if ($nf=== 0 || $nf1 === 0 || $nf2 === 0 || $nf3 === 0) {
                header("location: ../index.php");
            }
            
            
        break;
}
}

?>