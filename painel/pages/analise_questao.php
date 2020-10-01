

<div class="box-content resolvendo-questoes">

    <?php  
    
        if(!empty($_POST["id_questao"]))
            $_SESSION["id_questao"] = $_POST["id_questao"];

        $id = $_SESSION["id_questao"];

        $consulta = "SELECT * FROM `questoes_filtro` where questoes_filtro.id = $id group by questoes_filtro.id";

        $questao = mysqli_query($conexao, $consulta);

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
                
                echo "<br><p><b>Gabarito:</b> $gabarito</p><br>";

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