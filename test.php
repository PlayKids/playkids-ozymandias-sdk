<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$event = new \Leiturinha\Object\PageViewEvent();
$event->email = "neymarjr@gmail.com";
$event->page_url = "https://leiturinha.com.br/user/payment";
$event->page = "Pagamento";
$event->channel = "Leiturinha";
$event->user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36";

\Leiturinha\Events\EventLaucher::fireAddPaymentInfoEvent($event);
