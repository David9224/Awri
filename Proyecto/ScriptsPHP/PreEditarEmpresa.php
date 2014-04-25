<?php
$nombre = $_POST['nombre'];
$nit = $_POST['nit'];
$url = $_POST['url'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
?>
<div style="width: 80%; height: 80%; margin: 0px auto; text-align: center; ">
	<h1>Agregar Empresa</h1><br>
	<form name="nuevaEmpresa" class="form-horizontal" role="form" onsubmit="editar(); return false" method="POST">
		<div class="form-group">
		    <label class="col-lg-2 control-label">Nombre</label>
		    <div class="col-lg-10">
		    	<?php
		     	echo '<input type="text" class="form-control" name="nombre" value="'.$nombre.'">';
		     	?>
		    </div>
		</div>
		<div class="form-group">
		    <label class="col-lg-2 control-label">Nit</label>
		    <div class="col-lg-10">
		    	<?php
		      	echo '<input type="number" class="form-control" name="nit" value="'.$nit.'">';
		      	?>
		    </div>
		</div>
		<div class="form-group">
		    <label class="col-lg-2 control-label">Url</label>
		    <div class="col-lg-10">
		    	<?php
		    	echo '<input type="text" class="form-control" name="url" value="'.$url.'">';
		    	?>
		    </div>
		</div>
		<div class="form-group">
		    <label class="col-lg-2 control-label">Direccion</label>
		    <div class="col-lg-10">
		    	<?php
		    	echo '<input type="text" class="form-control" name="direccion" value="'.$direccion.'">';
		    	?>
			</div>
		</div>
		<div class="form-group">
		    <label class="col-lg-2 control-label">Telefono</label>
		    <div class="col-lg-10">
		    	<?php
		      	echo '<input type="number" class="form-control" name="telefono" value="'.$telefono.'">';
		       	?>
		    </div>
		</div>
		<div class="form-group">
		    <div class="col-lg-offset-2 col-lg-10">
		      <button type="submit" class="btn btn-default" style="float: left" >
		      	<span class="glyphicon glyphicon-floppy-saved"> Actualizar</span>
		      </button>
		    </div>
		</div>
	</form>
</div>