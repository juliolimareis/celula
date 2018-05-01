<?php
	require_once "database/dataAcess.php";
	//register_user("nom","usuario","senha","email");
	//cadastra o usuaŕio no sistema
  function register_user($nome,$usuario,$senha,$email){
		$bd = new dataAcess();
		if($bd->Executar(
		"INSERT INTO user
			(name,user,email,password)
			VALUES
			('".$nome."','".$usuario."','".$email."','".$senha."');
			")!=false){
    	echo "1";
  	}
  	elseif($bd->ErrorID()=="Mysql: Coluna dupliada em banco de dados não permitido"){
    	echo "2";

  	}else{
    	echo "3";
  	}
		//$bd->Desconectar();
	}

	//soma a variavel do elemento no banco
	function set_element($element){
		$bd = new dataAcess();
		$bd->Executar(
		"update element set ".$element." = (".$element."+1)
		where id_element = 1");

		//$mysqli = new mysqli("localhost", "root", ".mgKlq3OKB", "celula");
		//$mysqli->query("update element set ".$_POST['element']." = (".$_POST['element']."+1) where id_element = 1");
	}


/*
	Guarda a anotação no banco de dados:
	id_user = id do usuário
	ant = nome do elemento
	$annotation = anotação a ser salva;
*/
	function set_annotation($id_user,$ant,$annotation){
    $bd = new dataAcess();
    //recebe as variáveis do banco de dados
    $r = ($bd->Executar(
    	"SELECT id_annotation
       FROM annotation
       WHERE id_annotation=$id_user LIMIT 1;"));

    if($r!=false){ //o banco foi acessado com sucesso!
      $r=mysqli_fetch_assoc($r); //faz o vetor associativo

      //var_dump($r);
      if(empty($r)){ // se resultado for null
        if($bd->Executar( //tentar fazer o insert, pois o usuário nunca anotou algo
        "INSERT INTO annotation
          (id_annotation,$ant)
         VALUES
          ($id_user,'$annotation');"
        )!=false){
          echo "Anotação salva com sucesso!";
        }else{
          echo "Não foi possivel savar";
        }
      }else{
        if($bd->Executar( //tentar fazer o update, pois o usuário já tem outras anotações
        "UPDATE annotation SET
          $ant = ('$annotation')
         WHERE
          id_annotation = $id_user;"
        )!=false){
          echo "dados atualizados com sucesso!";
        }else{
          echo "Não foi possivel atualizar";
        }
      }
    }else{
      echo "error";
    }
	}

	/*
	pega a anotação no banco de dados de acordo com o elemento
	id_user = id do usuárequire_once
	ant = elemento pelo qual pegara a anotação
	*/
	function get_annotation($id_user,$ant){
    $bd = new dataAcess();
    $r = $bd->Executar( //tentar pegar a annotação
      "SELECT $ant
       FROM annotation
       WHERE id_annotation = $id_user;"
     );
     if($r!=false){ //o banco foi acessado com sucesso!
       $r=mysqli_fetch_assoc($r); //faz o vetor associativo
       if(empty($r[$ant])){
         echo "empty";
       }else{
				 echo $r[$ant];
     	 }
		 }else{
       echo "error";
     }
	}

	function get_element(){
		$bd = new dataAcess();
		$r = mysqli_fetch_assoc($bd->Executar(
			"SELECT *
				FROM element
				WHERE id_element=1"));
			//retorna o resultado da histórico de accesso ao elementos
				return "<div class=\"close_relatorio\" onclick=\"close_relatorio()\">
								<center>Fechar</center>
								</div>
								<center class=\"div_relatorio\">
										<h3>Histórico de Acesso</h3>
										<h4>Quantidade de acesso por elemento: </h4>
										<br>
										<h4>Vacuolo teve ".$r['vacu']." Acesso</h4>
										<br>
										<h4>Cloroplasto teve ".$r['cloro']." Acesso</h4>
										<br>
										<h4>Mitocôndria teve ".$r['mito']." Acesso</h4>
										<br>
										<h4>Membrana Celular teve ".$r['memb_celu']." Acesso</h4>
										<br>
										<h4>Memebrana Nuclear teve ".$r['memb_nucl']." Acesso</h4>
										<br>
										<h4>Nucléolo teve ".$r['nucl']." Acesso</h4>
										<br>
										<h4>Retículo Endoplasmático teve ".$r['reti']." Acesso</h4>
										<br>
										<h4>Complexo de Golgi teve ".$r['comp']." Acesso</h4>
										<br>
										<h4>Citoplasma teve ".$r['cito']." Acesso</h4>
								</center>
						</div>
		";
}


		//var_dump($r);
		//$result = $mysqli->query("select * from element where id_element=1");
		/*
		echo "
				  <div class=\"close_relatorio\" onclick=\"close_relatorio()\">
				                <center>Fechar</center>
				            </div>

				            <center class=\"div_relatorio\">
				                <h3>Histórico de Acesso</h3>
				                <h4>O elemento mais estudado atualmente: </h4>
				                <br>
				                <h4>Vacuolo teve ".$r['vacu']." Acessos</h4>
				                <br>
				                <h4>Cloroplasto teve ".$r['cloro']." Acessos</h4>
				                <br>
				                <h4>Mitocôndria teve ".$r['mito']." Acessos</h4>
				                <br>
				                <h4>Membrana Celular teve ".$r['memb_celu']." Acessos</h4>
				                <br>
				                <h4>Memebrana Nuclear teve ".$r['memb_nucl']." Acessos</h4>
				                <br>
				                <h4>Nucléolo teve ".$r['nucl']." Acessos</h4>
				                <br>
				                <h4>Retículo Endoplasmático teve ".$r['reti']." Acessos</h4>
				                <br>
				                <h4>Complexo de Golgi teve ".$r['comp']." Acessos</h4>
				                <br>
				                <h4>Citoplasma teve ".$r['cito']." Acessos</h4>
				            </center>
				        </div>
				";
}*/
?>
