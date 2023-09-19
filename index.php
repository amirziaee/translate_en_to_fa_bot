<?php

use A14e\Translate\Bot\Bot;
use A14e\Translate\TranslateApi\GoogleApi;



require './vendor/autoload.php';

$hello = 
$data = file_get_contents('php://input');
$dataJson = json_decode($data);
$entities = $dataJson->message->entities[0] ?? null;

$token = '6459149107:AAEjzm2Qx5B7ljyksV5hEoLhOxC4XeOJitA';

$translated = ((new GoogleApi())->choosenApi())->getTranslatedData($dataJson->message->text);
$bot = new Bot($token,$dataJson->message->chat->id);
$helloMessage = 'سلام'.$dataJson->message->chat->first_name.'!'.PHP_EOL.'برای اینکه کلمه یا متن رو ترجمه کنی او کلمه یا متن رو برامون بنویس.';
if($dataJson->message->text == '/start' and $entities->type == 'bot_command')
{
    $bot->sendMessage($helloMessage);
}else
{
    $bot->sendMessage($translated);
}








