<?php

namespace Leiturinha\Object;

/**
 * Facebook Server Event Parameters
 *
 * @property string $event_name required
 * @property int $event_time UNIX timestamp required
 * @property UserDataFb $user_data required
 * @property EventCustomData $custom_data
 * @property string $event_source_url
 * @property bool $opt_out
 * @property string $event_id
 * @property string $action_source required
 * @property string $data_processing_options
 * @property string $data_processing_options_country
 * @property string $data_processing_options_state
 */
class EventBaseFacebook extends EventBase
{
    public $event_name

    public $event_time

    public $user_data

    public $custom_data

    public $event_source_url

    public $opt_out

    public $event_id

    public $action_source

    public $data_processing_options

    public $data_processing_options_country

    public $data_processing_options_state

    /**
     * Filter and validate
     *
     * @return void
     */
    public function run()
    {
        if(!$this->event_name || !$this->timestamp || !$this->user_data || !$this->action_source) {
            throw new \InvalidArgumentException('field event required');
        }
        if(!filter_var($this->contact_key, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('field contact_key must be an email');
        }

        return $this;
    }

}
