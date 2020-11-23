<?php

    $id = $_SESSION['id_usuario'];

    $consulta = "select sub_tema.descricao, COUNT(questoes.id_sub_tema) as 'qtd' from resolucao, questoes, sub_tema where id_usuario = $id and resolucao.id_questao = questoes.id and questoes.id_sub_tema = sub_tema.id GROUP BY questoes.id_sub_tema";

    $result = mysqli_query($conexao, $consulta);

    while ($n = mysqli_fetch_array($result)){	
        
        echo "<p class='temas'><b>".$n['descricao'].":</b> ".$n['qtd']."</p>";

    }

?>