$( document ).ready(function() {
  $('#quiz').quiz({
    //resultsScreen: '#results-screen',
    //counter: false,
    //homeButton: '#custom-home',
    //counterFormat: 'Questão %current de %total',
    questions: [
      { //1
        'q': 'Qual foi o grande cientista que descobriu a célula em 1669?',
        'options': [
          'a) Albert Einstein',
          'b) Galileu Galilei',
          'c) Robert Hooke',
          'd) Louis Pasteur',
          'e) Francesco Redi'
        ],
        'correctIndex': 2,
        'correctResponse': 'Good job, that was obvious.',
        'incorrectResponse': 'Well, if you don\'t include it, your quiz won\'t work'
      },
      { /* 2
        'a) ',
        'b) ',
        'c) ',
        'd) ',
        'e) '
        */
        'q': 'Das alternativas abaixo qual organela que existe apenas em uma célula vegetal?',
        'options': [
          'a) Citoplasma',
          'b) Núcleo',
          'c) Parede celular',
          'd) Retículo endoplasmático rugoso',
          'e) Ribossomos'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Sounds more complicated than it really is.',
        'incorrectResponse': 'Come on, it\'s not that easy!'
      },
      { //3
        'q': 'O Lisossomo é formado a partir de uma organela, marque a verdadeira:',
        'options': [
          'a) Peroxissomos',
          'b) Retículo endoplasmático liso',
          'c) Mitocôndria',
          'd) Ribossomo',
          'e) Complexo de Golgi'
        ],
        'correctIndex': 4,
        'correctResponse': 'You\'re a genius! You just set allowIncorrect to true.',
        'incorrectResponse': 'Why you have no faith!? Just set allowIncorrect to true.'
      },
      { //4
        'q': 'A mitocôndria possui várias características, assinale a falsa.',
        'options': [
          'a) Possuir um DNA próprio',
          'b) Produção de energia (ATP)',
          'c) Fazer a degradação do etanol',
          'd) Fazer a respiração celular',
          'e) Possuir RNA próprio'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //5
        'q': 'Qual destes constituintes não solúveis não é do citoplasma?',
        'options': [
          'a) Ribossomos',
          'b) Lisossomos',
          'c) Mitocôndrias',
          'd) Vacúolos',
          'e) Enzimas'
        ],
        'correctIndex': 4,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { // 6
        'q': 'Núcleo é a estrutura que abriga o envoltório membranoso da célula (carioteca). Verdadeiro ou Falso?',
        'options': [
          'a) Verdadeiro',
          'b) Falso'
        ],
        'correctIndex': 0,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //7
        'q': 'Em qual das duas células o DNA é encontrado em cromossomos associados a proteínas?',
        'options': [
          'a) Eucariontes',
          'b) Procariontes'
        ],
        'correctIndex': 0,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //8
        'q': 'Qual destas funções não é da membrana plasmática?',
        'options': [
          'a) Controlar a entrada e saída de materiais',
          'b) Manter a consistência firme da célula',
          'c) Traduzir sinais hormonais da célula'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //9
        'q': '“Seres vivos possuem célula”. Um grupo, entretanto, não é formado por essa estrutura, o que leva muitos autores a não considerá-lo como um organismo vivo. Marque a alternativa verdadeira',
        'options': [
          'a) Algas',
          'b) Bactérias',
          'c) Vírus',
          'd) Plantas',
          'e) Protozoários'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //10
        'q': 'Todas as células possuem membrana, citoplasma e material genético. Entretanto as células mais desenvolvidas apresentam um núcleo definido e delimitado por membrana nuclear. Qual o nome dessas células.',
        'options': [
          'a) Procarióticas',
          'b) Eucarióticas',
          'c) Termófilas',
          'd) Autotróficas',
          'e) Heterotróficas'
        ],
        'correctIndex': 1,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //11
        'q': '(Fuvest-SP) Células animais, quando privadas de alimento, passam a degradar '+
              'partes de si mesmas como fonte de matéria-prima para sobreviver. A organela '+
              'citoplasmática diretamente responsável por essa degradação é:',
        'options': [
          'a) O lisossomo.',
          'b) O aparelho de Golgi.',
          'c) O centríolo.',
          'd) O mitocôndria.',
          'e) O ribossomo.'
        ],
        'correctIndex': 0,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //12
        'q': 'Qual das alternativas abaixo apresenta os nomes de duas formas de divisão celular?',
        'options': [
          'a) Interfase e Fotossíntese.',
          'b) Fagocitose e Osmose.',
          'c) Osmose e Anáfase.',
          'd) Mitose e Meiose.'
        ],
        'correctIndex': 3,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //13
        'q': 'Numa célula animal, qual organela possui a função de conservar e transmitir a informação genética na reprodução das células e regular as funções celulares.',
        'options': [
          'a) Ribossomos.',
          'b) Lisossomos.',
          'c) Citoplasma.',
          'd) Núcleo Celular.'
        ],
        'correctIndex': 3,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //14
        'q': 'Qual dessas regiões em uma célula apresenta uma alta atividade celular, onde acontece síntese de proteínas, duplicação do DNA',
        'options': [
          'a) Vacúolos.',
          'b) Lisossomos.',
          'c) Plastos.',
          'd) Núcleo Celular.'
        ],
        'correctIndex': 3,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //15
        'q': 'Numa célula eucariótica, a Tradução genética, a síntese de esteróides e a respiração celular estão relacionadas, respectivamente:',
        'options': [
          'a) Ao Complexo de Golgi, às mitocôndrias, aos ribossomos;',
          'b) Ao retículo endoplasmático liso, ao retículo endoplasmático granular, ao Complexo de Golgi;',
          'c) Aos ribossomos, ao retículo endoplasmático liso, às mitocôndrias;',
          'd) Ao retículo endoplasmático granular, às mitocôndrias, ao Complexo de Golgi;',
          'e) Ao retículo endoplasmático liso, ao Complexo de Golgi, às mitocôndrias.'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //16
        'q': '(UF-PA) Sobre as funções dos tipos de retículo endoplasmático, pode–se afirmar que:',
        'options': [
          'a) O rugoso está relacionado com o processo de síntese de esteróides;',
          'b) O liso tem como função a síntese de proteínas;',
          'c) O liso é responsável pela formação do acrossomo dos espermatozóides;',
          'd) O rugoso está ligado à síntese de proteína;',
          'e) O liso é responsável pela síntese de poliolosídios'
        ],
        'correctIndex': 3,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //17
        'q': 'Assinale a afirmação que não faz parte da teoria celular:',
        'options': [
          'a) Os seres vivos são formados por células.',
          'b) Os fenômenos fundamentais da vida ocorrem em nível celular.',
          'c) Toda célula resulta da divisão ou fusão de células pré-existentes.',
          'd) Em todos os seres vivos as células realizam o mesmo tipo de ciclo celular.',
          'e) As células-mãe transmitem suas características às células-filhas.'
        ],
        'correctIndex': 3,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //18
        'q': '(PUC) A cromatina, sob o aspecto morfológico, é classificada em eucromatina e heterocromatina. Elas se distinguem porque:',
        'options': [
          'a) A eucromatina se apresenta condensada durante a mitose e a heterocromatina já se encontra condensada na interfase;',
          'b) A eucromatina se apresenta condensada na interfase e a heterocromatina, durante a mitose;',
          'c) Só a heterocromatina se condensa e a eucromatina não;',
          'd) A eucromatina é Feulgen positivo e a heterocromatina é Feulgen negativo;',
          'e) A eucromatina é a que ocorre no núcleo e a heterocromatina é a que ocorre no citoplasma.'
        ],
        'correctIndex': 0,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //19
        'q': 'Os cloroplastos são importantes organelas presentes nas células vegetais e nas algas. A respeito dos cloroplastos, marque a alternativa incorreta:',
        'options': [
          'a) Os cloroplastos estão relacionados com o processo de fotossíntese.',
          'b) No interior dos cloroplastos, encontramos a clorofila, um pigmento de cor verde.',
          'c) No interior dos cloroplastos, encontramos estruturas em forma de vesículas achatadas que são chamadas de granum.',
          'd) O estroma é um fluido viscoso que preenche o cloroplasto.',
          'e) Os cloroplastos são revestidos por dupla membrana.'
        ],
        'correctIndex': 2,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      },
      { //20
        'q': 'Os cloroplastos possuem uma estrutura bastante complexa, possuindo, inclusive, DNA próprio e dupla membrana. Graças a essas particularidades, acredita-se que seus descendentes tenham sido organismos autotróficos que foram fagocitados. Essa teoria é conhecida como:',
        'options': [
          'a) Teoria da abiogênese.',
          'b) Teoria endossimbiótica.',
          'c) Teoria evolutiva.',
          'd) Teoria fagocitária.'
        ],
        'correctIndex': 1,
        'correctResponse': 'Correct! Refer to the documentation for the structure.',
        'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
      }
    ]
  });
});
