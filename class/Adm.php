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

        public static function addAdms($name, $login, $pass){
            $sql = MySql::getConnect()->prepare("INSERT  INTO `admin.usuarios` VALUES (null, ?, ?, 1, ?)");
            $sql->execute(array($login, $pass, $name));

            return $sql->rowCount();
        }

        public static function deleteAdms($id){
            $sql = MySql::getConnect()->prepare("DELETE FROM `admin.usuarios` WHERE id = ?");
            $sql->execute(array($id));

            return $sql->rowCount();
        }
    }



?>