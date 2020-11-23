<?php

	$totalVisits = MySql::getConnect()->prepare("SELECT * FROM `admin.visitas`");
	$totalVisits->execute();

	$totalVisits = $totalVisits->rowCount();

    $result = mysqli_query($conexao, "select nome from materia where id = $materia");
    $materia = mysqli_fetch_array($result);

    $nome_materia = $materia[0];

?>
<div class="box-content">
    <h1>Bem vindo a área administrativa</h1><br><br>
    <h3>Matéria de <?php echo $nome_materia; ?></h3>
    <div class="box-infs">
        <div class="infs red">
            <h4>Total de visitas no site</h4><br>
            <p><?php echo $totalVisits; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>