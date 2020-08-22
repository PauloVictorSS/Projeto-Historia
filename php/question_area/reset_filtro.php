<?php	

/*
	Reseta todos os filtro aplicados
	na Área de Questões
*/

	include_once("../../conexoes/conexao_session.php"); 
	include_once("../../config.php");

	$_SESSION['partenome'] = '';
	$_SESSION['vestibular'] = '';
	$_SESSION['ano'] = '';
	$_SESSION['tema'] = '';

	$url = INCLUDE_PATH.'area-de-questoes';
			
	header("location: $url");

?>