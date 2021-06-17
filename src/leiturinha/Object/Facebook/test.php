<?php

namespace Leiturinha\Object\Facebook;

$custom_data = new PageViewEventCustomData();
$event = new PageViewEventFacebook($custom_data, "/cart");

$event->run();
