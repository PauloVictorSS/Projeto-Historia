<?php
    include_once("../config.php");
    include_once("../include/start_conexao.php");

	if(isset($_GET['loggout'])){
		Painel::loggout();
    }
    
    if(!isset($_SESSION['login_admin'])){
        header("Location:".INCLUDE_PATH);
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>public/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>css/main.css" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
</head>
<body>

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div>
                <div class="nome-usuario">
                    <p><b>Nível: </b><?php echo Adm::getOffice($_SESSION['type_admin']); ?></p>
                    <p><b>Nome: </b><?php echo $_SESSION['nome_admin']; ?></p>
                </div>
            </div>
            <div class="box-links">
                <div class="itens">
                    <h2>Gestão</h2>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>">Home</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Relatorios">Exibir relatórios</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Questoes">Exibir questões</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Exibir-Usuarios">Exibir usuários cadastrados</a>
                </div>
                <div class="itens">
                    <h2>Cadastrar e Excluir</h2>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Questao">Cadastrar questão</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Vestibular-Tema">Cadastrar vestibular / tema</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>Excluir-Vestibular-Tema">Excluir vestibular / tema</a>
                </div>

                <?php if($_SESSION['type_admin'] == 2){ ?>

                    <div class="itens">
                        <h2>Administração do Painel</h2>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm">Cadastrar administradores</a>
                    </div>

                <?php } ?>    
            </div>
        </div>
    </div>

    <header>
        <div class="menu-btn left">
            <i class="fa fa-bars"></i>
        </div>

        <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout" class="loggout right"> <i class="fa fa-sign-out"></i> Sair</a>

        <div class="clear"></div>
    </header>

    <section class="content">
        <div class="center">
            <?php 
                
                if(isset($_GET['url'])){

                    $url = strtolower(str_replace("-", "_", $_GET['url']));

                    //Separando a url de possíveis parâmetros
                    $explode = explode(".", $url);

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
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>public/js/main.js"></script>
</body>
</html>