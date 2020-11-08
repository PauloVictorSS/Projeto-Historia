<?php
    if(isset($_POST["action"])){

        if($_POST["action"] == 0){
            $nome = $_POST["teste"];
            $login = $_POST["login"];
            $pass = $_POST["pass"];
            $conf_pass = $_POST["conf_pass"];

            $cont = 0;

            if($pass == $conf_pass){

                $adms = Adm::getAdms();

                foreach ($adms as $key => $value) {
                    
                    if($value["login"] == $login){
                        $cont = 1;
                        break;
                    }
                }

                if($cont == 0){
                    $result = Adm::addAdms($nome, $login, $pass);

                    if($result == 1)
                        echo "<div class='mensagem green'>Administrador cadastrado com sucesso</div>";
                    else
                        echo "<div class='mensagem red'>Algo deu errado no cadastro!</div>";
                }
                else
                    echo "<div class='mensagem red'>Já exsite um administrador com esse login, tente outro</div>";

            }
            else
                echo "<div class='mensagem red'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguais!</div>";
        }
        else{

            $result = Adm::deleteAdms($_POST["action"]);

            if($result == 1)
                echo "<div class='mensagem green'>Administrador deletado com sucesso</div>";
            else
                echo "<div class='mensagem red'>Algo deu errado na deleção!</div>";

        }
    }

    $adms = Adm::getAdms();

?>
<div class="box-content">
    <h1>Cadastrar um Sub Administrador</h1>
    <form action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm" method="POST" class="blue formulario" id="form-cadastrar">

        <div class="box-category">
            <h2>Administradores já cadastrados</h2>

            <table>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th></th>
                </tr>
            <?php
                foreach ($adms as $key => $value) { 
            ?>
                <tr>        
                    <td><?php echo $value["nome"]; ?></td>
                    <td><?php echo $value["login"]; ?></td>

                    <td>

                    <form action="<?php echo INCLUDE_PATH_PAINEL ?>Cadastrar-Adm" method="post" class="form_delete_adm">

                        <?php if($value["type"] != 2){ ?>
                            <button type="submit" class="right" value="<?php echo $value["id"]; ?>" name="action"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

            <input type="text" name="teste" placeholder="Nome" required>
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="pass" placeholder="Senha" required>
            <input type="password" name="conf_pass" placeholder="Confirmar a senha" required>

        </div>

        <div class="buttons">
            <p>* Preenchimento Obrigatório</p>
            <button type="submit" value="0"  name="action" form="form-cadastrar">Adicionar</button>
        </div>

    </form>
</div>