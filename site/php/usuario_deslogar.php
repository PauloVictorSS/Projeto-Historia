<?php

/*
	Desloga o usuário e destrói as sessões
	com o login e a senha do usuário que
	estava legado
*/
	
	include_once("conexao_session.php");

	$_SESSION['status_login'] = 0;

	unset(
		$_SESSION['usuario'],
		$_SESSION['senha']
	);

	session_destroy();

	header ("location: ../index.php");	

?>