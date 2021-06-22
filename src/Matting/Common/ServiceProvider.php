<?php

namespace  Picup\Matting\Common;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['common']) && $pimple['common'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}