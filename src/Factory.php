<?php

/**
 *  皮卡智能 php SDK
 *  @Author LGD
 * @Time 2020-11-27 17:10
 */

namespace Picup;

class Factory{

    public static function main($namespace, $params = [] ) {
        $application = "\\Picup\\{$namespace}\\Application";
        return new $application($params);
    }

    public function __callStatic($name,$arguments)
    {

        return self::main($name, ...$arguments);
    }


}