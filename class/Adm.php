<?php

    class Adm{

        public static function getAdms(){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `admin.usuarios`");

            $sql->execute();
            return $sql->fetchAll();

        }
        
        public static function getOffice($type){

            $cargos = [
                1 => 'Professor',
                2 => 'Administrador'
            ];

            return $cargos[$type];

        }

        public static function getSubject(){
            $sql = MySql::getConnect()->prepare("SELECT * FROM `materia`");

            $sql->execute();
            return $sql->fetchAll();
        }

        public static function addAdms($name, $login, $pass, $id_materia){
            $sql = MySql::getConnect()->prepare("INSERT  INTO `admin.usuarios` VALUES (null, ?, ?, 1, ?, ?)");
            $sql->execute(array($login, hash("sha512", $pass), $name, $id_materia));

            return $sql->rowCount();
        }

        public static function deleteAdms($id){
            $sql = MySql::getConnect()->prepare("DELETE FROM `admin.usuarios` WHERE id = ?");
            $sql->execute(array($id));

            return $sql->rowCount();
        }
    }



?>