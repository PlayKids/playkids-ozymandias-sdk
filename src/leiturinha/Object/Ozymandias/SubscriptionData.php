<?php

namespace Leiturinha\Object\Ozymandias;

use Leiturinha\Object\SubscriptionData as ObjectSubscriptionData;

/**
 * Main Subscription Data
 * 
 * @property string $id
 *
 * @property string $shipping_price
 * @property string $charge_type
 * @property string $source
 * @property string $created_at
 * @property string $status
 *
 * @property string $plan_type
 * @property string $plan_name
 * @property string $plan_sku
 * @property string $plan_duration
 * @property string $plan_price
 *
 * @property string $pin
 *
 * @property string $child_name_1
 * @property string $child_gender_1
 * @property string $child_birthday_1
 *
 * @property string $child_name_2
 * @property string $child_gender_2
 * @property string $child_birthday_2
 *
 * @property string $address
 * @property string $address_line_2
 * @property string $address_number
 * @property string $address_neighborhood
 * @property string $address_reference
 * @property string $address_city
 * @property string $address_state
 */
class SubscriptionData
{
    public $id;
    public $shipping_price;
    public $charge_type;
    public $source;
    public $created_at;
    public $status;
    public $plan_type;
    public $plan_name;
    public $plan_sku;
    public $plan_duration;
    public $plan_price;
    public $pin;

    public $child_name_1;
    public $child_gender_1;
    public $child_birthday_1;
    public $child_name_2;
    public $child_gender_2;
    public $child_birthday_2;

    public $address;
    public $address_line_2;
    public $address_number;
    public $address_neighborhood;
    public $address_reference;
    public $address_city;
    public $address_state;

    function __construct(string $plan_type, ?ObjectSubscriptionData $eventData) {
        //if(!isset($email)) return;

        //$this->em = $this->normalizeHashString($email);

        // //$this->client_Subscription_agent = $_SERVER['HTTP_Subscription_AGENT'];
        // $this->browser_string = $_SERVER['HTTP_Subscription_AGENT'];
        // $this->client_ip_address = $_SERVER['REMOTE_ADDR'];

        // if(!$eventData->first_name && $eventData->name) {
        //     $eventData->first_name = $eventData->name;
        // }

    }

    public function validate()
    {
        if($this->plan_type) {
            throw new \InvalidArgumentException('field Subscription_data.plan_type is required for web events');
        }

        return $this;
    }

    public function removeNulls()
    {
        foreach ($this as $key => $value) {
            if(!$value) {
                unset($this->$key);
            }
        }
    }
}
