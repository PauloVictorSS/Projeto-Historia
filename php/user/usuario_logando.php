<?php

/*
	Verifica se o login e a senha é igual
	a algum login e senha do banco de dados,
	caso seja igual, entra na área do usuário
*/

	if(!empty($_POST['submit'])){

		$login = clear($_POST['login']); 
		$senha = clear($_POST['senha']); 

		$senhacod = hash("sha512", $senha);

		$consulta1 = "SELECT login, senha, id FROM usuarios WHERE login = '$login' AND senha = '$senhacod'";
		$consulta2 = "SELECT * FROM `admin.usuarios` WHERE login = '$login' AND senha = '$senhacod'";

		$aluno = mysqli_query($conexao, $consulta1);
		$prof = mysqli_query($conexao, $consulta2);

		//Verifica se houve algum resultado com o login e senha iguais
		if(mysqli_num_rows($aluno) == 1 and mysqli_num_rows($prof) != 1){
			$_SESSION['login'] = $login;

			while($n = mysqli_fetch_array($aluno)){

				$_SESSION['status_login'] = 1;
				$_SESSION['id_usuario'] = $n['id'];

                $url = INCLUDE_PATH.'pages/area_do_usuario.php';

				header("location: $url");
			}
		}
		elseif(mysqli_num_rows($prof) == 1 and mysqli_num_rows($aluno) != 1){

			$_SESSION['login_admin'] = $login;
			$_SESSION['status_login'] = 2;

			while($infs = mysqli_fetch_array($prof)){

				$_SESSION['type_admin'] = $infs['type'];
				$_SESSION['nome_admin'] = $infs['nome'];
				$_SESSION['materia_prof'] = $infs['id_materia'];
				$_SESSION['id'] = $infs['id'];

				header("location: ".INCLUDE_PATH_PAINEL);
			}
		}
		else
			echo "<p>Usuário ou Senha incorretos!</p>";
		
	}

?>