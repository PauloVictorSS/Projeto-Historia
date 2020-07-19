<?php

/*
	Cria um SELECT com as escolaridades 
	disponíveis para o cadastro de um 
	usuário
*/

	include "conexao_session.php";

	$escolar = mysqli_query($conexao,"select * from escolaridade");

	while($m = mysqli_fetch_array($escolar)){

		$ensino = $m[1];
		$numb = $m[0];
		echo "<option value='$numb'>$ensino</option>";

	}

?>