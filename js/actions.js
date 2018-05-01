/*---------------------------------------/
Autor:Júlio César Lima Reis;
Email:juliolimareis@gmail.com;
-----------------------------------------/

Descrição do documento ------------------/
  Este documento é responsável por ativar
  as funções de alteração  da  aplicação.
  Algumas funções estão em /js/gerate_element
-----------------------------------------/
licença: GPL;
----------------------------------------*/

/*
	<span class=\"gloss\" onclick=\"active_gloss('ciclo do glioxilato')\">ciclo do glioxilato</span>
*/

default_title();
default_text();
default_audio_text();
var element_select = "none";

//------------- ATIVADOR DE ELEMENTOS --------------/

function element_main(element_number){
  //invoca o botão voltar
  add_button_back();

	/*adiciona o texto "Clique abaixo para ouvir texto"
	e a tag audio, que será preenchida de acordo com o elemento
	selecionado abaixo*/
	//set_text_auxiliar_audio();

  //de acordo com a numeração, invocar o elemento
  switch (element_number) {
    //cria elementos do Vacuolo
    case 1:
			element_select = "ant_vacu";
      gerate_element(create_vacuolo());
      set_element("vacu");
      //esconte os elementos da célula
      //hide_cell();
      //modifica a miniatura
      //up_miniature();
      break;
      case 9:
				element_select = "ant_cloro"
        set_element("cloro");
        gerate_element(create_cloroplasto());
        //esconte os elementos da célula
        //hide_cell();
        //modifica a miniatura
        //up_miniature();
        break;
        case 7:
				element_select = "ant_mito";
          set_element("mito");
          gerate_element(create_mitocondria());
          //esconte os elementos da célula
          //hide_cell();
          //modifica a miniatura
          //up_miniature();
          break;
          case 6:
						element_select = "ant_comp";
            set_element("comp");
            gerate_element(create_complexo_de_golgi());
            //esconte os elementos da célula
            //hide_cell();
            //modifica a miniatura
            //up_miniature();
            break;
            case 4:
							element_select = "ant_reti";
              set_element("reti");
              gerate_element(create_reticulo_endoplasmatico_liso());
							//alert("foi");
              //esconte os elementos da célula
              //hide_cell();
              //modifica a miniatura
              //up_miniature();
              break;
              case 5:
								element_select = "ant_memb_celu";
                set_element("memb_celu");
                gerate_element(create_membrana_celular());
                //gerate_element(membrana_celular());
                //esconte os elementos da célula
                //hide_cell();
                //modifica a miniatura
                //up_miniature();
                break;
                case 3:
									element_select = "ant_memb_nucl";
                  set_element("memb_nucl");
                  gerate_element(create_membrana_nuclear());
                  //gerate_element(membrana_nuclear());
                  //esconte os elementos da célula
                  //hide_cell();
                  //modifica a miniatura
                  //up_miniature();
                  break;
                  case 10:
										element_select = "ant_nucl";
                    set_element("nucl");
                    gerate_element(create_nucleo());
                    //gerate_element(nucleolo());
                    //esconte os elementos da célula
                    //hide_cell();
                    //modifica a miniatura
                    //up_miniature();
                    break;
                    case 2:
											element_select = "ant_memb_plas";
                      set_element("membrana_plasmatica");
                      gerate_element(create_membrana_plasmatica());
                      //gerate_element(citoplasma());
                      //esconte os elementos da célula
                      //hide_cell();
                      //modifica a miniatura
                      //up_miniature();
                      break;
										case 8:
											element_select = "ant_pare";
											set_element("pare");
											gerate_element(create_parede_celular());
											//gerate_element(citoplasma());
											//esconte os elementos da célula
											//hide_cell();
											//modifica a miniatura
											//up_miniature();
											break;
											case 11:
												element_select = "ant_pero";
												set_element("peroxissomo");
												gerate_element(create_peroxissomo());
												//gerate_element(citoplasma());
												//esconte os elementos da célula
												//hide_cell();
												//modifica a miniatura
												//up_miniature();
												break;
    default:
    console.log("default");
  }
	//adiciona as imagens de acordo com o elemento selecionado
	add_painel_mult();
  //esconde a célula
  hide_cell();
  //almenta e centraliza a miniatura
  up_miniature();
  add_button_mult();
  //adiciona o menu de elementos
  //add_menu_element();

  //se o audio estiver ativado, ativar função abaixo
}
//------------- FIM --------------/
