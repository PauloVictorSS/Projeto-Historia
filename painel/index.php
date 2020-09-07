<?php
    include_once("../config.php");
    include_once("../include/start_conexao.php");
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/favicon.ico" type="image/x-icon">
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
                    <p><b>Nível: </b><?php echo Painel::pegaCargo($_SESSION['type_admin']); ?></p>
                    <p><b>Nome: </b><?php echo $_SESSION['nome_admin']; ?></p>
                </div>
            </div>
            <div class="box-links">
                <div class="itens">
                    <h2>Gestão</h2>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>">Home</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>relatorios">Exibir relatórios</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>exibirQuestoes">Exibir questões</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>exibirTemas">Exibir temas</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>exibirVestibulares">Exibir vestibulares</a>
                </div>
                <div class="itens">
                    <h2>Cadastrar</h2>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarQuestao">Cadastrar questão</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarVestibular">Cadastrar vestibular</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarTema">Cadastrar tema</a>
                </div>
                <div class="itens">
                    <h2>Administração do Painel</h2>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>painelCMS">Painel CMS</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarUsuario">Cadastrar usuário</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>exibirUsuarios">Exibir usuários</a>
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="center">
            <div class="menu-btn left">
                <i class="fa fa-bars"></i>
            </div>

            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout" class="loggout right"> <i class="fa fa-sign-out"></i> Sair</a>

            <div class="clear"></div>
        </div>
    </header>

    <section class="content">
        <?php Painel::carregaPagina(); ?>
    </section>

    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>