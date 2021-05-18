<?php
include __DIR__."/db.php";
$config = include dirname(__DIR__)."\\config\\database.php";
//var_dump();
$Mysql = new db($config['mysql']['host'],$config['mysql']["user"],$config['mysql']['password'],$config['mysql']['dbname']);