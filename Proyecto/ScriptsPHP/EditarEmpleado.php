<?php
session_start();

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$password = $_POST['password'];
$Id_Tipo= $_POST['idTipo'];

$connect = mysql_connect ('mysql.hostinger.com.ar', 'u798245532_proy', 'practica01') 
or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('u798245532_proy');

$query="UPDATE empleados SET Cedula='".$cedula."', Nombre_usuario='".$nombre."', Password='".$password."', 
Nit_Empresa='".$_SESSION['nitEmpresa']."', ID_Tipo='".$Id_Tipo."' WHERE Cedula='".$cedula."';";
$q= mysql_query($query, $connect) or die ('Error en el update'.mysql_error());
?>