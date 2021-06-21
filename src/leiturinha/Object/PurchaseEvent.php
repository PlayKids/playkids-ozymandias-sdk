<?php

namespace Leiturinha\Object;

/**
 * PurchaseEvent object
 *
 * @property double $value
 * @property string $currency
 */

class PurchaseEvent extends EventBase
{
    public $value;
    public $currency;

    public function validate()
    {
        return true;
    }
}

