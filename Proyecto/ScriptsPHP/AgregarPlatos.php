<?php
$id=$_POST['id'];
$nombre = $_POST['nombre'];
$ingredientes = $_POST['ingredientes'];
$valor=$_POST['valor'];
$estado=$_POST['estado'];
$adicional=$_POST['adicional'];
$idTipoPlato=$_POST['idTipoPlato'];

$connect = mysql_connect('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die('No se puede conectar: ' . mysql_error());
mysql_select_db('u798245532_proy');

$query = "INSERT INTO platos (Id ,Nombre ,Ingredientes, Valor, Estado, Adicional, idTipoPlato)
VALUES ('" . $id . "' , '" . $nombre . "', '" . $ingredientes . "', '".$valor."',
		'".$estado."', '".$adicional."', '".$idTipoPlato."');";
echo $query;
$q = mysql_query($query, $connect) or die
                ("Error Plato" . mysql_error());
?>