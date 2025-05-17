<?php 

namespace ishop;

class Language
{
    public static array $lang_data = [];
    public static array $lang_layout = [];
    public static array $lang_view = [];

    public static function load($code, $view)
    {
        $l_layout = APP . "/languages/{$code}.php";
        $l_view = APP . "/languages/{$code}/{$view['controller']}/{$view['action']}.php";
        if(file_exists($l_layout)){
            self::$lang_layout = require_once $l_layout;
        }
        if(file_exists($l_view)){
            self::$lang_view = require_once $l_view;
        }
        self::$lang_data = array_merge(self::$lang_layout, self::$lang_view);
    }

    public static function get($key)
    {
        return self::$lang_data[$key] ?? $key;
    }
}