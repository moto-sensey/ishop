<?php

namespace app\controllers;

use ishop\Cache;

/** @property Main $model */

class MainController extends AppController{
  
  public function indexAction(){
    //$names = $this->model->getNames();
    //$one_name = \R::getRow('SELECT * FROM name WHERE id = 2');
    $brands = \R::find('brand', 'LIMIT 3');
    $hits = \R::find('product',"hit = '1' AND status = '1' LIMIT 8");
    
    $this->setMeta('Luxury Watches - Home', 'Description', 'Keywords, ..., ..., ...');
    
    $this->set(compact('brands','hits'));
  }
}