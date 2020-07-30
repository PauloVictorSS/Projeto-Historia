<?php 
	include_once("../conexao/start_conexao.php");
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
		
		<?php   include_once("menu.html");     ?>

		<main>
			<article class="area-usuario">
				<div class="dados-pessoais">
					<h1>Dados Pessoais</h1>

					<?php  include_once("../php/usuario_dadospessoais.php");		?>

				</div>
				<br><br>
				<div class="dados-questoes">
					<h1>Dados sobre as Questões</h1>
					<br><br>
					<p>Dados ainda não disponíveis</p>
				</div>

				<br><br><hr><br>
				<a href="../php/usuario_deslogar.php" id="sair">Deslogar<i class="fa fa-sign-out" aria-hidden="true"></i></a>
			</article>
		</main>

		<?php   include_once("../paginas/rodape.html");   ?>

		<?php 	include_once("../conexao/close_conexao.php");?>

		<!-- JQUERY -->
		<script src="../js/jquery-3.5.1.min.js"></script>

		<!-- My JS -->
		<script src="../js/my_js.js"></script>
		
	</body>
</html>