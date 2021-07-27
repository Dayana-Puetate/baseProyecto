<?php
	require_once ("models/conexion.php");
	$query_empresa=mysqli_query($conn,"select * from usuarios where ID_USU='CUENCA'");
	$row=mysqli_fetch_array($query_empresa);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel=StyleSheet href="css/template.css" typr="text/css">
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
