<?php


    include_once("conexao_session.php");

	$consulta1 = "select descricao from vestibular";

	$escolar = mysqli_query($conexao, $consulta1);

	while($m = mysqli_fetch_array($escolar)){

		$vestibular = $m[0];
		echo "<p class='vest_adicion'><i>$vestibular</i></p>";

	}

?>