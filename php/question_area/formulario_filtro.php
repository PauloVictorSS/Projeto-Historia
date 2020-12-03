<?php

/*
	Cria o formulário que é usado para 
	filtrar os resultados na Área de Questões
*/

	$consulta1 = "select vestibular.descricao from vestibular";
	$consulta2 = "select sub_tema.descricao, sub_tema.id from sub_tema";
	$consulta3 = "select * from materia";

	$vestibular = mysqli_query($conexao, $consulta1);
				
	while($n = mysqli_fetch_array($vestibular)){

		$descricao = $n["0"];
		echo "<option value='$descricao'>$descricao</option>";

	}
		
	echo "<option value='UNICAMP'>UNICAMP Geral</option>";
	echo "</select>";
				
	echo "<select name='ano' id='ano-input' class='w25'>
				<option value=''>Ano</option>";

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	$ano = date('Y');
	$ano++;

	while($ano > 1900){
		echo "<option value='$ano'>$ano</option>";
		$ano = $ano - 1;
	}

	echo"</select>";

	echo "<select name='materia' id='materia-input' class='w25'><option value=''>Matéria</option>";
				
	$list_materia = mysqli_query($conexao, $consulta3);
				
	while($o = mysqli_fetch_array($list_materia)){

		$materia = $o[1];
		echo "<option value='$materia'>$materia</option>";
		
	}
				
	echo "</select>";

	echo "<select name='qtd_quest' id='qtd_quest-input' class='w25'>
				<option value=''>Mostrar</option>
				<option value='4'>4 Questões</option>
				<option value='6'>6 Questões</option>
				<option value='10'>10 Questões</option>
				<option value='20'>20 Questões</option>
			</select>";

	echo "<select name='tema' id='tema-input'><option value=''>Temas</option>";
				
	$sub_tema = mysqli_query($conexao, $consulta2);
				
	while($m = mysqli_fetch_array($sub_tema)){

		$tema = $m[0];
		echo "<option value='$tema'>$tema</option>";
		
	}
				
	echo "</select>";

	


?>