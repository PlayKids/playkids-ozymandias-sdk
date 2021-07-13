<?php

namespace Leiturinha\Object;

/**
 * EventBase Event object
 *
 * @property string $user_agent
 * @property string $email
 * @property string $page_name
 * @property string $page_url
 *
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 *
 * @property UserData $user_data
 * @property SubscriptionData $subscription
 */

abstract class EventBase
{
    public $user_agent;
    public $email;
    public $page_name;
    public $page_url;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;

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
        if(!$this->email || !$this->user_agent || !$this->page_name || !$this->page_url) {
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
