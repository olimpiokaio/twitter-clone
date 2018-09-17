<?php
	session_start();

	//update true/false
	//insert true/false
	//select false/resource
	//delete true/false
	require_once 'db.class.php';

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	//codigo de consulta query
	$sql = " select id, usuario, email from usuarios where usuario = '$usuario' and senha = '$senha' ";

	//conexao com db
	$objDb = new db();
	$link = $objDb->conecta_mysql();

	//execulta query e retorna (false ou resource).
	$resulatado_id = mysqlI_query($link, $sql);

	if($resulatado_id){
		//armazena em uma variavel um array com o retorno da execulção da query.
		$dados_usuario = mysqli_fetch_array($resulatado_id);

		if(isset($dados_usuario['usuario'])){

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('location: home.php');
		}else{

			header('location: index.php?erro=1');
		}
	} else {
		echo'Erro na execulção da consulta! favor entrar em contato com o admin do site';
	}
?>