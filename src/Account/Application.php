<?php

namespace  Picup\Account;

use Picup\Kernel\ServiceContainer;
use Picup\Kernel\Provider;

class Application extends  ServiceContainer{

    protected $config = [];

    protected  $providers = [
        Subscription\ServiceProvider::class
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