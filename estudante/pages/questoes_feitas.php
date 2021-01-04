<div class="box-content">
    <h2>Quantidade de questões feitas p/ tema</h2>
    <div class="dados-questoes">
        
        <?php  

            $materias = Adm::getSubject();

            foreach ($materias as $key => $materia) {
                
                $result = User::resolvedQuestionTheme($materia['id'], $_SESSION['id_usuario']);

                if(count($result) > 0){

                    echo "<div class='temas_p_materia'><h3>".$materia['nome']."</h3>";

                    foreach ($result as $key => $tema) 
                        echo "<p class='temas'><b>".$tema['descricao'].":</b> ".$tema['qtd']."</p>";
                    
                    echo "</div>";
                }
            }
        ?>
        <a href="<?php echo INCLUDE_PATH;?>area_de_questoes" class="link"><h3>Ir resolver mais questões!</h3></a>
    </div>
    <div class="clear"></div>
</div>    