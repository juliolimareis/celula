<?php
  require_once 'php/database/dataAcess.php';

  //parametros, id_usuario, ant_elemento(a ser anotado),anotação
  //set_annotation(4,"ant_vacu","anotação vacuolo");
  //get_annotation(1,"ant_vacu");

  function get_annotation($id_user,$ant){
    $bd = new dataAcess();
    $r = $bd->Executar( //tentar pegar a annotação
      "SELECT $ant
       FROM annotation
       WHERE id_annotation = $id_user;"
     );
     if($r!=false){ //o banco foi acessado com sucesso!
       $r=mysqli_fetch_assoc($r); //faz o vetor associativo
       if(!empty($r)){
         echo $r[$ant];
       }
     }else{
       echo "BD error";
     }
  }

  function set_annotation($id_user,$ant,$annotation){
    $bd = new dataAcess();
    //recebe as variáveis do banco de dados
    $r = ($bd->Executar(
    	"SELECT id_annotation
       FROM annotation
       WHERE id_annotation=$id_user LIMIT 1;"));

    if($r!=false){ //o banco foi acessado com sucesso!
      $r=mysqli_fetch_assoc($r); //faz o vetor associativo

      var_dump($r);
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
      echo "erro no BD";
    }
  }
?>
