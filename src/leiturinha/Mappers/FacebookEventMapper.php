<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\EventBase;
use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\PurchaseEvent;

use Leiturinha\Object\Facebook\FacebookEvent;
use Leiturinha\Object\Facebook\Enums\EventName;
use Leiturinha\Object\Facebook\Enums\ActionSource;
use Leiturinha\Object\Facebook\PurchaseEventCustomData;
use Leiturinha\Object\Facebook\AddtoCartEventCustomData;
use Leiturinha\Object\Facebook\AddPaymentInfoEventCustomData;
use Leiturinha\Object\Facebook\PageViewEventCustomData;
use Leiturinha\Object\Facebook\InitiateCheckoutEventCustomData;
use Leiturinha\Object\Facebook\UserData;

class FacebookEventMapper
{

    public static function fromAddPaymentInfoEvent(AddPaymentInfoEvent $event)
    {
        $customData = new AddPaymentInfoEventCustomData();

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::ADD_PAYMENT_INFO;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }

    public static function fromAddToCartEvent(AddToCartEvent $event)
    {
        $customData = new AddtoCartEventCustomData();

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::ADD_TO_CART;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }

    public static function fromInitiateCheckoutEvent(InitiateCheckoutEvent $event)
    {
        $customData = new InitiateCheckoutEventCustomData();

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::INITIATE_CHECKOUT;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }

    public static function fromPageView(PageViewEvent $event)
    {
        $customData = new PageViewEventCustomData();

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::PAGE_VIEW;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }

    public static function fromPurchaseEvent(PurchaseEvent $event)
    {
        $customData = new PurchaseEventCustomData();
        $customData->value = $event->value;
        $customData->currency = isset($event->currency) ? $event->currency : "BRL";

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::PURCHASE;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }

    private static function fromEvent(EventBase $event) {
        $userData = new UserData($event->email, $event->user_data);

        $facebookEvent = new FacebookEvent();
        $facebookEvent->event_time = time();
        $facebookEvent->action_source = ActionSource::WEBSITE;
        $facebookEvent->event_source_url = $event->page_url;

        $facebookEvent->user_data = $userData;

        //TODO removeNulls e validate deveriam estar aqui ??
        $facebookEvent->removeNulls();
        $facebookEvent->user_data->removeNulls();
        //$facebookEvent->validate();

        return $facebookEvent;
    }

}
