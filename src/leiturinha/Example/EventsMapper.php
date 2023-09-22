<?php

namespace App\Mappers;

use App\Models\Leiturinha\CartItems;
use App\Models\Leiturinha\User;
use Illuminate\Support\Facades\Log;
use Leiturinha\Object\Enums\EventName;
use Leiturinha\Utils\UUIDGenerator;
use Throwable;

class EventsMapper
{

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function InitiateCheckoutEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\InitiateCheckoutEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::INITIATE_CHECKOUT."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireInitiateCheckoutEvent($eventData);
            Log::info('-- EventsMapper InitiateCheckoutEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: InitiateCheckoutEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function AddPaymentInfoEvent(array $data): void
    {

        $eventData = new \Leiturinha\Object\AddPaymentInfoEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::ADD_PAYMENT_INFO."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireAddPaymentInfoEvent($eventData);
            Log::info('-- EventsMapper AddPaymentInfoEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: AddPaymentInfoEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function AddToCartEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\AddToCartEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::ADD_TO_CART."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireAddToCartEvent($eventData);
            Log::info('-- EventsMapper AddToCartEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: AddToCartEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function PurchaseEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\PurchaseEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::PURCHASE."_".$_SERVER["EVENT_ID"];

        $eventData->plan_price = $data['plan_price'];
        $eventData->currency = 'BRL';

        try {
            \Leiturinha\Events\EventLaucher::firePurchaseEvent($eventData);
            Log::info('-- EventsMapper PurchaseEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PurchaseEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function ChildrenRegisterEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\ChildrenRegisterEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::CHILDREN_REGISTER."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireChildrenRegisterEvent($eventData);
            Log::info('-- EventsMapper ChildrenRegisterEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: ChildrenRegisterEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function LeadFormEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\LeadFormEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::LEAD_FORM."_".$_SERVER["EVENT_ID"];

        $eventData->src = $data['src'];
        $eventData->name = $data['name'];
        $eventData->phone = $data['phone'];
        $eventData->campaign = $data['campaign'];
        $eventData->device = $data['device'];
        $eventData->country = $data['country'];
        $eventData->language = $data['language'];
        $eventData->date = $data['date'];

        try {
            \Leiturinha\Events\EventLaucher::fireLeadFormEvent($eventData);
            Log::info('-- EventsMapper LeadFormEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: LeadFormEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function SimpleLeadRegisteredEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\SimpleLeadRegisteredEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::SIMPLE_LEAD_REGISTERED."_".$_SERVER["EVENT_ID"];

        $eventData->src = $data['src'];
        $eventData->name = $data['name'];
        $eventData->date = $data['date'];
        $eventData->phone = $data['phone'];

        try {
            \Leiturinha\Events\EventLaucher::fireSimpleLeadRegisteredEvent($eventData);
            Log::info('-- EventsMapper SimpleLeadRegisteredEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: SimpleLeadRegisteredEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function LoginEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\LoginEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::LOGIN."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireLoginEvent($eventData);
            Log::info('-- EventsMapper LoginEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: LoginEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function PageViewEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\PageViewEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::PAGE_VIEW."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::firePageViewEvent($eventData);
            Log::info('-- EventsMapper PageViewEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PageViewEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger UserRegisterEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function UserRegisterEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\UserRegisterEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::USER_REGISTER."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireUserRegisterEvent($eventData);
            Log::info('-- EventsMapper UserRegisterEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: UserRegisterEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger AmbassadorInitiatedEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function AmbassadorInitiatedEvent(array $data): void
    {
        $eventData = new \Leiturinha\Object\AmbassadorInitiatedEvent();
        $eventData = self::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::AMBASSADOR_INITIATED."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucher::fireAmbassadorInitiatedEven($eventData);
            Log::info('-- EventsMapper AmbassadorInitiatedEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch (Throwable $e) {
            Log::info("-- EventsMapper Error: AmbassadorInitiatedEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }


    /**
     * Fill Basic Data about event to API Ozymandias
     *
     * @param array $data
     * @param EvenBase $eventData
     * @return eventData
    */
    public static function fillBasicData(array $data, \Leiturinha\Object\EventBase $eventData)
    {

        //GENERATE CURRENT EVENT ID
        if(!isset($_SERVER["EVENT_ID"])){
            $_SERVER["EVENT_ID"] = UUIDGenerator::v4();
        }

        if(isset($data['user_data']) && $data['user_data'] instanceof User) { 

            $user_data = new \Leiturinha\Object\UserData();
                $user_data->email = $data['user_data']->email;
                $user_data->first_name = $data['user_data']->name;
                $user_data->last_name = $data['user_data']->surname;
                $user_data->phone = $data['user_data']->phone;
                $user_data->phone_locale = 'BR';

            // Addreesses data collect in Payment Event (Last Event)
            if(isset($data['user_address'])) {
                $user_data->city = $data['user_address'][0]->cidade;
                $user_data->state = $data['user_address'][0]->estado;
                $user_data->country = 'BR';
                $user_data->zipcode = $data['user_address'][0]->cep;
            }

            $eventData->user_data = $user_data;
        }

        if(isset($data['cart_item']) && $data['cart_item'] instanceof CartItems){

            $cartItem = CartItems::find($data['cart_item']->id);

            $data_cart_item = [];
            $data_cart_item['id'] = $cartItem->id;
            $data_cart_item['status'] = $cartItem->status;

            $data_cart_item['plan_type'] = strtolower(explode(" ", $cartItem->plan->name_plan)[0]);
            $data_cart_item['plan_name'] = $cartItem->plan->name_plan;
            $data_cart_item['plan_sku'] = $cartItem->plan->slug;
            $data_cart_item['plan_duration'] = $cartItem->plan->month_amount;
            $data_cart_item['plan_price'] = $cartItem->plan->monthly_price;
            $data_cart_item['shipping_price'] = $cartItem->plan->shipping_price;
            $data_cart_item['charge_type'] = $cartItem->plan->installments;
            $data_cart_item['updated_at'] = date('Y-m-d H:i:s');

            if(isset($cartItem->children_name)) {
                $data_cart_item['child_name_1'] = $cartItem->children_name;
                $data_cart_item['child_gender_1'] = $cartItem->children_gender;
                $data_cart_item['child_birthday_1'] = date('Y-m-d', strtotime($cartItem->children_birthday));
                $data_cart_item['child_didatic_age_1'] = date('Y-m-d', strtotime($cartItem->didatic_age));
            }

            if(isset($cartItem->children_name_2)) {
                $data_cart_item['child_name_2'] = $cartItem->children_name_2;
                $data_cart_item['child_gender_2'] = $cartItem->children_gender_2;
                $data_cart_item['child_birthday_2'] = date('Y-m-d', strtotime($cartItem->children_birthday_2));
                $data_cart_item['child_didatic_age_2'] = date('Y-m-d', strtotime($cartItem->didatic_age_2));
            }

            $eventData->cart_item = $data_cart_item;
        }

        $eventData->page = trim($data['page']);
        if (isset($data['email'])) {
            $eventData->email = (isset($data['email']))? trim($data['email']): null;
        }

        if (isset($_SERVER['HTTP_HOST'])) {
            $eventData->page_url = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        } else {
            $eventData->page_url = "https://localhost";
        }

        return $eventData;
    }

}
