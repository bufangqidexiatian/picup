<?php

namespace  Picup\Beautify\Beautify;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['beautify']) && $pimple['beautify'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}