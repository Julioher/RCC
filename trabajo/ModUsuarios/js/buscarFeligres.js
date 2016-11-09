
$(document).ready(function(){

$(".busca").keyup(function(){
  var texto = $(this).val();
  var dataString = 'palabra='+ texto;

  if(texto==''){

  }else{
    $.ajax({
      type:"POST",
      url:"../php/buscarFeligres.php",
      data: dataString,
      cache:false,
      success: function(html){
        $("#display").html(html).show();
      }
    });
  }
  return false;
});
});


/*$(function(){
  var vec_pal = new Array();
  <?php
  for ($p = 0; $p < count($arreglo_php); $p++){ ?>

   vec_pal.push('<?php echo $arreglo_php[$p]; ?>');
   
  <?php } ?>
  $("#txtNombreUsuario").autocomplete({
    source: vec_pal
  });
});*/






