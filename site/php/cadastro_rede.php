<?php

/*
	Cria um SELECT com as redes disponíveis
	para o cadastro de um usuário
*/

	include "conexao_session.php";

	$rede = mysqli_query($conexao,"select * from rede");

	while($n = mysqli_fetch_array($rede)){

		$rede = $n[1];
		$numb2 = $n[0];
		echo "<option value='$numb2'>$rede</option>";
		
	}
	
?>