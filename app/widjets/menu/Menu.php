<?php

namespace App\widjets\menu;

use CORE\App;
use CORE\Cache;
use RedBeanPHP\R;

class Menu
{

    protected $data;
    protected $tree;
    protected $html;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $cache = 3600;
    protected $cacheKey = 'snshop_menu';
    protected $attrs = [];
    protected $prepand = '';
    protected $language;

    public function __construct($options = [])
    {
        $this->language = App::$app->getProperty('language');
        $this->tpl = __DIR__ . '/menu_tpl.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::getInstance();
        $this->html = $cache->get($this->cacheKey . "_" . $this->language['code']);
        if(!$this->html){
            $this->data = R::getAssoc(
                "SELECT c.*, cd.* FROM category c JOIN category_description cd 
                ON c.id = cd.category_id 
                WHERE cd.language_id = ?",
                [$this->language['id']]
            );
            $this->tree = $this->getTree();
            $this->html = $this->getMenuHTML($this->tree);
            if($this->cache){
                $cache->set("{$this->cacheKey}_{$this->language['code']}", $this->html, $this->cache);
            }
        }
        $this->output();
    }

    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach ($this->attrs as $k => $v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<" . $this->container . " class='" . $this->class . "'" . $attrs . ">";
        echo $this->prepand;
        echo $this->html;
        echo "</" . $this->container . ">";
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['children'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHTML($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->callToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function callToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}