<?php

namespace  Picup\Kernel\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Picup\Kernel\Concrete\Config;


class ConfigProvider implements  ServiceProviderInterface{

    public function register(Container $pimple) {

        empty($pimple['config']) && $pimple['config'] = function($pimple) {
            return  new Config($pimple->getConfig() );
        };

    }

}