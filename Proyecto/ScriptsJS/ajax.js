// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatos(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  nombre=document.nuevaEmpresa.nombre.value;
  nit=document.nuevaEmpresa.nit.value;
  url=document.nuevaEmpresa.url.value;
  direccion=document.nuevaEmpresa.direccion.value;
  telefono=document.nuevaEmpresa.telefono.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "/Proyecto/ScriptsPHP/AgregarEmpresa.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
  	  //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
    		//mostrar resultados en esta capa
  		// divResultado.innerHTML = ajax.responseText
    		//llamar a funcion para limpiar los inputs
  		LimpiarCampos();
      actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultaEmpresas.php');
  	}    
  }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("nombre="+nombre+"&nit="+nit+"&url="+url+"&direccion="+direccion+"&telefono="+telefono)
}

function eliminar(nit){
  nit = nit;
  ajax=objetoAjax();
  ajax.open("POST", "/Proyecto/ScriptsPHP/EliminarEmpresa.php",true);

  ajax.onreadystatechange=function() {
    if (ajax.readyState==4) {
      actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultaEmpresas.php');
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("nit="+nit)
}

function preEditar(nombre, nit, url, direccion, telefono){
  document.nuevaEmpresa.nombre.value = nombre;
  document.nuevaEmpresa.nit.value = nit;
  document.nuevaEmpresa.url.value = url;
  document.nuevaEmpresa.direccion.value = direccion;
  document.nuevaEmpresa.telefono.value = telefono;

  actualizar('#botonEmpresa', '/Proyecto/AdminSistema/BotonEmpresa.html');

}

// function preEditar(nombre, nit, url, direccion, telefono){
//   nombre=nombre;
//   nit=nit;
//   url=url;
//   direccion=direccion;
//   telefono=telefono;

//   ajax=objetoAjax();
 
//   //uso del medotod POST
//   //archivo que realizará la operacion
//   //registro.php
//   ajax.open("POST", "/Proyecto/ScriptsPHP/PreEditarEmpresa.php",true);
//   //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
//   ajax.onreadystatechange=function() {
//       //la función responseText tiene todos los datos pedidos al servidor
//     if (ajax.readyState==4) {
//         //mostrar resultados en esta capa
//       // divResultado.innerHTML = ajax.responseText
//         //llamar a funcion para limpiar los inputs
//       actualizar('#formularioEmpresas', '/Proyecto/ScriptsPHP/PreEditarEmpresa.php');
//     }    
//   }
//   ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//   //enviando los valores a registro.php para que inserte los datos
//   ajax.send("nombre="+nombre+"&nit="+nit+"&url="+url+"&direccion="+direccion+"&telefono="+telefono)
// }

function editar(){
 
  //div donde se mostrará lo resultados
  //recogemos los valores de los inputs
  nombre=document.nuevaEmpresa.nombre.value;
  nit=document.nuevaEmpresa.nit.value;
  url=document.nuevaEmpresa.url.value;
  direccion=document.nuevaEmpresa.direccion.value;
  telefono=document.nuevaEmpresa.telefono.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "/Proyecto/ScriptsPHP/EditarEmpresa.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
      //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
        //mostrar resultados en esta capa
      // divResultado.innerHTML = ajax.responseText
        //llamar a funcion para limpiar los inputs
      actualizar('#container', '/Proyecto/AdminSistema/AgregarEmpresa.html')
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("nombre="+nombre+"&nit="+nit+"&url="+url+"&direccion="+direccion+"&telefono="+telefono)
}
 
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevaEmpresa.nombre.value="";
  document.nuevaEmpresa.nit.value="";
  document.nuevaEmpresa.url.value="";
  document.nuevaEmpresa.direccion.value="";
  document.nuevaEmpresa.telefono.value="";
}