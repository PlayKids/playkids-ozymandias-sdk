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
class FacebookUserAdapter extends EventBase
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
//       em
// ph
// ge
// db
// ln
// fn
// ct
// st
// zp
// country
// external_id
// client_ip_address
// client_user_agent
// fbc
// fbp
// subscription_id
// fb_login_id
// lead_id

        return $this;
    }

}
