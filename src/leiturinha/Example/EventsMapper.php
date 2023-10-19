<?php

namespace App\Mappers;

use App\Models\Leiturinha\CartItems;
use App\Models\Leiturinha\User;
use Illuminate\Support\Facades\Log;
use Leiturinha\Object\Enums\EventNameOzy;
use Leiturinha\Utils\UUIDGenerator;
use Throwable;

class EventsMapper
{

    /**
     * Trigger InitiateCheckoutEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function InitiateCheckoutEventOzy(array $data): void
    {
        $eventData = new \Leiturinha\Object\InitiateCheckoutEventOzy();
        $eventData = self::fillBasicDataOzy($data, $eventData);
        $eventData->event_id = EventNameOzy::INITIATE_CHECKOUT."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucherOzy::fireInitiateCheckoutEvent($eventData);
            Log::info('-- EventsMapper InitiateCheckoutEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: InitiateCheckoutEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger PurchaseEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function PurchaseEventOzy(array $data): void
    {
        $eventData = new \Leiturinha\Object\PurchaseEventOzy();
        $eventData = self::fillBasicDataOzy($data, $eventData);
        $eventData->event_id = EventNameOzy::PURCHASE."_".$_SERVER["EVENT_ID"];

        $eventData->plan_price = $data['plan_price'];
        $eventData->currency = 'BRL';

        try {
            \Leiturinha\Events\EventLaucherOzy::firePurchaseEvent($eventData);
            Log::info('-- EventsMapper PurchaseEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PurchaseEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }

    /**
     * Trigger PageViewEvent to API Ozymandias
     *
     * @param array $data
     * @return void
     */
    public static function PageViewEventOzy(array $data): void
    {
        $eventData = new \Leiturinha\Object\PageViewEventOzy();
        $eventData = self::fillBasicDataOzy($data, $eventData);
        $eventData->event_id = EventNameOzy::PAGE_VIEW."_".$_SERVER["EVENT_ID"];

        try {
            \Leiturinha\Events\EventLaucherOzy::firePageViewEvent($eventData);
            Log::info('-- EventsMapper PageViewEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PageViewEvent, " . $e);  // USE ONLY FOR TESTING PURPOSE, NOT IN PRODUCTION
        }
    }


    /**
     * Fill Basic Data about event to API Ozymandias
     *
     * @param array $data
     * @param EvenBaseOzy $eventData
     * @return eventData
    */
    public static function fillBasicDataOzy(array $data, \Leiturinha\Object\EventBaseOzy $eventData)
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
