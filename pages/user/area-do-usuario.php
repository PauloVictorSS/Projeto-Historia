<?php

	if(!isset($_SESSION['status_login'])){
		header("Location:".INCLUDE_PATH);
	}

?>
<main>
	<section class="area-usuario">
		<div class="center">
			<h1>Dados Pessoais</h1>
			<table class="dados-pessoais">				

				<?php  include_once("php/user/usuario_dadospessoais.php");		?>

			</table>
			<h1>Dados sobre as Questões</h1>
			<div class="dados-questoes">

				<?php  include_once("php/user/usuario_dadosquestoes.php");		?>

			</div>
			<hr>
			<a href="php/user/usuario_deslogar.php" id="sair" class="right">Deslogar<i class="fa fa-sign-out" aria-hidden="true"></i></a>
		</div>
		<div class="clear"></div>
	</section>
</main>