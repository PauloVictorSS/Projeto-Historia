<?php

/*
	Mostra as respostas esperadas da questão 
	resolvida. Quando são questões dissertativas.
*/

	echo "<br><hr><br>";
	echo "Respostas esperadas:<br>";

	if(!empty($alternativa_D))
		echo"<br><strong>A)</strong> $alternativa_D";

	if(!empty($alternativa_E))
		echo"<br><br><strong>B)</strong> $alternativa_E";

	if(!empty($gabarito))
		echo"<br><br><strong>C)</strong> $gabarito";

	echo "<br>";

?>