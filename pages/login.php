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
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>public/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/main.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>public/css/login.css" rel="stylesheet">
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
                <a href="<?php echo INCLUDE_PATH; ?>cadastrar" class="link">Não fez o cadastro ainda?</a>
                <a href="<?php echo INCLUDE_PATH; ?>" class="link">Voltar para a home</a>

                <button type="submit" name="submit" value="Entrar">Entrar</button>
            </form>
        </div>
    </section>
</body>
</html>