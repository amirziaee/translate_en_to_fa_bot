<?php


namespace A14e\Translate\TranslateApi;

use Stichoza\GoogleTranslate\GoogleTranslate;

class GoogleApi implements TranslateInterface
{   
    protected $translateInto = 'fa';
    protected $source = 'en';
    protected $googleTranslate;

    public function __construct(string $translateInto = null,string $source = null)
    {
        $this->translateInto = $translateInto ?? $this->translateInto;
        $this->source = $source ?? $this->source;
    }

    public function choosenApi(): TranslateInterface
    {
        $this->googleTranslate = new GoogleTranslate($this->translateInto);
        return $this;

    }


    public function getTranslatedData(string $text)
    {
        return  $this->googleTranslate->translate($text);
    }

}