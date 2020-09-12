<?php 
    include_once("config.php");
    include_once("include/start_conexao.php");
    
    Site::updateOnlineUsers();
    Site::counter();
?>

<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <title>Projeto de Historia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website">
    <meta name="keywords" content="palavbra-chave, do meu, site">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet">
</head>
<body>

    <header>
        <div class="center">
            <div class="logo left"><a href="<?php echo INCLUDE_PATH; ?>"><img src="images/logo.ico"></a></div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>area-de-questoes">Área de Questões</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>login">Área do Usuário</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Entrar em Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>area-de-questoes">Área de Questões</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>login">Área do Usuário</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Entrar em Contato</a></li>
                </ul>
            </nav>
        </div>
        <div class="clear"></div>
    </header>

    <?php

        //Recuperando a url selecionada
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        //Separando a url de possíveis parâmetros
        $explode = explode("_", $url);

        //Verificando de há algum parâmetro na
        if(count($explode) > 1)
            $pagina =  $explode[1];
        else
            $pagina = 1;
        
        if($explode[0] != 'area-de-questoes'){
            $_SESSION['partenome'] = '';
            $_SESSION['vestibular'] = '';
            $_SESSION['ano'] = '';
            $_SESSION['tema'] = '';
        }
    
        //Verificando se a url escolhida existe
        if(file_exists('pages/'.$explode[0].'.php'))
            include_once('pages/'.$explode[0].'.php');

        else if(file_exists('pages/admin/'.$explode[0].'.php'))
            include_once('pages/admin/'.$explode[0].'.php');

        else if(file_exists('pages/question_area/'.$explode[0].'.php'))
            include_once('pages/question_area/'.$explode[0].'.php');

        else if(file_exists('pages/user/'.$explode[0].'.php'))
            include_once('pages/user/'.$explode[0].'.php'); 
        else
            header("Location: pages/erro404.php");

        
    ?>

    <footer>
        <div class="center">
            <p>© Copyright 2020<br>Todos os Direitos Reservados<br></p>
        </div>
    </footer>

    <?php 	include_once("include/close_conexao.php");?>

    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

</body>
</html>