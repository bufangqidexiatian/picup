<?php

namespace  Picup\CartoonHead;

use Picup\Kernel\ServiceContainer;
use Picup\Kernel\Provider;

class Application extends  ServiceContainer{

    protected $config = [];

    protected  $providers = [
        CartoonHead\ServiceProvider::class
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