<?php

    class Questao{

        public static function selectExams(){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `vestibular` ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function selectThemes($materia){

            $sql = MySql::getConnect()->prepare("SELECT * FROM `sub_tema` WHERE id_materia = $materia ORDER BY descricao");
			$sql->execute();
			return $sql->fetchAll();
        }

        public static function addQuestObj($enunciado, $pergunta, $alter_a, $alter_b, $alter_c, $alter_d, $alter_e, $gabarito, $explic, $tema, $vest, $ano, $tipo, $conteudo, $materia){

            $sql = MySql::getConnect()->prepare("INSERT into questoes (enunciado, pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e, alternativa_certa, explicacao, imagem, id_sub_tema, id_vestibular, ano, tipo, id_materia) values (?, ?, ?, ?, ?, ?, ?, ?, ?, '$conteudo', ?, ?, ?, ?, ?)");
        
            $sql->execute(array($enunciado, $pergunta, $alter_a, $alter_b, $alter_c, $alter_d, $alter_e, $gabarito, $explic, $tema, $vest, $ano, $tipo, $materia));

            return $sql->rowCount();
        }

        public static function addQuestDissert($enunciado, $pergunta, $quest_a, $quest_b, $quest_c, $resp_a, $resp_b, $resp_c, $tema, $vest, $ano, $tipo, $conteudo, $materia){

            $sql = MySql::getConnect()->prepare("INSERT into questoes (enunciado, pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e, alternativa_certa, imagem, id_sub_tema, id_vestibular, ano, tipo, id_materia) values (?, ?, ?, ?, ?, ?, ?, ?, '$conteudo', ?, ?, ?, ?, ?)");

            $sql->execute(array($enunciado, $pergunta, $quest_a, $quest_b, $quest_c, $resp_a, $resp_b, $resp_c, $tema, $vest, $ano, $tipo, $materia));

            return $sql->rowCount();
        }

    }

?>