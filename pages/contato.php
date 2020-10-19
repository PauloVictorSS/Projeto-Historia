<main>
	<section class="contato">
    <?php  include "php/enviar_email.php";  ?>
		<div class="box-contato">
			<div class="center">
				<h1>Entre em contato</h1>
				<form action="<?php echo INCLUDE_PATH; ?>contato" method="POST">
					<h2>Envie um e-mail para nós expondo sugestões</h2>
					<input type="text" name="nome" placeholder="Nome...">
					<input type="text" name="email" placeholder="E-mail...">
					<textarea name="sugestao" placeholder="Sua sugestão aqui..."></textarea>
                    <button name="action" value="1" type="submit">Enviar</button>
				</form>
			</div>
		</div>
	</section>
</main>