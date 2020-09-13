<?php

    class Painel{

        public static function loggout(){

            session_destroy();

            header("location: ".INCLUDE_PATH);
        }

        public static function loadPageAdmin(){
            if(isset($_GET['url'])){

                if(file_exists("pages/".$_GET['url'].".php")){
                    include("pages/".$_GET['url'].".php");
                }else{
                    header("location: ".INCLUDE_PATH_PAINEL);
                }

            }else{
                include("pages/home.php");
            }
        }

        public static function onlineUsers(){
			self::cleanOnlineUsers();
			$sql = MySql::getConnect()->prepare("SELECT * FROM `admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function cleanOnlineUsers(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::getConnect()->exec("DELETE FROM `admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
		}

        public static function registeredUsers(){
            $sql = MySql::getConnect()->prepare("SELECT * FROM `usuarios`");
			$sql->execute();
			return $sql->fetchAll();
        }

    }
    


?>