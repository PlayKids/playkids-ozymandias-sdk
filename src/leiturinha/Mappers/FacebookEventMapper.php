<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddPaymentInfoEventCustomData;
use Leiturinha\Object\Facebook\PageViewEventCustomData;
use Leiturinha\Object\Facebook\PageViewEventFacebook;
use Leiturinha\Object\PageViewEvent;

class FacebookEventMapper
{
    public static function fromPageViewEvent(PageViewEvent $event)
    {
        $facebookEventData = new PageViewEventCustomData();
        $facebookEvent = new PageViewEventFacebook($facebookEventData, $event->page_name);

        return $facebookEvent;
    }

    public static function fromAddPaymentInfoEvent(AddPaymentInfoEvent $event)
    {
        $facebookEventData = new AddPaymentInfoEventCustomData();
        $facebookEvent = new AddPaymentInfoEventFacebook($facebookEventData);

        return $facebookEvent;
    }

    public static function fromPageView(PageViewEvent $event)
    {
        $facebookEventData = new PageViewEventCustomData();
        $facebookEvent = new PageViewEventFacebook($facebookEventData, $event->page_name);

        return $facebookEvent;
    }
}
