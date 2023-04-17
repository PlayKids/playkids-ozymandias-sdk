<?php

namespace App\Mappers;

use Leiturinha\Events\EventLaucher;
use Leiturinha\Object\EventBase;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\PurchaseEvent;
use Leiturinha\Object\ChildrenRegisterEvent;
use Leiturinha\Object\LeadFormEvent;
use Leiturinha\Object\SimpleLeadRegisteredEvent;
use Leiturinha\Object\LoginEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\UserRegisterEvent;
use Leiturinha\Object\AmbassadorInitiatedEvent;
use Leiturinha\Object\UserData;

use App\Models\Enums\EventName;
use App\Components\UUIDGenerator;
use App\Models\Leiturinha\CartItems;
use App\Models\Leiturinha\User;
use App\Models\Leiturinha\OzymandiasEventsLog;

use Illuminate\Support\Facades\Log; // If using Laravel: data events in storage/logs/laravel.log 

class EventsMapper
{

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function InitiateCheckoutEvent(array $data): void
    {
        $eventData = new InitiateCheckoutEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::INITIATE_CHECKOUT."_".$_SERVER["EVENT_ID"];
        $idLog = self::addLogPayload('InitiateCheckoutEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireInitiateCheckoutEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper InitiateCheckoutEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: InitiateCheckoutEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function AddPaymentInfoEvent(array $data): void
    {
        $eventData = new AddPaymentInfoEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::ADD_PAYMENT_INFO."_".$_SERVER["EVENT_ID"];
        $idLog = self::addLogPayload('AddPaymentInfoEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireAddPaymentInfoEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper AddPaymentInfoEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: AddPaymentInfoEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function AddToCartEvent(array $data): void
    {
        $eventData = new AddToCartEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::ADD_TO_CART."_".$_SERVER["EVENT_ID"];
        $idLog = self::addLogPayload('AddToCartEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireAddToCartEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper AddToCartEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: AddToCartEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function PurchaseEvent(array $data): void
    {
        $eventData = new PurchaseEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::PURCHASE."_".$_SERVER["EVENT_ID"];

        $eventData->plan_price = $data['plan_price'];
        $eventData->currency = 'BRL';
        $idLog = self::addLogPayload('PurchaseEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::firePurchaseEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper PurchaseEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PurchaseEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function ChildrenRegisterEvent(array $data): void
    {
        $eventData = new ChildrenRegisterEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::CHILDREN_REGISTER."_".$_SERVER["EVENT_ID"];
        $idLog = self::addLogPayload('ChildrenRegisterEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireChildrenRegisterEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper ChildrenRegisterEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: ChildrenRegisterEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function LeadFormEvent(array $data): void
    {
        $eventData = new LeadFormEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::LEAD_FORM."_".$_SERVER["EVENT_ID"];

        $eventData->src = $data['src'];
        $eventData->name = $data['name'];
        $eventData->phone = $data['phone'];
        $eventData->campaign = $data['campaign'];
        $eventData->device = $data['device'];
        $eventData->country = $data['country'];
        $eventData->language = $data['language'];
        $eventData->date = $data['date'];

        $idLog = self::addLogPayload('LeadFormEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireLeadFormEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper LeadFormEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: LeadFormEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function SimpleLeadRegisteredEvent(array $data): void
    {
        $eventData = new SimpleLeadRegisteredEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::SIMPLE_LEAD_REGISTERED."_".$_SERVER["EVENT_ID"];

        $eventData->src = $data['src'];
        $eventData->name = $data['name'];
        $eventData->date = $data['date'];
        $eventData->phone = $data['phone'];

        $idLog = self::addLogPayload('SimpleLeadRegisteredEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireSimpleLeadRegisteredEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper SimpleLeadRegisteredEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: SimpleLeadRegisteredEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function LoginEvent(array $data): void
    {
        $eventData = new LoginEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::LOGIN."_".$_SERVER["EVENT_ID"];

        $idLog = self::addLogPayload('LoginEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireLoginEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper LoginEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: LoginEvent, " . $e);
        }
    }

    /**
     * Trigger LoginEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function PageViewEvent(array $data): void
    {
        $eventData = new PageViewEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::PAGE_VIEW."_".$_SERVER["EVENT_ID"];
        $idLog = self::addLogPayload('PageViewEvent', $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::firePageViewEvent($eventData);
            self::updateLogPayload($idLog, $return_api_ozy);
            Log::info('-- EventsMapper PageViewEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));

            // switch ($data['page']) {
            //     case 'Leitor':
            //         self::InitiateCheckoutEvent([
            //             'page' => $data['page'],
            //             'email' => $data['email']
            //         ]);
            //         break;
            //     case 'Dados Pessoais':
            //         self::AddToCartEvent([
            //             'page' => $data['page'],
            //             'email' => $data['email']
            //         ]);
            //         break;
            //     case 'Pagamento':
            //         self::AddPaymentInfoEvent([
            //             'page' => $data['page'],
            //             'email' => $data['email']
            //         ]);
            //         break;
            // }

        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: PageViewEvent, " . $e);
        }
    }

    /**
     * Trigger UserRegisterEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function UserRegisterEvent(array $data): void
    {
        $eventData = new UserRegisterEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::USER_REGISTER."_".$_SERVER["EVENT_ID"];

        $idLog = self::addLogPayload('UserRegisterEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireUserRegisterEvent($eventData);
            Log::info('-- EventsMapper UserRegisterEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
            self::updateLogPayload($idLog, $return_api_ozy);
        } catch(Throwable $e) {
            Log::info("-- EventsMapper Error: UserRegisterEvent, " . $e);
        }

    }
    /**
     * Trigger AmbassadorInitiatedEvent to API Ozymandias
     *
     * @param array $data
     */
    public static function AmbassadorInitiatedEvent(array $data): void
    {
        $eventData = new AmbassadorInitiatedEvent();
        $eventData = EventsMapper::fillBasicData($data, $eventData);
        $eventData->event_id = EventName::AMBASSADOR_INITIATED."_".$_SERVER["EVENT_ID"];

        $idLog = self::addLogPayload('AmbassadorInitiatedEvent',  $data, $eventData);

        try {
            $return_api_ozy = EventLaucher::fireAmbassadorInitiatedEven($eventData);
            Log::info('-- EventsMapper AmbassadorInitiatedEvent: '. json_encode($eventData, JSON_PRETTY_PRINT));
            self::updateLogPayload($idLog, $return_api_ozy);
        } catch (Throwable $e) {
            Log::info("-- EventsMapper Error: AmbassadorInitiatedEvent, " . $e);
        }
    }


    /**
     * Fill Basic Data about event to API Ozymandias
     *
     * @param array $data
     * @param EvenBase $eventData
     * @return eventData
    */
    private static function fillBasicData(array $data, EventBase $eventData)
    {
        //GENERATE CURRENT EVENT ID
        if(!isset($_SERVER["EVENT_ID"])){
            $_SERVER["EVENT_ID"] = UUIDGenerator::v4();
        }

        if(isset($data['user_data']) && $data['user_data'] instanceof User) {  // NAO MAIS INSTANCIADO POR CONTA DO QUEM VEM DO SF

            $user_data = new UserData();
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

            // $data_cart_item['invoices_paid'] = $this->getSubscriptionPaids($cartItem->id);
            // $data_cart_item['first_payment'] = $this->getSubscriptionPayment($cartItem->id, 'ASC') ?? "";
            // $data_cart_item['last_payment'] = $this->getSubscriptionPayment($cartItem->id, 'DESC') ?? "";

            if(isset($cartItem->children_name)) {
                $data_cart_item['child_name_1'] = $cartItem->children_name;
                $data_cart_item['child_gender_1'] = $cartItem->children_gender;
                $data_cart_item['child_birthday_1'] = date('Y-m-d', strtotime($cartItem->children_birthday));
            }

            if(isset($cartItem->children_name_2)) {
                $data_cart_item['child_name_2'] = $cartItem->children_name_2;
                $data_cart_item['child_gender_2'] = $cartItem->children_gender_2;
                $data_cart_item['child_birthday_2'] = date('Y-m-d', strtotime($cartItem->children_birthday_2));
            }

            $eventData->cart_item = $data_cart_item;
        }

        // if ($event === 'lead-form') {
        //     $eventData['user_data'] = $ozymandias->getLeadData($data);
        // }

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

    /**
     * Save payload send events
     *
     * @param string $event
     * @param string $eventEmail
     * @param array $eventData
     * @return void
     */
    public static function addLogPayload($event, $eventEmail, $eventData)
    {

        // Somente auditoria em Ambiente Stage
        if (env('APP_ENV') == 'production') {
            exit;
        }

        $ozymandias = new OzymandiasEventsLog();
        $ozymandias->event = $event;
        $ozymandias->email = $eventEmail['email'] ?? '';
        $ozymandias->data = json_encode($eventData);
        $ozymandias->save();

        // Get the ID of the newly saved record
        $newId = $ozymandias->id;

        return $newId;
    }

    public static function updateLogPayload($id, $return_api_ozy)
    {
        // Somente auditoria em Ambiente Stage
        if (env('APP_ENV') == 'production') {
            exit;
        }

        $ozymandias = OzymandiasEventsLog::find($id);

        if (!$ozymandias) {
            // The record with the given ID does not exist
            return false;
        }

        $ozymandias->return_api_ozy = $return_api_ozy;
        $ozymandias->save();

        return true;
    }

}
