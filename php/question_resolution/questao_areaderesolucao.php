<?php

/*
	Mostra a questão selecionada de forma
	organizada
*/
	
	if(!empty($_POST["id_questao"]))
		$_SESSION["id_questao"] = clear($_POST["id_questao"]);

	if(!empty($_POST["lettler"])){
		$_SESSION["resposta"] = clear($_POST["lettler"]);
		$resposta = $_SESSION["resposta"];
	}
	
	$button = 0;

	if(!empty($_POST["verifica"]))
		$button = $_POST["verifica"];

	$id = $_SESSION["id_questao"];

	$consulta = "SELECT * FROM `questoes_filtro` where questoes_filtro.id = $id group by questoes_filtro.id";

	$questao = mysqli_query($conexao, $consulta);

	while($p = mysqli_fetch_array($questao)){

		$resolveu = "";

		if(isset($_SESSION['status_login'])){
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

		$resolucao = INCLUDE_PATH.'resolucao-de-questoes';
		$areaquestoes = INCLUDE_PATH.'area-de-questoes';

		echo "<h1>Questão sobre $sub_tema</h1>";
		echo "<h2>Questão $id</h2>";

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

		echo "<form action='$resolucao' method='POST' id='form_alternativas'>";

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
				echo "<b>A) </b> $alternativa_A";

			if(!empty($alternativa_B))
				echo "<b>B) </b> $alternativa_B";

			if(!empty($alternativa_C))
				echo "<b>C) </b> $alternativa_C";

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