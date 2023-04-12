<?php

namespace Leiturinha\Object;

/**
 * SimpleLeadRegisteredEvent object
 *
 * @property string $src
 * @property string $name
 * @property string $date
 * @property string $phone
 */

class SimpleLeadRegisteredEvent extends EventBase
{
    public $src;
    public $name;
    public $date;
    public $phone;

    public function validate()
    {
        return true;
    }
}
