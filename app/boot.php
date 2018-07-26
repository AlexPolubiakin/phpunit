<?php
// загрузка конфига 
require_once 'config/config.php';
// загрузка вспомогательных функций
require_once 'func/func.php';
// автозагрузка библиотек
spl_autoload_register(function($class){
    require_once 'lib/' . $class . '.php';
});

