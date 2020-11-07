<?php

/*
	Verifica se todos os campos do cadastro
	estão preenchidos corretamente, e se sim,
	faz o cadastro do usuário e entra na Área
	do Usuário
*/

	if(!empty($_POST['submit'])){

		$nome = clear($_POST['nome']);
		$login = clear($_POST['login']);
		$senha = clear($_POST['senha']);
		$conf_senha = clear($_POST['conf_senha']);
		$email = clear($_POST['e-mail']);
		$aniversario = clear($_POST['aniver']);
		$escolar = clear($_POST['escolar']);
		$rede = clear($_POST['rede']);

		if($senha == $conf_senha){

			$cont = 0;

			$consulta1 = "select login from usuarios";  

			$verificausuario = mysqli_query($conexao, $consulta1);

			while($u = mysqli_fetch_array($verificausuario) and $cont == 0)
				if($login == $u[0])
					$cont = 1;

			if($cont == 1)
				echo "<div class='mensagem red'><p>Já existe um usuário com essse login</p></div>";
			else{

				$senhacod = hash("sha512", $senha);

				$insert1 = "insert into usuarios (login, senha, nome, email, aniversario, id_rede, id_escolaridade) values('$login', '$senhacod', '$nome', '$email', '$aniversario', $rede, $escolar)";

				$query = mysqli_query($conexao, $insert1);

				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
        $_SESSION['status_login'] = 1;

        $select = "select id from usuarios where login = '$login'";
        $result = mysqli_query($conexao, $select);
        $n = mysqli_fetch_array($result);
        $_SESSION['id_usuario'] = $n['id'];
        
				$url = INCLUDE_PATH.'area_do_usuario';
				echo "<div class='mensagem green'><p>Cadastro feito com sucesso!<a href='$url'> Clique aqui para logar</a></p></div>";

			}
		}
		else
			echo "<div class='mensagem red'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguaisOs campos 'Senha' e 'Confirmar Senha' devem ser iguais</div>";
	}

?>