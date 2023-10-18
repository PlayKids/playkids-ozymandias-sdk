<?php

namespace Leiturinha\Object;

/**
 * PurchaseEvent object
 *
 * @property double $plan_price
 * @property string $currency
 */

class PurchaseEventOzy extends EventBaseOzy
{
    public $plan_price;
    public $currency;

    public function validate()
    {
        return true;
    }
}

