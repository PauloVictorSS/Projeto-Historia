<?php

    include "conexao_session.php";
    include "clear.php";

    if(!empty($_POST['vestibular'])){

        $vestibular = clear($_POST['vestibular']);
        
    }

?>