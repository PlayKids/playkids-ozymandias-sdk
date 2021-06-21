<?php

namespace Leiturinha\Object;

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
    }
}
