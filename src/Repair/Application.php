<?php

namespace  Picup\Repair;

use Picup\Kernel\ServiceContainer;
use Picup\Kernel\Provider;

class Application extends  ServiceContainer{

    protected $config = [];

    protected  $providers = [
        Repair\ServiceProvider::class,
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