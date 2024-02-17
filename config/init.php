<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT. '/public');
define("APP", ROOT. '/app');
define("CORE", ROOT. '/vendor/ishop/core');
define("LIBS", ROOT. '/vendor/ishop/core/libs');
define("CACHE", ROOT. '/tmp/cache');
define("CONF", ROOT. '/config');
define("LAYOUT", 'watches');

$app_path = siteUrl();
$app_path = preg_replace("#[^/]+$#",'',$app_path);
$app_path = str_replace('/public/','',$app_path);
define("PATH",$app_path);
define("ADMIN",PATH.'/admin');

require_once ROOT. '/vendor/autoload.php';

function siteUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    
    return $protocol.$domainName;
  }