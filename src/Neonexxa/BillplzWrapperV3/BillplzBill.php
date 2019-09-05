<?php 
namespace Neonexxa\BillplzWrapperV3;
class BillplzBill extends Billplz {

  public $bill_id;
  public $collection_id;
  public $description;
  public $email;
  public $name;
  public $amount;
  public $callback_url;
  public $redirect_url;
  
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
  function create_bill(){
      if (!empty($this->collection_id)AND !empty($this->description)AND !empty($this->email)AND !empty($this->name)AND !empty($this->amount)AND !empty($this->callback_url) ) {
        // required parameter
        $this->data['collection_id'] = $this->collection_id;
        $this->data['description']= $this->description;
        $this->data['email']=$this->email;
        $this->data['name']=$this->name;
        $this->data['amount']=$this->amount;
        $this->data['callback_url']=$this->callback_url;
      }else{
        $this->error = "Required parameter is empty";
        return $this->error;
      }
      // optional parameter
      if(!empty($this->redirect_url)){
        $this->data['redirect_url'] = $this->redirect_url;
      }
      return $this->callAPI("POST","bills",$this->data);
  }

  function get_bill()
  {
    if (!empty($this->bill_id)) {
        // required parameter
        $this->data['bill_id'] = $this->bill_id;
      }else{
        $this->error = "Required parameter is empty";
        return $this->error;
      }
    return $this->callAPI("GET","bills",$this->data);
  }
  function delete_bill()
  {
    if (!empty($this->bill_id)) {
        // required parameter
        $this->data['bill_id'] = $this->bill_id;
      }else{
        $this->error = "Required parameter is empty";
        return $this->error;
      }
    return $this->callAPI("DELETE","bills",$this->data);
  }
}
