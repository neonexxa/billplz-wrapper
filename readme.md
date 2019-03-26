# PHP Currency Converter

This is a php library for working with [Billplz v3](https://www.billplz.com/api). Be sure that you signup and get your api token from there. Im creating this because most of the api i used all are compatible with v2 im afraid it doesnt work with v3. im just worried, so i built one package for my own use on my other project. 

## Installation

### Composer

```composer require neonexxa/billplz-wrapper```

### Github

Just download any of the release or clone this repository. Feel free to use the way you want it.

## How to use (Create)

### Create COllection

Be sure that you save the result. Result you get the is the amount after convertion.

```php
use Neonexxa\BillplzWrapper\Billplz;

$billplz = new Billplz([
    'api_key' => 'your_api_key',
    'currency' => 'USD_MYR' //example for converting USD to MYR
]);
$respond = $billplz->create_bill("1460");

```
### Create Bill

Be sure that you save the result. Result you get the is the amount after convertion.

```php
use Neonexxa\BillplzWrapper\Billplz;

$billplz = new Billplz([
    'api_key' => 'your_api_key',
    'currency' => 'USD_MYR' //example for converting USD to MYR
]);
$respond = $billplz->create_bill("1460");

```



nothing yet ..