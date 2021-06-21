<?php
namespace Leiturinha\Object;
/**
 * PageView Event object
 *
 * Salesforce
 * @property string $browser_string
 * @property string $email
 * @property string $channel
 * @property string $page
 *
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 *
 * Facebook
 *
 * @property string $event_time
 * @property string $action_source
 * @property string $event_source_url
 */
class PageViewEvent extends EventBase
{
    public $browser_string;
    public $email;
    public $channel;
    public $page;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $event_time;
    public $action_source;
    public $event_source_url;

    public function validate()
    {
        if(!$this->email || !$this->page || !$this->event) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
