<?php
	$onlineUsers = Painel::onlineUsers();

	$totalVisits = MySql::getConnect()->prepare("SELECT * FROM `admin.visitas`");
	$totalVisits->execute();

	$totalVisits = $totalVisits->rowCount();

	$todayVisits = MySql::getConnect()->prepare("SELECT * FROM `admin.visitas` WHERE dia = ?");
	$todayVisits->execute(array(date('Y-m-d')));

	$todayVisits = $todayVisits->rowCount();

?>
<div class="box-content">
    <h2><i class="fa fa-home" aria-hidden="true"></i> Informações do site</h2>
    <div class="box-infs">
        <div class="infs">
            <h2>Usuários online agora</h2><br>
            <p><?php echo count($onlineUsers); ?></p>
        </div>
        <div class="infs">
            <h2>Total de visitas</h2><br>
            <p><?php echo $totalVisits; ?></p>
        </div>
        <div class="infs">
            <h2>Visitas hoje</h2><br>
            <p><?php echo $todayVisits; ?></p>
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
			foreach ($onlineUsers as $key => $value) {

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