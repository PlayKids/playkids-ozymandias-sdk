<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddPaymentInfoEventCustomData;
use Leiturinha\Object\Facebook\PageViewEventCustomData;
use Leiturinha\Object\Facebook\PageViewEventFacebook;
use Leiturinha\Object\Facebook\UserData;
use Leiturinha\Object\PageViewEvent;

class FacebookEventMapper
{
    public static function fromPageView(PageViewEvent $event)
    {
        $facebookEventData = new PageViewEventCustomData();
        $userData = new UserData();
        $userData->email = $event->email;

        $facebookEvent = new PageViewEventFacebook();
        $facebookEvent->event_time = time();
        $facebookEvent->event_source_url = $event->event_source_url;

        $facebookEvent->user_data = $userData;
        $facebookEvent->custom_data = $facebookEventData;

        return $facebookEvent;
    }

    public static function fromAddPaymentInfoEvent(AddPaymentInfoEvent $event)
    {
        $facebookEventData = new AddPaymentInfoEventCustomData();
        $facebookEvent = new AddPaymentInfoEventFacebook($facebookEventData);

        return $facebookEvent;
    }

}
