<?php

/*
	Busca no banco de dados e os mostra 
	na área do usuário
*/

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

	echo "<p><b>Nome:</b> $nome</p>";
	echo "<p><b>E-mail:</b> $email</p>";
	echo "<p><b>Aniversário:</b> $aniversario</p>";
	echo "<p><b>Rede:</b> $rede</p>";
	echo "<p><b>Escolariedade:</b> $escolaridade</p>";

?>