<!--
===========================================
Autor:Júlio César Lima Reis;
Email:juliolimareis@gmail.com;
===========================================

===========================================
  Este documento contem a aplicação da Cél-
  ula interativa criado no intuito educaci-
  onal para o primeiro ano do ensino médio
===========================================
Licença: GPL;
===========================================
-->
<?php
  require_once "security.php"; // Inclui o arquivo com o sistema de segurança
  protect_page(); // Chama a função que protege a página

?>
<html>
    <head>
        <title>Célula Vegetal</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Project">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- LINKS
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        -->
        <link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="style/main-j.css">
        <link rel="stylesheet" href="style/quiz.css">
        <!-- FIM LINKS -->
        <!-- SCRIPTS
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://jchamill.github.io/jquery-quiz/jquery.quiz-min.js"></script>
        -->
        <script type="text/javascript" src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.quiz-min.js"></script>
        <!-- add user -->
        <script type="text/javascript" src="js/doc_elements.js"></script>
        <script type="text/javascript" src="js/gerate_element.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/envio.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/quiz.js"></script>
        <!-- FIM SCRIPTS -->
    </head>
    <!--- LOADING ---->
    <div class="div_loading">
        <div class="cssload-dots">
            <div class="cssload-dot"></div>
            <div class="cssload-dot"></div>
            <div class="cssload-dot"></div>
            <div class="cssload-dot"></div>
            <div class="cssload-dot"></div>
        </div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" result="blur" stddeviation="12"></feGaussianBlur>
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo"></feColorMatrix>
                </filter>
            </defs>
        </svg>
    </div>
    <!--- FIM DIV LOADING
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ----->
    <body>
        <!--- DIV APP ----->
        <div class="app">
            <!--- BARRA DE NAVEGAÇÃO
        <div class="div-nav">
        ---->
            <nav class="navbar navbar-inverse navbar_position">
                <div class="container-fluid loading navegation-bar">
                    <div class="navbar-header">
                        <a class="navbar-brand btn btn-lg" href="">Célula Vegetal</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <!-- ABA TESTE SEUS CONHECIMENTOS -->
                        <li>
                            <a class="btn btn-lg border_botao_bar" href="#modal-quiz" data-toggle="modal">Teste Seus Conhecimentos</a>
                        </li>
                        <!-- FIM ABA TESTE SEUS CONHECIMENTOS -->
                        <!---ABA DOWNLOAD -->
                        <li class="dropdown">
                            <a class="dropdown-toggle btn btn-lg border_botao_bar" data-toggle="dropdown" href="#">Downloads<span class="caret"></span></a>
                            <ul class="dropdown-menu border_botao_bar">
                                <li>
                                    <a class="btn btn-lg" href="#">Material Didático em PDF</a>
                                </li>
                                <!--
                                <li>
                                    <a class="btn btn-lg" href="#">Aplicação Sem Internet</a>
                                </li>
                                -->
                                <li>
                                    <a class="btn btn-lg" href="#">Audios</a>
                                </li>
                            </ul>
                        </li>
                        <!---FIM ABA DOWNLOAD -->
                        <!-- ABA CURIOSIDADES -->
                        <li>
                            <a class="btn btn-lg border_botao_bar" href="#modal-curiosidades" data-toggle="modal">
                              Cusiosidades</a>
                        </li>
                        <!-- FIM ABA CURIOSIDADES -->
                        <!---ABA SOBRE -->
                        <li>
                            <a class="btn btn-lg border_botao_bar" href="#modal-sobre" data-toggle="modal">Sobre</a>
                        </li>
                        <!---FIM ABA SOBRE -->
                        <li>
                            <a class="btn btn-lg border_botao_bar" href="#modal-referencia" data-toggle="modal">Referências</a>
                        </li>
                        <li>
                            <a class="btn btn-lg border_botao_bar" href="exit.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!---
        </div>
        FIM BARRA NAVEGAÇÃO
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ##################################################################################
        ---->
            <!--- TEXTO DE INFORMAÇÃO DO ELEMENTO ----->
            <div class="titulo_principal titulo_item">
                <center>
                    <p class="titulo">Célula Vegetal</p>
                </center>
            </div>
            <!--- CELULA MAIN ------>
            <div class="celula_main">
                <!--- MOLDE DO MOLDE DA CELULA
				<img class="molde_position" src="img/elements/celula_p.jpeg">
				-->
                <img class="vacuolo_position" src="img/elements/vacuolo.png" onmouseover="hover_element('vacuolo')" onmouseout="out_element()" onclick="element_main(1)">
                <img class="citoplasma_position" src="img/elements/citoplasma.png" onmouseover="hover_element('citoplasma')" onmouseout="out_element()" onclick="element_main(2)">
                <img class="complexo_de_golgi_position" src="img/elements/complexo_de_golgi.png" onmouseover="hover_element('complexo_de_golgi')" onmouseout="out_element()" onclick="element_main(6)">
                <img class="cloroplasto_1_position" src="img/elements/cloroplasto_1.png" onmouseover="hover_element('cloroplasto_1')" onmouseout="out_element()" onclick="element_main(9)">
                <img class="cloroplasto_2_position" src="img/elements/cloroplasto_2.png" onmouseover="hover_element('cloroplasto_2')" onmouseout="out_element()" onclick="element_main(9)">
                <img class="reticulo_endoplasmatico_position" src="img/elements/reticulo_endoplasmatico.png" onmouseover="hover_element('reticulo_endoplasmatico')" onmouseout="out_element()" onclick="element_main(4)">
                <img class="mitocondria_position" src="img/elements/mitocondria.png" onmouseover="hover_element('mitocondria')" onmouseout="out_element()" onclick="element_main(7)">
                <img class="nucleo_position" src="img/elements/nucleo.png" onmouseover="hover_element('nucleo')" onmouseout="out_element()" onclick="element_main(10)">
                <img class="peroxissomo_1_position" src="img/elements/peroxissomo_1.png" onmouseover="hover_element('peroxissomo_1')" onmouseout="out_element()" onclick="element_main(11)">
                <img class="peroxissomo_2_position" src="img/elements/peroxissomo_2.png" onmouseover="hover_element('peroxissomo_2')" onmouseout="out_element()" onclick="element_main(11)">
                <img class="parede_celular_position" src="img/elements/parede_celular.png" onmouseover="hover_element('parede_celular')" onmouseout="out_element()" onclick="element_main(8)">
                <!--- FIM COMPONENTES CELULA ----->
            </div>
            <!-- FIM CELULA MAIN -------->
            <!--- DIV TEXTO ----->
            <div class="div_texto php_div">
                <!--- PARAGRAFO TEXTO ----->
                <p class="text">Clique sobre as <span class="palavra_gloss" onclick="active_gloss('organelas')">organelas</span>, aqui aparecerá textos de estudo</p>
                <!--- FIM PARAGRAFO TEXTO  ----->
            </div>
            <div class="div_audio">
</div>
            <!--- FIM DIV TEXTO  ----->
            <!-- AUDIO TEXTO ---->
            <!-- FIM AUDIO TEXTO ---->
            <!-- MINIATURA ---->
            <div>
                <img class="miniatura" src="img/elements/celula.jpeg">
            </div>
            <!-- FIM MINIATURA ---->
            <!-- BOTÃO AUDIO ---->
            <div class="switch_ botao_audio_position">
                <label>
                    <p class="texto_audio_voz">Assistente de Voz<br>Desligado</p>
                    <p class="ativado_voz">Ligado</p>
                    <input class="chekbox_hide_" checked="checked" onclick="action_audio()" type="checkbox">
                    <span class="lever_ leaver_"></span>
                </label>
            </div>
            <!-- FIM BOTÃO AUDIO ---->
            <!-- VERSÃO ---->
            <div class="version">
                <p>Versão - 1.0</p>
            </div>
            <!-- FIM VRESÃO --->
            <div class="botao_voltar_celula"></div>
            <!--- BOTOES MULTIMIDEA ---->
            <div class="botoes_mult">
</div>
            <!--- FIM --->
            <!-- GLOSSÁRIO -->
            <div id="teste" class="div_glossario">
</div>
            <!-- FIM -->
            <!-- DIV RELATÓRIO-->
            <div id="relatorio">
</div>
            <!-- FIM DIV RELATÓRIO -->
            <!--- FIM DIV APP
			##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
            ##################################################################################
			---->
            <!--- DIV ANNOTATION--->
            <div class="annotation">
                <!-- <textarea class="text_annotation div_anno" rows="4" cols="50"></textarea>
              -->
            </div>
            <!--- END ANNOTATION --->
            <!-- SCRIPT LOADING -->
            <script>
              $(".div_loading").fadeOut();
            </script>
            <!-- FIM SCRIPT LOADING -->
    </body>
    <!--- FIM DO BODY
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    COLEÇÃO MODAL --->
    <!-- MODAL GALERIA DE IMAGENS -->
    <div class="modal fade" id="modal-imagem" role="dialog">
        <div class="modal-dialog tamanho_modal_gallery">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Titulo modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">
                          Galeria de imagem</h3>
                    </center>
                </div>
                <!-- Fim Titulo modal -->
                <!-- Corpo modal -->
                <div class="modal-body body_modal_gallery">
                    <div class="painel_div_photo">
</div>
                </div>
                <!-- Fim modal corpo -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL GALERIA DE IMAGENS
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <!-- MODAL GALERIA DE VIDEO -->
    <div class="modal fade" id="modal-video" role="dialog">
        <div class="modal-dialog tamanho_modal_gallery">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Titulo modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">
                          Galeria de Vídeo</h3>
                    </center>
                </div>
                <!-- Fim Titulo modal -->
                <!-- Corpo modal -->
                <div class="modal-body body_modal_gallery">
                    <div class="painel_div_video">
</div>
                </div>
                <!-- Fim modal corpo -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL GALERIA DE VIDEO
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <!-- MODAL CURIOSIDADES -->
    <div class="modal fade" id="modal-curiosidades" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Titulo modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">Curiosidades</h3>
                    </center>
                </div>
                <!-- Fim Titulo modal -->
                <!-- Corpo modal -->
                <div class="modal-body curiosidade curiosidades">
                    1 - Os humanos possuem 100 trilhões de células, em vários lugares e com funções específicas.
                    <br>
                    <br>
                    2 - Organela ou organelo em Biologia Celular é um termo usado para as estruturas especializadas que cada célula, onde ficam suspensas no citoplasma. A palavra "organelo" deriva do termo latinizado "organello" (pequeno órgão).
                    <br>
                    <br>
                    3 - As células foram descobertas entre 1663 e 1665 pelo inglês Robert Hooke que era um físico experimental. Cella que dá origem a palavra cell no inglês no latim significa “quanto pequeno”.
                    <br>
                    <br>
                    4 - A maior parte dos organelos é envolvido por membrana. Alguns organelos foram provavelmente originados a partir de bactérias endossimbiontes.
                    <br>
                    <br>
                    5 - A teoria da endossimbiose é montada a partir de que células fagocitaram os cloroplastos e as mitocôndrias  que eram organismos procariontes livres, e após a absorção tiveram uma relação mutualística, formando uma célula eucarionte completa.
                    <br>
                    <br>
                    6 - Como o corpo humano é movido a oxigênio, as últimas células a morrer são as que menos precisam de oxigênio, as epiteliais da córnea.
                    <br>
                    <br>
                    7 - Há muitos tipos diferentes de células, que variam enormemente em tamanho, forma e funções especializadas. Mesmo assim sua estrutura básica e seus componentes sempre são semelhantes.
                    <br>
                    <br>
                    8 - Retículo endoplasmático, aparelho de Golgi ou complexo de Golgi, vacúolos foram provavelmente originados pelas invaginações da membrana celular.
                    <br>
                    <br>
                    9 - Existem seres vivos que possuem apenas uma célula para sobreviver, são chamados de unicelulares ex: Fungos, amebas, bactérias e algumas microalgas, e já seres que possuem muitas células são chamados de multicelulares ou pluricelulares ex: Animais e plantas.
                    <br>
                    <br>
                    10 - A menor célula do corpo é o espermatozóide, por ter apenas a função de carregar o material genético masculino e transmitir para o óvulo, é vantajoso ser pequeno para ter mais agilidade no espaço extracelular.
                    <br>
                    <br>
                    11 - A maior célula do corpo é o óvulo feminino, além de carregar o material genético da mãe, tem que adquirir nutrientes para a formação do zigoto e do embrião e desenvolver outra vida, por isso seu grande tamanho comparado a outra células.
                    <br>
                    <br>
                    12 - A célula vegetal e animal tem várias semelhanças nas suas estruturas básicas, como mitocôndria, complexo de Golgi, Ribossomos e centríolos, e mais algumas estruturas básicas.
                    <br>
                    <br>
                    13 - A célula vegetal se diferenciam principalmente pelos Plastos e pelo vacúolo que as células vegetais possuem. Onde as células vegetais fazem seus constituintes produzirem seu
                    próprio alimento (autótrofos) e por produzirem mais componentes precisa de um local extra de armazenamento de excreção, ou seja ajuda no controle do equilíbrio osmótico que é o vacúolo.
                    Além da Célula vegetal possui uma proteção extra chamada de parede celular formada por celulose.
                    <br>
                    <br>
                    14 - As células mais abundantes são as epiteliais, que estão envolta de toda nossa pele.
                    <br>
                    <br>
                    15 - Células animais não são apenas minúsculas, mas também incolores e translúcidas e para visualizá-las é importante o desenvolvimento de técnicas de microscopia.
                    <br>
                    <br>
                    16 - Os neurônios são as células que possuem o tempo de vida mais curto, por usarem muita energia e precisarem de muito oxigênio, apenas alguns segundos sem respirar pode matar várias delas.
                    <br>
                    <br>
                    17 - A estrutura mais visível que dá para visualizar uma célula pelo microscópio é a parede celular, que praticamente será a primeira estrutura a ser visualizada sem dificuldade de uma célula vegetal.
                    <br>
                    <br>
                    18 - Os humanos não conseguem digerir 100% os vegetais, pois as células dos vegetais possuem celulose, e os humanos não estão adaptados a digerir celulose.
                    <br>
                    <br>
                    19 - Muitos autores não consideram o vírus como ser vivo por não possuírem célula.
                    <br>
                    <br>
                    20 - A diferença principal entre mitose e meiose, é que na mitose a principal função é manutenção do corpo, onde as células mães irão se dividir e gerar uma célula filha idêntica, enquanto a meiose produzirá variabilidade genètica onde são produzidos para uso do  gameta.
                </div>
                <!-- Fim modal corpo -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL CURIOSIDADES
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <!-- MODAL REFERENCIA -->
    <div class="modal fade" id="modal-referencia" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Titulo modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">Referências do Site</h3>
                    </center>
                </div>
                <!-- Fim Titulo modal -->
                <!-- Corpo modal -->
                <div class="modal-body">
                  <center>
                    <h4>Imagens</h4>

                      <h5>Célula Principal</h5>
                      http://objetoseducacionais2.mec.gov.br/bitstream/handle/mec/18686/1292519221781_celula_vegetal_cederj_ok.jpg?sequence=1
                      <br>

                      <h5>Citoplasma</h5>
                      http://www.infoescola.com/citologia/citoplasma
                      <br>
                      https://mmegias.webs.uvigo.es/5-celulas/4-poros.php
                      <br>

                      <h5>Cloroplastos</h5>
                      http://www.teliga.net/2010/06/plastos-e-cloroplastos.html
                      <br>
                      http://www.teliga.net/2010/06/plastos-e-cloroplastos.html
                      <br>
                      https://www.slideshare.net/LinIri/clipboards/fotosintesis

                      <h5>Complexo de Golgi</h5>
                      http://www.nuepe.ufpr.br/blog/?page_id=550
                      <br>
                      http://www.estudopratico.com.br/complexo-de-golgi-estrutura-e-funcoes

                      <h5>Lisossomos</h5>
                      http://www.geocities.ws/fabiopacheco/bio_lisossomo.html
                      <br>
                      http://biologiaucs.blogspot.com.br/2011/07/lisossomos-do-grego-lise-quebra.html
                      <br>
                      http://www.sobiologia.com.br/conteudos/Citologia/cito21.php
                      <br>
                      http://biologiacelularufg.blogspot.com.br/2011
                      <br>


                      <h5>Membrana Plasmática</h5>
                      http://www.efn.uncor.edu/departamentos/divbioeco/anatocom/Biologia/Celula/Componentes%20celulares/Membrana%20celular.htm
                      <br>
                      http://www.chimica-online.it/biologia/membrana-cellulare.htm
                      <br>
                      http://www.infoescola.com/citologia/membrana-plasmatica

                      <h5>Mitocôndria</h5>
                      http://interna.coceducacao.com.br/ebook/pages/1967.htm
                      <br>
                      http://katyabotanica.blogspot.com.br/2016
                      <br>

                      <h5>Núcleo e Nucléolo</h5>
                      http://wesleibio.blogspot.com.br/2016/03/citologia-basica.html
                      <br>
                      http://www.ufrgs.br/biologiacelularatlas/nucleo.htm
                      <br>
                      http://myslide.es/documents/membrana-y-nucleo.html
                      <br>
                      https://www.nobelprize.org/nobel_prizes/medicine/laureates/1992/illpres/proteins.html
                      <br>
                      http://anatpat.unicamp.br/bineucortexnlme2.htm      

                      <h5>Parede Celular</h5>
                      http://www.mundobiologia.com/2016/01/parede-celular-funcoes-e-componentes.htmlhttp://www.mundobiologia.com/2016/01/parede-celular-funcoes-e-componentes.html
                      <br>
                      https://maricarmensmv.wordpress.com/2014/11/29/p6-observacion-de-las-celulas-de-la-epidermis-de-la-cebolla-2112014
                      <br>
                      http://www.ebah.com.br/content/ABAAAfSEsAK/aula-biologia-vegetal-05-parede-celular
                      <br>
                      http://biologia.laguia2000.com/wp-content/uploads/2015/04
                      <br>

                      <h5>Retículo endoplasmático</h5>
                      http://alunosonline.uol.com.br/biologia/complexo-golgi.html
                      <br>
                      http://www.prof2000.pt/users/biologia/Organelos.htm
                      <br>

                      <h5>Vacúolo</h5>
                      http://anatpat.unicamp.br/xrpghistoplasmose1r.html
                      <br>
                      http://perso.wanadoo.es/calcafenanpesat/1rBatx2d.htm
                      <br>

                      <h5>Ribossomo</h5>
                      http://biologianet.uol.com.br/biologia-celular/ribossomos.htm
                      <br>
                      http://www.dacelulaaosistema.uff.br/?p=446
                      <br>
                      http://bioinvisivel.blogspot.com.br/2010/11/organelas-ribossomos.html
                      <br>

                      <h5>Peroxissomo</h5>
                      http://www.sobiologia.com.br/conteudos/Citologia/cito23.php
                      <br>

                      <br>

                      <h5></h5>

                      <br>

                      <br>

                      <h5></h5>

                      <br>

                      <br>

                      <h5></h5>

                      <br>

                      <br>

                      <h5></h5>

                      <br>

                      <br>

                      <h5></h5>
                      <br>

                      <br>
                  </center>
                </div>
                <!-- Fim modal corpo -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL REFERENCIAS
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <!-- MODAL TESTE SEUS CONHECIMENTOS -->
    <div class="modal fade" id="modal-quiz" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">Questões de Múltipla Escolha</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <!-- Quiz -->
                    <div id="quiz">
                        <div id="quiz-header">
</div>
                        <div id="quiz-start-screen">
                            <p><button type="button" id="quiz-start-btn" class="btn btn-info btn-lg">
                                    Vamos começar!
</button></p>
                        </div>
                    </div>
                    <!-- Fim Quiz -->
                </div>
                <!-- fim modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL TESTE SEUS CONHECIMENTOS
    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <!-- MODAL SOBRE -->
    <div class="modal fade" id="modal-sobre" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Titulo modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h3 class="modal-title">Informações do Site</h3>
                    </center>
                </div>
                <!-- Titulo modal -->
                <!-- Corpo modal -->
                <div class="modal-body">
</div>
                <!-- Fim modal corpo -->
                <div class="modal-footer">
                    <center>
                        <a href="https://www.gnu.org/licenses/gpl-3.0.en.html" target="_blank">
              Lincença: GPL</a>
                    </center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- End Modal content -->
        </div>
    </div>
    <!-- FIM MODAL SOBRE -->
    <!-- FIM COLEÇÃO MODAL
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    ##################################################################################
    -->
</html>
