<html>
<head>
    <title> Proyecto Web </title>
    <meta charset="UTF-8">
    <link rel=StyleSheet href="css/template.css" typr="text/css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/icon.css">
    <script type="text/javascript" src="jquery-easyui-1.9.7/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.9.7/jquery.easyui.min.js"></script>
</head>
<header>
    <h1> UNIVERSIDAD TECNICA DE AMBATO </h1>
  <h2> APLICACIONES ORIENTADAS A SERVICIOS </h2>
    </header>
    <body>
        <?php
            include "administrado/cuenca/navigationC.php";
        ?>
        <section>
            <?php
                $mvc = new cuencaController();
                $mvc -> enlacesPaginasControllerCuenca();
            ?>
        </section>
    </body>
</html>