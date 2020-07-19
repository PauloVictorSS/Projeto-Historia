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

		$result = mysqli_query($conexao, "select login, senha from usuarios where login = '$login' and senha = '$senha'");

		//Verifica se houve algum resultado com o login e senha iguais
		if(mysqli_num_rows($result) == 1){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['status_login'] = 1;

			$test1 = $_SESSION['login'];
			$test2 = $_SESSION['senha'];

			echo "$test1 | $test2"; 

			header ("location: areadousuario.php");
		}
		else
			echo "<p class='mensagem_erro'>Usuário ou Senha incorretos!</p>";
		
	}
	elseif(!empty($_POST['login']) or !empty($_POST['senha']))
		echo "<p class='mensagem_erro'>Ambos os campos devem ser preenchidos!</p>";

?>