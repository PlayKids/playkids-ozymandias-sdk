<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";

use Leiturinha\Handler;

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$event = new \Leiturinha\Object\PageViewEvent();
$event->email = "neymarjr@gmail.com";
$event->page_url = "\ambassador";
$event->page_name = "Área do Embaixador";
$event->channel = "Leiturinha";
$event->user_agent = "Chrome";

\Leiturinha\Events\EventLaucher::firePageViewEvent($event);
