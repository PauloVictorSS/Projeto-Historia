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


?>