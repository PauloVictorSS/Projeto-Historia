<?php

/*
	Verifica se todos os campos do cadastro
	estão preenchidos corretamente, e se sim,
	faz o cadastro do usuário e entra na Área
	do Usuário
*/

	include "conexao_session.php";

	if(!empty($_POST['login']) and !empty($_POST['senha']) and !empty($_POST['nome']) and !empty($_POST['conf_senha']) and !empty($_POST['e-mail']) and !empty($_POST['aniver']) and !empty($_POST['escolar']) and !empty($_POST['rede'])){

		$nome = mysqli_escape_string($conexao, $_POST['nome']);
		$login = mysqli_escape_string($conexao, $_POST['login']);
		$senha = mysqli_escape_string($conexao, $_POST['senha']);
		$conf_senha = mysqli_escape_string($conexao, $_POST['conf_senha']);
		$email = mysqli_escape_string($conexao, $_POST['e-mail']);
		$aniversario = mysqli_escape_string($conexao, $_POST['aniver']);
		$escolar = mysqli_escape_string($conexao, $_POST['escolar']);
		$rede = mysqli_escape_string($conexao, $_POST['rede']);

		if($senha == $conf_senha){

			$cont = 0;

			$consulta1 = "select login from usuarios";  

			$verificausuario = mysqli_query($conexao, $consulta1);

			while($u = mysqli_fetch_array($verificausuario) and $cont == 0)
				if($login == $u[0])
					$cont = 1;

			if($cont == 1)
				echo "<br><p class='mensagem_erro'>Já existe um usuário com essse login</p>";
			else{
				
				$senhamd5 = md5($senha);

				$insert1 = "insert into usuarios values('$login', '$senhamd5', '$nome', '$email', '$aniversario', $rede, $escolar, 0)";

				$insert = mysqli_query($conexao, $insert1);

				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				$_SESSION['status_login'] = 1;

				header ("location: areadousuario.php");

			}
		}
		else
			echo "<br><p class='mensagem_erro'>Os campos 'Senha' e 'Confirmar Senha' devem ser iguais</p>";
	}
	else if(!empty($_POST['login']) or !empty($_POST['senha']) or !empty($_POST['nome']) or !empty($_POST['conf_senha']) or !empty($_POST['e-mail']) or !empty($_POST['aniver']) or !empty($_POST['escolar']) or !empty($_POST['rede']))
			echo "<br><p class='mensagem_erro'>Todos os campos devem estar preenchidos</p>";

?>