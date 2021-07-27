<?php 
require 'models/conexion.php';
$consulta="SELECT * FROM bodegas";
$consulta1="SELECT * FROM productos";
$resultado=mysqli_query($conn,$consulta);
$resultado1=mysqli_query($conn,$consulta1);
?>
<!DOCTYPE html>
<html>
<head>
    <LINK REL=StyleSheet HREF="css/estilo.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.15/themes/black/easyui.css">
    <script type="text/javascript" src="jquery-easyui-1.9.15/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.9.15/jquery.easyui.min.js"></script>
</head>
<body>

 <table id="dg" class="easyui-datagrid" title="<center><bi><h2>BÚSQUEDA DE PRODUCTOS</h2></bi></center>"style="width:950px;height:250px"
            url="models/getDatos.php"
            toolbar="#toolbar" pagination="true"
            fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="ID_PRO" width="50"><center>CODIGO PRODUCTO</center></th>
                <th field="NOM_PRO" width="50"><center>NOMBRE PRODUCTO<center></th>
                <th field="MARCA_PRO" width="50"><center>MARCA PRODUCTO</center></th>
                <th field="NOM_BOD" width="50"><center>BODEGA</center></th>
                <th field="CANT_STOCK" width="50"><center>STOCK</center></th>
            </tr>
        </thead>
    </table>
    <div id="toolbar" style="height:40px">
        <div id="tb">
            <select class="easyui-combobox" name="NOM_PRO" id="NOM_PRO" required="true" label="Producto:"style="width:30%;height:20px">
                <option value="">Seleccionar</option>
                    <?php while($productos=mysqli_fetch_assoc($resultado1)):?>
                <option value="<?php echo $productos['NOM_PRO']?>"> <?php echo $productos['NOM_PRO'] ?> </option>
                    <?php endwhile;?>
            </select>
            <select class="easyui-combobox" name="NOM_BOD" id="NOM_BOD" required="true" label="Bodega:"style="width:30%;height:20px">
                <option value="">Seleccionar</option>
                    <?php while($bodegas=mysqli_fetch_assoc($resultado)):?>
                <option value="<?php echo $bodegas['NOM_BOD']?>"> <?php echo $bodegas['NOM_BOD'] ?> </option>
                    <?php endwhile;?>
            </select>
            <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-search"  plain="true" onclick="doSearch()">Buscar</a>
        </div>
    </div>

<script type="text/javascript">
 function doSearch(){
  $('#dg').datagrid('load', {
    NOM_PRO: $('#NOM_PRO').val(),
    NOM_BOD: $('#NOM_BOD').val()                
  });
 }
 </script>
</body>
</html>



