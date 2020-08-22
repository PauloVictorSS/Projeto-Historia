<main>
	<section class="cadastro">
		<div class="center">
			<h1>Fazer Cadastro</h1>
			<form action="<?php echo INCLUDE_PATH; ?>cadastrar" method="POST">
				<div class="text-box">
					<i class="fa fa-user-circle" aria-hidden="true"></i>
					<input type="text" name="nome" id="nome" class="informacoes" placeholder="Nome Completo" required>
				</div>
				<div class="text-box">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" name="login" id="usuario" class="informacoes" placeholder="Login" maxlength="20" required>
				</div>
				<div class="text-box">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" name="senha" id="senha" class="informacoes" placeholder="Senha" maxlength="15" required>
				</div>
				<div class="text-box">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" name="conf_senha" id="conf_senha" class="informacoes" placeholder="Confirmar Senha" maxlength="15" required>
				</div>
				<div class="text-box">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<input type="e-mail" name="e-mail" id="e-mail" class="informacoes" placeholder="E-mail" required>
				</div>
				<div class="text-box">
					<i class="fa fa-birthday-cake" aria-hidden="true"></i>
					<input type="date" name="aniver" id="aniver" class="informacoes" required>
				</div>
				<div class="text-box">
					<i class="fa fa-graduation-cap" aria-hidden="true"></i>
					<select id="escolar" name="escolar" required>
						<option value="">Escolaridade</option>
						<?php  include_once("php/user/cadastro_escolaridade.php")?>
					</select>
				</div>
				<div class="text-box">
					<i class="fa fa-graduation-cap" aria-hidden="true"></i>
					<select id="rede" name="rede" required>
						<option value="">Rede</option>
						<?php  include_once("php/user/cadastro_rede.php")?>
					</select>
				</div>
				<div class="buttons">
					<input type="reset" value="Apagar" id="btn-apagar" class="left">
					<button type="submit" value="Cadastrar" name="submit" class="right" id="btn-cadastrar">Cadastrar</button>
					<div class="clear"></div>
				</div>
			</form>
			<?php   include_once("php/user/cadastro_cadastrando.php");   ?>
		</div>
	</section>
</main>