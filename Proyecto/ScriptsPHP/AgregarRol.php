<?php
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$pass = $_POST['pass'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('u798245532_proy');

$query="INSERT INTO empresas(Cedula,Nombre_usuario,Pasword,Nit_Empresa,Id_Tipo) VALUES ('".$cedula."','".$nombre."','".$pass."','".$direccion."','".$telefono."');";
$q= mysql_query($query, $connect) or die ('Error en el insert');
?>