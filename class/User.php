<?php

    class User{

        public static function checksQuestionResolved($id_usuario, $id_questao){

            $stmt = Mysql::getConnect()->prepare("select * from resolucao where id_usuario = $id_usuario and id_questao = $id_questao");
            $stmt->execute();

            return count($stmt->fetchAll());
        }
    }



?>