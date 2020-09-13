<?php

    class Relatorios{

        private static $cores = array();
        private static $dados = array();
        private static $cont = 0;

        public static function resetAtt(){
            self::$cores = array();
            self::$dados = array();
            self::$cont = 0;
        }

        public static function getColors($cont){

            while ($cont > 0) {
                self::$cores[$cont] = sprintf('%06X', mt_Rand(0, 0xFFFFFF));
                $cont--;
            }

        }

        public static function getUrlGrafic(){

            $tipo = 'p3';
            $largura = 450;
            $altura = 275;
            $labels = array_keys(self::$dados);
            $valores = array_values(self::$dados);
            $vl_cores = array_values(self::$cores);
            $grafico = array(
                'cht' => $tipo,
                'chs' => $largura.'x'.$altura,
                'chd' => 't:'.implode(',',$valores),
                'chdl' => implode('|',$labels),
                'chl' => implode('|', $valores),
                'chco' => implode('|', $vl_cores),
                'chdlp' => 'b'
            );

            return $url = 'https://chart.apis.google.com/chart?'.http_build_query($grafico);

        }

        public static function getData($consultaSQL){

            self::$cont = 0;
            foreach ($consultaSQL as $key => $value) {

                $chave = $value[0];

                self::$dados["$chave"] = $value[1];
                self::$cont++;
            }

        }

        public static function qtdQuestVest(){
            
            Relatorios::resetAtt();

            $sql = MySql::getConnect()->prepare("SELECT vestibular.descricao as 'vestibular', COUNT(vestibular.descricao) as 'qtd' FROM resolucao, questoes, vestibular WHERE resolucao.id_questao = questoes.id and questoes.id_vestibular = vestibular.id GROUP BY vestibular.descricao");

            $sql->execute();

            Relatorios::getData($sql->fetchAll());

            Relatorios::getColors(self::$cont);

            return Relatorios::getUrlGrafic();

        }

        public static function acertTotal(){

            Relatorios::resetAtt();

            $sql = MySql::getConnect()->prepare("SELECT acertou, count(*) FROM resolucao WHERE resp_escolh != 1 GROUP BY acertou");

            $sql->execute();

            self::$cont = 0;
            foreach ($sql->fetchAll() as $key => $value) {

                if($value[0] == 's')
                    $chave = 'Acertos';
                else
                    $chave = 'Erros';

                self::$dados["$chave"] = $value[1];
                self::$cont++;
            }

            Relatorios::getColors(self::$cont);

            return Relatorios::getUrlGrafic();
        }

        public static function totalDissertObj(){

            Relatorios::resetAtt();

            $sql = MySql::getConnect()->prepare("SELECT questoes.tipo, count(*) FROM questoes GROUP BY questoes.tipo");

            $sql->execute();

            self::$cont = 0;
            foreach ($sql->fetchAll() as $key => $value) {

                if($value[0] == 1)
                    $chave = 'Objetiva';
                else
                    $chave = 'Dissertativa';

                self::$dados["$chave"] = $value[1];
                self::$cont++;
            }

            Relatorios::getColors(self::$cont);

            return Relatorios::getUrlGrafic();
        }

        public static function questPTema(){

            Relatorios::resetAtt();

            $sql = MySql::getConnect()->prepare("SELECT sub_tema.descricao, COUNT(*) FROM questoes, sub_tema WHERE questoes.id_sub_tema = sub_tema.id GROUP BY questoes.id_sub_tema");

            $sql->execute();

            Relatorios::getData($sql->fetchAll());

            Relatorios::getColors(self::$cont);

            return Relatorios::getUrlGrafic();
        }

        public static function acertPTema(){
            Relatorios::resetAtt();

            $sql = Mysql::getConnect()->prepare("SELECT sub_tema.descricao, resolucao.acertou, COUNT(*) FROM resolucao, questoes, sub_tema WHERE resolucao.resp_escolh != 1 and questoes.id = resolucao.id_questao and questoes.id_sub_tema = sub_tema.id GROUP BY sub_tema.descricao, resolucao.acertou ORDER BY sub_tema.descricao, resolucao.acertou desc");

            $sql->execute();

            return $sql->fetchAll();
        }

    }

?>