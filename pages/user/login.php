<?php   include_once("php/user/usuario_verificalogado.php");  ?>

<main>

	<?php  include_once("php/user/usuario_logando.php");	    ?>

	<section class="login">
		<div class="center">
			<form method="POST" action="<?php echo INCLUDE_PATH; ?>login">
				<h1>Logar</h1>
				<input type="text" name="login" class="informacoes" maxlength="20" placeholder="Usuário..." required>
				<input type="password" name="senha" class="informacoes" maxlength="15" placeholder="Senha..." required><br><br>
				<a href="<?php echo INCLUDE_PATH; ?>cadastrar">Não fez o cadastro ainda?</a><br>
				<div class="buttons">
					<input type="reset" value="Apagar" class="left btn-apagar">
					<input type="submit" value="Entrar" class="right btn-login">
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</section>
</main>