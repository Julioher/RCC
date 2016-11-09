
function obtenerValoresObjetos(){
	txtCodigoMinisterio = $("#txtCodigoMinisterio").val();
	txtNombreMinisterio = $("#txtNombreMinisterio").val();
	cmbEstadosMinisterio = $("#cmbEstadosMinisterio").val();
}

function limpiarObjetos(){
	$("#txtCodigoMinisterio").val("");
	$("#txtNombreMinisterio").val("");
	$("#cmbEstadosMinisterio").val("");
	$("#txtNombreMinisterio").focus();

}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idMinisterio, nombreMinisterio, estadoRegistro){
	$("#txtCodigoMinisterio").val(idMinisterio);
	$("#txtNombreMinisterio").val(nombreMinisterio);
	$("#cmbEstadosMinisterio").val(estadoRegistro);
	$("#txtNombreMinisterio").focus();
}

function insertarDatos(){//inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreMinisterio == '' ){
		alert("Digite el nombre del ministerio...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreMinisterio)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else if(isNaN(txtNombreMinisterio) && cmbEstadosMinisterio == ''){
		alert("Seleccione el estado...");
	}else{
		$.ajax(
			{url:"../php/ministerio.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtCodigoMinisterio:txtCodigoMinisterio,
			 	txtNombreMinisterio:txtNombreMinisterio,
				cmbEstadosMinisterio:cmbEstadosMinisterio,
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
	if(!isNaN(txtCodigoMinisterio) || isNaN(txtNombreMinisterio)){
		$.ajax(
		{url:"../php/ministerio.php",
		 cache:false,
		 type:"POST",
		 data:{
		 	txtCodigoMinisterio:txtCodigoMinisterio,
		 	txtNombreMinisterio:txtNombreMinisterio,
		 	cmbEstadosMinisterio:cmbEstadosMinisterio,
		 	 accion:'buscar'},
		 	success:function(resultado){
		 		$("#mostrar").html(resultado);
		 		limpiarObjetos();
		 	}});
	}else{
		if(isNaN(txtCodigoMinisterio)){
		alert("Caracter inválido");
		$("#txtCodigoMinisterio").val("");
		$("#txtCodigoMinisterio").focus();
		}  
	}
}//fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoMinisterio == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoMinisterio").focus();
		}else if (txtNombreMinisterio == '' ){
			alert("Seleccione un Ministerio...");
			$("#txtNombreMinisterio").focus();
		}else{
			$.ajax(
				{url:"../php/ministerio.php",
				cache:false,
				type:"POST",
				data:{
				 txtCodigoMinisterio:txtCodigoMinisterio,
				 txtNombreMinisterio:txtNombreMinisterio,
				 cmbEstadosMinisterio:cmbEstadosMinisterio,
				  accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Ministerio ya existe...");
				 		$("#txtNombreMinisterio").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreMinisterio").focus();
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
		if(txtCodigoMinisterio == ''){
			alert("Seleccione un registro...");
			$("#txtNombreMinisterio").focus();
		}else {
			$.ajax(
			{url:"../php/ministerio.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoMinisterio:txtCodigoMinisterio, accion:'eliminar'},
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

