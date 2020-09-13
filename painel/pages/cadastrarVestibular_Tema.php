<?php

    $themes = Questao::selectThemes();
    $exams = Questao::selectExams();

?>

<div class="box-content">
    <h1>Cadastrar um vestibular</h1>
    <form action="" method="POST" id="form-vestib" class="yellow">

        <div class="box-category">
            <h2>Vestibulares já cadastrados</h2>

            <?php
                foreach ($exams as $key => $value) { 
            ?>
                    
                <p><?php echo $value["descricao"]; ?></p>

            <?php } ?>
            
        </div>

        <div class="box-category">
            <h2>Cadastrar um vestibular</h2>

            <input type="text" name="alter_a" placeholder="Nome do Vestibular" required><span> *</span>

        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="1"  name="action1" form="form-vestib">Adicionar</button>
        </div>

    </form>
</div>


<div class="box-content">
    <h1>Cadastrar um vestibular</h1>
    <form action="" method="POST" id="form-temas" class="blue">

        <h2>Temas já cadastrados</h2>
        <div class="box-category">
            

            <?php
                foreach ($themes as $key => $value) { 
            ?>
                    
                <p><?php echo $value["descricao"]; ?></p>

            <?php } ?>
            
        </div>

        <div class="box-category">
            <h2>Cadastrar um tema</h2>

            <input type="text" name="alter_a" placeholder="Nome do Vestibular" required><span> *</span>

        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="1"  name="action1" form="form-temas">Adicionar</button>
        </div>

    </form>
</div>