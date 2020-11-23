<?php
	
	class Site{

		public static function updateOnlineUsers(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = MySql::getConnect()->prepare("SELECT `id` FROM `admin.online` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if($check->rowCount() == 1){
					$sql = MySql::getConnect()->prepare("UPDATE `admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual,$token));
				}else{
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = MySql::getConnect()->prepare("INSERT INTO `admin.online` VALUES (null,?,?)");
					$sql->execute(array($horarioAtual,$token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::getConnect()->prepare("INSERT INTO `admin.online` VALUES (null,?,?)");
				$sql->execute(array($horarioAtual,$token));
			}
		}

		public static function counter(){
			if(!isset($_COOKIE['visita'])){
				setcookie('visita','true',time() + (60*60*24*7));
				$sql = MySql::getConnect()->prepare("INSERT INTO `admin.visitas` VALUES (null,?)");
				$sql->execute(array(date('Y-m-d')));
			}
		}

	}

?>