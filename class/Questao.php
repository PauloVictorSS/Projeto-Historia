<?php

    class Questao{

        public static function selectExams(){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `vestibular` ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function selectThemes(){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `sub_tema` ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

    }

?>