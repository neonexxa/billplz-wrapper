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
switch ($for) {
            case 'bill':
                # code...
                $res0 = new BillplzBill;
                $res0->collection_id = "nxnpxcln"; // which collection you want to park this bill under
                $res0->description = "lol"; // bill description
                $res0->email = "firdaus.hishamuddin@invigour-energy.com"; // client email
                $res0->name = "Neonexxa"; // cleint name
                $res0->amount = 2*100; // by default in cent
                $res0->callback_url = "google.com"; // callback url after execution
                $res0 = $res0->create_bill();
                list($rhead ,$rbody, $rurl) = explode("\n\r\n", $res0);
                $bplz_result = json_decode($rurl);
                echo $res0."\n create_bill Done";
                $res = new BillplzBill;
                $res->bill_id = $bplz_result->id;
                $res = $res->get_bill();
                echo $res."\n Get_bill Done";
                $res2 = new BillplzBill;
                $res2->bill_id = $bplz_result->id;
                $res2 = $res2->delete_bill();
                echo $res2."\n delete_bill Done";
            case 'collection':
                # code...
                $res3 = new BillplzCollection;
                $res3->title = "Test wrapper";
                $res3 = $res3->create_collection();
                echo $res3."\n Create_collection Done";
                list($rheader, $rbody, $rurl) = explode("\n\r\n", $res3);
                $bplz_result = json_decode($rurl);
                $res = new BillplzCollection;
                $res->collection_id = $bplz_result->id;
                $res = $res->get_collection();
                echo $res."\n Get_collection Done";
                $res2 = new BillplzCollection;
                $res2 = $res2->get_collection();
                echo $res2."\n Get_collection_index Done";
                $res4 = new BillplzCollection;
                $res4->collection_id = $bplz_result->id;
                $res4->activate = false ;
                $res4 = $res4->activate_collection();
                echo $res4."\n deactivate_collection Done";
                $res5 = new BillplzCollection;
                $res5->collection_id = $bplz_result->id;
                $res5 = $res5->activate_collection();
                echo $res5."\n activate_collection Done";
                break;
            case 'opencollection':
            	$res = new BillplzOpenCollection;
                $res->title = "test wrapper open";
                $res->description = "test wrapper open desc";
                $res->fixed_amount = false;
                // $res->amount = 2*100;
                $res = $res->create_opencollection();
                echo $res."\n create_opencollection Done";
                list($rheader, $rbody, $rurl) = explode("\n\r\n", $res);
                $bplz_result = json_decode($rurl);
                $res2 = new BillplzOpenCollection;
                $res2->collection_id = $bplz_result->id;
                $res2 = $res2->get_opencollection();
                echo $res2."\n Get_opencollection Done";
                $res3 = new BillplzOpenCollection;
                $res3 = $res3->get_opencollection();
                echo $res3."\n Get_opencollection index Done";
            	break;
            default:
                # code...
                break;
        }