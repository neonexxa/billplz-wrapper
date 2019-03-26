<?php 
namespace Neonexxa\BillplzWrapperV3;
class BillplzCollection extends Billplz {

  public $title;
  public function __construct(){
    parent::__construct();
    echo "i run here\n";
    echo $this->host."\n";
  }
  function set_param($data, $data2 = null) {
   if (is_array($data)) {
     foreach($data as $key => $value){
       $this->data[$key] = $value;
     }
   } else if ($data2 !== null) {
     $this->data[$data] = $data2;
   }
  }
  // static $get; // your top variable set as static

  // public static function get() {
  //     return self::$get;
  // }
  function create_collection($params = null){
      echo" then i run here\n";
      if (is_array($params)) {
        $this->set_param($params);
      }
      // required parameter
      if (!empty($this->title)) {
        $this->data['title'] = $this->title;
      }else{
        $this->error = "Title is a required parameter";
        return false;
      }
      // // optional parameter
      // if (isset($this->data['logo'])) {
      //   if (file_exists($this->data['logo'])) {
      //     $this->data['logo'] = '@'. $this->data['logo'];
      //   } else {
      //     $this->error = "logo file not found";
      //     return false;
      //   }
      // }
      
      return $this->callAPI("POST","collections",$this->data);
  }

  public function get($params=null)
  {
    // if (is_array($params)) {
    //   $this->set_param($params);
    // }
    echo $this->host." host\n";
    if (isset($params['collection_id'])) {
      // return collection details
    }else{
      // return collection index
    }
  }
}
