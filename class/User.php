<?php

    class User{

        public static function checksQuestionResolved($id_usuario, $id_questao){

            $stmt = Mysql::getConnect()->prepare("select * from resolucao where id_usuario = $id_usuario and id_questao = $id_questao");
            $stmt->execute();

            return count($stmt->fetchAll());
        }

        public static function saveResolutionQuest($id_usuario, $id_questao, $resp_dada, $acertou, $id_materia){

            $stmt = Mysql::getConnect()->prepare("insert into resolucao (id_usuario, id_questao, resp_escolh, acertou, id_materia) values ($id_usuario, $id_questao, '$resp_dada', '$acertou', $id_materia)");
            $stmt->execute();

            return $stmt->rowCount();
        }

        public static function login($login, $senha){

            $senhacod = hash("sha512", $senha);

            $aluno = Mysql::getConnect()->prepare("SELECT login, senha, id FROM usuarios WHERE BINARY login = ? AND BINARY senha = ?");
            $aluno->execute(array($login, $senhacod));
            
            $adm = Mysql::getConnect()->prepare("SELECT * FROM `admin.usuarios` WHERE BINARY login = ? AND BINARY senha = ?");
            $adm->execute(array($login, $senhacod));

            return array($aluno->fetchAll(), $adm->fetchAll());
        }
    }

?>