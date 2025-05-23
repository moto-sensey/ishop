<?php

function debug($data, $die = false)
{
  echo '<pre>'.print_r($data, 1).'</pre>';
  if($die){
    die;
  }
}

function redirect($http = false)
{
  if($http){
    $redirect = $http;
  }else{
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
  }
  header("Location: $redirect");
  exit;
}

function h($str)
{
  if($str){
    return htmlspecialchars($str, ENT_QUOTES);
  }
  return '';
}

function base_url()
{
  return PATH . '/' . (\ishop\App::$app->getProperty('lang')) ? \ishop\App::$app->getProperty('lang')  : '';
}

/**
 * @param string $key Key of GET array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
*/
function get($key, $type = 'i')
{
  $param = $key;
  $$param = $_GET[$param] ?? '';
  if($type == 'i'){
    return (int)$$param;
  }elseif($type == 'f'){
    return (float)$$param;
  }else{
    return trim($$param);
  }
}

/**
 * @param string $key Key of POST array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
*/
function post($key, $type = 's')
{
  $param = $key;
  $$param = $_POST[$param] ?? '';
  if($type == 'i'){
    return (int)$$param;
  }elseif($type == 'f'){
    return (float)$$param;
  }else{
    return trim($$param);
  }
}
