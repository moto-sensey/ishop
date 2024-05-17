<?php

function debug($data, $die = false){
  echo '<pre>'.print_r($data, 1).'</pre>';
  if($die){
    die;
  }
}

function redirect($http = false){
  if($http){
    $redirect = $http;
  }else{
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
  }
  header("Location: $redirect");
  exit;
}

function h($str){
  if($str){
    return htmlspecialchars($str, ENT_QUOTES);
  }
  return '';
}