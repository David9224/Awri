<?php
session_start();
$connect = mysql_connect('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die('No se puede conectar: ' . mysql_error());
mysql_select_db('u798245532_proy');

$query = "SELECT * FROM Tipo_Plato WHERE Nit_Empresa='".$_SESSION['nitEmpresa']."';";
$q = mysql_query($query, $connect) or die('Error en la consulta' . mysql_error());
?>
<div class="container" style="width: 45%; height: 100%; border-radius: 10px 10px 10px 10px; float: left; margin-left: 20px; box-shadow: 0px 2px 10px #000000;">
    <div style="width: 80%; height: 80%; margin: 0px auto; text-align: center; ">
        <h1>Agregar Platos</h1><br>
        <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
                <label class="col-lg-2 control-label">Codigo</label>
                <div class="col-lg-10">
                    <input type="text" id="id" class="form-control" name="id">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                    <input type="text" id="nombre" class="form-control" name="nombre">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Ingredientes</label>
                <div class="col-lg-10">
                    <textarea id="ingredientes" class="form-control" rows="3" cols="50"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Valor</label>
                <div class="col-lg-10">
                    <input type="number" id="valor" class="form-control" name="valor">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Estado</label>
                <div class="col-lg-10">
                  <select  class="form-control" id="estado">
                    <option value="habilitado">Habilitado</option>
                    <option value="deshabilitado">Deshabilitado</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Adicional</label>
                <div class="col-lg-10">
                    <textarea id="adicional" class="form-control" rows="3" cols="50"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Tipo De Plato</label>
                <div class="col-lg-8">
                    <select class="form-control" id="tipoPlato">
            <?php
            while ($row=mysql_fetch_array($q)) {
                echo '<option value='.$row['idTipoPlato'].'>'.$row['Nombre'].'</option>';
            }
            ?>
                </select>
                </div>
            </div>

            <div class="form-group">
                <div id="BotonPlato" class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default" 
                            onclick="enviarDatosPlato();
                                    return false" style="float: left">
                        <span class="glyphicon glyphicon-floppy-saved"> Guardar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="resultado" class="foobar" style="width: 45%; height: 100%; border-radius: 10px 10px 10px 10px; float: right; margin-right: 20px; box-shadow: 0px 2px 10px #000000; overflow: auto;">
    <script type="text/javascript">actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarPlatos.php')</script>
</div>