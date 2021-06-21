<?php

namespace Leiturinha\Object\Facebook;


class PageViewEventFacebook extends FacebookEvent
{
    function __construct(PageViewEventCustomData $eventData, $pageUrl)
    {
        parent::__construct();

        $this->event_name = EventName::PAGE_VIEW;
        $this->custom_data = $eventData;
        $this->event_source_url = $pageUrl;
    }
}
