<?php
namespace Leiturinha\Object;
/**
 * Subscription object
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
 * @property string $address
 * @property string $address_line_2
 * @property string $address_number
 * @property string $address_neighborhood
 * @property string $address_reference
 * @property string $address_city
 * @property string $address_state
 */
class SubscriptionData extends EventBase
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
    public $address;
    public $address_line_2;
    public $address_number;
    public $address_neighborhood;
    public $address_reference;
    public $address_city;
    public $address_state;

    public function validate()
    {
        if(!$this->id || !$this->plan_type || !$this->plan_name || !$this->plan_sku) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
