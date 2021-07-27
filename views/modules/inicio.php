<!DOCTYPE html>
<html>
    <head>
        <link rel=StyleSheet href="css/template.css" typr="text/css">
    </head>
<body>
    <!--tabla productos-->
    <table id="dg" title="<center><h2>PRODUCTOS DISPONIBLES</h2></center>" class="easyui-datagrid" style="width:700px;height:250px;color:black;" url="models/ListaProductosPrincipal.php" toolbar="#toolbar" pagination="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="ID_PRO" width="50"><center>CODIGO</center></th>
                <th field="NOM_PRO" width="50"><center>NOMBRE</center></th>
                <th field="MARCA_PRO" width="50"><center>MARCA</center></th>
            </tr>
        </thead>
    </table>
      <br>
   
</body>

</html>