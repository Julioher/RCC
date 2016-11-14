    
// Buscar persona por nombres o apellidos
  function fnBuscarPersonaNombresApellidos(id, ojetoCodigo){
    nombresPersona = $("#"+id).val();
    apellidosPersona = $("#"+id).val();
    if (nombresPersona == ""){
      $("#divBuscadorPersonas").css("display", "none");
    }
    else{
      $.post("../php/buscarFeligres.php",{
        accion:"buscarPersonaNombresApellidosMultiple", prmNombresPersona:nombresPersona, prmApellidosPersona:apellidosPersona, id:id, ojetoCodigo:ojetoCodigo    
      },
      function recepcion(respuestaPersonas){
      arrayRespuesta=eval("(" + respuestaPersonas + ")");
      if(arrayRespuesta["numeroPersonas"] > 0){       
        var posicionReal = $("#"+id).offset();
        var ancho= $("#"+id).outerWidth();
          $("#divBuscadorPersonas").css({width: ancho+"px", left: posicionReal.left+"px", top: posicionReal.top+21+"px"})
        document.getElementById('divBuscadorPersonas').innerHTML='';
        $("#divBuscadorPersonas").css("display", "block");
        $("#divBuscadorPersonas").html(arrayRespuesta["resultadoPersonas"]);
      }
      else
        $("#divBuscadorPersonas").css("display", "none");
      });
    }
  }

  // FUNCION PARA BUSCAR PROVEEDORES POR NOMBRE
  function fnSubirDatosPersona(idFeligres, pApellido, sApellido, pNombre, sNombre, id, ojetoCodigo){
    $("#"+ojetoCodigo).val(idFeligres);
    $("#"+id).val(pApellido + " " + sApellido + ", " + pNombre + " " + sNombre);
    
    if(pApellido=="")
      ipa="";
    else
      ipa=pApellido[0];

    if(sApellido=="")
      isa="";
    else
      isa=sApellido[0];

    if(pNombre=="")
      ipn="";
    else
      ipn=pNombre[0];

    if(sNombre=="")
      isn="";
    else
      isn=sNombre[0];

    $("#txtUsuario").val(ipa+isa+ipn+isn+idFeligres);
    $("#txtClaveUsuario").val("123456");

    $("#divBuscadorPersonas").css("display", "none");
    $("#"+id).focus();

    

    

    /*if(sNombre == '')
      document.getElementById('txtUsuario').value = pNombre[0]+pApellido;
    else
      document.getElementById('txtUsuario').value = pNombre[0]+sNombre[0]+ pApellido;
      
    if(sApellido == '')
      document.getElementById('txtUsuario').value = pApellido[0]+pNombre;
    else
      document.getElementById('txtUsuario').value = pApellido[0]+sApellido[0]+pNombre;
      
    document.getElementById('txtClave').value = '123456';*/
  }
