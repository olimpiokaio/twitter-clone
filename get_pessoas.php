<?php

	session_start();

	if( !isset($_SESSION['usuario']) ){
		header('location: index.php?erro=1');		
	}

	require_once('db.class.php');

	$nome_pessoa = $_POST['nome_pessoa'];
	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = " SELECT * FROM usuarios WHERE usuario LIKE '%$nome_pessoa%' AND id <> '$id_usuario'  ";

	$resultado_id = mysqli_query($link, $sql);

	if( $resultado_id ){

		while( $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC) ){
			echo '<a href="#" class="list-group-item">';
				echo "<strong>{$registro['usuario']}</strong><small> - {$registro['email']} </small>";
				echo '<p class="list-group-item-text pull-right">';
					/*
					o atributo data-id_usuario (para criar usa-se 'data-' depois um apelido no caso 'id_usuario'), é um atributo criado pelo programador, funcionalidade nativa do HTML5,
					o objetivo dessa teg é guardar 0 valor do id_usuario para fazer um tratativa pelo JQuery.
					*/
					echo '<button type="button" class="btn btn-default btn-seguir" data-id_usuario="'.$registro['id'].'">Seguir</button>';
					echo '<button type="button" class="btn btn-primary btn-deixar-seguir" data-id_usuario="'.$registro['id'].'">Deixar de Seguir</button>';
				echo '</p>';
				echo '<div class="clearfix"></div>';//Para corrigir a referencia do botão para com a div, que é perdida quando ele flutua para a direita.
			echo '</a>';
		}

	} else {
		echo 'Erro na consulta por usuarios no banco de dados!';
	}

?>