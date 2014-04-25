<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>AdminEmpresa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="/Proyecto/css/bootstrap.css" rel="stylesheet">
	<link href="/Proyecto/css/general.css" rel="stylesheet">
	<link href="/Proyecto/css/adminEmpresa.css" rel="stylesheet">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="/Proyecto/ScriptsJS/ActualizarContenido.js"></script>
    <script type="text/javascript" src="/Proyecto/ScriptsJS/empleadoAjax.js"></script>
</head>
<body>
	<?php    
    
    	if(!isset($_SESSION['tipo']) or ($_SESSION['tipo'] != "2")){     	
        	echo '<script>window.location="/Proyecto/Advertencias/AccesoRestringido.html"</script>';
    	}else {
	?>
	<nav id ="navbar" class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="/Proyecto/index.php">AppName</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                	<li><a href="/Proyecto/AdminEmpresa/AdminEmpresa.php">Home</a></li>
                    <li><a href="#" onclick="actualizar('#container', '/Proyecto/AdminEmpresa/AgregarEmpleado.html')">Gestión Empleados</a></li>
                    <li><a href="#" onclick="actualizar('#container', '/Proyecto/AdminEmpresa/AgregarPlatos.html')">Gestión Platos</a></li>
                    <li><a href="#" onclick="actualizar('#container', '/Proyecto/AdminEmpresa/PlatosDisponibles.html')">Platos Disponibles</a></li>
                    <li><a href="#" onclick="actualizar('#container', '/Proyecto/AdminEmpresa/GestionPedidos.html')">Gestión Pedidos</a></li>
                    <li><a href="#" onclick="actualizar('#container', '/Proyecto/AdminEmpresa/Reportes.html')">Reportes</a></li>   
                </ul>
                <ul class="nav navbar-nav navbar-right">
		    		<li><a href="/Proyecto/ScriptsPHP/CerrarSesion.php"><?php echo $_SESSION['usuario']."/Cerrar Sesión"?></a></li>
		    	</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div id="container">
		Home
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