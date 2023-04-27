<?php

namespace Leiturinha\Object\Enums;

class EventName
{
    const PURCHASE = "Purchase";
    const ADD_PAYMENT_INFO = "AddPaymentInfo";
    const ADD_TO_CART = "AddToCart";
    const INITIATE_CHECKOUT = "InitiateCheckout";
    const PAGE_VIEW = "PageView";
    const CHILDREN_REGISTER =  "ChildrenRegister";
    const USER_REGISTER =  "UserRegister";
    const LEAD_FORM =  "LeadForm";
    const SIMPLE_LEAD_REGISTERED =  "SimpleLeadRegistered";
    const LOGIN =  "Login";
    const SUBSCRIPTION_PAID = "SubscriptionPaid";
    const SUBSCRIPTION_REFUND = "SubscriptionRefund";
    const SUBSCRIPTION_ALTERED = "SubscriptionAltered";
    const INVOICE_CHECKOUT = "InvoiceCheckout";
    const PRODUCTION_ORDER_CREATED = "ProductionOrderCreated";
    const BILL_CREATED = "BillCreated";
    const SHIPPING_COMPANY_REGISTERED = "ShippingCompanyRegistered";
    const KIT_READY = "KitReady";
    const KIT_DELIVERED = "KitDelivered";
    const CALLCENTER_CONTACT = "CallcenterContact";
    const SUBSCRIPTION_CANCELED = "SubscriptionCanceled";
    const SUBSCRIPTION_CONTINUE = "SubscriptionContinue";
    const SIGNED_ADOLETA_PLAN = "SignedAdoletaPlan";
    const ADOLETA_RENEWAL = "AdoletaRenewal";
    const SIGNED_LETTERS_PLAN = "SignedLettersPlan";
    const AMBASSADOR_INITIATED = "AmbassadorInitiated";

}
