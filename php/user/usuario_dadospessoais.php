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

	echo "<tr><th>Nome</th><td>$nome</td></tr>";
	echo "<tr><th>E-mail</th><td>$email</td></tr>";
	echo "<tr><th>Aniversário</th><td>$aniversario</td></tr>";
	echo "<tr><th>Rede</th><td>$rede</td></tr>";
	echo "<tr><th>Escolariedade</th><td>$escolaridade</td></tr>";

?>