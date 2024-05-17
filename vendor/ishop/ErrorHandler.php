<?php

namespace ishop;


class ErrorHandler{
  public function __construct(){
    if(DEBUG){
      error_reporting(-1);
    }else{
      error_reporting(0);
    }
    set_exception_handler([$this, 'exceptionHandler']);
    set_error_handler([$this, 'errorHandler']);
    ob_start();
    register_shutdown_function([$this, 'fatalErrorHandler']);
  }

  public function errorHandler($errno, $errstr, $errfile, $errline){
    $this->logError($errstr, $errfile, $errline);
    $this->displayError($errno, $errstr, $errfile, $errline);
  }

  public function fatalErrorHandler(){
    $error = error_get_last();
    if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
      $this->logError($error['message'], $error['file'], $error['line']);
      ob_get_clean();
      $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
    }else{
      ob_end_flush();
    }
  }
  
  public function exceptionHandler(\Throwable $e){
    $this->logError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    $this->displayError('Error: ', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
  }
  
  protected function logError($message = '', $file = '', $line = '', $response = 500){
    http_response_code($response);
    error_log("[". date('Y-m-d H:i:s')."] Error {$response}: {$message} | File: {$file} | Line: {$line}\n====================\n", 3, ROOT. '/tmp/errors.log');
    //file_put_contents(LOGS.'/errors.log', "[". date('Y-m-d H:i:s')."] Error {$response}: {$message} | File: {$file} | Line: {$line}\n====================\n",FILE_APPEND);
  }
  
  protected function displayError($errno, $errstr, $errfile, $errline, $response = 500){
    if($response == 0) {
        $response = 404;
    }
    http_response_code($response);
    if(!DEBUG) {
        require WWW . '/errors/'.$response.'.php';
        die;
    } else {
        require WWW . '/errors/dev.php';
    }
    die;
  }
}