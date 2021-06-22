<?php


namespace  Picup\Account\Subscription;

use Pimple\Container;
use Picup\Kernel\BaseClient;


class Client  extends  BaseClient{

    const MY_SUBSCRIPTION = 'https://picupapi.tukeli.net/api/v1/mySubscription';


    public function __construct(Container $app)
    {
        parent::__construct($app);
    }


    /**
     *   查询账余额
     */
    public function searhcSubscription() {
        $res = $this->app->http->get(self::MY_SUBSCRIPTION);

        $result = json_decode($res->getBody(),true);


        if (isset($result['code']) && $result['code'] == 0 ) {
            return $result['data'];
        }else {
            return $result['msg'];
        }

    }







}
