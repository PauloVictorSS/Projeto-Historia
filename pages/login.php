<?php 
    include_once("../config.php");
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

            <?php  

                if(!empty($_POST['submit'])){

                    $infs = User::login($_POST['e-mail'], $_POST['senha']);

                    $infsUser = $infs[0];
                    $infsAdm = $infs[1];

                    if(!empty($infsUser) or !empty($infsAdm)){

                        if(!empty($infsUser) and empty($infsAdm)){

                            $_SESSION['status_login'] = 1;

                            foreach ($infsUser as $key => $aluno){

                                $_SESSION['id_usuario'] = $aluno['id'];

                                $url = INCLUDE_PATH.'pages/area_do_usuario.php';
                                header("location: $url");
                            }
                        }
                        elseif(empty($infsUser) and !empty($infsAdm)){

                            $_SESSION['status_login'] = 2;

                            foreach ($infsAdm as $key => $prof){

                                $_SESSION['type_admin'] = $prof['type'];
                                $_SESSION['nome_admin'] = $prof['nome'];
                                $_SESSION['materia_prof'] = $prof['id_materia'];
                                $_SESSION['id'] = $prof['id'];

                                header("location: ".INCLUDE_PATH_PAINEL);
                            }
                        }
                    }
                    else
                        echo "<p>E-mail ou Senha incorretos!</p>";
                }
            ?>

            <form method="POST" action="<?php echo INCLUDE_PATH; ?>pages/login.php">
                <h1>Fazer login</h1>
                <input type="e-mail" name="e-mail" id="e-mail" class="informacoes" placeholder="E-mail" required>
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