<?php

    $themes = Questao::selectThemes();
    $exams = Questao::selectExams();

    if(!empty($_POST["id_questao"]))
        $_SESSION["id_questao"] = $_POST["id_questao"];

    $id_questao = $_SESSION["id_questao"];

    $result = Questao::selectQuestion($id_questao);
    $questao = $result[0];

    $tipo = $questao['tipo'];

    $vestibular = $questao['vestibular'];
    $ano = $questao['ano'];
    $tema = $questao['subtema'];

    $enunciado = $questao['enunciado'];
    $imagem = $questao['imagem'];
    $pergunta = $questao['pergunta'];

    $alternativa_A = $questao['alternativa_a'];
    $alternativa_B = $questao['alternativa_b'];
    $alternativa_C = $questao['alternativa_c'];
    $alternativa_D = $questao['alternativa_d'];
    $alternativa_E = $questao['alternativa_e'];

    $gabarito = $questao['alternativa_certa'];
    $explicacao = $questao['explicacao'];

    $areaquestoes = INCLUDE_PATH_PAINEL.'Exibir-Questoes';

    if(isset($_POST["action"])){

        $tipo = $_POST["action"];

        if(!empty($_POST["texto"]))
            $novo_enunciado = str_replace("\n", "<br>", str_replace("'", "`", $_POST["texto"]));
        else
            $novo_enunciado = $enunciado;
        
        if(!empty($_POST["enunciado"]))
            $nova_pergunta = str_replace("'", "`", $_POST["enunciado"]);
        else
            $nova_pergunta = $pergunta;

        $imagem = $_FILES['image']['tmp_name'];
        $tamanho = $_FILES['image']['size'];
        $tipoImg = $_FILES['image']['type'];
        $nome = $_FILES['image']['name'];

        if(!empty($imagem)){
            $fp = fopen($imagem, "rb");
            $novo_conteudo = fread($fp, $tamanho);
            $novo_conteudo = addslashes($novo_conteudo);
        }
        else
            $novo_conteudo = $imagem;

        if(!empty($_POST["ano"]))
            $novo_ano = $_POST["ano"];
        else
            $novo_ano = $ano;

        if(!empty($_POST["tema"]))
            $novo_tema = $_POST["tema"];
        else
            $novo_tema = $questao["id_sub_tema"];

        if(!empty($_POST["vest"]))
            $novo_vest = $_POST["vest"];
        else
            $novo_vest = $questao["id_vestibular"];

        if(!empty($_POST["explic"]))
            $nova_explic = str_replace("'", "`", $_POST["explic"]);
        else
            $nova_explic = $explicacao;

        if($tipo == 1){

            if(!empty($_POST["alter_a"]))
                $nova_alter_a = str_replace("'", "`", $_POST["alter_a"]);
            else
                $nova_alter_a = $alternativa_A;
            
            if(!empty($_POST["alter_b"]))
                $nova_alter_b = str_replace("'", "`", $_POST["alter_b"]);
            else
                $nova_alter_b = $alternativa_B;

            if(!empty($_POST["alter_c"]))
                $nova_alter_c = str_replace("'", "`", $_POST["alter_c"]);
            else
                $nova_alter_c = $alternativa_C;

            if(!empty($_POST["alter_d"]))
                $nova_alter_d = str_replace("'", "`", $_POST["alter_d"]);
            else
                $nova_alter_d = $alternativa_D;

            if(!empty($_POST["alter_e"]))
                $nova_alter_e = str_replace("'", "`", $_POST["alter_e"]);
            else
                $nova_alter_e = $alternativa_E;

            if(!empty($_POST["gabarito"]))
                $novo_gabarito = $_POST["gabarito"];
            else
                $novo_gabarito = $gabarito;

            $result = Questao::alterQuestObj($novo_enunciado, $nova_pergunta, $nova_alter_a, $nova_alter_b, $nova_alter_c, $nova_alter_d, $nova_alter_e, $novo_gabarito, $nova_explic, $novo_tema, $novo_vest, $novo_ano, $novo_conteudo, $id_questao);

        }else{

            if(!empty($_POST["quest_a"]))
                $quest_a = str_replace("'", "`", $_POST["quest_a"]);
            else
                $quest_a = $alternativa_A;
            
            if(!empty($_POST["quest_b"]))
                $quest_b = str_replace("'", "`", $_POST["quest_b"]);
            else
                $quest_b = $alternativa_B;

            if(!empty($_POST["quest_c"]))
                $quest_c = str_replace("'", "`", $_POST["quest_c"]);
            else
                $quest_c = $alternativa_C;
            
            if(!empty($_POST["resp_a"]))
                $resp_a = str_replace("'", "`", $_POST["resp_a"]);
            else
                $resp_a = $alternativa_D;
            
            if(!empty($_POST["resp_b"]))
                $resp_b = str_replace("'", "`", $_POST["resp_b"]);
            else
                $resp_b = $alternativa_E;

            if(!empty($_POST["resp_c"]))
                $resp_c = str_replace("'", "`", $_POST["resp_c"]);
            else
                $resp_c = $gabarito;

            $result = Questao::alterQuestDissert($novo_enunciado, $nova_pergunta, $quest_a, $quest_b, $quest_c, $resp_a, $resp_b, $resp_c, $novo_tema, $novo_vest, $novo_ano, $novo_conteudo, $id_questao, $nova_explic);
        }

        if($result == 1){
            
            $_SESSION["result"] = $result; 
            header("Location: ".INCLUDE_PATH_PAINEL."Analise-Questao");
        }
        else
            echo "<div class='mensagem red'>Nenhum dado foi alterado, caso não seja o resultado esperado, contate-nos</div>";
    }

?>
<div class="box-content">

    <?php

        echo "<h1>Questão sobre $tema</h1>";

        echo "<hr>";

        echo "<p><b>($vestibular $ano)</b> $enunciado</p>";
                    
        if(!empty($imagem))
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $imagem ).'"/>';
                
        if(!empty($pergunta))
            echo "<p><b>$pergunta</b></p><br>";

        if($tipo == 1){
            
            echo "<p><b>A) </b> $alternativa_A</p><br>";
            echo "<p><b>B) </b> $alternativa_B</p><br>";
            echo "<p><b>C) </b> $alternativa_C</p><br>";
            echo "<p><b>D) </b> $alternativa_D</p><br>";
            if(!empty($alternativa_E)){
                echo "<p><b>E) </b> $alternativa_E</p><br>";	
            }
            
            $acertTotal = Questao::acertQuestion($id_questao, $tipo);
            $acertos = $acertTotal[0];
            $total = $acertTotal[1];

            echo "<br><p class='right'><b>Acertos:</b> $acertos/$total</p>";
            echo "<p><b>Gabarito:</b> $gabarito</p>";

    ?>
    <hr>
    <div class="alterar_quest">
        <h3>Alterar dados da questão</h3>
        <span class="aviso">** Caso não queira alterar alguma informação, deixe o campo em branco. Tenha certeza da informação a ser alterada e deixe o resto em branco ou sem selecionar caso não queira mudar **</span>
        <span class="aviso">** Caso a alternativa correta seja alterada, os dados e estatísticas de quem acertou ou errou até o momento NÃO mudaram, somente a partir da alteração **</span>

        <form enctype="multipart/form-data" action="<?php echo INCLUDE_PATH_PAINEL ?>Analise-Questao" method="POST" id="form-objet" class="yellow formulario">

            <div class="box-category">
                <h2>Corpo da questão</h2>

                <textarea name="texto" placeholder="Texto inicial da questão"></textarea>
                <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão">
            </div>

            <div class="box-category">
                <h2>Alternativas da questão</h2>

                <input type="text" name="alter_a" placeholder="Alternativa A">
                <input type="text" name="alter_b" placeholder="Alternativa B">
                <input type="text" name="alter_c" placeholder="Alternativa C">
                <input type="text" name="alter_d" placeholder="Alternativa D">
                <input type="text" name="alter_e" placeholder="Alternativa E">
            </div>

            <div class="box-category">
                <h2>Informações sobre a questão</h2>
                <select name="gabarito">
                    <option value="">Alternativa CORRETA</option>
                    <option value="A">Alternativa A</option>
                    <option value="B">Alternativa B</option>
                    <option value="C">Alternativa C</option>
                    <option value="D">Alternativa D</option>
                    <option value="E">Alternativa E</option>
                </select>

                <select name="tema">
                    <option value="">Tema da Questão</option>

                    <?php

                        foreach ($themes as $key => $tema)
                            if($tema['id_materia'] == $_SESSION['materia_prof'])
                                echo "<option value='".$tema["id"]."'>".$tema["descricao"]."</option>";
                    ?>

                </select>

                <select name="vest">
                    <option value="">Vestibular da Questão</option>
                    <?php
                        foreach ($exams as $key => $value) { 
                    ?>
                        
                        <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                    <?php } ?>
                </select>

                <input type="number" name="ano" placeholder="Ano da Questão">
            </div>

            <div class="box-category">
                <h2>Outras informações</h2>
                <input type="text" name="explic" placeholder="Explicação da questão">

                <label for="image">Entre com a imagem da questão:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                <input type="file" name="image">
            </div>

            <div class="buttons">
                <button type="submit" value="1"  name="action" form="form-objet">Alterar informações</button>
            </div>

        </form>

        <span class="aviso">** Caso não queira alterar alguma informação, deixe o campo em branco. Tenha certeza da informação a ser alterada e deixe o resto em branco ou sem selecionar caso não queira mudar **</span>
        <span class="aviso">** Caso a alternativa correta seja alterada, os dados e estatísticas de quem acertou ou errou até o momento NÃO mudaram, somente a partir da alteração **</span>
    </div>

    <?php
        }

        elseif($tipo == 2){

            if(!empty($alternativa_A))
                echo "<b>A) </b> $alternativa_A<br>";

            if(!empty($alternativa_B))
                echo "<b>B) </b> $alternativa_B<br>";

            if(!empty($alternativa_C))
                echo "<b>C) </b> $alternativa_C<br>";

            echo "<br><p><b>Respostas esperadas:</b></p><br>";
            if(!empty($alternativa_D))
                echo"<b>A)</b> $alternativa_D<br><br>";
        
            if(!empty($alternativa_E))
                echo"<b>B)</b> $alternativa_E<br><br>";
        
            if(!empty($gabarito))
                echo"<b>C)</b> $gabarito<br>";
    ?>

    <hr>
    <div class="alterar_quest">
        <h3>Alterar dados da questão</h3>
        <span class="aviso">** Caso não queira alterar alguma informação, deixe o campo em branco. Tenha certeza da informação a ser alterada e deixe o resto em branco ou sem selecionar caso não queira mudar **</span>

        <form enctype="multipart/form-data" action="<?php echo INCLUDE_PATH_PAINEL ?>Analise-Questao" method="POST" id="form-disser" class="red formulario">

            <div class="box-category">
                <h2>Corpo da questão</h2>

                <textarea name="texto" placeholder="Texto inicial da questão"></textarea>
                <input type="text" name="enunciado" placeholder="Comando/Pergunta da questão">
            </div>

            <div class="box-category">
                <h2>Itens e respostas da questão</h2>

                <input type="text" name="quest_a" placeholder="Item A">
                <input type="text" name="resp_a" placeholder="Resposta do item A"><br><br>

                <input type="text" name="quest_b" placeholder="Item B">
                <input type="text" name="resp_b" placeholder="Resposta do item B"><br><br>

                <input type="text" name="quest_c" placeholder="Item C" >
                <input type="text" name="resp_c" placeholder="Resposta do item C">
            </div>
            
            <div class="box-category">
                <h2>Informações sobre a questão</h2>

                <select name="tema">
                    <option value="">Tema da Questão</option>
                    <?php
                        foreach ($themes as $key => $value) { 
                            if($value[$id_materia] == $id_materia){
                    ?>
                        
                        <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                    <?php 
                            }
                        } 
                    ?>
                </select>

                <select name="vest">
                    <option value="">Vestibular da Questão</option>
                    <?php
                        foreach ($exams as $key => $value) { 
                    ?>
                        
                        <option value="<?php echo $value["id"]; ?>"><?php echo $value["descricao"]; ?></option>

                    <?php } ?>
                </select>

                <input type="number" name="ano" placeholder="Ano da Questão">
            </div>

            <div class="box-category">
                <h2>Outras informações</h2>
                <input type="text" name="explic" placeholder="Explicação da questão">

                <label for="image">Entre com a imagem da questão:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                <input type="file" name="image">
            </div>

            <div class="buttons">
                <button type="submit" value="2"  name="action" form="form-disser">Alterar informações</button>
            </div>

        </form>

        <span class="aviso">** Caso não queira alterar alguma informação, deixe o campo em branco. Tenha certeza da informação a ser alterada e deixe o resto em branco ou sem selecionar caso não queira mudar **</span>
    </div>

    <?php
        }
    ?>

    <hr>
    <a href='<?php echo $areaquestoes ?>' class='link'>Voltar para a Área de Questões</a>
</div>