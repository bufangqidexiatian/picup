<?php

namespace  Picup\Kernel;


class BaseClient {

    protected  $app;
    public function __construct( $app)
    {
        $this->app = $app;
    }


    public function returnError($msg ='' ,$code = 0, $data = []) {
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function returnSuccess($msg = '', $code = 1, $data = []) {
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function httpClient($config = null) {
       $config = array_merge(
           $config,
           [
               'timeout'  => 5.0,
           ]
       );
       $client = new \GuzzleHttp\Client($conifg);
       return $client;
    }

    public function httpPost($data) {

    }



}
