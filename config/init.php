<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT. '/public');
define("APP", ROOT. '/app');
define("CORE", ROOT. '/ishop'); // ???
define("HELPERS", ROOT. '/ishop/helpers');
define("CACHE", ROOT. '/tmp/cache');
define("LOGS", ROOT. '/tmp/logs');
define("CONFIG", ROOT. '/config');
define("LAYOUT", 'watches');
define("NO_IMAGE", 'uploads/no_image.jpg');

$app_path = getUrl();
$app_path = preg_replace("#[^/]+$#",'',$app_path);
$app_path = str_replace('/public/','',$app_path);
define("PATH",$app_path);
define("ADMIN",PATH.'/admin');

require_once ROOT. '/vendor/autoload.php';

function getUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    
    return $protocol.$domainName;
  }