<?php

namespace Leiturinha\Object\Facebook;


class PurchaseEventFacebook extends FacebookEvent
{
    function __construct(OurchaseEventCustomData $eventData)
    {
        parent::__construct();

        $this->event_name = EventName::PURCHASE;
        $this->custom_data = $eventData;
    }
}
