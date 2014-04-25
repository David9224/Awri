<?php
$nit = $_POST['nit'];

$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('u798245532_proy');

$query="DELETE FROM empresas WHERE NIT='".$nit."';";
$q= mysql_query($query, $connect) or die ('Error en el delete');
?>