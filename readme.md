# PHP Currency Converter

This is a php library for working with [Billplz v3](https://www.billplz.com/api). Be sure that you signup and get your api token from there. Im creating this because most of the api i used all are compatible with v2 im afraid it doesnt work with v3. im just worried, so i built one package for my own use on my other project. 

## Installation

### Composer

```composer require neonexxa/billplz-wrapper```

### Github

Just download any of the release or clone this repository. Feel free to use the way you want it.

## How to use (Create)

### Create Collection

Be sure that you save the result. Result you get the is the amount after convertion.

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;

$res = new BillplzCollection;
$res->title = "im setting";
$res->split_payment['email'] = 'antoher_billplz_email';
$res->split_payment['fixed_cut'] = 50;
$res->split_payment['split_header'] = true;
$respond = $res->create_collection();


```

### Get Collection

Be sure that you save the result. Result you get the is the amount after convertion.

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;

$res = new BillplzCollection;
$res->collection_id = "XXXXXX";
$res = $res->get_collection();

```

### Get Collection Index

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;

$res = new BillplzCollection;
$res = $res->get_collection();

```

### Get Bill

Be sure that you save the result. Result you get the is the amount after convertion.

```php
use Neonexxa\BillplzWrapperV3\BillplzBill;

$res = new BillplzBill;
$res->bill_id = "xxxxxxx";
$res = $res->get_bill();

```



nothing yet ..