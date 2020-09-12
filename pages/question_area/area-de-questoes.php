<main>
    <section class="area-de-questoes">
		<div class="center">	
			<h1>Área de Questões</h1>
			<form method="POST" action="<?php echo INCLUDE_PATH; ?>area-de-questoes" id="form">
				<input type="text" name="partenome" id="pesquisar-input" placeholder="Pesquisar" maxlength="100">
				<select name="vestibular" id="vestibular-input" class="w33">
					<option value="">Vestibular</option>

					<?php include_once("php/question_area/formulario_filtro.php"); ?>

				<div class="buttons">
					<input type="submit" value="Filtrar" class="btn-filtrar">
				</div>
			</form>

			<form method="POST" action="php/question_area/reset_filtro.php">
				<button type="submit" value="1" name="btn-reset-filtro">Remover Filtros</button>
			</form>

			<div class="clear"></div>
			<div class="center resultados">
				<?php   include_once("php/question_area/filtrando.php");   ?>
				<?php 	include_once("php/question_area/resultado_questoes.php");	?>
			</div>
		</div>
		<div class="clear"></div>
	</section>
</main>
