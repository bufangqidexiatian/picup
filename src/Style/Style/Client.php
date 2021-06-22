<?php


namespace  Picup\Style\Style;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const URL = 'https://picupapi.tukeli.net/api/v1/styleTransferBase64';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }


    /**
     * 风格迁移
     * @param $contentBase64 输入待转化的图片文件的base64
     * @param $styleBase64  输入风格图片文件的base64
     * @return bool|false|string
     */
    public function transfer($contentBase64,$styleBase64) {
        $res = $this->app->http->post(self::URL,
            [
                'json' => [
                    'contentBase64' => $contentBase64,
                    'styleBase64' => $styleBase64
                ]
            ]
        );

        $result = json_decode($res->getBody(),true);


        var_dump($result);
        exit;

    }







}
