<?php

/*
	Desloga o usuário e destrói as sessões
	com o login e a senha do usuário que
	estava legado
*/

	include_once("../../config.php");
	include_once("../../include/conexao_session.php");

	unset(
		$_SESSION['usuario'],
		$_SESSION['senha'],
		$_SESSION['status_login'],
		$_SESSION['login']
	);

	$url = INCLUDE_PATH.'pages/login.php';

	header("location: $url");	

?>