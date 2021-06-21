<?php
namespace Leiturinha\Object;
/**
 * PageView Event object
 *
 * @property string $user_agent
 * @property string $email
 * @property string $channel
 * @property string $page_name
 * @property string $page_url
 *
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 */
class PageViewEvent extends EventBase
{
    public $user_agent;
    public $email;
    public $channel;
    public $page_name;
    public $page_url;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;

    public function validate()
    {
        if(!$this->email || !$this->page || !$this->event) {
            throw new \InvalidArgumentException('field event required');
        }
        return $this;
    }
}
