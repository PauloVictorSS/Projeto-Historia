<?php

	$conexao = mysqli_connect("localhost", "root", "", "projeto_historia");
	if (!mysqli_set_charset($conexao, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
        exit();
    }

?>