<?php

namespace  Picup\Kernel\Concrete;


class Config {


    public function __construct(array $items)
    {
        foreach ($items as $k => $item) {
            $this->$k = $item;
        }
    }


}