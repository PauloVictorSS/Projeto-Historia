<?php 
    include_once("../config.php");
    include_once("../include/start_conexao.php");
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>css/login.css" rel="stylesheet">
</head>
<body>
    <section class="login">
        <div class="box">

            <?php  include_once("../php/user/usuario_logando.php");  ?>

            <form method="POST" action="<?php echo INCLUDE_PATH; ?>pages/login.php">
                <h1>Fazer login</h1>
                <input type="text" name="login" class="informacoes" maxlength="20" placeholder="Usuário" required>
                <input type="password" name="senha" class="informacoes" maxlength="15" placeholder="Senha" required>

                <br><br>
                <a href="<?php echo INCLUDE_PATH; ?>pages/cadastrar.php">Não fez o cadastro ainda?</a>
                <a href="<?php echo INCLUDE_PATH; ?>">Voltar para a home</a>

                <div class="buttons">
                    <input type="reset" value="Apagar" class="btn-apagar">
                    <input type="submit" value="Entrar" class="btn-login">
                </div>
            </form>
        </div>
    </section>
</body>
</html>