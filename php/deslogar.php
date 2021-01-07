<?php

/*
	Desloga o usuário e destrói as sessões
	com o login e a senha do usuário que
	estava legado
*/

	include_once("../config.php");

	unset(
		$_SESSION['senha'],
		$_SESSION['status_login'],
		$_SESSION['id_usuario']
	);

	header("location: ".INCLUDE_PATH."pages/login.php");	

?>