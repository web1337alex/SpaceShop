<?php

namespace App\widjets\Language;

use CORE\App;
use RedBeanPHP\R;

class Language
{
    protected $tpl;
    protected $languages;
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__ . '\lang_tpl.php';
        $this->run();
    }

    protected function run()
    {
        $this->languages = App::$app->getProperty('languages');
        $this->language = App::$app->getProperty('language');
        echo $this->getHTML();
    }

    public static function getLanguageList(): array
    {
        return R::getAssoc("SELECT code, title, base, id FROM language ORDER BY base DESC");
    }

    public static function getActiveLanguage($languages)
    {
        $lang = App::$app->getProperty('lang');
        if($lang && array_key_exists($lang, $languages)){
            $key = $lang;
        } elseif(!$lang) {
            $key = key($languages);
        } else {
            $lang = h($lang);
            throw new \Exception("Язык {$lang} не установлен на сайте", 404);
        }

        $langInfo = $languages[$key];
        $langInfo['code'] = $key;
        return $langInfo;
    }

    protected function getHTML(): string
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}