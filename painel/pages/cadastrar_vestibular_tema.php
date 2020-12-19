<?php

    if(isset($_POST["action"])){

        if($_POST["action"] == 1)
            $result = Painel::addVestibular($_POST["name"]);
        else
            $result = Painel::addTema($_POST["name"], $materia);

        if($result == 1)
            echo "<div class='mensagem green'>Inserção feita com sucesso!</div>";
        else
            echo "<div class='mensagem red'>Algo na inserção deu errado!</div>";
        
    }

    $themes = Questao::selectThemes();
    $exams = Questao::selectExams();

?>

<div class="box-content">
    <h1>Cadastrar um vestibular</h1>
    <form action="<?php echo INCLUDE_PATH_PAINEL?>Cadastrar-Vestibular-Tema" method="POST" id="form-vestib" class="yellow formulario">

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

            <input type="text" name="name" placeholder="Nome do Vestibular" required>

        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório<br>*Não utilizar nenhum caracter especial (@, º, ª, etc...)</p>
            <button type="submit" value="1"  name="action" form="form-vestib">Adicionar</button>
        </div>

    </form>
</div>


<div class="box-content">
    <h1>Cadastrar um tema</h1>
    <form action="<?php echo INCLUDE_PATH_PAINEL?>Cadastrar-Vestibular-Tema" method="POST" id="form-temas" class="blue formulario">

        <h2>Temas já cadastrados</h2>
        <div class="box-category">

            <?php

                foreach ($themes as $key => $tema)
                    if($tema['id_materia'] == $_SESSION['materia_prof'])
                        echo "<p>".$tema["descricao"]."</p>";
            ?>
            
        </div>
        <div class="box-category">
            <h2>Cadastrar um tema</h2>

            <input type="text" name="name" placeholder="Nome do tema" required>

        </div>
        <div class="buttons">
            <p>* Preenchimento Obrigatório<br>*Não utilizar nenhum caracter especial (@, º, ª)</p>
            <button type="submit" value="2"  name="action" form="form-temas">Adicionar</button>
        </div>

    </form>
</div>