<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\AddtoCartEventCustomData;
use Leiturinha\Object\EventBase;
use Leiturinha\Object\Facebook\AddPaymentInfoEventCustomData;
use Leiturinha\Object\Facebook\Enums\EventName;
use Leiturinha\Object\Facebook\FacebookEvent;
use Leiturinha\Object\Facebook\PageViewEventCustomData;
use Leiturinha\Object\Facebook\UserData;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\InitiateCheckoutEventCustomData;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\PurchaseEvent;
use Leiturinha\Object\PurchaseEventCustomData;

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
        $customData->currency = $event->currency;

        $facebookEvent = FacebookEventMapper::fromEvent($event);
        $facebookEvent->event_name = EventName::PURCHASE;
        $facebookEvent->custom_data = $customData;

        return $facebookEvent;
    }


    private static function fromEvent(EventBase $event){

        $userData = new UserData();
        $userData->em = hash('sha256', $event->email);

        if(!empty($event->user_data)){
            $userData->ph = hash('sha256', $event->user_data->phone);
            $userData->ln = hash('sha256', $event->user_data->last_name);
            $userData->fn = hash('sha256', $event->user_data->first_name);
            $userData->country = hash('sha256', $event->user_data->country);
        }

        $facebookEvent = new FacebookEvent();
        $facebookEvent->event_time = time();
        $facebookEvent->event_source_url = $event->page_url;

        $facebookEvent->user_data = $userData;

        //TODO removeNulls e validate deveriam estar aqui ??
        $facebookEvent->removeNulls();
        $facebookEvent->user_data->removeNulls();
        //$facebookEvent->validate();

        return $facebookEvent;
    }

}
