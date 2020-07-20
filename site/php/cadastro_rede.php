<?php

/*
	Cria um SELECT com as redes disponíveis
	para o cadastro de um usuário
*/

	include "conexao_session.php";

	$rede = mysqli_query($conexao,"select * from rede");

	while($m = mysqli_fetch_array($rede)){

		$ensino = $m[1];
		$numb = $m[0];
		echo "<option value='$numb'>$ensino</option>";

	}
	
?>