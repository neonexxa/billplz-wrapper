<?php 
namespace Neonexxa\BillplzWrapperV3;
class BillplzCollection extends Billplz {

  public $title;
  public $split_payment;
  public $collection_id;
  public $activate;
  public function __construct(){
    parent::__construct();
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

  /**
  *
  *  Changes for create_collection
  *  Description :   
  *  Last edited by : Firdausneonexxa
  *
  */
    
  function create_collection(){
      if (!empty($this->title)) {
        // required parameter
        $this->data['title'] = $this->title;
        // optional parameter
        if (isset($this->split_payment['email'])) $this->data['split_payment[email]'] = $this->split_payment['email'];
        if (isset($this->split_payment['fixed_cut'])) $this->data['split_payment[fixed_cut]'] = $this->split_payment['fixed_cut'];
        if (isset($this->split_payment['split_header'])) $this->data['split_payment[split_header]'] = $this->split_payment['split_header'];
      }else{
        $this->error = "Title is a required parameter";
        return $this->error;
      }
      return $this->callAPI("POST","collections",$this->data);
  }
  /**
  *
  *  Changes for get_collection 
  *  Description :   get collection and collection_index
  *  Last edited by : Firdausneonexxa
  *
  */
    
  function get_collection()
  {
    if (isset($this->collection_id)) $this->data['collection_id'] = $this->collection_id;
    return $this->callAPI("GET","collections",$this->data);
  }

  /**
  *
  *  Changes for activate_collection 
  *  Description :   activate and deactivate
  *  Last edited by : Firdausneonexxa
  *
  */
    
  function activate_collection()
  {
    $this->data['activate'] = (empty($this->activate))? $this->activate : true; 
    if (!empty($this->collection_id)) {
      $this->data['collection_id'] = $this->collection_id;  
    }else{
      $this->error = "collection_id is a required parameter";
      return $this->error;
    }
    return $this->callAPI("POST","collections",$this->data);
  }
}
