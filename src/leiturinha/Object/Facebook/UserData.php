<?php

namespace Leiturinha\Object\Facebook;

/**
 * Main User Data
 * @property string $em: email
 * @property string $ph: phone
 * @property string $ge: gender
 * @property string $db: date_of_birth
 * @property string $ln: last_name
 * @property string $fn: first_name
 * @property string $ct: city
 * @property string $st: state
 * @property string $zp: zip
 * @property string $country: country
 * @property string $external_id: external_id - Hashing recommended
 * @property string $client_ip_address: client_ip_address - Do not hash
 * @property string $client_user_agent: client_user_agent - Do not hash - Required
 *
 * @property string $fbc: click_id - Do not hash
 * @property string $fbp: browser_id - Do not hash
 * @property string $subscription_id: subscription_id - Do not hash
 * @property string $fb_login_id: facebook_login_id - Do not hash
 * @property string $lead_id: lead_id - Do not hash
 */
class UserData
{
    public $em;

    public $ph;

    public $ge;

    public $db;

    public $ln;

    public $fn;

    public $ct;

    public $st;

    public $zp;

    public $country;

    public $external_id;

    public $client_ip_address;

    public $client_user_agent;

    public $fbc;

    public $fbp;

    public $subscription_id;

    public $fb_login_id;

    public $lead_id;

    public function validate()
    {
        if($this->em && !filter_var($this->em, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field user_data.email format invalid');
        }
        if($this->client_user_agent) {
            throw new \InvalidArgumentException('field user_data.client_user_agent is required for web events');
        }

        return $this;
    }

}
