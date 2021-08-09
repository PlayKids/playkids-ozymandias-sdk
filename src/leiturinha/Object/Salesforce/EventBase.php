<?php

namespace Leiturinha\Object\Salesforce;

use Leiturinha\Handler;

abstract class EventBase
{

    public function validate()
    {
        return $this;
    }

    public function removeNulls()
    {
        foreach ($this as $key => $value) {
            if(!$value) {
                unset($this->$key);
            }
        }
    }

    /**
     * Get array attributes
     *
     * @return void
     */
    public function getArray()
    {
        return get_object_vars($this);
    }
}
