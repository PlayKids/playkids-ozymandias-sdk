<?php

namespace Leiturinha\Mappers;

use Leiturinha\Object\EventBase;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\Salesforce\DataCrm;
use Leiturinha\Object\Salesforce\DataWebCrm;
use Leiturinha\Object\Salesforce\Enums\Channel;
use Leiturinha\Object\Salesforce\Enums\EventName;
use Leiturinha\Object\Salesforce\UserDataCrm;
use Leiturinha\Object\Salesforce\UserDataPersonalDataCrm;
use Leiturinha\Object\Salesforce\UserDataPhoneCrm;
use Leiturinha\Object\Salesforce\UserDataSubscriptionCrm;
use Leiturinha\Object\SubscriptionData;

;

class SalesforceEventMapper
{
    public static function fromPageView(PageViewEvent $event)
    {
        $data = new DataWebCrm();
        $data->channel = Channel::LEITURINHA;
        $data->removeNulls();

        $userData = SalesforceEventMapper::fillUserData($event);

        $crm = new DataCrm();
        $crm->event = EventName::PAGE_VIEW;
        $crm->contact_key = $event->email;
        $crm->data = $data;
        $crm->user_data = $userData;
        $crm->validate();
        $crm->removeNulls();

        return $crm;
    }

    private static function fillUserData(EventBase $event) : UserDataCrm {

        $phone = new UserDataPhoneCrm();
        $phone->number = $event->user_data->phone_number;
        $phone->validate();
        $phone->removeNulls();

        //Dados pessoais do usuário
        $personalData = new UserDataPersonalDataCrm();
        $personalData->name = $event->user_data->first_name." ". $event->user_data->last_name;
        //$personalData->cpf =  $event->user_data->
        $personalData->validate();
        $personalData->removeNulls();

        $userData = new UserDataCrm();
        $userData->email = $event->email;
        $userData->phone = $phone;
        $userData->personal_data = $personalData;
        $userData->validate();
        $userData->removeNulls();

        return $userData;
    }

    private static function fillSubscriptionData(SubscriptionData $data) : UserDataSubscriptionCrm {

        $subscriptionData = new UserDataSubscriptionCrm();
        $subscriptionData->id = $data->id;
        $subscriptionData->plan_type = $data->plan_type;
        $subscriptionData->plan_name = $data->plan_name;
        $subscriptionData->plan_sku = $data->plan_sku;
        $subscriptionData->plan_duration = $data->plan_duration;
        $subscriptionData->plan_price = $data->plan_price;
        $subscriptionData->shipping_price = $data->shipping_price;
        $subscriptionData->pin = $data->pin;
        $subscriptionData->child_name_1 = $data->child_name_1;
        $subscriptionData->child_gender_1 = $data->child_gender_1;
        $subscriptionData->child_birthday_1 = $data->child_birthday_1;
        $subscriptionData->child_didactic_age_1 = $data->child_didactic_age_1;
        $subscriptionData->child_name_2 = $data->child_name_2;
        $subscriptionData->child_gender_2 = $data->child_gender_2;
        $subscriptionData->child_birthday_2 = $data->child_birthday_2;
        $subscriptionData->child_didactic_age_2  = $data->child_didactic_age_2;
        $subscriptionData->charge_type = $data->charge_type;

        $subscriptionData->zipcode = $data->;
        $subscriptionData->address = $data->address;
        $subscriptionData->address_number = $data->address_number;
        $subscriptionData->address_neighborhood = $data->address_neighborhood;
        $subscriptionData->address_reference = $data->address_reference;
        $subscriptionData->address_city = $data->address_city;
        $subscriptionData->source = $data->source;
        $subscriptionData->address_state = $data->address_state;
        $subscriptionData->created_at = $data->created_at;
        $subscriptionData->status = $data->status;
        $subscriptionData->address_line_2  = $data->address_line_2;

        $subscriptionData->invoices_paid = $data->invoices_paid;
        $subscriptionData->first_payment = $data->first_payment;
        $subscriptionData->last_payment = $data->last_payment;
        $subscriptionData->canceled_at = $data->canceled_at;
        $subscriptionData->canceled_reason = $data->canceled_reason;

        return $subscriptionData;
    }
}
