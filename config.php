<?php
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/');
define('LIBS', ROOT_SITE . 'application/libs/');
define('CONTROLLERS', ROOT_SITE . 'application/controllers/');
define('MODELS', ROOT_SITE . 'application/models/');
define('VIEWS', ROOT_SITE . 'application/views/');

// Подключение к БД
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mydb');
define('DB_USER', 'root');
define('DB_PASS', 'toor');

// Примесь
define('HASH_PASSWORD_KEY', 'skillTest');