<?php 
    include_once("config.php");
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
                        <li><a href="<?php echo INCLUDE_PATH_ESTUDANTE; ?>">Área do Usuário</a></li>
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
            $_SESSION['materia'] = '';
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
					<input type="text" name="email" placeholder="E-mail" maxlength="100" required>
					<textarea name="sugestao" placeholder="Escreva sua mensagem" required></textarea><br>
                    <button name="contato" value="1" type="submit" class="right">Enviar</button>
                    <div class="clear"></div>
                </form>
            </div> 
            <div class="texto left">
                <p>Desenvolvido por: <a href="#" class="link">Paulo Victor</a></p><br>

                <?php 
                    // Import PHPMailer classes into the global namespace
                    // These must be at the top of your script, not inside a function

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\SMTP;
                    use PHPMailer\PHPMailer\Exception;

                    // Load Composer's autoloader
                    require 'vendor/autoload.php';

                    if(isset($_POST["contato"])){

                        $email = $_POST["email"];
                        $mens = str_replace("\n", "<br>",$_POST["sugestao"]);

                        // Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {

                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            //Server settings
                            //$mail->SMTPDebug = 3;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'paulovictorsantos0@gmail.com';                     // SMTP username
                            $mail->Password   = 'zcnnckhjposdwziy';                               // SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom("$email");
                            $mail->addAddress('paulovictorsantos0@gmail.com');

                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Sugestão ou dúvida de '.$email;
                            $mail->Body    = "<br>Email: $email<br><hr><br>$mens";
                            $mail->AltBody = "$mens";

                            $mail->send();
                            echo "<br><p id='confirm_email'>E-mail enviado com sucesso</p>";
                        } catch (Exception $e) {
                            echo "<br><p id='negate_email'>Erro ao enviar o e-mail, por favor tente mais tarde</p>";
                        }
                    }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </footer>

    <script src="<?php echo INCLUDE_PATH; ?>public/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>public/js/scripts.js"></script>

</body>
</html>