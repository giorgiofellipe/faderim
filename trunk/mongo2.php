<?php
$iTotal = 0;
$iCont  = 0;
$iTimeIni = microtime(true);


$m = new Mongo("localhost:27017");
$oDb = $m->selectDB('vitor');

$oColecaoCate = $oDb->selectCollection('categoria2');
$aTodos = Array();
//$aTodos = $oColecaoCate->find();
for($i = 0;$i<500000;$i++) {
    $aLinha = Array('nome'=>'Ricardo Schroeder '.$i,
                    'data'=>'16/09/1987',
                    'sexo'=>'masculino',
                    'telefones'=>Array('35280841','88430198')

                    );
    $aTodos[] = $aLinha;
    //$oColecaoCate->insert($aLinha);
}
$oColecaoCate->batchInsert($aTodos);
$i = 0;
/*
foreach($aTodos as $oAtual) {
    $oAtual['nome'] = 'Novo nome';
    $oColecaoCate->save($oAtual);
    $i++;
}
*/
echo 'Total:'.$i;
echo '<br />';
echo microtime(true) - $iTimeIni;


?>
