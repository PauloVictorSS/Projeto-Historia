<?php

/*
	Desloga o usuário e destrói as sessões
	com o login e a senha do usuário que
	estava legado
*/
	
	include "conexao_session.php";

	$_SESSION['status_login'] = 0;

	session_destroy();

	unset(
		$_SESSION['usuario'],
		$_SESSION['senha']
	);

	header ("location: ../index.php");	

?>