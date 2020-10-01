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

	$consulta1 = "SELECT vestibular.`descricao` AS `vestibular`, questoes.`ano`, questoes.`especial`, questoes.`imagem`, sub_tema.`descricao` AS `subtema`, questoes.`enunciado`, questoes.`alternativa_a`, questoes.`alternativa_b`, questoes.`alternativa_c`, questoes.`alternativa_d`,questoes.`alternativa_e`, questoes.`alternativa_certa`, questoes.`explicacao`, questoes.`pergunta`, questoes.`id`, questoes.`tipo` FROM ((questoes join sub_tema) JOIN vestibular) WHERE questoes.`id_vestibular` = vestibular.`id` and questoes.`id_sub_tema` = sub_tema.`id` AND (questoes.enunciado LIKE '%$enunciado%' or questoes.pergunta LIKE '%enunciado%') AND (questoes.ano LIKE '%$ano%' AND vestibular.descricao LIKE '%$vestibular%' AND sub_tema.descricao LIKE '%$tema%') LIMIT $inicio, $total_reg";

	$consulta2 = "SELECT vestibular.`descricao` AS `vestibular`, questoes.`ano`, questoes.`especial`, questoes.`imagem`, sub_tema.`descricao` AS `subtema`, questoes.`enunciado`, questoes.`alternativa_a`, questoes.`alternativa_b`, questoes.`alternativa_c`, questoes.`alternativa_d`,questoes.`alternativa_e`, questoes.`alternativa_certa`, questoes.`explicacao`, questoes.`pergunta`, questoes.`id`, questoes.`tipo` FROM ((questoes join sub_tema) JOIN vestibular) WHERE questoes.`id_vestibular` = vestibular.`id` and questoes.`id_sub_tema` = sub_tema.`id` AND (questoes.enunciado LIKE '%$enunciado%' or questoes.pergunta LIKE '%enunciado%') AND (questoes.ano LIKE '%$ano%' AND vestibular.descricao LIKE '%$vestibular%' AND sub_tema.descricao LIKE '%$tema%')";

	$limite = mysqli_query($conexao, $consulta1);
		
	$todos = mysqli_query($conexao, $consulta2);
			
	$tr = mysqli_num_rows($todos); // verifica o número total de registros

	echo "<p class='total_resultados right'>$tr resultados encontrados</p><div class='clear'></div>";

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
			$analise = INCLUDE_PATH_PAINEL.'Analise-Questao';

			if($explode[0] == 'area-de-questoes') 
				echo "<form class='right entrar_questao' action='$resolucao' method='POST'><button type='submit' value='$id' class='btn-resolver-questao' name='id_questao'><b>Responder <i class='fa fa-arrow-right' aria-hidden='true'></i></b></button></form><div class='clear'></div><hr>";
			else
				echo "<form class='right entrar_questao' action='$analise' method='POST'><button type='submit' value='$id' class='btn-resolver-questao' name='id_questao'><b>Dados da questão <i class='fa fa-arrow-right' aria-hidden='true'></i></b></button></form><div class='clear'></div><hr>";
		}
				
		$anterior = $pc - 1;
		$proximo = $pc + 1;
		
		
	}
	else
		echo "<p class='mensagem-red'>Nenhum resultado encontrado</p>";

?>