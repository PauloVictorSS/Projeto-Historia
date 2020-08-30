<?php

/*
	Mostra a resposta certa da questão
	feita. Quando é uma questão alternativa
*/

	echo "<hr>";

	if($gabarito == $resposta)
		echo "<p class='mensagem-green'>Parabéns! Você acertou!</p>";
	else
		echo "<p class='mensagem-red'>Infelizmente você errou, a alternativa correta era a letra <strong>$gabarito</strong></p>"; 

	if(isset($_SESSION['status_login'])){

		if($gabarito == $resposta)
			$acertou = 's';
		else
			$acertou = 'n';

		include_once("php/question_resolution/questao_gravaresultado.php");
		
	}
?>