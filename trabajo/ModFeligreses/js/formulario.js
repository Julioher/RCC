function obtenerValoresObjetos() { //inicio función obtenerValoresObjetos
    txtCodigoFeligres = $("#txtCodigoFeligres").val();
    txtPrimerNombre = $("#txtPrimerNombre").val();
    txtSegundoNombre = $("#txtSegundoNombre").val();
    txtPrimerApellido = $("#txtPrimerApellido").val();
    txtSegundoApellido = $("#txtSegundoApellido").val();
    txtApellidoCasada = $("#txtApellidoCasada").val();
    txtFechaNacimiento = $("#txtFechaNacimiento").val();
    cmbGeneros = $("#cmbGeneros").val();
    cmbEstados = $("#cmbEstados").val();
    //cmbCargo = $("#cmbCargo").val();
    txtAreaDireccion = $("#txtAreaDireccion").val();
} //fin función obtenerValoresObjetos
function limpiarObjetos() { //inicio función limpiarObjetos
    $("#txtCodigoFeligres").val("");
    $("#txtPrimerNombre").val("");
    $("#txtSegundoNombre").val("");
    $("#txtPrimerApellido").val("");
    $("#txtSegundoApellido").val("");
    $("#txtApellidoCasada").val("");
    $("#txtFechaNacimiento").val("");
    $("#cmbGeneros").val("");
    $("#cmbEstados").val("");
    $("#cmbCargo").val("");
    $("#txtAreaDireccion").val("");
    $("#txtPrimerNombre").focus();
} //fin función limpiarObjetos
function limpiarDatos() { //inicio función limpiarDatos
    //falta agregar datos...
    limpiarObjetos();
    $("#mostrar").html("");
} //fin función limpiarDatos
function subirDatos(idFeligres, pNombre, sNombre, pApellido, sApellido, apellidoCasada, genero, direccion, fechaNacimiento, estadoRegistro) { //inicio función subirDatos
    //hay que poner otros datos antes, está pendiente...
    $("#txtCodigoFeligres").val(idFeligres);
    $("#txtPrimerNombre").val(pNombre);
    $("#txtSegundoNombre").val(sNombre);
    $("#txtPrimerApellido").val(pApellido);
    $("#txtSegundoApellido").val(sApellido);
    $("#txtApellidoCasada").val(apellidoCasada);
    $("#txtFechaNacimiento").val(fechaNacimiento);
    $("#cmbGeneros").val(genero);
    $("#cmbEstados").val(estadoRegistro);
    $("#txtAreaDireccion").val(direccion);
    //pendiente lo del cargo...
} //fin función subirDatos
function insertarDatos() { //inicio de función insertarDatos
    obtenerValoresObjetos();
    if (txtPrimerNombre == '') {
        alert("Digite el nombre del Feligres");
        limpiarObjetos();
    } else if (!isNaN(txtPrimerNombre)) {
        alert("Caracter inválido...");
        limpiarObjetos();
    } else {
        $.ajax({
            url: "../php/formulario.php",
            cahe: false,
            type: "POST",
            data: {
                txtPrimerNombre: txtPrimerNombre,
                txtSegundoNombre: txtSegundoNombre,
                txtPrimerApellido: txtPrimerApellido,
                txtSegundoApellido: txtSegundoApellido,
                txtApellidoCasada: txtApellidoCasada,
                txtFechaNacimiento: txtFechaNacimiento,
                cmbGeneros: cmbGeneros,
                cmbEstados: cmbEstados,
                txtAreaDireccion: txtAreaDireccion,
                accion: 'insertar'
            },
            success: function(resultado) {
                if (resultado == 0) {
                    alert("Nombre del Feligres ya existe...");
                    limpiarObjetos();
                } else if (resultado == 1) {
                    alert("Datos guardados exitosamente");
                    limpiarObjetos();
                }
            }
        });
    }
} //fin de función insertarDatos
function buscarDatos() { //inicio de función buscarDatos
    obtenerValoresObjetos();
    if (!isNaN(txtCodigoFeligres) || isNaN(txtPrimerNombre)) {
        $.ajax({
            url: "../php/formulario.php",
            cache: false,
            type: "POST",
            data: {
                txtPrimerNombre: txtPrimerNombre,
                txtSegundoNombre: txtSegundoNombre,
                txtPrimerApellido: txtPrimerApellido,
                txtSegundoApellido: txtSegundoApellido,
                txtApellidoCasada: txtApellidoCasada,
                txtFechaNacimiento: txtFechaNacimiento,
                cmbGeneros: cmbGeneros,
                cmbEstados: cmbEstados,
                txtAreaDireccion: txtAreaDireccion,
                accion: 'buscar'
            },
            success: function(resultado) {
                $("#mostrar").html(resultado);
                limpiarObjetos();
            }
        });
    } else {
        if (isNaN(txtCodigoFeligres)) {
            alert("Caracter inválido");
            $("#txtCodigoFeligres").val("");
            $("#txtCodigoFeligres").focus();
        }
    }
} //fin de función buscarDatos
function modificarDatos() { //inicio de función modificarDatos
    obtenerValoresObjetos();
    var confirmar = confirm("¿Desea modificar los datos?");
    if (confirmar == true) {
        if (txtCodigoFeligres == '') {
            alert("Seleccione un registro...");
            $("#txtCodigoFeligres").focus();
        } else if (txtPrimerNombre == '') {
            alert("Seleccione un Nombre...");
            $("#txtPrimerNombre").focus();
        } else {
            $.ajax({
                url: "../php/formulario.php",
                cache: false,
                type: "POST",
                data: {
                    txtPrimerNombre: txtPrimerNombre,
                    txtSegundoNombre: txtSegundoNombre,
                    txtPrimerApellido: txtPrimerApellido,
                    txtSegundoApellido: txtSegundoApellido,
                    txtApellidoCasada: txtApellidoCasada,
                    txtFechaNacimiento: txtFechaNacimiento,
                    cmbGeneros: cmbGeneros,
                    cmbEstados: cmbEstados,
                    txtAreaDireccion: txtAreaDireccion,
                    accion: 'modificar'
                },
                success: function(resultado) {
                    if (resultado == 0) {
                        alert("El nombre del Feligres ya existe...");
                        $("#txtPrimerNombre").focus();
                    } else if (resultado == 1) {
                        alert("Datos modificados exitosamente...");
                        $("#txtPrimerNombre").focus();
                    }
                }
            });
        }
    } else {
        alert("Proceso cancelado...");
        limpiarObjetos();
    }
} //fin de función modificarDatos
function eliminarDatos() { //inicio de función eliminarDatos
    obtenerValoresObjetos();
    var confirmar = confirm("¿Desea eliminar los datos?");
    if (confirmar == true) {
        if (txtCodigoFeligres == '') {
            alert("Seleccione un registro...");
            $("#txtPrimerNombre").focus();
        } else {
            $.ajax({
                url: "../php/formulario.php",
                type: "POST",
                cache: false,
                data: {
                    txtCodigoFeligres: txtCodigoFeligres,
                    accion: 'eliminar'
                },
                success: function(resultado) {
                    if (resultado == 1) {
                        limpiarObjetos();
                        alert("Datos eliminados exitosamente...");
                    } else {
                        limpiarObjetos();
                        alert("No se pudo realizar la operación...");
                    }
                }
            });
        }
    } else {
        alert("Proceso cancelado...");
        limpiarObjetos();
    }
} //fin de función eliminarDatos