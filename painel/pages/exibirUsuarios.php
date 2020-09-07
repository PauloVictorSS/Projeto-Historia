<?php  

    $users = Painel::listarUsuariosCadastrados();

    $publica = 0;
    $privada = 0;

    $fund1 = 0;
    $fund2 = 0;
    $ensmed = 0;
    $super = 0;

    foreach ($users as $key => $value) {

        if($value['id_rede'] == 1)
            $publica ++;
        else
            $privada ++;

        switch ($value['id_escolaridade']) {
            case 1:
                $fund1++;
                break;
            case 2:
                $fund2++;
                break;
            case 3:
                $ensmed++;
                break;
            case 4:
                $super++;
                break;
        }
    }

?>

<div class="box-content left">
    <h2><i class="fa fa-user" aria-hidden="true"></i> Usuários Cadastrados no Site</h2>
    <div class="box-infs">
        <div class="infs userCad">
            <h2>Total de Cadastros</h2><br>
            <p><?php echo count($users); ?></p>
        </div>
        <div class="infs userCad">
            <h2>Cadastros p/ instituição</h2>
            <p>Pública: <?php echo $publica; ?></p>
            <p>Privada: <?php echo $privada; ?></p>
        </div>
        <div class="infs userCad">
            <h2>Cadastros p/ escolaridade</h2>
            <p>Fundamental I: <?php echo $fund1; ?></p>
            <p>Fundamental II: <?php echo $fund2; ?></p>
            <p>Ensino Médio: <?php echo $ensmed; ?></p>
            <p>Superior: <?php echo $super; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>

<div class="box-content left">
    <h2><i class="fa fa-user" aria-hidden="true"></i> Todos os usuário cadastrados</h2>

	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>Nome</span>
			</div><!--col-->
			<div class="col">
				<span>Data de nascimento</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->

		<?php
			foreach ($users as $key => $value) {

		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['nome']; ?></span>
			</div>
			<div class="col">
				<span><?php echo $value['aniversario']; ?></span>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="clear"></div>