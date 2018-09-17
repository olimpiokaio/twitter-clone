<?php

	require_once('db.class.php');

	$nome = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;

	//verificar se o usuário já existe
	$sql = " select * from usuarios where usuario = '$nome' ";

	if( $resulatado_id = mysqli_query($link, $sql) ){

		$dados_usuario = mysqli_fetch_array($resulatado_id);

		if( isset($dados_usuario['usuario']) ){
			$usuario_existe = true;
		}

	} else {

		echo 'Erro ao tentear localizar o registro do usuário';
	}

	//verificar se o email já existe
	$sql = " select * from usuarios where email = '$email' ";

	if( $resulatado_id = mysqli_query($link, $sql) ){

		$dados_usuario = mysqli_fetch_array($resulatado_id);

		if( isset($dados_usuario['email']) ){
			$email_existe = true;
		}

	} else {

		echo 'Erro ao tentear localizar o registro do usuário';
	}


	if( $usuario_existe || $email_existe ){

		$retorno_get = '';

		if( $usuario_existe ){

			$retorno_get .= 'erro_usuario=1&';

			header('location: inscrevase.php?');
		}

		if( $email_existe ){

			$retorno_get .= 'erro_email=1&';
		}

		header('location: inscrevase.php?'.$retorno_get);
		die();
	}

	$sql = " insert into usuarios (usuario, email, senha) values ('$nome', '$email', '$senha') ";

	//execultar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuario registrado com sucesso!';
	} else {
		echo 'Erro ao registra usuario!';
	}
?>