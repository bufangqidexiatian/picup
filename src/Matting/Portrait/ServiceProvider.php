<?php

namespace  Picup\Matting\Portrait;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['portrait']) && $pimple['portrait'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}