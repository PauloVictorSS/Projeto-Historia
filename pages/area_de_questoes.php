<main>
    <section class="area-de-questoes">
		<div class="center">	
			<h1>Área de Questões</h1>
			<form method="POST" action="<?php echo INCLUDE_PATH; ?>area_de_questoes" id="filtro">
				<input type="text" name="partenome" id="pesquisar-input" placeholder="Pesquisar" maxlength="100">
				<select name="vestibular" id="vestibular-input" class="w25">
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

				<?php
				
					if(mysqli_num_rows($limite) > 0){

						if($anterior > 1)
							$anterior = INCLUDE_PATH.'area_de_questoes-'.$anterior;
						else
							$anterior = INCLUDE_PATH.'area_de_questoes';
				
						$proximo = 	INCLUDE_PATH.'area_de_questoes-'.$proximo;
						$inicio = 	INCLUDE_PATH.'area_de_questoes';
				
						if ($pc > 1)
							echo "<a href='$anterior' id='paginacao-anterior' class='left'><i class='fa fa-arrow-left' aria-hidden='true'></i>Anterior</a><div class='clear'></div>";
								
						if ($pc < $tp)
							echo "<a href='$proximo' id='paginacao-proxima' class='right'>Próxima <i class='fa fa-arrow-right' aria-hidden='true'></i></a><div class='clear'></div>";
					
						echo "<a href='$inicio' id='paginacao-inicio'>INÍCIO</a><div class='clear'></div>";
					}

				?>
			</div>
		</div>
		<div class="clear"></div>
	</section>
</main>
