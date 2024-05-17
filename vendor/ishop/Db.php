<?php

namespace ishop;

class Db {
  use TSingletone;
  
  private function __construct(){
  
  $db = require_once CONFIG.'/config_db.php';
  class_alias('\RedBeanPHP\R', '\R');
  
  \R::setup($db['dsn'],$db['user'],$db['pass']);
  if(!\R::testConnection()){
  throw new \Exception("No database connection",500);
  }
  \R::freeze(true);
  if(DEBUG){
    \R::debug(true, 3);
  }
}
}
