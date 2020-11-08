<?php

    $dados = array();

    $urlGrafic1 = Relatorios::qtdQuestVest();
    $urlGrafic2 = Relatorios::questPTema();
    $urlGrafic3 = Relatorios::totalDissertObj();
    $urlGrafic4 = Relatorios::acertTotal();

    foreach (Relatorios::acertPTema() as $key => $value) {

        if($value[1] == 's')
            $acert = 'Acertos';
        else
            $acert = 'Erros';

        $dados[$value[0]."_"."$acert"] = $value[2];
    }

?>

<div class="box-content box-graphi">
    
    <div class="graphis">
        <div class="element">
            <h2>Quantidade de questões cadastradas p/ vestibular</h2>
            <img src="<?php echo $urlGrafic1 ?>" alt="">
        </div>

        <div class="element">
            <h2>Quantidade de questões cadastradas p/ tema</h2>
            <img src="<?php echo $urlGrafic2 ?>" alt="">
        </div>
        <div class="element">
            <h2>Total de questões objetivas e dissertativas</h2>
            <img src="<?php echo $urlGrafic3 ?>" alt="">
        </div>

        <div class="element">
            <h2>Total de acertos e erros de questões objetivas</h2>
            <img src="<?php echo $urlGrafic4 ?>" alt="">
        </div>

    </div>
</div>

<div class="box-content">
    <h2>Acertos e erros de questões objetivas p/ tema</h2>
    
    <table>
        <tr>
            <th>Tema</th>
            <th>Acertos</th>
            <th>Erros</th>
        </tr>

        <?php   
        
            $cont = 1;
            $acertos = 0;
            $totalAcertos = 0;
            $totalErros = 0;

            foreach ($dados as $key => $value) { 
                $interm = explode("_", $key);
                $tema = $interm[0];
                $typeAcert = $interm[1];

                if($cont == 1 and $typeAcert == "Acertos"){
                    $acertos = $value;
                    $cont--;
                    continue;
                }
                else{
                    $cont = 1;
                }
                
        ?>

        <tr>
            <td><?php echo $tema; ?></td>
            <td><?php echo $acertos; ?></td>
            <td><?php echo $value; ?></td>
        </tr>

        <?php 
                
                $totalAcertos = $totalAcertos + $acertos;
                $totalErros = $totalErros + $value;
                $acertos = 0;
            }  
        ?>

        <tr>
            <th>Total</th>
            <th><?php echo $totalAcertos; ?></th>
            <th><?php echo $totalErros; ?></th>
        </tr>

    </table>

</div>