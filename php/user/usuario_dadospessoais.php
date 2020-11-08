<?php

/*
	Busca no banco de dados e os mostra 
	na área do usuário
*/

	$login = $_SESSION['login'];

	$consulta = "select  usuarios.nome, usuarios.email, usuarios.aniversario, rede.descricao, escolaridade.descricao from usuarios, rede, escolaridade where usuarios.id_rede = rede.id and usuarios.id_escolaridade = escolaridade.id and login = '$login'";

	$result = mysqli_query($conexao, $consulta);

	while ($n = mysqli_fetch_array($result)){	
		$nome = $n[0]; 
		$email = $n[1];
		$aniversario = $n[2];
		$rede = $n[3]; 
		$escolaridade = $n[4];
	}

	echo "<p><b>Nome:</b><br>$nome</p><br>";
	echo "<p><b>E-mail:</b><br>$email</p><br>";
	echo "<p><b>Data de Nascimento:</b><br>$aniversario</p><br>";
	echo "<p><b>Rede:</b><br>$rede</p><br>";
	echo "<p><b>Escolariedade:</b><br>$escolaridade</p>";

?>