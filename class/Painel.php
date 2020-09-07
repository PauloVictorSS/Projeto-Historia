<?php

    class Painel{

        public static function loggout(){

            unset($_SESSION['admin'], $_SESSION['type_usuario']);

            header("location: ".INCLUDE_PATH);
        }

    }
    


?>