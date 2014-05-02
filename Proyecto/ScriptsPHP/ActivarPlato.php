<?php
$id=$_POST['id'];

$connect = mysql_connect('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die('No se puede conectar: ' . mysql_error());
mysql_select_db('u798245532_proy');

$query = "UPDATE platos SET Estado = 'habilitado' WHERE platos.Id ='".$id."';";
$q = mysql_query($query, $connect) or die('Error en la consulta' . mysql_error());

?>
