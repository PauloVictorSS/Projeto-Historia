<?php

/*
	Mostra a questão selecionada de forma
	organizada
*/
			
	include "conexao_session.php";
   				
	if(!empty($_POST["id_questao"]))
		$_SESSION["id_questao"] = $_POST["id_questao"];

	if(!empty($_POST["lettler"])){
		$_SESSION["resposta"] = $_POST["lettler"];
		$resposta = $_SESSION["resposta"];
	}
	
	$button = 0;

	if(!empty($_POST["verifica"]))
		$button = $_POST["verifica"];

	$id = $_SESSION["id_questao"];

	$consulta = "select vestibular.descricao as 'Vestibular', questoes.ano, questoes.imagem, tema.descricao as 'Tema', sub_tema.descricao as 'Sub-Tema', questoes.enunciado, questoes.alternativa_a, questoes.alternativa_b, questoes.alternativa_c, questoes.alternativa_d, questoes.alternativa_e, questoes.alternativa_certa, questoes.explicacao, questoes.pergunta, questoes.id, questoes.tipo from questoes, sub_tema, tema, vestibular where (questoes.id_vestibular = vestibular.id and questoes.id_sub_tema = sub_tema.id and sub_tema.id_tema = tema.id) and questoes.id = $id group by questoes.id";

	$questao = mysqli_query($conexao, $consulta);

	while($p = mysqli_fetch_array($questao)){

		$vestibular = $p[0];
		$ano = $p[1];
		$imagem = $p[2];
		$tema = $p[3];
		$sub_tema = $p[4];
		$enunciado = $p[5];
		$alternativa_A = $p[6];
		$alternativa_B = $p[7];
		$alternativa_C = $p[8];
		$alternativa_D = $p[9];
		$alternativa_E = $p[10];
		$gabarito = $p[11];
		$explicacao = $p[12];
		$pergunta = $p[13];
		$id = $p[14];
		$tipo = $p[15];

		$proximo = $id + 1;
		$anterior = $id - 1;

		echo "<br><h1>Questão $id</h1><br><hr><br>";	
		echo "<h2>Tema:  $tema</h2>";
		echo "<h2>Sub-Tema:  $sub_tema</h2><br>";
		echo "<p><strong>($vestibular $ano)</strong> $enunciado</p><br>";
					
		if(!empty($imagem))
			echo "<img src='$imagem'><br>";
				
		if(!empty($pergunta))
			echo "<p><strong>$pergunta<br></strong></p>";

		echo "<form action='resolvendoquestao.php' method='POST' id='form_alternativas'><br>";

		if($tipo == 1){
			
			echo "<input type='radio' id='lettler_A' name='lettler' value='A' class='input-radio'>";
			echo "<label for='lettler_A'><strong>A)</strong> $alternativa_A</label><br>";

			echo "<input type='radio' id='lettler_B' name='lettler' value='B' class='input-radio'>";
			echo "<label for='lettler_B'><strong>B)</strong> $alternativa_B</label><br>";

			echo "<input type='radio' id='lettler_C' name='lettler' value='C' class='input-radio'>";
			echo "<label for='lettler_C'><strong>C)</strong> $alternativa_C</label><br>";

			echo "<input type='radio' id='lettler_D' name='lettler' value='D' class='input-radio'>";
			echo "<label for='lettler_D'><strong>D)</strong> $alternativa_D</label><br>";

			if(!empty($alternativa_E)){
				echo "<input type='radio' id='lettler_E' name='lettler' value='E' class='input-radio'>";
				echo "<label for='lettler_E'><strong>E)</strong> $alternativa_E</label><br>";	
			}	
		}
				
		elseif($tipo == 2){

			if(!empty($alternativa_A))
				echo "<strong><br>A)</strong> $alternativa_A<br>";

			if(!empty($alternativa_B))
				echo "<strong>B)</strong> $alternativa_B<br>";

			if(!empty($alternativa_C))
				echo "<strong>C)</strong> $alternativa_C<br>";

		}

		echo "<br><button type='submit' value='1' id='btn-verificar' name='verifica'>Verificar</button><br>";
		echo "</form>";

		if(!empty($resposta) and $tipo == 1)
			include "../php/questao_verificaresposta1.php";
		elseif(empty($resposta) and $tipo == 2 and $button == 1)
			include "../php/questao_verificaresposta2.php";

		echo "<br><br><hr><br><form actino='resolvendoquestoes.php' method='POST'>";

		if($id != 1)
			echo "<button type='submit' value='$anterior' id='btn-anterior' name='id_questao'><i class='fa fa-arrow-left' aria-hidden='true'></i> Anterior</button>";

		if($id != 25)
			echo "<button type='submit' value='$proximo' id='btn-proximo' name='id_questao'>Próxima<i class='fa fa-arrow-right' aria-hidden='true'></i></button>";

		echo "<br><br><a href='areadequestoes.php'>Voltar para a Área de Questões</a>";
		echo "</form><br><br>";

	}

?>