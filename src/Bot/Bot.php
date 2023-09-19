<?php

namespace A14e\Translate\Bot;


class Bot
{
    private $url = 'https://api.telegram.org/bot';
    private $chatId;
    private $sendMessage = 'sendMessage';

    public function __construct($token,$chatId)
    {
        $this->url = $this->url . $token . '/';
        $this->chatId = $chatId;
        
    }

    public function sendMessage(string $text) : void
    {
        $params = http_build_query(['chat_id' => $this->chatId , 'text' => $text]);
        $sendMessageUrl = $this->url . "$this->sendMessage?$params";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $sendMessageUrl ,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        curl_exec($curl);
        curl_close($curl);
    }


}
