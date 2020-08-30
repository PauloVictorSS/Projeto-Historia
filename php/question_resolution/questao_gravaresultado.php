<?php

    $id_usuario = $_SESSION['id_usuario'];
    $id_questao = $_SESSION["id_questao"];
    $resp_dada = $resposta;
    
    $sql = "select * from resolucao where id_usuario = $id_usuario and id_questao = $id_questao";

    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) < 1){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		$data = date('d-m-Y');
		$hora = date('H:i');

        $sql = "insert into resolucao (id_usuario, id_questao, resp_escolh, acertou, data_envio, hora_envio) values ($id_usuario, $id_questao, '$resp_dada', '$acertou', '$data', '$hora')";

        $result = mysqli_query($conexao, $sql);

        if(mysqli_affected_rows($conexao) != 1){
            echo "<script>alert('Erro ao salvar o seu progresso, contate-nos para falar o que houve')</script>";
        }

    }

?>