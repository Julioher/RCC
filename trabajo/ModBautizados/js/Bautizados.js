function obtenerValoresObjetos(){
	txtCodigoBautismo= $("#txtCodigoBautismo").val();
	txtCodigoFeligres= $("#txtCodigoFeligres").val();
	txtNombreBautizado = $("#txtNombreBautizado").val();
	txtSacerdote = $("#txtSacerdote").val();
	txtNombrePadre = $("#txtNombrePadre").val();
	txtNombreMadre = $("#txtNombreMadre").val();
	txtNombrePadrino = $("#txtNombrePadrino").val();
	txtNombreMadrina = $("#txtNombreMadrina").val();
}

function limpiarObjetos(){
	$("#txtCodigoBautismo").val("");
	$("#txtCodigoFeligres").val("");
	$("#txtNombreBautizado").val("");
	$("#txtSacerdote").val("");
	$("#txtNombrePadre").val("");
	$("#txtNombreMadre").val("");
	$("#txtNombrePadrino").val("");
	$("#txtNombreMadrina").val("");
	$("#txtNombreBautizado").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idBautismo,idFeligres, apellidoCasada,  pApellido, sApellido, pNombre, sNombre){
	$("#txtCodigoBautismo").val(idSacramento);
	$("#txtCodigoFeligres").val(idFeligres);
	$("#txtNombreBautizado").val(apellidoCasada+" "+pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
	$("#txtSacerdote").val(idSacerdote);
	$("#txtNombrePadre").val(pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
	$("#txtNombreMadre").val(pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
	$("#txtNombrePadrino").val(pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
	$("#txtNombreMadrina").val(pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
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
			 	txtCodigoFeligres:txtCodigoFeligres,
			 	txtSacerdote:txtSacerdote, txtNombrePadre:txtNombrePadre,
			 	txtNombreMadre:txtNombrePadre, txtNombrePadrino:txtNombrePadrino,
			 	txtNombreMadrina:txtNombreMadrina, accion:'insertar'},
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
		data:{
			txtCodigoBautismo:txtCodigoBautismo,
			txtCodigoFeligres:txtCodigoFeligres,
			txtNombreBautizado:txtNombreBautizado,
			txtSacerdote:txtSacerdote,txtNombrePadre:txtNombrePadre,
			txtNombreMadre:txtNombrePadre, txtNombrePadrino:txtNombrePadrino,
			txtNombreMadrina:txtNombreMadrina, accion:'buscar'},
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
				 txtSacerdote:txtSacerdote,txtNombrePadre:txtNombrePadre,
			 	txtNombreMadre:txtNombrePadre, txtNombrePadrino:txtNombrePadrino,
			 	txtNombreMadrina:txtNombreMadrina, accion:'modificar'},
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