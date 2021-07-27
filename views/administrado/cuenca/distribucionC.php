<?php 
require 'models/conexion.php';
$consulta="SELECT * FROM bodegas";
$resultado=mysqli_query($conn,$consulta);
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

 <table id="dg" class="easyui-datagrid" title="<center><bi><h2>PRODUCTOS CUENCA</h2></bi></center>"style="width:950px;height:250px"
            url="models/ListaProductosCiudades.php"
            toolbar="#toolbar" pagination="true"
            fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            <th field="ID_PRO" width="60"><center>ID</center></th>
            <th field="NOM_PRO" width="60"><center>NOMBRE</center></th>
            <th field="ID_BOD_PB" width="60"><center>BODEGA</center></th>
            <th field="CANT_STOCK" width="60"><center>STOCK</center></th>
            </tr>
        </thead>
    </table>
    <div id="toolbar" style="height:40px">
        <div id="tb">
             <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="ventaDialogo()">VENTA</a>
        </div>
    </div>
<!--VENTA-->
    <div id="dlgm" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgm-buttons'">
        <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/servicioProducto.php">
            <input type="hidden" id="op" name="op" value="distribuirCiudades">
            <div style="margin-bottom:10px">
                <input name="ID_PRO" class="easyui-textbox" required="true" label="Producto:" style="width:130%" data-options="editable:false">
            </div>
            <div style="margin-bottom:10px">
                <input name="ID_BOD_PB" class="easyui-textbox" required="true" label="Bodega:" style="width:130%" >
            </div> 
            <div style="margin-bottom:10px">
                <input min="1" name="CANT_DIS" class="easyui-numberspinner" value="1" required="true" label="Cantidad:" style="width:130%" data-options="min:1">
            </div>      
        </form>
    </div>
    <div id="dlgm-buttons" style="text-align:center;padding:5px 0">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="submitFormUpdatePro()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm').dialog('close')" style="width:90px">Cancelar</a>
    </div>
<!--FIN-->

<script type="text/javascript">
        function ventaDialogo() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm').dialog('open').dialog('center').dialog('setTitle', 'VENTA PRODUCTO');
                $('#ff').form('load', row);
            }
        }
        //-----------------------------------------------------------------------------------------------
        function doSearch(){
        $('#dg').datagrid('load', {
            NOM_BOD: $('#NOM_BOD').val()                
        });
        }
        //--------------------------------------------------------------------------------------------
        function submitFormUpdatePro() {
            $('#ff').form('submit');
            $('#ff').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgm').dialog('close');
                    console.log(data);
                    if (data.indexOf("Error")!= -1) {
                        $.messager.alert("Error", data, "Error");
                    } else {
                        $.messager.alert("Satisfactoriamente", data);
                    }
                }
            });
        }
 </script>
</body>
</html>
