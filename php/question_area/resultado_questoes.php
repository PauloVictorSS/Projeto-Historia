<?php	

/*
	Mostra todas as questões com o filtro
	e a paginação aplicada
*/
	
	if (!empty($_SESSION['qtd_quest'])) 
		$total_reg = $_SESSION['qtd_quest'];
	else
		$total_reg = 4;

	if (!$pagina)
		$pc = 1;
	else
		$pc = $pagina;
			
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;
			
	$enunciado = $_SESSION['partenome'];
	$ano = $_SESSION['ano'];
	$vestibular = $_SESSION['vestibular'];
	$tema = $_SESSION['tema'];
			
	$consulta1 = "SELECT * FROM `questoes_filtro` WHERE (enunciado like '%$enunciado%' or especial like '%$enunciado%' or pergunta like '%$enunciado%') and (ano like '%$ano%' and vestibular like '%$vestibular%' and subtema like '%$tema%') LIMIT $inicio,$total_reg";

	$consulta2 = "SELECT * FROM `questoes_filtro` WHERE (enunciado like '%$enunciado%' or especial like '%$enunciado%' or pergunta like '%$enunciado%') and (ano like '%$ano%' and vestibular like '%$vestibular%' and subtema like '%$tema%')";

	$limite = mysqli_query($conexao, $consulta1);
			
	$todos = mysqli_query($conexao, $consulta2);
			
	$tr = mysqli_num_rows($todos); // verifica o número total de registros
	$tp = $tr / $total_reg; // verifica o número total de páginas
		
	if(mysqli_num_rows($limite) > 0){

		while($n = mysqli_fetch_array($limite)){

			$vestibular = $n['vestibular'];
			$ano = $n['ano'];
			$imagem = $n['imagem'];
			$enunciado = $n['enunciado'];
			$especial = $n['especial'];
			$pergunta = $n['pergunta'];
			$id = $n['id'];
					
			echo "<strong>($vestibular $ano)</strong> $enunciado";
			
			if(!empty($imagem)){
				echo "<br><br>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $imagem ).'"/>';
				echo "<div class='clear'></div>";
			}

			if(!empty($especial))
				echo "<br><br>$especial<br>";
			if(!empty($pergunta))
				echo "<br><b>$pergunta</b>";	

			echo "<p><br><b><i>(...)</i></b></p>";

			$resolucao = INCLUDE_PATH.'resolucao-de-questoes';

			echo "<form class='right entrar_questao' action='$resolucao' method='POST'><button type='submit' value='$id' class='btn-resolver-questao' name='id_questao'><b>Responder <i class='fa fa-arrow-right' aria-hidden='true'></i></b></button></form><div class='clear'></div><hr>";

		}
				
		$anterior = $pc - 1;
		$proximo = $pc + 1;
		
		if($anterior > 1)
			$anterior = INCLUDE_PATH.'area-de-questoes_'.$anterior;
		else
			$anterior = INCLUDE_PATH.'area-de-questoes';

		$proximo = 	INCLUDE_PATH.'area-de-questoes_'.$proximo;
		$inicio = 	INCLUDE_PATH.'area-de-questoes';

		if ($pc > 1)
			echo "<a href='$anterior' id='paginacao-anterior' class='left'><i class='fa fa-arrow-left' aria-hidden='true'></i>Anterior</a><div class='clear'></div>";
				
		if ($pc < $tp)
			echo "<a href='$proximo' id='paginacao-proxima' class='right'>Próxima <i class='fa fa-arrow-right' aria-hidden='true'></i></a><div class='clear'></div>";

		echo "<a href='$inicio' id='paginacao-inicio'>INÍCIO</a><div class='clear'></div>";
	}
	else
		echo "<p class='mensagem-red'>Nenhum resultado encontrado</p>";

?>