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

		<?php	include "menu.html"	?>

		<main>
			<article class="cadastro">
				<br>
				<h1>Fazer Cadastro</h1>
				<br>
				<form action="cadastrar.php" method="POST">
					<div class="text-box">
						<i class="fa fa-user-circle" aria-hidden="true"></i>
						<input type="text" name="nome" id="nome" class="informacoes" placeholder="Nome Completo">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="login" id="usuario" class="informacoes" placeholder="Login" maxlength="20">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" name="senha" id="senha" class="informacoes" placeholder="Senha" maxlength="15">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" name="conf_senha" id="conf_senha" class="informacoes" placeholder="Confirmar Senha" maxlength="15">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="e-mail" name="e-mail" id="e-mail" class="informacoes" placeholder="E-mail">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-birthday-cake" aria-hidden="true"></i>
						<input type="date" name="aniver" id="aniver" class="informacoes">
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						<select id="escolar" name="escolar">
							<option value="">Escolaridade</option>

							<?php  include "../php/cadastro_escolaridade.php";	?>

						</select>
					</div>
					<br>
					<div class="text-box">
						<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						<select id="rede" name="rede">
							<option value="">Rede</option>

							<?php  include "../php/cadastro_rede.php";	?>

						</select>
					</div><br>
					<div class="div-btn-cadastrar">
						<input type="reset" value="Apagar" id="btn-apagar">
						<input type="submit" value="Cadastrar" id="btn-cadastrar">
					</div>
				</form>
				<br>
				<?php   include "../php/cadastro_cadastrando.php"   ?>
				<br><br>
			</article>
		</main>
		
		
		<?php   include "rodape.html";   ?>

		<?php 	include "../conexao/close_conexao.php";?>

		<!-- JQUERY -->
		<script src="../js/jquery-3.5.1.min.js"></script>

		<!-- My JS -->
		<script src="../js/my_js.js"></script>
	</body>

</html>