<?php


    $temas = Questao::selectTemas();
    $vestibulares = Questao::selectVestibulares();

?>

<div class="box-content">
    <h1>Cadastrar Questão Objetiva</h1>
    <form enctype="multipart/form-data" action="" method="POST" id="form-objet">

        <div class="box-category">
            <h2>Corpo da questão</h2>

            <input type="text" name="texto" placeholder="Texto inicial da questão" required><span> *</span>
            <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão" required><span> *</span>
            <input type="text" name="especial" placeholder="Poema ou afins">
        </div>

        <div class="box-category">
            <h2>Alternativas da questão</h2>

            <input type="text" name="alter_a" placeholder="Alternativa A" required><span> *</span>
            <input type="text" name="alter_b" placeholder="Alternativa B" required><span> *</span>
            <input type="text" name="alter_c" placeholder="Alternativa C" required><span> *</span>
            <input type="text" name="alter_d" placeholder="Alternativa D" required><span> *</span>
            <input type="text" name="alter_e" placeholder="Alternativa E">
        </div>

        <div class="box-category">
            <h2>Informações sobre a questão</h2>
            <select name="gabarito" required>
                <option value="">Alternativa CORRETA</option>
                <option value="A">Alternativa A</option>
                <option value="B">Alternativa B</option>
                <option value="C">Alternativa C</option>
                <option value="D">Alternativa D</option>
                <option value="E">Alternativa E</option>
            </select><span> *</span>

            <select name="tema" required>
                <option value="">Tema da Questão</option>
                <?php
                    foreach ($temas as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <select name="vest" required>
                <option value="">Vestibular da Questão</option>
                <?php
                    foreach ($vestibulares as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <input type="number" name="ano" placeholder="Ano da Questão" required><span> *</span>
        </div>

        <div class="box-category">
            <h2>Outras informações</h2>
            <input type="text" name="explic" placeholder="Explicação da questão">

            <label for="image">Entre com a imagem da questão:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
            <input type="file" name="image">
        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="1"  name="action1" form="form-objet">Adicionar</button>
        </div>

    </form>
</div>


<div class="box-content">
    <h1>Cadastrar Questão Dissertativa</h1>
    <form enctype="multipart/form-data" action="" method="POST" id="form-disser">

        <div class="box-category">
            <h2>Corpo da questão</h2>

            <input type="text" name="texto" placeholder="Texto inicial da questão" required><span> *</span>
            <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão" required><span> *</span>
            <input type="text" name="especial" placeholder="Poema ou afins">
        </div>

        <div class="box-category">
            <h2>Itens e respostas da questão</h2>

            <input type="text" name="quest_a" placeholder="Item A" required><span> *</span>
            <input type="text" name="resp_a" placeholder="Resposta do item A"><span> *</span><br><br>

            <input type="text" name="quest_b" placeholder="Item B" required><span> *</span>
            <input type="text" name="resp_b" placeholder="Resposta do item B" required><span> *</span><br><br>

            <input type="text" name="quest_c" placeholder="Item C" >
            <input type="text" name="resp_c" placeholder="Resposta do item C">
        </div>
        
        <div class="box-category">
            <h2>Informações sobre a questão</h2>

            <select name="tema" required>
                <option value="">Tema da Questão</option>
                <?php
                    foreach ($temas as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <select name="vest" required>
                <option value="">Vestibular da Questão</option>
                <?php
                    foreach ($vestibulares as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <input type="number" name="ano" placeholder="Ano da Questão" required><span> *</span>
        </div>

        <div class="box-category">
            <h2>Outras informações</h2>
            <input type="text" name="explic" placeholder="Explicação da questão">

            <label for="image">Entre com a imagem da questão:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
            <input type="file" name="image">
        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="2"  name="action2" form="form-disser">Adicionar</button>
        </div>

    </form>
</div>