<?php

namespace  Picup\Matting\Substance;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['substance']) && $pimple['substance'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}