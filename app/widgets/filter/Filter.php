<?php 

namespace app\widgets\filter;

use ishop\Cache;

class Filter{
    public $groups;
    public $attrs;
    public $tpl;
    
    public function __construct()
    {
        $this->tpl = __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run(){
        $cache = Cache::getInstance();
        $this->groups = $cache->get('filter_groups');
        $this->attrs = $cache->get('filter_attrs');
        if(!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 30);
        }
        if(!$this->attrs){
            $this->attrs = $this->getAttrs();
            $cache->set('filter_attrs', $this->attrs, 30);
        }
        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        return \R::getAssoc('SELECT id, title FROM attribute_group');
    }

    protected function getAttrs(){
        $data = \R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }
}