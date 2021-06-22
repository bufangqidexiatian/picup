<?php


namespace  Picup\Beautify\Beautify;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const Model1 = 'https://picupapi.tukeli.net/api/v1/matting?mattingType=4';
    const Model2 = 'https://picupapi.tukeli.net/api/v1/matting2?mattingType=4';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }


    /*
     * 一键美化模式2
     * @param $file_path
     * @param $save_path
     * @return bool|false|string
     */
    public function fileToBinary($file_path,$save_path) {
        if (!file_exists($file_path)) {
            return  $this->returnError('file does not exist');
        }

        $res = $this->app->http->post(self::Model1, [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($file_path, 'r')
                ]
            ]
        ]);

        $result = json_decode($res->getBody(),true);
        if ($result) {
            return $this->returnError($result['msg']);
        }

        $fp = fopen($save_path, "wb");
        fwrite($fp, $res->getBody());
        fclose($fp);
        return true;
    }

    public function fileToBase64($file_path) {
        if (!file_exists($file_path)) {
            return  $this->returnError('file does not exist');
        }

        $res = $this->app->http->post(self::Model2, [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($file_path, 'r')
                ]
            ]
        ]);

        $result = json_decode($res->getBody(),true);


        if (isset($result['code']) && $result['code'] == 0 && isset($result['data']['imageBase64'])) {
            return $result['data']['imageBase64'];
        }else {
            return $result['msg'];
        }

    }




}
