<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Multipledb {
  var $db = NULL;
  function __construct(){
    $CI = &get_instance();
    $this->db = $CI->load->database('indiapicture', TRUE);  
  }
  // Add more functions two use commonly.
  public function get_collection(){

 die('library');
      $this->indiapicture->select('*');
    $this->indiapicture->where('portal','2');
     $this->indiapicture->order_by('id','desc');
    $query= $this->indiapicture->get('tbl_category');
    return $query->result();


}

}