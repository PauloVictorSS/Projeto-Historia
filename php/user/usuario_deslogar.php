<?php

/*
	Desloga o usuário e destrói as sessões
	com o login e a senha do usuário que
	estava legado
*/

	include_once("../../config.php");
	include_once("../../include/conexao_session.php");

	$_SESSION['status_login'] = 0;

	unset(
		$_SESSION['usuario'],
		$_SESSION['senha'],
		$_SESSION['status_login']
	);

	$url = INCLUDE_PATH.'login';

	header("location: $url");	

?>