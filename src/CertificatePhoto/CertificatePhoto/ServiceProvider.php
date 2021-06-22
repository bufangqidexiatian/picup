<?php

namespace  Picup\CertificatePhoto\CertificatePhoto;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements  ServiceProviderInterface{

    public function register(Container $pimple) {
        !isset($pimple['certificatePhoto']) && $pimple['certificatePhoto'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}