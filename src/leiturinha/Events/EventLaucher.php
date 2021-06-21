<?php

namespace Leiturinha\Events;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Mappers\FacebookEventMapper;

use Leiturinha\Object\PurchaseEvent;
use function Leiturinha\Mappers\FacebookEventMapper;

class EventLaucher
{
    public static function firePageViewEvent(PageViewEvent $event){

        $facebookEvent = FacebookEventMapper::fromPageView($event);
        $facebookEvent->run();
    }

    public static function fireAddPaymentInfoEvent(AddPaymentInfoEvent $event){

        $facebookEvent = FacebookEventMapper::fromAddPaymentInfoEvent($event);
        $facebookEvent->run();
    }

    public static function fireAddToCartEvent(AddToCartEvent $event){

        $facebookEvent = FacebookEventMapper::fromAddToCartEvent($event);
        $facebookEvent->run();
    }

    public static function fireInitiateCheckoutEvent(InitiateCheckoutEvent $event){

        $facebookEvent = FacebookEventMapper::fromInitiateCheckoutEvent($event);
        $facebookEvent->run();
    }

    public static function firePurchaseEvent(PurchaseEvent $event){

        $facebookEvent = FacebookEventMapper::fromPurchaseEvent($event);
        $facebookEvent->run();
    }
}
