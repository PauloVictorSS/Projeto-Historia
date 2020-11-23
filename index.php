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
    <meta name="keywords" content="palavras-chave, do meu, site">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>public/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/menu_rodape.css" rel="stylesheet">

    <?php

        //Recuperando a url selecionada
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        //Separando a url de possíveis parâmetros
        $explode = explode("-", $url);

        //Importar o CSS da página caso exista
        if(file_exists('public/css/page_'.$explode[0].'.css'))
            echo'<link href="'.INCLUDE_PATH.'public/css/page_'.$explode[0].'.css" rel="stylesheet">';

    ?>

</head>
<body>

    <header>
        <div class="center">
            <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>"><img src="public/images/logo.ico"></a></div>
            <nav class="desktop">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>area_de_questoes">Área de Questões</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#footer">Contato</a></li>

                    <?php
                        if(!isset($_SESSION['status_login'])){
                    ?>
                        <li><a href="<?php echo INCLUDE_PATH; ?>pages/login.php">Entrar</a></li>
                    <?php
                        }
                        elseif($_SESSION['status_login'] == 1){
                    ?>
                        <li><a href="<?php echo INCLUDE_PATH; ?>pages/area_do_usuario.php">Área do Usuário</a></li>
                    <?php
                        }
                        else{
                    ?>
                        <li><a href="<?php echo INCLUDE_PATH_PAINEL; ?>">Área do Professor</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            <nav class="mobile">
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>area_de_questoes">Área de Questões</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#footer">Contato</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>pages/login.php">Entrar</a></li>
                </ul>
            </nav>
        </div>
        <div class="clear"></div>
    </header>

    <?php

        //Verificando de há algum parâmetro na
        if(count($explode) > 1)
            $pagina =  $explode[1];
        else
            $pagina = 1;
        
        if($explode[0] != 'area_de_questoes' and $explode[0] != 'resolucao_de_questoes'){
            $_SESSION['partenome'] = '';
            $_SESSION['vestibular'] = '';
            $_SESSION['ano'] = '';
            $_SESSION['tema'] = '';
        }
    
        //Verificando se a url escolhida existe
        if(file_exists('pages/'.$explode[0].'.php'))
            include_once('pages/'.$explode[0].'.php');
        else
            header("Location: pages/erro404.php");
        
    ?>

    <footer id="footer">
        <div class="center">
            <div class="palavras_chaves">
                <p>Ensino</p><div class="bola"></div>
                <p>IFSP</p><div class="bola"></div>
                <p>Vestibulares</p><div class="bola"></div>
                <p>Resolução de exercícios</p>
            </div>
            <div class="contato right">
				<form action="#footer" method="POST">
                    <p class="right">Entre em contato conosco</p>
                    <div class="clear"></div>
					<input type="text" name="email" placeholder="E-mail" required>
					<textarea name="sugestao" placeholder="Escreva sua mensagem" required></textarea><br>
                    <button name="contato" value="1" type="submit" class="right">Enviar</button>
                    <div class="clear"></div>
                </form>
            </div> 
            <div class="texto left">
                <p>Desenvolvido por: <a href="#">Paulo Victor</a></p><br>
                <p>© Copyright 2020-2021</p><p>Todos os direitos reservados</p>
                <?php include "php/enviar_email.php";  ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </footer>

    <?php 	include_once("include/close_conexao.php");  ?>

    <script src="<?php echo INCLUDE_PATH; ?>public/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>public/js/scripts.js"></script>

</body>
</html>