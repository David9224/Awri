<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cajero</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="/Proyecto/css/bootstrap.css" rel="stylesheet">
	<link href="/Proyecto/css/general.css" rel="stylesheet">
	<link href="/Proyecto/css/cajero.css" rel="stylesheet">
</head>
<body>
	<?php
    	if(!isset($_SESSION['tipo']) or ($_SESSION['tipo'] != "4")){     	
        	echo '<script>window.location="/Proyecto/Advertencias/AccesoRestringido.html"</script>';
    	}else {
	?>
	<nav class="navbar navbar-inverse" role="navigation" id="navbar">
	  <!-- El logotipo y el icono que despliega el menú se agrupan
	       para mostrarlos mejor en los dispositivos móviles -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Desplegar navegación</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">SinNombre.com</a>
	  </div>
	 
	  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
	       otro elemento que se pueda ocultar al minimizar la barra -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Platos Disponibles</a></li>
	      <li><a href="#">Gestión Pedidos</a></li>   
	    </ul>
		</div>
	</nav>
	<div id="container">
		Contenido Cajero!
		<a href="/Proyecto/ScriptsPHP/CerrarSesion.php"> Cerrar Sesion</a>
	</div>
	<footer id="footer">
		<p>Creado y diseñado por Oscar Serna, David Aristizabal y Zamir Narvaez, &copy;2014</p>		
		<a href="#about">Términos y Condiciones</a>
	</footer>
    <script src="/Proyecto/ScriptsJS/bootstrap.js"></script>
	<?php
    	}
	?>
</body>
</html>