function obtenerValoresObjetos(){
	txtCodigoComunion= $("#txtCodigoComunion").val();
	txtNombreComunante = $("#txtNombreComunante").val();
	txtSacerdote = $("#txtSacerdote").val();
}

function limpiarObjetos(){
	$("#txtCodigoComunion").val("");
	$("#txtNombreComunante").val("");
	$("#txtSacerdote").val("");
	$("#txtNombreComunante").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idComunion,  	idComunante, idSacerdote){
	$("#txtCodigoComunion").val(idComunion);
	$("#txtNombreComunante").val(idComunante);
	$("#txtSacerdote").val(idSacerdote);
	$("#txtNombreComunante").focus();
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
	else if(txtNombreComunante == ''){
		alert("Digite el nombre del Comunante");
		limpiarObjetos();
	}else if(!isNaN(txtNombreComunante)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else{
		$.ajax(
			{url:"../php/comuniones.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreComunante:txtNombreComunante,
			 	txtSacerdote:txtSacerdote, accion:'insertar'},
			 success:function(resultado){
				if(resultado == 0){
					alert("Nombre del Comunante ya existe...");
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

	 if(!isNaN(txtCodigoComunion) || isNaN(txtNombreComunante) || isNaN(txtSacerdote)){
		$.ajax(
		{url:"../php/comuniones.php",
		cache:false,
		type:"POST",
		data:{txtCodigoComunion:txtCodigoComunion,
		txtNombreComunante:txtNombreComunante,
		txtSacerdote:txtSacerdote,
		accion:'buscar'},
		 success:function(resultado){
		 	$("#mostrar").html(resultado);
		 	limpiarObjetos();
		 }});	
	}else{
		if(isNaN(txtCodigoComunion)){
		alert("Caracter inválido");
		$("#txtCodigoComunion").val("");
		$("#txtCodigoComunion").focus();
	}
	
	  
	}
	
		
} //fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoComunion == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoComunion").focus();
		}else if (txtNombreComunante == ''){
			alert("Seleccione un Bautizado...");
			$("#txtNombreComunante").focus();
		}else{
			$.ajax(
				{url:"../php/comuniones.php",
				cache:false,
				type:"POST",
				data:{txtCodigoComunion:txtCodigoComunion,
				 txtNombreComunante:txtNombreComunante,
				 txtSacerdote:txtSacerdote, accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Bautizado ya existe...");
				 		$("#txtNombreComunante").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreComunante").focus();
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
		if(txtCodigoComunion == ''){
			alert("Seleccione un registro...");
			$("#txtNombreComunante").focus();
		}else {
			$.ajax(
			{url:"../php/comuniones.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoComunion:txtCodigoComunion, accion:'eliminar'},
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