<?php

namespace app\controllers;

use ishop\Cache;
use ishop\App;

/** @property Main $model */

class MainController extends AppController{
  
  public function indexAction(){
    $lang = App::$app->getProperty('language');
    //debug($lang);
    $brands = \R::find('brand', 'LIMIT 3');
    $hits = $this->model->get_hits($lang, 8);
    //debug($hits);
    $slides = \R::findAll('slider');
    
    $this->setMeta('Luxury Watches - Home', 'Description', 'Keywords, ..., ..., ...');
    
    $this->set(compact('slides', 'brands','hits'));
  }
}