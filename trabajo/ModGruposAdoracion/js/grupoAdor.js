
function obtenerValoresObjetos(){
	txtCodigoGrupoAdor = $("#txtCodigoGrupoAdor").val();
	txtNombreGrupoAdor = $("#txtNombreGrupoAdor").val();
	cmbEstadoGrupoAdor = $("#cmbEstadoGrupoAdor").val();
	txtAreaDireccionGrupoAdor = $("#txtAreaDireccionGrupoAdor").val();
}

function limpiarObjetos(){
	$("#txtCodigoGrupoAdor").val("");
	$("#txtNombreGrupoAdor").val("");
	$("#cmbEstadoGrupoAdor").val("");
	$("#txtAreaDireccionGrupoAdor").val("");
	$("#txtNombreGrupoAdor").focus();
}

function limpiarDatos(){
	limpiarObjetos();
	$("#mostrar").html("");
}

function subirDatos(idGrupoAdoracion,nombreGrupoAdoracion,estadoRegistro,direccion){
	$("#txtCodigoGrupoAdor").val(idGrupoAdoracion);
	$("#txtNombreGrupoAdor").val(nombreGrupoAdoracion);
	$("#cmbEstadoGrupoAdor").val(estadoRegistro);
	$("#txtAreaDireccionGrupoAdor").val(direccion);
	$("#txtNombreGrupoAdor").focus();
}

function insertarDatos(){//inicio de función insertarDatos
	obtenerValoresObjetos();
	 if(txtNombreGrupoAdor == '' ){
		alert("Digite el nombre del Grupo de Adoración...");
		limpiarObjetos();
	}else if(!isNaN(txtNombreGrupoAdor)){
		alert("Caracter inválido...");
		limpiarObjetos();
	}else if(isNaN(txtNombreGrupoAdor) && cmbEstadoGrupoAdor == false){
		alert("Seleccione el estado...");
	}else if((isNaN(txtNombreGrupoAdor) && cmbEstadoGrupoAdor == true)&& txtAreaDireccionGrupoAdor == ''){
		alert("Seleccione la direeción...");
	}else{
		$.ajax(
			{url:"../php/grupoAdor.php",
			 cahe:false,
			 type:"POST",
			 data:{
			 	txtNombreGrupoAdor:txtNombreGrupoAdor,
				cmbEstadoGrupoAdor:cmbEstadoGrupoAdor,
				txtAreaDireccionGrupoAdor:txtAreaDireccionGrupoAdor,
				accion:'insertar'},
				success: function(resultado){
					if(resultado == 0){
						alert("El registro ya existe...");
						limpiarObjetos();
					}else if(resultado == 1){
						alert("Datos guardados exitosamente...");
						limpiarObjetos();
						$("#cmbEstadoGrupoAdor").val("");
				 	} 
			 	}});
	}
	}//fin de función insertarDatos 

function buscarDatos(){//inicio de función buscarDatos
	obtenerValoresObjetos();
	if(!isNaN(txtCodigoGrupoAdor) || isNaN(txtNombreGrupoAdor)){
		$.ajax(
		{url:"../php/grupoAdor.php",
		 cache:false,
		 type:"POST",
		 data:{txtCodigoGrupoAdor:txtCodigoGrupoAdor,
		 	txtNombreGrupoAdor:txtNombreGrupoAdor,
		 	cmbEstadoGrupoAdor:cmbEstadoGrupoAdor,
		 	txtAreaDireccionGrupoAdor:txtAreaDireccionGrupoAdor,
		 	accion:'buscar'},
		 	success:function(resultado){
		 		$("#mostrar").html(resultado);
		 		limpiarObjetos();
		 	}});
	}else{
		if(isNaN(txtCodigoGrupoAdor)){
		alert("Caracter inválido");
		$("#txtCodigoGrupoAdor").val("");
		$("#txtCodigoGrupoAdor").focus();
		}  
	}
}//fin de función buscarDatos

function modificarDatos(){//inicio de función modificarDatos
	obtenerValoresObjetos();
	var confirmar = confirm("¿Desea modificar los datos?");
	if(confirmar == true){
		if(txtCodigoGrupoAdor == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoGrupoAdor").focus();
		}else if (txtNombreMinisterio == ''){
			alert("Seleccione un Grupo de Adoración...");
			$("#txtNombreGrupoAdor").focus();
		}else{
			$.ajax(
				{url:"../php/grupoAdor.php",
				cache:false,
				type:"POST",
				data:{txtCodigoGrupoAdor:txtCodigoGrupoAdor,
				txtNombreGrupoAdor:txtNombreGrupoAdor,
				cmbEstadosMinisterio:cmbEstadosMinisterio,
				txtAreaDireccionGrupoAdor:txtAreaDireccionGrupoAdor,
				saccion:'modificar'},
				 success:function(resultado){
				 	if(resultado == 0){
				 		alert("El nombre del Grupo de Adoración ya existe...");
				 		$("#txtNombreGrupoAdor").focus();
				 	}else if(resultado == 1){
				 		alert("Datos modificados exitosamente...");
				 		$("#txtNombreGrupoAdor").focus();
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
		if(txtCodigoGrupoAdor == ''){
			alert("Seleccione un registro...");
			$("#txtCodigoGrupoAdor").focus();
		}else {
			$.ajax(
			{url:"../php/grupoAdor.php",
			 type:"POST",
			 cache: false,
			 data:{txtCodigoGrupoAdor:txtCodigoGrupoAdor, accion:'eliminar'},
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

