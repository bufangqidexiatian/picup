<?php

namespace  Picup\Kernel\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Picup\Kernel\Concrete\Http;


class HttpProvider implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        empty($pimple['http']) && $pimple['http'] = function($pimple) {
            return  new Http($pimple);
        };

    }

}