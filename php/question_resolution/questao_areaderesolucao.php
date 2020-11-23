<?php

/*
	Mostra a questão selecionada de forma
	organizada
*/
	
	if(!empty($_POST["id_questao"]))
		$_SESSION["id_questao"] = $_POST["id_questao"];

	if(!empty($_POST["lettler"])){
		$_SESSION["resposta"] = clear($_POST["lettler"]);
		$resposta = $_SESSION["resposta"];
	}
	
	$button = 0;

	if(!empty($_POST["verifica"]))
		$button = $_POST["verifica"];

	$id = $_SESSION["id_questao"];

	$consulta = "SELECT vestibular.`descricao` AS `vestibular`, questoes.`ano`, questoes.`especial`, questoes.`imagem`, sub_tema.`descricao` AS `subtema`, questoes.`enunciado`, questoes.`alternativa_a`, questoes.`alternativa_b`, questoes.`alternativa_c`, questoes.`alternativa_d`,questoes.`alternativa_e`, questoes.`alternativa_certa`, questoes.`explicacao`, questoes.`pergunta`, questoes.`id`, questoes.`tipo` FROM ((questoes join sub_tema) JOIN vestibular) WHERE questoes.`id_vestibular` = vestibular.`id` and questoes.`id_sub_tema` = sub_tema.`id` AND questoes.id = $id";

	$questao = mysqli_query($conexao, $consulta);

	while($p = mysqli_fetch_array($questao)){

		$resolveu = "";

		if(isset($_SESSION['status_login']))
			if($_SESSION['status_login'] == 1){
				$id_usuario = $_SESSION['id_usuario'];
				$id_questao = $id;
				
				$sql = "select * from resolucao where id_usuario = $id_usuario and id_questao = $id_questao";

				$result = mysqli_query($conexao, $sql);

				if(mysqli_num_rows($result) == 1)
					$resolveu = "Questão já resolvida";
				else
					$resolveu = "Questão ainda não resolvida";
			}
		

		$tipo = $p['tipo'];
		$id = $p['id'];

		$vestibular = $p['vestibular'];
		$ano = $p['ano'];
		$sub_tema = $p['subtema'];

		$enunciado = $p['enunciado'];
		$imagem = $p['imagem'];
		$especial = $p['especial'];
		$pergunta = $p['pergunta'];
		
		$alternativa_A = $p['alternativa_a'];
		$alternativa_B = $p['alternativa_b'];
		$alternativa_C = $p['alternativa_c'];
		$alternativa_D = $p['alternativa_d'];
		$alternativa_E = $p['alternativa_e'];

		$gabarito = $p['alternativa_certa'];
		$explicacao = $p['explicacao'];

		$resolucao = INCLUDE_PATH.'resolucao_de_questoes';
		$areaquestoes = INCLUDE_PATH.'area_de_questoes';

		echo "<h1>Questão sobre $sub_tema</h1>";

		if(!empty($resolveu))
			echo "<p class='right'>$resolveu</p>";
		
		echo "<div class='clear'></div>";

		echo "<hr>";

		echo "<p><b>($vestibular $ano)</b> $enunciado</p>";
					
		if(!empty($imagem))
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $imagem ).'"/>';
		
		if(!empty($especial))
			echo "<p$especial</p>";
				
		if(!empty($pergunta))
			echo "<p><b>$pergunta</b></p>";

		echo "<form action='#gabaritos' method='POST' id='form_alternativas'>";

		if($tipo == 1){
			
			echo "<input type='radio' id='lettler_A' name='lettler' value='A' class='input-radio'>";
			echo "<label for='lettler_A'><b>A) </b> $alternativa_A</label><br>";

			echo "<input type='radio' id='lettler_B' name='lettler' value='B' class='input-radio'>";
			echo "<label for='lettler_B'><b>B) </b> $alternativa_B</label><br>";

			echo "<input type='radio' id='lettler_C' name='lettler' value='C' class='input-radio'>";
			echo "<label for='lettler_C'><b>C) </b> $alternativa_C</label><br>";

			echo "<input type='radio' id='lettler_D' name='lettler' value='D' class='input-radio'>";
			echo "<label for='lettler_D'><b>D) </b> $alternativa_D</label><br>";

			if(!empty($alternativa_E)){
				echo "<input type='radio' id='lettler_E' name='lettler' value='E' class='input-radio'>";
				echo "<label for='lettler_E'><b>E) </b> $alternativa_E</label><br>";	
			}	
		}
				
		elseif($tipo == 2){

			if(!empty($alternativa_A))
				echo "<b>A) </b> $alternativa_A<br>";

			if(!empty($alternativa_B))
				echo "<b>B) </b> $alternativa_B<br>";

			if(!empty($alternativa_C))
				echo "<b>C) </b> $alternativa_C<br>";

		}

		echo "<button type='submit' value='1' id='btn-verificar' name='verifica'>Verificar</button>";
		echo "</form><div class='clear'></div>";

		if(!empty($resposta) and $tipo == 1)
			include_once("php/question_resolution/questao_verificaresposta1.php");
		elseif(empty($resposta) and $tipo == 2 and $button == 1)
			include_once("php/question_resolution/questao_verificaresposta2.php");

		echo "<hr>";
		echo "<a href='$areaquestoes'>Voltar para a Área de Questões</a>";

	}

?>