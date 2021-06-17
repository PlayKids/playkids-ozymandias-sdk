<?php

namespace Leiturinha\Events;

use Leiturinha\Object\PageViewEvent;
use function Leiturinha\Mappers\FacebookEventMapper;

class EventLaucher
{

    public static function firePageViewEvent(PageViewEvent $event){

        $facebookEvent = FacebookEventMapper::fromPageView($event);
        $facebookEvent->run();

        //$salesforceEvent = SalesforceEventMapper::fromPageView($event);
        //$salesforceEvent->run();
    }


}
