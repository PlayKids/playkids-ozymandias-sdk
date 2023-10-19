# Playkids Ozymandias SDK

## Standards

PHP - [PSR-12](https://www.php-fig.org/psr/psr-12/)

Commits - [Conventional Commits](https://www.conventionalcommits.org/)

## Setup version 0.1

Add to your composer.json:

**require**: _"playkids/playkids-ozymandias-sdk" : "^0.1.0"_

**repositories**: _[{"type":"vcs","url":"https://github.com/PlayKids/playkids-ozymandias-sdk"}]_
 
Now run **composer update playkids/playkids-ozymandias-sdk**

## Usage

```php
use Leiturinha\Handler;

$data = '{...}'; //json object

Handler::receiveData($data);
```

## Usage classes 

```php
    use Leiturinha\Object\AddPaymentInfoEventCustomData;
    use Leiturinha\Object\InitiateCheckoutEventCustomData;
    use Leiturinha\Object\AddtoCartEventCustomData;
    use Leiturinha\Object\PageViewEventCustomData;
    use Leiturinha\Object\EventBaseFacebook;
    use Leiturinha\Object\PurchaseEventCustomData;
    use Leiturinha\Object\EventBase;
    use Leiturinha\Object\UserDataFbHashField;
    use Leiturinha\Object\EventCustomData;
    use Leiturinha\Object\UserDataFb;
```



## Setup version 0.3

Add to your composer.json:

**require**: _"playkids/playkids-ozymandias-sdk" : "^0.3"_

**repositories**: _[{"type":"vcs","url":"https://github.com/PlayKids/playkids-ozymandias-sdk"}]_
 
Now run **composer update playkids/playkids-ozymandias-sdk**

Create mapper class to collect data events (using the /src/leiturinha/Example/EventsMapper.php file as an example base)

## Usage - Option 1: using Mapper

```php
use App\Mappers\EventsMapper;

EventsMapper::PageViewEvent([
    'page' => $request->page,
    'email' => $request->email
]);
```

## Usage - Option 2: using standalone

```php
$event = new \Leiturinha\Object\PageViewEventOzy();
$event->event_id = "PageView_123456789";
$event->email = "joaoteste@testejoao.com.br";
$event->page_url = "https://leiturinha.com.br";
$event->page_name = "Cadastro";
$event->channel = "Leiturinha";
$event->user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36";

\Leiturinha\Events\EventLaucherOzy::firePageViewEvent($event);
```

## Usage classes 

```php
use Leiturinha\Events\EventLaucherOzy;
use Leiturinha\Object\EventBaseOzy;
use Leiturinha\Object\AddPaymentInfoEventOzy;
use Leiturinha\Object\AddToCartEventOzy;
use Leiturinha\Object\InitiateCheckoutEventOzy;
use Leiturinha\Object\UserRegisterEventOzy;
use Leiturinha\Object\ChildrenRegisterEventOzy;
use Leiturinha\Object\LeadFormEventOzy;
use Leiturinha\Object\SimpleLeadRegisteredEventOzy;
use Leiturinha\Object\PurchaseEventOzy;
use Leiturinha\Object\PageViewEventOzy;
use Leiturinha\Object\LoginEventOzy;
use Leiturinha\Object\UserData;

use Leiturinha\Object\CallcenterContactEventOzy;
use Leiturinha\Object\SubscriptionPaidEventOzy;
use Leiturinha\Object\SubscriptionRefundEventOzy;
use Leiturinha\Object\SubscriptionAlteredEventOzy;
use Leiturinha\Object\InvoiceCheckoutEventOzy;
use Leiturinha\Object\ProductionOrderCreatedEventOzy;
use Leiturinha\Object\BillCreatedEventOzy;
use Leiturinha\Object\ShippingCompanyRegisteredEventOzy;
use Leiturinha\Object\KitReadyEventOzy;
use Leiturinha\Object\KitDeliveredEventOzy;
use Leiturinha\Object\SubscriptionCanceledEventOzy;
use Leiturinha\Object\SubscriptionContinueEventOzy;
use Leiturinha\Object\SignedAdoletaPlanEventOzy;
use Leiturinha\Object\AdoletaRenewalEventOzy;
use Leiturinha\Object\SignedLettersPlanEventOzy;
use Leiturinha\Object\AmbassadorInitiatedEventOzy;
use Leiturinha\Object\ImportEventOzy;

use Leiturinha\Object\Enums\EventNameOzy;
```
