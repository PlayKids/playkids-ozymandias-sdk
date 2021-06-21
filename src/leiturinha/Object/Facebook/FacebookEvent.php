<?php

namespace Leiturinha\Object\Facebook;

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
        if(!$this->event_name || !$this->timestamp || !$this->user_data || !$this->action_source || !$this->event_time) {
            throw new \InvalidArgumentException('field event required');
        }
        if(!filter_var($this->contact_key, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field contact_key must be an email');
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
