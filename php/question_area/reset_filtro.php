<?php	

/*
	Reseta todos os filtro aplicados
	na Área de Questões
*/

	include_once("../../include/conexao_session.php"); 
	include_once("../../config.php");

	$_SESSION['partenome'] = '';
	$_SESSION['vestibular'] = '';
	$_SESSION['ano'] = '';
	$_SESSION['tema'] = '';
	$_SESSION['materia'] = '';

	$url = INCLUDE_PATH.'area_de_questoes';
	$url2 = INCLUDE_PATH_PAINEL.'Exibir-Questoes';
			
	if($_POST["btn-reset-filtro"] == 1)
		header("location: $url");
	else
		header("location: $url2");
?>