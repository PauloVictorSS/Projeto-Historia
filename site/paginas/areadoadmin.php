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
			<article class="area-admin">
                <br><h1 class='admin-h1'>Área do Administrador</h1>
                <br><br>

                <a href='admin_relatorios.php' class='admin-a'><button class='admin-button'><br>Gerar e Gerenciar relatórios<br><i class="fa fa-bar-chart" aria-hidden="true"></i><br><br></button></a>
                <br><br>
                <a href='admin_questoes.php' class='admin-a'><button class='admin-button'><br>Gerenciar questões e afins<br><i class="fa fa-question-circle-o" aria-hidden="true"></i><br><br></button></a>
                <br><br><hr><br>

                <a href="../php/usuario_deslogar.php" id="sair">Deslogar<i class="fa fa-sign-out" aria-hidden="true"></i></a>
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