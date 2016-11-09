function obtenerValoresObjetos(){
	txtCodigoMatrimonio= $("#txtCodigoMatrimonio").val();
	txtEsposo = $("#txtEsposo").val();
	txtEsposa = $("#txtEsposa").val();
	txtSacerdote = $("#txtSacerdote").val();
}

function limpiarObjetos(){
	$("#txtCodigoMatrimonio").val("");
	$("#txtEsposo").val("");
	$("#txtEsposa").val("");
	$("#txtSacerdote").val("");
	$("#txtEsposo").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idMatrimonio, idEsposo, idEsposa, idSacerdote){
	$("#txtCodigoMatrimonio").val(idMatrimonio);
	$("#txtEsposo").val(idEsposo);
	$("#txtEsposa").val(idEsposa);
	$("#txtSacerdote").val(idSacerdote);
	$("#txtEsposo").focus();
}


function insertarDatos(){ //inicio de función insertarDatos
	obtenerValoresObjetos();
	if(txtSacerdote ==''){
alert("Digite el nombre del Sacerdote...");
limpiarObjetos();
	}else if(!isNaN(txtSacerdote)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else if(txtEsposo == '' || txtEsposa== ''){
		alert("Digite el nombre del Cónyugue...");
		limpiarObjetos();
	}else if(!isNaN(txtEsposo) || !isNaN(txtEsposa)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/matrimonios.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtEsposo:txtEsposo, txtEsposa:txtEspsa,
			 	txtSacerdote:txtSacerdote, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("Nombre del Cónyugue ya existe...");
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

	 if(!isNaN(txtCodigoMatrimonio) || isNaN(txtEsposo) || isNaN(txtEsposa) || isNaN(txtSacerdote)){
		$.ajax(
		{url:"../php/matrimonios.php",
		cache:false,
		type:"POST",
		data:{txtCodigoMatrimonio:txtCodigoMatrimonio,
		txtEsposo:txtEsposo, txtEsposa:txtEsposa,
		txtSacerdote:txtSacerdote,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrar").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoMatrimonio)){
		alert("Caracter inválido");
		$("#txtCodigoMatrimonio").val("");
		$("#txtCodigoMatrimonio").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoMatrimonio == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoMatrimonio").focus();
		}else if (txtEsposo == ''  || txtEsposa== ''){
			alert("Seleccione un Cónyugue...");
			$("#txtEsposo").focus();
		}else{
			$.ajax(
				{url:"../php/matrimonios.php",
				cache:false,
				type:"POST",
				data:{txtCodigoMatrimonio:txtCodigoMatrimonio,
				 txtEsposo:txtEsposo, txtEsposa:txtEsposa,
				 txtSacerdote:txtSacerdote, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Cónyugue ya existe...");
				 		$("#txtEsposo").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtEsposo").focus();
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
		if(txtCodigoMatrimonio == ''){
			alert("Seleccione un registro...");
			$("#txtEsposo").focus();
		}else {
			$.ajax(
			{url:"../php/matrimonios.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoMatrimonio:txtCodigoMatrimonio, accion:'eliminar'},
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