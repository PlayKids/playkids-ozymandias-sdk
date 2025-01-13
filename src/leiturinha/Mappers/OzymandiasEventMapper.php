<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\EventBase;
use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\ChildrenRegisterEvent;
use Leiturinha\Object\UserRegisterEvent;
use Leiturinha\Object\LeadFormEvent;
use Leiturinha\Object\SimpleLeadRegisteredEvent;
use Leiturinha\Object\LoginEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\PurchaseEvent;
use Leiturinha\Object\AmbassadorInitiatedEvent;

use Leiturinha\Object\SubscriptionPaidEvent;
use Leiturinha\Object\SubscriptionRefundEvent;
use Leiturinha\Object\SubscriptionAlteredEvent;
use Leiturinha\Object\InvoiceCheckoutEvent;
use Leiturinha\Object\ProductionOrderCreatedEvent;
use Leiturinha\Object\BillCreatedEvent;
use Leiturinha\Object\ShippingCompanyRegisteredEvent;
use Leiturinha\Object\KitReadyEvent;
use Leiturinha\Object\KitDeliveredEvent;
use Leiturinha\Object\CallcenterContactEvent;
use Leiturinha\Object\SubscriptionCanceledEvent;
use Leiturinha\Object\SubscriptionContinueEvent;
use Leiturinha\Object\SignedAdoletaPlanEvent;
use Leiturinha\Object\AdoletaRenewalEvent;
use Leiturinha\Object\SignedLettersPlanEvent;

use Leiturinha\Object\Ozymandias\OzymandiasEvent;
use Leiturinha\Object\Ozymandias\Enums\EventName;
use Leiturinha\Object\Ozymandias\Enums\ActionSource;
use Leiturinha\Object\Ozymandias\UserData;
use Leiturinha\Object\Ozymandias\PurchaseEventCustomData;
use Leiturinha\Object\Ozymandias\AddtoCartEventCustomData;
use Leiturinha\Object\Ozymandias\AddPaymentInfoEventCustomData;
use Leiturinha\Object\Ozymandias\InitiateCheckoutEventCustomData;
use Leiturinha\Object\Ozymandias\ChildrenRegisterEventCustomData;
use Leiturinha\Object\Ozymandias\UserRegisterEventCustomData;
use Leiturinha\Object\Ozymandias\LeadFormEventCustomData;
use Leiturinha\Object\Ozymandias\SimpleLeadRegisteredEventCustomData;
use Leiturinha\Object\Ozymandias\LoginEventCustomData;
use Leiturinha\Object\Ozymandias\PageViewEventCustomData;
use Leiturinha\Object\Ozymandias\AmbassadorInitiatedEventCustomData;

use Leiturinha\Object\Ozymandias\SubscriptionPaidEventCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionRefundEventCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionAlteredEventCustomData;
use Leiturinha\Object\Ozymandias\InvoiceCheckoutEventCustomData;
use Leiturinha\Object\Ozymandias\ProductionOrderCreatedEventCustomData;
use Leiturinha\Object\Ozymandias\BillCreatedEventCustomData;
use Leiturinha\Object\Ozymandias\ShippingCompanyRegisteredEventCustomData;
use Leiturinha\Object\Ozymandias\KitReadyEventCustomData;
use Leiturinha\Object\Ozymandias\KitDeliveredEventCustomData;
use Leiturinha\Object\Ozymandias\CallcenterContactEventCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionCanceledEventCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionContinueEventCustomData;
use Leiturinha\Object\Ozymandias\SignedAdoletaPlanEventCustomData;
use Leiturinha\Object\Ozymandias\AdoletaRenewalEventCustomData;
use Leiturinha\Object\Ozymandias\SignedLettersPlanEventCustomData;

class OzymandiasEventMapper
{

    public static function fromAddPaymentInfoEvent(AddPaymentInfoEvent $event)
    {
        $customData = new AddPaymentInfoEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::ADD_PAYMENT_INFO;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromAddToCartEvent(AddToCartEvent $event)
    {
        $customData = new AddtoCartEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::ADD_TO_CART;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromInitiateCheckoutEvent(InitiateCheckoutEvent $event)
    {
        $customData = new InitiateCheckoutEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::INITIATE_CHECKOUT;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromPurchaseEvent(PurchaseEvent $event)
    {
        $customData = new PurchaseEventCustomData();

            $customData->plan_price = $event->plan_price;
            $customData->currency = isset($event->currency) ? $event->currency : "BRL";

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::PURCHASE;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromChildrenRegisterEvent(ChildrenRegisterEvent $event)
    {
        $customData = new ChildrenRegisterEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::CHILDREN_REGISTER;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromUserRegisterEvent(UserRegisterEvent $event)
    {
        $customData = new UserRegisterEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::USER_REGISTER;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromAmbassadorInitiatedEvent(AmbassadorInitiatedEvent $event)
    {
        $customData = new AmbassadorInitiatedEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::AMBASSADOR_INITIATED;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromLeadFormEvent(LeadFormEvent $event)
    {
        $customData = new LeadFormEventCustomData();

            $customData->src = $event->src;
            $customData->name = $event->name;
            $customData->phone = $event->phone;
            $customData->campaign = $event->campaign;
            $customData->device = $event->device;
            $customData->country = $event->country;
            $customData->language = $event->language;
            $customData->date = $event->date;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::LEAD_FORM;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromSimpleLeadRegisteredEvent(SimpleLeadRegisteredEvent $event)
    {
        $customData = new SimpleLeadRegisteredEventCustomData();

            $customData->src = $event->src;
            $customData->name = $event->name;
            $customData->date = $event->date;
            $customData->phone = $event->phone;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SIMPLE_LEAD_REGISTERED;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromLoginEvent(LoginEvent $event)
    {
        $customData = new LoginEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::LOGIN;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    public static function fromPageView(PageViewEvent $event)
    {
        $customData = new PageViewEventCustomData();

        $customData->data = $event->data;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);

        $ozymandiasEvent->event_name = EventName::PAGE_VIEW;
        $ozymandiasEvent->custom_data = $customData;

        return $ozymandiasEvent;
    }

    private static function fromOzyEvent(EventBase $event) {
        $ozymandiasEvent = new OzymandiasEvent();
        $ozymandiasEvent->event_time = time();

        $ozymandiasEvent->event_id = $event->event_id;
        $ozymandiasEvent->action_source = ActionSource::WEBSITE;
        $ozymandiasEvent->contact_key = $event->email;
        $ozymandiasEvent->channel = 'Leiturinha';
        $ozymandiasEvent->utm_source = ""; //$_GET['utm_source'] ? $_GET['utm_source'] : "";
        $ozymandiasEvent->utm_medium = ""; //$_GET['utm_medium'] ? $_GET['utm_medium'] : "";
        $ozymandiasEvent->utm_campaign = ""; // $_GET['utm_campaign'] ? $_GET['utm_campaign'] : "";
        $ozymandiasEvent->page = trim($event->page);


        if (isset($_SERVER['HTTP_HOST'])) {
            $ozymandiasEvent->event_source_url = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        } else {
            $ozymandiasEvent->event_source_url = "https://leiturinha.com.br";
        }

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $ozymandiasEvent->browser_string = $_SERVER['HTTP_USER_AGENT'];
        } else {
            $ozymandiasEvent->browser_string = "Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/109.0.0.0 Safari\/537.36";
        }

        $ozymandiasEvent->client_ip_address = self::getClientIp();

        if(!empty($event->fbc)){
            $ozymandiasEvent->fbc = $event->fbc;
        }
        if(!empty($event->fbp)){
            $ozymandiasEvent->fbp = $event->fbp;
        }

        //     $ozymandiasEvent->data = $ozymandias->handleCRMData($data, $data['page']);

        //     if ($event === 'lead-form') {
        //         $ozymandiasEvent->user_data = $ozymandias->getLeadData($data);
        //     }
        //     if ($event === 'simple-lead-registered') {
        //         $ozymandiasEvent->data = $ozymandias->getSimpleLeadData($data);
        //     }

        //     if ($userDataRequired && $data['user'] instanceof User) {
        //         //$ozymandiasEvent->user_data = $ozymandias->getUserData($data['user_data']);
        //         $ozymandiasEvent->user_data = $ozymandias->getUserData($data['user']);
        //     }

        //     if ($userDataRequired && $data['cartItems'] instanceof CartItems) {
        //         $ozymandiasEvent->user_data = $ozymandias->getUserData($data['cartItems']->idCart->user, $data['cartItems']);
        //     }

        $ozymandiasEvent->user_data = $event->user_data;

        $ozymandiasEvent->custom_data = isset($event->custom_data) ? $event->custom_data : "";


        $ozymandiasEvent->subscription = isset($event->cart_item) ? $event->cart_item : "";


        //TODO removeNulls e validate deveriam estar aqui ??
        //$ozymandiasEvent->removeNulls();
        //$ozymandiasEvent->user_data->removeNulls();
        //$ozymandiasEvent->validate();



        return $ozymandiasEvent;
    }

    private static function fromEvent(EventBase $event) {
        $userData = new UserData($event->email, $event->user_data);

        $ozymandiasEvent = new OzymandiasEvent();
        $ozymandiasEvent->event_time = time();
        $ozymandiasEvent->action_source = ActionSource::WEBSITE;
        $ozymandiasEvent->event_source_url = $event->page_url;
        $ozymandiasEvent->event_id = $event->event_id;

        $ozymandiasEvent->user_data = $userData;

        //TODO removeNulls e validate deveriam estar aqui ??
        $ozymandiasEvent->removeNulls();
        $ozymandiasEvent->user_data->removeNulls();
        //$ozymandiasEvent->validate();

        return $ozymandiasEvent;
    }



    public static function fromSubscriptionPaidEvent(SubscriptionPaidEvent $event)
    {
        $customData = new SubscriptionPaidEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SUBSCRIPTION_PAID;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;


        // LOG DE SAIDA DO JSON
        // $local_log=dirname(__FILE__).'/../../../../../../storage/logs/logs.txt';
        // $fp = fopen($local_log, "a+");
        // fwrite($fp, date("Y-m-d H:i:s")."\n\n");
        // fwrite($fp, "-- event->custom_data do fromSubscriptionPaidEvent\n");
        // $event_string = json_encode($event->custom_data, JSON_PRETTY_PRINT);
        // fwrite($fp, $event_string."\n\n");
        // fclose($fp);

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionRefundEvent(SubscriptionRefundEvent $event)
    {
        $customData = new SubscriptionRefundEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SUBSCRIPTION_REFUND;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionAlteredEvent(SubscriptionAlteredEvent $event)
    {
        $customData = new SubscriptionAlteredEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SUBSCRIPTION_ALTERED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromInvoiceCheckoutEvent(InvoiceCheckoutEvent $event)
    {
        $customData = new InvoiceCheckoutEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::INVOICE_CHECKOUT;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromProductionOrderCreatedEvent(ProductionOrderCreatedEvent $event)
    {
        $customData = new ProductionOrderCreatedEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::PRODUCTION_ORDER_CREATED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromBillCreatedEvent(BillCreatedEvent $event)
    {
        $customData = new BillCreatedEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::BILL_CREATED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromShippingCompanyRegisteredEvent(ShippingCompanyRegisteredEvent $event)
    {
        $customData = new ShippingCompanyRegisteredEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SHIPPING_COMPANY_REGISTERED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromKitReadyEvent(KitReadyEvent $event)
    {
        $customData = new KitReadyEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::KIT_READY;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromKitDeliveredEvent(KitDeliveredEvent $event)
    {
        $customData = new KitDeliveredEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::KIT_DELIVERED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromCallcenterContactEvent(CallcenterContactEvent $event)
    {

        $customData = new CallcenterContactEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::CALLCENTER_CONTACT;
        $ozymandiasEvent->custom_data = $event->custom_data; //$event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionCanceledEvent(SubscriptionCanceledEvent $event)
    {
        $customData = new SubscriptionCanceledEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SUBSCRIPTION_CANCELED;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionContinueEvent(SubscriptionContinueEvent $event)
    {
        $customData = new SubscriptionContinueEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SUBSCRIPTION_CONTINUE;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromSignedAdoletaPlanEvent(SignedAdoletaPlanEvent $event)
    {
        $customData = new SignedAdoletaPlanEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SIGNED_ADOLETA_PLAN;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromAdoletaRenewalEvent(AdoletaRenewalEvent $event)
    {
        $customData = new AdoletaRenewalEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::ADOLETA_RENEWAL;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    public static function fromSignedLettersPlanEvent(SignedLettersPlanEvent $event)
    {
        $customData = new SignedLettersPlanEventCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventName::SIGNED_LETTERS_PLAN;
        $ozymandiasEvent->custom_data = $event->custom_data; //$customData;

        return $ozymandiasEvent;
    }

    private static function getClientIp() {
        return $_SERVER['HTTP_X_FORWARDED_FOR']
            ?? $_SERVER['REMOTE_ADDR']
            ?? $_SERVER['HTTP_CLIENT_IP']
            ?? '';
    }
}
