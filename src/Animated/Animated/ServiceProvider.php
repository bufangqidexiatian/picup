<?php

namespace  Picup\Animated\Animated;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['animated']) && $pimple['animated'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}