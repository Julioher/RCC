function obtenerValoresObjetos(){
	txtCodigoConfirma= $("#txtCodigoConfirma").val();
	txtNombreConfirmado = $("#txtNombreConfirmado").val();
	txtSacerdote = $("#txtSacerdote").val();
}

function limpiarObjetos(){
	$("#txtCodigoConfirma").val("");
	$("#txtNombreConfirmado").val("");
	$("#txtSacerdote").val("");
	$("#txtNombreConfirmado").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idConfirmacion, idConfirmante, idSacerdote){
	$("#txtCodigoConfirma").val(idConfirmacion);
	$("#txtNombreConfirmado").val(idConfirmante);
	$("#txtSacerdote").val(idSacerdote);
	$("#txtNombreConfirmado").focus();
}


function insertarDatos(){ //inicio de función insertarDatos
	obtenerValoresObjetos();
	if(txtSacerdote ==''){
alert("Digite el nombre del Sacerdote...");
limpiarObjetos();
	}else if(!isNaN(txtSacerdote)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}
	else if(txtNombreConfirmado == ''){
		alert("Digite el nombre del Confirmado...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreConfirmado)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/confirmaciones.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreConfirmado:txtNombreConfirmado,
			 	txtSacerdote:txtSacerdote, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("Nombre del Confirmado ya existe...");
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

	 if(!isNaN(txtCodigoConfirma) || isNaN(txtNombreConfirmado) || isNaN(txtSacerdote)){
		$.ajax(
		{url:"../php/confirmaciones.php",
		cache:false,
		type:"POST",
		data:{txtCodigoConfirma:txtCodigoConfirma,
		txtNombreConfirmado:txtNombreConfirmado,
		txtSacerdote:txtSacerdote,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrar").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoConfirma)){
		alert("Caracter inválido");
		$("#txtCodigoConfirma").val("");
		$("#txtCodigoConfirma").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoConfirma == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoConfirma").focus();
		}else if (txtNombreConfirmado == ''){
			alert("Seleccione un Bautizado...");
			$("#txtNombreConfirmado").focus();
		}else{
			$.ajax(
				{url:"../php/confirmaciones.php",
				cache:false,
				type:"POST",
				data:{txtCodigoConfirma:txtCodigoConfirma,
				 txtNombreConfirmado:txtNombreConfirmado,
				 txtSacerdote:txtSacerdote, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Bautizado ya existe...");
				 		$("#txtNombreConfirmado").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreConfirmado").focus();
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
		if(txtCodigoConfirma == ''){
			alert("Seleccione un registro...");
			$("#txtNombreConfirmado").focus();
		}else {
			$.ajax(
			{url:"../php/confirmaciones.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoConfirma:txtCodigoConfirma, accion:'eliminar'},
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