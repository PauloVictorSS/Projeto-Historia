<?php

    class Questao{

        public static function selectVestibulares(){

            $sql = MySql::conectar()->prepare("SELECT * FROM `vestibular`");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function selectTemas(){

            $sql = MySql::conectar()->prepare("SELECT * FROM `sub_tema`");
			$sql->execute();
			return $sql->fetchAll();
        }

    }

?>