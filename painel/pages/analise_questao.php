<div class="box-content">

    <?php
        if(!empty($_POST["id_questao"]))
            $_SESSION["id_questao"] = $_POST["id_questao"];

        $id_questao = $_SESSION["id_questao"];

        $result = Questao::selectQuestion($id_questao);
		$questao = $result[0];

        $tipo = $questao['tipo'];

        $vestibular = $questao['vestibular'];
        $ano = $questao['ano'];
        $sub_tema = $questao['subtema'];

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
            
            $acertTotal = Questao::acertQuestion($id_questao, $tipo);
            $acertos = $acertTotal[0];
            $total = $acertTotal[1];

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
        echo "<a href='$areaquestoes' class='link'>Voltar para a Área de Questões</a>";
    ?>

</div>