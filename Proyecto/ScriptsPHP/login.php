<?php
session_start();
$usuario = $_POST['user'];
$contraseña = $_POST['pass'];

$connect = mysql_connect ('localhost', 'root', 'toor') or die ('No se puede conectar: ' . mysql_error());
mysql_select_db ('proyecto');

$query="SELECT ID_Tipo,Nit_Empresa FROM empleados WHERE Nombre_usuario='".$usuario."' and Password='".$contraseña."'";
$q= mysql_query($query) or die ('Error en la carga de datos');

try{
	//if (mysql_result($q, 0)){			
		//$_SESSION['tipo'] = mysql_result($q, 0);
		//$_SESSION['nitEmpresa'] = mysql_result($q, 1);
		//$_SESSION['usuario'] = $_POST['user'];
	while($row=mysql_fetch_row($q)){
		$_SESSION['tipo']=$row[0];
		$_SESSION['nitEmpresa']=$row[1];
		$_SESSION['usuario'] = $_POST['user'];
		switch ($_SESSION['tipo']) {
			case "1":
				header('Location: /Proyecto/AdminSistema/AdminSistema.php');
				break;
			case "2":
				header('Location: http://sge.local/SGE/Proyecto/AdminEmpresa/AdminEmpresa.php');
				break;
			case "4":
				header('Location: /Proyecto/Cajero/Cajero.php');
				break;
		}
	}//else{		
		//echo("ERROR");
	//}
}catch(Exception $error){}
?>