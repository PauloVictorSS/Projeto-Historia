<?php

/*
	Verifica se o login e a senha é igual
	a algum login e senha do banco de dados,
	caso seja igual, entra na área do usuário
*/

	

	if(!empty($_POST['login']) and !empty($_POST['senha'])){

		$login = clear($_POST['login']); 
		$senha = clear($_POST['senha']); 

		$senhamd5 = md5($senha);

		$consulta = "select login, senha, id_mestre, id from usuarios where login = '$login' and senha = '$senhamd5'";

		$result = mysqli_query($conexao, $consulta);

		//Verifica se houve algum resultado com o login e senha iguais
		if(mysqli_num_rows($result) == 1){
			$_SESSION['login'] = $login;
			 

			while($n = mysqli_fetch_array($result)){

				$_SESSION['status_login'] = 1;
				$_SESSION['id_usuario'] = $n['id'];

				$url = INCLUDE_PATH.'area-do-usuario';

				header("location: $url");
			}
		}
		else
			echo "<p class='mensagem-red'>Usuário ou Senha incorretos!</p>";
		
	}

?>