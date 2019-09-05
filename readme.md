```
wrapper v3.0 will be updated next month with the mastercard/visa
```

# PHP Currency Converter

This is a php library for working with [Billplz v3](https://www.billplz.com/api). Be sure that you signup and get your api token from there. Im creating this because most of the api i used all are compatible with v2 im afraid it doesnt work with v3. im just worried, so i built one package for my own use on my other project. 

## Installation

### Composer

```composer require neonexxa/billplz-wrapper```

### Github

Just download any of the release or clone this repository. Feel free to use the way you want it.

### For Laravel 

1 ) in your config/app.php add below to your service provider class

```php
Neonexxa\BillplzWrapperV3\BillplzServiceProvider::class,
```

2 ) put your key in the *.env* file

```
BILLPLZ_API_KEY=xxxxx-xxxx-xxxx-xxxx-xxxx
```

3 ) run 

```php
composer dump-autoload && php artisan config:cache && php artisan cache:clear
php artisan vendor:publish --provider="Neonexxa\BillplzWrapperV3\BillplzServiceProvider"
```
in order to get the config setting ready for you.

## How to use (Create)

### Create Collection

Required parameter
- title

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;

$res = new BillplzCollection;
$res->title = "New Collection";
// and other optional params
$res = $res->create_collection();
list($rheader, $rbody, $rurl) = explode("\n\r\n", $res);
$bplz_result = json_decode($rurl);
```

### Get Collection

Required parameter
- collection_id 

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;
$res1 = new BillplzCollection;
$res1->collection_id = "xxxxxx";
$res1 = $res1->get_collection();
list($rheader, $rbody, $rurl) = explode("\n\r\n", $res1);
$bplz_result = json_decode($rurl);
```

### Get Collection Index

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;
$res2 = new BillplzCollection;
$res2 = $res2->get_collection();
list($rheader, $rbody, $rurl) = explode("\n\r\n", $res2);
$bplz_result = json_decode($rurl);
```

### Activate Collection

Required parameter
- collection_id 

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;
$res5 = new BillplzCollection;
$res5->collection_id = "xxxxxx";
$res5 = $res5->activate_collection();
```

### Deactivate Collection

Required parameter
- collection_id 
- activate=false

```php
use Neonexxa\BillplzWrapperV3\BillplzCollection;
$res4 = new BillplzCollection;
$res4->collection_id = "xxxxxx";
$res4->activate = false ;
$res4 = $res4->activate_collection();
list($rheader, $rbody, $rurl) = explode("\n\r\n", $res4);
$bplz_result = json_decode($rurl);
```

### Create Open Collection

Required parameter
- title 
- description
- amount (will be ignore if fixed_amount=false)

```php
$res = new BillplzOpenCollection;
$res->title = "New Open collection";
$res->description = "New Open collection desc";
// $res->fixed_amount = false;
$res->amount = 2*100;
$res = $res->create_opencollection();
list($rheader, $rbody, $rurl) = explode("\n\r\n", $res);
$bplz_result = json_decode($rurl);
```

### Get Open Collection

Required parameter
- collection_id

```php
$res2 = new BillplzOpenCollection;
$res2->collection_id = $bplz_result->id;
$res2 = $res2->get_opencollection();
```

### Get Open Collection Index

```php
$res3 = new BillplzOpenCollection;
$res3 = $res3->get_opencollection();
```

### Create bill

Required parameter
- collection_id
- description
- email
- name
- amount
- callback_url

```php
$res0 = new BillplzBill;
$res0->collection_id = "xxxxxx"; // which collection you want to park this bill under
$res0->description = "New BIll"; // bill description
$res0->email = "Receipientofthebill@receipientcompany.com"; // client email
$res0->name = "receipientname"; // cleint name
$res0->amount = 2*100; // by default in cent
$res0->callback_url = "yourwebsite@example.com"; // callback url after execution
// and other optional params
$res0 = $res0->create_bill();
list($rhead ,$rbody, $rurl) = explode("\n\r\n", $res0);
$bplz_result = json_decode($rurl);
```

### Get bill

Required parameter
- bill_id

```php
$res = new BillplzBill;
$res->bill_id = $bplz_result->id;
$res = $res->get_bill();
list($rhead ,$rbody, $rurl) = explode("\n\r\n", $res);
$bplz_result = json_decode($rurl);
```

### Delete bill

Required parameter
- bill_id

```php
$res2 = new BillplzBill;
$res2->bill_id = $bplz_result->id;
$res2 = $res2->delete_bill();
```

thats all so far nothing yet ..