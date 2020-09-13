<?php

    $themes = Questao::selectThemes();
    $exams = Questao::selectExams();

?>

<div class="box-content">
    <h1>Excluir um vestibular</h1>
    <form action="" method="POST" id="form-vestib" class="yellow">

        <div class="box-category">
            <h2>Vestibulares cadastrados</h2>

            <?php
                foreach ($exams as $key => $value) { 
            ?>
                <div class="element">    
                    <p class="left"><?php echo $value["descricao"]; ?></p>
                    <button type="submit" value="<?php echo $value["id"]; ?>"  name="action1" form="form-vestib" class="right"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    <div class="clear"></div>
                </div>

            <?php } ?>
            
        </div>
        <div class="buttons">
            <p>* O item excluído vai ser perdido permanentemente</p>
        </div>

    </form>
</div>


<div class="box-content">
    <h1>Excluir um tema</h1>
    <form action="" method="POST" id="form-temas" class="blue">

        <h2>Temas cadastrados</h2>
        <div class="box-category">       

            <?php
                foreach ($themes as $key => $value) { 
            ?>
                    
                <p><?php echo $value["descricao"]; ?></p>

            <?php } ?>
            
        </div>

        <div class="box-category">

            <input type="text" name="alter_a" placeholder="Nome do Vestibular para excluílo" required><span> *</span>

        </div>

        <div class="buttons">
            <p>* Copie o nome de forma identica ao que está escrito</p>
            <button type="submit" value="1"  name="action1" form="form-vestib">Excluir</button>
        </div>

    </form>
</div>