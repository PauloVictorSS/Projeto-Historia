<div class="box-content area-de-questoes">

    <h1>Questões Cadastradas</h1><br>
    <form method="POST" action="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Questoes" id="form">
        <input type="text" name="partenome" id="pesquisar-input" placeholder="Pesquisar" maxlength="100">
        <select name="vestibular" id="vestibular-input" class="w33">
            <option value="">Vestibular</option>

            <?php include_once("../php/question_area/formulario_filtro.php"); ?>

        <div class="buttons">
            <input type="submit" value="Filtrar" class="btn-filtrar">
        </div>
    </form>

    <form method="POST" action="../php/question_area/reset_filtro.php">
        <button type="submit" value="2" name="btn-reset-filtro">Remover Filtros</button>
    </form>

    <div class="clear"></div>
    <div class="resultados">
        
        <?php   include_once("../php/question_area/filtrando.php");   ?>
        <?php 	include_once("../php/question_area/resultado_questoes.php");	?>

        <?php
        
            if($anterior > 1)
                $anterior = INCLUDE_PATH_PAINEL.'Exibir-Questoes.'.$anterior;
            else
                $anterior = INCLUDE_PATH_PAINEL.'Exibir-Questoes';
    
            $proximo = 	INCLUDE_PATH_PAINEL.'Exibir-Questoes.'.$proximo;
            $inicio = 	INCLUDE_PATH_PAINEL.'Exibir-Questoes';
    
            if ($pc > 1)
                echo "<a href='$anterior' id='paginacao-anterior' class='left'><i class='fa fa-arrow-left' aria-hidden='true'></i>Anterior</a><div class='clear'></div>";
                    
            if ($pc < $tp)
                echo "<a href='$proximo' id='paginacao-proxima' class='right'>Próxima <i class='fa fa-arrow-right' aria-hidden='true'></i></a><div class='clear'></div>";
    
            echo "<a href='$inicio' id='paginacao-inicio'>INÍCIO</a><div class='clear'></div>";
        
        ?>
    </div>
    <div class="clear"></div>

</div>