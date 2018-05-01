alert("JS OK!");
var vacuolo_active=false;

/*============== CLIQUE SOBRE O ELEMENTO VACUOLO ================*/
$(document).ready(function() {
  $(".vacuolo_position").click(function() {
    //chamando métodos que criam as galerias de imagem e video
    vacuolo_galeria_img();
    vacuolo_galeria_video();
    $(".text").html("Os vacúolos do latim \"vaccuus\" - vácuo são estruturas celulares, muito abundantes nas células vegetais, contidas no citoplasma da célula, de forma mais ou menos esféricas ou ovalado, geradas pela própria célula ao criar uma membrana fechada que isola um certo volume celular do resto do citoplasma. Seu conteúdo é fluido, armazenam produtos de nutrição ou de excreção, podendo conter enzimas lisosômicas ou até mesmo pigmentos, caso em que tomam o nome de vacúolos de suco celular.Os vacúolos de suco celular são delimitados pelo tonoplasto, membrana lipoproteica, e são exclusivos das células de plantas e de certas algas. Nas células jovens de plantas são numerosos e pequenos, e á medida que a célula cresce eles se fundem em um único, grande e bem-desenvolvido vacúolo. No interior do vacúolo há uma solução aquosa de varias substancias, destacando-se sais, carboidratos e proteínas. Os vacúolos de suco celular são importantes nos fenômenos osmóticos, e por poderem conter também pigmentos, como as antocianinas, são os principais responsáveis pela coloração azul, violeta, vermelha e púrpura das flores e folhas. Nas células animais os vacúolos são raros e não têm nenhum nome específico. Contudo, as células do tecido adiposo (os adipócitos) possuem vacúolos repletos de gordura, que servem como reserva energética. Nos protozoários podem ter funções diversas, como seus nomes indicam: vacúolo digestivo, vacúolo pulsátil ou excretor.");
    //ALTERAR TITURO ELEMENTO
    $(".titulo").html("Estudando Vacúolo");
    // RECUPERAR O ULTIMO ELEMENTO

    // REMOVER ESTE ELEMENTO
    $(".vacuolo_position").remove();
    //IMAGEM PÓS O CLIQUE
    $(".molde_position").attr("src","img/celula-vacuolo.jpg");
  });
  /*============== FIM CLIQUE SOBRE O ELEMENTO VACUOLO ================*/

/*==================== MOUSE SOBRE O ELEMENTO VACUOLO ===================*/
    $(".vacuolo_position").hover(
      /* ENQUANTO TIVER SOBRE ELEMENTO */
        function(){
          $(".molde_position").attr("src","img/celula-vacuolo.jpg");
        },
        /* AO DESFOCAR O ELEMENTO */
        function(){
          $(".molde_position").attr("src","img/celula-none.jpg");
        });
/*==================== FIM MOUSE SOBRE O ELEMENTO VACUOLO ===================*/
});
/*==================== FUNÇÕES VACUOLO ===================*/

var div = document.createElement('div');
div.className = "foto";
div.appendChild(a)

//função que ativa a galeria de imagens do vacuolo
function vacuolo_galeria_img(){
  $(".galeria_imagem_position").html("<div class=\"galeria_imagens div_galeria_imagem\">"+
    "<center>"+
        "<selection>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_01.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_01.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
              "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_10.png\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_10.png\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_02.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_02.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_03.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_03.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_04.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_04.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_05.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_05.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_06.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_06.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_07.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_07.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_08.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                    "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_08.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

            "<div class=\"foto\">"+
                "<a class=\"example-image-link\" href=\"img/galeria/vaculo/vac_09.jpeg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\">"+
                  "<img class=\"example-image img_galeria\" src=\"img/galeria/vaculo/vac_09.jpeg\" alt=\"\" />"+
                "</a>"+
                "<p class=\"descricao_foto\">"+
              "Normalmente uma célula vegetal apresenta apenas um único e grande vacúolo de suco celular.</p>"+
            "</div>"+

      "</selection>"+
    "</center>"
  );// fim do js que invoca o html
}// fim da função vacuolo_galeria_img

// função ativa a galeria de video
function vacuolo_galeria_video(){
  $(".galeria_video_position").html(
    "<div class=\"galeria_video\">"+
      "<center>"+

        "<div class=\"video\">"+
          "<div class=\"embed-responsive embed-responsive-16by9\">"+
            "<iframe allowFullScreen='allowFullScreen' class=\" embed-responsive-item\" src=\"https://www.youtube.com/embed/z9IkeoB7Zuk\"></iframe>"+
           "</div>"+
        "</div>"+

        "<div class=\"video\">"+
          "<div class=\"embed-responsive embed-responsive-16by9\">"+
            "<iframe allowFullScreen='allowFullScreen' class=\" embed-responsive-item\" src=\"https://www.youtube.com/embed/1Jp2qxGBiaA\"></iframe>"+
           "</div>"+
        "</div>"+

        "<div class=\"video\">"+
          "<div class=\"embed-responsive embed-responsive-16by9\">"+
            "<iframe allowFullScreen='allowFullScreen' class=\" embed-responsive-item\" src=\"https://www.youtube.com/embed/jnAdPX-gK5E\"></iframe>"+
           "</div>"+
        "</div>"+

        "<div class=\"video\">"+
          "<div class=\"embed-responsive embed-responsive-16by9\">"+
            "<iframe allowFullScreen='allowFullScreen' class=\" embed-responsive-item\" src=\"https://www.youtube.com/embed/jnAdPX-gK5E\"></iframe>"+
           "</div>"+
        "</div>"+

      "</center>"+
    "</div>"
  ); // fim galeria_video_position
} //fim função que invoca a aba videos
/*==================== FIM FUNÇÕES VACUOLO ===================*/



/*==================== FIM GALERIA IMAGEM ===================*/