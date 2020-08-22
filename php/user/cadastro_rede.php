<?php

/*
	Cria um SELECT com as redes disponíveis
	para o cadastro
*/

	$consulta2 = "select * from rede";

	$rede = mysqli_query($conexao, $consulta2);

	while($a = mysqli_fetch_array($rede)){

		$nome = $a[1];
		$n = $a[0];
		echo "<option value='$n'>$nome</option>";

	}
	
?>