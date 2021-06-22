<?php
namespace Picup\Kernel;

use Picup\Kernel\Provider;
use Pimple\Container;
use Picup\Launch\Keywords;
use Picup\Kernel\Provider\ConfigProvider;

class ServiceContainer extends Container {

    public function __construct()
    {
        $this->registerProvider($this->getProvider());
    }

    public function registerProvider( array $providers) {
        foreach ($providers as $provider) {
            parent::register( new $provider() );
        }
    }

    public function __get($id) {
        return $this->offsetGet($id);
    }

    public function getProvider() {
        return array_merge([
            Provider\ConfigProvider::class,
            Provider\HttpProvider::class
        ],$this->providers);
    }



}
