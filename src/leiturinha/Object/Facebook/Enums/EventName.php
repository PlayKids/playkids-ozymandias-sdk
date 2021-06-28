<?php
namespace Leiturinha\Object\Facebook\Enums;

abstract class EventName
{
    const PURCHASE = "Purchase";
    const ADD_PAYMENT_INFO = "AddPaymentInfo";
    const ADD_TO_CART = "AddToCart";
    const INITIATE_CHECKOUT = "InitiateCheckout";
    const PAGE_VIEW = "PageView";
}
