<?php

	//select false/resource

	require_once 'db.class.php';

	//codigo de consulta query
	$sql = " select * from usuarios ";

	//conexao com db
	$objDb = new db();
	$link = $objDb->conecta_mysql();

	//execulta query e retorna (false ou resource).
	$resulatado_id = mysqlI_query($link, $sql);

	if($resulatado_id){

		$dados_usuario = array();

		echo'<pre>';
		//MYSQLI_ASSOC = tras um array com associações por nome, MYSQLI_NUM tras um array com associações por numero.
		while( $linha = mysqli_fetch_array($resulatado_id, MYSQLI_ASSOC) ){
			$dados_usuario[] = $linha;
		}

		foreach($dados_usuario as $usuario){

			echo $usuario['usuario'];
			echo '<br/>';
		}

	} else {

		echo"Erro na execulção da consulta! favor entrar em contato com o admin do site";
	}
?>