<?php
class Backend extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
                $this->load->library('session');
		$this->load->library('email');
                $this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
                //$this->load->helper('mpdf_download');
		$this->load->model('backend_model');
		$this->load->model('search_model');
		$this->load->model('channel_partner_model');
		$this->load->database();

	}




       
public function get_frame_name_details(){
      $frame_id=$this->input->post('values');
    
    $sql="select * from tbl_add_details where frame_cat like '%".$frame_id."%'";
    $rows=  mysql_query($sql);
    while($result=  mysql_fetch_assoc($rows)){
      $frame_cat=  $result['frame'];
        echo "<option value=".$frame_cat.">$frame_cat</option>";
     
    } 
 }   
 
 
 public function get_frame_category_details(){
      $frame_id=$this->input->post('values');
    
    $sql="select * from tbl_add_details where frame_type='".$frame_id."'";
    $rows=  mysql_query($sql);
    while($result=  mysql_fetch_assoc($rows)){
      $frame_cat=  $result['frame_cat'];
        echo "<option value=".$frame_cat.">$frame_cat</option>";
     
    } 
 }   
 


     
public function get_add_details(){
   $category=$this->input->post('values');
    if($category==1){
       $query="print_paper!='0'";   
    }elseif($category==2){
        $query="frame!='0'";
    }elseif($category==3){
       $query="glass!='0'"; 
    }elseif($category==4){
        $query="mount!='0'"; 
    }
    
    $sql="select * from tbl_add_details where $query";
    $rows=  mysql_query($sql);
    while($result=  mysql_fetch_assoc($rows)){
        
        if($category==1){
            $name=$result['print_paper'];
        echo "<option value=".$name.">$name</option>";
    }elseif($category==2){
        $name=$result['frame'];
        echo "<option value=".$name.">$name</option>";
    }elseif($category==3){
        $name=$result['glass'];
        echo "<option value=".$name.">$name</option>";
    }elseif($category==4){
        $name=$result['mount'];
        echo "<option value=".$name.">$name</option>";
    }
        
       
    } 
}       
        
 public function add_details()
 {
   $this->load->view('backend/add_details');   
 }

 public function save_details(){
      $print_paper=$this->input->post('print_paper');
      $category=$this->input->post('category');
      $name=$this->input->post('catname');
       $frame=$this->input->post('frame');
        $frame_name=$this->input->post('frame_name');
      $roll=$this->input->post('roll');
      if($roll<>''){
        $sql="insert into tbl_add_roll set pp_id='".$print_paper."', roll='".$roll."', create_date='".date('y-m-d h:t')."'";
       $insert=  mysql_query($sql);
        if($insert){
            echo 1;
        }else{
            echo 0;
        }    
          
      }else{
        
       if($category==1){
        $query="print_paper='".$name."',frame='0', glass='0', mount='0'";  
       }else if($category==2){
       $query="print_paper='0',frame_type='".$frame."',frame_cat='".$name."',frame='".$frame_name."', glass='0', mount='0'";      
       }else if($category==3){
        $query="print_paper='0', frame='0', glass='".$name."', mount='0'";      
       }else if($category==4){
       $query="print_paper='0',frame='0', glass='0', mount='".$name."'";         
       }
       
        $sql="insert into tbl_add_details set $query ,  create_date='".date('y-m-d h:t')."'";
       $insert=  mysql_query($sql);
        if($insert){
            echo 1;
        }else{
            echo 0;
      }  }
 }




 public function web_pricing(){
      
        $data['collection']= $this->backend_model->get_collection();
		 $data['frame_category']= $this->backend_model->get_frame_category();
        $data['roll']= $this->backend_model->get_roll_size();
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/add_category_details',$data);
        $this->load->view('backend/footer');
  }

 
 
 
  public function save_category_details(){
      $category=$this->input->post('category');
      $name=$this->input->post('name');
      $rate=$this->input->post('rate');
      $roll=$this->input->post('roll');
      $frame_category=$this->input->post('frame_category');
      $frame_type=$this->input->post('frame_type');
      $frame_name=$this->input->post('frame_name');
     
        if($category==1){
       $query="paper_type='".$category."', roll_size='".$roll."',rate='".$rate."'";      
       }else if($category==2){
       $query="paper_type='".$category."',frame_type='".$name."',  frame_category='".$frame_category."',  frame='".$frame_name."',  frame_rate='".$rate."'";      
       }else if($category==4){
       $query="paper_type='".$category."',  mount='".$name."', mount_rate='".$rate."'";      
       }else if($category==3){
       $query="paper_type='".$category."',  glass='".$name."', glass_rate='".$rate."'";      
       }
       
        $sql="insert into tbl_web_price set $query , status='1', create_date='".date('y-m-d h:t')."'";
       $insert=  mysql_query($sql);
        if($insert){
            echo 1;
        }else{
            echo 0;
        }
        
  }
 
 


         public function convert_into_invoice()

    {

         $invoice_id=$this->input->post('invoice_id');


        if($invoice_id<>'')
        {

       $quotation_data= $this->backend_model->convert_into_invoice($invoice_id);


         if($quotation_data==1)
            {
            $data['msg']='Invoice create successfully';

            }else if($quotation_data==0){
                $data['msg']='accuring error';
            }

        }// end if condition

       unset($image_id);



        $this->load->view('backend/dashboard_header');

        $this->load->view('backend/quotation/view_invoice',$data);

        $this->load->view('backend/footer');

    }


        public function convert_into_order() {
        $order_id=$this->input->post('order_id');

        $status = $this->backend_model->convert_into_orders($order_id);

        if($status==1)
        {
            $data['msg']="Invoice converted into order successfully";
        }else if($status==0)
        {
            $data['msg']="accuring error";
        }

        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/manage_onlineorders',$data);
        $this->load->view('backend/footer');


    }


        public function quotation_view($quotation_id="")
{

    //echo $quotation_id;
    $data['quotation_data']= $this->backend_model->get_view_quotation_details($quotation_id);
     $data['quotation_details']= $this->backend_model->get_all_quotation_details($quotation_id);
     $data['quotation']= $this->backend_model->get_all_quotation($quotation_id);


        $this->load->view('backend/quotation/quotation_details',$data);



}



public  function view_order($order_id="none")
{
     $data['order_data']= $this->backend_model->get_view_order_details($order_id);
    $data['order_details']= $this->backend_model->get_all_order_details($order_id);


        $this->load->view('backend/order_details',$data);
}
public function invoice_view($invoice_id)
{

    $data['invoice_data']= $this->backend_model->get_view_invoice_details($invoice_id);
    $data['invoice_details']= $this->backend_model->get_all_invoice_details($invoice_id);
     $data['invoice']= $this->backend_model->get_all_invoice($invoice_id);


        $this->load->view('backend/invoice_details',$data);



}

	public function index()
	{
	$data['msg']="";


          if($userid=$this->session->userdata('userid')<>'')
          {
             $baseUrl=base_url().'index.php/backend/dashboard';
                                 header('location:'.$baseUrl);
          }
		$this->form_validation->set_rules('cname','Name','required');
		if($this->form_validation->run()==true)
		{
                     $email=$this->input->post('cname');
		     $password=$this->input->post('pwdfg');
		     $admin=$this->backend_model->login_verification($email,$password);
                if($admin)
			{
			 $level=$admin->access_level;
			}
			else
			{
				$level=$admin;
			}

			if($level==1)
			{
				$this->session->set_userdata('userid',$admin->channel_partner_id);
				$this->session->set_userdata('userid',$admin->email_id);
                                $this->session->set_userdata('first_name',$admin->first_name);
				//Backend_Redirect('backend/dashboard');
                                $baseUrl=base_url().'index.php/backend/dashboard';
                                 header('location:'.$baseUrl);

			}
			elseif($level==2) {
                            //echo $this->input->post('cname');
                            //echo $admin->first_name;
				 $this->session->set_userdata('id',$admin->channel_partner_id);
				 $this->session->set_userdata('email',$admin->email_id);
                                 $this->session->set_userdata('userid',$admin->email_id);
                               $_SESSION['username_session']=  $admin->first_name;

				//Backend_Redirect('channel_partners/dashboard');

                                 $baseUrl=base_url().'index.php/backend/dashboard';
                                 header('location:'.$baseUrl);
			}
			else
			{
			$data['msg']=" Invalid id or password";
			}

		}
		$this->load->view('backend/default',$data);
		$this->load->view('backend/footer');


	}
      public function edit_packager_order($order_id="")
      {
          $order_id=  $_REQUEST['order_id'];
          $data['order_details']=$this->backend_model->get_order_details($order_id);
           $data['framers']=$this->backend_model->get_framer_company_name();
             $data['packager']=$this->backend_model->get_packager_surface_name();
          $data['framer_name']=$this->backend_model->get_framer_name();
           $data['mount_name']=$this->backend_model->get_mount_glass_names('MNT');
           $data['glass_name']=$this->backend_model->get_mount_glass_names('GLS');
           $data['mgb_name']=$this->backend_model->get_mount_glass_names('MGB');
         $data['invoice_date']=$this->backend_model->get_invoice_date($order_id);
            $this->load->view('backend/dashboard_header');
           $this->load->view('backend/orders/order_packager',$data);
      }

       public function edit_framer_order()
      {
          $order_id=  $_REQUEST['order_id'];
          $data['order_details']=$this->backend_model->get_order_details($order_id);
          $data['framers']=$this->backend_model->get_framer_company_name();
          $data['framer_name']=$this->backend_model->get_framer_name();
          $data['mount_name']=$this->backend_model->get_mount_glass_names('MNT');
          $data['glass_name']=$this->backend_model->get_mount_glass_names('GLS');
          $data['mgb_name']=$this->backend_model->get_mount_glass_names('MGB');

            //$this->load->view('backend/dashboard_header');
           $this->load->view('backend/orders/order_framer',$data);
      }



      public function edit_courier_order($order_id="")
      {
          $order_id=  $_REQUEST['order_id'];
          $data['order_details']=$this->backend_model->get_order_details($order_id);
           $data['courier']=$this->backend_model->get_courier_company_name();
          $data['framer_name']=$this->backend_model->get_framer_name();
           $data['mount_name']=$this->backend_model->get_mount_glass_names('MNT');
           $data['glass_name']=$this->backend_model->get_mount_glass_names('GLS');
           $data['mgb_name']=$this->backend_model->get_mount_glass_names('MGB');
            $this->load->view('backend/dashboard_header');
           $this->load->view('backend/orders/order_courier',$data);
      }


  public function inventory(){
    //echo $edit_id;
          $data['printer_details']=$this->backend_model->get_inventory_data();

	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/inventory',$data);
	    $this->load->view('backend/footer');


}




public function save_framer_order_details()
{
                $order_id=$this->input->post('order_id');
                $framer_services=$this->input->post('framer_services');
                $frame_name=$this->input->post('frame_name');
                $mount_size=$this->input->post('mount_size');
                 $frame_color=$this->input->post('frame_color');
                  $mount_color=$this->input->post('mount_color');
                 $glass_name=$this->input->post('glass_name');
                  
                $total_print=$this->input->post('total_print');
                $type=$this->input->post('type');
                $completion_date=$this->input->post('completion_date');
                $quality_check=$this->input->post('quality_check');
                $quality_checker_name=$this->input->post('quality_checker_name');
                $person_incharge=$this->input->post('person_incharge');
               
            
                
               //$array=array('order_id'=>$order_id,'framer_services'=>$framer_services,'framer'=>$frame_name,'rate'=>$rate,'mount'=>$mount_name,'glass'=>$glasses_name,'mgb_name'=>$mgb_name,'frame_size'=>$frame_size,'mount_size'=>$mount_size,'glass_size'=>$glass_size,'mgb_size'=>$mgb_size,'total_frame'=>$total_print,'framer_company_name'=>$framer_company,'issue_date'=>date('Y-m-d h:t'),'completion_date'=>$completion_date,'quality_check'=>$quality_check,'quality_checker_name'=>$quality_checker_name,'person_incharge'=>$person_incharge,'print_type'=>$type);
             
              //$insert=$this->backend_model->insert_into_framer_order($array);
               for($i=0;$i<=count($mount_size);$i++){
                      
                      if($mount_size[$i]<>''){
                $sql=" insert into order_framer_status set print_type='".$type."',mount_color='".$mount_color[$i]."', frame_color='".$frame_color[$i]."',order_id='".$order_id."',  framer_company_name='".$framer_company."', framer_services='".$framer_services."', framer='".$frame_name[$i]."',  mount='".$mount_name[$i]."', glass='".$glasses_name[$i]."', mgb_name='".$mgb_name."', glass_name='".$glass_name[$i]."', frame_size='".$frame_size."', mount_size='".$mount_size[$i]."', glass_size='".$glass_size."', mgb_size='".$mgb_size."', total_frame='".$total_print."',completion_date='".$completion_date."', quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."'";
                 $insert=  mysql_query($sql);
                      }
               }
                if($insert)
              {
                    header("location:edit_framer_order?order_id=$order_id");
                  echo 'Framer Order Save successfully';
              }else if($insert)
              {
                  header("location:edit_framer_order?order_id=$order_id");
                  echo 'accuring error';
              }
}


public function update_framer_order_details()
{
                $order_id=$this->input->post('order_id');
                $edit_id=$this->input->post('edit_id');
                $framer_services=$this->input->post('framer_services');
                $frame_name=$this->input->post('frame_name');
                $mount_name=$this->input->post('mount_name');
                $glasses_name=$this->input->post('glasses_name');
                if($this->input->post('height')=='undefined'){
                     $height='0';
                }else{
                     $height=$this->input->post('height');
                }
               if($this->input->post('witdh')=='undefined'){
                     $witdh='0';
                }else{
                     $witdh=$this->input->post('witdh');
                }
               if($this->input->post('m_height')=='undefined'){
                     $m_height='0';
                }else{
                     $m_height=$this->input->post('m_height');
                }if($this->input->post('m_width')=='undefined'){
                     $m_height='0';
                }else{
                     $m_width=$this->input->post('m_width');
                }if($this->input->post('m_height')=='undefined'){
                     $m_width='0';
                }else{
                     $m_height=$this->input->post('m_height');
                }
                
                if($this->input->post('g_height')=='undefined'){
                     $g_height='0';
                }else{
                     $g_height=$this->input->post('g_height');
                }
                
                
                if($this->input->post('g_width')=='undefined'){
                     $g_width='0';
                }else{
                     $g_width=$this->input->post('g_width');
                }
                
                
               
                $total_print=$this->input->post('total_print');
                $name=$this->input->post('name');
                $rate=$this->input->post('rate');
                 $type=$this->input->post('type');
                $completion_date=$this->input->post('completion_date');
                $quality_check=$this->input->post('quality_check');
                $quality_checker_name=$this->input->post('quality_checker_name');
                $person_incharge=$this->input->post('person_incharge');
                $framer_company=$this->input->post('framer_company');
                $mgb_name=$this->input->post('mgb_name');
                $mgb_height=$this->input->post('mgb_height');
                $mgb_width=$this->input->post('mgb_width');

                $frame_size=$height.'x'.$witdh;
                $mount_size=$m_height.'x'.$m_width;
                $glass_size=$g_height.'x'.$g_width;
                $mgb_size=$mgb_height.'x'.$mgb_width;

              $sql=" update order_framer_status set   framer_company_name='".$framer_company."', framer_services='".$framer_services."', framer='".$frame_name."', rate='".$rate."', mount='".$mount_name."', glass='".$glasses_name."', mgb_name='".$mgb_name."', glass_name='".$glasses_name."', frame_size='".$frame_size."', mount_size='".$mount_size."', glass_size='".$glass_size."', mgb_size='".$mgb_size."', total_frame='".$total_print."',completion_date='".$completion_date."', quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."' where order_framer_status_id='".$edit_id."' and  order_id='".$order_id."'";
              $update=  mysql_query($sql);
              if($update)
              {
                  echo 'Framer Order update successfully';
              }else if($insert==0)
              {
                  echo 'accuring error';
              }
}



public function update_courier_order_details()
{
    $order_id=$this->input->post('order_id');
    $type=$this->input->post('type');
    $edit_id=$this->input->post('edit_id');
    $company=$this->input->post('company');
     $tracking_id=$this->input->post('tracking_id');
     $other_detail=$this->input->post('order_detail');
     $delivery_place=$this->input->post('delivery_place');
     $dispatch_date=$this->input->post('dispatch_date');
     $total_courier=$this->input->post('total_courier');
     $delivery_mode=$this->input->post('delivery_mode');
        $completion_date=$this->input->post('completion_date');
        $ship_date=$this->input->post('ship_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');

              $print_size=$height.'x'.$witdh;
   $sql=" update order_courier_status set rts_date='".$ship_date."',delivery_mode='".$delivery_mode."' ,courier_company_name='".$company."', tracking_id='".$tracking_id."', total_courier='".$total_courier."', order_detail='".$order_id."', delivery_date='".$completion_date."', dispatch_date='".$dispatch_date."', delivery_place='".$delivery_place."', quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."', print_type='".$type."' where   order_courier_status_id='".$edit_id."' and  order_id='".$order_id."'
";
  $update=  mysql_query($sql);
  if($update)
              {
                  echo 'Courier Order update successfully';
              }else if($insert==0)
              {
                  echo 'accuring error';
              }
}





public function save_courier_order_details()
{
    
    $type=$this->input->post('type');
    $order_id=$this->input->post('order_id');
    $company=$this->input->post('company');
     $tracking_id=$this->input->post('tracking_id');
     $other_detail=$this->input->post('order_detail');
     $delivery_place=$this->input->post('delivery_place');
     $total_courier=$this->input->post('total_courier');
	 $delivery_mode=$this->input->post('delivery_mode');
        $ship_date=$this->input->post('ship_date');
         $rts_dates=$this->input->post('rts_date');
        $completion_date=$this->input->post('completion_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');
       if($other_detail==1){
           $rts_date=$ship_date;
           
       }elseif($other_detail==2){
           $dispatch_date=$ship_date;
           $rts_date=$rts_dates;
       }
              $print_size=$height.'x'.$witdh;
              $array=array('order_id'=>$order_id,'tracking_id'=>$tracking_id,'total_courier'=>$total_courier,'courier_company_name'=>$company,'order_detail'=>$other_detail,'delivery_date'=>$completion_date,'dispatch_date'=>$dispatch_date,'rts_date'=>$rts_date,'delivery_place'=>$delivery_place,'delivery_mode'=>$delivery_mode,'quality_check'=>$quality_check,'quality_checker_name'=>$quality_checker_name,'person_incharge'=>$person_incharge,'print_type'=>$type,'create_date'=>date('Y-m-d h:t'));
              //print_r($array);
              $insert=$this->backend_model->insert_into_courier_order($array);
              if($insert==1)
              {
                  echo 'Courier Order Save successfully';
              }else if($insert==0)
              {
                  echo 'accuring error';
              }
}

public function quotation_cancel(){
    $invoice_id=  $this->input->post('invoice_id');
     $update=$this->backend_model->cancel_quotation($invoice_id);
     if($update==1){
         $data['msg']='Quotation canceled';
     }else{
        $data['msg']='accuring error';
     }
        $this->load->view('backend/dashboard_header');

        $this->load->view('backend/manage_quotation',$data);

        $this->load->view('backend/footer');

}

public function save_packager_order_details()
{
    $print_type=$this->input->post('type');
    $order_id=$this->input->post('order_id');
    $printer_services=$this->input->post('printer_services');
     $packager1=$this->input->post('packager1');
      $packager2=$this->input->post('packager2');
     $packager3=$this->input->post('packager3');
      if($packager1<>'')
      {
       $packager=$this->input->post('packager1');   
      }elseif($packager2<>'')
      {
       $packager=$this->input->post('packager2');   
      }elseif($packager3<>'')
      {
       $packager=$this->input->post('packager3');   
      }
     
      $size_box_packats=$this->input->post('size_box_packats');
        $height=$this->input->post('height');
        $witdh=$this->input->post('width');
        $depth=$this->input->post('depth');
         $final_wight=$this->input->post('final_wight');
         $total_packets=$this->input->post('total_print');
          $name=$this->input->post('name');
           $completion_date=$this->input->post('completion_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');

              $print_size=$height.'x'.$witdh;
               for($i=0;$i<=count($height);$i++)
               {
                   if($height[$i]<>''){
                 $sql=   "insert into order_packager_status set order_id='".$order_id."', packager_company_name='".$packager."', packager_name='".$packager."',total_packets='".$total_packets."', packets_size='".$size_box_packats[$i]."', final_packets_height='".$height[$i]."', final_packets_width='".$witdh[$i]."', final_packets_depth='".$depth[$i]."', final_packets_weight='".$final_wight[$i]."', issue_date='".date('Y-m-d h:t')."', completion_date='".$completion_date."', quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."', print_type='".$print_type."'";
                   $insert=  mysql_query($sql);
                   }
               }
            

              if($insert)
              {
                  echo 'Packager Order Save successfully';
                   header("location:edit_packager_order?order_id=$order_id");
              }else if($insert==0)
              {
                   header("location:edit_packager_order?order_id=$order_id");
                  echo 'accuring error';
              }
}



public function update_packager_order_details()
{
    $print_type=$this->input->post('type');
    $order_id=$this->input->post('order_id');
    $edit_id=$this->input->post('edit_id');
    $printer_services=$this->input->post('printer_services');
     $packager1=$this->input->post('packager1');
      $packager2=$this->input->post('packager2');
     $packager3=$this->input->post('packager3');
      if($packager1<>'')
      {
       $packager=$this->input->post('packager1');   
      }elseif($packager2<>'')
      {
       $packager=$this->input->post('packager2');   
      }elseif($packager3<>'')
      {
       $packager=$this->input->post('packager3');   
      }
     
      $size_box_packats=$this->input->post('size_box_packats');
        $height=$this->input->post('height');
        $witdh=$this->input->post('width');
        $depth=$this->input->post('depth');
         $final_wight=$this->input->post('final_wight');
         $total_packets=$this->input->post('total_print');
          $name=$this->input->post('name');
           $completion_date=$this->input->post('completion_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');

              $print_size=$height.'x'.$witdh;
               for($i=0;$i<=count($height);$i++)
               {
                   if($height[$i]<>''){
                 $sql=   "update order_packager_status set  packager_company_name='".$packager."', packager_name='".$packager."',total_packets='".$total_packets."', packets_size='".$size_box_packats[$i]."', final_packets_height='".$height[$i]."', final_packets_width='".$witdh[$i]."', final_packets_depth='".$depth[$i]."', final_packets_weight='".$final_wight[$i]."', issue_date='".date('Y-m-d h:t')."', completion_date='".$completion_date."', quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."', print_type='".$print_type."' where order_id='".$order_id."' and order_packager_status_id='".$edit_id[$i]."' ";
                   $update=  mysql_query($sql);
                   }
               }
           

              if($update)
              {
                  echo 'Packager Order Update successfully';
                  header("location:edit_packager_order?order_id=$order_id");
              }else if($insert==0)
              {
                   header("location:edit_packager_order?order_id=$order_id");
                  echo 'accuring error';
              }
}





public function save_create_quotation()

    {
    //error_reporting(E_ALL);

     $qutatiion=  $this->input->post('qutatiion');
     $nofs=  $this->input->post('nofs');
        $category=  $this->input->post('category');
        $category_off=  $this->input->post('category_off');
        $firstname=$this->input->post('firstname');
         $lastname=$this->input->post('lastname');
          $email=$this->input->post('email');
           $martialstatus=$this->input->post('martialstatus');
            $address=$this->input->post('address');
             $companyname=$this->input->post('companyname');
              $country=$this->input->post('country');
               $state=$this->input->post('state');
                $city=$this->input->post('city');
                 $gender=$this->input->post('gender');
                 $region=$this->input->post('region');
                 $pincode=$this->input->post('pincode');
                 $contactnumber=$this->input->post('contactnumber');
                 $city_str=strtolower($city);
                  if($city_str=='delhi' || $city_str=='new delhi'){
                      $tax_type='VAT';
                  }else{
                      $tax_type='CST';
                  }


         $customer_id=$this->input->post('selected_customer_id');
        $date=date('Y-m-d h:t');
        $quotation_id=$this->input->post('quotation_id');

       // print_r($license_cost_off);
        $licence_cost=$this->input->post('license_cost');
        if($qutatiion==1){
        $tmp_name=$_FILES["file"]["tmp_name"];
        $file=$_FILES["file"]["name"];
        $image_id=$this->input->post('imgid');
        $licence_cost=$this->input->post('license_cost');
        //print_r($licence_cost);
        $surface=$this->input->post('surface');
        $print_size_height=$this->input->post('print_height');
        $print_size_width=$this->input->post('print_width');
        $print_cost=$this->input->post('print_cost');
       // print_r($print_cost);die;
        $frame_code=$this->input->post('frame_code');
        $frame_size_width=$this->input->post('frame_width');
        $frame_cost=$this->input->post('frame_cost');
        $frame_cost=$this->input->post('frame_cost');
        $frame_total=$this->input->post('frame_total');
        $mount_code=$this->input->post('mount_code');
        $mount_size_width=$this->input->post('mount_width');
        $mount_cost=$this->input->post('mount_cost');
        $glass_cover=$this->input->post('cover');
        $glass_cost=$this->input->post('glass_cost');

          $packaging_charge=$this->input->post('packaging_charge');
           $courier_charge=$this->input->post('courier_charge');
           $createdby=$this->input->post('createdby');
           $discount=$this->input->post('discount');
            //$after_discount=$this->input->post('after_discount');
             $tax=$this->input->post('tax');
               $total=$this->input->post('Q_total');
        }elseif($qutatiion==2){
      $tmp_name=$_FILES["file_off"]["tmp_name"];
      $file=$_FILES["file_off"]["name"];
          $image_id=$this->input->post('imgid_off');
          $order_id_off=$this->input->post('order_id_off');
        $licence_cost=$this->input->post('license_cost_off');
        //print_r($licence_cost);
        $surface=$this->input->post('surface_off');
        $border=$this->input->post('border_off');
        $print_size_height=$this->input->post('print_height_off');
        $print_size_width=$this->input->post('print_width_off');
        $print_cost=$this->input->post('print_cost_off');
       // print_r($print_cost);die;
        $frame_code=$this->input->post('frame_code_off');
        $print_rate_off=$this->input->post('print_rate_off');
        $frame_size_width=$this->input->post('frame_width_off');
        $frame_cost=$this->input->post('frame_cost_off');
        $frame_cost=$this->input->post('frame_cost_off');
        $frame_total=$this->input->post('frame_total_off');
        $mount_code=$this->input->post('mount_code_off');
        $mount_size_width=$this->input->post('mount_width_off');
        $mount_cost=$this->input->post('mount_cost_off');
        $cover_off=$this->input->post('cover_off');
        $glass_cost=$this->input->post('glass_cost_off');
         $packaging_charge_off=$this->input->post('packaging_charge_off');
          $courier_charge_off=$this->input->post('courier_charge_off');
           $createdby=$this->input->post('createdby');
           $discount=$this->input->post('discount_val');
            //$after_discount=$this->input->post('after_discount');
             $tax=$this->input->post('tax_off');
               $total=$this->input->post('Q_total_off');
               $cp_amount=$this->input->post('cp_amount');

        }
        elseif($qutatiion==3){
      $tmp_name=$_FILES["file_custom"]["tmp_name"];
      $file=$_FILES["file_custom"]["name"];
      
          $collection_name=$this->input->post('collection_name');
          $final_royality=$this->input->post('final_royality');
          $final_wna_license_share=$this->input->post('final_wna_license_share');
          $wna_actual_license_share=$this->input->post('wna_actual_license_share');
          $diff_royality=$this->input->post('diff_royality');
          $actual_royality=$this->input->post('actual_royality');
          $print_rate_custom=$this->input->post('print_rate_custom');
          $actual_print_cost=$this->input->post('actual_print_cost');
          $print_discount_custom=$this->input->post('print_discount_custom');
          $mount_discount_custom=$this->input->post('mount_discount_custom');
          $mount_actual_cost_custom=$this->input->post('mount_actual_cost_custom');
          $mount_rate_custom=$this->input->post('mount_rate_custom');
          
          $frame_discount_custom=$this->input->post('frame_discount_custom');
          $frame_actual_cost_custom=$this->input->post('frame_actual_cost_custom');
          $frame_rate_custom=$this->input->post('frame_rate_custom');
          
          $cover_discount_custom=$this->input->post('cover_discount_custom');
          $cover_actaul_cost_custom=$this->input->post('cover_actaul_cost_custom');
          $glass_rate_custom=$this->input->post('glass_rate_custom');
          
          
          $canvas_discount_custom=$this->input->post('canvas_discount_custom');
          $canvas_actual_cost_custom=$this->input->post('canvas_actual_cost_custom');
          $canvas_rate_custom=$this->input->post('canvas_rate_custom');
            $seller_amount=$this->input->post('seller_amount');
            $sp_amount=$this->input->post('sp_amount');
             
          $category_off=$this->input->post('category_custom');
           $image_id=$this->input->post('imgid_custom');
          $order_id_off=$this->input->post('order_id_custom');
        $licence_cost=$this->input->post('license_cost_custom');
        //print_r($licence_cost);
        $surface=$this->input->post('surface_custom');
        $border=$this->input->post('border_custom');
        $print_size_height=$this->input->post('print_height_custom');
        $print_size_width=$this->input->post('print_width_custom');
        $print_cost=$this->input->post('print_cost_custom');
       // print_r($print_cost);die;
        $frame_code=$this->input->post('frame_code_custom');
        $print_rate_off=$this->input->post('print_rate_custom');
        $frame_size_width=$this->input->post('frame_width_custom');
        $frame_cost=$this->input->post('frame_cost_custom');
        $frame_total=$this->input->post('frame_total_custom');
        $mount_code=$this->input->post('mount_code_custom');
        $mount_size_width=$this->input->post('mount_width_custom');
        $mount_cost=$this->input->post('mount_cost_custom');
        $cover_off=$this->input->post('cover_custom');
        $glass_cost=$this->input->post('glass_cost_custom');
         $packaging_charge_off=$this->input->post('packaging_charge_custom');
          $courier_charge_off=$this->input->post('courier_charge_custom');
           $createdby=$this->input->post('createdby_custom');
           $discount=$this->input->post('discount_val');
            $canvas_cost_custom=$this->input->post('canvas_cost_custom');
             $tax=$this->input->post('tax_custom');
               $Q_total_custom=$this->input->post('Q_total_custom');
               $cp_amount=$this->input->post('cp_amount');

        }



             $s_name=$this->input->post('s_name_custom');
               $s_email=$this->input->post('s_email_custom');
                $s_contact=$this->input->post('s_contact_custom');

                $c_name=$this->input->post('c_name_custom');
               $c_email=$this->input->post('c_email_custom');
                $c_contact=$this->input->post('c_contact_custom');



        $status=1;

      //  print_r($total);



   for($i=0;$i<count($licence_cost);$i++)
        {
       //echo $_FILES["file"]["name"][$i];
       
        $date=date('U');
            move_uploaded_file($tmp_name[$i],"images/upload_img/".$date.$file[$i]);
            if($file[$i]<>'')
            {
                  $file="images/upload_img/".$date.$file[$i];
              }


             if($image_id[$i]!='')
             {
                 $fileName=$image_id[$i];
             }else if($file[$i]!='')
             {

                 $fileName=$file;

             }
             //echo $fileName.'<br>';

        $tax_val= $total[$i]*5/100;
        $after_tax_val=   $total[$i]+$tax_val;
        if($discount!=0){
       $after_discount_val=$after_tax_val*$discount/100;
       $after_discount=$after_tax_val-$after_discount_val;
        }
      
	  
       $canvas_val=(($print_size_height[$i])*2)+(($print_size_width[$i])*2);
       $canvas_cost=$canvas_val*85/12;// 85 rate
      
        $OrgPrintCost=($print_size_height[$i]*$print_size_width[$i])*$print_rate_off[$i];
        $org_licence_cost=$OrgPrintCost*$licence_cost[$i]/100;
        
        $OrgMountHeight=$print_size_height[$i]+($mount_size_width[$i]*2);
        $OrgMountWidth= $print_size_width[$i]+($mount_size_width[$i]*2);
        $OrgMountSize=$OrgMountHeight*$OrgMountWidth;
        $OrgMountCost=$OrgMountSize*0.75;
        
        $OrgFrametRuningCost = (($OrgMountHeight + $frame_size_width[$i]*2)*2)+(($OrgMountWidth+$frame_size_width[$i]*2*2));
        $OrgFramCost=($OrgFrametRuningCost)/(12)*65;//rate 2
        $glass_cost=$OrgMountSize*.38;

       $borderHeight=((($border[$i])*2)+($print_size_height[$i]));
       $borderWidth= ((($border[$i])*2)+($print_size_width[$i]));
       $border_cost=($borderHeight)*($borderWidth)*($print_rate_off[$i]);
	  

        if($qutatiion==1){
        if($category[$i]==1){
            $print_type=1;
            $totalCost=$OrgPrintCost;
        }elseif($category[$i]==2){
            $print_type[$i]=2;
            $totalCost=$OrgPrintCost+$OrgMountCost;
        }if($category[$i]==3){
            $print_type=3;
            $totalCost=$OrgPrintCost+$glass_cost+$OrgMountCost;
        }if($category[$i]==4){
            $totalCost=$OrgPrintCost+$OrgFramCost+$OrgMountCost+$glass_cost;
       $print_type=4;
            }
        }else if($qutatiion==2){
        if($category_off[$i]==1){
            $print_type=1;
            $totalCost=$border_cost;
        }elseif($category_off[$i]==2){
            $print_type=2;
            $totalCost=$OrgMountCost+$border_cost;
        }elseif($category_off==3){
            $print_type=3;
            $totalCost=$OrgFramCost+$border_cost;
        }elseif($category_off==4){
            $print_type=4;
            $totalCost=$OrgFramCost+$OrgMountCost+$glass_cost+$border_cost;
        }elseif($category_off[$i]==5){
            $print_type=5;
            $totalCost=$OrgFramCost+$OrgMountCost+$border_cost;
        }elseif($category_off[$i]==6){
            $print_type=6;
            $totalCost=$OrgFramCost+$canvas_cost+$border_cost;
        }
        }else if($qutatiion==3){
             if($category_off[$i]==1){
            $print_type=1;
            $totalCost=$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }elseif($category_off[$i]==2){
            $print_type=2;
            $totalCost=$mount_cost[$i]+$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }elseif($category_off==3){
            $print_type=3;
            $totalCost=$frame_cost[$i]+$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }elseif($category_off==4){
            $print_type=4;
            $totalCost=$frame_cost[$i]+$mount_cost[$i]+$glass_cost[$i]+$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }elseif($category_off[$i]==5){
            $print_type=5;
            $totalCost=$frame_cost[$i]+$mount_cost[$i]+$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }elseif($category_off[$i]==6){
            $print_type=6;
            $totalCost=$frame_cost[$i]+$canvas_cost_custom[$i]+$print_cost[$i]+$packaging_charge_off[$i]+$courier_charge_off[$i];
        }
        }
        
        
       if($after_discount<>''){
           $totalCost=$after_discount;
       }else{
           $totalCost=$totalCost;
       }

$date=date('Y-m-d h:t');
       if($licence_cost[$i]<>'')
       {
           $discount_custom=$cp_amount[$i]*$sp_amount[$i]/100;

      $insert=" insert into tbl_quotation set print_discount='".$print_discount_custom[$i]."',wna_sp_amount='".$Q_total_custom[$i]."',collection='".$collection_name[$i]."',print_rate='".$print_rate_custom[$i]."', actual_print_cost='".$actual_print_cost[$i]."', final_royality='".$final_royality[$i]."', final_wna_license_share='".$final_wna_license_share[$i]."', wna_actual_license_share='".$wna_actual_license_share[$i]."', diff_royality='".$diff_royality[$i]."', actual_royality='".$actual_royality[$i]."', frame_actual_cost='".$frame_actual_cost_custom[$i]."', frame_rate='".$frame_rate_custom[$i]."', frame_discount='".$frame_discount_custom[$i]."', mount_actual_cost='".$mount_actual_cost_custom[$i]."', mount_discount='".$mount_discount_custom[$i]."', mount_rate='".$mount_rate_custom[$i]."', actual_glass_cost='".$cover_actaul_cost_custom[$i]."', glass_rate='".$glass_rate_custom[$i]."', glass_discount='".$cover_discount_custom[$i]."', actual_canvas_cost='".$canvas_actual_cost_custom[$i]."', canvas_rate='".$canvas_rate_custom[$i]."', canvas_discount='".$canvas_discount_custom[$i]."', sp_amount='".$sp_amount[$i]."', seller_amount='".$seller_amount[$i]."', nofs='".$nofs."', cp_amount='".$cp_amount[$i]."', tax_type='".$tax_type."',order_id='".$order_id_off[$i]."', border='".$border[$i]."', price='".$total[$i]."', canvas_cost='".$canvas_cost."',print_type='".$category_off[$i]."', quotation_type='".$qutatiion."', createdby='".$createdby."',after_discount='".$after_discount."', discount='".$discount_custom."', tax='".$tax_val."', packing_charge='".$packaging_charge_off[$i]."', courier_charge='".$courier_charge_off[$i]."', sales_person='".$s_name."', sales_emailid='".$s_email."', sales_contact='".$s_contact."', client_servicing='".$c_name."', client_emailid='".$c_email."', client_contact='".$c_contact."', customer_id='".$customer_id."',
        quotation_id='".$quotation_id."', image_id='".$fileName."', licence_cost='".$licence_cost[$i]."', surface='".$surface[$i]."', print_size_height='".$print_size_height[$i]."', print_size_width='".$print_size_width[$i]."', print_cost='".$OrgPrintCost."', frame_code='".$frame_code[$i]."',  frame_size_width='".$frame_size_width[$i]."', frame_cost='".$OrgFramCost."',   mount_code='".$mount_code[$i]."',  mount_size_width='".$mount_size_width[$i]."', mount_cost='".$OrgMountCost."', glass_name='".$cover_off[$i]."', glass_cost='".$glass_cost."', status='1', total='".$totalCost."',created_date='".$date."'";
   $QueryExecute= mysql_query($insert);
      $insert1="insert into tbl_quotation_details set  customer_id='".$customer_id."',  quotation_id='".$quotation_id."', first_name='".$firstname."', last_name='".$lastname."', email_id='".$email."', gander='".$gender."', marries_statue='".$martialstatus."', address='".$address."', company_name='".$companyname."', country='".$country."', state='".$state."', city='".$city."', region='".$region."', pincode='".$pincode."', contact='".$contactnumber."', created_date='".$date."'";
   mysql_query($insert1);
       }
     
    if($QueryExecute)
            {
           $data['msg']='Quotation create successfully';

            }else{
              $data['msg']='accuring error';
            }

        }  // eend loop

 

       unset($image_id);



        $this->load->view('backend/dashboard_header');

        $this->load->view('backend/quotation/create_quotation_new',$data);

        $this->load->view('backend/footer');

    }


public function sendmail(){
    $order_id=$this->input->post('order_id');
    $mailsend=$this->input->post('mailsend');
     $mail_id=$this->input->post('mail_id');
  
     if($mailsend=='printer'){
          $sendmail='printing@wallsnart.com';
         
          $sql="select actual_size,`order_id`, `printer_company_name`,  `surface`, `print_size`, `total_print`, `delivery_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_printer_status where order_id='".$order_id."'";
			$result = @mysql_query($sql) or die("Couldn't execute query");   
			$schema_insert = "";
                   $schema_insert.="<table border='1'><tr><td>Invoice Id</td><td>Company Name</td><td>Surface </td><td> Print Size</td><td> Actual Print Size</td><td> No of Print</td><td> Deliver Date </td><td> Completion Date </td><td> Quality Check Status </td><td> Quality Checker Name </td><td>Person Incharge</td></tr>"     ;
           while($row = mysql_fetch_assoc($result))
			{
			
			
                         $order_id=$row['order_id'];
                         $printer_company_name=$row['printer_company_name'];
                         $surface=$row['surface'];
                         $print_size=$row['print_size'];
                         $actual_size=$row['actual_size'];
                         $total_print=$row['total_print'];
                         $delivery_date=$row['delivery_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];
                          
                            $schema_insert.= "<tr><td>$order_id</td><td>$printer_company_name</td><td>$surface</td><td>$print_size</td><td>$actual_size</td><td>$total_print</td><td>$delivery_date</td><td>$completion_date</td><td>$check</td><td>$quality_checker_name</td><td>$person_incharge</td></tr>";
                        }
                        $schema_insert.="</table>";
      $to=$mail_id;   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:Wallsnart <info@wallsnart.com>' . "\r\n";
$subject = 'Printer report';
        $send=mail($to,$subject,$schema_insert,$headers);
        if($send){
            echo 'Mail send successfully';
        }else{
            echo 'mail sending error';
        }
     
}else
    if($mailsend=='framer'){
        
            $sendmail='framing@wallsnart.com';
         
          $sql1="select `order_id`, `framer_company_name`, `framer_services`, `framer`, `rate`, `mount`, `glass`, `mgb_name`, `glass_name`, `frame_size`, `mount_size`, `glass_size`, `mgb_size`, `total_frame`, `issue_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_framer_status where order_id='".$order_id."'";
			$result1 = @mysql_query($sql1) or die("Couldn't execute query");   
			
			  
                      
          $row1 = mysql_fetch_assoc($result1);
			
             
			 $order_id=$row1['order_id'];
                         $framer_company_name=$row1['framer_company_name'];
                         $framer_services=$row1['framer_services'];
                         $framer=$row1['framer'];
                         $rate=$row1['rate'];
                         $mount=$row1['mount'];
                         $glass=$row1['glass'];
                        
                         $mgb_name=$row1['mgb_name'];
                         $glass_name=$row1['glass_name'];
                         $frame_size=$row1['frame_size'];
                         $mount_size=$row1['mount_size'];
                         $glass_size=$row1['glass_size'];
                         $mgb_size=$row1['mgb_size'];
                         $total_frame=$row1['total_frame'];
                         $completion_date=$row1['completion_date'];
                         $quality_check=$row1['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row1['quality_checker_name'];
                          $person_incharge=$row1['person_incharge'];

                             
               $schema_insert= "<table><tr><td>Invoice Id</td><td>Company Name</td><td>Framer Services </td><td>Framer</td><td> Rate</td><td> Mount</td><td> Glass</td><td> MGB name</td><td> Glass Name</td><td> Frame Size</td><td> Mount Size</td><td> Glass Size</td><td> MGB Size</td><td> No of Frame</td><td> Completion Date </td><td> Quality Check Status </td><td> Quality Checker Name </td><td>Person Incharge</td></tr>
                 <tr><td>$order_id</td><td>$framer_company_name</td><td>$framer_services</td><td>$framer</td><td>$rate</td><td>$mount</td><td>$glass</td><td>$mgb_name</td><td>$glass_name</td><td>$frame_size	</td><td>$mount_size</td><td>$glass_size</td><td>$mgb_size</td><td>$total_frame</td><td>$completion_date</td><td>$check</td><td>$quality_checker_name</td><td>$person_incharge</td></tr></table>";
                     
      $to=$mail_id;   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:Wallsnart <info@wallsnart.com>' . "\r\n";
$subject = 'Framer report';
        $send=mail($to,$subject,$schema_insert,$headers);
        if($send){
            echo 'Mail send successfully';
        }else{
            echo 'mail sending error';
        }
     
}


else
    if($mailsend=='courier'){
        
            $sendmail='courier@wallsnart.com';
         
         $sql="select order_id,`courier_company_name`, `tracking_id`, `total_courier`, `order_detail`, `delivery_date`, `dispatch_date`, `delivery_place` from order_courier_status where order_id='".$order_id."'";
			$result1 = @mysql_query($sql) or die("Couldn't execute query");   
		             
          $row = mysql_fetch_assoc($result1);
			
              $order_id=$row['order_id'];
                         $courier_company_name=$row['courier_company_name'];
                         $tracking_id=$row['tracking_id'];
                         $total_courier=$row['total_courier'];
                         $order_detail=$row['order_detail'];
                         $delivery_date=$row['delivery_date'];
                         $dispatch_date=$row['dispatch_date'];
                          
                         $delivery_place=$row['delivery_place'];
                         $delivery_date=$row['issue_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];

                             
               $schema_insert= "<table><tr><td>Invoice Id</td><td>Company Name</td><td>Tracking Id </td><td> No of Courier</td><td>Order Status</td><td> Deliver Date </td><td> Completion Date </td><td> Quality Check Status </td><td> Quality Checker Name </td><td>Person Incharge</td></tr>
                            <tr><td>$order_id</td><td>$courier_company_name</td><td>$tracking_id</td><td>$total_courier</td><td>$order_detail</td><td>$delivery_date</td><td>$completion_date</td><td>$check</td><td>$quality_checker_name</td><td>$person_incharge</td></tr></table>";
                     
      $to=$mail_id;   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:Wallsnart <info@wallsnart.com>' . "\r\n";
$subject = 'Courier report';
        $send=mail($to,$subject,$schema_insert,$headers);
        if($send){
            echo 'Mail send successfully';
        }else{
            echo 'mail sending error';
        }
     
}


else
    if($mailsend=='packager'){
        
            $sendmail='packaging@wallsnart.com';
         
      $sql="select total_packets,`order_id`, `packager_company_name`, `packager_name`, `packets_size`, `final_packets_height`, `final_packets_width`, `final_packets_depth`, `final_packets_weight`, `issue_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_packager_status where order_id='".$order_id."'";
			$result2 = @mysql_query($sql) or die("Couldn't execute query");   
			
		             
          while($row = mysql_fetch_assoc($result2)){
			
              $order_id=$row['order_id'];
                         $packager_company_name=$row['packager_company_name'];
                         $packager_name=$row['packager_name'];
                         $final_packets_height=$row['final_packets_height'];
                         $final_packets_width=$row['final_packets_width'];
                         $final_packets_depth=$row['final_packets_depth'];
                         $packets_size=$row['packets_size'];
                          if($packets_size==1){
                              $packaging_size='Small';
                          }elseif($packets_size==2){
                              $packaging_size='Medium';
                          }elseif($packets_size==3){
                              $packaging_size='Large';
                          }elseif($packets_size==4){
                              $packaging_size='Extra Large';
                          }else
                         $total_packets=$row['total_packets'];
                         $delivery_date=$row['issue_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];

                             
               $schema_insert.= "<table><tr><td>Invoice Id</td><td>Company Name</td><td>Packager Name </td><td> No of Package</td><td>Packets Size</td><td>Final Height</td><td>Final Width</td><td>Final Depth</td><td>Final Weight</td><td> Completion Date </td><td> Quality Check Status </td><td> Quality Checker Name </td><td>Person Incharge</td></tr>
                            <tr><td>$order_id</td><td>$packager_company_name</td><td>$packager_name</td><td>$total_packets</td><td>$packets_size</td><td>$final_packets_height</td><td>$final_packets_width</td><td>$final_packets_depth</td><td>$final_packets_weight</td><td>$delivery_date</td><td>$delivery_date</td><td>$completion_date</td><td>$check</td><td>$quality_checker_name</td><td>$person_incharge</td></tr></table>";
                     
      
}


$to=$mail_id;   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:Wallsnart <info@wallsnart.com>' . "\r\n";
$subject = 'Packager report';
        $send=mail($to,$subject,$schema_insert,$headers);
        if($send){
            echo 'Mail send successfully';
        }else{
            echo 'mail sending error';
        }
     


}


}



public function dowload_printer_pdf(){
   
$order_id=$this->input->post('order_id');
    
  $filename = "Printer_Report";        //Fiile Name 
			/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
			//create MySQL connection   
			$sql="select actual_size,`order_id`, `printer_company_name`,  `surface`, `print_size`, `total_print`, `delivery_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_printer_status where order_id='".$order_id."'";
			$result = @mysql_query($sql) or die("Couldn't execute query");   
			
			$file_ending = "xls";
			//header info for browser
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$filename.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
			/*******Start of Formatting for Excel*******/   
			//define separator (defines columns in excel & tabs in word)
			$sep = "\t"; //tabbed character
			//start of printing column names as names of MySQL fields
			echo "Invoice Id \t Company Name\t Surface \t Print Size \t Actual Print Size \t  No of Print\t Deliver Date \t Completion Date \t Quality Check Status \t Quality Checker Name \t Person Incharge";
			print "\n";
			//end of printing column names  
			//start while loop to get data
			while($row = mysql_fetch_assoc($result))
			{
			$schema_insert = "";
			
                         $order_id=$row['order_id'];
                         $printer_company_name=$row['printer_company_name'];
                         $surface=$row['surface'];
                         $print_size=$row['print_size'];
                         $actual_size=$row['actual_size'];
                         $total_print=$row['total_print'];
                         $delivery_date=$row['delivery_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];
                          
                        $schema_insert=$order_id."\t".$printer_company_name."\t".$surface."\t".$print_size."\t".$actual_size."\t".'1'."\t".$delivery_date."\t".$completion_date."\t".$check."\t".$quality_checker_name."\t".$person_incharge;
			$schema_insert = str_replace($sep."$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			print(trim($schema_insert));
			print "\n";
			}   
			    
}


public function dowload_framer_xsl(){
$order_id=$this->input->post('order_id');

  $filename = "framer_Report";        //Fiile Name 
			/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
			//create MySQL connection   
			 $sql="select frame_color,mount_color,`order_id`, `framer_company_name`, `framer_services`, `framer`, `rate`, `mount`, `glass`, `mgb_name`, `glass_name`, `frame_size`, `mount_size`, `glass_size`, `mgb_size`, `total_frame`, `issue_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_framer_status where order_id='".$order_id."'";
			$result = @mysql_query($sql) or die("Couldn't execute query");   
			
			$file_ending = "xls";
			//header info for browser
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$filename.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
			/*******Start of Formatting for Excel*******/   
			//define separator (defines columns in excel & tabs in word)
			$sep = "\t"; //tabbed character
			//start of printing column names as names of MySQL fields
			echo "Invoice Id \t Company Name\t Framer Name \t Frame Color\t  Mount Color \t Glass Name \t Frame Size\t Mount Size\t No of Frames \t Completion Date \t Quality Check Status \t Quality Checker Name \t Person Incharge";
			print "\n";
			//end of printing column names  
			//start while loop to get data
			while($row = mysql_fetch_assoc($result))
			{
			$schema_insert = "";
			
                         $order_id=$row['order_id'];
                         $framer_company_name=$row['framer_company_name'];
                         $framer_services=$row['framer_services'];
                         $framer=$row['framer'];
                         $rate=$row['rate'];
                         $mount=$row['mount'];
                         $glass=$row['glass'];
                          $mount_color=$row['mount_color'];
                           $frame_color=$row['frame_color'];
                          
                         $mgb_name=$row['mgb_name'];
                         $glass_name=$row['glass_name'];
                         $frame_size=$row['frame_size'];
                         $mount_size=$row['mount_size'];
                         $glass_size=$row['glass_size'];
                         $mgb_size=$row['mgb_size'];
                         $total_frame=$row['total_frame'];
                         $delivery_date=$row['delivery_date'];
                         $delivery_date=$row['issue_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];
                          
                        $schema_insert=$order_id."\t".$framer_company_name."\t".$framer."\t".$frame_color."\t".$mount_color."\t".$glass_name."\t".$frame_size."\t".$mount_size."\t".$total_frame."\t".$completion_date."\t".$check."\t".$quality_checker_name."\t".$person_incharge;
                          
                        $schema_insert = str_replace($sep."$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			print(trim($schema_insert));
			print "\n";
			}   
			    
}



public function dowload_courier_xsl(){
    
$order_id=$this->input->post('order_id');

  $filename = "Courier_Report";        //Fiile Name 
			/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
			//create MySQL connection   
			$sql="select delivery_mode, order_id,`courier_company_name`, `tracking_id`, rts_date,`total_courier`, `order_detail`, `delivery_date`, `dispatch_date`,quality_checker_name,person_incharge, `delivery_place` from order_courier_status where order_id='".$order_id."'";
			$result = @mysql_query($sql) or die("Couldn't execute query");   
			
			$file_ending = "xls";
			//header info for browser
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$filename.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
			/*******Start of Formatting for Excel*******/   
			//define separator (defines columns in excel & tabs in word)
			$sep = "\t"; //tabbed character
			//start of printing column names as names of MySQL fields
			echo "Invoice Id \t Company Name\t Tracking Id\t No of Courier\t Order Status\t Delivery Mode \t Read To ship Date \t Dispatch Date \t Quality Check Status \t Quality Checker Name \t Person Incharge";
			print "\n";
			//end of printing column names  
			//start while loop to get data
			while($row = mysql_fetch_assoc($result))
			{
			$schema_insert = "";
			
                         $order_id=$row['order_id'];
                         $courier_company_name=$row['courier_company_name'];
                         $tracking_id=$row['tracking_id'];
                         $total_courier=$row['total_courier'];
                         $order_detail=$row['order_detail'];
                         $delivery_date=$row['delivery_date'];
                         $dispatch_date=$row['dispatch_date'];
                          if($dispatch_date<>'0000-00-00 00:00:00')
                          {
                              $dispatch_date=$dispatch_date;
                          }else{
                              $dispatch_date='N/A';
                          }
                          $rts_date=$row['rts_date'];
                          
                         //$delivery_place=$row['delivery_place'];
                         $delivery_date=$row['issue_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                         
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];
                         if($row['order_detail']==1){ $order_staus= 'Ready To Ship';}else if($row['order_detail']==2){ $order_staus= 'Shipped';}
                         if($row['delivery_mode']==1){ $delivery_mode= 'Own';}else if($row['delivery_mode']==2){ $delivery_mode= 'Channel Parter';}
                        $schema_insert=$order_id."\t".$courier_company_name."\t".$tracking_id."\t".$total_courier."\t".$order_staus."\t".$delivery_mode."\t".$rts_date."\t".$dispatch_date."\t".$check."\t".$quality_checker_name."\t".$person_incharge;
                          
                        $schema_insert = str_replace($sep."$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			print(trim($schema_insert));
			print "\n";
			}   
			    
}



public function dowload_packager_xsl(){
$order_id=$this->input->post('order_id');

  $filename = "Package_Report";        //Fiile Name 
			/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
			//create MySQL connection   
			$sql="select total_packets,`order_id`, `packager_company_name`, `packager_name`, `packets_size`, `final_packets_height`, `final_packets_width`, `final_packets_depth`, `final_packets_weight`, `issue_date`, `completion_date`, `quality_check`, `quality_checker_name`, `person_incharge` from order_packager_status where order_id='".$order_id."'";
			$result = @mysql_query($sql) or die("Couldn't execute query");   
			
			$file_ending = "xls";
			//header info for browser
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$filename.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
			/*******Start of Formatting for Excel*******/   
			//define separator (defines columns in excel & tabs in word)
			$sep = "\t"; //tabbed character
			//start of printing column names as names of MySQL fields
			echo "Invoice Id \t Company Name\t Packager Name \t No of Packaging\t Packaging Size \t Final Packaging Height \t Final Packaging Width \t Final Packaging Depth \t Deliver Date \t Completion Date \t Quality Check Status \t Quality Checker Name \t Person Incharge";
			print "\n";
			//end of printing column names  
			//start while loop to get data
			while($row = mysql_fetch_assoc($result))
			{
			$schema_insert = "";
			
                         $order_id=$row['order_id'];
                         $packager_company_name=$row['packager_company_name'];
                         $packager_name=$row['packager_name'];
                         $final_packets_height=$row['final_packets_height'];
                         $final_packets_width=$row['final_packets_width'];
                         $final_packets_depth=$row['final_packets_depth'];
                         $packets_size=$row['packets_size'];
                          if($packets_size==1){
                              $packaging_size='Small';
                          }elseif($packets_size==2){
                              $packaging_size='Medium';
                          }elseif($packets_size==3){
                              $packaging_size='Large';
                          }elseif($packets_size==4){
                              $packaging_size='Extra Large';
                          }else
                         $total_packets=$row['total_packets'];
                         $delivery_date=$row['issue_date'];
                         $completion_date=$row['completion_date'];
                         $quality_check=$row['quality_check'];
                          if($quality_check==0)
                          {
                              $check='No';
                          }elseif($quality_check==1){
                              $check='Yes';    
                          }
                          $quality_checker_name=$row['quality_checker_name'];
                          $person_incharge=$row['person_incharge'];
                          if($final_packets_width<>0)
                          {
                        $schema_insert=$order_id."\t".$packager_company_name."\t".$packager_name."\t".$total_packets."\t".$packaging_size."\t".$final_packets_height."\t".$final_packets_width."\t".$final_packets_depth."\t".$delivery_date."\t".$completion_date."\t".$check."\t".$quality_checker_name."\t".$person_incharge;
                          }
                        $schema_insert = str_replace($sep."$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			print(trim($schema_insert));
			print "\n";
			}   
			    
}



public function update_printer_order_details()
{
     $edit_id=$this->input->post('edit_id');
    $order_id=$this->input->post('order_id');
    $print_type=$this->input->post('print_type');
    $printer_services=$this->input->post('printer_services');
     $printer=$this->input->post('printer');
      $surface=$this->input->post('surface');
       $height=$this->input->post('height');
        $witdh=$this->input->post('width');
         $total_print=$this->input->post('total_print');
          $name=$this->input->post('name');
           $completion_date=$this->input->post('completion_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');

              $print_size=$height.'x'.$witdh;
              $sql=" update order_printer_status set  printer_company_name='".$printer_company_name."', services='".$printer."', surface='".$surface."', print_size='".$print_size."', total_print='".$total_print."',  quality_check='".$order_id."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."', print_type='".$print_type."' where order_printer_status_id='".$edit_id."' and order_id='".$order_id."'";
               $update=  mysql_query($sql);
              if($update)
              {
                  echo 'Print Order Save successfully';
              }else if($update)
              {
                  echo 'accuring error';
              }
}




public function save_printer_order_details()
{
    $order_id=$this->input->post('order_id');
     $a_height=$this->input->post('a_height');
      $a_width=$this->input->post('a_width');
     $print_type=$this->input->post('type');
    $printer_services=$this->input->post('printer_services');
     $printer=$this->input->post('printer_off');
      $surface=$this->input->post('surface_off');
       $height=$this->input->post('height');
        $witdh=$this->input->post('width');
         $total_print=$this->input->post('total_print');
          $name=$this->input->post('name');
           $completion_date=$this->input->post('completion_date');
            $quality_check=$this->input->post('quality_check');
             $quality_checker_name=$this->input->post('quality_checker_name');
              $person_incharge=$this->input->post('person_incharge');
            if(isset($print_type)){
                $print_type=$print_type;
            }
              //$array=array('services'=>$printer_services,'order_id'=>$order_id,'printer_company_name'=>$printer,'surface'=>$surface,'print_size'=>$print_size,'actual_size'=>$actual_size,'total_print'=>$total_print,'completion_date'=>$completion_date,'quality_check'=>$quality_check,'quality_checker_name'=>$quality_checker_name,'person_incharge'=>$person_incharge,'print_type'=>$print_type);
              //print_r($array);
             // $insert=$this->backend_model->insert_into_print_order($array);
               
               for($i=0;$i<=count($actual_size);$i++){
                   $print_size=$height[$i].'x'.$witdh[$i];
                   $actual_size=$a_height[$i].'x'.$a_width[$i];
                   if($a_width[$i]<>''){
            $sql=" insert into order_printer_status set completion_date='".$completion_date."', order_id='".$order_id."', actual_size='".$actual_size."', printer_company_name='".$printer."', services='".$printer."', surface='".$surface."', print_size='".$print_size."', total_print='".$total_print."',  quality_check='".$quality_check."', quality_checker_name='".$quality_checker_name."', person_incharge='".$person_incharge."', print_type='".$print_type."' ";
              $insert= mysql_query($sql);
               }}
           
               if($insert)
              {
                  echo 'Print Order Save successfully';
                   header("location:printer?order_id=$order_id");
              }else 
              {
                   header("location:printer?order_id=$order_id");
                  echo 'accuring error';
              }
               
             
}


 public function printer(){
    //echo $edit_id;
         $data['printers']=$this->backend_model->get_printers_company_name();
          $data['surface']=$this->backend_model->get_printers_surface();
           $order_id=  $_REQUEST['order_id'];
          $data['order_details']=$this->backend_model->get_order_details($order_id);
	 $data['invoice_date']=$this->backend_model->get_invoice_date($order_id);
        


	    $this->load->view('backend/orders/order_printer',$data);
	    //$this->load->view('backend/footer');


}


public function short_framer_rate()
{
    $framer_name=$this->input->post('framer_name');
     $rate=$this->backend_model->short_framer_rate($framer_name);
     //print_r($data);
     foreach ($rate as $rate_val)
     {
         echo '<option value="'.$rate_val->rate.'" >'.$rate_val->rate.'</option>';
     }
}

 public function framer(){
    //echo $edit_id;
         $data['framers']=$this->backend_model->get_framer_company_name();
          $data['framer_name']=$this->backend_model->get_framer_name();
           $data['mount_name']=$this->backend_model->get_mount_glass_names('MNT');
           $data['glass_name']=$this->backend_model->get_mount_glass_names('GLS');
           $data['mgb_name']=$this->backend_model->get_mount_glass_names('MGB');
         //print_r($data);
	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/orders/order_framer',$data);
	    $this->load->view('backend/footer');


}

public function packager(){
    //echo $edit_id;

    $data['packager']=$this->backend_model->get_packager_company_name();
         //print_r($data);
	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/orders/order_packager',$data);
	    $this->load->view('backend/footer');


}


public function courier(){
    //echo $edit_id;

    $data['courier']=$this->backend_model->get_courier_company_name();
         //print_r($data);
	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/orders/order_courier',$data);
	    $this->load->view('backend/footer');


}




public function save_pricing()
{
        $date['filter_by']=$this->input->post('filter_by');
        $date['category_id']=$this->input->post('category_id');
$category=$this->input->post('category');
        $low=$this->input->post('low');
        $medium=$this->input->post('medium');
        $high=$this->input->post('high');
        $display_name=$this->input->post('display_name');
        $rate=$this->input->post('rates');
        $markup=$this->input->post('markup');
        $GSP_MP=$this->input->post('GSP_MP');
        $royalty=$this->input->post('royalty');
        $sale__price=$this->input->post('sale__price');
         $category_type=$this->input->post('category_type');

        for($i=0;$i<=count($markup); $i++)
        {
            if($category[$i]==1)
            {
              $categoryName='printer';
            }elseif($category[$i]==2)
            {
              $categoryName='framer';
            }elseif($category[$i]==3)
            {
              $categoryName='mount';
            }elseif($category[$i]==4)
            {
              $categoryName='glass';
            }
              if($markup[$i]<>'')
              {
           $insert="insert into tbl_rate_sales_details set  category_name='".$categoryName."', category_type='".$category_type[$i]."', display_name='".$display_name[$i]."', rate='".$rate[$i]."', markup='".$markup[$i]."', gsp_mp='".$GSP_MP[$i]."', royalty='".$royalty[$i]."', sale_price='".$sale__price[$i]."',  create_date='".date('Y-m-d h:t')."'";
           $sql=  mysql_query($insert);
           if($sql)
           {
             $data['msg']="Pricing save successfully";
           }else{
               $data['msg']="accuring error ";
           }
              }
        }

            $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/pricing',$data);
	    $this->load->view('backend/footer');

}

 public function pricing(){
             //echo $edit_id;
             $filter_type=$_REQUEST['filter_by'];
             //print_r($data);
             if($filter_type=='printer'){
             $data['display_name']=$this->backend_model->get_printer_display_name();
            }elseif($filter_type=='FRM' || $filter_type=='MNT' ||$filter_type=='GLS'){
            $data['display_name']=$this->backend_model->get_framer_display_name($filter_type);
             }
               //$data['display_name']=$this->backend_model->get_mount_display_name();
           // $data['display_name']=$this->backend_model->get_glass_display_name();

	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/pricing',$data);
	    $this->load->view('backend/footer');


}




public function export_meta_data() {
              $filename=$this->input->post('filename');

     $no_space= preg_match('/\s/',$filename);
    if($no_space==0 || $no_space==1)
    {
    $filename=  str_replace('.JPG','.JPG ',$filename);
    }else{
          $filename=$_GET['filename'];
     }


     $string = trim(preg_replace('/\s\s+/', ' ', $filename));
     $textarea_array= explode(' ',$string);

    for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
    }
     $newString = rtrim($str, ",");

 $rows=$this->backend_model->get_meta_data($newString);

        $filename="Meta_data";

		  $str="<table>";
            $str.="<tr><td>FileName</td><td >Caption/Title</td><td >Description</td><td> Keywords</td></tr>";
           while($result=mysql_fetch_assoc($data)){
               // $result['images_filename'];
               if($result['images_filename']<>'')
               {
             $str.="<tr><td>".$result['images_filename']."</td><td>".$result['images_caption']."</td><td>".$result['images_description']."</td><td> ".$result['images_keywords']."</td></tr>";
                }else{
                    echo 'Record Not Found';
                }

               }// end while loop





                        //Output headers to make file downloadable
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Meta_data.csv');

//Write the output to  buffer
$data = fopen('php://output', 'w');

//Output Column Headings
fputcsv($data,array('FileName','Title/Caption','Description','Keywords'));

//Retrieve the data from database


//Loop through the data to store them inside CSV
 while($result=mysql_fetch_assoc($rows)){
               // $result['images_filename'];
               if($result['images_filename']<>'')
               {
	   fputcsv($data,array($result['images_filename'],$result['images_caption'],$result['images_description'],$result['images_keywords']));
               }else{
              fputcsv($data,'Record Not found');
               }
}





        }

        public function download_meta() {

           $this->load->view('backend/dashboard_header');
		$this->load->view('backend/download_meta_data',$data);
		$this->load->view('backend/footer');

        }
        public function gallery_delete($cust_id,$lightbox_id)
        {  $data['customer_data']=$this->backend_model->get_user_id();
             $delete_id=$this->backend_model->delete_gallery($cust_id,$lightbox_id);
             $data['result_data']=$this->backend_model->get_galleries_images($cust_id);
              if($delete_id)
              {
                  $data['msg']="Gallery delete successfully";
              }else{
                  $data['msg']="accuring error";
              }
                $this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_del_gel',$data);
		$this->load->view('backend/footer');
        }

        public function add_images_restrict() {

     $filename=$this->input->post('filename');

     $no_space= preg_match('/\s/',$filename);
    if($no_space==0 || $no_space==1)
    {
    $filename=  str_replace('.JPG','.JPG ',$filename);
    }else{
          $filename=$_GET['filename'];
     }



              $string = trim(preg_replace('/\s\s+/', ' ', $filename));
$textarea_array= explode(' ',$string);

for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
 }
  $newString = rtrim($str, ",");
   if($filename<>'')
   {
   $update=$this->backend_model->restrict_filename($newString);
    if($update==1)
          {
              $data['msg']="Images restrict successfully";
          }else{
              $data['msg']="accuring error";
          }
   }


                $this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_images_restrict',$data);
		$this->load->view('backend/footer');
        }

        public function view_del_gel($cust_id="",$lightbox_id="") {

              //echo $cust_id;
               $data['result_data']=$this->backend_model->get_galleries_images($cust_id);

               //print_r($data);
               $data['customer_data']=$this->backend_model->get_user_id();
                  $this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_del_gel',$data);
		$this->load->view('backend/footer');
        }

        public function add_gallery_images() {
            $filename=$this->input->post('filename');
            $light_box_id=$this->input->post('light_box_id');

            $no_space= preg_match('/\s/',$filename);
    if($no_space==0 || $no_space==1)
    {
    $filename=  str_replace('.JPG','.JPG ',$filename);
    }else{
          $filename=$_GET['filename'];
     }


            $string = trim(preg_replace('/\s\s+/', ' ', $filename));
$textarea_array= explode(' ',$string);

for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
 }
  $newString = rtrim($str, ",");
   $rows=$this->backend_model->get_gallery_images_id($newString);

  if($filename<>'')
  {
   while($result=  mysql_fetch_assoc($rows))
   {
  $images_id=  $result['images_id'];
       $insert="insert into tbl_lightbox_images set lightbox_id='".$light_box_id."', image_id='".$images_id."', status=1";
     $execute=  mysql_query($insert);
       if($execute)
       {
           $data['msg']='Add images gallery successfully';
       }else{
            $data['msg']='accuring error';
       }
   }
  }

  $data['gallery_name']=$this->backend_model->get_galleries();
 $data['customer_data']=$this->backend_model->get_user_id();

                $this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_gallery_images',$data);
		$this->load->view('backend/footer');
        }
        public function create_gallery()
        {
             $cust_id=$this->input->post('cust_id');
            $gallery_name=$this->input->post('gallery_name');
            $desc=$this->input->post('desc');
            $date=date('Y-m-d h:t');

            $insert= $this->backend_model->Create_gallery($cust_id,$gallery_name,$desc,$date);

            $data['customer_data']=$this->backend_model->get_user_id();
           if($cust_id<>'')
           {
           if($insert==1)
           {
               $data['msg']='Gallery Created';
           }elseif($insert==0){
                 $data['msg']='accuring error';
           }

           }else{
               $data['msg']='';
           }
           //$insert=array('lightbox_id'=>'','user_id'=>$cust_id,'lightbox_name'=>$gallery_name,'lightbox_description'=>$desc,'creation_date'=>$date);


                $this->load->view('backend/dashboard_header');
		$this->load->view('backend/create_gallery',$data);
		$this->load->view('backend/footer');


        }


        public function check_channel_partner() {
            $category=$this->input->post('category');
            $Exist_filesName=$this->backend_model->exist_files_name_channel_partner($category);
            if($Exist_filesName==0)
            {
             echo 0;
            }elseif($Exist_filesName>0){
             echo 1; //json_encode(array("result"=>'N'));

            }
        }
      public function export_channel_parter()
      {

     //$this->Surface_collection_price($imagename,$size);
     $filename=$_GET['filename'];

     $product_type=$_GET['product_type'];
     $size=$_GET['size'];
     $frame_color=$_GET['frame_color'];
     $mount=$_GET['mount'];
     $category=$_GET['category'];
    //echo $filename;
     $no_space= preg_match('/\s/',$filename);
    if($no_space==0 || $no_space==1)
    {
    $filename=  str_replace('.JPG','.JPG ',$filename);
    }else{
          $filename=$_GET['filename'];
     }

      //echo $_REQUEST['frame_code'];

                       $frame_code=$_GET['frame_code'];


     $string = trim(preg_replace('/\s\s+/', ' ', $filename));
     $textarea_array= explode(' ',$string);

    for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
    }
     $newString = rtrim($str, ",");

 $data=$this->backend_model->get_img_det2($newString);
    $Exist_filesName=$this->backend_model->exist_files_name_channel_partner($newString);
                $surface_details=  $this->backend_model->Surface_collection_price($_GET['surface'],$_GET['surface_size']);
                 $frame_details=  $this->backend_model->frame_price($_GET['frame'],$_GET['frame_type'],$frame_code);
                 $mount_details=  $this->backend_model->mount_price($_GET['mount']);
                 $glasses_details=  $this->backend_model->glass_price($_GET['glass']);
                 $canvas_details=  $this->backend_model->canvas_wrapped($_GET['canvas_wrapped'],$_GET['canvas_size']);
                 $collection_wrtdetails=  $this->backend_model->collection_price_wrt_paper($_GET['surface'],$_GET['paper_size']);
                //print_r($surface_details);


         $filename="Channer_parter_report";

		  $str="<table>";
            $str.="<tr><td id='header'>Channel Partner</td><td id='header'>Product Type</td><td id='header'>FileName</td><td id='header'> Ratio</td><td id='header'> DPI</td><td id='header'>Max height</td><td id='header'>Max Width</td><td id='header'> Area</td><td id='header'>Width</td><td id='header'>Height</td><td id='header'>New Width</td><td id='header'>New Height</td><td id='header'>Print Area</td><td id='header'>Mount Area</td><td id='header'>Glass Area</td><td id='header'>Frame Area</td><td id='header'> Price</td></tr>";
           while($result=mysql_fetch_assoc($data)){
 $ratio=$result['image_original_width']/$result['image_original_height'];

                  if($product_type=='Canvas')/// or LOW
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0.00;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')///
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition



                     }else if($product_type=='Frame Mount')///MIDDLE
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                       $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition

                     }else if($product_type=='Only Frame')///HIGH
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;


                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=$p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }// end size condition

                     }

               $print_coste=$print_size*$collection_wrtdetails;
                 $mount_price=$mount_size*$mount_details[3];
                 $glass_price=$glassSize*$glasses_details[3];
                 $frame_price=$FrameSize*$frame_details;

                  if($product_type=='Canvas')
                  {
                 $total_coste=$print_coste+$mount_price+$glass_price+$frame_price+$canvas_details;
                  }else{
                  $total_coste=$print_coste+$mount_price+$glass_price+$frame_price;
                  }
               // $result['images_filename'];
               if($result['images_filename']<>'')
               {
             $str.=" <tr><td>".$category."</td><td>".$product_type."</td><td>".$result['images_filename']."</td><td> ". number_format($ratio, 2, '.', '')."<td> ".  '150'."</td><td>".  number_format($Max_height, 2,'.','')."</td><td>". number_format($Max_width, 2,'.','')."</td><td>". number_format($area, 2, '.','')."</td><td>". $p_width."</td><td>".  number_format($p_height,0, '.','')."</td><td> ".  number_format($newWidth, 0, '.','')."</td><td>".  number_format($newHeight, 0, '.','')."</td><td>".  number_format($print_size, 0, '.','')."</td><td>".number_format($mount_size ,2,'.','')."</td><td>".number_format($glassSize, 2,'.','')."</td><td>".number_format($FrameSize, 2, '.','')."</td><td>".number_format($total_coste, 2,'.','')."</td></tr> ";
                }else{
                    echo 'Record Not Found';
                }

                if($Exist_filesName==0)
                {
              $sql_1=" insert into channel_partner_export_data set mount_color='".$mount."',frame_color='".$frame_color."', product_type='".$product_type."',chanel_partner='".$category."',size='".$size."', fileName='".$result['images_filename']."', ratio='".number_format($ratio, 2, '.', '')."', dpi='150', max_height='".number_format($Max_height, 2,'.','')."', max_width='".number_format($Max_width, 2,'.','')."', area='".number_format($area, 2, '.','')."', width='".number_format($p_width,0, '.','')."', height='".number_format($p_height,0, '.','')."', new_width='".number_format($newWidth, 0, '.','')."', new_height='".number_format($newHeight, 0, '.','')."', print_size='".number_format($print_size, 0, '.','')."', mount_size='".number_format($mount_size ,2,'.','')."', glass_size='".number_format($glassSize, 2,'.','')."', frame_size='".number_format($FrameSize, 2, '.','')."', coste='".number_format($total_coste, 2,'.','')."'" ;
              mysql_query($sql_1);
                }

               }// end while loop
          $str.="</table>";
			//header("Content-Type: application/xls");

                        header("Content-Disposition: attachment; filename=$filename.xls");
                        header("Content-Type: application/vnd.ms-excel");
                        header("Pragma: no-cache");
                        header("Expires: 0");
			echo $str;




}


  public function save_channel_parter()
      {

     //$this->Surface_collection_price($imagename,$size);
     $filename=$_GET['filename'];
       $product_type=$_GET['product_type'];
      $size=$_GET['size'];
     $frame_color=$_GET['frame_color'];
     $mount=$_GET['mount'];
     $category=$_GET['category'];
    //echo $filename;
    $no_space= preg_match('/\s/',$filename);
    if($no_space==0 || $no_space==1)
    {
    $filename=  str_replace('.JPG','.JPG ',$filename);
    }else{
          $filename=$_GET['filename'];
     }

     //echo $_REQUEST['canvas_size'];
               $frame_code=$_GET['frame_code'];
         //echo $filename;

     $string = trim(preg_replace('/\s\s+/', ' ', $filename));
     $textarea_array= explode(' ',$string);

    for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
    }

     $newString = rtrim($str, ",");
   $data['detail']=$this->backend_model->get_channel_partner_data($category);
   $data2=$this->backend_model->get_img_det2($newString);
   $Exist_filesName=$this->backend_model->exist_files_name_channel_partner($category);


                $surface_details=  $this->backend_model->Surface_collection_price($_GET['surface'],$_GET['surface_size']);
                 $frame_details=  $this->backend_model->frame_price($_GET['frame'],$_GET['frame_type'],$frame_code);
                 $mount_details=  $this->backend_model->mount_price($_GET['mount']);
                 $glasses_details=  $this->backend_model->glass_price($_GET['glass']);
                 $canvas_details=  $this->backend_model->canvas_wrapped($_GET['canvas_wrapped'],$_GET['canvas_size']);
                 $collection_wrtdetails=  $this->backend_model->collection_price_wrt_paper($_GET['surface'],$_GET['paper_size']);
                //print_r($mount_details);


           while($result=mysql_fetch_assoc($data2)){

 $ratio=$result['image_original_width']/$result['image_original_height'];

                  if($product_type=='Canvas')/// or LOW
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0.00;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')///
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition



                     }else if($product_type=='Frame Mount')///MIDDLE
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                       $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition

                     }else if($product_type=='Only Frame')///HIGH
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;


                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=$p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                        $mount_size=0;//(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }// end size condition

                     }

               $print_coste=$print_size*$collection_wrtdetails;
                 $mount_price=$mount_size*$mount_details[3];
                 $glass_price=$glassSize*$glasses_details[3];
                 $frame_price=$FrameSize*$frame_details;

                  if($product_type=='Canvas')
                  {
                 $total_coste=$print_coste+$mount_price+$glass_price+$frame_price+$canvas_details;
                  }else{
                  $total_coste=$print_coste+$mount_price+$glass_price+$frame_price;
                  }
               // $result['images_filename'];

             if($Exist_filesName==0)
             {

              $sql_1=" insert into channel_partner_export_data set mount_color='".$mount."',frame_color='".$frame_color."', product_type='".$product_type."',chanel_partner='".$category."',size='".$size."', fileName='".$result['images_filename']."', ratio='".number_format($ratio, 2, '.', '')."', dpi='150', max_height='".number_format($Max_height, 2,'.','')."', max_width='".number_format($Max_width, 2,'.','')."', area='".number_format($area, 2, '.','')."', width='".number_format($p_width,0, '.','')."', height='".number_format($p_height,0, '.','')."', new_width='".number_format($newWidth, 0, '.','')."', new_height='".number_format($newHeight, 0, '.','')."', print_size='".number_format($print_size, 0, '.','')."', mount_size='".number_format($mount_size ,2,'.','')."', glass_size='".number_format($glassSize, 2,'.','')."', frame_size='".number_format($FrameSize, 2, '.','')."', coste='".number_format($total_coste, 2,'.','')."'" ;
            $insert=  mysql_query($sql_1);
             }
           }

        $this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_productForm',$data);
		$this->load->view('backend/footer');



} /// function save chennal partner data


	public function accounts_manager_dashboard()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/accounts_manager_dashboard');
		$this->load->view('backend/footer');
	}

	public function manager_manage_search_keywords()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/accounts_manager_manage_search_keywords');
		$this->load->view('backend/footer');
	}

	public function add_channel_partner()
	{
		if($this->session->userdata('userid'))
		{
			$data['msg']="";
			$this->form_validation->set_rules('email','Email','required');
			if($this->form_validation->run()==true)
			{      $product_in="";
				//$interest="";
				/*for($i=1;$i<=9;$i++)
				{
					print('ck'.$i);
					if($this->input->post('ck'.$i))
					{
						$interest=$interest.",".$this->input->post('ck'.$i);

					}
				} */

                             for($j=1;$j<=4;$j++)
                              {
                                if($this->input->post('pro_ck'.$j))
					{
                                     $product_in= $product_in.",".$this->input->post('pro_ck'.$j);
                                   }
                              }

				$data=array('channel_partner_name'=>$this->input->post('partner_name'),'address1'=>$this->input->post('address1'),'contact_person_name'=>$this->input->post('contact_person'),'address2'=>$this->input->post('address2'),'designation'=>$this->input->post('designation'),'city'=>$this->input->post('city'),'password'=>$this->input->post('password'),'state'=>$this->input->post('state'),'access_level'=>$this->input->post('access_level'),'pin_code'=>$this->input->post('pincode'),'cp_id'=>$this->input->post('cp_id'),'country'=>$this->input->post('country'),'first_name'=>$this->input->post('fname'),'email_id'=>$this->input->post('email'),'last_name'=>$this->input->post('lname'),
                                        'contact_no'=>$this->input->post('contact'),'acceptance_type'=>$this->input->post('pacceptance'),'product_types'=>$product_in,'product_sources'=>$this->input->post('pro_sources'));
				           $this->backend_model->insert_channel_partner($data);
				           $data['msg']="You Have Successfully Added Channel Partner.";
				           print_r($data);
			}
			$this->load->view('backend/dashboard_header');
		       $this->load->view('backend/add_channel_partner',$data);
			$this->load->view('backend/footer');
		}
	 else
	 {
		 redirect('backend/index');
	 }
	}

	public function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('emailid');
                $baseUrl=base_url().'index.php/backend';
                 header('location:'.$baseUrl);


               //redirect('backend/index');
	}


public function add_customer()
{

      if($this->session->userdata('userid'))
	  {

		$data['msg']="";
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('fname','Name','required');
		if($this->form_validation->run()==true)
         {

			if($this->input->post('radio')=='addnco')
			{

			 $data=array('customer_parent_id'=>'0','customer_business_type'=>$this->input->post('business_type'),
			 'customers_region'=>$this->input->post('region'),'customers_account_type'=>$this->input->post('account_type'),
			 'email_id'=>$this->input->post('email'),'password'=>$this->input->post('password'),'first_name'=>$this->input->post('fname'),
			 'last_name'=>$this->input->post('lname'),'address'=>$this->input->post('address'),'city'=>$this->input->post('city'),
			 'state'=>$this->input->post('state'),'zip_code'=>$this->input->post('pincode'),'country'=>$this->input->post('country'),
			 'contact'=>$this->input->post('contact'),'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
			 'company_type'=>$this->input->post('company_type'),'company_name'=>$this->input->post('company_name'),
			 'job'=>$this->input->post('job'),'status'=>'1');

			 $name_valid=$this->backend_model->check_existing_name($this->input->post('company_name'));
			$mail_valid=$this->backend_model->check_customer_email($this->input->post('email'));



		if($mail_valid && $name_valid)
		{
				$this->backend_model->insert_customer($data);
		 $data['msg']="Customer Has Been Successfully Added.";
		}

		else if(!$mail_valid && $name_valid)
		{
			$data['msg']="Customer Email Id Has Been Used.";

		 }
		 else if($mail_valid && !$name_valid)
		 {
			 $data['msg']="Company Name Has Been Used.";
		 }
		  else if(!$mail_valid && !$name_valid)
		 {
			 $data['msg']="Customer Email and Company Name Have Been Used.";
		 }
		 else
		 {
			 $data['msg']="";
		 }

	}
				else if($this->input->post('radio')=='addtoco')
			{
				 $data=array('customer_parent_id'=>$this->input->post('companies'),'customer_business_type'=>$this->input->post('business_type'),
			 'customers_region'=>$this->input->post('region'),'customers_account_type'=>$this->input->post('account_type'),
			 'email_id'=>$this->input->post('email'),'password'=>$this->input->post('password'),'first_name'=>$this->input->post('fname'),
			 'last_name'=>$this->input->post('lname'),'address'=>$this->input->post('address'),'city'=>$this->input->post('city'),
			 'state'=>$this->input->post('state'),'zip_code'=>$this->input->post('pincode'),'country'=>$this->input->post('country'),
			 'contact'=>$this->input->post('contact'),'customer_created_by'=>'admin','date_account_create'=>date('y:m:d h:m:s'),
			 'company_type'=>$this->input->post('company_type'), 'job'=>$this->input->post('job'),'status'=>'1','company_name'=>$this->input->post('company_name'));

					$mail_valid=$this->backend_model->check_customer_email($this->input->post('email'));
				if($mail_valid)
				{
				     $this->backend_model->insert_customer($data);
					 $data['msg']="Customer Has Been Successfully Added.";
				}
				else
				{
					$data['msg']="Customer Email Id Has Been Used.";
				}
			}


		 }
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_customer',$data);
		$this->load->view('backend/footer');
	  }
	  else
	  {
		  redirect('backend/index');
	  }



	}

  public function get_parent_customer_detail()
   {  $id= $this->input->post('customer_id');
	  $data=$this->backend_model->get_customer_data($id);
	  print($data->company_name.'/'.$data->company_type);
   }


   public function edit_customer($id)
   {
        $data['msg']="";
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('fname','Name','required');
		if($this->form_validation->run()==true)
         {
			 $data=array('customer_business_type'=>$this->input->post('business_type'),
			 'customers_region'=>$this->input->post('region'),'customers_account_type'=>$this->input->post('account_type'),
			 'email_id'=>$this->input->post('email'),'password'=>$this->input->post('password'),'first_name'=>$this->input->post('fname'),
			 'last_name'=>$this->input->post('lname'),'address'=>$this->input->post('address'),'city'=>$this->input->post('city'),
			 'state'=>$this->input->post('state'),'zip_code'=>$this->input->post('pincode'),'country'=>$this->input->post('country'),
			 'contact'=>$this->input->post('contact'),'customer_created_by'=>'admin','date_account_last_update'=>date('y:m:d h:m:s'),
			 'company_type'=>$this->input->post('company_type'),'company_name'=>$this->input->post('company_name'),
			 'job'=>$this->input->post('job'),'status'=>'1');
			 $this->backend_model->update_customer($data,$id);
			 $data['msg']="Successfully Changed";

		 }

	   $data['customer']=$this->backend_model-> get_customer_data($id);
	   $this->load->view('backend/dashboard_header');
		$this->load->view('backend/edit_customer',$data);
		$this->load->view('backend/footer');
   }


	public function waiting_image()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/waiting_images');
		$this->load->view('backend/footer');
	}


	public function view_quote()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_quotation');
		$this->load->view('backend/footer');
	}
	public function printer_order()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_printer_orders');
		$this->load->view('backend/footer');
	}
	public function previous_order()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_previous_orders');
		$this->load->view('backend/footer');
	}
	public function photographer_sales()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_photographer_sales');
		$this->load->view('backend/footer');
	}

	public function view_photographers()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_photographers');
		$this->load->view('backend/footer');
	}
	public function photographer_contract()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_photographer_contract');
		$this->load->view('backend/footer');
	}
	public function view_packaging()
	{
            $vender_name=$_GET['vender_name'];
            $email_id=$_GET['email_id'];
            $vender_code=$_GET['vender_code'];
              $data['packag_details']=$this->backend_model->Get_all_package_data();
               $data['venders']=$this->backend_model->Get_add_package_more_details($vender_name,$email_id,$vender_code);
              $data['company_name']=$this->backend_model->All_package_company_name_details();
              $data['vender_code']=$this->backend_model->All_package_sub_code_details();
              $data['email_id']=$this->backend_model->All_package_email_id_details();

                //print_r($data);
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_packaging',$data);
		$this->load->view('backend/footer');
	}

	public function invoice()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_invoice');
		$this->load->view('backend/footer');
	}

	public function framer_orders()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_framer_orders');
		$this->load->view('backend/footer');
	}

	public function view_customers()
	{
          if($this->session->userdata('userid'))
	  {

         $customer_type=$this->input->get('cust_type');
	   $status=$this->input->get('status');
	   $company=$this->input->get('company');
	   $mail=$this->input->get('mail');
	   $city= $this->input->get('city');
	    $customer_id=$this->input->get('cust_id');
		$account_type=$this->input->get('acc_type');
		$region=$this->input->get('region');
		$customer_name=$this->input->get('cust_name');
		$start_date=$this->input->get('start');
		$end_date=$this->input->get('end');
		$data['customer']="";
             
		if($customer_type||$status||$company||$mail||$city||$customer_id||$account_type||$region||$customer_name||$start_date||$end_date)
		{
			 $config['base_url'] = base_url().'index.php/backend/view_customers?cust_type=' .$customer_type . '&status=' .$status . '&company=' .$company .'&mail=' .$mail. '&city=' .$city .'&cust_id=' .$customer_id. '&acc_type='.$account_type . '&region=' .$region. '&cust_name=' .$customer_name. '&start=' .$start_date . '&end=' .$end_date;
		 	 $config['total_rows'] =$this->backend_model->count_rows_customer_search($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date);
		     $config['per_page'] =2;
		     $config['page_query_string'] = TRUE;
		  	$this->pagination->initialize($config);
			if($this->input->get('per_page'))
			{
			$page=$this->input->get('per_page');
			}
			else
			{
				$page=0;
			}
			$data['customer']=$this->backend_model->get_customer_bysearch($customer_type,$status,$company,$mail,$city,$customer_id,$account_type,$region,$customer_name,$start_date,$end_date,$config['per_page'],$page);
		$data['links']=$this->pagination->create_links();

        $data['total_customer']=$config['total_rows'];

           }
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_customers',$data);
		$this->load->view('backend/footer');
           }
          else
	  {
		   redirect('backend/index');
	  }
	}

	public function current_orders()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_current_orders');
		$this->load->view('backend/footer');
	}
        public function save_courier_details()
        {
           $contact_person=$this->input->post('contact_person');
           $com_name=$this->input->post('com_name');
           $address=$this->input->post('address');
           $contact_lan=$this->input->post('contact_lan');
           $email_id=$this->input->post('email_id');
           $mob_no=$this->input->post('mob_no');
           $state=$this->input->post('state');
           $pin_code=$this->input->post('pin_code');
           $status=$this->input->post('status');
           $courier_code=$this->input->post('courier_code');
           $cost_per_weight=$this->input->post('cost_per_weight');
           $cash_del=$this->input->post('cash_del');
           $track_sys=$this->input->post('track_sys');
           $ship_charge=$this->input->post('ship_charge');
           $cost_area=$this->input->post('cost_area');
           $del_time_area=$this->input->post('del_time_area');
           $pick_up_office=$this->input->post('pick_up_office');
           $pick_frame=$this->input->post('pick_frame');
           $del_office=$this->input->post('del_office');
           $pick_printer=$this->input->post('pick_printer');
           $pick_office=$this->input->post('pick_office');
           $working_off=$this->input->post('working_off');
           $remarks=$this->input->post('remarks');
           $level=$this->input->post('level');
           $preferred=$this->input->post('preferred');
           $name_on_cheque=$this->input->post('name_on_cheque');
           $upload_contract=$this->input->post('upload_contract');


            if($_FILES["upload_contract"]["name"]!="")
			  {
	           $contract_form=date('U').$_FILES["upload_contract"]["name"];
                move_uploaded_file($_FILES["upload_contract"]["tmp_name"],"uploaded_pdf/".$contract_form);
			  }

 $array=array('contact_person_name'=>$contact_person,'company_name'=>$com_name,'address'=>$address,'contact_number'=>$contact_lan,'email_id'=>$email_id,'mobile_number'=>$mob_no,'state'=>$state,'pin_code'=>$pin_code,'status'=>$status,'courier_code'=>$courier_code,'cost_as_per_weight'=>$cost_per_weight,'cash_on_delivery'=>$cash_del,'tracking_system'=>$track_sys,'shipping_charges'=>$ship_charge,'delivery_time_per_area_wise'=>$del_time_area,'pick_up_from_office'=>$pick_office,'pick_up_from_framer'=>$pick_frame,'delivery_to_office'=>$del_office,'pick_up_from_printer'=>$pick_printer,'pick_up_from_office_other'=>$pick_up_office,'working_on_off_days'=>$working_off,'remarks'=>$remarks,'satisfaction_level'=>$level,'preferred_surface'=>$preferred,'name_on_cheque'=>$name_on_cheque,'contract_form'=>$contract_form);

              $insert= $this->backend_model->save_courier_details($array);
             if($insert==1){
                 $data['msg']='Courier Details save succesfully';
             }elseif($insert==0){
                 $data['msg']='accuring error';
             }
               $this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_courier',$data);
		$this->load->view('backend/footer');

        }


        public function edit_courier_details()
        {
            $edit_id=$this->input->post('edit_id');
           $contact_person=$this->input->post('contact_person');
           $com_name=$this->input->post('com_name');
           $address=$this->input->post('address');
           $contact_lan=$this->input->post('contact_lan');
           $email_id=$this->input->post('email_id');
           $mob_no=$this->input->post('mob_no');
           $state=$this->input->post('state');
           $pin_code=$this->input->post('pin_code');
           $status=$this->input->post('status');
           $courier_code=$this->input->post('courier_code');
           $cost_per_weight=$this->input->post('cost_per_weight');
           $cash_del=$this->input->post('cash_del');
           $track_sys=$this->input->post('track_sys');
           $ship_charge=$this->input->post('ship_charge');
           $cost_area=$this->input->post('cost_area');
           $del_time_area=$this->input->post('del_time_area');
           $pick_up_office=$this->input->post('pick_up_office');
           $pick_frame=$this->input->post('pick_frame');
           $del_office=$this->input->post('del_office');
           $pick_printer=$this->input->post('pick_printer');
           $pick_office=$this->input->post('pick_office');
           $working_off=$this->input->post('working_off');
           $remarks=$this->input->post('remarks');
           $level=$this->input->post('level');
           $preferred=$this->input->post('preferred');
           $name_on_cheque=$this->input->post('name_on_cheque');
           $upload_contract=$this->input->post('upload_contract');
           $data['edit_id']= $edit_id;

            if($_FILES["upload_contract"]["name"]!="")
			  {
	           $contract_form=date('U').$_FILES["upload_contract"]["name"];
                move_uploaded_file($_FILES["upload_contract"]["tmp_name"],"uploaded_pdf/".$contract_form);
			  }

 $array=array('contact_person_name'=>$contact_person,'company_name'=>$com_name,'address'=>$address,'contact_number'=>$contact_lan,'email_id'=>$email_id,'mobile_number'=>$mob_no,'state'=>$state,'pin_code'=>$pin_code,'status'=>$status,'courier_code'=>$courier_code,'cost_as_per_weight'=>$cost_per_weight,'cash_on_delivery'=>$cash_del,'tracking_system'=>$track_sys,'shipping_charges'=>$ship_charge,'delivery_time_per_area_wise'=>$del_time_area,'pick_up_from_office'=>$pick_office,'pick_up_from_framer'=>$pick_frame,'delivery_to_office'=>$del_office,'pick_up_from_printer'=>$pick_printer,'pick_up_from_office_other'=>$pick_up_office,'working_on_off_days'=>$working_off,'remarks'=>$remarks,'satisfaction_level'=>$level,'preferred_surface'=>$preferred,'name_on_cheque'=>$name_on_cheque,'contract_form'=>$contract_form,);

              $update= $this->backend_model->update_courier_details($array,$edit_id);
             if($update==1){
                 $data['msg']='Courier Details update succesfully';
             }elseif($insert==0){
                 $data['msg']='accuring error';
             }
               $this->load->view('backend/dashboard_header');
		$this->load->view('backend/edit_new_courier',$data);
		$this->load->view('backend/footer');

        }




	public function add_courier()
	{

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_courier');
		$this->load->view('backend/footer');
	}

        public function edit_courier($edit_id="")
	{

              $data['edit_detail']=$this->backend_model->get_edit_courier_details($edit_id);
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/edit_new_courier',$data);
		$this->load->view('backend/footer');
	}

        public function add_framer()
	{

	  if($this->session->userdata('userid'))
	  {
	   		$data['msg']="";
	    $data['msgg']="";

	   if(isset($_POST['Add']))
	   {
	          $abc="";
			  if($_FILES["file1"]["size"]>20000000)
		      {
			   $data['msg']="Please upload File less than 2MB.";
			  }

	          if($_FILES["file1"]["name"]!="")
			  {
	           $abc=date('U').$_FILES["file1"]["name"];
                move_uploaded_file($_FILES["file1"]["tmp_name"],"uploaded_pdf/".$abc);
			  }
			   $services = array();
             foreach($_POST['services'] as $selectedOption)
             $services[] = $selectedOption;
            $data=array(
	                   'vender_company_name'=>$this->input->post('name'),
					   'vender_contact_person_name'=>$this->input->post('contactname'),
		               'vender_contact_no'=> $this->input->post('contact'),
					   'vender_mobile_no'=>$this->input->post('mobile'),
		               'vender_email_id'=>$this->input->post('email'),
		               'vender_address'=>$this->input->post('address'),
					   'vender_city'=>$this->input->post('city'),
					   'vender_state'=>$this->input->post('state'),
					   'vender_pin_code'=>$this->input->post('pin'),
					   'vender_region'=>$this->input->post('region'),
		               'vender_status'=>$this->input->post('vstatus'),
					   'vender_services_offered'=>implode(",",$services),
					   'vender_special_comments'=>$this->input->post('comment'),
						'vender_name_on_cheque'=>$this->input->post('cheque'),
						'vender_satisfaction_level'=>$this->input->post('level'),
						'vender_special_remarks'=>$this->input->post('remark'),
						'vender_preferred'=>$this->input->post('preferred'),
					   'vender_contract_filename'=>$abc,
					   'vender_created_date'=>date('Y-m-d H:i:s'),
					   'vender_last_modification_date'=>date('Y-m-d H:i:s'),
		               'vender_type'=>2,
		               'vender_time_taken'=>$this->input->post('timetaken'));


				   $vender_name=$this->input->post('name');
		     $invalid=$this->backend_model->check_vender_name($vender_name);
			 if(!$invalid)
			 {

                    $insert_id=$this->backend_model->add_vender_details($data);
					$vender_code="FMG_".$insert_id;
                    $this->backend_model->update_vender_code($vender_code,$insert_id);
					redirect('backend/add_mountvendor/'.$insert_id);
			 }
			 else
			 {
				 $data['msg']="";
				$data['msgg']="Vender Company Name Should Not Be Same";
			 }
	   }

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_framer',$data);
		$this->load->view('backend/footer');
	}
	else
	{
	    redirect('backend/index');
	}
	}



         public function add_framer_details(){

            $company_name=$this->input->post('name');
            $contact_person_name=$this->input->post('contactname');
            $contact_number=$this->input->post('contact');
            $email_id=$this->input->post('email');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $pin_code=$this->input->post('pin_code');
            $packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
            $packaging_time_per_print=$this->input->post('packaging_time');
            $packaging_material_used=$this->input->post('packaging_material');
            $product_branding_options=$this->input->post('packaging_branding');
            $delivery_to_framer=$this->input->post('delivery_to_framer');
            $delivery_to_office=$this->input->post('delivery_to_office');
            $pick_up_from_office=$this->input->post('pick_office');
            $working_on_off_days=$this->input->post('working_days');
            $status=$this->input->post('vender_status');
            $qty=$this->input->post('Quantity');
            $labor_charge=$this->input->post('labor_charge');

                  $framername= $this->input->post('framename');
               $some_code= $this->input->post('some_code');
                 $noofpices2=$this->input->post('noofpices2');
                $framer_code= $this->input->post('frame_code');
                //print_r($framer_code);
                $rate=$this->input->post('rate');
                //$rate=$this->input->post('rate');
                if($this->input->post('runningfit')<>'')
                {
                $per_feet=$this->input->post('runningfit');
                }else{
                  $per_feet=$this->input->post('unit');
                }
                $height=$this->input->post('height');
                $width=$this->input->post('width');
                $length=$this->input->post('length');
                $color=$this->input->post('color');
                $box=$this->input->post('box');
                $display_name=$this->input->post('display_name');
                $display_name_list=$this->input->post('display_name_list');
                $code_gen=$this->input->post('code_gen');
                $desc=$this->input->post('desc');

            //print_r($framername);
               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/printer/add_new_printer',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.'_package_'.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.'_package_'.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }


                }


        move_uploaded_file($_FILES["file_registration_form"]["tmp_name"],"registration_form/".$i.'_package_'.$_FILES["file_registration_form"]["name"]);


            if($_FILES['file_registration_form']['name'])
             {
                 $registration_form="registration_form/".$i.'_package_'.$_FILES["file_registration_form"]["name"];
             }
            else
            {
             $registration_form="";
             }


        $genCode=1;
         for($i=0;$i<=count($framername);$i++)
          {

        $f=date('U');
        move_uploaded_file($_FILES["file"]["tmp_name"][$i],"frame/".$f.'frame'.$_FILES["file"]["name"][$i]);
         $frame="frame/".$f.'frame'.$_FILES["file"]["name"][$i];


           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }

              if($display_name[$i]<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                $surface_gen_code  =$display_name_list[$i];
              }
               if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }
              //echo $cost[$i].'<br>';
              //echo $surface_gen_code.'<br>';
             if($framername[$i]!='')
             {
                 $spplit_code = substr($framer_code[$i],0,3);

                  if($spplit_code=='FRM')
                  {
                    $frame_name='frame_name';
                  }if($spplit_code=='MGB')
                  {
                     $frame_name='mgb_name';
                  }if($spplit_code=='MNT')
                  {
                    $frame_name='mount_name';
                  }if($spplit_code=='GLS')
                  {
                     $frame_name='glass_name';
                  }if($spplit_code=='HRD')
                  {
                     $frame_name='hardboard';
                  }if($spplit_code=='OTH')
                  {
                     $frame_name='other_name';
                  }
                  $this->backend_model->update_frame_code($frame_name);
       echo   $insert="insert into tbl_framer set frame_visual='".$frame."',labor_charge='".$labor_charge."', unit='".$per_feet[$i]."', area='".$area."', generate_code='".$framer_code[$i]."', qty='".$qty[$i]."',  framer_code='".$some_code[$i]."',framer_name='".$framername[$i]."', box='".$box[$i]."', sur_code='".$surface_gen_code."',  typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."',color='".$color[$i]."',length='".$length[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$rate[$i]."',  display_name='".$change_display_name."', sur_desc='".$desc[$i]."', surface_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."' ";
             $executeQuery=  mysql_query($insert);
             // end if condition
             }
             if($executeQuery)
             {
               $data['msg']='add new framer details successfully';
                  //redirect('backend/add_printer_confirm/'.$printer_id->vender_id."/".$vender_code);
             }else{
                 $data['msg']='accuring error';
             }

             $this->load->view('backend/dashboard_header');
         $this->load->view('backend/add_new_framer',$data);
	$this->load->view('backend/footer');

       $genCode++;   }// end loop



            }// end function





	public function add_framer_confirm($insert_id="",$tbl_frame_id="",$tbl_mount_id="")
	{
	    $data="";
		if($this->session->userdata('userid'))
	  {
	    $data['vender_details']=$this->backend_model->get_vender_details($insert_id);
	    $data['frame_details']=$this->backend_model->get_frame_details($tbl_frame_id);
	    $data['mount_details']=$this->backend_model->get_mount_details($tbl_mount_id);
	    $data['framenmount_details']=$this->backend_model->get_framenmount_details($insert_id);

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_framer_confirm',$data);
		$this->load->view('backend/footer');
	  }
	  else{redirect('backend/index');}
	}
        public function shortest_find_code()
        {
            $height=$_REQUEST['height'];
            $width=$_REQUEST['width'];
            $color=$_REQUEST['color'];
            $sur_code=$this->backend_model->short_package_code_details($height,$width,$color);
            if($sur_code<>'')
            {
                echo 1;
            }else{
                echo 0;
            }
        }
        public function get_package_code_color()
        {
            $height=$_REQUEST['height'];
            $width=$_REQUEST['width'];
            $color=$_REQUEST['color'];
            $all_data=$this->backend_model->All_package_code_details();
            //print_r($all_data);
             $sur_code=$this->backend_model->short_package_code_details($height,$width,$color);

            foreach($all_data as $values)
            {?>

<option <?php if($values->package_code==$sur_code){?> selected=""<?php }?> value="<?=$values->package_code?>"    ><?=$values->package_code?></option>
           <?php }
        }



        public function get_code_color()
        {
            $height=$_REQUEST['height'];
            $width=$_REQUEST['width'];
            $color=$_REQUEST['color'];
            $all_data=$this->backend_model->All_package_sub_code_details();
            //print_r($all_data);
            $rows= $this->backend_model->check_exist_package_sub_code_details($height,$width,$color);
            if($rows>0)
            {
           $sur_code= $this->backend_model->short_package_sub_code_details($height,$width,$color);
            foreach($all_data as $values)
            { //echo $values->sur_code;?>

<option <?php if($values->display_name==$sur_code){?> selected=""<?php }?> value="<?=$values->display_name?>"    ><?=$values->display_name?></option>
           <?php }

        }else{?>
<option value="">--Select--</option>
        <?php }
        }// end function





         public function get_framer_code()
        {
            $height=$_REQUEST['height'];
            $width=$_REQUEST['width'];
            $color=$_REQUEST['color'];
            $all_data=$this->backend_model->All_framer_sub_code_details();
            //print_r($all_data);
            $rows= $this->backend_model->check_exist_framer_sub_code_details($height,$width,$color);
            if($rows>0)
            {
           $sur_code= $this->backend_model->short_framer_sub_code_details($height,$width,$color);
            foreach($all_data as $values)
            { //echo $values->sur_code;?>

<option <?php if($values->display_name==$sur_code){?> selected=""<?php }?> value="<?=$values->display_name?>"    ><?=$values->display_name?></option>
           <?php }

        }else{?>
<option value="">--Select--</option>
        <?php }
        }// end function





	public function add_packaging()
	{
                $data['package_rows']= $this->backend_model->All_package_sub_code_details();
               // print_r($data);
                $data['package_code']= $this->backend_model->All_package_code_details();
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_packaging',$data);
		$this->load->view('backend/footer');
	}


        public function add_packaging_details(){


           $surface= $this->input->post('surface');
           $rate=$this->input->post('rate');
            $company_name=$this->input->post('name');
            $contact_person_name=$this->input->post('contactname');
            $contact_number=$this->input->post('contact');
            $email_id=$this->input->post('email');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $pin_code=$this->input->post('pin_code');
            $packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
            $packaging_time_per_print=$this->input->post('packaging_time');
            $packaging_material_used=$this->input->post('packaging_material');
            $product_branding_options=$this->input->post('packaging_branding');
            $delivery_to_framer=$this->input->post('delivery_to_framer');
            $delivery_to_office=$this->input->post('delivery_to_office');
            $pick_up_from_office=$this->input->post('pick_office');
            $working_on_off_days=$this->input->post('working_days');
            $status=$this->input->post('vender_status');
            $rate=$this->input->post('rate');
            $display_name=$this->input->post('display_name');
            $display_name_list=$this->input->post('display_name_list');
            $desc=$this->input->post('desc');
            $code=$this->input->post('code');
            $remark=$this->input->post('remark');
            $mobile=$this->input->post('mobile');
            $cheque=$this->input->post('cheque');
            $preferred=$this->input->post('preferred');
            $satisfication=$this->input->post('level');
            $unit=$this->input->post('unit');
             $cost=$this->input->post('cost');
             $qty=$this->input->post('qty');
             $depth=$this->input->post('depth');

               $noofpices=$this->input->post('noofpices');
                $gsm=$this->input->post('gsm');
                $height=$this->input->post('height');
                  $width=$this->input->post('width');
                  $typesofvender=$this->input->post('typesofvender');
                $package_code=$this->input->post('package_code');
                $color=$this->input->post('color');

                 $file_registration_form=$this->input->post('file_registration_form');


               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/printer/add_new_printer',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.'_package_'.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.'_package_'.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }

                }

        move_uploaded_file($_FILES["file_registration_form"]["tmp_name"],"registration_form/".$i.'_package_'.$_FILES["file_registration_form"]["name"]);


            if($_FILES['file_registration_form']['name'])
             {
                 $registration_form="registration_form/".$i.'_package_'.$_FILES["file_registration_form"]["name"];
             }
            else
            {
             $registration_form="";
             }


        $genCode=1;
         for($i=0;$i<=count($surface);$i++)
          {
            $rate = $cost[$i]/($height[$i]*$width[$i]*$qty[$i]);
            $area=$height[$i]*$width[$i]*$qty[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
           //print_r($display_name_list);die;


           //echo $display_name[$i];
              if($display_name[$i]<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                $surface_gen_code  =$display_name_list[$i];
              }
               if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }
              //echo $surface_gen_code.'<br>';
             if($surface[$i]<>'')
             {
       $insert="insert into tbl_packaging set qty='".$qty[$i]."', unit='".$unit[$i]."',lenght='".$depth[$i]."',area='".$area."', sur_code='".$surface_gen_code."', color='".$color[$i]."', package_code='".$package_code[$i]."', typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$rate."',  display_name='".$change_display_name."', sur_desc='".$desc[$i]."', surface_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."'";
             $executeQuery=  mysql_query($insert);
             }// end if condition

             IF($executeQuery)
             {
               $data['msg']='add new packaging details successfully';
                  //redirect('backend/add_printer_confirm/'.$printer_id->vender_id."/".$vender_code);
             }else{
                 $data['msg']='accuring error';
             }

             $this->load->view('backend/dashboard_header');
         $this->load->view('backend/add_new_packaging',$data);
	$this->load->view('backend/footer');

       $genCode++;   }// end loop



            }// end function



	public function frameMaster()
	{
	   if($this->session->userdata('userid'))
	  {
	    $data['msg']="";
		if(isset($_POST['Add']))
		{

		    $frameType=str_split($this->input->post('type'),3);
		    $colour=str_split($this->input->post('colour'),3);
		    $width=$this->input->post('width');
			$framecode='FRM_'.$frameType['0']."_".$colour['0']."_".$this->input->post('width');
			 $code=$this->backend_model->frame_code($framecode);
		    if($code==0){


		   $file2=date('U').$_FILES["file2"]["name"];
           move_uploaded_file($_FILES["file2"]["tmp_name"],"uploaded_pdf/".$file2);

		   $file3=date('U').$_FILES["file3"]["name"];
           move_uploaded_file($_FILES["file3"]["tmp_name"],"uploaded_pdf/".$file3);

		   $file4=date('U').$_FILES["file4"]["name"];
           move_uploaded_file($_FILES["file4"]["tmp_name"],"uploaded_pdf/".$file4);

		   $file5=date('U').$_FILES["file5"]["name"];
           move_uploaded_file($_FILES["file5"]["tmp_name"],"uploaded_pdf/".$file5);

		   $file6=date('U').$_FILES["file6"]["name"];
           move_uploaded_file($_FILES["file6"]["tmp_name"],"uploaded_pdf/".$file6);
		   $file7=date('U').$_FILES["file7"]["name"];
           move_uploaded_file($_FILES["file7"]["tmp_name"],"uploaded_pdf/".$file7);

		   $file8=date('U').$_FILES["file8"]["name"];
           move_uploaded_file($_FILES["file8"]["tmp_name"],"uploaded_pdf/".$file8);

		   $file9=date('U').$_FILES["file9"]["name"];
           move_uploaded_file($_FILES["file9"]["tmp_name"],"uploaded_pdf/".$file9);
		   $file10=date('U').$_FILES["file10"]["name"];
           move_uploaded_file($_FILES["file10"]["tmp_name"],"uploaded_pdf/".$file10);



		   $arraytbl_frame=array('frame_recommended'=>$this->input->post('recommended'),'frame_upload_image_name'=>$file2.",".$file3.",".$file4.",".$file5.",".$file6.",".$file7.",".$file8.",".$file9.",".$file10,'frame_code'=>$framecode,'frame_created_date'=>date('Y-m-d H:i:s'),'frame_type'=>$this->input->post('type'),'frame_width'=>$this->input->post('width'),'frame_colour'=>$this->input->post('colour'));
		   $this->backend_model->add_frame($arraytbl_frame);
		   redirect('backend/view_frames');
		   }else{
		   $data['msg']="This Frame Code is Already Registered Choose Another One !!";}
		}
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_frameMaster',$data);
		$this->load->view('backend/footer');
	  }
	  else{redirect('backend/index');}
	}
	public function mountMaster()
	{
	     $data['msg']="";
		 if($this->session->userdata('userid'))
	  {
	    if(isset($_POST['Add']))
		{
		   $mountType=str_split($this->input->post('type'),3);
		   $colour=str_split($this->input->post('colour'),3);
		   $thickness=$this->input->post('thickness');
		   $recommended=$this->input->post('recommended');
		   $mountcode='MNT_'.$mountType['0']."_".$colour['0']."_".$this->input->post('thickness');
		   $code=$this->backend_model->mount_code($mountcode);
		   if($code==0){
		   $file10=date('U').$_FILES["file10"]["name"];
           move_uploaded_file($_FILES["file10"]["tmp_name"],"uploaded_pdf/".$file10);
		   $file11=date('U').$_FILES["file11"]["name"];
           move_uploaded_file($_FILES["file11"]["tmp_name"],"uploaded_pdf/".$file11);
		   $data=array('mount_recommended'=>$recommended,'mount_type'=>$this->input->post('type'),'mount_colour'=>$this->input->post('colour'),'mount_thickness'=>$thickness,'mount_upload_image_name'=>$file10.",".$file11,'mount_created_date'=>date('Y-m-d H:i:s'),'mount_code'=>$mountcode);
		   $this->backend_model->add_mount($data);
		   redirect('backend/view_mount');
		   }
		   else
		   {
		   $data['msg']="This Mount Code is Already Registered Choose Another One !!";}
		}
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_new_mountMaster',$data);
		$this->load->view('backend/footer');
	  }else{redirect('backend/index');}
	}



        public function view_printer_details()
        {
            $vender_name=$_GET['vender_name'];
            $email_id=$_GET['email_id'];
             $vender_code=$_GET['vender_code'];

            // $vender_name=$this->input->post('vender_name');
             $data['printer_code']=$this->backend_model->Get_all_printer_code();
              $data['venders']=$this->backend_model->Get_add_printer_more_details($vender_name,$email_id,$vender_code);
              $data['company_name']=$this->backend_model->All_printer_company_name_details();
              $data['vender_code']=$this->backend_model->All_printer_sub_code_details();
              $data['email_id']=$this->backend_model->All_printer_email_id_details();

            //echo count($data);
            //print_r($);
                $this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_printer_details',$data);
		$this->load->view('backend/footer');
        }




        public function add_printer_details(){


           $surface= $this->input->post('surface');
            $company_name=$this->input->post('name');
            $contact_person_name=$this->input->post('contactname');
            $contact_number=$this->input->post('contact');
            $email_id=$this->input->post('email');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $pin_code=$this->input->post('pin_code');
            $packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
            $packaging_time_per_print=$this->input->post('packaging_time');
            $packaging_material_used=$this->input->post('packaging_material');
            $product_branding_options=$this->input->post('packaging_branding');
            $delivery_to_framer=$this->input->post('delivery_to_framer');
            $delivery_to_office=$this->input->post('delivery_to_office');
            $pick_up_from_office=$this->input->post('pick_office');
            $working_on_off_days=$this->input->post('working_days');
            $status=$this->input->post('vender_status');

            $display_name=$this->input->post('display_name');
            $display_name_list=$this->input->post('display_name_list');
            $desc=$this->input->post('desc');
            $code=$this->input->post('code');
            $remark=$this->input->post('remark');
            $mobile=$this->input->post('mobile');
            $contact_number=$this->input->post('contact_number');
            $cheque=$this->input->post('cheque');
            $preferred=$this->input->post('preferred');
            $satisfication=$this->input->post('level');
            $per_feet=$this->input->post('per_feet');
             $cost=$this->input->post('cost');
               $noofpices=$this->input->post('noofpices');
                $gsm=$this->input->post('gsm');
                 $height=$this->input->post('height');
                  $width=$this->input->post('width');
                  $typesofvender=$this->input->post('typesofvender');
                  $printer_code=$this->input->post('printer_code');
                  $labor_charge=$this->input->post('labor_charge');
                  $unit=$this->input->post('unit');
                  $qty=$this->input->post('qty');
                 $product_code=$this->input->post('product_code');

                 $file_registration_form=$this->input->post('file_registration_form');


               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/printer/add_new_printer',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }

                }

        move_uploaded_file($_FILES["file_registration_form"]["tmp_name"],"registration_form/".$i.$_FILES["file_registration_form"]["name"]);


            if($_FILES['file_registration_form']['name'])
             {
                 $registration_form="registration_form/".$i.$_FILES["file_registration_form"]["name"];
             }
            else
            {
             $registration_form="";
             }


        $genCode=1;
         for($i=0;$i<=count($surface);$i++)
          {
            //$rate = $cost[$i]/($height[$i]*$width[$i]*$qty[$i]);
            $area=$height[$i]*$width[$i]*$qty[$i];
             $amount=  $rate*$qty[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
           //print_r($display_name_list);die;


           //echo $display_name[$i];
              if($display_name[$i]<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                $surface_gen_code  =$display_name_list[$i];
              }
               if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }

              //echo $surface_gen_code.'<br>';
             if($surface[$i]<>'')
             {
       $insert="insert into tbl_printer set product_code='".$product_code[$i]."',labor_charge='".$labor_charge."', area='".$area."',qty='".$qty[$i]."', unit='".$unit[$i]."', printer_code='".$printer_code[$i]."', typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$cost[$i]."', per_feet='".$per_feet[$i]."', display_name='".$change_display_name."', sur_desc='".$desc[$i]."', sur_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."'";
             $executeQuery=  mysql_query($insert);
             }// end if condition

             IF($executeQuery)
             {
               $data['msg']='Printer details added successfully';
                  //redirect('backend/add_printer_confirm/'.$printer_id->vender_id."/".$vender_code);
             }else{
                 $data['msg']='accuring error';
             }

             $this->load->view('backend/dashboard_header');
         $this->load->view('backend/printer/add_new_printer',$data);
	$this->load->view('backend/footer');

       $genCode++;   }// end loop



            }// end function


		public function add_printer()
	{
               $data['printer_rows']= $this->backend_model->All_printer_sub_code_details();

                  //die('asasas');
		$datam['msg']="";
		 if($this->session->userdata('userid'))
		{

		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==true)
		{	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/printer/add_new_printer',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }
			 $services = array();
             foreach($_POST['service'] as $selectedOption)
             $services[] = $selectedOption;
			 $service=implode(",",$services);

			$data=array('vender_company_name'=>$this->input->post('name'),
			            'vender_contact_person_name'=>$this->input->post('contactname'),
						'vender_contact_no'=>$this->input->post('contact'),
						'vender_email_id'=>$this->input->post('email'),
						'vender_address'=>$this->input->post('address'),
						'vender_city'=>$this->input->post('city'),
						'vender_state'=>$this->input->post('state'),
						'vender_pin_code'=>$this->input->post('pin_code'),
						'packaging_cost_per_size_of_print'=>$this->input->post('packaging_cost'),
                                          'packaging_time_per_print'=>$this->input->post('packaging_time'),
                                          'packaging_material_used'=>$this->input->post('packaging_material'),
                                          'product_branding_options'=>$this->input->post('packaging_branding'),
                                          'delivery_to_framer'=>$this->input->post('delivery_to_framer'),
                                          'delivery_to_office'=>$this->input->post('delivery_to_office'),
                                          'pick_up_from_office'=>$this->input->post('pick_office'),
                                          'working_on_off_days'=>$this->input->post('working_days'),
						'vender_mobile_no'=>$this->input->post('mobile'),
						'vender_status'=>$this->input->post('vender_status'),
						'vender_services_offered'=>$service,
						'vender_time_taken'=>$this->input->post('total_time'),
						'vender_special_comments'=>$this->input->post('comment'),
						'vender_name_on_cheque'=>$this->input->post('cheque'),
						'vender_satisfaction_level'=>$this->input->post('level'),
						'vender_special_remarks'=>$this->input->post('remark'),
						'vender_preferred'=>$this->input->post('preferred'),
						'vender_contract_filename'=>$pdf,
						'vender_created_date'=>date('y-m-d h:i:s'),
						'vender_last_modification_date'=>date('y-m-d h:i:s'),
						'vender_type'=>'1');

			$vender_name=$this->input->post('name');
		     $invalid=$this->backend_model->check_vender_name($vender_name);
			 if(!$invalid)
			 {
		$insert_id=$this->backend_model->add_vender_details($data);
		$vender_code="PTR_".$insert_id;
		$this->backend_model->update_vender_code($vender_code,$insert_id);


		//print_r($data1);

		$printer_id=$this->backend_model->get_max_id();

	      // redirect('backend/add_printer_confirm/'.$printer_id->vender_id."/".$vender_code);
              header("location:add_printer_confirm");
			 }
			 else
			 {
				$datam['msg']="Vender Name Should Not Be Same";

			 }
		}
		}



            $this->load->view('backend/dashboard_header');
         $this->load->view('backend/printer/add_new_printer',$data);
	$this->load->view('backend/footer');


		}
		else
		{
			 redirect('backend/index');
		}

	}







	public function add_printer_confirm($id="",$vender_code="")
	{

           // die('printer confirmation');
		 if($this->session->userdata('userid'))
		{
		  $data['msg']="";
 		$this->form_validation->set_rules('printing_surface','Name','required');
		if($this->form_validation->run()==true)
		{

		  if(!$id && !$vender_code)
		  {
			  $printer=explode("/",$this->input->post('printer'));
			$id=$printer['0'];
			$vender_code=$printer['1'];
		  }
			//print $id;
			$surface_id=$this->input->post('printing_surface');
		$surface=$this->backend_model->get_surface_by_id($surface_id);
		$data1=array('vender_id'=>$id,'vender_code'=>$vender_code,'surface_item_code'=> $surface->surface_item_code,'surface_type'=> $surface->surface_type,'surface_cost_per_inch'=>$this->input->post('cost_per_sqinch'),'surface_stock_status'=>$this->input->post('stock'),'surface_sale_price'=>$this->input->post('saling_price'),'surface_status'=>$this->input->post('status'),'surface_created_date'=>$surface->surface_created_date);

		//print_r($data1);
		$this->backend_model->add_surface_details($data1);
		 $data['msg']="You Have Successfully Added Surface Details";
		}
		 $data['printer_id']=$id;
		 $data['printer_code']=$vender_code;

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/printer/add_new_printer_confirm',$data);
		$this->load->view('backend/footer');
		}
		else
		{
			 redirect('backend/index');
		}
	}


	public function add_master_surface()
	{
	   $data['msg']="";
     if($this->session->userdata('userid'))
	  {
	   if(isset($_POST['gsm']))
	   {
           $surface_type=str_split($this->input->post('surface_type'),3);
           $gsm=$this->input->post('gsm');
	       $surface_code="SUR_".$surface_type['0']."_".$gsm;
		   $code=$this->backend_model->surface_code($surface_code);
	      if($code==0)
	       {
	       $data=array('surface_type'=>$this->input->post('surface_type'),'surface_gsm'=>
		   $this->input->post('gsm'),'surface_recommended'=>$this->input->post('recommended'),'surface_created_date'=>date('y-m-d h:i:s'));
		   $surface_id=$this->backend_model->insert_master_surface($data);
		   $this->backend_model->update_master_surface($surface_id,$surface_code);
		   redirect('backend/view_surfaces');
		   }
		   else
		   {
		      $data['msg']="This Surface Code is Already Selected Choose Another One !!!";
		   }


	   }
	   $this->load->view('backend/dashboard_header');
		$this->load->view('backend/surface_master',$data);
		$this->load->view('backend/footer');
	}else{redirect('backend/index');}
}
	public function get_master_surface()
	{
		$surface_id=$this->input->post('surface_id');
		$data=$this->backend_model->get_surface_by_id($surface_id);

		print($data->surface_created_date." /");
		print($data->surface_gsm);

	}
	public function get_mount()
	{
		$mount_id=$this->input->post('mount_id');
		$data=$this->backend_model->get_mount_by_id($mount_id);
		print($data->mount_colour." /");
		print($data->mount_thickness);

	}

	public function add_photographer()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_photographer');
		$this->load->view('backend/footer');
	}
	public function assign_roles()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/assign_roles');
		$this->load->view('backend/footer');
	}

	public function captioning_dashboard()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/captioning_dashboard');
		$this->load->view('backend/footer');
	}

	public function change_images()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/change_images');
		$this->load->view('backend/footer');
	}

	public function change_to_invoice()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/change_to_invoice');
		$this->load->view('backend/footer');
	}
	public function channel_partner()
	{

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/channel_partners');
		$this->load->view('backend/footer');
	}


	public function client_service_dashboard()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/client_service_dashboard');
		$this->load->view('backend/footer');
	}
	public function view_courier($delete_id="none",$code='none',$company_name='none',$date_from_to='none')
	{

            if($delete_id!='none')
            {
                 $delete=$this->backend_model->delete_courier_details($delete_id);
                 if($delete==1)
                 {
                     $data['msg']="Courier Detail deleted";
                 }elseif($delete==0)
                 {
                     $data['msg']="accuring error";
                 }
            }


            if($code!='none')
            {
                 $data['courier_detail']=$this->backend_model->search_by_couriers($code,'none');
            }if($company_name!='none')
            {
                 $data['courier_detail']=$this->backend_model->search_by_couriers('none',$company_name);
            }if($date_from_to!='none')
            {
                 $data['courier_detail']=$this->backend_model->search_by_couriers('none',$company_name='none',$date_from_to);
            }
            if($code=='none' && $company_name=='none' && $date_from_to=='none'){
                 $data['courier_detail']=$this->backend_model->get_courier_details();
            }


            $data['code']=$this->backend_model->get_by_courier_code();
            $data['company_name']=$this->backend_model->get_by_courier_company_name();


		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_courier',$data);
		$this->load->view('backend/footer');
	}

	public function view_channel_partners()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_channel_partners');
		$this->load->view('backend/footer');
	}
	public function view_account()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_account');
		$this->load->view('backend/footer');
	}

	public function upload_po()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/upload_po');
		$this->load->view('backend/footer');
	}
	public function upload_photographers_images()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/upload_photographers_images');
		$this->load->view('backend/footer');
	}
	public function uploaded_images()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/uploaded_images');
		$this->load->view('backend/footer');
	}
	public function send_mails_customers()
	{
                if($this->session->userdata('userid'))
	  {
		 $data['msg']="";
	     $this->form_validation->set_rules('emails','Email','required');
		 $this->form_validation->set_rules('msg-mail','MSG','required');
            if($this->form_validation->run()==true)
            {
	   if($this->input->post('emails'))
	   {
	     $mails= explode(',',$this->input->post('emails'));
		for($i=0;$i<count($mails);$i++)
		{
		$this->email->from('admin@wallsnart.com', 'Wallsnart');
        $this->email->to($mails[$i]);
		$this->email->subject($this->input->post('sbj'));
        $this->email->message($this->input->post('msg-mail'));
        $this->email->send();
		$data['msg']="Mail Has been Sent Successfully";
		}
	   }
			}

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mails_customers',$data);
		$this->load->view('backend/footer');
	}
else
{
redirect('backend/index');
}
}

	public function customer_emails()
	{
		$customer_id=$this->input->post('customer_id');
		$data=$this->backend_model->get_customer_by_id($customer_id);
		foreach($data as $mails)
	   {
		  print $mails['email_id'].',';

	   }
	}

	public function send_mail_quotation()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_quotation');
		$this->load->view('backend/footer');
	}

public function send_mail_printer()
	{
		 $data['msg']="";
	     $this->form_validation->set_rules('emails','Email','required');
		 $this->form_validation->set_rules('msg-mail','MSG','required');
            if($this->form_validation->run()==true)
            {
	 		$this->email->from('admin@wallsnart.com', 'Wallsnart');
        $this->email->to($this->input->post('emails'));
		$this->email->subject($this->input->post('sbj'));
        $this->email->message($this->input->post('msg-mail'));
        $this->email->send();
		$data['msg']="Mail Has been Sent Successfully";

	  			}

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_printer',$data);
		$this->load->view('backend/footer');
	}

	public function get_printer_mails()
	{

	    $printer_id=$this->input->post('vender_id');

		$data=$this->backend_model->get_vender_details($printer_id);

	   print $data->vender_email_id;

	}

	public function send_mail_photographer()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_photographer');
		$this->load->view('backend/footer');
	}
	public function send_mail_packager()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_packager');
		$this->load->view('backend/footer');
	}

	 public function send_mail_framer()
	{
	   $data['msg']="";
	     $this->form_validation->set_rules('emails','Email','required');
		 $this->form_validation->set_rules('msg-mail','MSG','required');
            if($this->form_validation->run()==true)
            {
	 		$this->email->from('admin@wallsnart.com', 'Wallsnart');
        $this->email->to($this->input->post('emails'));
		$this->email->subject($this->input->post('sbj'));
        $this->email->message($this->input->post('msg-mail'));
        $this->email->send();
		$data['msg']="Mail Has been Sent Successfully";

	  			}
	  		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_framer',$data);
		$this->load->view('backend/footer');
	}

	public function get_framer_mails()
	{

	    $framer_id=$this->input->post('vender_id');

		$data=$this->backend_model->get_vender_details($framer_id);

	   print $data->vender_email_id;
	}


	public function send_mail_courier()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/send_mail_courier');
		$this->load->view('backend/footer');
	}

	public function sales_person_sales_detail()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/sales_person_sales_detail');
		$this->load->view('backend/footer');
	}
	public function dashboard()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/dashboard');
		$this->load->view('backend/footer');
	}
	public function sales_detail()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/sales_detail');
		$this->load->view('backend/footer');
	}
	public function customer()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/customer');
		$this->load->view('backend/footer');
	}

	public function photographer()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/photographer');
		$this->load->view('backend/footer');
	}
	public function manage_keywords()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/manage_keywords');
		$this->load->view('backend/footer');
	}

	public function multi_view_images()
	{
		$partner=$this->input->get('partner');
		$status=$this->input->get('status');
		$per_page=$this->input->get('page');
		$file=$this->input->get('file');
		$start=$this->input->get('start');
		$end=$this->input->get('end');
		if($this->input->get('per_page'))
		{
			$page=$this->input->get('per_page');
		}
		else
		{
			 $page='0';
		}
		if(!$per_page)
		{
			$per_page=10;
		}

	  //print $per_page;

	   if($status || $status=='0')
	  {
		$data['channel_partner']= $this->channel_partner_model->get_partner_bystatus($status);
 if($partner || $start || $file || $end)
		 {
 $config['base_url'] = base_url().'index.php/backend/multi_view_images?status='.$status.'&page='.$per_page.'&partner=' .$partner. '&file=' .$file.'&start='.$start.'&end='.$end ;
}
else
{
  $config['base_url'] = base_url().'index.php/backend/multi_view_images?status='.$status.'&page='.$per_page;

}
		$config['total_rows'] =$this->backend_model->count_rows($status,$partner,$file,$start,$end);
		$config['per_page'] = $per_page;
		$config['page_query_string'] = TRUE;
	//$config['display_pages'] = FALSE;
	/* if($per_page)
	 {
		 $config["uri_segment"] = 5;
	    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
	 }
	 else
	 {
		 $config["uri_segment"] = 4;
	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	 } */
		$this->pagination->initialize($config);

	$data['total_rows']=$config['total_rows'];
  $data['images']=$this->backend_model->get_image_bystatus($status,$config['per_page'],$page,$partner ,$file,$start,$end);
$data['links']=$this->pagination->create_links();
//print_r($data);
	}
	else
	{
		$data['images']="";
		$data['links']="";
		$data['channel_partner']="";
              $data['total_rows']="";
	}
//print_r($data['images'
//print $status;
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/multi_view_images',$data);
		$this->load->view('backend/footer');
	}


	public function manage_orders()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/manage_orders');
		$this->load->view('backend/footer');
	}

        public function view_invoices($company_name="none",$contact_person="none",$sales_person="none",$region="none",$quotation_id="none",$status="none",$search_date="none") {

    $data['company_name']=$this->backend_model->get_invoice_company_name();
     $data['totals']=$this->backend_model->get_total_invoice();

     $data['invoice_id']=$this->backend_model->get_invoice_order_id();

      $data['conact_person']=$this->backend_model->get_invoice_contact_person();

       $data['sales_person']=$this->backend_model->get_invoice_sales_person();
     $data['invoice_dist']=$this->backend_model->get_invoices_distinct();
     $data['invoice_distinct']=$this->backend_model->get_invoices_distinct();
      $data['invoice_count']=$this->backend_model->view_invoices();

   //print_r($data);
    $data['search_data']=$this->backend_model->search_invoice($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date);
//die('test');

        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/quotation/view_invoice',$data);
        $this->load->view('backend/footer');


        }


        public function job_sheet($order_id="none",$type="none")
        {
           $data['order_details']=$this->backend_model->get_order_details($order_id);
           $data['view_job_sheet']=$this->backend_model->view_job_sheet($order_id,$type);

      if($type=='printer')
      {
       $this->load->view('backend/printer_job_sheet',$data);
       }elseif($type=='framer')
      {
       $this->load->view('backend/framer_job_sheet',$data);
      }elseif($type=='packager')
      {
        $this->load->view('backend/packager_job_sheet',$data);
      }elseif($type=='courier')
      {
        $this->load->view('backend/courier_job_sheet',$data);

     }

        }

        public function view_orders_details($order_id="none")
         {
          $data['order_details']=$this->backend_model->get_order_details($order_id);

          $this->load->view('backend/view_order_details',$data);


         }


         public function delete_quotation_data($id)

    {
//echo $id;
       $delete=   $this->backend_model->delete_quotation($id);

       $this->backend_model->delete_quotation_detail($id);
        if($delete==1)
        {
            $data['msg']='Quotation deleted';
        }else if($delete==0){
            $data['msg']='accuring error';
        }
              $this->load->view('backend/dashboard_header');

            $this->load->view('backend/manage_quotation',$data);
           $this->load->view('backend/footer');


    }


     public function save_edit_quotation()

    {



        $this->load->view('backend/dashboard_header');
        $this->load->view('quotation/edit_quotation_details',$data);
        $this->load->view('backend/footer');

    }

     public function delete_invoice_data($invoice_id)
    {
         $delete=$this->backend_model->delete_invoice($invoice_id);
          if($delete)
          {
              $data['msg']='Invoice deleted';
          }else{
              $data['msg']='accuring error';
          }
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/quotation/view_invoice',$data);
        $this->load->view('backend/footer');
    }


    public function edit_quotation_detail($id="none")

    {
        $details['print']=$this->backend_model->edit_quotation_image($id);

        $this->load->view('backend/dashboard_header');

        $this->load->view('backend/edit_quotation_detail',$details);

        $this->load->view('backend/footer');



    }



    public function edit_quotation_save()

    {


        $edit_id=$this->input->post('edit_id');
         $addcpn=$this->input->post('addcpn');
         $customer_id=$this->input->post('selected_customer_id');
        $date=date('Y-m-d h:t');
        $quotation_id=$this->input->post('quotation_id');
        $image_id=$this->input->post('imgid');
        $licence_cost=$this->input->post('license_cost');

        $surface=$this->input->post('surface');
        $print_size_height=$this->input->post('print_height');
        $print_size_width=$this->input->post('print_width');
        $print_cost=$this->input->post('print_cost');

        $frame_code=$this->input->post('frame_code');
        $frame_size_width=$this->input->post('frame_width');
        $frame_cost=$this->input->post('frame_cost');
        $frame_cost=$this->input->post('frame_cost');
        $frame_total=$this->input->post('frame_total');
        $mount_code=$this->input->post('mount_code');
        $mount_size_width=$this->input->post('mount_width');
        $mount_cost=$this->input->post('mount_cost');
        $glass_cover=$this->input->post('cover');
        $glass_cost=$this->input->post('glass_cost');
        $status=1;


        $packaging_charge=30;
          $courier_charge=$this->input->post('courier_charge');
           $createdby=$this->input->post('createdby');
           $discount=$this->input->post('discount');

             $tax=$this->input->post('tax');
              $s_name=$this->input->post('s_name');
               $s_email=$this->input->post('s_email');
                $s_contact=$this->input->post('s_contact');

                $c_name=$this->input->post('c_name');
               $c_email=$this->input->post('c_email');
                $c_contact=$this->input->post('c_contact');
        $total=$this->input->post('Q_total');


       if($addcpn=='Edit_Quotation'){
        if($image_id<>'')
        {
   for($i=0;$i<count($image_id);$i++)
        {
         $after_discount_val=$total[$i]*$discount/100;
        $after_discount=$total[$i]-$after_discount_val;
        $OrgPrintCost=($licence_cost[$i]+$print_size_height[$i]*$print_size_width[$i])*2;
        $OrgMountHeight=$print_size_height[$i]+($mount_size_width[$i]*2);
        $OrgMountWidth= $print_size_width[$i]+($mount_size_width[$i]*2);
        $OrgMountSize=$OrgMountHeight*$OrgMountWidth;
        $OrgMountCost=$OrgMountSize*2;
        $OrgFrametRuningArea = ($OrgMountHeight + $frame_size_width[$i]*2) * ($OrgMountWidth+$frame_size_width[$i]*2);
        $OrgFramCost=($OrgFrametRuningArea)/(12)*2;
        $totalCost=$OrgPrintCost+$OrgFramCost+$OrgMountCost;

          $insert=" update tbl_quotation set createdby='".$createdby."',after_discount='".$after_discount."', discount='".$discount."', tax='".$tax."', packing_charge='".$packaging_charge."', courier_charge='".$courier_charge."', sales_person='".$s_name."', sales_emailid='".$s_email."', sales_contact='".$s_contact."', client_servicing='".$c_name."', client_emailid='".$c_email."', client_contact='".$c_contact."', image_id='".$image_id[$i]."', licence_cost='".$licence_cost[$i]."', surface='".$surface[$i]."', print_size_height='".$print_size_height[$i]."', print_size_width='".$print_size_width[$i]."', print_cost='".$print_cost[$i]."', frame_code='".$frame_code[$i]."',  frame_size_width='".$frame_size_width[$i]."', frame_cost='".$frame_cost[$i]."',   mount_code='".$mount_code[$i]."',  mount_size_width='".$mount_size_width[$i]."', mount_cost='".$mount_cost[$i]."', glass_id='".$cover[$i]."', glass_cost='".$glass_cost[$i]."', total='".$totalCost."' where id ='".$edit_id[$i]."'";
    $QueryExecute= mysql_query($insert);
        if($QueryExecute)
            {
            $data['msg']='Quotation updated successfully';

            }else{
                $data['msg']='accuring error';
            }

        }
        }

       unset($image_id);
       }
        $data['quotation']=$quotation_id;

         $this->load->view('backend/dashboard_header');
        $this->load->view('backend/edit_quotation_detail',$data);
        $this->load->view('backend/footer');

    }


        public function view_quotations($company_name="none",$contact_person="none",$sales_person="none",$region="none",$quotation_id="none",$status="none",$search_date="none")
	{

            $data['company_name']=$this->backend_model->get_quotation_company_name();
            $data['totals']=$this->backend_model->get_total_quotation();
             $data['quotation_id']=$this->backend_model->get_quotation_order_id();
              $data['conact_person']=$this->backend_model->get_quotation_contact_person();
                $data['sales_person']=$this->backend_model->get_quotation_sales_person();
             $data['quotation_distinct']=$this->backend_model->get_quotation_distinct();
            $data['quotation_count']=$this->backend_model->record_count_quotation();

             $data['search_data']=$this->backend_model->search_quotation($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date);

            	$this->load->view('backend/dashboard_header');
		$this->load->view('backend/manage_quotation',$data);
		$this->load->view('backend/footer');
	}



         public function online_order($company_name="none",$contact_person="none",$sales_person="none",$region="none",$quotation_id="none",$status="none",$search_date="none")
	{

            $data['company_name']=$this->backend_model->get_order_company_name();
            $data['totals']=$this->backend_model->get_total_order();
             $data['order_id']=$this->backend_model->get_order_order_id();
              $data['conact_person']=$this->backend_model->get_order_contact_person();
                $data['sales_person']=$this->backend_model->get_order_sales_person();
             $data['order_distinct']=$this->backend_model->get_order_distinct();
            $data['order_count']=$this->backend_model->record_count_order();

             $data['search_data']=$this->backend_model->search_order($company_name,$contact_person,$sales_person,$region,$quotation_id,$status,$search_date);

            	$this->load->view('backend/dashboard_header');
		$this->load->view('backend/manage_onlineorders',$data);
		$this->load->view('backend/footer');
	}


      public function show_images_viusal()
{

    $image_id= $this->input->post('image_id');
   echo $images_url = "http://www.indiapicture.in/wallsnart/398/".$image_id."";
}


public function edit_show_images_viusal()
{

   echo $image_id= $this->input->post('image_id');
   $images_url = "http://www.indiapicture.in/wallsnart/398/".$image_id."";
}




	public function create_quotation()
	{
             $data['mount_code']=$mount_code;
             $data['get_mount']=$this->backend_model->get_mount_images($mount_code);
             $data['frame_code']=$frame_code;
             $data['get_frame']=$this->backend_model->get_frame_images($frame_code);

		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/quotation/create_quotation_new',$data);
		$this->load->view('backend/footer');
	}


	public function manage_vendors()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/manage_vendors');
		$this->load->view('backend/footer');
	}

	public function cp_dashboard()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_dashboard');
		$this->load->view('backend/footer');
	}

public function cp_active_images()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_active_images');
		$this->load->view('backend/footer');
	}


public function cp_edit_profile()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_edit_profile');
		$this->load->view('backend/footer');
	}



	public function photographer_dashboard()
	{
		$this->load->view('backend/photographer_dashboard_header');
		$this->load->view('backend/photographer_dashboard');
		$this->load->view('backend/footer');
	}
	public function cp_image_status()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_image_status');
		$this->load->view('backend/footer');
	}




	public function cp_inactive_images()
	{
		$this->load->view('backend/cp_dashboard_header');
		$this->load->view('backend/cp_inactive_images');
		$this->load->view('backend/footer');
	}



	public function customer_order_details()
	{
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/customer_order_details');
		$this->load->view('backend/footer');
	}
	public function add_mountvendor($id="")
	{
	    $data['id']=$id;
		if($this->session->userdata('userid'))
	  {
	    $data['mounts']=$this->backend_model->get_mount_name();
		$data['vender']=$this->backend_model->get_vender1();
	    $data['msg']="";

		if(isset($_POST['Add']))
		{
		  $mountId=$this->input->post('mountType');
		  $vendor=$this->input->post('vendor');
		  $vendor1=$this->backend_model->get_vendor1($vendor);

		  $mount=$this->backend_model->get_mount1($mountId);

		  $mount->mount_id;
		  $code=$mount->mount_code;
		  $files=$mount->mount_upload_image_name;
		  $frameCode=$mount->mount_code;
		  $insert_id=$vendor1->vender_id;
                $vender_code=$vendor1->vender_code;

             $array1=array('vender_id'=>$insert_id,'vender_code'=>$vender_code,'framenmount_code'=>$frameCode,'framenmount_type'=>$code,'framenmount_thickness'=>$this->input->post('thickness'),'framenmount_created_date'=>date('Y-m-d H:i:s'),'framenmount_colour'=>$this->input->post('mcolor'),'framenmount_upload_image_name'=>$files,'framenmount_cost_in_feet'=>$this->input->post('costpersq'),'framenmount_availability_status'=>$this->input->post('savalstatus'),'framenmount_status'=>$this->input->post('status'),'framenmount_sale_price'=>$this->input->post('msprice'),'framenmount_recommended'=>$this->input->post('recommended'));
	     $this->backend_model->add_framenmount($array1);
		 $data['msg']="Your Details Saved Successfully";
		 redirect('backend/show_framer/'.$insert_id);
		}
	    $this->load->view('backend/dashboard_header');
		$this->load->view('backend/add_mountVendor',$data);
		$this->load->view('backend/footer');
	}else{redirect('backend/index');}
}
	public function get_frame_values()
	{
		$frame_id=$this->input->post('frame_id');
		$data=$this->backend_model->get_frame_by_id($frame_id);
		print($data->frame_width." /");
		print($data->frame_colour);

	}

	public function show_framer($insert_id="")
	{   $data['msg']="";
         $data['insert_id']=$insert_id;
		if($this->session->userdata('userid'))
		{

			$this->form_validation->set_rules('printing_frame','printing_frame','required');
			if($this->form_validation->run()==true)
			{

				if(!$insert_id)
				{
					$insert_id =  $this->input->post('vendor_company_name');
				}

			$frame_id =  $this->input->post('printing_frame');
			$fcode =  $this->backend_model->get_frame_by_id($frame_id);
		    	$frameCode = $fcode->frame_code;
                  	$files = $fcode->frame_upload_image_name;
		 $array1=array('vender_id'=>$insert_id,'vender_code'=>'FMG_'.$insert_id,
		'framenmount_code'=>$frameCode,'framenmount_type'=>$this->input->post('frameType'),'framenmount_width'=>$this->input->post('width'),'framenmount_created_date'=>date('Y-m-d H:i:s'),'framenmount_colour'=>$this->input->post('color'),'framenmount_cost_in_feet'=>$this->input->post('costperfeet'),'framenmount_upload_image_name'=>$files,'framenmount_availability_status'=>$this->input->post('avalstatus'),'framenmount_status'=>$this->input->post('mstatus'),'framenmount_sale_price'=>$this->input->post('sPrice'));
		 //print_r ($array1);
		 $this->backend_model->add_framenmount($array1);
		 $data['msg']="Succesfully Added.";

			}

		$data['id'] = $insert_id;
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/framer_confirm',$data);
		$this->load->view('backend/footer');
		}
		else
		{
			redirect('backend/index');
		}
	}


	public function view_vender()
	{
	   if($this->session->userdata('userid'))
	  {
		  if($this->input->post('search'))
		  {
			 $vender_name=$this->input->post('vender_name');
			   $vender_code=$this->input->post('vender_code');
			   $vender_type=$this->input->post('vender_type');
			   $region=$this->input->post('region');
				$status1=$this->input->post('vender_status');
				if($status1=='active')
				{
					$status= 1;
				}
				else if($status1=='Inactive')
				{
					$status= 0;
				}
				else
				{
					$status = $status1;
				}
				 $email=$this->input->post('vender_email');
				  $contact_person=$this->input->post('contact_name');
				   $date=$this->input->post('date');
				  $data['vendor']=$this->backend_model->search_vender($vender_name,$vender_code,$vender_type,$status,$email,$contact_person,$date,$region);
                              $data['links']="";
				  $data['total_records']=count($data['vendor']);
				   		  }
		  else
		  {
     	$config['base_url'] = base_url().'index.php/backend/view_vender';
		$config['total_rows'] = $this->backend_model->record_count_vender();
		$config['per_page'] = 4;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['vendor']=$this->backend_model->get_vender_pagination($config['per_page'],$page);
		$data['links']= $this->pagination->create_links();
		$data['total_records']=$this->backend_model->record_count_vender();
		  }
		$this->load->view('backend/dashboard_header');
		$this->load->view('backend/view_vender',$data);
		$this->load->view('backend/footer');
	 }
        else{redirect('backend/index');}
	}

public function delete_vendor_data($id)
{
	$this->backend_model->delete_vendor($id);
	$this->backend_model->delete_surface_detail($id);
	redirect('backend/view_vender');
}


public function edit_printer($edit_id=""){
            $data['edit_id']=$edit_id;
            $data['printer_rows']= $this->backend_model->All_printer_sub_code_details();
            $data['edit_details']=$this->backend_model->Get_to_Update_All_printer_details($edit_id);
            //print_r($data);


	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/printer/edit_printer',$data);
	    $this->load->view('backend/footer');


}




public function edit_package($edit_id=""){
    //echo $edit_id;
        $data['package_rows']= $this->backend_model->All_package_sub_code_details();
        $data['edit_details']=$this->backend_model->Get_to_Update_All_package_details($edit_id);
        $data['package_code']=$package_code;
	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/edit_package',$data);
	    $this->load->view('backend/footer');


}



public function edit_framer($framer_code="",$edit_id){

            $data['package_rows']= $this->backend_model->All_framer_sub_code_details();
             $data['edit_details']=$this->backend_model->Get_to_All_framer_details($edit_id);
           // print_r($data);
            $data['package_code']=$package_code;
	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/edit_framer',$data);
	    $this->load->view('backend/footer');


}



public function edit_package_details(){

          $edit_id= $this->input->post('edit_id');
          $data['edit_id']=$edit_id;
  //print_r($edit_id);
    //$edit_id[0];
           $surface= $this->input->post('surface');
           $rate=$this->input->post('rate');
            $company=$this->input->post('name');
            $contact_person_name=$this->input->post('contactname');
            $contact_number=$this->input->post('contact');
            $email_id=$this->input->post('email');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $pin_code=$this->input->post('pin_code');
            $packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
            $packaging_time_per_print=$this->input->post('packaging_time');
            $packaging_material_used=$this->input->post('packaging_material');
            $product_branding_options=$this->input->post('packaging_branding');
            $delivery_to_framer=$this->input->post('delivery_to_framer');
            $delivery_to_office=$this->input->post('delivery_to_office');
            $pick_up_from_office=$this->input->post('pick_office');
            $working_on_off_days=$this->input->post('working_days');
            $status=$this->input->post('vender_status');
            $rate=$this->input->post('rate');
            $display_name=$this->input->post('display_name');
            $display_name_list=$this->input->post('display_name_list');
            $desc=$this->input->post('desc');
            $code=$this->input->post('code');
            $remark=$this->input->post('remark');
            $mobile=$this->input->post('mobile');
            $contact_number=$this->input->post('contact_number');
            $cheque=$this->input->post('cheque');
            $preferred=$this->input->post('preferred');
            $satisfication=$this->input->post('level');
            $per_feet=$this->input->post('per_feet');
            $cost=$this->input->post('cost');
               $noofpices=$this->input->post('noofpices');
                $gsm=$this->input->post('gsm');
                 $height=$this->input->post('height');
                  $width=$this->input->post('width');
                     $typesofvender=$this->input->post('typesofvender');
                     $package_code=$this->input->post('package_code');
                  $qty=$this->input->post('qty');
              $color=$this->input->post('color');
              $unit=$this->input->post('unit');
             $depth=$this->input->post('depth');
     $data['package_rows']= $this->backend_model->All_package_sub_code_details();
   $data['edit_details']=$this->backend_model->Get_to_Update_All_package_details($printer_id,$package_code);
   $data['package_code']=$package_code;
               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/edit_package',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }

                }




        $genCode=1;
         for($i=0;$i<=count($surface);$i++)
          {
           $rate = $cost[$i]/($height[$i]*$width[$i]*$qty[$i]);
            $area=$height[$i]*$width[$i]*$qty[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
           //print_r($display_name_list);die;
           //echo $display_name_list[$i];

           //echo $display_name[$i];
              if($display_name<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                 $surface_gen_code  =$display_name_list[$i];
              }

              //echo $surface_gen_code.'<br>';

              if(isset($display_name[$i]))
              {
                  $change_display_name=$display_name[$i];
              }elseif(isset($display_name_list[$i])){
                  $change_display_name=$display_name_list[$i];
              }
              //echo $change_display_name;die;
             if($surface[$i]<>'')
             {
       $update="update tbl_packaging set qty='".$qty[$i]."', unit='".$unit[$i]."',lenght='".$depth[$i]."',area='".$area."',color='".$color[$i]."', typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$rate."', per_feet='".$per_feet[$i]."', display_name='".$change_display_name."', sur_desc='".$desc[$i]."', sur_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."' where package_id='".$edit_id."'";
           $executeQuery=  mysql_query($update);
           if($executeQuery)
           {
               $data['msg']='Info edit successfully';
           }else{
             $data['msg']='accuring error';

           }
             }



        }// end loop


                     $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/edit_package',$data);
		       $this->load->view('backend/footer');

}
public function edit_framer_details(){

          $framer_code= $this->input->post('framer_code');
          $edit_id= $this->input->post('edit_id');
          $data['edit_id']=$edit_id;
           $data['framer_code']=$framer_code;
  //print_r($edit_id);
    //$edit_id[0];


            $frame_code=$this->input->post('frame_code');
            $company_name=$this->input->post('name');
            $contact_person_name=$this->input->post('contactname');
            $contact_number=$this->input->post('contact');
            $email_id=$this->input->post('email');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $pin_code=$this->input->post('pin_code');
            $packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
            $packaging_time_per_print=$this->input->post('packaging_time');
            $packaging_material_used=$this->input->post('packaging_material');
            $product_branding_options=$this->input->post('packaging_branding');
            $delivery_to_framer=$this->input->post('delivery_to_framer');
            $delivery_to_office=$this->input->post('delivery_to_office');
            $pick_up_from_office=$this->input->post('pick_office');
            $working_on_off_days=$this->input->post('working_days');
            $status=$this->input->post('vender_status');

            //print_r($display_name_list);
            $desc=$this->input->post('desc');

            $code=$this->input->post('code');
            $remark=$this->input->post('remark');
            $mobile=$this->input->post('mobile');
            $cheque=$this->input->post('cheque');
            $preferred=$this->input->post('preferred');
            $satisfication=$this->input->post('level');

            $cost=$this->input->post('cost');
            $color=$this->input->post('color');
            $surface= $this->input->post('framename');
            $length= $this->input->post('length');
            $rate=$this->input->post('rate');
            $display_name=$this->input->post('display_name');
            $display_name_list=$this->input->post('display_name_list');
            $per_feet=$this->input->post('unit');
            $noofpices=$this->input->post('noofpices');
            $gsm=$this->input->post('gsm');
            $labor_charge=$this->input->post('labor_charge');
            $height=$this->input->post('height');
            $width=$this->input->post('width');
            $typesofvender=$this->input->post('typesofvender');
            $Quantity=$this->input->post('Quantity');
             $frame_image=$this->input->post('frame_image');

     $data['package_rows']= $this->backend_model->All_package_sub_code_details();
   $data['edit_details']=$this->backend_model->Get_to_Update_All_framer_details($printer_id,$framer_code);
   $data['package_code']=$framer_code;
               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/edit_package',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }

                }



       if($this->input->post('edit')=='Update')
            {
        $genCode=1;
         for($i=0;$i<=count($surface);$i++)
          {

            //echo $fileName=$_FILES["file"]["name"][$i];die;
             if($fileName<>''){
         $f=date('U');
        move_uploaded_file($_FILES["file"]["tmp_name"][$i],"frame/".$f.'frame'.$_FILES["file"]["name"][$i]);
         $frameName="frame/".$f.'frame'.$_FILES["file"]["name"][$i];
             }else{
              $frameName=   $frame_image[$i];
             }
           //$rate = $cost[$i]/($height[$i]*$width[$i]*$Quantity[$i]);
            $area=$width[$i]*$Quantity[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
           //print_r($display_name_list);die;
           //echo $display_name_list[$i];

           //echo $display_name[$i];
              if($display_name<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                 $surface_gen_code  =$display_name_list[$i];
              }

              //echo $surface_gen_code.'<br>';

              if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }

             if($surface[$i]<>'')
             {
                  $change_display_name;
        $update="update tbl_framer set frame_visual='".$frameName."', generate_code='".$frame_code[$i]."', color='".$color[$i]."', labor_charge='".$labor_charge."', area='".$area."', qty='".$Quantity[$i]."', unit='".$per_feet[$i]."', typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."',length='".$length[$i]."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$rate[$i]."', unit='".$per_feet[$i]."', display_name='".$change_display_name."', sur_desc='".$desc[$i]."', sur_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."' where  framer_id='".$edit_id[$i]."'";
           $executeQuery=  mysql_query($update);
           if($executeQuery)
           {
               $data['msg']='Info edit successfully';
           }else{
             $data['msg']='accuring error';

           }
             }



        }// end loop
        //die;
}// end if update condition

        ///////////////////  New Items adddd////////////////////////////


       else if($this->input->post('save')=='Add')
            {

           $frame_code=$this->input->post('frame_coden');
            $descn=$this->input->post('descn');
            $color=$this->input->post('colorn');
            $cost=$this->input->post('costn');
            $surfacen= $this->input->post('framenamen');
            $length= $this->input->post('lengthn');
            $display_name=$this->input->post('display_namen');
            $display_name_list=$this->input->post('display_name_listn');
            $per_feet=$this->input->post('unitn');
            $noofpices=$this->input->post('noofpicesnn');
            $gsm=$this->input->post('gsmnn');
            $height=$this->input->post('heightn');
            $width=$this->input->post('widthn');
             $rate=$this->input->post('raten');
            $typesofvender=$this->input->post('typesofvendern');
            $Quantity=$this->input->post('Quantityn');
            //print_r($_FILES["file"]["name"]);

        $genCode=1;
         for($i=0;$i<=count($surfacen);$i++)
          {

          if($_FILES["file3"]["name"][$i]<>''){
            $fileName=  $_FILES["file3"]["name"][$i];
            $tmpName=  $_FILES["file3"]["tmp_name"][$i];
          }else
              if($_FILES["file"]["name"][$i]<>''){
            $fileName=  $_FILES["file"]["name"][$i];
            $tmpName=  $_FILES["file"]["tmp_name"][$i];
          }else
              if($_FILES["file2"]["name"][$i]<>''){
            $fileName=  $_FILES["file2"]["name"][$i];
            $tmpName=  $_FILES["file2"]["tmp_name"][$i];
          }

         $f=date('U');
       move_uploaded_file($tmpName,"frame/".$f.'frame'.$fileName);
         $frameName="frame/".$f.'frame'.$fileName;



             if($length<>'')
             {
             $area=$length[$i];
             }else{
                $area=$width[$i]*$Quantity[$i];
             }
             if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }

              if($display_name<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                 $surface_gen_code  =$display_name_list[$i];
              }

              //echo $surface_gen_code.'<br>';

              if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }

             if($surfacen[$i]<>'')
             {
                  $change_display_name;
            $insert="insert into tbl_framer set frame_visual='".$frameName."', color='".$color[$i]."', framer_name='".$surfacen[$i]."', generate_code='".$frame_code[$i]."', framer_code='".$framer_code."',  area='".$area."', qty='".$Quantity[$i]."',  typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', cost_per_sq_inch='".$cost[$i]."', length='".$length[$i]."',  surface='".$surface[$i]."', rate='".$rate[$i]."', unit='".$per_feet[$i]."', display_name='".$change_display_name."', sur_desc='".$descn[$i]."', sur_code='".$surface_gen_code."', registration_form='".$registration_form."',gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', modify_date='".date('y-m-d h:i:s')."' ";
           $executeQuery=  mysql_query($insert);
           if($executeQuery)
           {
               $data['msg']='Add New Items successfully';
           }else{
             $data['msg']='accuring error';

           }
             }



        }// end loop



}/// end if add condition




        $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/edit_framer',$data);
		       $this->load->view('backend/footer');

}


public function edit_printer_details() {

                        $edit_id= $this->input->post('edit_id');
                        //print_r($edit_id);
                         $printer_code= $this->input->post('printer_code');
                        $data['edit_id']=$printer_code;

                        $surface= $this->input->post('surface');
			$company=$this->input->post('name');
			$contact_person_name=$this->input->post('contactname');
			$contact_number=$this->input->post('contact');
			$email_id=$this->input->post('email');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$pin_code=$this->input->post('pin_code');
			$packaging_cost_per_size_of_print=$this->input->post('packaging_cost');
			$packaging_time_per_print=$this->input->post('packaging_time');
			$packaging_material_used=$this->input->post('packaging_material');
			$product_branding_options=$this->input->post('packaging_branding');
			$delivery_to_framer=$this->input->post('delivery_to_framer');
			$delivery_to_office=$this->input->post('delivery_to_office');
			$pick_up_from_office=$this->input->post('pick_office');
			$working_on_off_days=$this->input->post('working_days');
			$status=$this->input->post('vender_status');
			$labor_charge=$this->input->post('labor_charge');
			$display_name=$this->input->post('display_name');
			$display_name_list=$this->input->post('display_name_list');
			$desc=$this->input->post('desc');
			$code=$this->input->post('code');
			$remark=$this->input->post('remark');
			$mobile=$this->input->post('mobile');
			$contact_number=$this->input->post('contact_number');
			$cheque=$this->input->post('cheque');
			$preferred=$this->input->post('preferred');
			$satisfication=$this->input->post('level');
			$per_feet=$this->input->post('per_feet');
			$cost=$this->input->post('cost');
			$noofpices=$this->input->post('noofpices');
			$gsm=$this->input->post('gsm');
			$height=$this->input->post('height');
			$width=$this->input->post('width');
			$typesofvender=$this->input->post('typesofvender');
			$unit=$this->input->post('unit');
			$qty=$this->input->post('qty');







    $data['printer_rows']= $this->backend_model->All_printer_sub_code_details();
   $data['edit_details']=$this->backend_model->Get_to_Update_All_printer_details($printer_id,$printer_code);
   $data['printer_code']=$printer_code;
               	 if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $datam['msg']="Please upload File less than 2MB.";
			   $this->load->view('backend/dashboard_header');
		       $this->load->view('backend/printer/add_new_printer',$datam);
		       $this->load->view('backend/footer');

		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
            else
            {
             $pdf="";
             }

                }




        $genCode=1;

          if(isset($_REQUEST['upload_images']))
         {

         for($i=0;$i<=count($surface);$i++)
          {
           $rate = $cost[$i]/($height[$i]*$width[$i]);
            $area=$height[$i]*$width[$i]*$qty[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
               if($display_name<>'')
              {
           $split=split(' ',$display_name[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_list[$i]<>''){
                 $surface_gen_code  =$display_name_list[$i];
              }

              if($display_name[$i]<>'')
              {
                  $change_display_name=$display_name[$i];
              }elseif($display_name_list[$i]<>''){
                  $change_display_name=$display_name_list[$i];
              }


             if($surface[$i]<>'')
             {
         $update="update tbl_printer   set  labor_charge='".$labor_charge."',area='".$area."', qty='".$qty[$i]."', unit='".$unit[$i]."', typesofvender='".$typesofvender."', height='".$height[$i]."',width='".$width[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$cost[$i]."', gsm_of_surface='".$gsm[$i]."', noofpieces='".$noofpices[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surface[$i]."', rate='".$rate."', per_feet='".$per_feet[$i]."', display_name='".$change_display_name."', sur_desc='".$desc[$i]."', sur_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."' where printer_id='".$edit_id[$i]."' ";
        $executeQuery=  mysql_query($update);
           if($executeQuery)
           {
               $data['msg']='Info edit successfully';
           }else{
             $data['msg']='accuring error';

           }

         }// end update query



        }// end loop

         } elseif(isset($_REQUEST['add_more']))
         {


             /////////////////////add more printers////////////////
                $display_namen=$this->input->post('display_namen');
                $display_name_listn=$this->input->post('display_name_listn');
                $noofpicesn=$this->input->post('noofpicesn');
                $gsmn=$this->input->post('gsmn');
                $heightn=$this->input->post('heightn');
                $widthn=$this->input->post('widthn');
                $surfacen= $this->input->post('surfacen');
                $costn=$this->input->post('costn');
                $typesofvender=$this->input->post('typesofvender');
                $printer_code=$this->input->post('printer_code');
                $unitn=$this->input->post('unitn');
                $qtyn=$this->input->post('qtyn');
                $descn=$this->input->post('descn');
                $product_code=$this->input->post('product_code');



        for($i=0;$i<=count($surfacen);$i++)
          {

          $raten = $costn[$i]/($heightn[$i]*$widthn[$i]);
            $arean=$heightn[$i]*$widthn[$i]*$qtyn[$i];
           if($genCode<10)
           {
               $genCode='0'.$genCode;
           }else{
               $genCode=$genCode;
           }
           //print_r($display_name_list);die;
           //echo $display_name_list[$i];

           //echo $display_name[$i];
              if($display_namen<>'')
              {
           $split=split(' ',$display_namen[$i]);
       //echo $split[0];
           $code1=$this->backend_model->generate_code($split[0],$split[1]);
           $CodeUpper=  strtoupper($code1);
            $surface_gen_code=$CodeUpper.$genCode;
              }if($display_name_listn[$i]<>''){
                 $surface_gen_code  =$display_name_listn[$i];
              }

              //echo $surface_gen_code.'<br>';

              if($display_namen[$i]<>'')
              {
                  $change_display_namen=$display_namen[$i];
              }elseif($display_name_listn[$i]<>''){
                  $change_display_namen=$display_name_listn[$i];
              }



             if($surfacen[$i]<>'')
             {
        $insert="insert into tbl_printer set  product_code='".$product_code[$i]."', printer_code='".$printer_code."' ,labor_charge='".$labor_charge."',area='".$arean."', qty='".$qtyn[$i]."', unit='".$unitn[$i]."', typesofvender='".$typesofvender."', height='".$heightn[$i]."',width='".$widthn[$i]."', registration_form='".$registration_form."', cost_per_sq_inch='".$costn[$i]."', gsm_of_surface='".$gsmn[$i]."', noofpieces='".$noofpicesn[$i]."',
contact_person_name='".$contact_person_name."', company_name='".$company_name."', address='".$address."', contact_number='".$contact_number."', email_id='".$email_id."', mobile_number='".$mobile."', state='".$state."', pin_code='".$pin_code."', status='".$status."',  packaging_cost_per_size_of_print='".$packaging_cost_per_size_of_print."', packaging_time_per_print='".$packaging_time_per_print."', packaging_material_used='".$packaging_material_used."', product_branding_options='".$product_branding_options."', delivery_to_office='".$delivery_to_office."', pick_up_from_office='".$pick_up_from_office."', working_on_off_days='".$working_on_off_days."', remarks='".$remark."', satisfaction_level='".$satisfication."', preferred_surface='".$preferred."', name_on_cheque='".$cheque."', upload_the_contract_form='".$pdf."', surface='".$surfacen[$i]."', rate='".$raten."', per_feet='".$per_feetn[$i]."', display_name='".$change_display_namen."', sur_desc='".$descn[$i]."', sur_code='".$surface_gen_code."', modify_date='".date('y-m-d h:i:s')."', create_date='".date('y-m-d h:i:s')."' ";
           $executeQuery=  mysql_query($insert);
           if($executeQuery)
           {
               $data['msg']='Info edit successfully';
           }else{
             $data['msg']='accuring error';

           }
             }


        }// end loop


         }// end if condition

            $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/printer/edit_printer',$data);
	    $this->load->view('backend/footer');

}

public function edit_vendor($id,$vender_type)
{
	if($this->session->userdata('userid'))
	{
      if($vender_type=='1')
      {
	   $this->form_validation->set_rules('name','Name','required');
	   if($this->form_validation->run()==true)
	   {

	    if($_FILES["pdf_file"]["size"]>20000000)
		   {
			   $data['msg']="Please upload File less than 2MB.";


		   }
		else
		{
		    $i=date('U');
             move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploaded_pdf/".$i.$_FILES["pdf_file"]["name"]);


            if($_FILES['pdf_file']['name'])
             {
                 $pdf="uploaded_pdf/".$i.$_FILES["pdf_file"]["name"];
             }
			 else
			 {
				 $pdf=$this->input->post('contract_url');
			 }
		}

		   $data=array('vender_company_name'=>$this->input->post('name'),'vender_contact_no'=>$this->input->post('contact'),'vender_email_id'=>$this->input->post('email'),'vender_address'=>$this->input->post('address'),'vender_city'=>$this->input->post('city'),'vender_state'=>$this->input->post('state'),'vender_pin_code'=>$this->input->post('pin_code'),'vender_mobile_no'=>$this->input->post('mobile'),'vender_status'=>$this->input->post('vender_status'),'vender_services_offered'=>$this->input->post('service'),'vender_time_taken'=>$this->input->post('total_time'),'vender_last_modification_date'=>date('y-m-d h:i:s'),'vender_type'=>'1','vender_contract_filename'=>$pdf);
		   $this->backend_model->update_vender($id,$data);
	   }
	 $query="SELECT * FROM  tbl_vender WHERE vender_id = '".$id."' AND vender_type = '".$vender_type."' AND vender_status = '0' Union  SELECT * FROM tbl_vender WHERE vender_id = '".$id."' AND vender_type = '".$vender_type."' AND vender_status = '1'";
 $result=mysql_query($query)or die('Query Not executed');
	$data['vendor_details']= mysql_fetch_array($result);

	    $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/edit_printer',$data);
	    $this->load->view('backend/footer');
}
else if($vender_type=='2')
	  {
	    $this->form_validation->set_rules('name','Name','required');
	   if($this->form_validation->run()==true)
	   {
	  if($_FILES["file1"]["size"]>20000000)
		      {
			   $data['msg']="Please upload File less than 2MB.";
			  }
	          if($_FILES["file1"]["name"]!="")
			  {
	           $abc=date('U').$_FILES["file1"]["name"];
                move_uploaded_file($_FILES["file1"]["tmp_name"],"uploaded_pdf/".$abc);
			  }

			 else
			 {
				 $abc=$this->input->post('contract');
			 }

	         $data=array(
	                   'vender_company_name'=>$this->input->post('name'),
		               'vender_contact_no'=> $this->input->post('contact'),
		               'vender_email_id'=>$this->input->post('email'),
		               'vender_address'=>$this->input->post('address'),
					   'vender_city'=>$this->input->post('city'),
					   'vender_state'=>$this->input->post('state'),
					   'vender_pin_code'=>$this->input->post('pin'),
		               'vender_status'=>$this->input->post('vstatus'),
					   'vender_contract_filename'=>$abc,
					   'vender_last_modification_date'=>date('Y-m-d H:i:s'),
		               'vender_type'=>2,
		               'vender_time_taken'=>$this->input->post('timetaken'),
		               'vender_services_offered'=>$this->input->post('services'));

	        $this->backend_model->update_vender($id,$data);
	   }

	   $query="SELECT * FROM  tbl_vender WHERE vender_id = '".$id."' AND vender_type = '".$vender_type."' AND vender_status = '0' Union  SELECT * FROM tbl_vender WHERE vender_id = '".$id."' AND vender_type = '".$vender_type."' AND vender_status = '1'";
 $result=mysql_query($query)or die('Query Not Executed');
	$data['vendor_details']= mysql_fetch_array($result);
		  $this->load->view('backend/dashboard_header');
	      $this->load->view('backend/edit_framer',$data);
	      $this->load->view('backend/footer');
	  }
	}else{redirect('backend/index');}
  }

public function view_details($id)
{
   if($this->session->userdata('userid'))
   {
	     $data['print']=$this->backend_model->get_vender_details($id);

		if( $data['print']->vender_type=='1')
{
	$data['printer']=$this->backend_model->get_surface_details($id);
		$data['framer']="";
		//$this->load->view('backend/vender_table',$data1);
		//print_r($data1);
}
else if( $data['print']->vender_type=='2')
{
    $data['printer']="";
	$data['framer']=$this->backend_model->get_framenmount_details($id);
	//print_r($data1);
	//$this->load->view('backend/vender_table',$data1);
}

	     $this->load->view('backend/dashboard_header');
	    $this->load->view('backend/vender_table',$data);
	    $this->load->view('backend/footer');


	}
	else{redirect('backend/index');}
}





			public function view_frames($page='')
			{

                        $vender_name=$_GET['vender_name'];
                        $email_id=$_GET['email_id'];
                        $vender_code=$_GET['vender_code'];
                        $data['framer_code']=$this->backend_model->Get_all_framer_code();
                        $data['packag_details']=$this->backend_model->Get_all_frames_data();
                        $data['venders']=$this->backend_model->Get_add_frames_more_details($vender_name,$email_id,$vender_code);
                        $data['company_name']=$this->backend_model->All_frames_company_name_details();
                        $data['vender_code']=$this->backend_model->All_frames_sub_code_details();
                        $data['email_id']=$this->backend_model->All_frames_email_id_details();


			   if($this->session->userdata('userid'))
	           {
				   if($this->input->post('search'))
	                 {

			        $type=$this->input->post('code2');
				    $width= $this->input->post('width');
					$date= $this->input->post('date');
					$color= $this->input->post('color');
					$data['get_frame']=$this->backend_model->search_frame($type,$width,$date,$color);
					$data['total_rows']=count($data['get_frame']);
					 }

					else
					{
			 		$data['get_frame']=$this->backend_model->view_frames($page);
					$data['total_rows']=$this->backend_model->total_frames($page);
					}
					$data['page'] =  $page;
					$this->load->view('backend/dashboard_header');
					$this->load->view('backend/view_frame',$data);
					$this->load->view('backend/footer');
				}
				else{redirect('backend/index');
				}


			}

			public function view_surfaces($page='')
			{
			     if($this->session->userdata('userid'))
	             {

				   if($this->input->post('search'))
	                 {

			        $type=$this->input->post('code2');
				    //$width= $this->input->post('width');
					$date= $this->input->post('date');
					//$color= $this->input->post('color');
					$data['get_surface']=$this->backend_model->search_surface($type,$date);
					$data['total_surface']=count($data['get_surface']);
					 }

					else
					{
					$data['get_surface']=$this->backend_model->view_surface($page);
					$data['total_surface']=$this->backend_model->total_surface($page);
					}
					$data['page'] = $page;
					$this->load->view('backend/dashboard_header');
					$this->load->view('backend/view_surface',$data);
					$this->load->view('backend/footer');
				}
				else{redirect('backend/index');}

			}




			public function view_mount($page='')
			{
			     if($this->session->userdata('userid'))
	           {
			       if($this->input->post('search'))
	                 {

			        $type=$this->input->post('code2');
				    $width= $this->input->post('width');
					$date= $this->input->post('date');
					$color= $this->input->post('color');
					$data['get_mount']=$this->backend_model->search_mount($type,$width,$date,$color);
					$data['total_mount']=count($data['get_mount']);
					 }

					else
					{

					$data['get_mount']=$this->backend_model->view_mount($page);
					$data['total_mount']=$this->backend_model->total_mount($page);
					}
					$data['page'] =  $page;
					$this->load->view('backend/dashboard_header');
					$this->load->view('backend/view_mount',$data);
					$this->load->view('backend/footer');
				}
               else{redirect('backend/index');}


			}

 public function edit_master_surface($surface_id)
	 {
		 if($this->session->userdata('userid'))
	     {
		 $data['msg']="";
		 $this->form_validation->set_rules('surface_type','surface_type','required');
		 if($this->form_validation->run()==true)
		 {
		    $surface_type=str_split($this->input->post('surface_type'),3);
            $gsm=$this->input->post('gsm');
	        $surface_code="SUR_".$surface_type['0']."_".$gsm;
			 $code=$this->backend_model->surface_code($surface_code);
	      if($code==0)
	       {
			 $data=array('surface_type'=>$this->input->post('surface_type'),'surface_gsm'=>$this->input->post('gsm'),'surface_recommended'=>$this->input->post('recommended'));
			//print_r($data);
			 $this->backend_model->update_surface($data,$surface_id);

			$this->backend_model->update_master_surface($surface_id,$surface_code);
			 redirect('backend/view_surfaces');
		 }
		  else
		   {
		      $data['msg']="This Surface Code is Already Selected Choose Another One !!!";
		   }
		 }
		 $data['surface']=$this->backend_model->get_surface_by_id($surface_id);
		 $this->load->view('backend/dashboard_header');
		 $this->load->view('backend/edit_surface_master',$data);
		 $this->load->view('backend/footer');
	   }else{redirect('backend/index');}
	 }

public function edit_frame($frame_id)
{
	 if($this->session->userdata('userid'))
	 {
		 $this->form_validation->set_rules('type','type','required');
	     if($this->form_validation->run()==true)
		 {
	        $frameType=str_split($this->input->post('type'),'3');;
		    $colour=str_split($this->input->post('colour'),'3');
		    $width=$this->input->post('width');
			$framecode='FRM_'.$frameType['0']."_".$colour['0']."_".$width;
			//print($framecode);
			$code=$this->backend_model->frame_code($framecode);
		    if(!$code){


			if($_FILES["file2"]["name"])
			{
		        $file2=date('U').$_FILES["file2"]["name"];
                move_uploaded_file($_FILES["file2"]["tmp_name"],"uploaded_pdf/".$file2);
				unlink('uploaded_pdf/'.$this->input->post('hid_file2'));

			}
			else
			{
				$file2=$this->input->post('hid_file2');
			}

			if($_FILES["file3"]["name"])
			{
		   $file3=date('U').$_FILES["file3"]["name"];
           move_uploaded_file($_FILES["file3"]["tmp_name"],"uploaded_pdf/".$file3);
		   unlink('uploaded_pdf/'.$this->input->post('hid_file3'));

			}
			else
			{
				$file3=$this->input->post('hid_file3');
			}
			if($_FILES["file4"]["name"])
			{
		   $file4=date('U').$_FILES["file4"]["name"];
           move_uploaded_file($_FILES["file4"]["tmp_name"],"uploaded_pdf/".$file4);
		   unlink('uploaded_pdf/'.$this->input->post('hid_file4'));

			}
			else
			{
				$file4=$this->input->post('hid_file4');
			}
			if($_FILES["file5"]["name"])
			{
		   $file5=date('U').$_FILES["file5"]["name"];
           move_uploaded_file($_FILES["file5"]["tmp_name"],"uploaded_pdf/".$file5);
		   unlink('uploaded_pdf/'.$this->input->post('hid_file5'));

			}
			else
			{
				$file5=$this->input->post('hid_file5');

			}

			if($_FILES["file6"]["name"])
			{
		   $file6=date('U').$_FILES["file6"]["name"];
           move_uploaded_file($_FILES["file6"]["tmp_name"],"uploaded_pdf/".$file6);
		  unlink('uploaded_pdf/'.$this->input->post('hid_file6'));

			}
			else
			{
				$file6=$this->input->post('hid_file6');
			}
			if($_FILES["file7"]["name"])
			{
		   $file7=date('U').$_FILES["file7"]["name"];
           move_uploaded_file($_FILES["file7"]["tmp_name"],"uploaded_pdf/".$file7);
		   unlink('uploaded_pdf/'.$this->input->post('hid_file7'));

			}
			else
			{
				$file7=$this->input->post('hid_file7');
			}

			if($_FILES["file8"]["name"])
			{
		   $file8=date('U').$_FILES["file8"]["name"];
           move_uploaded_file($_FILES["file8"]["tmp_name"],"uploaded_pdf/".$file8);
		   unlink('uploaded_pdf/'.$this->input->post('hid_file8'));

			}
			else
			{
				$file8=$this->input->post('hid_file8');
			}

			if($_FILES["file9"]["name"])
			{
		   $file9=date('U').$_FILES["file9"]["name"];
           move_uploaded_file($_FILES["file9"]["tmp_name"],"uploaded_pdf/".$file9);
		 unlink('uploaded_pdf/'.$this->input->post('hid_file9'));

			}
			else
			{
				$file9=$this->input->post('hid_file9');
			}


		   $arraytbl_frame=array('frame_recommended'=>$this->input->post('recommended'),'frame_upload_image_name'=>$file2.",".$file3.",".$file4.",".$file5.",".$file6.",".$file7.",".$file8.",".$file9,'frame_code'=>$framecode,'frame_created_date'=>date('Y-m-d H:i:s'),'frame_type'=>$this->input->post('type'),'frame_width'=>$this->input->post('width'),'frame_colour'=>$this->input->post('colour'));
		$this->backend_model->update_frame($arraytbl_frame,$frame_id);
		redirect('backend/view_frames');

		 }
		 }

	   $data['frame']=$this->backend_model->get_frame_details($frame_id);


		   $this->load->view('backend/dashboard_header');
		   $this->load->view('backend/edit_frame',$data);
		   $this->load->view('backend/footer');
    }else{redirect('backend/index');}
	}

public function edit_mount($id)
{
    $data['msg']="";
  if($this->session->userdata('userid'))
  {
    if(isset($_POST['Add'])){

	$mountType=str_split($this->input->post('type'),'3');;
    $colour=str_split($this->input->post('colour'),'3');
    $thickness=str_split($this->input->post('thickness'),3);
	$mountcode='MNT_'.$mountType['0']."_".$colour['0']."_".$thickness['0'];
			$code=$this->backend_model->mount_code($mountcode);
		    if(!$code){


			if($_FILES["file10"]["name"])
			{
		        $file10=date('U').$_FILES["file10"]["name"];
                move_uploaded_file($_FILES["file10"]["tmp_name"],"uploaded_pdf/".$file10);
				unlink('uploaded_pdf/'.$this->input->post('hid_file10'));

			}
			else
			{
				$file10=$this->input->post('hid_file10');
			}

			if($_FILES["file11"]["name"])
			{
		      $file11=date('U').$_FILES["file11"]["name"];
              move_uploaded_file($_FILES["file11"]["tmp_name"],"uploaded_pdf/".$file11);
		      unlink('uploaded_pdf/'.$this->input->post('hid_file11'));

			}
			else
			{
				$file11=$this->input->post('hid_file11');
			}

	      $data=array('mount_recommended'=>$this->input->post('recommended'),'mount_type'=>$this->input->post('type'),'mount_colour'=>$this->input->post('colour'),'mount_thickness'=>$this->input->post('thickness'),'mount_upload_image_name'=>$file10.",".$file11,'mount_created_date'=>date('Y-m-d H:i:s'),'mount_code'=>$mountcode);
		   $this->backend_model->update_mount($data,$id);
		   redirect('backend/view_mount');

	  }
	  else{$data['msg']="This Code Already Registered Choose Another One !!";}

	}
	 $data['details']=$this->backend_model->mount_details($id);
    $this->load->view('backend/dashboard_header');
    $this->load->view('backend/edit_mount',$data);
	$this->load->view('backend/footer');

   }else{redirect('backend/index');}

}

/*public function get_images()
{

$status = $this->input->post('status');
$data['images']=$this->backend_model->get_image_bystatus($status);
//print_r($data['images']);
$this->load->view('backend/milti_view_table',$data);

}*/


public function change_status()
{
	$img_id=$this->input->get('id');
	$img_status=$this->input->get('img_status');
	$url_status=$this->input->get('url_status');
	$partner=$this->input->get('partner');
	$file=$this->input->get('file');
	$start=$this->input->get('start');
	$end=$this->input->get('end');
        $pagination=$this->input->get('per_page');
        $page=$this->input->get('page');

	$this->backend_model->status_change($img_id,$img_status);

	if($partner|| $start || $file|| $end || $pagination || $page)
	{
	redirect('backend/multi_view_images?status='.$url_status.'&partner='.$partner.'&file='.$file.'&start='.$start.'&end='.$end.'&per_page='.$pagination. '&page='.$page );
	}
	else
	{
		redirect('backend/multi_view_images?status='.$url_status);
	}
}

public function get_image_byid()
{
	$data=$this->search_model->get_image_data($this->input->post('id'));
	print($data->images_caption.'/'. $data->images_description.'/'. $data->images_keywords);
}

public function edit_image()
{  $id=$this->input->post('hid_id');
  $status=$this->input->post('hid_status');
  $partner=$this->input->post('hid_partner');
  $file=$this->input->post('hid_file');
  $start=$this->input->post('hid_start');
  $end=$this->input->post('hid_end');
   $pagination=$this->input->post('hid_pagination');
   $page=$this->input->post('hid_page');
	$data=array('images_caption'=> $this->input->post('caption'), 'images_description'=>$this->input->post('description'),'images_keywords'=>$this->input->post('keywords'));
	$this->backend_model->edit_image_data($id,$data);

if($partner|| $start || $file|| $end || $pagination || $page)
	{
	redirect('backend/multi_view_images?status='.$status.'&partner='.$partner.'&file='.$file. '&start='.$start. '&end='.$end. '&per_page='.$pagination.'&page='.$page);	}
	else
	{
		redirect('backend/multi_view_images?status='.$status);
	}
}

public function manage_image()
{
	 $this->load->view('backend/dashboard_header');
        $this->load->view('backend/manage_images');
	 $this->load->view('backend/footer');
}
public function upload()
{
    $da['msg']="";
    if(isset($_POST['submit']))
  {
    $filename=$_FILES['files']['name'] ;
    $filename=date('U').$filename;
    $add1 = "csv/sizes_available/".$filename;
    move_uploaded_file($_FILES['files']['tmp_name'], $add1);

    $sql1 =  mysql_connect('localhost','root','2012_@ib2012') or die('Error connecting to mysql server');
	mysql_select_db('wallsnart',$sql1);

	$handle = fopen($add1, "r+");

	$data = fgetcsv($handle, 1000, ",");    //Remove Ist column headings

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {

	$images_id = mysql_real_escape_string($data[0]);
	$width = mysql_real_escape_string($data[1]);
	$height = mysql_real_escape_string($data[2]);
	$ratio_width = mysql_real_escape_string($data[3]);
	$ratio_height = mysql_real_escape_string($data[4]);
      	$sizes = mysql_real_escape_string($data[5]);
	$actual_sizes = mysql_real_escape_string($data[6]);
       $size_16 = mysql_real_escape_string($data[7]);
       $actual_size_16=mysql_real_escape_string($data[8]);
       $size_24=mysql_real_escape_string($data[9]);
       $actual_size_24=mysql_real_escape_string($data[10]);
       $size_32=mysql_real_escape_string($data[11]);
       $actual_size_32=mysql_real_escape_string($data[12]);
       $size_40=mysql_real_escape_string($data[13]);
       $actual_size_40=mysql_real_escape_string($data[14]);
	$width_max_dpi = mysql_real_escape_string($data[15]);
	$height_max_dpi = mysql_real_escape_string($data[16]);

       $sqlmin="select images_filename from tbl_images_search where images_filename='".$images_id."'";
       $rowmin=mysql_query($sqlmin);
       $resmin=mysql_fetch_assoc($rowmin);
     if($resmin)
     {
	$sql="insert into tbl_images_sizes_available(images_filename,width,height,ratio_width,ratio_height,width_max_dpi,height_max_dpi) values('".$images_id."','".$width."','".$height."','".$ratio_width."','".$ratio_height."','".$width_max_dpi."','".$height_max_dpi."')";
	$result= mysql_query($sql) ;
       $sql1="insert into tbl_images_sizes(images_filename,size_12,actual_size_12,size_16,actual_size_16,size_24,actual_size_24,size_32,actual_size_32,size_40,actual_size_40)values('".$images_id."','".$sizes."','".$actual_sizes."','".$size_16."','".$actual_size_16."','".$size_24."','".$actual_size_24."','".$size_32."','".$actual_size_32."','".$size_40."','".$actual_size_40."')";
	$result1= mysql_query($sql1) ;
       if(!($result && $result1))
        {
	  die('Invalid query: ' . mysql_error());
        }
        else
        {
          $da['msg']="Entry Saved Successfully !!";
        }
     }

}
}
$this->load->view('backend/upload',$da);
}


// ========================================================================   added for product form to add information By Ankit on 17/08/2013 ======================================//

public function add_productForm()
{

$filename=$this->input->post('filename');
//echo $filename;
$string = trim(preg_replace('/\s\s+/', ' ', $filename));
$textarea_array= explode(' ',$string);

for($i=0;$i<count($textarea_array);$i++) {
    $str.='"'.$textarea_array[$i].'",';
 }
 $newString = rtrim($str, ",");

 $data['detail']=$this->backend_model->get_img_det2($newString);
//print_r($data);
 //            /$changeFilename str_replace($filename, ',',' ');




 //$this->Surface_collection_price($imagename,$size);
     $product_type=$this->input->post('product_type');
     $size=$this->input->post('size');
     $frame_color=$this->input->post('frame_color');
     $mount=$this->input->post('mount');
     $category=$this->input->post('category');
     $frame_code=$this->input->post('frame_code');

            $_REQUEST['category'];

 $data=$this->backend_model->get_img_det2($newString);

                $surface_details=  $this->backend_model->Surface_collection_price($this->input->post('surface'),$this->input->post('surface_size'));
                 $frame_details=  $this->backend_model->frame_price($this->input->post('frame'),$this->input->post('frame_type'),$frame_code);
                 $mount_details=  $this->backend_model->mount_price($this->input->post('mount'));
                 $glasses_details=  $this->backend_model->glass_price($this->input->post('glass'));
                 $canvas_details=  $this->backend_model->canvas_wrapped($this->input->post('canvas_wrapped'),$this->input->post('canvas_size'));
                 $collection_wrtdetails=  $this->backend_model->collection_price_wrt_paper($this->input->post('surface'),$this->input->post('paper_size'));
              // print_r($glasses_details);


if($filename<>'')
{
           while($result=mysql_fetch_assoc($data)){
 $ratio=$result['image_original_width']/$result['image_original_height'];

                  if($product_type=='Canvas')/// or LOW
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0.00;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')///
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                        $newHeight=$p_height;
                        $newWidth=$p_width;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition



                     }else if($product_type=='Frame Mount')///MIDDLE
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=12*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=24*$ratio;
                       $newHeight=$p_height+2;
                        $newWidth=$p_width+2;
                        $print_size=$p_width*$p_height;
                        $glassSize=0;//(($newWidth+$newHeight*2));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=0;//($p_height+$p_width)*2;
                        $FrameSize=(($p_width)+(2.5+1)*2)+($p_height+(2.5+1*2))*2;

                    }// end size condition

                     }else if($product_type=='Only Frame')///HIGH
                     {

                    if($size=='10')
                    {

                        $p_width=10;
                        $p_height=10*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;


                    }elseif($size=='12')
                    {

                        $p_width=12;
                        $p_height=$p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='18')
                    {

                        $p_width=18;
                        $p_height=18*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                        $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }if($size=='24')
                    {

                        $p_width=24;
                        $p_height=  number_format($p_width, 0,'.','')*$ratio;
                        $newHeight=$p_height+4;
                        $newWidth=$p_width+4;
                        $print_size=$p_width*$p_height;
                         $glassSize=(($p_width+((1)*2))*(($p_height+(1)*2)));

                        $Max_width=$result['image_original_width']/150;
                        $Max_height=$result['image_original_height']/150;
                        $area=$Max_height*$Max_width;

                         $mount_size=(($p_width+2)*($p_height+2))*2;
                        $FrameSize=(($p_width)+(2+1)*2)+($p_height+(2+1*2))*2;

                    }// end size condition

                     }

               $print_coste=$print_size*$collection_wrtdetails;
                 $mount_price=$mount_size*$mount_details[3];
                 $glass_price=$glassSize*$glasses_details[3];
                 $frame_price=$FrameSize*$frame_details;

                  if($product_type=='Canvas')
                  {
                 $total_coste=$print_coste+$mount_price+$glass_price+$frame_price+$canvas_details;
                  }else{
                  $total_coste=$print_coste+$mount_price+$glass_price+$frame_price;
                  }
               // $result['images_filename'];



              $sql_1=" insert into channel_partner_export_data set mount_color='".$mount."',frame_color='".$frame_color."', product_type='".$product_type."',chanel_partner='".$category."',size='".$size."', fileName='".$result['images_filename']."', ratio='".number_format($ratio, 2, '.', '')."', dpi='150', max_height='".number_format($Max_height, 2,'.','')."', max_width='".number_format($Max_width, 2,'.','')."', area='".number_format($area, 2, '.','')."', width='".number_format($p_width,0, '.','')."', height='".number_format($p_height,0, '.','')."', new_width='".number_format($newWidth, 0, '.','')."', new_height='".number_format($newHeight, 0, '.','')."', print_size='".number_format($print_size, 0, '.','')."', mount_size='".number_format($mount_size ,2,'.','')."', glass_size='".number_format($glassSize, 2,'.','')."', frame_size='".number_format($FrameSize, 2, '.','')."', coste='".number_format($total_coste, 2,'.','')."'" ;
            //$insert=  mysql_query($sql_1);
           }


}


    $this->load->view('backend/dashboard_header');
    $this->load->view('backend/add_productForm',$data);
    $this->load->view('backend/footer');
//print_r($data);
}

// ========================================================================   added for product form to view information By Ankit on 17/08/2013 ======================================//

public function view_productForm()
{       $data['details']=$this->backend_model->get_product_forms();
        //print_r($data['details']);
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/view_product_form',$data);
	 $this->load->view('backend/footer');

}

public function show_channel_parter()

{   $export_id=$_GET['channel_id'];
    $data['get_details']=$this->backend_model->get_product_forms_details($export_id);
    $data['details']=$this->backend_model->get_product_forms();
        //print_r($data['details']);
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/view_product_form',$data);
	 $this->load->view('backend/footer');

}


 public function get_customers()

    {

        $details=($this->backend_model->get_customers_byid($this->input->post('id')));

        print($details->first_name."^");

        print($details->last_name."^");

        print($details->email_id."^");

        print($details->occupation."^");

        print($details->gender."^");

        print($details->martial_status."^");

        print(mysql_real_escape_string($details->address)."^");

        print($details->company_name."^");

        print($details->country."^");

        print($details->state."^");

        print($details->zip_code."^");

        print($details->contact."^");
         print($details->city."^");
           print($details->region."^");

        //  print($details->customer_id."^");

        // print($details->first_name." ".$details->last_name);



    }


//public function get_customers()
//{
//    $details=$this->backend_model->get_customers_byid($this->input->post('id'));
//    print '<tr>
//    <td>'.$details->first_name.'</td>
//    <td>'.$details->last_name.'</td>
//    <td>'.$details->email_id.'</td>
//    <td>'.$details->address.'</td>
//    <td>'.$details->city.'</td>
//    <td>'.$details->state.'</td>
//    <td>'.$details->zip_code.'</td>
//    <td>'.$details->country.'</td>
//    <td>'.$details->contact.'</td>
//    <td>'.$details->password.'</td>
//    <td>'.$details->job.'</td>
//    <td>'.$details->company_name.'</td>
//    <td><a href="#">Payments Terms</a></td>
//    </tr>';
//
//}

public function upload_upload()
{
   // echo $_REQUEST['edit_id'];
    $data['top_category']=$this->backend_model->get_top_category_images('top_category');
        if(isset($_REQUEST['edit_id']))
        {
           $data['edit_id']= $this->backend_model->edit_header_images($_REQUEST['edit_id']);
        }
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/upload_header_images',$data);
        $this->load->view('backend/footer');
}
public function home_crop_images($filename,$file_tmp,$valid_exts,$ext,$nw,$nh) {

      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
      # file type validity
      if (in_array($ext, $valid_exts)) {
          $path = 'header_images/' . uniqid()  . '.' . $ext;
          $size = getimagesize($file_tmp);
          # grab data form post request
          $x = (int) 0;
          $y = (int) 0;
          $w = (int) $size[0];
          $h = (int) $size[1];
          # read image binary data
          $data = file_get_contents($file_tmp);
          # create v image form binary data
          $vImg = imagecreatefromstring($data);
          $dstImg = imagecreatetruecolor($nw, $nh);
          # copy image
          imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
          # save image
          imagejpeg($dstImg, $path);
          # clean memory
          imagedestroy($dstImg);

        }
        return $path;
    }


public function save_upload_header_images()
{
    $title=$this->input->post('title');
    $image_type=$this->input->post('image_type');
   $radio=$this->input->post('radio');
    $category=$this->input->post('category');
   $edit_id=$this->input->post('edit_id');
   $status=$this->input->post('status');
   $edit_file=$this->input->post('edit_file');
   $desc=$this->input->post('desc');
    $top_category=$this->input->post('top_category');
     $Bottom=$this->input->post('Bottom');
      $bottom_top=$this->input->post('bottom_top');
   $data['search']=$this->input->post('search');

if($radio=='menu'){
	if($category!=4){
    $nw=294;
    $nh=285;
	}
if($category==1){ $title_name='subjects';}else
if($category==2){ $title_name='artists';}else
if($category==3){ $title_name='art styles';}else
if($category==4){ $title_name='products';}else
if($category==5){ $title_name='collections';}else
if($category==6){ $title_name='rooms';}else
if($category==7){ $title_name='places';}else
if($category==8){ $title_name='Themes';}else
if($category==9){
    $title_name='wallsnArt designs';
} if($category==4){
	 $nw=250;
     $nh=200;
	}

}else
if($radio=='top_cat'){
    if($image_type=='horizontal'){

        $nw=460;
        $nh=226;
    }elseif($image_type=='square'){

        $nw=233;
        $nh=226;
    }



  $title_name=$top_category;
}elseif($radio=='bottom'){
    $nw=206;
    $nh=176;

  $title_name=$Bottom;
}elseif($radio=='bottom top'){
    $nw=210;
    $nh=200;
  $title_name=$bottom_top;
}

 $filename=$_FILES['file']['name'];


$valid_exts = array('jpeg', 'jpg', 'png', 'gif','JPG');
$max_file_size = 200 * 1024; #200kb
//$nw = $nh = 500; # image with & height


$filename=$_FILES['file']['name'];
$file_tmp=$_FILES['file']['tmp_name'];
//echo $nw.'_'.$nh;die;
$header_file=$this->home_crop_images($filename,$file_tmp,$valid_exts,$ext,$nw,$nh);


if($_FILES['file']['name']){

    $header_file=$header_file;
}else{
  $header_file=  $edit_file;
}

             if(isset($edit_id) && $edit_id<>'')
             {
             $action='edit';
             $insert="update header_images set description='".$desc."', cat_id='".$category."', title_name='".$title_name."', title ='".$title."' , image='".$header_file."',create_on='".date('Y-m-d h:t')."' where id='".$edit_id."'";
            $execute=mysql_query($insert);
             }else{
             $action='add';
             $insert="insert into header_images set description='".addslashes($desc)."',  cat_id='".$category."', title_name='".$title_name."', title ='".$title."' , status='".$status."', image='".$header_file."',create_on='".date('Y-m-d h:t')."'";
         $execute=mysql_query($insert);
             }
             if($execute)
             {
                 $data['msg']="Header ".$title_name." image $action successfully";
             }else{
                  $data['msg']="accurring error";
             }

        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/upload_header_images',$data);
        $this->load->view('backend/footer');

}
public function view_header_images()
{
    if(isset($_REQUEST['search'])){
        if($_REQUEST['search']=='menu'){
            $data['view_images']= $this->backend_model->search_home_images('menu_data');
        }else{
       $data['view_images']= $this->backend_model->search_home_images($_REQUEST['search']);
        }
    }else{
         $data['view_images']= $this->backend_model->view_header_images();
    }
    if(isset($_REQUEST['delete_id']))
    {
        $delete_data= $this->backend_model->header_images_delete($_REQUEST['delete_id']);
         if($delete_data==1)
         {
             $data['delete_image']="Record delete successfully";
         }else{
            $data['delete_image']="accuring error";
         }
    }
    if(isset($_REQUEST['status']))
    {
       $data['status']= $this->backend_model->header_images_status($_REQUEST['edit_id'],$_REQUEST['status']);
    }


         $this->load->view('backend/dashboard_header');
        $this->load->view('backend/view_header_images',$data);
        $this->load->view('backend/footer');
}
 public  function manage_category()
    {
        $data['cat'] =$this->backend_model->view_category();
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/view_category',$data);
        $this->load->view('backend/footer');
       // $this->load->view('backend/view_category');
    }

 public function view_images($id)
     {
        // $idies = $this->uri->segment(3);
         //print_r($idies);
         $data1['img']=$this->backend_model->show_images($id);
         // print_r($data1);
$this->load->view('backend/dashboard_header');
        $this->load->view('backend/view_category_images2',$data1);
$this->load->view('backend/footer');

     }

 public function image_detail($id,$image_id)
    {
             $det['detail']=$this->backend_model->get_img_det($id);
              $det['popularity']=$this->backend_model->get_popularity($image_id);

        $this->load->view('backend/dashboard_header');
                $this->load->view('backend/edit_image_detail',$det);
        $this->load->view('backend/footer');
    }
    public function edit_image_detail($id)
    {
        $data=array('images_status'=>$this->input->post('status'),'images_keywords'=>$this->input->post('keywords'));
        $pop=array('click_to_elarge'=>$this->input->post('clk_to_en'),'add_to_gallery'=>$this->input->post('add_to_gal'),'add_to_cart'=>$this->input->post('add_to_cart'),'final_score'=>$this->input->post('final_score'),'sale'=>$this->input->post('sale'));


        $this->backend_model->update_image_status($id,$data);
        $this->backend_model->update_image_popularity($id,$pop);

        $det['detail']=$this->backend_model->get_img_det($this->input->post('imagename'));
        $det['popularity']=$this->backend_model->get_popularity($id);

        $det['msg']="Successfully Updated.";
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/edit_image_detail',$det);
        $this->load->view('backend/footer');
        // redirect('backend/image_detail/'.$this->input->post('imagename'));
    }


	public function edit_category($id)
	{
        $count=$this->input->post('count');
        $status=$this->input->post('status');
        $name=$this->input->post('catname');
        $keywords=$this->input->post('keywords');
        $id=$this->input->post('catid');

         $sql="update tbl_category set  name='".$name."', keywords='".$keywords."', status='".$status."'  where id ='".$id."'";
         $update=  mysql_query($sql);
         if($update)
         {
             $data['msg']='Update successfully';
         }else{
           $data['msg']='acurring error';
         }
	//		$this->backend_model->edit_category($data,$id);
             redirect("backend/view_editcategory/$id",$data);

          }

	public function view_editcategory($id)
     	 {
           // $data=$this->edit_category();
            $idies = $this->uri->segment(3);
            $count=$this->input->post('count');
        $status=$this->input->post('status');
        $name=$this->input->post('catname');
        $keywords=$this->input->post('keywords');
        $id=$this->input->post('catid');
        if(isset($_REQUEST['update'])) {
         $sql="update tbl_category set  name='".$name."', keywords='".$keywords."', status='".$status."'  where id ='".$id."'";
         $update=  mysql_query($sql);
         if($update)
         {
             $data['msg']='Update successfully';
         }else{
           $data['msg']='acurring error';
         }
        }


            $data['change_id']= $this->backend_model->get_details($idies);
             $this->load->view('backend/dashboard_header');
             $this->load->view('backend/view_editcategory',$data);
             $this->load->view('backend/footer');
         }
    public function add_category($id,$name)
    { //$idies = $this->uri->segment(3);

        $data['id']=$id;
        $data['name']=$name;
        // $data['change_id']= $this->backend_model->add_category( $idies);
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/add_category',$data);
        $this->load->view('backend/footer');
    }

    public  function save_category()
    {
        $data= array( 'status'=>$this->input->post('status'),'name'=>$this->input->post('catname'),'keywords'=>$this->input->post('keywords'),'p_id'=>$this->input->post('parentid'));
        $this->backend_model->add_category($data);
        redirect('backend/manage_category');
    }

public function add_maincategory()
{  if($this->session->userdata('userid'))
{
    $data['msg']="please enter name";
    $this->form_validation->set_rules('add','Add','required|xss_clean');
    if($this->form_validation->run()==true)
    {
     $data=array( 'p_id'=>'0','name'=>$this->input->post('add'));
    $this->backend_model->add_maincategory($data);
    redirect('backend/manage_category');

    }
    else
    {
         redirect('backend/manage_category',$data['msg']);
    }

}
}
    public function send_images()
{
    //$image_name_list=$this->input->post('id');
    $image=$this->input->post('check');
    $extract=explode(",",$image);
    $data= $this->backend_model->enable_images($extract);
    // print_r($image);

}
    public function disable_images()
    {
        //$image_name_list=$this->input->post('id');
        $image=$this->input->post('check');
        $extract=explode(",",$image);
        $data= $this->backend_model->disable_images($extract);
        // print_r($image);

    }

 public function search_images()
    {
        if($this->session->userdata('userid'))
        {

            $id=$this->input->get('id');
            if($id)
            {
                $data['img']=$this->backend_model->get_image_bysearch($id);

            }
            $this->load->view('backend/dashboard_header');
            $this->load->view('backend/view_category_images2',$data);
            $this->load->view('backend/footer');
        }
    }

    public function save_quotation() {

        if($this->session->userdata('userid'))
        {


            $data= array('imgid1'=>$this->input->post('imgid1'),'license_cost1'=>$this->input->post('license_cost1'),'surface'=>$this->input->post('surface'),'p_sizes'=>$this->input->post('p_sizes')
                    ,'frame'=>$this->input->post('frame'),'frame_visual'=>$this->input->post('frame_visual'),'mount_no'=>$this->input->post('mount_no'),'mount_width'=>$this->input->post('mount_with'),'mount_visual'=>$this->input->post('mount_visual'),'cover'=>$this->input->post('cover'),'total'=>$this->input->post('total'));
                print_r($data);die;
                $this->backend_model->insert_create_quotation($data);

            $this->load->view('backend/dashboard_header');
            $this->load->view('backend/create_quotation_new',$data);
            $this->load->view('backend/footer');
        }
    }









}
?>
