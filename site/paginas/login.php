<?php 
	include "../conexao/conexao.php";
	include "../php/usuario_verificalogado.php";
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

		<?php   include "menu.php";     ?>

		<main>
			<article class="login">
				<h1>Logar</h1><br>
				<form method="POST" action="login.php">
					<div class="text-box">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="login" id="usuario" class="informacoes" maxlength="25" placeholder="Usuário">
					</div>
					<br><br>
					<div class="text-box">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" name="senha" id="senha" class="informacoes" maxlength="20" placeholder="Senha">
					</div>
					<br><br>
					<a href="#">Esqueceu a Senha?</a>
					<a href="cadastrar.php">Não fez o cadastro ainda?</a>
					<br><br>
					<div class="div-btn-login">
						<input type="reset" value="Apagar" id="btn-apagar">
						<input type="submit" value="Entrar" id="btn-login">
					</div>
				</form>
				<br><br>

				<?php  include "../php/usuario_logando.php";	?>

			</article>
		</main>
		<?php  include "rodape.php";      ?>

		<!-- JQUERY -->
		<script src="../js/jquery-3.5.1.min.js"></script>

		<!-- My JS -->
		<script src="../js/my_js.js"></script>
		
	</body>

</html>