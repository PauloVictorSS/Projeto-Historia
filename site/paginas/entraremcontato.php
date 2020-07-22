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
		
		<?php   include "menu.html"     ?>

		<main>
			<article class="contato">
				<br>
				<h1>Entre em contato</h1>
				<h2>Envie um e-mail para nós expondo sugestões</h2>
				<br><br>
				<form action="" method="POST">
					<div class="text-box">
						<i class="fa fa-user-circle" aria-hidden="true"></i>
						<input type="text" name="nome" id="nome" placeholder="Nome">
					</div>
					<br><br>
					<div class="text-box">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="e-mail" name="e-mail" id="e-mail" placeholder="E-mail">
					</div>
					<br><br>
					<label>Sugestão e/ou Crítica:</label><br>
					<textarea name="sugestao">Sua sugestão aqui!</textarea>
				</form><br>
				<h2>Entre em contato de outras formas</h2>
				<br><br>
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