function obtenerValoresObjetos(){
	txtCodigoTelefono = $("#txtCodigoTelefono").val();
	txtTipoTelefono = $("#txtTipoTelefono").val(); 
}

function limpiarObjetos(){
	$("#txtCodigoTelefono").val("");
	$("#txtTipoTelefono").val("");
	$("#txtTipoTelefono").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idTelefono, tipoTelefono){
	$("#txtCodigoTelefono").val(idTelefono);
	$("#txtTipoTelefono").val(tipoTelefono);
	$("#txtTipoTelefono").focus();
}


function insertarDatos(){ //inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtTipoTelefono == ''){
		alert("Digite el Tipo de Telefono");
		limpiarObjetos();
	}else if(!isNaN(txtTipoTelefono)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/telefono.php",
			 cahe:false,
			 type:"POST",
			 data:{txtTipoTelefono:txtTipoTelefono, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("El Tipo de Telefono ya existe...");
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
	 if(!isNaN(txtCodigoTelefono) || isNaN(txtTipoTelefono)){
		$.ajax(
		{url:"../php/telefono.php",
		cache:false,
		type:"POST",
		data:{txtCodigoTelefono:txtCodigoTelefono,
		txtTipoTelefono:txtTipoTelefono,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrar").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoTelefono)){
		alert("Caracter inválido");
		$("#txtCodigoTelefono").val("");
		$("#txtCodigoTelefono").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoTelefono == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoTelefono").focus();
		}else if (txtTipoTelefono == ''){
			alert("Seleccione un Sacramento...");
			$("#txtTipoTelefono").focus();
		}else{
			$.ajax(
				{url:"../php/telefono.php",
				cache:false,
				type:"POST",
				data:{txtCodigoTelefono:txtCodigoTelefono,
				 txtTipoTelefono:txtTipoTelefono, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El Tipo de Telefono ya existe...");
				 		$("#txtTipoTelefono").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtTipoTelefono").focus();
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
		if(txtCodigoTelefono == ''){
			alert("Seleccione un registro...");
			$("#txtTipoTelefono").focus();
		}else {
			$.ajax(
			{url:"../php/telefono.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoTelefono:txtCodigoTelefono, accion:'eliminar'},
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

