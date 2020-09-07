<?php

    class Painel{

        public static function loggout(){

            unset($_SESSION['admin'], $_SESSION['type_usuario']);

            header("location: ".INCLUDE_PATH);
        }

        public static function pegaCargo($type){

            $cargos = [
                1 => 'Sub Administrador',
                2 => 'Administrador'
            ];

            return $cargos[$type];

        }

        public static function carregaPagina(){
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

        public static function listarUsuariosOnline(){
			self::limparUsuariosOnline();
			$sql = MySql::conectar()->prepare("SELECT * FROM `admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function limparUsuariosOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::conectar()->exec("DELETE FROM `admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
		}

        public static function listarUsuariosCadastrados(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `usuarios`");
			$sql->execute();
			return $sql->fetchAll();
        }

    }
    


?>