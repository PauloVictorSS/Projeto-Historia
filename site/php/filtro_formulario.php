<?php

/*
	Cria o formulário que é usado para 
	filtrar os resultados na Área de Questões
*/

	include "conexao_session.php";

	$vestibular = mysqli_query($conexao,"select vestibular.descricao from vestibular");
				
	while($n = mysqli_fetch_array($vestibular)){

		$descricao = $n["0"];
		echo "<option value='$descricao'>$descricao</option>";

	}
		
	echo "<option value='UNICAMP'>UNICAMP Geral</option>";
	echo "</select>";
				
	echo "	<select name='ano' id='ano-input'>
				<option value=''>Ano</option>
				<option value='2020'>2020</option>
				<option value='2019'>2019</option>
				<option value='2018'>2018</option>
				<option value='2017'>2017</option>
				<option value='2016'>2016</option>
				<option value='2015'>2015</option>
				<option value='2014'>2014</option>
				<option value='2013'>2013</option>
				<option value='2012'>2012</option>
				<option value='2011'>2011</option>
				<option value='2010'>2010</option>
				<option value='2009'>2009</option>
			</select><br><br>";


	echo "<select name='qtd_quest' id='qtd_quest-input'>
				<option value=''>Qtd. de questões p/ página</option>
				<option value='4'>4</option>
				<option value='6'>6</option>
				<option value='10'>10</option>
				<option value='20'>20</option>
			</select><br><br>";

	echo "<select name='tema' id='tema-input'><option value=''>Temas</option>";
				
	$sub_tema = mysqli_query($conexao,"select sub_tema.descricao, sub_tema.id from sub_tema");
				
	while($m = mysqli_fetch_array($sub_tema)){

		$tema = $m[0];
		$idtema = $m[1];
		echo "<option value='$idtema'>$tema</option>";
		
	}
				
	echo "</select>";

?>