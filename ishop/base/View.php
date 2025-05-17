<?php

namespace ishop\base;

class View{
  public string $content = '';
  
  public $model;
  
  public $data = [];
  
  public function __construct(public $route, public $meta = [], public $layout = '', public $view = '')
  {
    $this->model = $route['controller'];
    
    if($this->layout !== false){
      $this->layout = $this->layout ?: LAYOUT;
    }
  }
  
  public function render($data){
    if(is_array($data)) extract($data);
    $prefix = str_replace('\\', '/', $this->route['prefix']);
    $viewFile = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php"; 
    if(is_file($viewFile)){
      ob_start();
      require_once($viewFile);
      $this->content = ob_get_clean();
    }else{
      throw new \Exception("View {$viewFile} not found", 500);
    }
    if($this->layout !== false){
      $layoutFile = APP."/views/layouts/{$this->layout}.php";
      if(is_file($layoutFile)){
        require_once($layoutFile);
      }else{
        throw new \Exception("Layout {$layoutFile} not found.", 500);
      }
    }
  }
  
  public function getMeta(){
    $output = '<title>'. h($this->meta['title']).'</title>'. PHP_EOL;
    $output .= '<meta name="description" content="'. h($this->meta['desc']).'">'. PHP_EOL;
    $output .= '<meta name ="keywords" content="'. h($this->meta['keywords']).'">'. PHP_EOL;
    return $output;
  }

  public function getDbLogs(){
    if(DEBUG){
        $logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();
        $logs = array_merge($logs->grep('SELECT'), $logs->grep('INSERT'), $logs->grep('UPDATE'), $logs->grep('DELETE'));
        debug($logs);
    }
  }

  public function getPart(string $file, array $data = []){
    if(is_array($data)){
      extract($data);
    }
    $file = APP."/view/{$file}.php";
    if(is_file($file)) {
      require $file;
    }else{
      echo "File {$file} not faund...";
    }
  }
}