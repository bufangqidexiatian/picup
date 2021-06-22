<?php


namespace  Picup\CertificatePhoto\CertificatePhoto;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const URL = 'https://picupapi.tukeli.net/api/v1/idphoto/printLayout';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }



    public function test($data) {
        $res = $this->app->http->post(self::URL,
            [
                'json' => $data
            ]
        );


        $result = json_decode($res->getBody(),true);
        var_dump($result);
        exit;
        if ($result) {
            return $this->returnError($result['msg']);
        }

        $fp = fopen($save_path, "wb");
        fwrite($fp, $res->getBody());
        fclose($fp);
        return true;
    }





}
