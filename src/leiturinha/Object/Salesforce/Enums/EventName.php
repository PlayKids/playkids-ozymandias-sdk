<?php
namespace Leiturinha\Object\Salesforce\Enums;

abstract class EventName
{
    const PURCHASE = "Purchase";
    const ADD_PAYMENT_INFO = "AddPaymentInfo";
    const ADD_TO_CART = "AddToCart";
    const INITIATE_CHECKOUT = "InitiateCheckout";
    const PAGE_VIEW = "pageview";

    const REGISTER = "register";
    const LOGIN = "login";
    const CHILDREN_REGISTER = "children-register";
    const SUBSCRIPTION_COMPLETE = "subscription-complete";
    const LEAD_FORM = "lead-form";

    const SUBSCRIPTION_PAID = "subscription-paid";
    CONST SUBSCRIPTION_REFUND = "subscription-refund";
    CONST INVOICE_CHECKOUT = "invoice-checkout";
    CONST PRODUCTION_ORDER_CREATED = "production-order-created";
    CONST BILL_CREATED = "bill-created";
    const SHIPPING_COMPANY_REGISTERED = "shipping-company-registered";
    const KIT_READY = "kit-ready";
    const KIT_DELIVERED = "kit-delivered";
    const CALLCENTER_CONTACT = "callcenter-contact";
    const SUBSCRIPTION_CANCELLED = "subscription-canceled";
    const SUBSCRIPTION_CONTINUE = "subscription-continue";

    const LEAD_RAZOES_ACREDITAR = "lead-razoes-acreditar";
}
