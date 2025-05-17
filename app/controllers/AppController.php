<?php

namespace app\controllers;

use app\models\AppModel;
use ishop\base\Controller;
use app\widgets\currency\Currency;
//use app\models\Wishlist;
use app\widgets\language\Language;
use ishop\App;
use ishop\Cache;

class AppController extends Controller{
  
  public function __construct($route){
    parent::__construct($route);
    new AppModel();
    App::$app->setProperty('currencies',Currency::getCurrencies());
    App::$app->setProperty('currency',Currency::getCurrency(App::$app->getProperty('currencies')));
    App::$app->setProperty('cats', self::cacheCategory());
    App::$app->setProperty('languages', Language::getLanguages());
    App::$app->setProperty('language', Language::getLanguage(App::$app->getProperty('languages')));

    $lang = App::$app->getProperty('language');
   
    /**
      *  \ishop\Language::load($lang['code'], $this->route);
      *  $categories = \R::getAssoc("SELECT c.*, cd.* FROM category c 
      *                  JOIN category_description cd
      *                  ON c.id = cd.category_id
      *                  WHERE cd.language_id = ?", [$lang['id']]);
      *  App::$app->setProperty("categories_{$lang['code']}", $categories);
      *  App::$app->setProperty('wishlist', Wishlist::get_wishlist_ids());
     */
  }

  public static function cacheCategory(){
    $cache = Cache::getInstance();
    $cats = $cache->get('cats');
    if(!$cats){
      $cats = \R::getAssoc("SELECT * FROM category");
      $cache->set('cats', $cats);
    }
    return $cats;
  }
}