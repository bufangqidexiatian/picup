<?php

namespace  Picup\Matting\Head;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['head']) && $pimple['head'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}