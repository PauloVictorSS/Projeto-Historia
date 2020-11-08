<?php

	$totalVisits = MySql::getConnect()->prepare("SELECT * FROM `admin.visitas`");
	$totalVisits->execute();

	$totalVisits = $totalVisits->rowCount();

	$todayVisits = MySql::getConnect()->prepare("SELECT * FROM `admin.visitas` WHERE dia = ?");
	$todayVisits->execute(array(date('Y-m-d')));

	$todayVisits = $todayVisits->rowCount();

?>
<div class="box-content">
    <h2 style="text-align: center;">Bem vindo a área administrativa</h2><br>
    <h2><i class="fa fa-home" aria-hidden="true"></i> Informações do site</h2>
    <div class="box-infs">
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