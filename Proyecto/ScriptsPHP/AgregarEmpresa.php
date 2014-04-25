<?php
$nombre = $_POST['nombre'];
$nit = $_POST['nit'];
$url = $_POST['url'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('u798245532_proy');

$query="INSERT INTO empresas(NIT,Nombre,URL,Direccion,Telefono) VALUES ('".$nit."','".$nombre."','".$url."','".$direccion."','".$telefono."');";
$q= mysql_query($query, $connect) or die ('Error en el insert');
?>