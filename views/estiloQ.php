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
    <body>
    <header>
    <h1> UNIVERSIDAD TECNICA DE AMBATO </h1>
  <h2> APLICACIONES ORIENTADAS A SERVICIOS </h2>
    </header>
        <?php
            include "administrado/quito/navigationQ.php";
        ?>
        <section>
            <?php
                $mvc = new quitoController();
                $mvc -> enlacesPaginasControllerQuito();
            ?>
        </section>
    </body>
</html>