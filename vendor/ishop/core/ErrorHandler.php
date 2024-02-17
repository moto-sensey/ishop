<?php

namespace ishop;


class ErrorHandler{
  public function __construct()
  {
    if(DEBUG){
    error_reporting(-1);
  }else{
    error_reporting(0);
  }
  set_exception_handler([$this, 'exceptionHandler']);
  }
  
  public function exceptionHandler($e){
    $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    $this->displayError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
  }
  
  protected function logErrors($message = '', $file = '', $line = '', $response = 404){
    http_response_code($response);
    error_log("[". date('Y-m-d H:i:s')."] Error {$response}: {$message} | File: {$file} | Line: {$line}\n====================\n", 3, ROOT. '/tmp/errors.log');
  }
  
  protected function displayError($errstr, $errfile, $errline, $response = 404){
    //http_response_code($response);
    if(!DEBUG){
      require WWW . '/errors/'.$response.'.php';
      die;
    }
    else{
      require WWW . '/errors/dev.php';
    }
    die;
  }
}