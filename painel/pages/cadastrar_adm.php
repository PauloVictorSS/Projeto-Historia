<?php

    if(isset($_POST["cadastrar"])){

        $nome = $_POST["nome"];
        $id_materia = $_POST["materia"];

        $email = $_POST["email"];
        $conf_email = $_POST["conf_email"];

        $pass = $_POST["pass"];
        $conf_pass = $_POST["conf_pass"];
        
        $cont = 0;

        if($pass == $conf_pass and $email == $conf_email){

            $infs = User::checkEmail($email);

            $infsUser = $infs[0];
            $infsAdm = $infs[1];
               
            if(empty($infsUser) and empty($infsAdm)){

                $confirm = Adm::addAdms($nome, $email, $pass, $id_materia);

                if($confirm == 1)
                    echo "<div class='mensagem green'>Professor cadastrado com sucesso</div>";
                else
                    echo "<div class='mensagem red'>Algo deu errado no cadastro!</div>";
            }
            else
                echo "<div class='mensagem red'>Já existe um usuário com esse e-mail, tente outro</div>";
        }
        else{

            if($email != $conf_email)
                echo "<div class='mensagem red'>Os campos 'E-mail' e 'Confirmar E-mail' devem ser iguais</div>";
            if($pass != $conf_pass)
                echo "<div class='mensagem red'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguais</div>";
        }    
    }
    elseif(isset($_POST["prof"])){

        $result = Adm::deleteAdms($_POST["prof"]);

        if($result == 1)
            echo "<div class='mensagem green'>Administrador deletado com sucesso</div>";
        else
            echo "<div class='mensagem red'>Algo deu errado na deleção!</div>";
    }
    elseif(isset($_POST["button-materia"])){

        $result = Adm::addMateria($_POST["name_materia"]);

        if($result == 1)
            echo "<div class='mensagem green'>Inserção feita com sucesso!</div>";
        else
            echo "<div class='mensagem red'>Algo na inserção deu errado!</div>";
    }

    $adms = Adm::getAdms();
    $materias = Adm::getSubject();

?>
<div class="box-content">
    <h1>Cadastrar uma matéria</h1>
    <form action="<?php echo INCLUDE_PATH_PAINEL?>Cadastrar-Adm" method="POST" id="form-materia" class="yellow formulario">

        <h2>Matérias já cadastradas</h2>
        <div class="box-category">
            <?php  foreach ($materias as $key => $value) {  ?>
                    
                <p><?php echo $value["nome"]; ?></p>

            <?php } ?> 
        </div>
        <div class="box-category">
            <h2>Cadastrar uma matéria</h2>

            <input type="text" name="name_materia" placeholder="Nome da matéria" maxlength="20" required>

        </div>
        <div class="buttons">
            <p>* Preenchimento Obrigatório<br>*Não utilizar nenhum caracter especial (@, º, ª)</p>
            <button type="submit" value="0"  name="button-materia" form="form-materia">Adicionar</button>
        </div>

    </form><br><br>
    <h1>Cadastrar um Professor</h1>
    <form action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm" method="POST" class="blue formulario" id="form-cadastrar">

        <div class="box-category">
            <h2>Professores já cadastrados</h2>

            <table>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Matéria</th>
                    <th></th>
                </tr>
            <?php
                foreach ($adms as $key => $value) { 
            ?>
                <tr>        
                    <td><?php echo $value["nome"]; ?></td>
                    <td><?php echo $value["email"]; ?></td>
                    <td><?php echo $value["materia"]; ?></td>

                    <td>

                    <form action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm" method="post" class="form_delete_adm" id="form_delete_adm">

                        <?php if($value["type"] != 2){ ?>
                            <button type="submit" class="right" value="<?php echo $value["id"]; ?>" name="prof" form="form_delete_adm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <div class="clear"></div>
                        <?php } ?>

                    </form>

                    </td>
                </tr>   

            <?php } ?>

            </table>
        </div>

        <div class="box-category">
            <h2>Cadastrar um Sub Administrador</h2>

            <input type="text" name="nome" placeholder="Nome" maxlength="50" required>
            <input type="email" name="email" placeholder="E-mail" maxlength="100" required>
            <input type="email" name="conf_email" placeholder="Confirme o E-mail" maxlength="100" required>
            <input type="password" name="pass" placeholder="Senha" maxlength="16" required>
            <input type="password" name="conf_pass" placeholder="Confirme a senha" maxlength="16" required>
            <select name="materia" required>
                <?php

                    foreach ($materias as $materia) {
                        echo"<option value='".$materia['id']."'>".$materia['nome']."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="0"  name="cadastrar" form="form-cadastrar">Adicionar</button>
        </div>
    </form>
</div>