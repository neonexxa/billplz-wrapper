<?php 
namespace Neonexxa\BillplzWrapperV3;
use Carbon\Carbon as Carbon;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Config\Repository as Config;
class Billplz {

  private $apiurl = 'https://www.billplz.com/api/v3';
  public $data = [];
  private $api_key;
  public $currency;
  public $ch;
  public $sep = '/';
  public $ints = '?';

  public function __construct(Config $config, $data = [] ){
    
    $this->billplzconfig = $config->get('billplz');
    
    if (is_array($data) && (count($data) > 0)) {
      if (isset($data['api_key'])) $this->api_key = $data['api_key'];
      if (isset($data['host'])) $this->host = $data['host'];
      if (isset($data['currency'])) $this->currency = $data['currency'];
    }
    echo "echoing config";
    echo $this->billplzconfig;
    echo "end echoing config";
  }
    
  // function set_param($data, $data2 = null) {
  //  if (is_array($data)) {
  //    foreach($data as $key => $value){
  //      $this->data[$key] = $value;
  //    }
  //  } else if ($data2 !== null) {
  //    $this->data[$data] = $data2;
  //  }
  // }
  // function create_collection()
  //   {
  //     $this->ch = $this->host . $this->sep . "collections";
  //     // required parameter
  //     // dd($this->data['title']);
  //     // optional parameter
  //     if (isset($this->data['logo'])) {
  //       if (file_exists($this->data['logo'])) {
  //         $this->data['logo'] = '@'. $this->data['logo'];
  //       } else {
  //         $this->error = "logo file not found";
  //         return false;
  //       }
  //     }
      
  //     return $this->callAPI("POST",$this->ch,$this->data);
  //   }
  function create_bill()
  {
    $this->ch = $this->host . $this->sep . "bills";
    return $this->callAPI("POST",$this->ch,$this->data);
  }
  public function callAPI($method, $forwhat, $data){
        if ($this->api_key == '') {
            $this->error = 'API key was not set';
            return false;
        }
        switch ($forwhat) {
          case 'collections':
            # code...

            $url = $this->host . $this->sep . "collections";
            break;
          
          default:
            # code...
            break;
        }
        echo "im here finally".$url."\n";
    // curl_setopt($this->ch, CURLOPT_HEADER, 1);
    // curl_setopt($this->ch, CURLOPT_USERPWD, $this->api_key . ":");
    // curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);
    // curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);

    // if (count($this->data) > 0) {
    //  curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->data );
    // }

    // $r = curl_exec($this->ch);
    // curl_close($this->ch);
       $curl = curl_init();

       switch ($method){
          case "POST":
             curl_setopt($curl, CURLOPT_POST, 1);
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             break;
          case "PUT":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                              
             break;
          default:
             if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
       }

       // OPTIONS:
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HEADER, 1);
       // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       //    'APIKEY: 111111111111111111111',
       //    'Content-Type: application/json',
       // ));
       curl_setopt($curl, CURLOPT_USERPWD, $this->api_key . ":");
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

       // EXECUTE:
       $result = curl_exec($curl);
       if(!$result){die("Connection Failure");}
       curl_close($curl);
       return $result;
  }
}
