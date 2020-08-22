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
				echo "<p class='mensagem-red'>Já existe um usuário com essse login</p>";
			else{
				
				$senhamd5 = md5($senha);

				$insert1 = "insert into usuarios (login, senha, nome, email, aniversario, id_rede, id_escolaridade, id_mestre) values('$login', '$senhamd5', '$nome', '$email', '$aniversario', $rede, $escolar, 0)";

				$query = mysqli_query($conexao, $insert1);

				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				$_SESSION['status_login'] = 1;

				$url = INCLUDE_PATH.'area-do-usuario';
				echo "<p class='mensagem-green'><a href='$url'>Logar!</a></p>";

			}
		}
		else
			echo "<p class='mensagem-red'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguais</p>";
	}

?>