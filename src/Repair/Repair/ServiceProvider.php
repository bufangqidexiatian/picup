<?php

namespace  Picup\Repair\Repair;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['repair']) && $pimple['repair'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}