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
        <div class="infs yellow">
            <h2>Usuários online agora</h2><br>
            <p><?php echo count($onlineUsers); ?></p>
        </div>
        <div class="infs red">
            <h2>Total de visitas</h2><br>
            <p><?php echo $totalVisits; ?></p>
        </div>
        <div class="infs blue">
            <h2>Visitas hoje</h2><br>
            <p><?php echo $todayVisits; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="box-content">
    <h2><i class="fa fa-globe" aria-hidden="true"></i> Pessoas Online no Site</h2>

	<table class="home">
        <tr>
            <th>IP</th>
            <th>Última Ação</th>
        </tr>

		<?php
			foreach ($onlineUsers as $key => $value) {

		?>
		<tr>
			<td><?php echo $value['ip'] ?></td>
			<td><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></td>
		</tr>

		<?php } ?>
	</table>
</div>