<?php

    class Adm{

        public static function getAdms(){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `admin.usuarios`");

            $sql->execute();
            return $sql->fetchAll();

        }
        
        public static function getOffice($type){

            $cargos = [
                1 => 'Sub Administrador',
                2 => 'Administrador'
            ];

            return $cargos[$type];

        }
    }



?>