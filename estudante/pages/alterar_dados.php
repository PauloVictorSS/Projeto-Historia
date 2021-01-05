<div class="box-content">

    <?php

        $redes = User::selectTypeNetwork();
        $escolaridades = User::selectSchooling();

        $ano_max = date('Y') - 7;

        if(isset($_POST["submit"]))
            if(!empty($_POST["nome"]) or !empty($_POST["aniver"]) or !empty($_POST["escolar"]) or !empty($_POST["rede"])){

                if(!empty($_POST["nome"]))
                    $nome = $_POST["nome"];
                else
                    $nome = $user[0][0];

                if(!empty($_POST["aniver"]))
                    $aniver = $_POST["aniver"];
                else
                    $aniver = $user[0][2];

                if(!empty($_POST["rede"]))
                    $rede = $_POST["rede"];
                else
                    $rede = $user[0][5];

                if(!empty($_POST["escolar"]))
                    $escolar = $_POST["escolar"];
                else
                    $escolar = $user[0][6];

                $result = User::changePersonalData($nome, $aniver, $escolar, $rede);
                
                if($result == 1){

                    echo"<div class='mensagem green'>Dados alterados com sucesso! Novos dados:";

                    if(!empty($_POST["nome"]))
                        echo "<br>Nome: ".$_POST["nome"];

                    if(!empty($_POST["aniver"])){
                        $data_aniverario = new DateTime($_POST["aniver"]);
                        echo "<br>Data de aniversário: ".$data_aniverario->format("d/m/Y");
                    }

                    if(!empty($_POST["rede"]))
                        echo "<br>Rede escolar: ".$_POST["rede"];

                    if(!empty($_POST["escolar"]))
                        echo "<br>Escolaridade: ".$_POST["escolar"];

                    echo"</div>";
                }
                else
                    echo "<div class='mensagem green'>Nenhum dado foi alterado</div>";
            }
    ?>
    <h1>Alterar informações pessoais</h1>
    <span class="aviso">** Caso não queira alterar algum valor, deixe-o em branco **</span>

    <form action="<?php echo INCLUDE_PATH_ESTUDANTE; ?>alterar_dados" method="POST">

        <div class="text-box">
            <label for="nome">Novo nome</label><span> *</span>
            <input type="text" name="nome" id="nome" class="informacoes" placeholder="Nome" maxlength="50">
        </div>
        <div class="text-box">
            <label for="nasc">Nova data de nascimento</label><span> *</span>
            <input type="date" name="aniver" id="nasc" class="informacoes" max="<?php echo $ano_max."-".date('m')."-".date('d') ?>">
        </div>
        <div class="text-box">
            <label for="escolar">Nova escolaridade</label><span> *</span>
            <select id="escolar" name="escolar">
                <option value="">Escolaridade</option>
                <?php  

                    foreach ($escolaridades as $key => $escolaridade)
                        echo"<option value='".$escolaridade['id']."'>".$escolaridade['descricao']."</option>";
                ?>
            </select>
        </div>
        <div class="text-box">
            <label for="rede">Nova rede da sua escola</label><span> *</span>
            <select id="rede" name="rede">
                <option value="">Rede</option>
                <?php  

                    foreach ($redes as $key => $rede)
                        echo"<option value='".$rede['id']."'>".$rede['descricao']."</option>";
                ?>
            </select>
        </div>

        <button type="submit" name="submit" value="person">Alterar informações pessoais</button>
        <span class="aviso">** Caso não queira alterar algum valor, deixe-o em branco **</span>
    </form>
</div>