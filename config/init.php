<?php
//Session Start
session_start();

//Config file
require_once 'config.php';

//Include helper
require_once 'helpers/system_helper.php';

//Class Autoloader
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}