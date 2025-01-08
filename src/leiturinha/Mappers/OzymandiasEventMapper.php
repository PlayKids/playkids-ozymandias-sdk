<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\EventBaseOzy;
use Leiturinha\Object\AddPaymentInfoEventOzy;
use Leiturinha\Object\AddToCartEventOzy;
use Leiturinha\Object\InitiateCheckoutEventOzy;
use Leiturinha\Object\ChildrenRegisterEventOzy;
use Leiturinha\Object\UserRegisterEventOzy;
use Leiturinha\Object\LeadFormEventOzy;
use Leiturinha\Object\SimpleLeadRegisteredEventOzy;
use Leiturinha\Object\LoginEventOzy;
use Leiturinha\Object\PageViewEventOzy;
use Leiturinha\Object\PurchaseEventOzy;
use Leiturinha\Object\AmbassadorInitiatedEventOzy;

use Leiturinha\Object\SubscriptionPaidEventOzy;
use Leiturinha\Object\SubscriptionRefundEventOzy;
use Leiturinha\Object\SubscriptionAlteredEventOzy;
use Leiturinha\Object\InvoiceCheckoutEventOzy;
use Leiturinha\Object\ProductionOrderCreatedEventOzy;
use Leiturinha\Object\BillCreatedEventOzy;
use Leiturinha\Object\ShippingCompanyRegisteredEventOzy;
use Leiturinha\Object\KitReadyEventOzy;
use Leiturinha\Object\KitDeliveredEventOzy;
use Leiturinha\Object\CallcenterContactEventOzy;
use Leiturinha\Object\SubscriptionCanceledEventOzy;
use Leiturinha\Object\SubscriptionContinueEventOzy;
use Leiturinha\Object\SignedAdoletaPlanEventOzy;
use Leiturinha\Object\AdoletaRenewalEventOzy;
use Leiturinha\Object\SignedLettersPlanEventOzy;
use Leiturinha\Object\ImportEventOzy;

use Leiturinha\Object\Enums\EventNameOzy;

use Leiturinha\Object\Ozymandias\Enums\ActionSource;
use Leiturinha\Object\Ozymandias\OzymandiasEvent;
use Leiturinha\Object\Ozymandias\UserData;
use Leiturinha\Object\Ozymandias\PurchaseEventOzyCustomData;
use Leiturinha\Object\Ozymandias\AddtoCartEventOzyCustomData;
use Leiturinha\Object\Ozymandias\AddPaymentInfoEventOzyCustomData;
use Leiturinha\Object\Ozymandias\InitiateCheckoutEventOzyCustomData;
use Leiturinha\Object\Ozymandias\ChildrenRegisterEventOzyCustomData;
use Leiturinha\Object\Ozymandias\UserRegisterEventOzyCustomData;
use Leiturinha\Object\Ozymandias\LeadFormEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SimpleLeadRegisteredEventOzyCustomData;
use Leiturinha\Object\Ozymandias\LoginEventOzyCustomData;
use Leiturinha\Object\Ozymandias\PageViewEventOzyCustomData;
use Leiturinha\Object\Ozymandias\AmbassadorInitiatedEventOzyCustomData;

use Leiturinha\Object\Ozymandias\SubscriptionPaidEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionRefundEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionAlteredEventOzyCustomData;
use Leiturinha\Object\Ozymandias\InvoiceCheckoutEventOzyCustomData;
use Leiturinha\Object\Ozymandias\ProductionOrderCreatedEventOzyCustomData;
use Leiturinha\Object\Ozymandias\BillCreatedEventOzyCustomData;
use Leiturinha\Object\Ozymandias\ShippingCompanyRegisteredEventOzyCustomData;
use Leiturinha\Object\Ozymandias\KitReadyEventOzyCustomData;
use Leiturinha\Object\Ozymandias\KitDeliveredEventOzyCustomData;
use Leiturinha\Object\Ozymandias\CallcenterContactEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionCanceledEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SubscriptionContinueEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SignedAdoletaPlanEventOzyCustomData;
use Leiturinha\Object\Ozymandias\AdoletaRenewalEventOzyCustomData;
use Leiturinha\Object\Ozymandias\SignedLettersPlanEventOzyCustomData;
use Leiturinha\Object\Ozymandias\ImportEventOzyCustomData;

class OzymandiasEventMapper
{

    public static function fromAddPaymentInfoEvent(AddPaymentInfoEventOzy $event)
    {
        $customData = new AddPaymentInfoEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::ADD_PAYMENT_INFO;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromAddToCartEvent(AddToCartEventOzy $event)
    {
        $customData = new AddtoCartEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::ADD_TO_CART;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromInitiateCheckoutEvent(InitiateCheckoutEventOzy $event)
    {
        $customData = new InitiateCheckoutEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::INITIATE_CHECKOUT;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromPurchaseEvent(PurchaseEventOzy $event)
    {
        $customData = new PurchaseEventOzyCustomData();

            $customData->plan_price = $event->plan_price;
            $customData->currency = isset($event->currency) ? $event->currency : "BRL";

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::PURCHASE;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        $ozymandiasEvent->plan_price = $event->plan_price;
        $ozymandiasEvent->currency = isset($event->currency) ? $event->currency : "BRL";

        return $ozymandiasEvent;
    }

    public static function fromChildrenRegisterEvent(ChildrenRegisterEventOzy $event)
    {
        $customData = new ChildrenRegisterEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::CHILDREN_REGISTER;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromUserRegisterEvent(UserRegisterEventOzy $event)
    {
        $customData = new UserRegisterEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::USER_REGISTER;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromAmbassadorInitiatedEvent(AmbassadorInitiatedEventOzy $event)
    {
        $customData = new AmbassadorInitiatedEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::AMBASSADOR_INITIATED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromLeadFormEvent(LeadFormEventOzy $event)
    {
        $customData = new LeadFormEventOzyCustomData();

            $customData->src = $event->src;
            $customData->name = $event->name;
            $customData->phone = $event->phone;
            $customData->campaign = $event->campaign;
            $customData->device = $event->device;
            $customData->country = $event->country;
            $customData->language = $event->language;
            $customData->date = $event->date;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::LEAD_FORM;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSimpleLeadRegisteredEvent(SimpleLeadRegisteredEventOzy $event)
    {
        $customData = new SimpleLeadRegisteredEventOzyCustomData();

            $customData->src = $event->src;
            $customData->name = $event->name;
            $customData->date = $event->date;
            $customData->phone = $event->phone;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SIMPLE_LEAD_REGISTERED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromLoginEvent(LoginEventOzy $event)
    {
        $customData = new LoginEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::LOGIN;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromPageView(PageViewEventOzy $event)
    {
        $customData = new PageViewEventOzyCustomData();

        $customData->data = $event->data;

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);

        $ozymandiasEvent->event_name = EventNameOzy::PAGE_VIEW;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    private static function fromOzyEvent(EventBaseOzy $event) {
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
            $ozymandiasEvent->event_source_url = "https://localhost";
        }

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $ozymandiasEvent->browser_string = $_SERVER['HTTP_USER_AGENT'];
        } else {
            $ozymandiasEvent->browser_string = "Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/109.0.0.0 Safari\/537.36";
        }


        $ozymandiasEvent->client_ip_address = self::getClientIp();


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

    private static function fromEvent(EventBaseOzy $event) {
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



    public static function fromSubscriptionPaidEvent(SubscriptionPaidEventOzy $event)
    {
        $customData = new SubscriptionPaidEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SUBSCRIPTION_PAID;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;


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

    public static function fromSubscriptionRefundEvent(SubscriptionRefundEventOzy $event)
    {
        $customData = new SubscriptionRefundEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SUBSCRIPTION_REFUND;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionAlteredEvent(SubscriptionAlteredEventOzy $event)
    {
        $customData = new SubscriptionAlteredEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SUBSCRIPTION_ALTERED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromInvoiceCheckoutEvent(InvoiceCheckoutEventOzy $event)
    {
        $customData = new InvoiceCheckoutEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::INVOICE_CHECKOUT;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromProductionOrderCreatedEvent(ProductionOrderCreatedEventOzy $event)
    {
        $customData = new ProductionOrderCreatedEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::PRODUCTION_ORDER_CREATED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromBillCreatedEvent(BillCreatedEventOzy $event)
    {
        $customData = new BillCreatedEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::BILL_CREATED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromShippingCompanyRegisteredEvent(ShippingCompanyRegisteredEventOzy $event)
    {
        $customData = new ShippingCompanyRegisteredEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SHIPPING_COMPANY_REGISTERED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromKitReadyEvent(KitReadyEventOzy $event)
    {
        $customData = new KitReadyEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::KIT_READY;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromKitDeliveredEvent(KitDeliveredEventOzy $event)
    {
        $customData = new KitDeliveredEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::KIT_DELIVERED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromCallcenterContactEvent(CallcenterContactEventOzy $event)
    {

        $customData = new CallcenterContactEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::CALLCENTER_CONTACT;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionCanceledEvent(SubscriptionCanceledEventOzy $event)
    {
        $customData = new SubscriptionCanceledEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SUBSCRIPTION_CANCELED;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSubscriptionContinueEvent(SubscriptionContinueEventOzy $event)
    {
        $customData = new SubscriptionContinueEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SUBSCRIPTION_CONTINUE;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSignedAdoletaPlanEvent(SignedAdoletaPlanEventOzy $event)
    {
        $customData = new SignedAdoletaPlanEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SIGNED_ADOLETA_PLAN;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromAdoletaRenewalEvent(AdoletaRenewalEventOzy $event)
    {
        $customData = new AdoletaRenewalEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::ADOLETA_RENEWAL;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromSignedLettersPlanEvent(SignedLettersPlanEventOzy $event)
    {
        $customData = new SignedLettersPlanEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::SIGNED_LETTERS_PLAN;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    public static function fromImportEvent(ImportEventOzy $event)
    {
        $customData = new ImportEventOzyCustomData();

        $ozymandiasEvent = OzymandiasEventMapper::fromOzyEvent($event);
        $ozymandiasEvent->event_name = EventNameOzy::IMPORT;
        $ozymandiasEvent->custom_data = $event->custom_data ? $event->custom_data : $customData;

        return $ozymandiasEvent;
    }

    private static function getClientIp() {
        return $_SERVER['HTTP_X_FORWARDED_FOR']
            ?? $_SERVER['REMOTE_ADDR']
            ?? $_SERVER['HTTP_CLIENT_IP']
            ?? '';
    }

}
