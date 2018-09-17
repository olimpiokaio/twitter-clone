<?php

class db {

	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $database = 'twitter_clone';

	public function conecta_mysql(){

		//criar conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		mysqli_set_charset($con, 'utf8');

		//verifica erro de comunicação
		if(mysqli_connect_errno()){
			
			echo 'Erro ao tentar se conectar com o DB MySQL: '.msqli_connect_error();
		} else {

			return $con;
		}
	}

}
?>