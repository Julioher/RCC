
function obtenerValoresObjetos(){
	txtCodigoNumeroTelefono = $("#txtCodigoNumeroTelefono").val();
	txtNombreNumeroTelefono = $("#txtNombreNumeroTelefono").val();
	txtNumeroTelefono = $("#txtNumeroTelefono").val();
	
}

function limpiarObjetos(){
	$("#txtCodigoNumeroTelefono").val("");
	$("#txtNombreNumeroTelefono").val("");
	$("#txtNumeroTelefono").val("");
	$("#txtNombreNumeroTelefono").focus();

}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idUsuario, idFeligres, usuario, clave, nivel){
	$("#txtCodigoNumeroTelefono").val(idUsuario);
	$("#txtNombreNumeroTelefono").val(idFeligres);
	$("#txtNumeroTelefono").val(usuario);
	$("#txtNombreNumeroTelefono").focus();
}

function insertarDatos(){//inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreNumeroTelefono == '' ){
		alert("Digite el nombre del feligrés...");
		limpiarObjetos();
	}if(txtNumeroTelefono == '' ){
		alert("Digite el número de teléfono...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreNumeroTelefono)|| isNaN(txtNumeroTelefono)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/numerosTelefonicos.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreNumeroTelefono:txtNombreNumeroTelefono,
				txtNumeroTelefono:txtNumeroTelefono,
				accion:'insertar'},
				success: function(resultado){
					if(resultado == 0){
						alert("El registro ya existe...");
						limpiarObjetos();
					}else if(resultado == 1){
						alert("Datos guardados exitosamente...");
						limpiarObjetos();
				 	} 
			 	}});
	}
	}//fin de función insertarDatos 

function buscarDatos(){//inicio de función buscarDatos
	obtenerValoresObjetos();
	if(!isNaN(txtCodigoNumeroTelefono) || isNaN(txtNombreNumeroTelefono)){
		$.ajax(
		{url:"../php/numerosTelefonicos.php",
		 cache:false,
		 type:"POST",
		 data:{
		 	txtNombreNumeroTelefono:txtNombreNumeroTelefono,
			txtNumeroTelefono:txtNumeroTelefono,
		 	 accion:'buscar'},
		 	success:function(resultado){
		 		$("#mostrar").html(resultado);
		 		limpiarObjetos();
		 	}});
	}else{
		if(isNaN(txtCodigoUsuario)){
		alert("Caracter inválido");
		$("#txtCodigoNumeroTelefono").val("");
		$("#txtCodigoNumeroTelefono").focus();
		}  
	}
}//fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoNumeroTelefono == ''){
			alert("Seleccione un registro...");
			$("#txtNombreNumeroTelefono").focus();
		}else if (txtNombreNumeroTelefono == '' ){
			alert("Digite un feligrés...");
			$("#txtNombreNumeroTelefono").focus();
		}else{
			$.ajax(
				{url:"../php/numerosTelefonicos.php",
				cache:false,
				type:"POST",
				data:{
				txtCodigoNumeroTelefono:txtCodigoNumeroTelefono,
				txtNombreNumeroTelefono:txtNombreNumeroTelefono,
				txtNumeroTelefono:txtNumeroTelefono,
				  accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El número telefónico ya existe...");
				 		$("#txtUsuario").focus();
				 		//limpiarDatos();
				 		
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		//$("#txtNombreCargo").focus();
				 		limpiarDatos();
				 	}
				}});
		
	}
}
	else{
		alert("Proceso cancelado...");
		limpiarObjetos();
	}

}//fin de función modificarDatos

function eliminarDatos(){ //inicio de función eliminarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea eliminar los datos?");
	if(confirmar == true){
		if(txtCodigoNumeroTelefono == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoNumeroTelefono").focus();
		}else {
			$.ajax(
			{url:"../php/numerosTelefonicos.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoNumeroTelefono:txtCodigoNumeroTelefono, accion:'eliminar'},
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
}//fin de función eliminarDatos

