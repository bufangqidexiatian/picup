<?php

namespace  Picup\CertificatePhoto;

use Picup\Kernel\ServiceContainer;
use Picup\Kernel\Provider;

class Application extends  ServiceContainer{

    protected $config = [];

    protected  $providers = [
        CertificatePhoto\ServiceProvider::class,
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