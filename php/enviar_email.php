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
            echo "<br><p style='color:#59d859;'>E-mail enviado com sucesso</p>";
        } catch (Exception $e) {
            echo "<br><p style='color:#ce3232;'>Erro ao enviar o e-mail, por favor tente mais tarde</p>";
        }
    }
?>