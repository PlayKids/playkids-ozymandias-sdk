<?php

namespace Leiturinha\Object;

/**
 * EventBase Event object
 *
 * @property string $user_agent
 * @property string $email
 * @property string $page
 * @property string $action_source
 * @property string $browser_string
 * @property string $channel
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $client_ip_address
 * @property string $user_data
 * @property string $subscription
 *
 * @property UserData $user_data
 * @property SubscriptionData $subscription
 */

abstract class EventBaseOzy
{
    public $event_id;
    public $user_agent;
    public $email;
    public $page;
    public $action_source;
    public $browser_string;
    public $channel;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $client_ip_address;
    public $user_data;
    public $subscription;

    public function removeNulls()
    {
        foreach ($this as $key => $value) {
            if(!$value) {
                unset($this->$key);
            }
        }
    }

    public function validate()
    {
        if(!$this->email || !$this->user_agent || !$this->page) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }

    public function toJson()
    {
        $clone = clone $this;

        foreach ($clone as $key => $value) {
            if(!$value) {
                unset($clone->$key);
            }
        }

        return json_encode($clone);
    }
}
