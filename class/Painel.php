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

    }
    


?>