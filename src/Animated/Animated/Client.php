<?php


namespace  Picup\Animated\Animated;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const Model1 = 'https://picupapi.tukeli.net/api/v1/matting?mattingType=11';
    const Model2 = 'https://picupapi.tukeli.net/api/v1/matting2?mattingType=11';
    const Model3 = 'https://picupapi.tukeli.net/api/v1/mattingByUrl?mattingType=11';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }


    /*
     *  动漫模式1
     * @param  $file_path: 文件绝对路径  $save_path: 保存的路径
     * @return bool
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

    /*
     * 动漫模式2
     * @param $file_path 文件绝对路径
     * @return false|string
     */
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

    /*
     * 动漫模式3
     * @param $url
     */
    public function urlToBase64($url) {
        $url = self::Model3.'&url='.$url;

        $res = $this->app->http->get($url);
        $result = json_decode($res->getBody(),true);

        if (isset($result['code']) && $result['code'] == 0 && isset($result['data']['imageBase64'])) {
            return $result['data']['imageBase64'];
        }else {
            return $result['msg'];
        }

    }





}
