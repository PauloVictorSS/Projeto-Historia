<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST["action"])){

        $nome = $_POST["nome"];
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
            $mail->setFrom("$email", "$nome");
            $mail->addAddress('testedemail.paulovictor@gmail.com');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Sugestão ou dúvida de '.$nome;
            $mail->Body    = "<br>Nome: $nome<br>Email: $email<br><br>$mens";
            $mail->AltBody = "$mens";

            $mail->send();
            echo "<div class='mensagem green'>E-mail enviado com sucesso</div>";
        } catch (Exception $e) {
            echo "<div class='mensagem red'>Erro ao enviar o e-mail, por favor tente mais tarde</div>";
        }
    }
?>