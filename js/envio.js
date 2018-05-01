/*$(document).ready(function(){
    $('#cadastrar').submit(function(){
      var dados = "function="+"register_user";
      dados+="&"+$(this).serialize();
			alert("ok");

      $.ajax({
        type: "POST",
        url: "php/main.php",
        data: dados,
        success: function(result)
        {
          if(result==1){
						alert("Cadastro efetuado com sucesso");
					}else{
						lert("Erro ao cadastrar");
					}
        }
      });
      //return false;
    });
  });
//alert("ok JS");
$("#cadastrar").submit(function(){

  // O form foi submetido...
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "BD/register.php",
    data: $(this).serializeArray(),
    }).done(function( msg ) {
      // Recebes aqui o output do teu insert.php
      alert("Recebido: " + msg);

      // Fazes o que quiseres com os dados que recebes (se precisares de
         //retornar vários dados, sugiro que os retornas com json

    });
  //alert("deu erro");
  return false; // Impede a mudança de página

});
*/
function set_element(element){
	var requisicaoAjax = iniciaAjax();
	if (requisicaoAjax) {
		requisicaoAjax.onreadystatechange = function(){
			if (requisicaoAjax.readyState == 4) {
				if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304){
					//document.getElementById("teste").innerHTML = requisicaoAjax.responseText;
					//alert(requisicaoAjax.responseText);
				}else{
					alert("Problema na comunicação");
				}
			}
		};
		requisicaoAjax.open("POST", "php/main.php", true);
		requisicaoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//requisicaoAjax.send("info="+document.getElementById('info'));
    var dados = "function="+"set_element";
    dados+="&element="+element;
    requisicaoAjax.send(dados);
	}
}

/*function cadastra_usuario(){
	$.ajax({
		type: "POST",
		url: "php/main.php?register_user",
		data: $(this).serializeArray(),
		}).done(function( msg ) {
			// Recebes aqui o output do teu insert.php
			alert("Recebido: " + msg);

			// Fazes o que quiseres com os dados que recebes (se precisares de
				// retornar vários dados, sugiro que os retornas com json

		});
	//alert("deu erro");
	return false; // Impede a mudança de página


	var requisicaoAjax = iniciaAjax();
	if (requisicaoAjax) {
		requisicaoAjax.onreadystatechange = function(){
			if (requisicaoAjax.readyState == 4) {
				if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304){
					//document.getElementById("teste").innerHTML = requisicaoAjax.responseText;
						var r = requisicaoAjax.responseText;
						alert(r);
				}else{
					alert("Problema na comunicação");
				}
			}
		};

		var inputs = new Array();
		$('form input').each(function()
		{
			inputs.push($(this).val());
		});
		var data='nome='+$("#nome").val()+'&usuario='+$("#usuario").val()+'&'+'senha='+$("#senha").val();
		//alert(inputs[0]+"|"+inputs[1]+"|"+inputs[2]);
		requisicaoAjax.open("POST", "php/main.php?register_user", true);
		requisicaoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//requisicaoAjax.send("info="+document.getElementById('info'));
		requisicaoAjax.send(data);
	}
}
*/
//*********************************************************
function active_relatorio(){
  if(relat==false){
    var dados = "function="+"get_element";
    $.ajax({
      type: "POST",
      url: "php/main.php",
      data: dados,
      success: function(result){
        $("#relatorio").html(result);
        $("#relatorio").show(0.5);
    		relat=true;
      }
    });
  }else{alert("é verdadeiro");}
/*
  if(relat==false){
		var requisicaoAjax = iniciaAjax();
		if (requisicaoAjax) {
			requisicaoAjax.onreadystatechange = function(){
				if (requisicaoAjax.readyState == 4) {
					if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304){
						document.getElementById("relatorio").innerHTML = requisicaoAjax.responseText;
					}else{
						alert("Problema na comunicação");
					}
				}
			};
			//requisicaoAjax.open("POST", "php/main.php?get_element", true);
      requisicaoAjax.open("POST", "php/main.php",true);
			requisicaoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//requisicaoAjax.send("relatorio="+document.getElementById('relatorio'));
      //requisicaoAjax.send("function='get_element'");
      var dados = "function="+"get_element";
      //'nome='+$("#nome").val()+'&';
      requisicaoAjax.send(dados);
		}
		$("#relatorio").show();
		relat=true;
	}
  */
}

function iniciaAjax(){
	var objetoAjax = false;
	if (window.XMLHttpRequest) {
		objetoAjax = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		try{
			objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(ex){
				objetoAjax = false;
			}
		}
	}
	return objetoAjax;
}
