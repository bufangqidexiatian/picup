<?php

namespace  Picup\Style\Style;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['style']) && $pimple['style'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}