<?php
$iTime = microtime(true);
require_once('auto_loader.php');

$t = new SplClassLoader();
$t->register();


$t = Faderim\Core\Engine::getInstance();
$a = new Faderim\Config\EngineStart();
$a->parseEngine();


$oModel = new Commerce\Model\Carro();
$oModel->setCodigo(3);

//Commerce\Model\Carro::getStorage()->find();

//$oModel->storage()->insert();
echo microtime(true) - $iTime;
die;