<?php

    $id = $_SESSION['id_usuario'];

    $consulta_materia = "select * from materia";
    $result_materia = mysqli_query($conexao, $consulta_materia);

    while($materia = mysqli_fetch_array($result_materia)){

        $id_materia = $materia["id"];

        $consulta_tema = "select sub_tema.descricao, COUNT(questoes.id_sub_tema) as 'qtd' from resolucao, questoes, sub_tema where id_usuario = $id and resolucao.id_questao = questoes.id and questoes.id_sub_tema = sub_tema.id and resolucao.id_materia = $id_materia GROUP BY questoes.id_sub_tema";

        $result_tema = mysqli_query($conexao, $consulta_tema);

        if(mysqli_num_rows($result_tema) > 0){
            echo "<div class='temas_p_materia'><h3>".$materia['nome']."</h3>";

            while ($tema = mysqli_fetch_array($result_tema)){	

                echo "<p class='temas'><b>".$tema['descricao'].":</b> ".$tema['qtd']."</p>";

            }

            echo "</div>";
        }
    }

?>