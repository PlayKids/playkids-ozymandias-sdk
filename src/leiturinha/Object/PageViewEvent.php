<?php

namespace Leiturinha\Object;



class PageViewEvent extends EventBase
{

    public $page_name;
    public $event_datetime;


    public function validate()
    {
        return isset($page_name) && isset($event_datetime);
    }
}
