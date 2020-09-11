<?php

    class Questao{

        public static function selectVestibulares(){

            $sql = MySql::conectar()->prepare("SELECT * FROM `vestibular` ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function selectTemas(){

            $sql = MySql::conectar()->prepare("SELECT * FROM `sub_tema` ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

    }

?>