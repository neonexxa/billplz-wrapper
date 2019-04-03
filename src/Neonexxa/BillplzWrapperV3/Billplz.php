<?php 
namespace Neonexxa\BillplzWrapperV3;
use Carbon\Carbon as Carbon;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Config\Repository as Config;
class Billplz {

  private $billplzconfig;
  public $data = [];
  public $ch;
  public $sep = '/';
  public $ints = '?';

  public function __construct(){
    $this->billplzconfig = config('billplz');
  }

  public function callAPI($method, $forwhat, $data){
        if ($this->billplzconfig['BILLPLZ_API_KEY'] == '') {
            $this->error = 'API key was not set';
            return $this->error;
        }
        switch ($forwhat) {
          case 'collections':
            # code...
            $url = $this->billplzconfig['BILLPLZ_API_URL'] . $this->sep . $this->billplzconfig['BILLPLZ_API_VERSION']. $this->sep ."collections";
            
            if (!empty($data['collection_id'])) {
              $url = $url.$this->sep.$data['collection_id'];
            }
            if (isset($this->data['activate'])) {
              if ($data['activate']) {
                $url = $url.$this->sep.'activate';
              }else{
                $url = $url.$this->sep.'deactivate';
              }
            }
            break;
          case 'open_collections':
            # code...
            $url = $this->billplzconfig['BILLPLZ_API_URL'] . $this->sep . $this->billplzconfig['BILLPLZ_API_VERSION']. $this->sep ."open_collections";
            
            if (!empty($data['collection_id'])) {
              $url = $url.$this->sep.$data['collection_id'];
            }
            break;
          case 'bills':
            # code...
            $url = $this->billplzconfig['BILLPLZ_API_URL'] . $this->sep . $this->billplzconfig['BILLPLZ_API_VERSION']. $this->sep ."bills";
            if (!empty($data['bill_id'])) {
              $url = $url.$this->sep.$data['bill_id'];
            }
            break;
          
          default:
            # code...
            break;
        }
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
          case "DELETE":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
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
       curl_setopt($curl, CURLOPT_USERPWD, $this->billplzconfig['BILLPLZ_API_KEY'] . ":");
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

       // EXECUTE:
       $result = curl_exec($curl);
       if(!$result){die("Connection Failure");}
       curl_close($curl);
       return $result;
  }
}
