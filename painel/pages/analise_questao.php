

<div class="box-content resolvendo-questoes">

    <?php  
    
        if(!empty($_POST["id_questao"]))
            $_SESSION["id_questao"] = $_POST["id_questao"];

        $id = $_SESSION["id_questao"];

        $consulta = "SELECT vestibular.`descricao` AS `vestibular`, questoes.`ano`, questoes.`especial`, questoes.`imagem`, sub_tema.`descricao` AS `subtema`, questoes.`enunciado`, questoes.`alternativa_a`, questoes.`alternativa_b`, questoes.`alternativa_c`, questoes.`alternativa_d`,questoes.`alternativa_e`, questoes.`alternativa_certa`, questoes.`explicacao`, questoes.`pergunta`, questoes.`id`, questoes.`tipo` FROM ((questoes join sub_tema) JOIN vestibular) WHERE questoes.`id_vestibular` = vestibular.`id` and questoes.`id_sub_tema` = sub_tema.`id` AND questoes.id = $id";

        $consulta2 = "SELECT * from resolucao where resolucao.id_questao = $id";
        $consulta3 = "SELECT * from resolucao where resolucao.id_questao = $id and resolucao.acertou = 's'";

        $questao = mysqli_query($conexao, $consulta);

        $total = mysqli_query($conexao, $consulta2);
        $acertos = mysqli_query($conexao, $consulta3);

        $total = mysqli_num_rows($total);
        $acertos = mysqli_num_rows($acertos);

        while($p = mysqli_fetch_array($questao)){

            $tipo = $p['tipo'];

            $vestibular = $p['vestibular'];
            $ano = $p['ano'];
            $sub_tema = $p['subtema'];

            $enunciado = $p['enunciado'];
            $imagem = $p['imagem'];
            $pergunta = $p['pergunta'];
            
            $alternativa_A = $p['alternativa_a'];
            $alternativa_B = $p['alternativa_b'];
            $alternativa_C = $p['alternativa_c'];
            $alternativa_D = $p['alternativa_d'];
            $alternativa_E = $p['alternativa_e'];

            $gabarito = $p['alternativa_certa'];
            $explicacao = $p['explicacao'];

            $areaquestoes = INCLUDE_PATH_PAINEL.'Exibir-Questoes';

            echo "<h1>Questão sobre $sub_tema</h1>";

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
                
                echo "<br><p class='right'><b>Acertos:</b> $acertos/$total</p>";
                echo "<p><b>Gabarito:</b> $gabarito</p>";

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

            }

            echo "<hr>";
            echo "<a href='$areaquestoes'>Voltar para a Área de Questões</a>";

        }
    
    ?>
</div>