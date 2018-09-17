<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}	

	require_once('db.class.php');

	$texto_tweet = $_POST['texto_tweet'];
	$id_usuario = $_SESSION['id_usuario'];//valor da super global session; 

	if($texto_tweet != '' && $id_usuario != ''){

		$objDb = new db();
		$link = $objDb->conecta_mysql();

		$sql = " insert into tweet (id_usuario, tweet) values ('$id_usuario', '$texto_tweet') ";

		mysqli_query($link, $sql);
	}


?>