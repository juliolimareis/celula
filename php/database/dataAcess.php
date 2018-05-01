<?php
    //require_once 'bd.php';
    ///////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    /*
        ESTE DOCUMENTO É ORIENTADO A OBJETOS, VISANDO COM QUE APENAS UMA CONEXÃO COM BANCO DE DADOS SE TORNE ATIVO, NESTE EXEMPLO
        UMA VEZ QUE QUALQUER UMA ESTANCIAR A CLASSE APENAS UMA CONEXAO SERÁ EXECUTADA, E TODAS AS INSTÃNCIAS IRÃO COMPARTILHAR A CONEXAO.
        POR ISSO FOI DEFINIDO COMO ESTÁTICO OS DADOS DA CONEXÃO E PROPRIA CONEXÃO.
    */
    ///////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    /*
    $bd = new dataAcess();
    //$resp = $bd->GetElements('tabela',array("Nome","Sobrenome"), "Nome='Rafael'");
    //var_dump($resp);
    $resp = $bd->Conectar();
    echo $resp;*/

    class dataAcess{
            private static $BDServer = "localhost";         // SERVIDOR DE BANCO DE DADOS
            private static $BDUser   =  "root";              // USUARIO BANCO DE DADOS
            private static $BDPass   =  "sql-server";              // SENHA BANCO DE DADOS
            private static $BDBase   =  "celula";//"estacaobd";        // BASE DE DADOS SELECIONADA
            private static $BDActive;                       // INDICA SE A CONEXAO ESTA OU NÃO ATIVA
            private static $BDCon;                          // VARIAVEL QUE GUARDA A CONEXAO
            private $BDError;                               // VARIAVEL QUE GUARDA CÓDIGO DE ERRO SE HOUVER
            //private $log;

            //---> MÉTODO CONSTRUTOR
            function __construct(){
                //$this->log = $l;
                /*if(self:: $BDActive == NULL){
                    self:: $BDActive =false;
                }
                $this->Conectar();*/
            }
            /*
                O MÉTODO CONSTRUTOR VERIFICA SE JÁ EXISTE VALOR PARA VÁRIVEL BDActive ESSA VARÍAVEL INDICA SE JÁ EXISTE ALGUMA CONEXAO
                ATIVA OU NÃO PARA EVITAR QUE SEJAM FEITAS VÁRIAS CONEXOES OU SOLICITAÇÃO DE DESCONEXÃO, SE FOR A PRIMEIRA VEZ ESSA
                VARIAVEL É DETERMINADA COMO FALSE INDICANDO QUE NÃO HÁ CONEXOES ATIVAS , APÓS ISSO É FEITA JÁ A PRIMEIRA TENTATIVA DE
                CONEXAO COM BANCO DE DADOS
            */
            //---> MÉTODO CONSTRUTOR

            //---> MÉTODO PARA CONSTRUIR A BASE DE DADOS
            public function Conectar(){
                if(!self:: $BDActive){
                    self:: $BDCon = @mysqli_connect(self::$BDServer,self::$BDUser,self::$BDPass,self::$BDBase);
                    $this->BDError =  mysqli_connect_errno();
                    if($this->BDError != 0){
                        self::$BDActive = false;
                        //$this->log->Registrar("MySql " .$this->BDError . " " . $this->BDError() );
                        return false;
                    }
                    else{
                        self::$BDActive = true;
                        return true;
                    }
                }
                else{
                    return true;
                }

            }
            /*
                ESTA FUNCAO NÃO É NECESSÁRIA SER ATIVADA, QUANDO A CLASSE É INSTANCIADA O PRÓPRIO MÉTODO CONSTRUTOR EXECUTA
                ESSE MÉTODO. PRIMEIRO É VERIFICADO SE HÁ OU NÃO CONEXÕES ATIVAS, SE HAVER JÁ E RETORNADO COMO TRUE INDICANDO QUE A CONEXAO              JÁ ESTA ATIVA, CASO NÃO POSSUA ELE INICIA O PROCESSO DE CONEXÃO CASO VENHA A APRESENTAR ERRO ESTE ERRO É ARMAZENADO NA
                VARIÁVEL BDError, REGISTRADO UM LOG DE ERRO RETORNANDO FALSE INDICANDO QUE HOUVE UM ERRO NA CONEXAO E NÃO FOI POSSÍVEL
                CONECTAR, CASO TUDO TENHA IDO NOS CONFORMES
            */
            //---> MÉTODO PARA CONSTRUIR A BASE DE DADOS

            //---> FUNCAO DESCONECTAR BASE DE DADOS
            public function Desconectar(){
                if(self:: $BDActive){
                    mysqli_close(self::$BDCon);
                    return "Desconectado com sucesso" ;
                }
                else{
                    return "Nao Existem Conexoes Ativas";
                }
            }
            /*
                ESTA FUNCAO REALIZA DESCONEXÃO COM A BASE DE DADOS, PARA ISSO ELE VERIFICA SE HÁ CONEXÕES ATIVAS PARA QUE SEJA REALIZADO
                O PROCEDIMENTO RETORNANDO CONFIRMAÇÃO POR MENSAGEM, CASO NÃO TENHA CONEXOES RETORNA VIA MENSAGENS QUE NÃO POSSUI CONEXOES
                ATIVAS
            */
            //---> FUNCAO DESCONECTAR BASE DE DADOS

            //---> BASE DE ERROS POSSIVEIS
            public function Error(){
                switch($this->BDError){
                    case 0    :  return  "Mysql: Nenhum erro foi detectado" ; break;
                    case 1044 :  return  "Mysql: Usuario Incorreto" ; break ;
                    case 2002 :  return  "Mysql: Servidor incorreto" ; break ;
                    case 1045 :  return  "Mysql: Senha incorreta" ; break ;
                    case 1049 :  return  "Mysql: Base de dados nao encontrada" ; break ;
                    case 1146 :  return  "Mysql: Erro ao executar SQL -> Tabela não encontrada, erro de sintaxe"; break;
                    case 1064 :  return  "Mysql: Erro ao executar SQL -> Erro de sintaxe "; break;
                    case 1054 :  return  "Mysql: Erro ao executar SQL -> Coluna não encontrada, erro de sintaxe"; break;
                    case 1136 :  return  "Mysql: Variaveis não condizem com a tipagem na inserção" ; break;
                    case 1062 :  return  "Mysql: Coluna dupliada em banco de dados não permitido" ; break;
                    default:     return  "Mysql: Erro Desconhecido" ;
                }
            }
            /*
                MÉTODO RETORNA A REFERENCIA DO ERRO ARMAZENADO NA VARIAVEL BDErrror
            */
            //---> BASE DE ERROS POSSIVEIS

            public function ErrorID(){
                return $this->BDError;
            }


            //--->EXECUTA CODIGO SQL
            function Executar($sql){

                $desc= false;
                $result = false;
                if(!self ::$BDActive){     //TESTA SE EXISTE CONEXAO COM BD ATIVO
                    $this->Conectar();  // SE NÃO TIVER CONECTA A BASE DE DADOS
                    $desc = true;
                }
                if(self ::$BDActive){
                    $result = mysqli_query(self :: $BDCon,$sql);  // EXECUTA COMANDO SQL
                    $this->BDError =  mysqli_errno(self:: $BDCon);  // ARMAZENA SE HOUVE ALGUM ERRO
                    if($this->BDError != 0){   // SE HOUVER ERRO
                        //$this->log->Registrar ("MySql " .$this->BDError . " " . $this->BDError() );  // REGISTRA O LOG DE ERRO
                    }
                }
                /*
                if($desc){  // COMO NÃO HÁ CONEXOES ATIVAS  E FOI FEITA UMA CONEXAO POR DEMANDA EXECUTA DESCONECTAR
                    $this->Desconectar();
                }*/
                return $result;
            }
            /*
                ESTA FUNÇÃO EXECUTA OS COMANDOS MYSQL
            */
            //--->EXECUTA CODIGO SQL


            // FUNÇÃO PARA SALVAR OS DADOS SQL
            /**
            *   ESTA FUNÇÃO TEM COMO OJBETIVO SALVAR OS DADOS ENVIADOS A PARTIR DO ARRAY
            *
            *
            **/
              /*
            public function getUser(){

              $_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
              mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

              $sql = "SELECT `id`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
              $query = mysql_query($sql);
              return $resultado = mysql_fetch_assoc($query);
            }*/

            public function Create(){ //FUNÇÃO PARA CRIAR UMA ENTIDADE
                $numargs = func_num_args(); // PEGA O NUMERO DE ARGUMENTOS PASSADOS
                $args = func_get_args(); // PEGA OS ARGUMENTOS
                $table='';// NOME DA TABELA PARA EXECUÇÃO
                $data= array(); // DADOS A SEREM SALVOS

                if($numargs>0 && is_array($args[0])){
                    $args = $args[0]; // REDUZ A QUANTIDADE DE ARRAY PASSADOS POR PARÂMETROS
                }

                if(sizeof($args)<2 || !is_string($table=$args[0]) || !is_array($data= $args[1])){
                    return 16; // PASSAGEM INCORRETA DE ARGUMENTOS
                    //echo 16;
                }
                if(!$this->existTable($table)){  // VERIFICAÇÃO DA EXISTÊNCIA DA TABELA
                    return 1146; // TABELA PARA EXECUÇÃO NÃO EXISTE
                    //echo 1146;
                }
                $id= "SELECT column_name FROM information_schema.COLUMNS WHERE TABLE_SCHEMA ='".self::$BDBase."' AND TABLE_NAME ='$table' LIMIT 1";
                $id= mysqli_fetch_assoc ($this->Executar($id))['column_name'];
                //$keys = $this->GetKeys($table); // OBTENDO AS CHAVES
                $sql1= 'START TRANSACTION ;'; // SQL PARA EXECUTAR UMA TRANSAÇÃO
                $sql2= $this->CreateSQL($table, $data); // SQL PARA INSERÇÃO DOS DADOS
                $sql3= "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1"; // SQL PARA PEGAR O ID

                //--> TESTANDO AS EXECUÇÕES SQL
                if($this->Executar($sql1)!= false && $this->Executar($sql2) !=false && ($resp = $this->Executar($sql3))!= false){
                    $id = mysqli_fetch_assoc($resp)[$id];
                    $this->Executar('COMMIT;');
                    //$this->Executar('ROLLBACK;');
                    return array('status'=>'sucess', "lastid"=>$id); // RETORNA A CONFIGURAÇÃO
                }
                else{
                    $this->Executar('ROLLBACK;');
                    return $this->ErrorID(); // RETORNA O ID DO ERRO
                }
                /*
                if($table != null && $data != null && $this->existTable($table)){
                    $keys = $this->GetKeys($table); // OBTENDO AS CHAVES
                    $sql1= 'START TRANSACTION ;';
                    $sql2= $this->CreateSQL($table, $data);
                    //$sql3= "SELECT $keys[0] FROM $table ORDER BY $keys[0] DESC LIMIT 1";
                    /// ROLLBACK;
                    //var_dump($keys);
                    //echo $sql1 . "<br>" . $sql2 . "<br>";//$sql3 . "<br>";
                }*/

            }

            // --------------------------> FUNÇÃO PARA ATUALIZAR OS DADOS NO BANCO DE DADOS <-------------------------\\
            public function Update($table, $data){ // FUNÇÃO PARA ATUALIZAR UMA ENTIDADE
                $numargs = func_num_args(); // PEGANDO O NUMERO DE ARGUMENTOS
                $args = func_get_args(); // PEGANDO OS ARGUMENTOS
                $table;
                $id;

                if($numargs>0 && is_array($args[0])){ // VEREFICA SE FOI PASSADO UM ARRAY
                    $args= $args[0]; // RETIRA A REDUDANCIA DE PASSAGENS DE VALORES
                }
                if(sizeof($args)<2 || !is_string($table=$args[0]) || !is_array($id= $args[1])){
                    return 16; // PASSAGEM INCORRETA DE ARGUMENTOS
                    //echo 16;
                }
                if(!$this->existTable($table)){  // VERIFICAÇÃO DA EXISTÊNCIA DA TABELA
                    return 1146; // TABELA PARA EXECUÇÃO NÃO EXISTE
                    //echo 1146;
                }
                $sql1= 'START TRANSACTION ;'; // SQL PARA EXECUTAR UMA TRANSAÇÃO
                $sql2= $this->UpdateSQL($table, $data); // SQL PARA INSERÇÃO DOS DADOS

                //-------------------------> EXECUTANDO O CÓDIGO SQL <-------------------------------------------------------------\\
                if($this->Executar($sql1)!= false && $this->Executar($sql2) !=false){
                    $this->Executar('COMMIT;'); // TERMINA A EXECUÇÃO
                    //$this->Executar('ROLLBACK;');
                    return array('status'=>'sucess'); // RETORNA A CONFIGURAÇÃO
                }
                else{
                    $this->Executar('ROLLBACK;'); // DESFAZ A AÇÃO
                    return $this->ErrorID(); // RETORNA O ID DO ERRO
                }
                //-------------------------> EXECUTANDO O CÓDIGO SQL <-------------------------------------------------------------\\

            }
            public function Delete(){
            	// -----------> FUNÇÃO PARA DELETAR INFORMAÇÕES
                $numargs = func_num_args(); // PEGANDO O NUMERO DE ARGUMENTOS
                $args = func_get_args(); // PEGANDO OS ARGUMENTOS
                $table; // TABELA
                $param; // ID PARA DELETAR

                if($numargs>0 && is_array($args[0])){ // VEREFICA SE FOI PASSADO UM ARRAY
                    $args= $args[0]; // RETIRA A REDUDANCIA DE PASSAGENS DE VALORES
                }


                if(sizeof($args)<2 || !is_string($table=$args[0]) || !is_array($args[1])){
                    //echo "erro 16";
                    return 16; // PASSAGEM INCORRETA DE ARGUMENTOS
                }
                //s$keys= array_keys($args[1]);//PEGA AS CHAVES
                $id= $args[1]; // OBTEM O ID

                // -------------------> VERIFICA CONEXÃO COM O BANCO<---------------------------------\\
                if($resp = $this->Conectar() == false){
                    return $this->ErrorID();// RETORNA O ID DE ERRO NO BANCO
                }
                // -------------------> VERIFICA CONEXÃO COM O BANCO<---------------------------------\\

                // ---. VERIFICA O SEGUNDO ARGUMENTO É UM TIPO
                if(!$this->existTable($table)){  // VERIFICAÇÃO DA EXISTÊNCIA DA TABELA
                    return 1146; // TABELA PARA EXECUÇÃO NÃO EXISTE
                }

                // PEGA O NOME DA TABELA
                /*
                    O CÓDIGO ABAIXO SELECIONA O NOME DA TABELA ONDE POASUI A CHAVE PRIMARIA.
                */
                $var= "SELECT column_name FROM information_schema.COLUMNS WHERE TABLE_SCHEMA ='".self::$BDBase."' AND TABLE_NAME ='$table' LIMIT 1";
                $var= mysqli_fetch_assoc ($this->Executar($var))['column_name'];
                // PEGA O NOME DA TABELA

                // FAZ A VALIDAÇÃO SE A VARIAVEL FOI SETADA
                if(!isset($id[$var])){
                    return 16; // ERRO VARIAVEL NÃO INFORMADA
                }

                $sql1= 'START TRANSACTION ;'; // SQL PARA EXECUTAR UMA TRANSAÇÃO
                //--> CRIA SQL PARA DELETAR A ROW
                $sql2= "DELETE FROM `".self::$BDBase."`.`".$table."` WHERE `".$var."`='".$id[$var]."';";


                // --------------------------> EXECUTA A AÇÃO DO CODIGO <------------------------------------------------\\
                if($this->Executar($sql1)!= false && $this->Executar($sql2) !=false){
                    $this->Executar('COMMIT;'); // TERMINA A EXECUÇÃO
                    //$this->Executar('ROLLBACK;');
                    return array('status'=>'sucess'); // RETORNA A CONFIGURAÇÃO
                }
                else{
                    $this->Executar('ROLLBACK;'); // DESFAZ A AÇÃO
                    return $this->ErrorID(); // RETORNA O ID DO ERRO
                }

                // --------------------------> EXECUTA A AÇÃO DO CODIGO <------------------------------------------------\\

            } // FUNÇÃO PARA DELETAR UMA LINHA DA ENTIDADE
            public function Read($table,$id){} // FUNÇÃO PARA LER UM ENTIDADE
            public function Count($table){} // FUNÇÃO PARA CONTAR O TOTAL DE ENTIDADES DE UMA TABELA
            public function IfExist($table,$key,$value){} // FUNÇÃO PARA VERIFICAR SE VALOR EXISTE

            // --------------------------------------> VEREFICA SE A TABELA EXISTE <--------------------------------\\
            /**
            * FUNÇÃO PARA CHEGAR SE UMA TABELA EXISTE OU NÃO RETORNA TRUE SE EXISTE E FALSE SE NÃO EXISTIR
            *
            *
            */
            public function existTable($table){
                if($this->Conectar()){
                    // CRIA SQL PARA EXECUÇÃO
                    $sql = "SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".self::$BDBase."' AND TABLE_NAME = '".$table."' LIMIT 1";
                    $resp = $this->Executar($sql);// EXECUTA A SQL ACIMA
                    // VALIDA AS REQUISIÇÕES MSQL
                    if($resp !=null){
                        // VEREFICANDO O NUMERO DE LINHAS
                        if(mysqli_num_rows($resp)>0){
                            // TABELA EXISTE
                            return true; // RETORNA TRUE TABELA EXISTE
                        }
                        else{
                            // TABELA NÃO EXI
                            return false; // RETORNA FALSE TABELA NÃO EXISTE
                        }
                    }
                    else{
                        // ERRO DE EXECUÇÃO SQL
                        return $this->Error(); // RETORNA O ERRO DO BANCO DE DADOS
                    }

                }
                else{
                    // ERRO DE CONEXÃO COM O BANCO
                    return $this->Error(); // RETORNA O ERRO DO BANCO DE DADOS
                }
            }
            // --------------------------------------> VEREFICA SE A TABELA EXISTE <--------------------------------\\

            // --------------------------------------> FUNÇÃO PARA VALIDAR VALORES NULOS <---------------------------\\
            //  **** FIX ME FUNÇÃO A SER IMPLEMENTADA
            private function checkNull($table,$data){
                if($this->Conectar()){ // TESTA A CONEXÃO COM O BANCO DE DADOS
                    // CRIA A SQL PARA EXECUÇÃO
                    $sql = $this->GenerateSQLInformation($table,array_keys($data),array("COLUMN_NAME","IS_NULLABLE"));
                    $resp = $this->Executar($sql); // EXECUTA A SQL

                    // VALIDA RESPOSTA RECEBIDA
                    $stop = false;
                    if($resp != NULL){
                        // LOOP VALIDAÇÃO DA RESPOSTA
                        while($row = mysqli_fetch_assoc($resp) && $stop == false){
                            if($row['IS_NULLABLE'] == "NO"){ // CHEGA SE AQUELA VARIÁVEL TEM CONDIÇÃO DE NÃO SER NULL
                                // FAZER CHECAGEM DO VALOR COM ARRAY
                                if($data['COLUMN_NAME']== "" || $data['COLUMN_NAME']== NULL ){
                                    $stop = true; // PARADA DO LOOP SOLICITADO
                                    echo "Variavel " . $data['COLUMN_NAME']. " não pode ser NULA<br>";
                                    return false;
                                } // VEREFICAÇÃO SE VALOR ESTA NULO
                            } // VAREFICAÇÃO SE NA LINHA CONTÉM MENÇÃO DO NOT NULL
                        } // WHILE LOOP DE TODS AS LINHAS
                    } // VALIDAÇÃO RESPOSTA DO BANCO


                }
                else{
                    // ERRO DE CONEXÃO
                }// ERRO DE CONEXÃO

            }
            // --------------------------------------> FUNÇÃO PARA VALIDAR VALORES NULOS <---------------------------\\


            // -----------------------------------------> FUNÇÃO PARA CRIAR CÓDIGO SQL <----------------------------------------------\\
            private function CreateSQL($table,$array){
                $keys= array_keys($array);  // PEGA AS KEYS
                $sql ="INSERT INTO ". $table . "(". implode(",", $keys) .") values ('" . implode("','", $array) . "');"; //CRIA A STRING SQL
                return $sql; // RETORNA A STRING
            }

            private function UpdateSQL($table,$array){
                $keys= array_keys($array); //PEGA AS KEYS
                $sql= "UPDATE ".$table." set "; // INICIA A FORMATAÇÃO DO UPDATE
                $sql.= $keys[1]. " = '" . $array[$keys[1]]. "'";  // PEGA A PRIMEIRA KEY PARA CORRIGIR CASO SÓ TENHA UM VALOR NO ARRAY
                for($i=2;$i< sizeof($array);$i++){
                    $sql.= ",".$keys[$i] ." = " . "'" . $array[$keys[$i]] . "'"; // PREENCHE CO OS VALORES RESTATNES

                }
                $sql .= " WHERE ". $keys[0] . " = " .$array[$keys[0]] .";" ; // CLAUSURA WHERE PARA ALTERAR SÓ PRIMEIRA KEY
                return $sql; //RETORNA SQL
            }
            // -----------------------------------------> FUNÇÃO PARA CRIAR CÓDIGO SQL <----------------------------------------------\\

            // ------------------------------> PEGANDO AS KEYS DAS INFORMAÇÕES <-------------------------------------\\
            /**
            * ESSA FUNÇÃO TEM POR OBJETIVO PEGAR TODOS OS INDICES DE INFORMAÇÕES QUE PODEMOS ACESSAR DE CADA VARIÁVEL
            * ELE PERMITE QUE POSSAMOS BUSCAR COM ISSO AS INFORMÇÕES QUE PODEMOS ACESSAR DE CADA VARIÁVEL
            * É NECESSÁRIO PASSAR O NOME DA TABELA DO BANCO DE DADOS E SERA RETORNADO AS INFORMAÇÕES QUE PODEMOS RECEBER
            * O RETORNO SERÁ UM ARRAY NUMERICO CONTENDO TODAS AS KEYS DE ACESSO
            */
            public function GetInformationKeys($table){
                $keys =false; // VARIAVEL DE ERRO
                if($this->Conectar()){ // TESTA CONEXÃO COM BANCO DE DADOS
                    // -> CRIA SQL PARA EXECUÇÃO
                    $sql = "SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".self::$BDBase."' AND TABLE_NAME = '".$table."' LIMIT 1";
                    $resp = $this->Executar($sql); // ARMAZENA A RESPOSTA DA EXECUÇÃO
                    if($resp != false){ // VALIDA A RESPOSTA DOS DADOS
                        $keys = array_keys(mysqli_fetch_assoc($resp)); // RESPOSTA EM KEYS PARA RETORNAR
                    }
                }
                return $keys; // RETORNA VARIAVEL KEYS
            }
            // ------------------------------> PEGANDO AS KEYS DAS INFORMAÇÕES <-------------------------------------\\

            // ------------------------------> PEGANDO AS KEYS DAS INFORMAÇÕES <-------------------------------------\\
            /**
            * ESSA FUNÇÃO TEM POR OBJETIVO RETORNAR TODAS AS VARIÁVEIS QUE TEMOS EM UMA TABELA
            * A FUNÇÃO É UM RETORNO SIMPLES CONTENDO UM ARRAY NUMERICO CONTENTO TODAS AS VARIAVEIS
            * EXISTENTES NA TABELA
            */
            public function GetKeys($table){
                $keys =array(); // VARIAVEL DE ERRO
                $cont=0;
                if($this->Conectar()){ // TESTA CONEXÃO COM BANCO DE DADOS
                    // -> CRIA SQL PARA EXECUÇÃO
                    //$sql= $this->GenerateSQLInformation($table,null,array('COLUMN_NAME'));
                    $sql = "SELECT * FROM " . $table . " LIMIT 1";
                    $resp = $this->Executar($sql); // ARMAZENA A RESPOSTA DA EXECUÇÃO
                    if($resp != false){ // VALIDA A RESPOSTA DOS DADOS
                        $keys = array_keys(mysqli_fetch_assoc($resp));
                        /*while ($row = mysqli_fetch_array($resp)) {
                            $keys[$cont]= $row['COLUMN_NAME'];
                            $cont++;
                        }*/
                    }
                }
                return $keys; // RETORNA VARIAVEL KEYS
            }
            // ------------------------------> PEGANDO AS KEYS DAS INFORMAÇÕES <-------------------------------------\\

            // ------------------------------> PEGANDO INFORMAÇÕES DA TABELA <----------------------------------------\\
            /**
            *
            *
            *
            *
            */
            public function GetElements($table){
                $numeargs = func_num_args(); // PEGANDO O NUMERO DE ARGUMENTOS
                $rules = array(); // ARRAY DE REGRAS
                $count_rules=0; // CONTADOR DE REGRAS
                $vars= array(); // ARRAY DE VARIÁVEIS
                $count_vars=0; // CONTADOR DE VARIÁVEIS

                if($numeargs >1){ //VERIFICANDO SE HÁ MAIS DO QUE 1 ARGUMENTO
                    $args= func_get_args(); // PEGANDOS TODOS OS ARGUMENTOS
                    $cont = 1; // INICIANDO CONTADOR CONSIDERANDO QUE O PRIMEIRO É A TABELA A SER USADA

                    while($cont < $numeargs){ // VEREFICA SE FORAM PASSADOS MAIS DE 1 ARGUMENTO
                        if(is_array($args[$cont])){ // VEREFICA SE O PRIMEIRO ARGUMETNO DE TRATA DE ARRAY
                            foreach ($args[$cont] as $key => $value) { // PARA CADA POSIÇÃO DO ARRAY
                                $text = $value; // PEGA O VALOR EM QUESTÃO
                                if(strpos($text,"=")===false && strpos($text,">")===false && strpos($text,"<")===false && strpos($text,"LIKE")===false){ // VEREFICA SE O VALOR CORRESPONDE A UMA REGRA
                                    $vars[$count_vars]= $text; // ADICIONA VARIAVEL AO ARRAY DE VARIAVEL
                                    $count_vars++; // INCREMENTA O CONTADOR DE VARIAVEIS
                                }
                                else{
                                    $rules[$count_rules]= $text; // ADICIONA A REGRA AO ARRAY DE REGRAS
                                    $count_rules++; // INCREMENTA O CONTADOR DE REGRAS
                                }
                            }
                        }
                        else{
                            $text = $args[$cont]; // RECEBE O VALOR EM QUESTÃO
                            if(strpos($text,"=")===false && strpos($text,">")===false && strpos($text,"<")===false && strpos($text,"LIKE")===false){ // VEREFICA SE O VALOR CORRESPONDE A UMA REGRA
                                $vars[$count_vars]= $text; // ADICIONA VARIAVEL AO ARRAY DE VARIAVEL
                                $count_vars++; // INCREMENTA O CONTADOR DE VARIAVEIS
                            }
                            else{
                                $rules[$count_rules]= $text; // ADICIONA A REGRA AO ARRAY DE REGRAS
                                $count_rules++; // INCREMENTA O CONTADOR DE REGRAS
                            }
                        }
                        $cont++;
                    }//-> VEREFICA SE FORAM PASSADOS MAIS DE 1 ARGUMENTO

                }
                // -> CRIAÇÃO DO SQL PARA EXECUÇÃO
                $sql = "SELECT "; // INDICAÇÃO DO SQL
                if($vars != null && sizeof($vars >0)){ // VEREFICA SE VARIÁVEIS FORAM SELECIONADOS
                    $sql .= implode(',', $vars) ." "; // ADICIONA AS VARIAVEIS PARA PESQUISA
                }
                else{
                    $sql .= " * "; // SELECIONA TODAS AS VARIAVEIS
                }
                $sql .= "FROM " .$table ." "; // INIDICA A TABELA QUE SE DESEJA PESQUISAR
                if($rules != null && sizeof($rules)>0){
                    $sql .= " WHERE "; // ADICIONA A CLAUSULA WHERE
                    $sql .= implode(' AND ', $rules) ." "; // ADICIONA AS REGRAS
                }
                // -> CRIAÇÃO DO SQL PARA EXECUÇÃO
                //echo $sql ."<br>";

                //-- >PREPARA PARA EXECUTAÇÃO NO MODO CHARSET UTF8
                $charset = "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8';";
                $this->Executar($charset); // SETA O FORMATO CHARSET
                echo $sql;
                $resp =$this->Executar($sql); // EXECUTA O SQL CRIADO
                $return = array();  // CRIA ARRAY PARA RETORNO DOS DADOS

                if($resp != false){ // VEREFICA SE NÃO HOUVE ERROS NA EXECUÇÃO
                    $numrows = mysqli_num_rows($resp); // CONTA O NUMERO DE COLUNAS
                    if($numrows == 1){ // SE FOR APENAS 1 SIMPLIFICA A RESPOSTA
                        $return= mysqli_fetch_assoc($resp); // ADICIONANDO APENAS O ARRAY PARA RESPOSTA
                    }
                    else{
                        $cont =0; // CONTADOR PARA MARCAR O ARRAY DUPLO
                        while($row = mysqli_fetch_assoc($resp)){ // ENQUANTO TIVER LINHAS
                            $return[$cont]= $row; // ADICIONA A LINHA PARA O ARRAY DUBPLO
                            $cont++; // INCREMENTA O CONTADOR
                        }
                    }
                    return $return; // RETORNAR O ARRAY CRIADO

                }
                else{
                    return false; // ERRO AO EXECUTAR SQL RETORNO FALSO
                }
            }


            // ------------------------------> PEGANDO INFORMAÇÕES DA TABELA <----------------------------------------\\

            /**
            * ESSA FUNÇÃO RETORNA AS INFORMAÇÕES DE CADA VARIAVEL EXISTENTE EM UMA TABELA
            * @Param NOME DA TABELA QUE SE DESEJA INFORAMAÇÕES FORMATO STRING, VARIAVEIS
            * QUE SE DESJA INFORAMÇÕES ARRAY DO TIPO NUMÉRICO, E INFORMAÇÕES QUE SE DESEJA RECEBER
            * DAS VARIAVEIS, ARRAY EM FORMATO NUMERICO.
            *
            * @Return SERA UM ARRAY DE ARRAYS ONDE CADA VARIAVEL PASSADA SERA ARMAZENADA EM UMA POSIÇÃO
            * E CORRESPONDE A ELA IRÁ CONTER UM ARRAY QUE TERÃO AS INFORMAÇÕES ASSOCIADAS A ELA.
            */

            // ------------------------------> PEGANDO INFORMAÇÕES DA TABELA <---------------------------\\
            public function GetInformation($table,$vars=null,$information=null){
                $sql = (string)$this->GenerateSQLInformation($table,$vars,$information); // GERA O SQL PARA EXECUÇÃO
                $resp = $this->Executar($sql); // EXECUTA E ARMAZENA A EXECUÇÃO
                $return = array(); // CRIA UMA ARRAY PARA RETORNO DAS INFORMAÇÕES
                $cont =0; // CONTADOR PARA MARCAÇÃO

                if($vars !=null){
                     $keys= array_keys($vars);// PEGA AS CHAVES PARA MANIPULAÇÃO
                }

                if($resp != false){ // VEREFICA SE NÃO HOUVE ERROS NA EXECUÇÃO
                    while($row = mysqli_fetch_assoc($resp)){ // PEGA LINHA POR LINHA DA RESPOSTA
                        if($vars != null){
                            $return[$vars[$keys[$cont]]] = $row;
                        }
                        else{
                            $return[$cont] = $row;
                        }
                        //$return[$cont]= $row;
                        $cont++;
                    }
                }
                else{
                    echo "Erro: " .$this->error(); // IMPRIME SE HOUVE ERRO NA EXECUÇÃO **FIXME
                }
                return $return; // RETORNA A VARIAVEL RETURN
            }
            //--> FUNÇÃO PARA GERAR SQL
            /**
            * FUNÇÃO CRIADA PARA GERAR O SQLS PARA PESQUISAR AS INFORMAÇÕES
            * @Param TABELA EM QUE SE DESAJA PESQUISA, VARIÁVEL TIPO STRING , ARRAY
            * NUMÉRICO DE VARIÁVEIS QUE SE DESEJA PESQUISAR, SE NENHUM INFORMADO SERÃO
            * SELECIONADOS TODO, ARRAY NUMÉRICO DE INFORAMÇÕES QUE SE DESJA SE NENHUMA INFORMADO
            * SERÃO SELECIONADOS TODOS
            * @Return String SCRIPT SQL PARA EXECUÇÃO.
            */
            private function GenerateSQLInformation($table,$vars,$information){
                $sql = "SELECT ";  // INICIANDO A CRIAÇÃO DA SQL PARA PESQUISA
                if($information != null){ // VEREFICA SE FORAM SELECIONADOS VARIÁVES
                    $sql .= implode(',', $information) ;  // ADICIONA AS COLUNAS PARA A PESQUISA
                }
                else{  // SE NÃO FOR ESCOLHIDA NENHUMA VARIÁVEL
                    $sql .= " * "; // ADICIONA TODAS VARIAVEIS PARA PESQUISA
                }
                // COMPLEMENTA O RESTANTE DA PESQUISA
                $sql.= " FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".self::$BDBase."' AND TABLE_NAME = '".$table."'";

                if($vars!= null){  //
                    $keys = array_keys($vars);
                    $sql .= " AND COLUMN_NAME IN ( ";
                    $sql .= "'". $vars[$keys[0]]."'"; // ADICIONANDO A PRIMEIRA KEY CASO EXISTEM APENAS 1 NO ARRAY
                    for($i=1;$i< sizeof($vars);$i++){ // ADICIONANDO OS RESTANTES CASO O ARRAY SEJA MAIOR QUE UM
                        $sql .= ",'". $vars[$keys[$i]]."'"; // ADICIONANDO O VALOR CORRESPONDENTE
                    }
                    $sql.= ")"; // FINALIZANDO A LISTA DE FILTROS
                }
                $sql .=";";
                //echo $sql ."<br>";
                return $sql;
            }
            // ------------------------------> PEGANDO INFORMAÇÕES DA TABELA <---------------------------\\

            /**
            * FUNÇÃO PARA OBTER OS COMENTÁRIOS DA TABELA
            *
            *
            *
            *
            */
            // ------------------------------> PEGANDO COMENTÁRIOS DA TABELA <---------------------------\\
            public function GetComments($table){
                $comments = array(); // CRIA UM ARRAY
                if($this->Conectar()){ // CONECTANDO AO BANCO
                    // -> CRIA SQL PARA EXECUÇÃO
                    $sql = "SELECT COLUMN_NAME,COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".self::$BDBase."' AND TABLE_NAME = '".$table."'";
                    // --> TRATANDO FILTROS CASO SEJA INFORMADO APENAS ALGUMAS VARIÁVEIS
                    $numargs = func_num_args(); // PEGA O NUMERO DE ARGUMENTOS PASSADOS
                    if($numargs>1){ // VEREFICA SE OUVE ALGUMA ARGUMENTO MAIOR DO QUE 1 ,CONSIDERANDO QUE O PRIMEIRO É A TABELA
                        $sql .= "AND COLUMN_NAME IN ("; // ADICIONA O FILTRO DE VARIÁVEIS
                        if(is_array(func_get_arg (1))){ // VEREFICA SE O SEGUNDO ARGUMENTO SE TRATA DE UM ARRAY
                            $array = func_get_arg (1); // ARMAZENA O ARRAY
                            $keys = array_keys($array); // PEGA AS CHAVES DO ARRAY
                            $sql .= "'" . $array[$keys[0]] . "'"; // ADICIONA A PRIMEIRA POSIÇÃO DO ARRAY
                            for($i=0; $i < sizeof($keys);$i++){ // ADICIONA OS ELEMENTOS RESTANTES DO ARRAY CORRIGINDO O PROBLEMA DA VIRGULA
                                $sql .= ",'" . $array[$keys[$i]] . "'"; // ADICIONA OS ELEMENTOS RESTANTES
                            }
                        }
                        else{
                            $sql .= "'" . func_get_arg (1) . "'";   // ADICIONA A PRIMEIRA VARIAVEL PARA CORRIGIR O PROBLEMA DA VIRGULA
                            $cont = 2; // INICIA O CONTADOR A PARTIR DA TERCEIRA POSIÇÃO
                            while ($cont < $numargs){
                                $sql .= ",'" . func_get_arg ($cont) . "'"; // ADICIONA AS VARIÁVEIS RESTANTES
                                $cont++; // INCREMENTA O CONTADOR
                            }
                        }
                        $sql .= ");";   // FINALIZA O INCRIMENTO DE FILTRO DO SQL
                    }

                    $result = $this->Executar($sql); // EXECUTA O COMANDO SQL
                    if($result != false){ // VEREFICA SE NÃO HOUVE ERROS AO EXECUTAR O SQL
                        while($row = mysqli_fetch_assoc($result)){ //INICIA CRIAÇÃO DO ARRAY ASSOCIATIVO
                            $comments[$row['COLUMN_NAME']] = $row['COLUMN_COMMENT']; // SETA OS VALORES NO ARRAY
                        }
                    }
                    return $comments;// RETORNA O ARRAY
                }
            }
            // ------------------------------> PEGANDO COMENTÁRIOS DA TABELA <---------------------------\\

            // ------------------------------> SETANDO OS COMENTARIOS NA TABELA <---------------------------\\
            /**
            * FUNÇÃO PARA SETAR OS COMENTÁRIOS DA TABELA
            * RECEBE COMO PARÂMETRO A TABELA TIPO STRING NA QUAL ALTERAÇÕES SERÃO EXECUTADAS
            * RECEBE UM ARRAY ASSOCIATIVO ONDE A VARIÁVEL IRÁ CONTER OS COMENTÁRIOS QUE SERÃO SUBSTITUIDOS
            * ** FIXME TRATAR O RETORNO
            */
            public function SetComments($table,$data){
                $change=array();
                $keys = array_keys($data);
                if($this->Conectar()){ // CONECTANDO AO BANCO
                    // -> CRIAN SQL PARA EXECUÇÃO
                    $sql = "SELECT COLUMN_NAME,COLUMN_TYPE,IS_NULLABLE,COLUMN_DEFAULT,EXTRA,COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".self::$BDBase."' AND TABLE_NAME = '".$table."' AND COLUMN_NAME IN ( ";
                    // ADICIONANDO FILTROS PARA BUSCA DOS DADOS DA COLUNA
                    $sql .= "'". $keys[0]."'"; // ADICIONANDO A PRIMEIRA KEY CASO EXISTEM APENAS 1 NO ARRAY
                    for($i=1;$i< sizeof($keys);$i++){ // ADICIONANDO OS RESTANTES CASO O ARRAY SEJA MAIOR QUE UM
                        $sql .= ",'". $keys[$i]."'"; // ADICIONANDO O VALOR CORRESPONDENTE
                    }
                    $sql.= ");"; // FINALIZANDO A LISTA DE FILTROS

                    //echo $sql ."<br>";
                    $result = $this->Executar($sql); // EXECUTA O COMANDO SQL
                    if($result != false){ // VEREFICA SE NÃO HOUVE ERROS AO EXECUTAR O SQL
                        while($row = mysqli_fetch_assoc($result)){ //INICIA CRIAÇÃO DO ARRAY ASSOCIATIVO
                            $sql ="ALTER TABLE ".$table." CHANGE COLUMN ".$row['COLUMN_NAME']." ".$row['COLUMN_NAME']." ".$row['COLUMN_TYPE']." ";
                            if($row['IS_NULLABLE'] =="NO"){ $sql.="NOT NULL ";} else{$sql.="NULL ";}
                            //if($row['EXTRA'] ==""){ if($row['COLUMN_DEFAULT'] == NULL){ $sql.= "DEFAULT NULL"; }else{ $sql.= "DEFAULT " . $row['COLUMN_DEFAULT']." ";}}
                            $sql .= $row['EXTRA'] . " ";
                            $sql .= "COMMENT '" . $data[$row['COLUMN_NAME']] ."';";
                            $change[$row['COLUMN_NAME']] = $sql;
                            //echo $row['COLUMN_NAME'] ." ". $row['COLUMN_TYPE']." ". $row['IS_NULLABLE'] ." " . $row['COLUMN_DEFAULT'] . " " . $row['EXTRA'];
                            //echo $sql. "<br>";
                        }
                    }
                    if(sizeof($change)>0){ // INICIA A ALTERAÇÕES DE DADOS
                        $erro = false; // VARIAVEL PARA GUARDAR SE HOUVE ALGUM ERRO
                        $this->Executar("START TRANSACTION;"); //INICIA A TRANSAÇÃO PARA ALTERAÇÕES
                        foreach ($change as $key =>$value) {  // PARA CADA ALTERAÇÃO EXECUTA AS ALTERAÇÕES POSSÍVEIS
                                $resp = $this->Executar($value); // EXECUTA ALTERAÇÃO INDIVIDUAL
                                //echo $value ."<br>";

                                if($resp ==false){ // VERFICAS SE HOUVE ERRO
                                    $erro = true; // SETA ERRO PARA TRUE
                                    $this->Executar("ROLLBACK ;"); // VOLTA ALTERAÇÕES ANTERIORES
                                    break; // PARA O FOREACH POIS NÃO É NECESSÁRIO CONTINUAR
                                }
                        }
                        if($erro ==false){ // VEREFICA VARIÁVEL DE ERROS
                            $this->Executar("COMMIT;"); // SE NÃO HOUVER ERROS FINALIZA ALTERAÇÕES
                        }
                    }

                }


            }
            // ------------------------------> SETANDO OS COMENTARIOS NA TABELA <---------------------------\\


        } // FIM DA CLASSE MYSQL
    ?>
