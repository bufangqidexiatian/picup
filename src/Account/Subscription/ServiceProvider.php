<?php

namespace  Picup\Account\Subscription;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['subscription']) && $pimple['subscription'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}