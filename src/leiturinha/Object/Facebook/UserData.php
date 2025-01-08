<?php

namespace Leiturinha\Object\Facebook;

use Leiturinha\Object\UserData as ObjectUserData;

/**
 * Main User Data
 * Need Hashing
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
 * @property string $external_id: external_id
 *
 * No Hashing required
 * @property string $client_user_agent: client_user_agent - Required
 * @property string $client_ip_address: client_ip_address
 *
 * @property string $fbc: click_id
 * @property string $fbp: browser_id
 * @property string $subscription_id: subscription_id
 * @property string $fb_login_id: facebook_login_id
 * @property string $lead_id: lead_id
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

    function __construct(?string $email, ?ObjectUserData $eventData) {
        if(!isset($email)) return;

        $this->em = $this->normalizeHashString($email);

        $this->client_user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->client_ip_address = $_SERVER['REMOTE_ADDR'];

        if(!$eventData->first_name && $eventData->name) {
            $eventData->first_name = $eventData->name;
        }

        if(!empty($eventData)){
            $this->ph = $this->normalizeHashString($eventData->phone);
            $this->zp = $this->normalizeHashString($eventData->zipcode);
            $this->ln = $this->normalizeHashString($eventData->last_name);
            $this->fn = $this->normalizeHashString($eventData->first_name);
            $this->country = $this->normalizeHashString('BR');
        }
    }

    private static function normalizeHashString($str) {
        if(!$str) return null;

        $normalizedString = str_replace( array( '\'', '"', ',' , ';', '<', '>', ' ', '(', ')', '-', '+' ), '', $str);
        $normalizedString = strtolower($normalizedString);

        return hash('sha256', $normalizedString);
    }

    public function validate()
    {
        if($this->em && !filter_var($this->em, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field email format invalid');
        }
        if($this->client_user_agent) {
            throw new \InvalidArgumentException('field user_data.client_user_agent is required for web events');
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
