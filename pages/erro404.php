<?php 
    include_once("../config.php");
?>

<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <title>Projeto de Historia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <meta name="description" content="Descrição do meu website">
    <meta name="keywords" content="palavbra-chave, do meu, site">
    <link href="../public/css/main.css" rel="stylesheet">
    <link href="../public/css/page_erro404.css" rel="stylesheet">
    
</head>
<body>
    <section class="erro404">
        <div class="center">

            <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ERRO 404<br><br>Ops! Página não encontrada</h1>
            <p><a href="<?php echo INCLUDE_PATH; ?>" class="link">Voltar para a Página Inical</a></p>

        </div>
    </section>
</body>
</html>