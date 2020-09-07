<?php

    class Painel{

        public static function loggout(){

            unset($_SESSION['admin'], $_SESSION['type_usuario']);

            header("location: ".INCLUDE_PATH);
        }

        public static function pegaCargo($type){

            $cargos = [
                0 => 'Normal',
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

    }
    


?>