<?php 
require 'models/conexion.php';
$consulta="SELECT * FROM bodegas";
$consulta1="SELECT * FROM productos";
$resultado=mysqli_query($conn,$consulta);
$resultado1=mysqli_query($conn,$consulta1);
?>
<!DOCTYPE html>
<html>
<header>
    <LINK REL=StyleSheet HREF="css/template.css" TYPE="text/css" MEDIA=screen>
    <LINK REL=StyleSheet HREF="css/secciones.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.15/themes/black/easyui.css">
    <script type="text/javascript" src="jquery-easyui-1.9.15/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.9.15/jquery.easyui.min.js"></script>
</header>
<body>
    <div class="left-column">
    <div id="dlg" class="easyui-panel" title="." style="width:100%;max-width:800px;padding:30px 10px;">
    <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/productoBodega.php">  
        <center><bi><h2>ENVÍO PRODUCTOS A SUCURSALES</h2></bi></center><br>
            <div style="margin-bottom:20px">
                <select name="ID_PRO_ENVIO" id="ID_PRO_ENVIO" class="easyui-combobox" required="true" label="Producto:" style="width:80%;height:34px">
                    <option value="">Seleccionar</option>
                        <?php while($codigo=mysqli_fetch_assoc($resultado1)):?>
                    <option value="<?php echo $codigo['ID_PRO']?>"> <?php echo $codigo['NOM_PRO'] ?> </option>
                        <?php endwhile;?>
                </select>
            </div>
           <div style="margin-bottom:20px">
                <select class="easyui-combobox" name="ID_BOD_ENVIO" id="ID_BOD_ENVIO" required="true" label="Bodega:"style="width:80%;height:34px">
                    <option value="">Seleccionar</option>
                        <?php while($bodega=mysqli_fetch_assoc($resultado)):?>
                    <option value="<?php echo $bodega['ID_BOD']?>"> <?php echo $bodega['NOM_BOD'] ?> </option>
                        <?php endwhile;?>
                </select>
            </div>
            <div style="margin-bottom:20px">
            <input name="CANT_ENVIO" class="easyui-numberspinner" label="Cantidad:" value="1" style="width:263px;" required="required"   data-options="min:1">
            </div>
        </form>
        <div style="text-align:center;padding:5px 0">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="submitForm()" style="width:100px">Guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="clearForm()" style="width:100px">Cancelar</a>
        </div>
        </div>
    </div>
    <div class="right-column">
        <table id="dg" title="<center><bi><h2>PRODUCTOS</h2></bi></center>" class="easyui-datagrid" style="width:750px;height:250px"
                url="models/ListaProductoBodega.php"
                pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                <th field="NOM_BOD" width="60"><center>BODEGA</center></th>
                <th field="NOM_PRO" width="60"><center>PRODUCTO</center></th>
                <th field="CANT_STOCK" width="60"><center>STOCK</center></th>
                </tr>
            </thead>
        </table>
    </div>
<script>
        function submitForm(){
            $('#ff').form('submit');
            $('#ff').form({
                success:function(data){
                    console.log(data);
                    if(data.indexOf("ERROR")!==-1){
                        $.messager.alert("ERROR",data,"ERROR");
                    }else{
                        $.messager.alert(data);}
                }
            });
        }

        function clearForm(){
            $('#ff').form('clear');
        }
    </script>
</body>
</html>
                        