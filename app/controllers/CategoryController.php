<?php 

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use ishop\App;
use ishop\helpers\Pagination;

/** @property Category $model */

class CategoryController extends AppController{

    public function viewAction(){
        $alias = $this->route['alias'];
        $brands = \R::find('brand');
        $lang = App::$app->getProperty('language');
        $category = $this->model->getCategory($alias, $lang);
        
        if(!$category){
            throw new \Exception('Page not found!', 404);
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category['id']);
        $cat_model = new Category();
        $ids = $cat_model->getIds($category['id']);
        $ids = !$ids ? $category['id'] : $ids . $category['id'];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        if($this->isAjax()){
            debug($_GET);
            //die;
        }
        $total = $this->model->get_count_products($ids);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
       
        $products = $this->model->get_products($ids, $lang, $start, $perpage);
       
        $this->setMeta($category['title'], $category['description'], $category['keywords']);
        $this->set(compact('products', 'total', 'breadcrumbs', 'brands', 'pagination'));
    }
}