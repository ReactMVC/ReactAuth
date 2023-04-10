<?php
namespace ReactMVC\App\Models;

class Lang
{
    private $lang;
    private $defaultLang = 'en';

    public function __construct($lang = null)
    {
        if ($lang && file_exists('Lang/' . $lang . '.php')) {
            $this->lang = include 'Lang/' . $lang . '.php';
        } else {
            $this->lang = include 'Lang/' . $this->defaultLang . '.php';
        }
    }

    public function get($key)
    {
        return isset($this->lang[$key]) ? $this->lang[$key] : null;
    }
}

?>