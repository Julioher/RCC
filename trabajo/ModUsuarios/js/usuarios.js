
function obtenerValoresObjetos(){
	txtCodigoUsuario = $("#txtCodigoUsuario").val();
	txtCodigoFeligres = $("#txtCodigoFeligres").val();
	txtNombreUsuario = $("#txtNombreUsuario").val();
	txtUsuario = $("#txtUsuario").val();
	txtClaveUsuario = $("#txtClaveUsuario").val();
	cmbNivelUsuario = $("#cmbNivelUsuario").val();
}

function limpiarObjetos(){
	$("#txtCodigoUsuario").val("");
	$("#txtCodigoFeligres").val("");
	$("#txtNombreUsuario").val("");
	$("#txtUsuario").val("");
	$("#txtClaveUsuario").val("");
	$("#cmbNivelUsuario").val("");
	$("#txtNombreUsuario").focus();

}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idUsuario, idFeligres, pApellido, sApellido, pNombre, sNombre, usuario, nivel){
	$("#txtCodigoUsuario").val(idUsuario);
	$("#txtNombreUsuario").val(pApellido+" "+sApellido+" "+pNombre+" "+sNombre);
	$("#txtCodigoFeligres").val(idFeligres);
	$("#txtUsuario").val(usuario);
	$("#cmbNivelUsuario").val(nivel);
	$("#txtNombreUsuario").focus();
}

function insertarDatos(){//inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreUsuario == '' ){
		alert("Digite el nombre del feligrés...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreUsuario)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else if((isNaN(txtNombreUsuario)&& (txtUsuario==true)&&(txtClaveUsuario==true)
		) && cmbNivelUsuario == false){
		alert("Seleccione el estado...");
	}else{
		$.ajax(
			{url:"../php/usuarios.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtUsuario:txtUsuario,
				txtFeligres:txtCodigoFeligres,
				txtClaveUsuario:txtClaveUsuario,
				cmbNivelUsuario:cmbNivelUsuario,
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
	if(!isNaN(txtCodigoUsuario) || isNaN(txtNombreUsuario)){
		$.ajax(
		{url:"../php/usuarios.php",
		 cache:false,
		 type:"POST",
		 data:{
		 	txtNombreUsuario:txtNombreUsuario,
			txtUsuario:txtUsuario,
			txtClaveUsuario:txtClaveUsuario,
			cmbNivelUsuario:cmbNivelUsuario,
		 	 accion:'buscar'},
		 	success:function(resultado){
		 		$("#mostrar").html(resultado);
		 		limpiarObjetos();
		 	}});
	}else{
		if(isNaN(txtCodigoUsuario)){
		alert("Caracter inválido");
		$("#txtCodigoUsuario").val("");
		$("#txtCodigoUsuario").focus();
		}  
	}
}//fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoUsuario == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoUsuario").focus();
		}else if (txtUsuario == '' ){
			alert("Digite un usuario...");
			$("#txtUsuario").focus();
		}else{
			$.ajax(
				{url:"../php/usuarios.php",
				cache:false,
				type:"POST",
				data:{
				txtCodigoUsuario:txtCodigoUsuario,
				//stxtCodigoFeligres:txtCodigoFeligres,
				//txtUsuario:txtUsuario,
				//txtClaveUsuario:txtClaveUsuario,
				cmbNivelUsuario:cmbNivelUsuario,
				  accion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El usuario ya existe...");
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
		if(txtCodigoUsuario == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoUsuario").focus();
		}else {
			$.ajax(
			{url:"../php/usuarios.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoUsuario:txtCodigoUsuario, accion:'eliminar'},
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

