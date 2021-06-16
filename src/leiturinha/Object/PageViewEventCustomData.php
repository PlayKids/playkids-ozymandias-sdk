<?php

namespace Leiturinha\Object;

/**
 * Purchase Facebook Event
 *
 * @property string $event_name required
 * @property int $event_time UNIX timestamp required
 * @property UserDataFb $user_data required
 * @property string $action_source required
 * @property string $custom_data
 * @property string $event_source_url
 * @property bool $opt_out
 * @property string $event_id
 * @property string $data_processing_options
 * @property string $data_processing_options_country
 * @property string $data_processing_options_state
 */
class DataCrm extends EventBaseFacebook
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
        if(!$this->event_name || !$this->event_time || !$this->user_data || !$this->action_source) {
            throw new \InvalidArgumentException('field event required');
        }

        return $this;
    }

}
