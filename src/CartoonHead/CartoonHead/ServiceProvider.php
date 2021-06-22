<?php

namespace  Picup\CartoonHead\CartoonHead;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['cartoon_head']) && $pimple['cartoon_head'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}