<?php 

namespace app\models;

use ishop\App;

class Category extends AppModel{

    public function getIds($id){
        $cats = App::$app->getProperty('cats');
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }

    public function getCategory($alias)
    {
        return \R::findOne('çategory', 'alias = ?', [$alias]);
    }
}