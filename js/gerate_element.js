/*
<h5></h5>

<br>

<br>
---------------------------------------/
Autor:Júlio Lima Reis;
Email:juliolimareis@gmail.com;
-----------------------------------------/

Descrição do documento ------------------/
  Este documento contem todas a funções da
  aplicação, que são chamadas por   outros
  documentos.
-----------------------------------------/
licença: GPL;
----------------------------------------*/

//variável que receberá o objeto que esta selecionado
//este objeto será alterado pela classe 'object_element()'
var public_object_element;
//$('video').
//------------- OBJETO DO ELEMENTO --------------/
var object_element = function (title,text,sound_text,annotation,
                                photo_link,photo_about,photo_desc,video_link)
{
  this.title = title;
  this.text  = text;
  this.sound_text_link = sound_text;
  this.annotation = annotation;
  //arrays
  this.photo_link  = photo_link;
  this.photo_about = photo_about;
  this.photo_desc  = photo_desc;
  this.video_link  = video_link;
};
//------------- FIM --------------/

// --------- GERA OS ELEMENTOS ---------/
//recebe o objeto de elementos e os altera no HTML
function gerate_element(object_element){
  public_object_element = object_element;

  //altera o texto
  set_text(object_element.text);

  //altera o titulo
  set_title(object_element.title);

  //altera audio do texto
  set_audio_text(object_element.sound_text_link);

  //adiciona o menu de elementos
  //add_menu_element();

/*
  //altera a geleria de foto
  for(var i=0;i<object_element.photo_link.length;i++){
    gerate_galery_image(object_element.photo_desc[i],
                          object_element.photo_about[i],object_element.photo_link[i]);
  }

  //altera a geleria de video
  for(var i=0;i<object_element.video_link.length;i++){
    gerate_galery_video(object_element.video_link[i]);
  }
*/
}
//--------- FIM -----------/

//----- SET TEXT MAIN -----/
function set_text(text){
  $(".text").html(text);
}

//----- SET TITLE MAIN -----/
function set_title(title){
  $(".titulo").html(title);
}

function add_button_mult(){
  $(".botoes_mult").html(
    "<a class=\"btn btn-primary btn-lg anot_botao\" onclick=\"add_annotation()\" role=\"button\">Anotações</a>"+
    "<a class=\"btn btn-primary btn-lg aimagen_botao\" href=\"#modal-imagem\" data-toggle=\"modal\" role=\"button\">Imagens</a>"+
    "<a class=\"btn btn-primary btn-lg video_botao\" href=\"#modal-video\" data-toggle=\"modal\" role=\"button\">Videos</a>"
  );
}

function hide_button_mult(){
  $(".botoes_mult").children().hide();
}

//------------- GERATE GALERY PHOTO --------------/
function gerate_galery_image(desc,about,link){
  $(".galeria_imagem_position").append(
      "<div class=\"div_galeria_imagem\">"+
        "<div class=\"foto\">"+
          "<a class=\"example-image-link\" href=\""+link+"\" data-lightbox=\"example-set\" data-title=\""+desc+"\">"+
            "<img class=\"example-image img_galeria\" src=\""+link+"\" alt=\"\" />"+
          "</a>"+
          "<p class=\"descricao_foto\">"+about+"</p>"+
        "</div>"+
      "</div>");
}
//------------- FIM GERATE GALERY PHOTO --------------/


//------------- GERATE GALERY VIDEO --------------/
function gerate_galery_video(link_video_l){
  /*$(".galeria_video").append(
    "<div class=\"video\">"+
      "<div class=\"embed-responsive embed-responsive-16by9\" autoplay=\"false\">"+
        "<iframe autoplay=\"false\" allowFullScreen=\"allowFullScreen\" class=\"embed-responsive-item\" src=\""+link_video_l+"\">"+
        "</iframe>"+
       "</div>"+
    "</div>");*/
    $(".galeria_video").append(
      //"<div class=\"video\">"+
        "<video class=\"video\" controls>"+
          "<source src=\""+link_video_l+"\" type=\"video/mp4\">"+
        "</video>"
      //"</div>"
    );
}
//------------- FIM GERATE GALERY VIDEO --------------/


//------------- GERATE AUDIO TEXT --------------/
function set_audio_text(audio_l_text){
  $(".div_audio").html(
  "<center class=\"alerta_audio_text_position\">"+
    "Clique abaixo para ouvir texto"+
  "</center>"+
  "<audio class=\"position_audio_text audio_text\" src=\""+audio_l_text+"\" controls=\"\"></audio>"
  );
  //$(".position_audio_text").attr("src",audio_l_text);
}
//------------- FIM AUDIO TEXT --------------/


//------------- GERATE AUDIO ELEMENT --------------/
function set_audio_element(audio_l2_text){
  $(".molde_position").attr("src",audio_l2_text);
}
//------------- FIM AUDIO ELEMENT --------------/





//****************** EVENTS *********************

//------------- ACTION AUDIO --------------/
//variável que guarda a ativação do audio
//true = audio esta ligado
var audio_state=true;

//audio == 1 significa que é aprimeira vez que o audio foi chamado
var audio = 1;

//verifica se o audio esta ligado
function action_audio(){
  if(audio_state){
		if(audio!=1){//verifica se o audio foi ativo alguma vez
			//para a reprodução atual do audio
			this.audio.pause();
    }
		//desliga o audio do sistema
		audio_state=false;
  }else{
    //liga o audio caso esteja desligado
    audio_state=true;
  }
}//--- fim ----/

//ativa um audio, passando o endereço
function play_audio(link_audio){

  //verifica se o audio esta ativado
  if(audio_state){
    if(audio==1){
      //instancia o novo endereço de reprodução do audio
      this.audio = new Audio(link_audio);
      //dispara o audio
      this.audio.play();
    }else{
      this.audio.pause();
      //instancia o novo endereço de reprodução do audio
      this.audio = new Audio(link_audio);
      //dispara o audio
      this.audio.play();
    }
  }
}//--- fim ---/
//--------- END ACTION AUDIO -----------/

//------------- HOVER --------------/
function hover_element(element_name){
  if((element_name=="peroxissomo_1") || (element_name=="peroxissomo_2") ||
     (element_name=="cloroplasto_1") || (element_name=="cloroplasto_2")){
    //muda a imagem de seleção
    $("."+element_name+"_position").attr("src","img/elements/"+element_name+"_p.png");
    //set_miniature(element_name);
  }/*
  else if(element_name=="cloroplasto_2"){
    $("."+element_name+"_position").attr("src","img/elements/"+element_name+"_p.png");
    set_miniature(element_name+"_2.png");
  }*/
  else{
    //muda a imagem de seleção
    $("."+element_name+"_position").attr("src","img/elements/"+element_name+"_p.png");
  }
  //altera a imagem da miniatura
  set_miniature(element_name);
  //######## *ATIVA O AUDIO DO ELEMENTO* ###############
  play_audio("audio/element/"+element_name+".ogg");
  //altera o tituro do elemento selecionado
  switch (element_name) {
    case "vacuolo":
      set_title("Vacúolo");
      break;
    case "citoplasma":
      set_title("Membrana Plasmática, Citoplasma e Ribossomo");
      break;
    case "complexo_de_golgi":
      set_title("Complexo de golgi");
      break;
    case "cloroplasto_1":
      set_title("Cloroplasto");
      break;
    case "cloroplasto_2":
      set_title("Cloroplasto");
      break;
    case "reticulo_endoplasmatico":
      set_title("Retículo Endoplasmático Liso");
      break;
    case "mitocondria":
      set_title("Mitocôndria");
      break;
    case "nucleo":
      set_title("Núcleo, Nucléolo e Retículo Endoplasmático Rugoso");
      break;
    case "peroxissomo_1":
      set_title("Peroxissomo");
      break;
    case "peroxissomo_2":
      set_title("Peroxissomo");
      break;
    case "parede_celular":
      set_title("Parede Celular");
      break;
    default:
    break;
  }
}
//------------- FIM HOVER --------------/


//------------- PÓS HOVER --------------/
//reseta a imagem do molde
function out_element(element_name){
  //RESETAR TODAS AS IMAGENS EM PRETO E BRANCO
  //$(".molde_position").attr("src","img/elements/celula.jpeg");

  $(".vacuolo_position").attr("src","img/elements/vacuolo.png");
  $(".citoplasma_position").attr("src","img/elements/citoplasma.png");
  $(".complexo_de_golgi_position").attr("src","img/elements/complexo_de_golgi.png");

  $(".cloroplasto_1_position").attr("src","img/elements/cloroplasto_1.png");
  $(".cloroplasto_2_position").attr("src","img/elements/cloroplasto_2.png");

  $(".peroxissomo_1_position").attr("src","img/elements/peroxissomo_1.png");
  $(".peroxissomo_2_position").attr("src","img/elements/peroxissomo_2.png");

  $(".reticulo_endoplasmatico_position").attr("src","img/elements/reticulo_endoplasmatico.png");
  $(".mitocondria_position").attr("src","img/elements/mitocondria.png");

  $(".nucleo_position").attr("src","img/elements/nucleo.png");
  $(".parede_celular_position").attr("src","img/elements/parede_celular.png");

  //$(".molde_position").attr("src","img/molds/celula-none.jpg");
}
//------------- FIM PÓS HOVER --------------/


//------------- SET MINIATURE --------------/
//altera a imagem do molde de acordo com o nome
function set_miniature(element){
  $(".miniatura").attr("src","img/elements/"+element+".png");
}
//------------- END SET MINIATURE --------------/



//------------- HIDE CELL--------------/
function hide_cell(){
  $(".celula_main").children().hide();
}
//------------- FIM --------------/

//------------- SHOW CELL--------------/
function show_cell(){
  $(".celula_main").children().show();
}
//------------- FIM --------------/

//------------ ANIMATION PÓS CLIQUE -------------/
function up_miniature(){
  //esconde a miniatura
  $(".miniatura").hide();

  //alteras as propriedades do botão voltar
  $(".miniatura").css({
    "position": "absolute",
    "top"     : "183px",
    "left"    : "180px",
    "width"   : "400px",
    "z-index" : "1",
    "border"  : "none",
    "height"  : "300px"
//    "transition" : "all 1s linear"
//transition: all 2s linear
  });
  //animação da miniatura
  $(".miniatura").fadeIn( "slow" );
}


//--- RESETAS A CONFIGURAÇÕES DA CÉLULA E ELEMENTOS --/
function down_miniature(){
//reseta as propriedades do botão voltar
$(".miniatura").css({
  "position": "absolute",
  "top"     : "487px",
  "left"    : "-3px",
  "width"   : "174px",
  "z-index" : "10",
  "height"  : "150px",
  "border"  : "solid 3px black"
  });
  //animação da miniatura
  $(".miniatura").fadeIn( "slow" );
}
//------------ FIM -------------/


//--------- AÇÕES DO BOTÃO VOLTAR -----------/
function action_button_back(){
  down_miniature();//faz a miniatura voltar ao padão
  show_cell();//invoca a célula inteira com os elementos

  hide_button_back();//esconde o botão back
  hide_menu_element();//esconde o menu element
  hide_button_mult();//esconde os botões de multimidea
  hide_annotation();

  default_title();//altera o titulo para o inicial
  default_text();//altera o texto para o inicial
  default_audio_text();//altera o audio do texto para o inicial

  default_text_auxiliar_audio();//apaga o texto "Clique abaixo para ouvir texto"

}

function set_text_auxiliar_audio(){
  $(".div_audio").html(
  "<center class=\"alerta_audio_text_position\">"+
    "Clique abaixo para ouvir texto"+
  "</center>"+
  "<audio class=\"position_audio_text audio_text\" src=\"\" controls=\"\"></audio>"
  );
}

function default_text_auxiliar_audio(){
  $(".div_audio").html("");
}

function show_test_knowledge(){
  if(relat==false){
    $("#relatorio").html(
      "<div class=\"close_relatorio\" onclick=\"close_relatorio()\">"+
              "<center>Fechar</center>"+
              "</div>"+
              "<center class=\"div_relatorio\">"+
                //inicio questionario
                "<form id=\"questionario\" name =\"questionario\" method = \"post\" action=>"+
                  "1) Observe o video abaixo, e assinale o que ele representa:"+
                  "<p>"+
                  "<label>"+
                  "<input type=\"radio\" name=\"questao1\" value=\"a\" /> A) Melancia</label>"+
                  "<br>"+
                  "<label>"+
                  "<input type=\"radio\" name=\"questao1\" value=\"b\" /> B) Abobora</label>"+
                  "<br>"+
                  "<label>"+
                  "<input type=\"radio\" name=\"questao1\" value=\"c\" /> C) Abacate</label>"+
                  "<br>"+
                  "<label>"+
                  "<input type=\"radio\" name=\"questao1\" value=\"d\" /> D) Laranja</label>"+
                  "<br>"+

                "</form>"+
              "</center>"+
          "</div>"
    );
    relat=true;
  }
}

//invocar botão de voltar
function add_button_back(){
  $(".botao_voltar_celula").html("<button class=\"btn_ waves-effect waves-light\""+
      "onclick=\"action_button_back()\" type=\"submit\" name=\"buttton_back\">voltar</button>");
}

//remover botão de voltar
function hide_button_back(){
  $(".botao_voltar_celula").children().remove();
}

//remove o menu de elementos
function hide_menu_element(){
  $(".navbar_element").children().remove();
}

//adiciona o menu de multemidea
//.galeria_imagem_position
//.galeria_video

function add_annotation(){
  $(".annotation").html(
    "<textarea class=\"text_annotation div_anno\" rows=\"4\" cols=\"50\" placeholder=\"Digite algo que queira lembrar\" onkeyup=\"set_annotation()\"></textarea>");
    get_annotation();
}

function hide_annotation(){
  $(".annotation").children().hide();
}


//Adiciona a galeria de foto e vídeos nos moldals de acordo com o elemento selecionado
function add_painel_mult(){
  //adiciona galeria de imagem no moldal
  $(".painel_div_photo").html(
    "<div class=\"div_painel_mult\">"+
        "<div class=\"galeria_imagem_position\"></div>"+
    "</div>"
  );
  //altera a geleria de imagem
  for(var i=0;i<public_object_element.photo_link.length;i++){
    gerate_galery_image(public_object_element.photo_desc[i],
                          public_object_element.photo_about[i],public_object_element.photo_link[i]);
  }
  //adiciona galeria de video no moldal
  $(".painel_div_video").html(
    "<div class=\"div_painel_mult\">"+
        "<div class=\"galeria_video\"></div>"+
    "</div>"
  );
  //altera a geleria de video
  for(var i=0;i<public_object_element.video_link.length;i++){
    gerate_galery_video(public_object_element.video_link[i]);
  }
}//fim

//remove o menu de multmidea
function close_mult(){
  $(".painel_div_mult").children().remove();
}

//cria o menu de elementos
function add_menu_element(){
  $(".navbar_element").html(
    "<div class=\"tabbable\">"+
        "<ul class=\"nav nav-tabs\">"+
            "<li class=\"active\">"+
                "<a href=\"#tab1\" data-toggle=\"tab\">Seção 1</a>"+
            "</li>"+
            "<li>"+
                "<a href=\"#tab2\" data-toggle=\"tab\">Seção 2</a>"+
            "</li>"+
        "</ul>"+
        "<div class=\"tab-content\">"+
            "<div class=\"tab-pane active\" id=\"tab1\">"+
                "<p>Estou na seção 1</p>"+
            "</div>"+
            "<div class=\"tab-pane\" id=\"tab2\">"+
                "<p>Olá, estou na seção 2</p>"+
            "</div>"+
        "</div>"+
    "</div>");
}
//------- FIM --------/

//------- AÇÕES DEFAULT --------/
function default_title(){//altera o titulo para o inicial
  $(".titulo").html("Célula Vegetal");
}
function default_text(){//altera o texto para o inicial
  $(".text").html("Clique sobre os <span class=\"gloss\" onclick=\"active_gloss('organelas')\">organelas</span>, aqui aparecerá textos de estudo");
}
function default_audio_text(){//altera o audio_text para o inicial
  $(".audio_text").attr("src","");
}
//------- AÇÕES DE INICIO --------/

//fecha o relatório
var relat = false;
function close_relatorio(){
  //esconde o relatório
  $("#relatorio").css({
    "display": "none"});
  this.relat = false;
  /*
  $("#relatorio").children().hide();
  $("#relatorio").hide();
  */
}
//------- FIM --------/

//------- AÇÕES DE AJAX --------/
//pega as anotações
function get_annotation(){
	var dados = "function="+"get_annotation";
	dados+= "&"+"ant="+element_select;

	$.ajax({
		type: "POST",
		url: "php/main.php",
		data: dados,
		success: function(result)
		{
			if(result != "empty"){
				$(".text_annotation").html(result);
			}
		}
	});
	return false;
}
//insere as anotações
function set_annotation(){
		var dados = "function="+"set_annotation";
		dados+= "&"+"annotation="+$(".text_annotation").val();
		dados+= "&"+"ant="+element_select;
		//alert(dados);
		//dados+="&"+$(this).serialize();
		//$.get("testeGet");

		$.ajax({
			type: "POST",
			url: "php/main.php",
			data: dados,
			success: function(result)
			{
				//alert(result);
			}
		});
  return false;
}
//------- FIM --------/

//----------- GLOSSÁRIO ---------/
function active_gloss(palavra) {
    //var palavra = $(this).text();//pega a palavra que foi clicada
    var significado="<b>"+palavra+":</b> ";
    switch (palavra) {
      case "organelas":
        significado+=
				"São compartimentos(\"pequenos órgãos\") delimitados por membrana que têm papeis "+
				"específicos a desempenhar na função global de uma célula. "+
				"As organelas trabalham de maneira integrada, cada uma assumindo "+
				"uma ou mais funções celulares."
				;
        break;
      case "antocianinas":
        significado+=
          "São substâncias que são solúveis em água e derivados "+
          "de sais flavílicos (flavonóides). Estas substâncias são "+
          "pigmentos que dão cores a certos grupos de flores, frutas "+
          "e folhas ( Variam do vermelho ao roxo e azul).";
        break;
      case "hipertônicos":
        significado+=
          "Seres que possuem mais solutos no seu corpo, que no meio externo que vive.";
        break;
          case "Proplastos":
            significado+=
              "Jovens Cloroplastos em desenvolvimento.";
          break;
          case "granum":
            significado+=
              "Palavra em latim com significado de grãos.";
          break;
          case "grana":
            significado+=
              "Singular de granum.";
          break;
          case "citosol":
            significado+=
              "Líquido que preenche o citoplasma (como se fosse o corpo da célula).";
          break;
          case "autotróficos":
            significado+=
              "Seres vivos que produzem seu próprio alimento através de substâncias químicas sem precisar predar outros seres.";
          break;
          case "carotenóides":
            significado+=
              "Derivados dos carotenos (Ao pé da letra são os pigmentos que existem em microrganismos como algas e "+
              "fungos e plantas) variam de cores do amarelo ao vermelhor por serem lipossolúveis ( solúveis em gorduras) "+
              "e por possuírem moléculas oxidáveis (moléculas que auxiliam em uma variedade de processos químicos na "+
              "transferência de elétrons entre átomos fazendo procesos como  a ferrugem e respiração.";
          break;

          case "endossimbiose":
            significado+=
              "Uma relação ecológica onde um indivíduo mora dentro de outro, onde possuem mutualismo ( Ambos são beneficiados).";
          break;
          case "grumos":
            significado+=
              "Pequenos caroços, grãos ou grânulos.";
          break;
          case "acrossomo":
            significado+=
              "São Bolsas (bolsas com enzimas que irão penetrar "+
              "a membrana do óvulo para a fecundação)  formadas pelo "+
              "complexo de golgi que os espermatozóides maduros possuem.";
          break;
          case "sáculos lameliformes":
            significado+=
              "Pequenos sacos em forma de lâminas.";
          break;
          case "exocitose":
            significado+=
              "Material intracelular transportado por difusão, geralmente por vesículas internas da organela.";
          break;
          case "ergastoplasma":
            significado+=
              "Palavra originada do grego ergozomai significa elaborar, sintetizar.";
          break;
          case "corpúsculo":
            significado+=
              "Parte com dimensões pequenas, de  um organismo maior";
          break;
          case "protoplasto":
            significado+=
              "Estrutura que compreende o citoplasma, o núcleo e a membrana plasmática.";
          break;

          case "peptidoglicano":
            significado+=
              "Heteropolissacarídeos ligados a <span class=\"gloss\" onclick=\"active_gloss('peptídeos')\">peptídeos</span> que estão presentes da parede celular dos procariontes.";
          break;
          case "heteropolissacarídeos":
            significado+=
              "São moléculas polissacarídicas que possuem mais de um tipo de açúcar";
          break;

          case "peptídeos":
            significado+=
              "São biomoléculas que fazem ligações entre um grupo de aminoácidos com um grupo carboxílico.";
          break;
          case "ácidos biliares":
            significado+=
              "São ácidos esteróides encontrados na bile ( Fluídos produzidos no fígado para "+
            "ajudar na digestão de gorduras). Possuem forma de sais de minerais (sódio).";
            break;
          case "ciclo do glioxilato":
            significado+=
              "Este ciclo faz a produção de intermediários (são usadas como precursoras para "+
            "a biossíntese em outras moléculas) do ciclo de Krebs a partir de acetil-CoA. Por isso essa via "+
            "conta com a presença de enzimas do ciclo de Krebs (citrato-sintase e aconitase). E são usadas "+
            "como precursoras para a biossíntese em outras moléculas. Ou seja o ciclo aje como uma via "+
            "alternativa para o metabolismo de acetil-CoA.";
            break;
          case "piruvatos":
            significado+=
              " ou Ácidos pirúvicos: O ácido pirúvico é o composto de menor energia que pode "+
            "ser obtido da glicose sem a utilização de oxigênio, são compostos orgânicos originados ao "+
            "final da glicólise ( Enzimas no citoplasma fazem uma cadeia metabólica na qual a  glicose "+
            "é oxidada produzindo duas moléculas de piruvato, duas moléculas de ATP e dois equivalentes "+
            "reduzidos de NADH+, que serão introduzidos na cadeia respiratória ou na fermentação).";
      default:
      break;
    }
    $(".div_glossario").html(significado);
    // aparece a div do glossário
    $('palavra_gloss').show();
}
//------------------- FIM -------------------/

/*
<span class=\"gloss\" onclick=\"active_gloss('elementos')\">
*/
