<?php

namespace Leiturinha\Object;

class AddPaymentInfoEventOzy extends EventBaseOzy
{
    public function validate()
    {
        if(!$this->email || !$this->page || !$this->subscription->validate()) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
