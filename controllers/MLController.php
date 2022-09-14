<?php

namespace app\controllers;
use yii\httpclient\Client;

class MLController extends \yii\web\Controller
{
    public static function getProdutosDados($idML)
    {
        $client = new Client();

        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl("https://api.mercadolibre.com/items/$idML")
            ->send();
        $response = json_decode($response->content);
        return $response;
    }
}
