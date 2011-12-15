<?php
$iTime = microtime(true);
require_once('auto_loader.php');
$AutoLoader = new SplClassLoader();
$AutoLoader->register();

$oEngine = Faderim\Core\Engine::getInstance();
$oEngine->engineStart($AutoLoader);
