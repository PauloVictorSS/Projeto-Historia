<?php

/*
	Mostra a resposta certa da questão
	feita. Quando é uma questão alternativa
*/

	echo "<br><hr><br>";

	if($gabarito == $resposta)
		echo "<br><p id='mensagem_acerto'>Parabéns! Você acertou!</p>";
	else
		echo "<br><p id='mensagem_erro'>Infelizmente você errou, a alternativa correta era a letra <strong>$gabarito</strong></p>"; 


?>