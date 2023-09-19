<?php

namespace A14e\Translate\TranslateApi;

interface TranslateInterface
{
    public function choosenApi():self;
    public function getTranslatedData(string $text);
}
