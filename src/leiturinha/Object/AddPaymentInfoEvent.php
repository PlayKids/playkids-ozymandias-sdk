<?php

namespace Leiturinha\Object;

class AddPaymentInfoEvent extends EventBase
{
    public function validate()
    {
        if(!$this->email || !$this->page_name || !$this->page_url || !$this->subscription->validate()) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
