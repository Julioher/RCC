
function obtenerValoresObjetos(){
	txtCodigoCargo = $("#txtCodigoCargo").val();
	txtNombreCargo = $("#txtNombreCargo").val();
	cmbEstadoCargo = $("#cmbEstadoCargo").val();
}

function limpiarObjetos(){
	$("#txtCodigoCargo").val("");
	$("#txtNombreCargo").val("");
	$("#cmbEstadoCargo").val("");
	$("#txtNombreCargo").focus();

}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idCargo, nombreCargo, estadoCargo){
	$("#txtCodigoCargo").val(idCargo);
	$("#txtNombreCargo").val(nombreCargo);
	$("#cmbEstadoCargo").val(estadoCargo);
	$("#txtNombreCargo").focus();
}

function insertarDatos(){//inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreCargo == '' ){
		alert("Digite el nombre del cargo...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreCargo)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else if(isNaN(txtNombreCargo) && cmbEstadoCargo == false){
		alert("Seleccione el estado...");
	}else{
		$.ajax(
			{url:"../php/cargos.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreCargo:txtNombreCargo,
				cmbEstadoCargo:cmbEstadoCargo,
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
	if(!isNaN(txtCodigoCargo) || isNaN(txtNombreCargo)){
		$.ajax(
		{url:"../php/cargos.php",
		 cache:false,
		 type:"POST",
		 data:{
		 	txtNombreCargo:txtNombreCargo,
		 	cmbEstadoCargo:cmbEstadoCargo,
		 	 accion:'buscar'},
		 	success:function(resultado){
		 		$("#mostrar").html(resultado);
		 		limpiarObjetos();
		 	}});
	}else{
		if(isNaN(txtCodigoCargo)){
		alert("Caracter inválido");
		$("#txtCodigoCargo").val("");
		$("#txtCodigoCargo").focus();
		}  
	}
}//fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoCargo == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoCargo").focus();
		}else if (txtNombreCargo == '' ){
			alert("Seleccione un cargo...");
			$("#txtNombreCargo").focus();
		}else{
			$.ajax(
				{url:"../php/cargos.php",
				cache:false,
				type:"POST",
				data:{
				txtCodigoCargo:txtCodigoCargo,
				 txtNombreCargo:txtNombreCargo,
				 cmbEstadoCargo:cmbEstadoCargo,
				  accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del cargo ya existe...");
				 		$("#txtNombreCargo").focus();
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
		if(txtCodigoCargo == ''){
			alert("Seleccione un registro...");
			$("#txtNombreCargo").focus();
		}else {
			$.ajax(
			{url:"../php/cargos.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoCargo:txtCodigoCargo, accion:'eliminar'},
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

