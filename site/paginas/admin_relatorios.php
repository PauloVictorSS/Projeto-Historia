<?php 
	include "../conexao/conexao.php";
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
			<article class="admin-gerenciar_relat">
                <br><h1 class='admin-h1'>Área do Administrador</h1>
                <h2 class='admin-h2'>Gerenciamento de Relatórios</h2>
                <br><br>

                <a href='admin_relatquest.php' class='admin-a'><button class='admin-button'><br>Relatório de acertos por Questão<br><br></button></a>
                <br><br>
                <a href='admin_relattema.php' class='admin-a'><button class='admin-button'><br>Relatório de acertos por Tema<br><br></button></a>
                <br><br>
                <a href='admin_relatestat.php' class='admin-a'><button class='admin-button'><br>Estatísticas do site<br><br></button></a>
                <br><br><hr><br>

                <a href="areadoadmin.php" id="voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
			</article>
		</main>

		<?php   include "../paginas/rodape.html";   ?>

		<!-- JQUERY -->
		<script src="../js/jquery-3.5.1.min.js"></script>

		<!-- My JS -->
		<script src="../js/my_js.js"></script>
		
	</body>
</html>