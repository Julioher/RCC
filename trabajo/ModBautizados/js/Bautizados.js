function obtenerValoresObjetos(){
	txtCodigoBautismo= $("#txtCodigoBautismo").val();
	txtNombreBautizado = $("#txtNombreBautizado").val();
	txtSacerdote = $("#txtSacerdote").val();
}

function limpiarObjetos(){
	$("#txtCodigoBautismo").val("");
	$("#txtNombreBautizado").val("");
	$("#txtSacerdote").val("");
	$("#txtNombreBautizado").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idBautismo, idBautizado, idSacerdote){
	$("#txtCodigoBautismo").val(idSacramento);
	$("#txtNombreBautizado").val(nombreSacramento);
	$("#txtSacerdote").val(idSacerdote);
	$("#txtNombreBautizado").focus();
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
	else if(txtNombreBautizado == ''){
		alert("Digite el nombre del Bautizante");
		limpiarObjetos();
	}else if(!isNaN(txtNombreBautizado)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/Bautizados.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreBautizado:txtNombreBautizado,
			 	txtSacerdote:txtSacerdote, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("Nombre del Bautizado ya existe...");
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

	 if(!isNaN(txtCodigoBautismo) || isNaN(txtNombreBautizado) || isNaN(txtSacerdote)){
		$.ajax(
		{url:"../php/Bautizados.php",
		cache:false,
		type:"POST",
		data:{txtCodigoBautismo:txtCodigoBautismo,
		txtNombreBautizado:txtNombreBautizado,
		txtSacerdote:txtSacerdote,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrar").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoBautismo)){
		alert("Caracter inválido");
		$("#txtCodigoBautismo").val("");
		$("#txtCodigoBautismo").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoBautismo == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoBautismo").focus();
		}else if (txtNombreBautizado == ''){
			alert("Seleccione un Bautizado...");
			$("#txtNombreBautizado").focus();
		}else{
			$.ajax(
				{url:"../php/Bautizados.php",
				cache:false,
				type:"POST",
				data:{txtCodigoBautismo:txtCodigoBautismo,
				 txtNombreBautizado:txtNombreBautizado,
				 txtSacerdote:txtSacerdote, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Bautizado ya existe...");
				 		$("#txtNombreBautizado").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreBautizado").focus();
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
		if(txtCodigoBautismo == ''){
			alert("Seleccione un registro...");
			$("#txtNombreBautizado").focus();
		}else {
			$.ajax(
			{url:"../php/Bautizados.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoBautismo:txtCodigoBautismo, accion:'eliminar'},
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