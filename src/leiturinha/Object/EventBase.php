<?php

namespace Leiturinha\Object;

use Leiturinha\Handler;

abstract class EventBase
{
    public function removeNulls()
    {
        foreach ($this as $key => $value) {
            if(!$value) {
                unset($this->$key);
            }
        }
    }

    public function validate()
    {
        return true;
    }
}
