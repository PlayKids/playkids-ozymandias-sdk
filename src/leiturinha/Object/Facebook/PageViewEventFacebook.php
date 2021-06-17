<?php

namespace Leiturinha\Object\Facebook;


class PageViewEventFacebook extends EventBaseFacebook
{
    function __construct(PageViewEventCustomData $eventData, $pageUrl)
    {
        parent::__construct();


        $this->event_name = "PageView";
        $this->custom_data = $eventData;
        $this->event_source_url = $pageUrl;
    }
}
