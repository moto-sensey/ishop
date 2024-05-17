<?php

if(PHP_MAJOR_VERSION < 8){
    die('Лошара, обновись до PHP >= 8.x или иди на х..!!!');
}

require_once dirname(__DIR__).'/config/init.php';
require_once HELPERS.'/functions.php';
require_once CONFIG.'/routes.php';

new ishop\App();