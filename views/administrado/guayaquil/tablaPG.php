<!DOCTYPE html>
<html>
<body>
    <!--tabla productos-->

    <table id="dg" title="PRODUCTOS DISPONIBLES" class="easyui-datagrid" style="width:700px;height:250px;color:black;" url="models/bodegaGuayaquil.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
            <tr>
                <th field="NOM_PRO" width="50">Nombre</th>
                <th field="MARCA_PRO" width="50">Marca</th>
                <th field="CANT_STOCK" width="50">Stock</th>
            </tr>
        </thead>
    </table>
      <br>
</body>

</html>