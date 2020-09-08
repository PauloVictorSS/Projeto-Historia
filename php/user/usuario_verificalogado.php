<?php

	if(!empty($_SESSION['status_login'])){

		if($_SESSION['status_login'] == 1)
			$url = INCLUDE_PATH.'area-do-usuario';

		header("location: $url");

	}
			

?>