<?php

    $id_usuario = $_SESSION['id_usuario'];
    $id_questao = $_SESSION["id_questao"];
    $resp_dada = $resposta;
    
    $sql = "select * from resolucao where id_usuario = $id_usuario and id_questao = $id_questao";
    $sql2 = "select id_materia from questoes where id = $id_questao";

    $result = mysqli_query($conexao, $sql);
    $result2 = mysqli_query($conexao, $sql2);

    $materia = mysqli_fetch_array($result2);

    if(mysqli_num_rows($result) < 1){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		$data = date('d-m-Y');
		$hora = date('H:i');
        $id_materia = $materia[0];

        $sql3 = "insert into resolucao (id_usuario, id_questao, resp_escolh, acertou, data_envio, hora_envio, id_materia) values ($id_usuario, $id_questao, '$resp_dada', '$acertou', '$data', '$hora', $id_materia)";

        $result = mysqli_query($conexao, $sql3);

        if(mysqli_affected_rows($conexao) != 1){
            echo "<script>alert('Erro ao salvar o seu progresso, contate-nos para falar o que houve')</script>";
        }

    }

?>