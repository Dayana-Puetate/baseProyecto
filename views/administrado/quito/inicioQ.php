<?php
	require_once ("models/conexion.php");
	$query_empresa=mysqli_query($conn,"select * from usuarios where ID_USU='QUITO'");
	$row=mysqli_fetch_array($query_empresa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Proyecto Web </title>
    <meta charset="UTF-8">
    <link rel=StyleSheet href="css/template.css" typr="text/css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/icon.css">
    <script type="text/javascript" src="jquery-easyui-1.9.7/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.9.7/jquery.easyui.min.js"></script>
</head>
  <?php
    session_start();
    if( !isset($_SESSION['usu'] ) ){
      header("Location: modules/login.php");
    }
  ?>
<body>
<h1 style="text-align:center" class="animate__animated animate__backInLeft">Bienvenid@ a tu cuenta</h1>
<h1 style="text-align:center" class="animate__animated animate__backInLeft">
<?php echo $_SESSION['usu']?>
</h1>
</h1>
</html>
