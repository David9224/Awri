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
 
if (!xmlhttp && typeof XMLHttpRequest!=='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosTipo(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs  
  nombre=document.getElementById('nombre').value;
  idTipoPlato=document.getElementById('idTipoPlato').value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "/Proyecto/ScriptsPHP/AgregarTipoPlato.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
  	  //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState===4) {
    		//mostrar resultados en esta capa
  		// divResultado.innerHTML = ajax.responseText
    		//llamar a funcion para limpiar los inputs                
  		actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarTipoPlato.php');
                LimpiarCampos();
                //alert(ajax.responseText);                
  	}    
  }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("nombre="+nombre+"&idTipoPlato="+idTipoPlato);
}

function eliminarTipo(idTipoPlato){
  idTipoPlato = idTipoPlato;
  ajax=objetoAjax();
  ajax.open("POST", "/Proyecto/ScriptsPHP/EliminarTipoPlato.php",true);

  ajax.onreadystatechange=function() {
    if (ajax.readyState===4) {
      actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarTipoPlato.php');
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("idTipoPlato="+idTipoPlato);
}

function preEditarTipo(nombre, idTipoPlato){
  document.getElementById('nombre').value = nombre;
  document.getElementById('idTipoPlato').value = idTipoPlato;
  actualizar('#BotonEmpleado', '/Proyecto/AdminEmpresa/BotonTipo.html');

}

function editarTipo(){
 
  //div donde se mostrará lo resultados
  //recogemos los valores de los inputs
  nombre=document.getElementById('nombre').value;
  idTipoPlato=document.getElementById('idTipoPlato').value;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "/Proyecto/ScriptsPHP/EditarTipoPlato.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
      //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState===4) {
        //mostrar resultados en esta capa
      // divResultado.innerHTML = ajax.responseText
        //llamar a funcion para limpiar los inputs
      actualizar('#container', '/Proyecto/AdminEmpresa/AgregarTipoPlato.html')
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("nombre="+nombre+"&idTipoPlato="+idTipoPlato);
}

//función para limpiar los campos
function LimpiarCampos(){
  document.getElementById('nombre').value ="";
  document.getElementById('idTipoPlato').value ="";
}