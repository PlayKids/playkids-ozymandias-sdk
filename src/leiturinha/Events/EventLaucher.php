<?php

namespace Leiturinha\Events;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Mappers\FacebookEventMapper;

use Leiturinha\Object\Platform;
use Leiturinha\Object\PurchaseEvent;
use Leiturinha\Traits\KinesisManager;
use function Leiturinha\Mappers\FacebookEventMapper;

class EventLaucher
{
    public static function firePageViewEvent(PageViewEvent $event){


        //$kinesisManager = new KinesisManager();

        $facebookEvent = FacebookEventMapper::fromPageView($event);
        $facebookEvent->removeNulls();
        print_r(json_encode($facebookEvent));die;
        //$kinesisManager->addEvent(json_encode($facebookEvent), Platform::PLATFORM_FACEBOOK);
    }

    public static function fireAddPaymentInfoEvent(AddPaymentInfoEvent $event){

        $kinesisManager = new KinesisManager();

        $facebookEvent = FacebookEventMapper::fromAddPaymentInfoEvent($event);
        $facebookEvent->removeNulls();
        $kinesisManager->addEvent(json_encode($facebookEvent), Platform::PLATFORM_FACEBOOK);
    }

    public static function fireAddToCartEvent(AddToCartEvent $event){

        $kinesisManager = new KinesisManager();

        $facebookEvent = FacebookEventMapper::fromAddToCartEvent($event);
        $facebookEvent->removeNulls();
        $kinesisManager->addEvent(json_encode($facebookEvent), Platform::PLATFORM_FACEBOOK);
    }

    public static function fireInitiateCheckoutEvent(InitiateCheckoutEvent $event){

        $kinesisManager = new KinesisManager();

        $facebookEvent = FacebookEventMapper::fromInitiateCheckoutEvent($event);
        $facebookEvent->removeNulls();
        $kinesisManager->addEvent(json_encode($facebookEvent), Platform::PLATFORM_FACEBOOK);
    }

    public static function firePurchaseEvent(PurchaseEvent $event){

        $kinesisManager = new KinesisManager();

        $facebookEvent = FacebookEventMapper::fromPurchaseEvent($event);
        $facebookEvent->removeNulls();
        $kinesisManager->addEvent(json_encode($facebookEvent), Platform::PLATFORM_FACEBOOK);
    }
}
