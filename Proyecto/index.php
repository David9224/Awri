<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="/Proyecto/css/bootstrap.css" rel="stylesheet">
	<link href="/Proyecto/css/general.css" rel="stylesheet">
	<link href="/Proyecto/css/index.css" rel="stylesheet">	
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="/Proyecto/ScriptsJS/ActualizarContenido.js"></script>
</head>
<body>
	<?php
    	if(isset($_SESSION['tipo'])){
			switch ($_SESSION['tipo']) {
				case "1":
					echo '<script>window.location="/Proyecto/AdminSistema/AdminSistema.php"</script>';
					break;
				case "2":
					echo '<script>window.location="/Proyecto/AdminEmpresa/AdminEmpresa.php"</script>';
					break;
				case "4":
					echo '<script>window.location="/Proyecto/Cajero/Cajero.php"</script>';
					break;
			}
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
                    <li><a href="/Proyecto/index.php">Inicio</a></li>      
	      			<li><a href="#" onclick="actualizar('#container', '/Proyecto/Index/AcercaDe.html')">Acerca de</a></li>
	      			<li><a href="#" onclick="actualizar('#container', '/Proyecto/Index/Contactanos.html')">Contáctanos</a></li> 
	      			<li><a href="#" onclick="actualizar('#container', '/Proyecto/Index/Ayuda.html')">Ayuda</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="form" method="POST" action="ScriptsPHP/login.php">
      				<div class="form-group">
        				<input id="user" name="user" type="text" class="form-control" placeholder="Usuario">
      				</div>
      				<div class="form-group">
        				<input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña">
      				</div>
      				<button type="submit" class="btn btn-success">Login</button>
    			</form>
            </div>            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div id="container">
		<div>
			<div id="div1">
			  <h1>Bienvenido a <span>AppName</span></h1>
			  <p id="info">Un sistema de gestión y optimización para tu restaurante.</p>
			  <p><a class="btn btn-info btn-large" id="boton-info" onclick="actualizar('#container', '/Proyecto/Index/SaberMas.html')">¡Quiero saber más!</a></p>
			</div>
			<div class="jumbotron login" id="div-form">
			  <form id="form-registro" method="POST" action="">
			  	<p>¿Aun no haces parte? !Registra tu empresa!</p>
				  <label> Nombre:</label>
				  <input id="nombre" name="nombre" type="text" class="form-control" placeholder="">
				  <label> Descripcion:</label>
				  <input id="descripcion" name="descripcion" type="text" class="form-control" placeholder="">				  
				  <label> Direccion:</label>
				  <input id="direccion" name="direccion" type="text" class="form-control" placeholder="">
				  <label> Url:</label>
				  <input id="url" name="url" type="text" class="form-control" placeholder="">				  
				  <br>
				  <button type="submit" class="btn btn-success">Registrar</button>
			  </form>
			</div>
		</div>
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