<?php 
	include "../conexao/start_conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Vestibular, História, ENEM">
		<meta name="author" content="Paulo Victor">
		<title>Projeto História</title>

		<!--Import Icon-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/custom.css">

	</head>
	<body>

		<?php   include "menu.html";     ?>

		<main>
			<article class="area-de-questoes">
				<h1>Área de Questões</h1>
				<br><hr><br>
				<form method="POST" action="areadequestoes.php">
					<div class="text-box">
						<input type="text" name="partenome" id="pesquisar-input" placeholder="Pesquisar">
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
					<br><br>
					<select name="vestibular" id="vestibular-input">
						<option value="">Vestibular</option>

						<?php 	include "../php/filtro_formulario.php";		?>

					<br><br>
					<div class="div-btn-filtrar">
						<input type="submit" value="Filtrar" id="btn-filtrar">
					</div>
				</form><br>
				<form method="POST" action="../php/filtro_reset.php">
					<button type="submit" value="1" id="btn-reseta-filtro" name="btn-reset-filtro">Remover filtros</button>
				</form>
					
				<br><br><hr><br>
				<h2>Resultados</h2>

				<?php   include "../php/filtro_filtrando.php";   ?>
				<?php 	include "../php/filtro_resultado.php";	 ?>

			</article>
		</main>

		<?php   include "../paginas/rodape.html";   ?>

		<?php 	include "../conexao/close_conexao.php";?>

		<!-- JQUERY -->
		<script src="../js/jquery-3.5.1.min.js"></script>

		<!-- My JS -->
		<script src="../js/my_js.js"></script>

	</body>

</html>
