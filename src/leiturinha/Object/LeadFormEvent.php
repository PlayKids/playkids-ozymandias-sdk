<?php

namespace Leiturinha\Object;

/**
 * SimpleLeadRegisteredEvent object
 *
 * @property string $src
 * @property string $name
 * @property string $phone
 * @property string $campaign
 * @property string $device
 * @property string $country
 * @property string $language
 * @property string $date
 */

class LeadFormEvent extends EventBase
{
    public $src;
    public $name;
    public $phone;
    public $campaign;
    public $device;
    public $country;
    public $language;
    public $date;

    public function validate()
    {
        return true;
    }
}

