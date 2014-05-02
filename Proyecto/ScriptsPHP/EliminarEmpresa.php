<?php
$nit = $_POST['nit'];

$connect = mysql_connect ('localhost', 'root', 'toor') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('proyecto');

$query="DELETE FROM empresas WHERE NIT='".$nit."';";
$q= mysql_query($query, $connect) or die ('Error en el delete');
?>