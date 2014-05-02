<?php
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$password = $_POST['password'];
$Id_Tipo= $_POST['idTipo'];
$Nit_Empresa= $_SESSION['nitEmpresa'];

$connect = mysql_connect ('localhost', 'root', 'toor') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('proyecto');

$query="INSERT INTO empresas(Cedula,Nombre_usuario,Pasword,Nit_Empresa,Id_Tipo) VALUES 
('".$cedula."','".$nombre."','".$password."','".$Nit_Empresa."','".$Id_Tipo."');";
$q= mysql_query($query, $connect) or die ('Error en el insert');
?>