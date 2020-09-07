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

		$consulta1 = "SELECT login, senha, id FROM usuarios WHERE login = '$login' AND senha = '$senhamd5'";
		$consulta2 = "SELECT * FROM `admin.usuarios` WHERE login = '$login' AND senha = '$senha'";

		$result1 = mysqli_query($conexao, $consulta1);
		$result2 = mysqli_query($conexao, $consulta2);

		//Verifica se houve algum resultado com o login e senha iguais
		if(mysqli_num_rows($result1) == 1){
			$_SESSION['login'] = $login;

			while($n = mysqli_fetch_array($result1)){

				$_SESSION['status_login'] = 1;
				$_SESSION['id_usuario'] = $n['id'];

				$url = INCLUDE_PATH.'area-do-usuario';

				header("location: $url");
			}
		}
		elseif(mysqli_num_rows($result2) == 1){
			$_SESSION['login_admin'] = $login;

			while($infs = mysqli_fetch_array($result2)){

				$_SESSION['type_admin'] = $infs['type'];
				$_SESSION['nome_admin'] = $infs['nome'];

				header("location: ".INCLUDE_PATH_PAINEL);
			}
		}
		else
			echo "<div class='mensagem red'><p>Usuário ou Senha incorretos!</p></div>";
		
	}

?>