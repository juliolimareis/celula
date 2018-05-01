<?php
	require_once "actions.php"; //local onde se encontra as funções de ativação, com cadastro
	require_once "../security.php";
	switch ($_POST['function']) {
		case 'register_user':
			//var_dump($_POST);
			register_user($_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['email']);
			break;
		case 'set_element':
			set_element($_POST['element']);
			break;
		case 'get_element':
			echo get_element();
			break;
		case 'set_annotation':
			//echo $_POST['annotation'];
			set_annotation($_SESSION['usuarioID'],$_POST['ant'],$_POST['annotation']);
			break;
		case 'get_annotation':
			get_annotation($_SESSION['usuarioID'],$_POST['ant']);
			break;
		default:
			# code...
			break;
	}




	//$vet=array_keys($_GET);//
	//set_element("vacu");
	/*
	if (function_exists($vet[0])) {
		if($_POST['function']=="register_user"){
			register_user($_POST['nome'],$_POST['usuario'],$_POST['senha']);
		}else{
			$vet[0]($_POST['element']);
		//teste("element");
		//echo "IMAP functions are available.<br />\n";
		}
	}*/

?>
