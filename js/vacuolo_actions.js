//alert("JS OK!");
var vacuolo_active=false;
var audioplayer = document.getElementById("audio_text");
audioplayer.play();

/*============== CLIQUE SOBRE O ELEMENTO VACUOLO ================*/
$(document).ready(function() {
  $(".citoplasma_position").click(function() {
    //chamando métodos que criam as galerias de imagem e video
    vacuolo_galeria_img();
    vacuolo_galeria_video();
    $(".text").html("texto sobre citoplasma");
    //ALTERAR TITURO ELEMENTO
    $(".titulo").html("Estudando Citoplasma");
    // RECUPERAR O ULTIMO ELEMENTO

    // REMOVER ESTE ELEMENTO
    $(".vacuolo_position").remove();
    //IMAGEM PÓS O CLIQUE
    $(".molde_position").attr("src","img/celula-vacuolo.jpg");
  });
  /*============== FIM CLIQUE SOBRE O ELEMENTO VACUOLO ================*/

/*==================== MOUSE SOBRE O ELEMENTO VACUOLO ===================*/

    /*$(".vacuolo_position").hover(
      /* ENQUANTO TIVER SOBRE ELEMENTO */
        /*function(){
          $(".molde_position").attr("src","img/celula-vacuolo.jpg");
        },
        /* AO DESFOCAR O ELEMENTO */
        /*function(){
          $(".molde_position").attr("src","img/celula-none.jpg");
        });
/*==================== FIM MOUSE SOBRE O ELEMENTO VACUOLO ===================*/
});
/*==================== FUNÇÕES VACUOLO ===================*/

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
