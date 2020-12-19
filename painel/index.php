<?php
    include_once("../config.php");

	if(isset($_GET['loggout'])){
		Painel::loggout();
    }
    
    if(!isset($_SESSION['id'])){
        header("Location:".INCLUDE_PATH);
    }

    $materia = $_SESSION['materia_prof'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>public/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/main.css" rel="stylesheet">

    <?php
        if(isset($_GET['url'])){

            $url = strtolower(str_replace("-", "_", $_GET['url']));

            //Separando a url de possíveis parâmetros
            $explode = explode(".", $url);

            if(file_exists('css/page_'.$explode[0].'.css'))
                echo'<link href="'.INCLUDE_PATH_PAINEL.'css/page_'.$explode[0].'.css" rel="stylesheet">';
        }else{
            echo'<link href="'.INCLUDE_PATH_PAINEL.'css/home.css" rel="stylesheet">';
        }
    ?>

</head>
<body>

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>"><img src="<?php echo INCLUDE_PATH; ?>public/images/logo.ico"></a></div>
                <div class="nome-usuario">
                    <p><b>Nível: </b><?php echo Adm::getOffice($_SESSION['type_admin']); ?></p>
                    <p><b>Nome: </b><?php echo $_SESSION['nome_admin']; ?></p>
                </div>
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="clear"></div>
            </div>
            <div class="box-links">
                <div class="itens">
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>">Home</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Relatorios">Exibir relatórios</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Questoes">Exibir questões</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Questao">Cadastrar questão</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Vestibular-Tema">Cadastrar vestibular / tema</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Excluir-Vestibular-Tema">Excluir vestibular / tema</a>
                </div>

                <?php if($_SESSION['type_admin'] == 2){ ?>

                    <div class="itens">
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Usuarios">Exibir usuários cadastrados</a>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm">Cadastrar administradores</a>
                    </div>

                <?php } ?>    
            </div>
            <div class="links">
                <a href="<?php echo INCLUDE_PATH ?>" class="loggout left"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout" class="loggout right">Sair <i class="fa fa-sign-out"></i></a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="center">
            <?php 
                
                if(isset($_GET['url'])){

                    //Verificando de há algum parâmetro na
                    if(count($explode) > 1)
                        $pagina =  $explode[1];
                    else
                        $pagina = 1;

                    if($explode[0] != 'Exibir-Questoes' or $explode[0] != 'Analise-Questao'){
                        $_SESSION['partenome'] = '';
                        $_SESSION['vestibular'] = '';
                        $_SESSION['ano'] = '';
                        $_SESSION['tema'] = '';
                        $_SESSION['materia'] = '';
                    }

                    if(file_exists("pages/".$explode[0].".php"))
                        include("pages/".$explode[0].".php");
                    else
                        include("pages/home.php");

                }else
                    include("pages/home.php");
            
            ?>
        </div>
    </section>

    <script src="<?php echo INCLUDE_PATH ?>public/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>