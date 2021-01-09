<?php 
    include_once("../config.php");
    
	if(!isset($_SESSION['status_login']))
        header("Location:".INCLUDE_PATH);
        
    if(isset($_GET['loggout'])){
        header("Location:".INCLUDE_PATH."php/deslogar.php");
    }

    $user = User::getUserInfs($_SESSION["id_usuario"]);
?>

<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <title>Projeto de Historia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website">
    <meta name="keywords" content="palavras-chave, do meu, site">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>public/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_ESTUDANTE; ?>css/main.css" rel="stylesheet">

    <?php

        //Recuperando a url selecionada
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        //Separando a url de possíveis parâmetros
        $explode = explode("-", $url);

        //Importar o CSS da página caso exista
        if(file_exists('css/page_'.$explode[0].'.css'))
            echo'<link href="'.INCLUDE_PATH_ESTUDANTE.'css/page_'.$explode[0].'.css" rel="stylesheet">';
    ?>
</head>
<body>

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>"><img src="<?php echo INCLUDE_PATH; ?>public/images/logo.ico"></a></div>
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="clear"></div>
            </div>
            <div class="box-links">
                <div class="itens">
                    <a href="<?php echo INCLUDE_PATH_ESTUDANTE ?>">Home</a>
                    <a href="<?php echo INCLUDE_PATH_ESTUDANTE ?>questoes_feitas">Questões resolvidas</a>
                    <a href="<?php echo INCLUDE_PATH_ESTUDANTE ?>alterar_dados">Alterar dados pessoais</a>
                </div>  
            </div>
            <div class="links">
                <a href="<?php echo INCLUDE_PATH ?>" class="loggout left"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                <a href="<?php echo INCLUDE_PATH_ESTUDANTE ?>?loggout" class="loggout right">Sair <i class="fa fa-sign-out"></i></a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <section class="content">

        <?php

            //Verificando de há algum parâmetro na
            if(count($explode) > 1)
                $pagina =  $explode[1];
            else
                $pagina = 1;

            //Verificando se a url escolhida existe
            if(file_exists('pages/'.$explode[0].'.php'))
                include_once('pages/'.$explode[0].'.php');
            else
                header("Location: ".INCLUDE_PATH."pages/erro404.php");
        ?>
    </section>

    <script src="<?php echo INCLUDE_PATH ?>public/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>