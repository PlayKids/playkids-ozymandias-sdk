<?php

namespace Leiturinha\Events;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\ChildrenRegisterEvent;
use Leiturinha\Object\UserRegisterEvent;
use Leiturinha\Object\LeadFormEvent;
use Leiturinha\Object\SimpleLeadRegisteredEvent;
use Leiturinha\Object\LoginEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\AmbassadorInitiatedEvent;
use Leiturinha\Object\PurchaseEvent;

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
use Leiturinha\Object\ImportEvent;

use Leiturinha\Object\Enums\Platform;
use Leiturinha\Mappers\OzymandiasEventMapper;


class EventLaucher
{

    public static function fireCallcenterContactEvent(CallcenterContactEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromCallcenterContactEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function firePageViewEvent(PageViewEvent $event){

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

    public static function fireAddPaymentInfoEvent(AddPaymentInfoEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAddPaymentInfoEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAddToCartEvent(AddToCartEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAddToCartEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireInitiateCheckoutEvent(InitiateCheckoutEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromInitiateCheckoutEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function firePurchaseEvent(PurchaseEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromPurchaseEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireChildrenRegisterEvent(ChildrenRegisterEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromChildrenRegisterEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireUserRegisterEvent(UserRegisterEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromUserRegisterEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAmbassadorInitiatedEvent(AmbassadorInitiatedEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAmbassadorInitiatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireLeadFormEvent(LeadFormEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromLeadFormEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSimpleLeadRegisteredEvent(SimpleLeadRegisteredEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSimpleLeadRegisteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireLoginEvent(LoginEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromLoginEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionPaidEvent(SubscriptionPaidEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionPaidEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionRefundEvent(SubscriptionRefundEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionRefundEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionAlteredEvent(SubscriptionAlteredEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionAlteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireInvoiceCheckoutEvent(InvoiceCheckoutEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromInvoiceCheckoutEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireProductionOrderCreatedEvent(ProductionOrderCreatedEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromProductionOrderCreatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireBillCreatedEvent(BillCreatedEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromBillCreatedEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireShippingCompanyRegisteredEvent(ShippingCompanyRegisteredEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromShippingCompanyRegisteredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireKitReadyEvent(KitReadyEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromKitReadyEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireKitDeliveredEvent(KitDeliveredEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromKitDeliveredEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }


    public static function fireSubscriptionCanceledEvent(SubscriptionCanceledEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionCanceledEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSubscriptionContinueEvent(SubscriptionContinueEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSubscriptionContinueEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSignedAdoletaPlanEvent(SignedAdoletaPlanEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSignedAdoletaPlanEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireAdoletaRenewalEvent(AdoletaRenewalEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromAdoletaRenewalEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireSignedLettersPlanEvent(SignedLettersPlanEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromSignedLettersPlanEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

    public static function fireImportEvent(ImportEvent $event){

        $kinesisManager = new KinesisManager();

        $ozymandiasEvent = OzymandiasEventMapper::fromImportEvent($event);
        //$ozymandiasEvent->removeNulls();
        $ozymandiasEvent->validate();
        return $kinesisManager->addEvent(json_encode($ozymandiasEvent), Platform::PLATFORM_OZYMANDIAS);
    }

}
