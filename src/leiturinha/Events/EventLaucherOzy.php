<?php

namespace Leiturinha\Events;

use Leiturinha\Object\AddPaymentInfoEventOzy;
use Leiturinha\Object\AddToCartEventOzy;
use Leiturinha\Object\InitiateCheckoutEventOzy;
use Leiturinha\Object\ChildrenRegisterEventOzy;
use Leiturinha\Object\UserRegisterEventOzy;
use Leiturinha\Object\LeadFormEventOzy;
use Leiturinha\Object\SimpleLeadRegisteredEventOzy;
use Leiturinha\Object\LoginEventOzy;
use Leiturinha\Object\PageViewEventOzy;
use Leiturinha\Object\AmbassadorInitiatedEventOzy;
use Leiturinha\Object\PurchaseEventOzy;

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

use Leiturinha\Object\Enums\Platform;
use Leiturinha\Mappers\OzymandiasEventMapper;


class EventLaucherOzy
{

    public static function fireCallcenterContactEvent(CallcenterContactEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromCallcenterContactEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function firePageViewEvent(PageViewEventOzy $event){

        // LOG DE TESTE
        // $local_log=dirname(__FILE__).'/../../../../../../storage/logs/logs_checkout_api.txt';
        // $fp = fopen($local_log, "a+");
        // fwrite($fp, date("Y-m-d H:i:s")."\n\n");
        // fwrite($fp, "-- EVENTO CHECKOUT API firePageViewEvent\n");
        // $event_string = json_encode($event, JSON_PRETTY_PRINT);
        // fwrite($fp, $event_string."\n\n");
        // fclose($fp);

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromPageView($event);
        //$ozymandiasEvent->removeNulls();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAddPaymentInfoEvent(AddPaymentInfoEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAddPaymentInfoEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAddToCartEvent(AddToCartEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAddToCartEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireInitiateCheckoutEvent(InitiateCheckoutEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromInitiateCheckoutEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function firePurchaseEvent(PurchaseEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromPurchaseEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireChildrenRegisterEvent(ChildrenRegisterEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromChildrenRegisterEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireUserRegisterEvent(UserRegisterEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromUserRegisterEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAmbassadorInitiatedEvent(AmbassadorInitiatedEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAmbassadorInitiatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireLeadFormEvent(LeadFormEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromLeadFormEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSimpleLeadRegisteredEvent(SimpleLeadRegisteredEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSimpleLeadRegisteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireLoginEvent(LoginEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromLoginEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionPaidEvent(SubscriptionPaidEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionPaidEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionRefundEvent(SubscriptionRefundEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionRefundEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionAlteredEvent(SubscriptionAlteredEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionAlteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireInvoiceCheckoutEvent(InvoiceCheckoutEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromInvoiceCheckoutEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireProductionOrderCreatedEvent(ProductionOrderCreatedEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromProductionOrderCreatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireBillCreatedEvent(BillCreatedEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromBillCreatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireShippingCompanyRegisteredEvent(ShippingCompanyRegisteredEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromShippingCompanyRegisteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireKitReadyEvent(KitReadyEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromKitReadyEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireKitDeliveredEvent(KitDeliveredEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromKitDeliveredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }


    public static function fireSubscriptionCanceledEvent(SubscriptionCanceledEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionCanceledEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionContinueEvent(SubscriptionContinueEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionContinueEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSignedAdoletaPlanEvent(SignedAdoletaPlanEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSignedAdoletaPlanEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAdoletaRenewalEvent(AdoletaRenewalEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAdoletaRenewalEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSignedLettersPlanEvent(SignedLettersPlanEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSignedLettersPlanEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireImportEvent(ImportEventOzy $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromImportEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

}
