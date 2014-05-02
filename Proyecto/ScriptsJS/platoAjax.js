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
function enviarDatosPlato(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  id=document.getElementById('id').value;  
  nombre=document.getElementById('nombre').value;
  ingredientes=document.getElementById('ingredientes').value;
  valor=document.getElementById('valor').value;
  estadoField=document.getElementById('estado');
  estado=estadoField.options[estadoField.selectedIndex].value;
  adicional=document.getElementById('adicional').value;
  idTipoPlatofield=document.getElementById('tipoPlato');
  idTipoPlato=idTipoPlatofield.options[idTipoPlatofield.selectedIndex].value;

  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "/Proyecto/ScriptsPHP/AgregarPlatos.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
  	  //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState===4) {
    		//mostrar resultados en esta capa
  		// divResultado.innerHTML = ajax.responseText
    		//llamar a funcion para limpiar los inputs                
  		actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarPlatos.php');
                LimpiarCampos();
                //alert(ajax.responseText);                
  	}    
  }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("id="+id+"&nombre="+nombre+"&ingredientes="+ingredientes+"&valor="+valor+"&estado="
    +estado+"&adicional="+adicional+"&idTipoPlato="+idTipoPlato);
}

function desactivarPlato(id){
  id = id;
  
  ajax=objetoAjax();
  
  ajax.open("POST", "/Proyecto/ScriptsPHP/DesactivarPlato.php",true);  
  ajax.onreadystatechange=function() {
    if (ajax.readyState===4) {
      actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarPlatos.php');
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+id);
}

function activarPlato(id){
  id = id;
  
  ajax=objetoAjax();
  
  ajax.open("POST", "/Proyecto/ScriptsPHP/ActivarPlato.php",true);  
  ajax.onreadystatechange=function() {
    if (ajax.readyState===4) {
      actualizar('#resultado', '/Proyecto/ScriptsPHP/ConsultarPlatos.php');
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+id);
}

function preEditarTipo(nombre, idTipoPlato){
  document.getElementById('nombre').value = nombre;
  document.getElementById('idTipoPlato').value = idTipoPlato;
  actualizar('#BotonPlato', '/Proyecto/AdminEmpresa/BotonPlato.html');

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
  ajax.open("POST", "/Proyecto/ScriptsPHP/EditarPlato.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
      //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState===4) {
        //mostrar resultados en esta capa
      // divResultado.innerHTML = ajax.responseText
        //llamar a funcion para limpiar los inputs
      actualizar('#container', '/Proyecto/AdminEmpresa/AgregarPlatos.html')
    }    
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("nombre="+nombre+"&idTipoPlato="+idTipoPlato);
}

//función para limpiar los campos
function LimpiarCampos(){
  document.getElementById('id').value="";  
  document.getElementById('nombre').value="";
  document.getElementById('ingredientes').value="";
  document.getElementById('valor').value="";
  document.getElementById('adicional').value="";
}