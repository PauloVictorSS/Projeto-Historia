<?php

    $materias = Adm::getSubject();

    foreach ($materias as $key => $materia) {
        
        if($materia['id'] == $_SESSION['materia_prof'])
            $nome_materia = $materia['nome'];
    }
?>
<div class="box-content">
    <h1>Bem vindo a área administrativa</h1><br><br>
    <h3>Matéria de <?php echo $nome_materia; ?></h3>

    <div class="dados">
        
    </div> 
</div>