<?php

/*
	Cria um SELECT com as redes disponíveis
	para o cadastro de um usuário
*/

	include_once("conexao_session.php");

	$consulta1 = "select * from rede";

	$rede = mysqli_query($conexao, $consulta1);

	while($m = mysqli_fetch_array($rede)){

		$ensino = $m[1];
		$numb = $m[0];
		echo "<option value='$numb'>$ensino</option>";

	}
	
?>