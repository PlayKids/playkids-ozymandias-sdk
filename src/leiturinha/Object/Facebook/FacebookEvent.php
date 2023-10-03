<?php

namespace Leiturinha\Object\Facebook;

use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\PurchaseEvent;

/**
 * Facebook Server Event Parameters
 *
 * @property EventName $event_name required
 * @property int $event_time UNIX timestamp required
 * @property UserData $user_data required
 * @property EventCustomData $custom_data
 * @property string $event_source_url
 * @property bool $opt_out
 * @property string $event_id
 * @property ActionSource $action_source required
 */
class FacebookEvent
{
    public $event_name;
    public $event_time;
    public $user_data;
    public $custom_data;
    public $event_source_url;
    public $opt_out;
    public $event_id;
    public $action_source;

    public function validate()
    {
        // TODO: move UserData validations to specific classes
        if(isset($this->user_data)) {
            if($this->custom_data instanceof InitiateCheckoutEvent) {
                if(!isset($this->user_data->client_user_agent) || !isset($this->user_data->client_ip_address)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof AddToCartEvent) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof PurchaseEvent) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }

            else if($this->custom_data instanceof AddPaymentInfoEvent) {
                if(!isset($this->user_data->em) || !isset($this->user_data->ph)) {
                    throw new \InvalidArgumentException('client_user_agent and client_ip_address required');
                }
            }
        }

        if(isset($this->custom_data)) {
            $this->custom_data->validate();
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
