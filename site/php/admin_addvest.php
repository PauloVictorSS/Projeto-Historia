<?php

    include "conexao_session.php";
    include "clear.php";

    if(!empty($_POST['vestibular'])){

        $vestibular = clear($_POST['vestibular']);

        $insert = "insert into vestibular (descricao) values ('$vestibular')";

        $result = mysqli_query($conexao, $insert);

        echo "<br><div id='div_sucesso'><br><p>Cadastro feito com sucesso</p><br></div>";

    }

?>