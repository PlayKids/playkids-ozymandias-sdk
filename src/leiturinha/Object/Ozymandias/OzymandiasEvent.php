<?php

namespace Leiturinha\Object\Ozymandias;

use Leiturinha\Object\AddPaymentInfoEventOzy;
use Leiturinha\Object\AddToCartEventOzy;
use Leiturinha\Object\InitiateCheckoutEventOzy;
use Leiturinha\Object\PurchaseEventOzy;

/**
 * Ozymandias Server Event Parameters
 *
 * @property EventNameOzy $event_name required
 * @property int $event_time UNIX timestamp required
 * @property UserData $user_data required
 * @property EventOzyCustomData $custom_data
 * @property string $event_source_url
 * @property bool $opt_out
 * @property string $event_id
 * @property ActionSource $action_source required
 * @property string $contact_key
 * @property string $browser_string
 * @property string $channel
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $page
 * @property string $client_ip_address
 */
class OzymandiasEvent
{
    public $event_name;
    public $event_time;
    public $user_data;
    public $custom_data;
    public $event_source_url;
    public $opt_out;
    public $event_id;
    public $action_source;
    public $contact_key;
    public $browser_string;
    public $channel;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $page;
    public $client_ip_address;

    public function validate()
    {
        // TODO: move UserData validations to specific classes
        if(isset($this->user_data)) {
            if($this->custom_data instanceof InitiateCheckoutEventOzy) {
                if(!isset($this->user_data->client_user_agent) || !isset($this->user_data->client_ip_address)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof AddToCartEventOzy) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof PurchaseEventOzy) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof AddPaymentInfoEventOzy) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }
        }

        if(!$this->event_name || !$this->event_time || !$this->event_source_url) {
            throw new \InvalidArgumentException('field event required');
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
