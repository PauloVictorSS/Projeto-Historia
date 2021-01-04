<div class="box-content">
    <h1>Bem vindo a área do estudante</h1><br><br>

    <h2>Dados pessoais</h2>
    <div class="dados blue">
        <?php  

            echo "<p><b>Nome:</b> ".$user[0][0]."</p><br>";
            echo "<p><b>E-mail:</b> ".$user[0][1]."</p><br>";
            echo "<p><b>Data de Nascimento:</b> ".$user[0][2]."</p><br>";
            echo "<p><b>Rede:</b> ".$user[0][3]."</p><br>";
            echo "<p><b>Escolariedade:</b> ".$user[0][4]."</p>";
        ?>
    </div> 

    <br>
    <a href="<?php echo INCLUDE_PATH_ESTUDANTE;?>alterar_dados" class="link"><h4>Alterar meus dados pessoais</h4></a>
</div>