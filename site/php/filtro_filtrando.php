<?php

/*
	Passa os valores dos POSTs do formulário 
	de filtro para as SESSIONs
*/

	include "conexao_session.php";

	if(!empty($_POST['tema']))
		$_SESSION['tema'] = mysqli_escape_string($conexao, $_POST['tema']);

	if(!empty($_POST['ano']))
		$_SESSION['ano'] = mysqli_escape_string($conexao, $_POST['ano']);

	if(!empty($_POST['partenome']))
		$_SESSION['partenome'] = mysqli_escape_string($conexao, $_POST['partenome']);

	if(!empty($_POST['vestibular']))
		$_SESSION['vestibular'] = mysqli_escape_string($conexao, $_POST['vestibular']);

	if(!empty($_POST['qtd_quest']))
		$_SESSION['qtd_quest'] = mysqli_escape_string($conexao, $_POST['qtd_quest']);
		
?>