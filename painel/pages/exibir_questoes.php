<?php
	$vests = Questao::selectExams();
	$temas = Questao::selectThemes();
	$materias = Adm::getSubject();

	$filtros = ["tema", "ano", "partenome", "vestibular", "qtd_quest", "materia"];

	foreach ($filtros as $campo) {
		
		if(!empty($_POST[$campo]))
			$_SESSION[$campo] = $_POST[$campo];
	}
	
	if(isset($_POST['btn-reset-filtro'])){

		foreach ($filtros as $campo) {
			$_SESSION[$campo] = "";
		}
	}

	Questao::filterQuestions($_SESSION['tema'], $_SESSION['ano'], $_SESSION['partenome'], $_SESSION['vestibular'], $_SESSION['materia']);	

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>

<div class="box-content area-de-questoes">

    <h1>Questões Cadastradas</h1><br>
    <form method="POST" action="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Questoes" id="form">
        <input type="text" name="partenome" id="pesquisar-input" placeholder="Pesquisar" maxlength="100">
        <select name="vestibular" id="vestibular-input" class="w25">
            <option value="">Vestibular</option>

            <?php
                foreach ($vests as $key => $vest) {
                    $nome = $vest["descricao"];
                    echo "<option value='$nome'>$nome</option>";
                }
            ?>
            <option value='UNICAMP'>UNICAMP Geral</option>
        </select>

        <select name='ano' id='ano-input' class='w25'>
            <option value=''>Ano</option>
            <?php
                $ano = date('Y');
                $ano++;

                while($ano > 1900){
                    echo "<option value='$ano'>$ano</option>";
                    $ano = $ano - 1;
                }
            ?>
        </select>

        <select name='materia' id='materia-input' class='w25'>
            <option value=''>Matéria</option>
            <?php
                foreach ($materias as $key => $materia) {
                    $nome = $materia["nome"];
                    echo "<option value='$nome'>$nome</option>";
                }
            ?>
        </select>

        <select name='qtd_quest' id='qtd_quest-input' class='w25'>
            <option value=''>Mostrar</option>
            <option value='4'>4 Questões</option>
            <option value='6'>6 Questões</option>
            <option value='10'>10 Questões</option>
            <option value='20'>20 Questões</option>
        </select>

        <select name='tema' id='tema-input'>
            <option value=''>Temas</option>
            <?php
                foreach ($temas as $key => $tema) {
                    $nome = $tema["descricao"];
                    echo "<option value='$nome'>$nome</option>";
                }
            ?>
        </select>

        <div class="buttons">
            <input type="submit" value="Filtrar" class="btn-filtrar">
        </div>
    </form>

    <form method="POST" action="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Questoes">
        <button type="submit" value="2" name="btn-reset-filtro">Remover Filtros</button>
    </form>

    <div class="clear"></div>
    <div class="resultados">
        
        <?php
            if (!empty($_SESSION['qtd_quest'])) 
                $total_reg = $_SESSION['qtd_quest'];
            else
                $total_reg = 4;

            if (!$pagina)
                $pc = 1;
            else
                $pc = $pagina;

            $inicio = $pc - 1;
            $inicio = $inicio * $total_reg;

            $resultadoFiltro = Questao::resultFilter($inicio, $total_reg);
            $totalResultadoFiltro = Questao::totalResultFilter();

            $tr = count($totalResultadoFiltro);

            echo "<p class='total_resultados right'>$tr resultados encontrados</p><div class='clear'></div>";

            $tp = $tr / $total_reg;

            if(count($resultadoFiltro) > 0){
                foreach ($resultadoFiltro as $key => $questao) {

                    $vestibular = $questao['vestibular'];
                    $ano = $questao['ano'];
                    $imagem = $questao['imagem'];
                    $enunciado = $questao['enunciado'];
                    $especial = $questao['especial'];
                    $pergunta = $questao['pergunta'];
                    $id = $questao['id'];
                            
                    echo "<strong>($vestibular $ano)</strong> $enunciado";
                    
                    if(!empty($imagem)){
                        echo "<br><br>";
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $imagem ).'"/>';
                        echo "<div class='clear'></div>";
                    }

                    if(!empty($especial))
                        echo "<br><br>$especial<br>";
                    if(!empty($pergunta))
                        echo "<br><b>$pergunta</b>";	

                    echo "<p><br><b><i>(...)</i></b></p>";

                    $resolucao = INCLUDE_PATH_PAINEL.'Analise-Questao';

                    echo "<form class='right entrar_questao' action='$resolucao' method='POST'><button type='submit' value='$id' class='btn-resolver-questao' name='id_questao'><b>Dados da questão <i class='fa fa-arrow-right' aria-hidden='true'></i></b></button></form><div class='clear'></div><hr>";
                }
                        
                $anterior = $pc - 1;
                $proximo = $pc + 1;	
                
                if($anterior > 1)
                    $anterior = INCLUDE_PATH_PAINEL.'Exibir-Questoes.'.$anterior;
                else
                    $anterior = INCLUDE_PATH_PAINEL.'Exibir-Questoes';
        
                $proximo = 	INCLUDE_PATH_PAINEL.'Exibir-Questoes.'.$proximo;
                $inicio = 	INCLUDE_PATH_PAINEL.'Exibir-Questoes';
        
                if ($pc > 1)
                    echo "<a href='$anterior' id='paginacao-anterior' class='left link'><i class='fa fa-arrow-left' aria-hidden='true'></i>Anterior</a><div class='clear'></div>";
                        
                if ($pc < $tp)
                    echo "<a href='$proximo' id='paginacao-proxima' class='right link'>Próxima <i class='fa fa-arrow-right' aria-hidden='true'></i></a><div class='clear'></div>";
            
                echo "<a href='$inicio' id='paginacao-inicio' class='link'>INÍCIO</a><div class='clear'></div>";
            }
        ?>

    </div>
    <div class="clear"></div>
</div>