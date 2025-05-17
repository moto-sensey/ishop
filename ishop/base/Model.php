<?php

namespace ishop\base;

use ishop\Db;
use Valitron\Validator;

abstract class Model {
  public array $attributes = [];
  public array $errors = [];
  public array $rules = [];
  public array $labels = [];
  
  public function __construct(){
    Db::getInstance();
  }

  public function load($data){
    foreach($this->attributes as $name => $value){
      if(isset($data[$name])){
        $this->attributes[$name] = $data[$name];
      }
    }
  }

  public function save($table){
    $tbl = \R::dispense($table);
    foreach($this->attributes as $name => $value){
      $tbl->$name = h($value);
    }
    return \R::store($tbl);
  }

  public function validate($data){
    $v = new Validator($data);
    $v->rules($this->rules);
    if($v->validate()){
      return true;
    }
    $this->errors = $v->errors();
    return false;
  }

  public function getErrors(){
    $errors = '<ul>';
    foreach($this->errors as $error){
      foreach($error as $item){
        $errors .= "<li>$item</li>";
      }
    }
    $errors .= '</ul>';
    $_SESSION['error'] = $errors;
  }
}