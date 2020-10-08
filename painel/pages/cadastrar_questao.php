<?php

    $themes = Questao::selectThemes();
    $exams = Questao::selectExams();

    if(isset($_POST["action"])){

        $tipo = $_POST["action"];

        if(!empty($_POST["texto"]))
            $enunciado = str_replace("\n", "<br>", str_replace("'", "`", $_POST["texto"]));
        else
            $enunciado = "";
        
        $pergunta = str_replace("'", "`", $_POST["enunciado"]);

        $imagem = $_FILES['image']['tmp_name'];
        $tamanho = $_FILES['image']['size'];
        $tipoImg = $_FILES['image']['type'];
        $nome = $_FILES['image']['name'];

        if(!empty($imagem)){
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
        }
        else
            $conteudo = "";

        $ano = $_POST["ano"];
        $tema = $_POST["tema"];
        $vest = $_POST["vest"];

        if($tipo == 1){

            $alter_a = str_replace("'", "`", $_POST["alter_a"]);
            $alter_b = str_replace("'", "`", $_POST["alter_b"]);
            $alter_c = str_replace("'", "`", $_POST["alter_c"]);
            $alter_d = str_replace("'", "`", $_POST["alter_d"]);
            $alter_e = str_replace("'", "`", $_POST["alter_e"]);

            $gabarito = $_POST["gabarito"];
            $explic = str_replace("'", "`", $_POST["explic"]);

            $result = Questao::addQuestObj($enunciado, $pergunta, $alter_a, $alter_b, $alter_c, $alter_d, $alter_e, $gabarito, $explic, $tema, $vest, $ano, $tipo, $conteudo);

        }else{
            $quest_a = str_replace("'", "`", $_POST["quest_a"]);
            $quest_b = str_replace("'", "`", $_POST["quest_b"]);
            $quest_c = str_replace("'", "`", $_POST["quest_c"]);
            $resp_a = str_replace("'", "`", $_POST["resp_a"]);
            $resp_b = str_replace("'", "`", $_POST["resp_b"]);
            $resp_c = str_replace("'", "`", $_POST["resp_c"]);

            $result = Questao::addQuestDissert($enunciado, $pergunta, $quest_a, $quest_b, $quest_c, $resp_a, $resp_b, $resp_c, $tema, $vest, $ano, $tipo, $conteudo);

        }

        if($result == 1)
            echo "<div class='mensagem green'>Questão inserida com sucesso!</div>";
        else
            echo "<div class='mensagem red'>Algo na inserção deu errado!</div>";
        
    }
?>

<div class="box-content">
    <h1>Cadastrar Questão Objetiva</h1>
    <form enctype="multipart/form-data" action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Questao" method="POST" id="form-objet" class="yellow formulario">

        <div class="box-category">
            <h2>Corpo da questão</h2>

            <textarea name="texto" placeholder="Texto inicial da questão"></textarea>
            <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão">
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
                    foreach ($themes as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <select name="vest" required>
                <option value="">Vestibular da Questão</option>
                <?php
                    foreach ($exams as $key => $value) { 
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
            <button type="submit" value="1"  name="action" form="form-objet">Adicionar</button>
        </div>

    </form>
</div>


<div class="box-content">
    <h1>Cadastrar Questão Dissertativa</h1>
    <form enctype="multipart/form-data" action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Questao" method="POST" id="form-disser" class="red formulario">

        <div class="box-category">
            <h2>Corpo da questão</h2>

            <textarea name="texto" placeholder="Texto inicial da questão"></textarea>
            <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão">
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
                    foreach ($themes as $key => $value) { 
                ?>
                    
                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                <?php } ?>
            </select><span> *</span>

            <select name="vest" required>
                <option value="">Vestibular da Questão</option>
                <?php
                    foreach ($exams as $key => $value) { 
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
            <button type="submit" value="2"  name="action" form="form-disser">Adicionar</button>
        </div>

    </form>
</div>