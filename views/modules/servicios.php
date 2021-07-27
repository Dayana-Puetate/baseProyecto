<!DOCTYPE html>
<html>
<body>
    <!--tabla-->
    <table id="dg" title="ESTUDIANTES" class="easyui-datagrid" style="width:700px;height:250px;color:black;" url="models/cargar.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="EST_CED" width="50">CEDULA</th>
                <th field="EST_NOM" width="50">NOMBRE</th>
                <th field="EST_APE" width="50">APELLIDO</th>
                <th field="EST_DIR" width="50">DIRECCION</th>
                <th field="EST_TEL" width="50">TELEFONO</th>
                <th field="EST_SEX" width="50">SEXO</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newEst()">CREAR ESTUDIANTE</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editEst()">EDITAR ESTUDIANTE</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteEst()">ELIMINAR ESTUDIANTE</a>
        <a href="1/imprimirE.php?action" class="easyui-linkbutton" iconCls="icon-print" plain="true" > IMPRIMIR</a>

    </div>
    <!--crear usr-->
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
            <input type="hidden" id="op" name="op" value="insertAlumno">
            <div style="margin-bottom:10px">
                <input name="EST_CED" class="easyui-textbox" required="true" label="CEDULA:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input type="text" name="EST_NOM" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_APE" class="easyui-textbox" required="true" label="APELLIDO:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <select name="EST_DIR" class="easyui-combobox" required="true" label="DIRECCION:" style="width:100%;">
                    <option value="SIN_DIRECCION">SIN DIRECCION</option>
                    <?php
                    include "views/modules/direcciones.php";
                    ?>
                </select>
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_TEL" class="easyui-textbox" required="true" label="TELEFONO:" style="width:100%;">
            </div>
            <div style="margin-bottom:10px">
                <input id="sexo" class="easyui-combobox" name="EST_SEX" style="width:100%;" data-options=" valueField:'sexo',textField:'sexo',label:'SEXO:'">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" onclick="submitFormEst()" style="width:80px">CREAR</a>
        <a href="#" class="easyui-linkbutton" onclick="cleardataEst()" style="width:80px">LIMPIAR</a>
    </div>
    <!--modificar usr-->
    <div id="dlgm" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
            <input type="hidden" id="op" name="op" value="updateAlumno">
            <div style="margin-bottom:10px">
                <input name="EST_CED" class="easyui-textbox" required="true" label="CEDULA:" style="width:100%" readonly>
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_NOM" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_APE" class="easyui-textbox" required="true" label="APELLIDO:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_DIR" class="easyui-textbox" required="true" label="DIRECCION:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="EST_TEL" class="easyui-textbox" required="true" label="TELEFONO:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id="sexo1" class="easyui-combobox" name="EST_SEX" style="width:100%;" data-options=" valueField:'sexo',textField:'sexo',label:'SEXO:'"> </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdateEst()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm').dialog('close')" style="width:90px">Cancel</a>
    </div>
      <br>
  <?php
  if ($_SESSION['rol'] == 'ADMIN') {
      include "views/modules/serviciosU.php";
  }
  ?>
    <script type="text/javascript">
        function newEst() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'NUEVO USUARIO');
            $('#fm').form('load');
        }

        function editEst() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm').dialog('open').dialog('center').dialog('setTitle', 'EDITAR USUARIO');
                $('#ff').form('load', row);
            }
        }

        function deleteEst() {
            var row = $("#dg").datagrid("getSelected");
            if (row) {
                $.messager.confirm("Confirm", "Desea eliminar el estudiante", function(r) {
                    if (r) {
                        $.post("models/acceso.php", {
                            op: "deleteAlumno",
                            EST_CED: row["EST_CED"]
                        }, function(res) {
                            if (!res.success) {
                                $('#dg').datagrid('reload');
                                $.messager.alert('correcto', "eliminado correctamente");
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

        function submitFormEst() {
            $('#fm').form('submit');
            $('#fm').form({
                success: function(data) {
                    $("#dg").datagrid("reload");
                    $('#dlg').dialog('close');
                    console.log(data);
                    if (data.indexOf("Error") !== -1) {
                        $.messager.alert('Error', data, 'error');
                    } else {
                        $.messager.alert("correcto", data);
                    }
                }

            });
        }

        function submitFormUpdateEst() {
            $('#ff').form('submit');
            $('#ff').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgm').dialog('close');
                    console.log(data);
                    if (data.indexOf("error") != -1) {
                        $.messager.alert("error", data, "error");

                    } else {
                        $.messager.alert("correcto", data);
                    }
                }
            });
        }

        function cleardataEst() {
            document.getElementById("fm").reset();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#sexo').combobox("reload", "views/modules/sexo.json");
            $('#sexo1').combobox("reload", "views/modules/sexo.json");
        });
    </script>
</body>

</html>