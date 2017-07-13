<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tracking extends CI_Controller
{
   public  function save_user_login_details($user_id,$url,$ipaddress)
        {
       die('main controller  a');
        $data2=array('user_id'=>$user_id,'login_session_detals'=>$url,'system_ip'=>$ipaddress);
        $check1= $this->Tracking_model->check_user_login_details($user_id);
           
        if($check1==0)
            {
            $this->Tracking_model->track_login_details($data2);
            }
        else
        {
            $this->Tracking_model->update_track_login_details($data2,$user_id);
        }
        
        }   
     
}
?>