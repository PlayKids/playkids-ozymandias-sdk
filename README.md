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



## Setup version 0.2

Add to your composer.json:

**require**: _"playkids/playkids-ozymandias-sdk" : "^0.2.0"_

**repositories**: _[{"type":"vcs","url":"https://github.com/PlayKids/playkids-ozymandias-sdk"}]_
 
Now run **composer update playkids/playkids-ozymandias-sdk**

Create mapper class to collect data events (using the /src/leiturinha/Example/EventsMapper.php file as an example base)

## Usage

```php
use App\Mappers\EventsMapper;

EventsMapper::PageViewEvent([
    'page' => $request->page,
    'email' => $request->email
]);
```

## Usage classes 

```php
use Leiturinha\Events\EventLaucher;
use Leiturinha\Object\EventBase;
use Leiturinha\Object\InitiateCheckoutEvent;
use Leiturinha\Object\AddPaymentInfoEvent;
use Leiturinha\Object\AddToCartEvent;
use Leiturinha\Object\PurchaseEvent;
use Leiturinha\Object\ChildrenRegisterEvent;
use Leiturinha\Object\LeadFormEvent;
use Leiturinha\Object\SimpleLeadRegisteredEvent;
use Leiturinha\Object\LoginEvent;
use Leiturinha\Object\PageViewEvent;
use Leiturinha\Object\UserRegisterEvent;
use Leiturinha\Object\AmbassadorInitiatedEvent;
use Leiturinha\Object\UserData;
```
