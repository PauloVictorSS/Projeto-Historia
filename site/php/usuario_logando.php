<?php

/*
	Verifica se o login e a senha é igual
	a algum login e senha do banco de dados,
	caso seja igual, entra na área do usuário
*/

	include "conexao_session.php";

	if(!empty($_POST['login']) and !empty($_POST['senha'])){

		$login = $_POST['login']; 
		$senha = $_POST['senha'];

		$senhamd5 = md5($senha);

		$result = mysqli_query($conexao, "select login, senha, id_mestre from usuarios where login = '$login' and senha = '$senhamd5'");

		//Verifica se houve algum resultado com o login e senha iguais
		if(mysqli_num_rows($result) == 1){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;

			$test1 = $_SESSION['login'];
			$test2 = $_SESSION['senha'];

			echo "$test1 | $test2"; 

			while($n = mysqli_fetch_array($result)){

				if($n[2] == 1562){
					$_SESSION['status_login'] = 2;
					header ("location: areadoadmin.php");
				}
				else{
					$_SESSION['status_login'] = 1;
					header ("location: areadousuario.php");
				}
				exit();
			}
		}
		else
			echo "<p class='mensagem_erro'>Usuário ou Senha incorretos!</p>";
		
	}
	elseif(!empty($_POST['login']) or !empty($_POST['senha']))
		echo "<p class='mensagem_erro'>Ambos os campos devem ser preenchidos!</p>";

?>