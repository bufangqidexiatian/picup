<?php

namespace  Picup\Matting;

use Picup\Kernel\ServiceContainer;
use Picup\Kernel\Provider;

class Application extends  ServiceContainer{

    protected $config = [];

    protected  $providers = [
       Common\ServiceProvider::class,
       Head\ServiceProvider::class,
       Portrait\ServiceProvider::class,
       Substance\ServiceProvider::class
    ];

    public function __construct($config = [])
    {
        $this->config = $config;
        parent::__construct();
    }

    public function getConfig() {
        return $this->config;
    }





}