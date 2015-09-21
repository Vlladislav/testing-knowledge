<?php
define('ROOT_SITE', realpath(__DIR__) . '/');
require ROOT_SITE . 'config.php';

spl_autoload_register('autoload');
function autoload($class) {
    require LIBS . $class .".php";
}

// Загружаем загрузчик
$bootstrap = new Bootstrap();

//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();
//var_dump(Hash::create('sha256', 'password', HASH_PASSWORD_KEY));