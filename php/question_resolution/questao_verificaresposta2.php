<?php

/*
	Mostra as respostas esperadas da questão 
	resolvida. Quando são questões dissertativas.
*/

	echo "<hr>";
	echo "Respostas esperadas:";

	if(!empty($alternativa_D))
		echo"<strong>A)</strong> $alternativa_D";

	if(!empty($alternativa_E))
		echo"<strong>B)</strong> $alternativa_E";

	if(!empty($gabarito))
		echo"<strong>C)</strong> $gabarito";

	if(isset($_SESSION['status_login'])){
		$resposta = 1;
		$acertou = 's';

		include_once("php/question_resolution/questao_gravaresultado.php");
		
	}

?>