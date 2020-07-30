<?php

/*
	Reseta todos os filtro aplicados
	na Área de Questões
*/

	include_once("conexao_session.php");

	$_SESSION['partenome'] = '';
	$_SESSION['vestibular'] = '';
	$_SESSION['ano'] = '';
	$_SESSION['tema'] = '';

	if(!empty($_POST["btn-reset-filtro"]))
		if($_POST["btn-reset-filtro"] = 1)
			header("location: ../paginas/areadequestoes.php");		
	

?>