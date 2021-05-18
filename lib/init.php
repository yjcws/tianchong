<?php
require_once 'MysqlConnection.php';
function __autoload($class){
    $file = __DIR__."\\".$class.'.class.php';

    if(is_file($file)){
        require_once($file);
    }
}

