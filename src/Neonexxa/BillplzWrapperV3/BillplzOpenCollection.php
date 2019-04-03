<?php 
namespace Neonexxa\BillplzWrapperV3;
class BillplzOpenCollection extends Billplz {

  public $title;
  public $description;
  public $amount;
  public $fixed_amount;
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
        
        if(empty($this->fixed_ammount)){
          $this->data['amount']       = $this->amount; // ignored if fixed ammount is false
        }else{
          $this->data['fixed_amount']       = false; // ignored if fixed ammount is false
        }
        // optional parameter
        $this->data['fixed_quantity']                           = $this->fixed_quantity
        $this->data['payment_button']                           = $this->payment_button
        $this->data['reference_1_label']                          = $this->reference_1_label
        $this->data['reference_2_label']                          = $this->reference_2_label
        $this->data['email_link']                         = $this->email_link
        $this->data['tax']                                = $this->tax
        $this->data['split_payment[email]']                           = $this->split_payment['email']
        $this->data['split_payment[variable_cut]']                          = $this->split_payment['variable_cut']
        $this->data['split_payment[split_header]']                          = $this->split_payment['split_header']
        // if (isset($this->split_payment['email'])) $this->data['split_payment[email]'] = $this->split_payment['email'];
        // if (isset($this->split_payment['fixed_cut'])) $this->data['split_payment[fixed_cut]'] = $this->split_payment['fixed_cut'];
        // if (isset($this->split_payment['split_header'])) $this->data['split_payment[split_header]'] = $this->split_payment['split_header'];
      }else{
        $this->error = "Required parameter is empty";
        return $this->error;
      }
      return $this->callAPI("POST","collections",$this->data);
  }

  function get_opencollection()
  {
    if (isset($this->collection_id)) $this->data['collection_id'] = $this->collection_id;
    return $this->callAPI("GET","collections",$this->data);
  }
}
