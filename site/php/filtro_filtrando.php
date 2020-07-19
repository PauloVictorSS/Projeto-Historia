<?php

/*
	Passa os valores dos POSTs do formulário 
	de filtro para as SESSIONs
*/

	include "conexao_session.php";

	if(!empty($_POST['tema']))
		$_SESSION['tema'] = $_POST['tema'];

	if(!empty($_POST['ano']))
		$_SESSION['ano'] = $_POST['ano'];

	if(!empty($_POST['partenome']))
		$_SESSION['partenome'] = $_POST['partenome'];

	if(!empty($_POST['vestibular']))
		$_SESSION['vestibular'] = $_POST['vestibular'];

	if(!empty($_POST['qtd_quest']))
		$_SESSION['qtd_quest'] = $_POST['qtd_quest'];
		
?>