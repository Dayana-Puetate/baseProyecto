<?php 
require 'models/conexion.php';
$consulta1="SELECT * FROM productos";
$resultado1=mysqli_query($conn,$consulta1);
?>
<!DOCTYPE html>
<html>
<body>
    <!-- INICIO CARGAR TABLA-->
    <table id="dg" title="<center><bi><h2>PRODUCTOS</h2></bi></center>" class="easyui-datagrid" style="width:900px;height:250px"
            url="models/buscarProducto.php"
            toolbar="#toolbar" pagination="true"
            fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="ID_PRO" width="30"><center>CODIGO</center></th>
                <th field="NOM_PRO" width="75"><center>NOMBRE</center></th>
                <th field="MARCA_PRO" width="75"><center>MARCA</center></th>
                <th field="DES_PRO" width="100"><center>DESCRIPCION</center></th>
                <th field="STOCK" width="30"><center>STOCK</center></th>
                <th field="ESTADO_PRO" width="40"><center>ESTADO</center></th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newProducto()">NUEVO PRODUCTO</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editarProducto()">MODIFICAR PRODUCTO</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="agregarStock()">AGREGAR STOCK</a>
        <select class="easyui-combobox" name="NOM_PRO" id="NOM_PRO" required="true" style="width:20%;height:20px">
                <option value="">Seleccionar</option>
                    <?php while($productos=mysqli_fetch_assoc($resultado1)):?>
                <option value="<?php echo $productos['NOM_PRO']?>"> <?php echo $productos['NOM_PRO'] ?> </option>
                    <?php endwhile;?>
        </select>
        <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-search"  plain="true" onclick="doSearch()">BUSCAR PRODUCTO</a>
    </div>
    <!-- INICIO CREAR PRODUCTO-->
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="models/InsertarProductoAdministrador.php">
            <div style="margin-bottom:10px">
                <input name="ID_PRO" class="easyui-textbox" required="true" label="Codigo:" style="width:130%;text-transform:uppercase">
            </div>  
            <div style="margin-bottom:10px">
                <input name="NOM_PRO" class="easyui-textbox" required="true" label="Nombre:" style="width:130%" >
            </div>
            <div style="margin-bottom:10px">
                <input name="MARCA_PRO" class="easyui-textbox" required="true" label="Marca:" style="width:130%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DES_PRO" class="easyui-textbox" required="true" label="Descripción:" style="width:130%;height:34px">
            </div>
            <div style="margin-bottom:10px">
                <input min="1" name="STOCK" class="easyui-numberspinner" value="1" required="true" label="Cantidad:" style="width:130%" data-options="min:1">
            </div>      
        </form>
    </div>
    <div id="dlg-buttons" style="text-align:center;padding:5px 0">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="guardarProducto()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <!-- INICIO MODIFICAR PRODUCTO-->
    <div id="dlgm" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgm-buttons'">
        <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/servicioProducto.php">
            <input type="hidden" id="op" name="op" value="editarProducto">
            <div style="margin-bottom:10px">
                <input name="ID_PRO" class="easyui-textbox" required="true" label="Codigo:" style="width:130%" data-options="editable:false">
            </div>  
            <div style="margin-bottom:10px">
                <input name="NOM_PRO" class="easyui-textbox" required="true" label="Nombre:" style="width:130%">
            </div>
            <div style="margin-bottom:10px">
                <input name="MARCA_PRO" class="easyui-textbox" required="true" label="Marca:" style="width:130%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DES_PRO" class="easyui-textbox" required="true" label="Descripción:" style="width:130%;height:34px">
            </div>
            <div style="margin-bottom:10px">
                <input min="0" name="STOCK" class="easyui-textbox" value="1" required="true" label="Cantidad:" style="width:130%" data-options="min:1,editable:false">
            </div>      
        </form>
    </div>
    <div id="dlgm-buttons" style="text-align:center;padding:5px 0">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="submitFormUpdatePro()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm').dialog('close')" style="width:90px">Cancelar</a>
    </div>
   <!--AGREGAR STOCK-->
   <div id="dlgs" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgm-buttons'">
        <form id="ffs" method="post" novalidate style="margin:0;padding:20px 50px" action="models/servicioProducto.php">
            <input type="hidden" id="op" name="op" value="agregarStock">
            <div style="margin-bottom:10px">
                <input name="ID_PRO" class="easyui-textbox" required="true" label="Codigo:" style="width:130%" data-options="editable:false">
            </div>  
            <div style="margin-bottom:10px">
                <input name="NOM_PRO" class="easyui-textbox" required="true" label="Nombre:" style="width:130%" data-options="editable:false">
            </div>
            <div style="margin-bottom:10px">
                <input name="MARCA_PRO" class="easyui-textbox" required="true" label="Marca:" style="width:130%" data-options="editable:false">
            </div>
            <div style="margin-bottom:10px">
                <input name="DES_PRO" class="easyui-textbox" required="true" label="Descripción:" style="width:130%;height:34px" data-options="editable:false">
            </div>
            <div style="margin-bottom:10px">
                <input min="0" name="STOCK" class="easyui-textbox" value="1" required="true" label="Actual:" style="width:130%" data-options="min:1,editable:false">
            </div>
            <div style="margin-bottom:10px">
                <input min="1" name="CANT_S" class="easyui-numberspinner" value="1" required="true" label="Agregar:" style="width:130%" data-options="min:1">
            </div>        
        </form>
    </div>
    <div id="dlgm-buttons" style="text-align:center;padding:5px 0">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="guardarStock()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgs').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <!-- FUNCIONES-->
    <script type="text/javascript">  
        function newProducto(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','INGRESAR PRODUCTO');
            $('#fm').form('clear');
        }
        //--------------------------------------------------------------------------------------------
        function editarProducto() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm').dialog('open').dialog('center').dialog('setTitle', 'EDITAR PRODUCTO');
                $('#ff').form('load', row);
            }
        }
        //--------------------------------------------------------------------------------------------
        function agregarStock() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgs').dialog('open').dialog('center').dialog('setTitle', 'AGREGAR STOCK');
                $('#ffs').form('load', row);
            }
        }
        //--------------------------------------------------------------------------------------------
        function darBaja() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#d').dialog('open').dialog('center').dialog('setTitle', 'DAR DE BAJA PRODUCTO');
                $('#fp').form('load', row);
            }
        }
        //--------------------------------------------------------------------------------------------
        function eliminarProducto() {
            var row = $("#dg").datagrid("getSelected");
            if (row) {
                $.messager.confirm("Confirm", "Desea eliminar el producto", function(r) {
                    if (r) {
                        $.post("models/serviciosProducto.php", {
                            op: "eliminarProducto",
                            ID_PRO: row["ID_PRO"]
                        }, function(res) {
                            if (!res.success) {
                                $('#dg').datagrid('reload');
                                $.messager.alert('correcto', "Se elimino correctamente");
                            } else {
                                $('#dg').datagrid('reload');
                                $.messager.show({
                                    title: 'incorrecto',
                                    msg: result.errorMsg
                                });
                            }

                        }, "json");
                    }
                $('#dg').datagrid('reload');
                });
            }
        }
        //--------------------------------------------------------------------------------------------
            function guardarProducto(){
                $('#fm').form('submit');
                $('#fm').form({
                    success: function(data){
                       $("#dg").datagrid("reload");
                       $('#dlg').dialog('close');

                        console.log(data);
                        if(data.indexOf("Error")!==-1)
                        $.messager.alert('Error', data,'error');
                        else
                        $.messager.alert(data);
                    }
                });
                document.getElementById("fm").reset();
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
        //--------------------------------------------------------------------------------------------
        function guardarStock() {
            $('#ffs').form('submit');
            $('#ffs').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgs').dialog('close');
                    console.log(data);
                    if (data.indexOf("Error")!= -1) {
                        $.messager.alert("Error", data, "Error");
                    } else {
                        $.messager.alert("Satisfactoriamente", data);
                    }
                }
            });
        }
        //----------------------------------------------------------------------------------------------
        function doSearch(){
            $('#dg').datagrid('load', {
                NOM_PRO: $('#NOM_PRO').val()                
            });
        }
        
    </script>
</body>
</html>