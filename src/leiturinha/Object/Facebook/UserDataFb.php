<?php

namespace Leiturinha\Object;

/**
 * Main User Data
 * @property UserDataFbHashField $email: em
 * @property UserDataFbHashField $phone: ph
 * @property UserDataFbHashField $gender: ge
 * @property UserDataFbHashField $date_of_birth: db
 * @property UserDataFbHashField $last_name: ln
 * @property UserDataFbHashField $first_name: fn
 * @property UserDataFbHashField $city: ct
 * @property UserDataFbHashField $state: st
 * @property UserDataFbHashField $zip: zp
 * @property UserDataFbHashField $country: country
 * @property UserDataFbHashField $external_id: external_id - Hashing recommended
 * @property string $client_ip_address: client_ip_address - Do not hash
 * @property string $client_user_agent: client_user_agent - Do not hash - Required
 * @property string $click_id: fbc - Do not hash
 * @property string $browser_id: fbp - Do not hash
 * @property string $subscription_id: subscription_id - Do not hash
 * @property string $facebook_login_id: fb_login_id - Do not hash
 * @property string $lead_id: lead_id - Do not hash
 */
class UserDataCrm extends EventBase
{
    public $email;

    public $phone;

    public $gender;

    public $date_of_birth;

    public $last_name;

    public $first_name;

    public $city;

    public $state;

    public $zip;

    public $country;

    public $external_id;

    public $client_ip_address;

    public $client_user_agent;

    public $click_id;

    public $browser_id;

    public $subscription_id;

    public $facebook_login_id;

    public $lead_id;

    /**
     * Filter and validate
     *
     * @return void
     */
    public function run()
    {
        if($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field user_data.email format invalid');
        }
        if($this->client_user_agent) {
            throw new \InvalidArgumentException('field user_data.client_user_agent is required for web events');
        }

        return $this;
    }

}
