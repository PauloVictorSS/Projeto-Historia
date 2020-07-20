<?php

	include "conexao_session.php";

	if(!empty($_SESSION['status_login']))
		if($_SESSION['status_login'] == 1)
			header ("location: areadousuario.php");
		elseif($_SESSION['status_login'] == 2)
			header ("location: areadoadmin.php");

?>