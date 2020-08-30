<?php

	if(!empty($_SESSION['status_login'])){

		if($_SESSION['status_login'] == 1)
			$url = INCLUDE_PATH.'area-do-usuario';
		
		elseif($_SESSION['status_login'] == 2)
			$url = INCLUDE_PATH.'area-do-admin';

		header("location: $url");

	}
			

?>