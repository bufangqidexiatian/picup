<?php


namespace  Picup\Repair\Repair;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const URL = 'https://picupapi.tukeli.net/api/v1/imageFix';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }


    /*
     * 图像修复
     * @param $file_path
     * @param $save_path
     * @return bool|false|string
     */
    public function fix($data) {
        $res = $this->app->http->post(self::URL,
            [
                'json' => $data
            ]
        );

        $result = json_decode($res->getBody(),true);

        if (isset($result['code']) && $result['code'] == 0 && isset($result['data']['imgageUrl'])) {
            return $result['data']['imgageUrl'];
        }else {
            return $result['msg'] ;
        }

    }






}
