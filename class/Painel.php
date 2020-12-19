<?php

    class Painel{

        public static function loggout(){

            session_destroy();

            header("location: ".INCLUDE_PATH."php/deslogar.php");
        }

        public static function registeredUsers(){
            $sql = MySql::getConnect()->prepare("SELECT * FROM `usuarios`");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function addVestibular($name){
            $sql = MySql::getConnect()->prepare("INSERT  INTO vestibular VALUES (null, ?)");
            $sql->execute(array($name));

            return $sql->rowCount();
        }

        public static function deleteVestibular($id){
            $sql = MySql::getConnect()->prepare("DELETE FROM vestibular WHERE id = ?");
            $sql->execute(array($id));

            return $sql->rowCount();
        }

        public static function addTema($name, $materia){
            $sql = MySql::getConnect()->prepare("INSERT  INTO sub_tema VALUES (null, ?, ?)");
            $sql->execute(array($name, $materia));

            return $sql->rowCount();
        }

        public static function deleteTema($name){
            $sql = MySql::getConnect()->prepare("DELETE FROM sub_tema WHERE descricao = ?");
            $sql->execute(array($name));

            return $sql->rowCount();
        }

    }
    


?>