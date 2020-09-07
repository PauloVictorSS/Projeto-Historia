<?php

    if(!isset($_SESSION)) 
        session_start(); 
    
    date_default_timezone_set('America/Sao_Paulo');

    $autoload = function($class){
        include('class/'.$class.'.php');
    };
    spl_autoload_register($autoload);

    function clear($input) {
        global $conexao;

        $var = mysqli_escape_string($conexao, $input);

        $var = htmlspecialchars($var);

        return $var;
    }

    define("INCLUDE_PATH", "http://Localhost/GitHub/Projetos%20Pessoais/Projeto-Historia/");
    define("INCLUDE_PATH_PAINEL", INCLUDE_PATH."painel/");

    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "projeto_historia");

    
?>