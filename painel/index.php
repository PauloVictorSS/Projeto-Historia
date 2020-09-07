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
                    <p><?php echo $_SESSION['nome_admin']; ?></p>
                    <p><?php echo Painel::pegaCargo($_SESSION['type_admin']); ?></p>
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

    </section>

    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>