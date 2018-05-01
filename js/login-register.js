$(document).ready(function(){
  $('.cadastrar').submit(function(){
    var dados = "function="+"register_user";
    dados+="&"+$(this).serialize();
    $.ajax({
      type: "POST",
      url: "php/main.php",
      data: dados,
      success: function(result){
        if(result == "1"){
          alert("Cadastro efetuado com sucesso!");
          window.location.href = "index.html";
        }else{
          alert("Usuário ou Email já cadastrados");        
        }
      }
    });
    return false;
  });
});
/*
    $('.login-register').submit(function(){
      dados = $(this).serialize();
      alert("ok");
      $.ajax({
        type: "POST",
        url: "validate.php",
        data: dados,
        success: function(result){
          alrt(result);
        }
      });
    });*/
    //return false;
