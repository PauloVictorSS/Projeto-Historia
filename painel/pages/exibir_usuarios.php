<?php  

    $users = Painel::registeredUsers();

    $public = 0;
    $private = 0;

    $fund1 = 0;
    $fund2 = 0;
    $ensinoMedio = 0;
    $superior = 0;

    foreach ($users as $key => $value) {

        if($value['id_rede'] == 1)
            $public ++;
        else
            $private ++;

        switch ($value['id_escolaridade']) {
            case 1:
                $fund1++;
                break;
            case 2:
                $fund2++;
                break;
            case 3:
                $ensinoMedio++;
                break;
            case 4:
                $superior++;
                break;
        }
    }

?>

<div class="box-content left">
    <h2><i class="fa fa-user" aria-hidden="true"></i> Usuários Cadastrados no Site</h2>
    <div class="box-infs">
        <div class="infs userCad yellow">
            <h2>Total de Cadastros</h2><br>
            <p><?php echo count($users); ?></p>
        </div>
        <div class="infs userCad blue">
            <h2>Cadastros p/ instituição</h2>
            <p>Pública: <?php echo $public; ?></p>
            <p>Privada: <?php echo $private; ?></p>
        </div>
        <div class="infs userCad red">
            <h2>Cadastros p/ escolaridade</h2>
            <p>Fundamental I: <?php echo $fund1; ?></p>
            <p>Fundamental II: <?php echo $fund2; ?></p>
            <p>Ensino Médio: <?php echo $ensinoMedio; ?></p>
            <p>Superior: <?php echo $superior; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>

<div class="box-content">

    <h2><i class="fa fa-user" aria-hidden="true"></i> Todos os usuário cadastrados</h2>

    <table class="home">
        <tr>
            <th>Nome</th>
            <th>Aniversário</th>
        </tr>

		<?php
			foreach ($users as $key => $value) {
        ?>

        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo date('d/m/Y',strtotime($value['aniversario'])) ?></td>
        </tr>

		<?php } ?>
    </table>

</div>
