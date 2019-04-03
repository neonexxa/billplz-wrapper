<?php 
namespace Neonexxa\BillplzWrapperV3;
class BillplzOpenCollection extends Billplz {

  public $title;
  public $description;
  public $amount;
  public $fixed_amount;
  public $fixed_quantity;
  public $payment_button;
  public $reference_1_label;
  public $reference_2_label;
  public $email_link;
  public $tax;
  public $split_payment;
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

  function create_opencollection(){
      if (!empty($this->title) AND !empty($this->description)) {
        // required parameter
        $this->data['title']        = $this->title;
        $this->data['description']  = $this->description;
        if(isset($this->fixed_amount)){
          if ($this->fixed_amount) {
            $this->data['amount']       = $this->amount; // ignored if fixed ammount is false
          }else{
            $this->data['fixed_amount']       = "false";
          }
        }
      }else{
        $this->error = "Required parameter is empty";
        return $this->error;
      }
      // optional parameter
      if(!empty($this->fixed_quantity)){
        $this->data['fixed_quantity']                     = $this->fixed_quantity;
      }
      if(!empty($this->payment_button)){
        $this->data['payment_button']                     = $this->payment_button;
      }
      if(!empty($this->reference_1_label)){
        $this->data['reference_1_label']                  = $this->reference_1_label;
      }
      if(!empty($this->reference_2_label)){
        $this->data['reference_2_label']                  = $this->reference_2_label;
      }
      if(!empty($this->email_link)){
        $this->data['email_link']                         = $this->email_link;
      }
      if(!empty($this->tax)){
        $this->data['tax']                                = $this->tax;
      }
      if(!empty($this->split_payment['email'])){
        $this->data['split_payment[email]']               = $this->split_payment['email'];
      }
      if(!empty($this->split_payment['variable_cut'])){
        $this->data['split_payment[variable_cut]']        = $this->split_payment['variable_cut'];
      }
      if(!empty($this->split_payment['split_header'])){
        $this->data['split_payment[split_header]']        = $this->split_payment['split_header'];
      }
      return $this->callAPI("POST","open_collections",$this->data);
  }

  function get_opencollection()
  {
    if (isset($this->collection_id)) $this->data['collection_id'] = $this->collection_id;
    return $this->callAPI("GET","open_collections",$this->data);
  }
}
