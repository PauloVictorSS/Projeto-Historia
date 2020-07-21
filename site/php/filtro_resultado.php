<?php	

/*
	Mostra todas as questões com o filtro
	e a paginação aplicada
*/

	include "conexao_session.php";
	
	if (!empty($_SESSION['qtd_quest'])) 
		$total_reg = $_SESSION['qtd_quest'];
	else
		$total_reg = 4;
			
	$pagina = 1;
			
	if(!empty($_GET['pagina']))
		$pagina = $_GET['pagina'];
			
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
			
	$consulta1 = "select vestibular.descricao as 'Vestibular', questoes.ano, questoes.imagem, tema.descricao as 'Tema', sub_tema.descricao as 'Sub-Tema', questoes.enunciado, questoes.alternativa_a, questoes.alternativa_b, questoes.alternativa_c, questoes.alternativa_d, questoes.alternativa_e, questoes.alternativa_certa, questoes.explicacao, questoes.pergunta, questoes.id from questoes, sub_tema, tema, vestibular where (questoes.id_vestibular = vestibular.id and questoes.id_sub_tema = sub_tema.id and sub_tema.id_tema = tema.id) and (questoes.enunciado like '%$enunciado%' and questoes.ano like '%$ano%' and vestibular.descricao like '%$vestibular%' and sub_tema.descricao like '%$tema%') LIMIT $inicio,$total_reg";

	$consulta2 = "select vestibular.descricao as 'Vestibular', questoes.ano, questoes.imagem, tema.descricao as 'Tema', sub_tema.descricao as 'Sub-Tema', questoes.enunciado, questoes.alternativa_a, questoes.alternativa_b, questoes.alternativa_c, questoes.alternativa_d, questoes.alternativa_e, questoes.alternativa_certa, questoes.explicacao, questoes.pergunta from questoes, sub_tema, tema, vestibular where (questoes.id_vestibular = vestibular.id and questoes.id_sub_tema = sub_tema.id and sub_tema.id_tema = tema.id) and (questoes.enunciado like '%$enunciado%' and questoes.ano like '%$ano%' and vestibular.descricao like '%$vestibular%' and sub_tema.descricao like '%$tema%')";

	$limite = mysqli_query($conexao, $consulta1);
			
	$todos = mysqli_query($conexao, $consulta2);
			
	$tr = mysqli_num_rows($todos); // verifica o número total de registros
	$tp = $tr / $total_reg; // verifica o número total de páginas
		
	if(mysqli_num_rows($limite) > 0){

		while($n = mysqli_fetch_array($limite)){

			$vestibular = $n[0];
			$ano = $n[1];
			$imagem = $n[2];
			$tema = $n[3];
			$sub_tema = $n[4];
			$enunciado = $n[5];
			$alternativa_A = $n[6];
			$alternativa_B = $n[7];
			$alternativa_C = $n[8];
			$alternativa_D = $n[9];
			$alternativa_E = $n[10];
			$alternativa_Certa = $n[11];
			$explicacao = $n[12];
			$pergunta = $n[13];
			$id = $n[14];
					
			echo "<br><br><strong>($vestibular $ano)</strong> $enunciado<br>";
						
			if(!empty($imagem))
				echo "<br><img src='$imagem'><br>";	

			echo "<br><strong>(...)</strong>";

			echo "<br><br><form class='entrar_questao' action='resolvendoquestao.php' method='POST'> <button type='submit' value='$id' class='btn-resolver-questao' name='id_questao'>Ir <i class='fa fa-arrow-right' aria-hidden='true'></i></button> </form><br><hr>";

		}
				
		$anterior = $pc - 1;
		$proximo = $pc + 1;
				
		echo "<br><br>";
				
		if ($pc > 1)
			echo "<a href='?pagina=$anterior' id='paginacao-anterior'><i class='fa fa-arrow-left' aria-hidden='true'></i>Anterior</a>";
				
		if ($pc < $tp)
			echo "<a href='?pagina=$proximo' id='paginacao-proxima'>Próxima <i class='fa fa-arrow-right' aria-hidden='true'></i></a>";

		echo "<br><br><a href='?pagina=1' id='paginacao-inicio'>INÍCIO</a>";
	}
	else
		echo "<br><p id='mensagem_erro'>Nenhum resultado encontrado :(</p><br>";

?>