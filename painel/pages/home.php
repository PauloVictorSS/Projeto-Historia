<?php

    $result = mysqli_query($conexao, "select nome from materia where id = $materia");
    $materia = mysqli_fetch_array($result);

    $nome_materia = $materia[0];

?>
<div class="box-content">
    <h1>Bem vindo a área administrativa</h1><br><br>
    <h3>Matéria de <?php echo $nome_materia; ?></h3>

    <div class="dados">
        
    </div> 
</div>