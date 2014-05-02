<?php

session_start();

$nombre = $_POST['nombre'];
$idTipoPlato = $_POST['idTipoPlato'];

echo $nombre." ".$idTipoPlato."\n";

$connect = mysql_connect('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') or die('No se puede conectar: ' . mysql_error());
mysql_select_db('u798245532_proy');

$query = "INSERT INTO Tipo_Plato (idTipoPlato ,Nombre ,Nit_Empresa)
VALUES ('" . $idTipoPlato . "' , '" . $nombre . "', '" . $_SESSION['nitEmpresa'] . "');";
echo $query;
$q = mysql_query($query, $connect) or die
                ("Error Tipo De Plato" . mysql_error());
?>