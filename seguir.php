<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}	

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];//valor da super global session;
	$seguir_id_usuario = $_POST['seguir_id_usuario'];

	if($id_usuario == '' && $seguir_id_usuario == ''){
		die();

	} else {
		$objDb = new db();
		$link = $objDb->conecta_mysql();

		$sql = " INSERT INTO usuario_seguidores (id_usuario, seguindo_id_usuario) VALUES ($id_usuario, $seguir_id_usuario) ";

		mysqli_query($link, $sql);
	}


?>