<?php

namespace  E360\Kernel\Concrete;

use Pimple\Container;
use E360\Kernel\BaseClient;

class AccessToken extends  BaseClient{

    const CLIENT_LOGIN = 'https://api.e.360.cn/uc/account/clientLogin';

    public function __construct(Container $app)
    {
        parent::__construct( $app);
    }
    
    public function getClientAccessToken() {
        $encry_password =  $this->eEncry();

        $cmd = 'curl --header "apiKey:'.$this->app->config->appid.'" https://api.e.360.cn/account/clientLogin --data "username='.$this->app->config->username.'&passwd='.$encry_password.'" 2>&1';

        exec($cmd,$message);
        if (isset($message[3])) {
            $message = json_decode($message[3],true);
            return $message;
        }
        
    }

    public function eEncry() {
        $encry_secret_key =  substr($this->app->config->secret,0,16);
        $iv = substr($this->app->config->secret,16,16);
        $result = mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$encry_secret_key,md5($this->app->config->password),'cbc',$iv);
        $result = bin2hex($result);
        return $result;
    }


}