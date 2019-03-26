<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use Neonexxa\BillplzWrapperV3\BillplzCollection;
echo " Collection Function Testing\n";
	
	$res = new BillplzCollection;
	$res->title = "im setting";
	$respond = $res->create_collection();
	echo $respond;
	if ($respond) {
		echo $respond->error;
	}else{
		echo $respond->error."\n";
	}
	// echo "respond: \n".json_encode($res);
// 	list($rheader, $rbody,$jsonrespond) = explode("\n\r\n", $res);
// 	$bplz_result_collection = json_decode($jsonrespond);
// echo " Create Colleciton Function Works id(".$bplz_result_collection->id.")\n";
// echo " Bill Function Testing\n";
// 	$test2 = new BillplzV3([
// 	            'api_key' => "69475bb2-2718-4c90-9ccd-80f36beef328",
// 	            'currency' => 'USD_MYR'
// 	        ]);
// 	$test2->set_param('collection_id',$bplz_result_collection->id);
// 	$test2->set_param('description','Maecenas eu placerat ante.');
// 	$test2->set_param('email','api@billplz.com');
// 	$test2->set_param('name','Michael API V3');
// 	$test2->set_param('amount','200');
// 	$test2->set_param('callback_url','http://example.com/webhook/');
// 	$res = $test2::create_bill();
// 	list($rheader, $rbody,$jsonrespond) = explode("\n\r\n", $res);
// 	$bplz_result_bill = json_decode($jsonrespond);
// echo " Create Bill Function Works id(".$bplz_result_bill->id.")\n";
// class BillplzTest extends \PHPUnit_Framework_TestCase
// {
//     protected function create_collection()
//     {
//         return $this->getMockBuilder('Neonexxa\BillplzWrapperV3\Billplz')
//                     ->setMethods(array('query'))
//                     ->disableOriginalConstructor()
//                     ->getMock();
//     }
// }
// $res = BillplzCollection::get(["collection_id"=>"col_id"]);