<?php

namespace ishop\base;

abstract class Controller{
  
  public object $model;
  public string $view = '';
  public false|string $layout = '';
  public array $data = [];
  public array $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
  
  public function __construct(public $route = [])
  {
    
  }

  public function getModel()
  {
    $model = 'app\models\\'.$this->route['prefix'].$this->route['controller'];
    if(class_exists($model)){
      $this->model = new $model();
    }
  }
  
  public function getView()
  {
    $this->view = $this->view ?: $this->route['action'];
    (new View($this->route, $this->meta, $this->layout, $this->view))->render($this->data);
  }
  
  public  function set($data)
  {
    $this->data = $data;
  }
  
  public function setMeta($title = '', $description = '', $keywords = '')
  {
    $this->meta = [
          'title' => $title,
          'desc' => $description,
          'keywords' => $keywords
        ];
  }

  public function isAjax()
  {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
  }

  public function loadView($view, $vars = [])
  {
    extract($vars);
    require APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$view}.php";
    die;
  }
}