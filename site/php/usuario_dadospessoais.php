<?php

/*
	Busca no banco de dados e os mostra 
	na área do usuário
*/

	include "conexao_session.php";

	$login = $_SESSION['login'];

	$consulta = "select usuarios.nome, usuarios.email, usuarios.aniversario, rede.descricao, escolaridade.descricao from usuarios, rede, escolaridade where usuarios.id_rede = rede.id and usuarios.id_escolaridade = escolaridade.id and login = '$login'";

	$result = mysqli_query($conexao, $consulta);

	while ($n = mysqli_fetch_array($result)){	
		$nome = $n[0]; 
		$email = $n[1];
		$aniversario = $n[2];
		$rede = $n[3]; 
		$escolaridade = $n[4];
	}

	echo "<div><p>";
	echo "<br><p><strong class='titulo-p'>Nome:</strong> $nome</p>";
	echo "<p><strong class='titulo-p'>E-mail:</strong> $email</p>";
	echo "<p><strong class='titulo-p'>Aniversário:</strong> $aniversario</p>";
	echo "<p><strong class='titulo-p'>Rede:</strong> $rede</p>";
	echo "<p><strong class='titulo-p'>Escolariedade:</strong> $escolaridade</p>";

?>