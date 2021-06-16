# Playkids Ozymandias SDK

## Standards

PHP - [PSR-12](https://www.php-fig.org/psr/psr-12/)

Commits - [Conventional Commits](https://www.conventionalcommits.org/)

## Setup

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
