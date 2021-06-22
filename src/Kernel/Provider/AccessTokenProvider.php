<?php

namespace  E360\Kernel\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use E360\Kernel\Concrete\AccessToken;


class AccessTokenProvider implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        empty($pimple['access_token']) && $pimple['access_token'] = function($pimple) {
            return  new AccessToken($pimple);
        };

    }

}