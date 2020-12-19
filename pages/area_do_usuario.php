<?php 
    include_once("../config.php");
    
	if(!isset($_SESSION['status_login']))
		header("Location:".INCLUDE_PATH);
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
    <link href="<?php echo INCLUDE_PATH; ?>public/css/page_area_do_usuario.css" rel="stylesheet">

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

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>"><img src="<?php echo INCLUDE_PATH; ?>public/images/logo.ico"></a></div>
                <h2>Dados Pessoais:</h2>
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="clear"></div>
            </div>
            <div class="box-links">
                <table class="dados-pessoais">

                    <?php  
    
                        $user = User::getUserInfs($_SESSION["id_usuario"]);

                        echo "<p><b>Nome:</b><br>".$user[0][0]."</p><br>";
                        echo "<p><b>E-mail:</b><br>".$user[0][1]."</p><br>";
                        echo "<p><b>Data de Nascimento:</b><br>".$user[0][2]."</p><br>";
                        echo "<p><b>Rede:</b><br>".$user[0][3]."</p><br>";
                        echo "<p><b>Escolariedade:</b><br>".$user[0][4]."</p>";
                    ?>
                </table>
            </div>
            <div class="links">
                <a href="<?php echo INCLUDE_PATH ?>" class="left link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                <a href="../php/deslogar.php" id="sair" class="right link">Deslogar <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="box-content">
            <div class="center">
                <section>
                    <h2>Quantidade de questões feitas p/ tema</h2>
                    <div class="dados-questoes">
                        
                        <?php  

                            $materias = Adm::getSubject();

                            foreach ($materias as $key => $materia) {
                                
                                $result = User::resolvedQuestionTheme($materia['id'], $_SESSION['id_usuario']);

                                if(count($result) > 0){

                                    echo "<div class='temas_p_materia'><h3>".$materia['nome']."</h3>";

                                    foreach ($result as $key => $tema) 
                                        echo "<p class='temas'><b>".$tema['descricao'].":</b> ".$tema['qtd']."</p>";
                                    
                                    echo "</div>";
                                }
                            }
                        ?>
                        <br><br>
                        <a href="<?php echo INCLUDE_PATH;?>area_de_questoes" class="link"><h3>Ir resolver mais questões!</h3></a>
                    </div>
                    <div class="clear"></div>
                </section>
            </div>
        </div>
    </section>

    <script src="<?php echo INCLUDE_PATH ?>public/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>