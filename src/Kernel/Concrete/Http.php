<?php

namespace  Picup\Kernel\Concrete;

use Picup\Kernel\BaseClient;
class Http extends  BaseClient {

    public static $instance = [];

    public function __construct(Container $app)
    {
        parent::__construct( $app);

    }

    public function client($config = []) {
        $config = array_merge(
            $config,
            [
                'timeout'  => 5.0,
            ]
        );
        $index =  md5(serialize($config));

        if (empty(self::$instance[$index])) {
            self::$instance[$index] = new \GuzzleHttp\Client($conifg);
        }
        return self::$instance[$index];
    }

    public function post($url,$data) {
        !empty($data['headers']['APIKEY']) ||
            $data['headers']['APIKEY'] = $this->app->config->APIKEY;

        return $this->client()->post($url,$data);
    }


    public function get($url,$data) {
        return $this->client()->request('GET',$url,[
            'headers' => [
                'APIKEY' => $this->app->config->APIKEY
            ]
        ]);

    }


}