function obtenerValoresObjetos(){
	txtCodigoSacramento= $("#txtCodigoSacramento").val();
	txtNombreSacramento = $("#txtNombreSacramento").val();
}

function limpiarObjetos(){
	$("#txtCodigoSacramento").val("");
	$("#txtNombreSacramento").val("");
	$("#txtNombreSacramento").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrarSacra").html("");
}

function subirDatos(idSacramento, nombreSacramento){
	$("#txtCodigoSacramento").val(idSacramento);
	$("#txtNombreSacramento").val(nombreSacramento);
	$("#txtNombreSacramento").focus();
}


function insertarDatos(){ //inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreSacramento == ''){
		alert("Digite el nombre del Sacramento");
		limpiarObjetos();
	}else if(!isNaN(txtNombreSacramento)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/sacramento.php",
			 cahe:false,
			 type:"POST",
			 data:{txtNombreSacramento:txtNombreSacramento, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("Nombre del Sacramento ya existe...");
					limpiarObjetos();
				}else if(resultado == 1){
					alert("Datos guardados exitosamente");
					limpiarObjetos();
				}
			}});
	}
} //fin de función insertarDatos

function buscarDatos(){ //inicio de función buscarDatos
	obtenerValoresObjetos();
	/**/

	 if(!isNaN(txtCodigoSacramento) || isNaN(txtNombreSacramento)){
		$.ajax(
		{url:"../php/sacramento.php",
		cache:false,
		type:"POST",
		data:{txtCodigoSacramento:txtCodigoSacramento,
		txtNombreSacramento:txtNombreSacramento,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrarSacra").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoSacramento)){
		alert("Caracter inválido");
		$("#txtCodigoSacramento").val("");
		$("#txtCodigoSacramento").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoSacramento == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoSacramento").focus();
		}else if (txtNombreSacramento == ''){
			alert("Seleccione un Sacramento...");
			$("#txtNombreSacramento").focus();
		}else{
			$.ajax(
				{url:"../php/sacramento.php",
				cache:false,
				type:"POST",
				data:{txtCodigoSacramento:txtCodigoSacramento,
				 txtNombreSacramento:txtNombreSacramento, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Sacramento ya existe...");
				 		$("#txtNombreSacramento").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreSacramento").focus();
				 	}
				 }});
		}
	}
	else{
		alert("Proceso cancelado...");
		limpiarObjetos();
	}
}//fin de función modificarDatos*/

function eliminarDatos(){
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea eliminar los datos?");
	if(confirmar == true){
		if(txtCodigoSacramento == ''){
			alert("Seleccione un registro...");
			$("#txtNombreSacramento").focus();
		}else {
			$.ajax(
			{url:"../php/sacramento.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoSacramento:txtCodigoSacramento, accion:'eliminar'},
			 success: function(resultado){
			 	if(resultado == 1){
			 		limpiarObjetos();
			 		alert("Datos eliminados exitosamente...");
			 	}else{
			 		limpiarObjetos();
			 		alert("No se pudo realizar la operación...");
			 	}
			 }});
		}
	}
	else {
		alert("Proceso cancelado...");
		limpiarObjetos();
	}
}