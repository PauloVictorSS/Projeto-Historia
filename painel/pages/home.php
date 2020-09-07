<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `admin.visitas`");
	$pegarVisitasTotais->execute();

	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));

	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();

?>
<div class="box-content">
    <h2><i class="fa fa-home" aria-hidden="true"></i> Informações do site</h2>
    <div class="box-infs">
        <div class="infs">
            <h2>Usuários online agora</h2>
            <p><?php echo count($usuariosOnline); ?></p>
        </div>
        <div class="infs">
            <h2>Total de visitas</h2><br>
            <p><?php echo $pegarVisitasTotais; ?></p>
        </div>
        <div class="infs">
            <h2>Visitas hoje</h2><br>
            <p><?php echo $pegarVisitasHoje; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="box-content left">
    <h2><i class="fa fa-globe" aria-hidden="true"></i> Pessoas Online no Site</h2>

	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div><!--col-->
			<div class="col">
				<span>Última Ação</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->

		<?php
			foreach ($usuariosOnline as $key => $value) {

		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip'] ?></span>
			</div>
			<div class="col">
				<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
</div>