<?php
$cedula = $_POST['cedula'];

$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('u798245532_proy');

$query="DELETE FROM empleados WHERE Cedula='".$cedula."';";
$q= mysql_query($query, $connect) or die ('Error en el delete'.mysql_error());
?>