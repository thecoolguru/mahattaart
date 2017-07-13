<?php
class Orders extends CI_Controller
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
        $this->load->model('order_model');
        $this->load->model('cart_model');
        $this->load->model('backend_model');
        $this->load->model('search_model');
        $this->load->model('frontend_model');
        $this->load->model('channel_partner_model');
        $this->load->database();
    }
    
    
    public function delete_invoice_data($invoice_id)
    {
         $delete=$this->order_model->delete_invoice($invoice_id);
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
    
    public function convert_into_order() {
        $order_id=$this->input->post('order_id');
         die('controller order');
        $status = $this->order_model->convert_into_orders($order_id);
        
        if($status==1)
        {
            $data['msg']="Invoice converted into order successfully";
        }else if($status==0)
        {
            $data['msg']="accuring error";
        }
        
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/quotation/view_invoice',$data);
        $this->load->view('backend/footer');
        
        
    }
    
    
    public function order_save()
    {
        $user_id=$this->session->userdata('userid');
        $data =  $this->order_model->get_customer_data($user_id);
        $cart_values = $this->order_model->get_cart_values($user_id);
      //  $cart_number = $this->order_model->count_cart($user_id);
        foreach($data as $dat)
        {
            $customer_id=$dat->customer_id;
            $customer_name=$dat->first_name;
            $email=$dat->email_id;
            $address=$dat->address;
            $city =$dat->city;
            $state=$dat->state;
            $country=$dat->country;
            $zip_code=$dat->zip_code;
            $contact=$dat->contact;
             $date = date('Y-m-d H:i:s');

            $data1=array('customer_id'=>$customer_id,'customer_name'=>$customer_name,'customer_address'=>$address,
                'customer_city'=>$city,'customer_state'=>$state,'customer_country'=>$country,'customer_pincode'=>$zip_code,
                'customer_contact'=>$contact,'customer_email'=>$email,'order_date'=>$date,'order_payment_date'=>$date,'order_update_date'=>$date,'order_status'=>0);

          /*  $check=$this->order_model->order_check($customer_id);
            if($check===0)
            {

            }
            else
            { $i = $this->order_model->get_order_id($customer_id);
                foreach($i as $a)
                {
                    $ib=$a->order_id;
                }
                $id=$ib;
            }*/
            $id=$this->order_model->order_insert($data1);
            foreach($cart_values as $cart)
            {
                $quantity=$cart->cart_quantity;
                $image_id=$cart->image_id;
                $image_size=$cart->image_size;
                $price=$cart->price;
                $frame_id=$cart->frame_id;
                $print_type=$cart->image_print_type;

                   $image_url= $cart->image_name;
                    $frame_url=$cart->frame_name;
                     $frame_or_print = $cart->frame_or_print;


                $details= $this->order_model->get_frame_details($frame_id);
                foreach($details as $det)
                {
                    $frame_price=$det->frame_price;
                    $frame_width=$det->frame_width;
                    $mat_price=$det->mat_price;
                    $glass_price=$det->glass_price;
                }
                if($frame_width=="")
                {
                    $frame_width=0;
                }
                if($frame_price=="")
                {
                    $frame_price=0;
                }
                $data=array('image_print_type'=>$print_type,'order_id'=>$id,'quantity'=>$quantity,'image_print_id'=>$image_id,'image_print_size'=>$image_size,'image_print_price'=>$price,'frame_id'=>$frame_id,'frame_size'=>$frame_width,'frame_price'=>$frame_price,'image_thumbnail_url'=>$image_url,'frame_url'=>$frame_url,'frame_or_print'=>$frame_or_print,'mount_price'=>$mat_price,'glass_price'=>$glass_price);
                //  print_r($data);
                $this->order_model->insert_order_items($data);
            }


        }
        $mesage="";
        $total="";
        $data=$this->cart_model->get_cart($user_id);
        foreach($data as $cartvalues)
        {
            $text = "Image ID:$cartvalues->image_id \n";
            $text .= "Print Type:$cartvalues->image_print_type \n";
            $text .= "Date Time:$cartvalues->date_time \n";
            $text .= "Frame:$cartvalues->frame \n ";
            $text .= "Mount:$cartvalues->mount \n";
            $text .= "Price:$cartvalues->price \n ";
            $text .= "Image Size:$cartvalues->image_size \n ";
            $text .= "Image Name:$cartvalues->image_name \n ";
            $mesage  = $mesage.''.$text."'\n'";
            $total= $total+$cartvalues->price;
        }
        $data1=$this->frontend_model->get_user_details($user_id);
        $email=$data1->email_id;

        $subject="  Order Details of $email";
        $this->email->from('info@wallsnart.com');
        $this->email->to('shalini@wallsnart.com', 'Wallsnart');

        $this->email->subject($subject);
        $this->email->message('Hi'."\n"."\n"
            .'Thank You For Shopping on WallsnArt.'
            ."\n"."\n"
            .'Please find you Order Details Below'
            ."\n"
            ."$mesage"
            ."\n"
            ."Total Price :$total Rs"
            ."\n"."\n"
            .'WallsnArt Team'
            ."\n"
            .'www.wallsnart.in'
            ."\n"."\n"."\n"
            .'This is an automatically generated email. Please do not reply');
        $this->email->send();
        $this->order_model->delete_cart_values($user_id);
        redirect('cart/cart_view');

       // $this->load->view('frontend/header');
        //$this->load->view('frontend/order_place');
        //$this->load->view('frontend/footer');

    }
    public function manage_orders()
    {
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_admin');
        $this->load->view('backend/footer');
    }
    public function order_search()
    {
        if($this->session->userdata('userid'))
    {
        if($this->input->post('search'))
        {
            $customer_name=$this->input->post('cust_name');
            $order_id=$this->input->post('order_id');
            $region=$this->input->post('region');
            $status=$this->input->post('order_status');
            $data['order']=$this->order_model->search_order($customer_name,$order_id,$region,$status);
            $data['links']="";
            $data['total_records']=count($data['order']);
        }
        else
        {
            $config['base_url'] = base_url().'index.php/orders/order_search';
            $config['total_rows'] = $this->order_model->record_count_order();
            $config['per_page'] = 4;
            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
            $data['order']=$this->order_model->get_order_pagination($config['per_page'],$page);
            $data['links']= $this->pagination->create_links();
            $data['total_records']=$this->order_model->record_count_order();
        }
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_admin',$data);
        $this->load->view('backend/footer');
    }
    else{redirect('backend/index');}
    }

    public function view_studio()
    {  $order_id=$this->uri->segment(3);
        $data['order_details']=$this->order_model->get_order_details($order_id);
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_studio',$data);
        $this->load->view('backend/footer');
    }
    public function view_printer()
    {$order_id=$this->uri->segment(3);
        $data['order_details']=$this->order_model->get_order_details($order_id);
        $data['printer_details']=$this->order_model->get_printer_details();
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_printer',$data);
        $this->load->view('backend/footer');
    }
    public function view_framer()
    {
        $order_id=$this->uri->segment(3);
        $data['order_details']=$this->order_model->get_order_details($order_id);
        $data['framer_details']=$this->order_model->get_framer_details();
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_framer',$data);
        $this->load->view('backend/footer');
    }
    public function view_courier()
{
    $order_id=$this->uri->segment(3);
    $data['order_details']=$this->order_model->get_order_details($order_id);
    $data['courier_details']=$this->order_model->get_courier_details();
    $this->load->view('backend/dashboard_header');
    $this->load->view('backend/orders/order_courier',$data);
    $this->load->view('backend/footer');
}
    public function view_packager()
    {
        $order_id=$this->uri->segment(3);
        $data['order_details']=$this->order_model->get_order_details($order_id);
        $data['packager_details']=$this->order_model->get_packager_details();
        $this->load->view('backend/dashboard_header');
        $this->load->view('backend/orders/order_packager',$data);
        $this->load->view('backend/footer');
    }
    public function get_printer()
    {
        $details=$this->order_model->get_printer_byid($this->input->post('id'));
        print( $details->vender_contact_person_name);
    }

    public function update_studio_status()
    {
        $order_id = $this->uri->segment(3);
        $data=array('order_id'=>$order_id,'completion_date'=>$this->input->post('completion_date'),'handed_over'=>$this->input->post('handover_person'),'person_incharge'=>$this->input->post('person_incharge'),
            'quality_check'=>$this->input->post('quality_check'),'quality_checker_name'=>$this->input->post('quality_check_incharge'));
        $this->order_model->update_order_status($data);
        $data2=array('order_status'=>1);
        $this->order_model->update_order_details($order_id,$data2);
        redirect('orders/order_search');
    }
    public function update_printer_status()
    {
        $order_id = $this->uri->segment(3);
        $data=array('order_id'=>$order_id,'printer_company_name'=>$this->input->post('printer'),'delivery_date'=>$this->input->post('delivery_date'),'completion_date'=>$this->input->post('completion_date'),'quality_check'=>$this->input->post('quality_check')
        ,'quality_checker_name'=>$this->input->post('quality_checker_name'),'person_incharge'=>$this->input->post('person_incharge'));
        $this->order_model->update_order_printer_status($data);
        $data2=array('order_status'=>2);
        $this->order_model->update_order_details($order_id,$data2);
        redirect('orders/order_search');
    }
    public function update_framer_status()
    {
        $order_id = $this->uri->segment(3);
        $data=array('order_id'=>$order_id,'framer_company_name'=>$this->input->post('company_name'),'delivery_date'=>$this->input->post('delivery_date'),'completion_date'=>$this->input->post('completion_date'),'quality_check'=>$this->input->post('quality_check')
        ,'quality_checker_name'=>$this->input->post('quality_checker_name'),'person_incharge'=>$this->input->post('person_incharge'));
        $this->order_model->update_order_framer_status($data);
        $data2=array('order_status'=>3);
        $this->order_model->update_order_details($order_id,$data2);
        redirect('orders/order_search');
    }
    public function update_packager_status()
    {
        $order_id = $this->uri->segment(3);
        $data=array('order_id'=>$order_id,'packager_company_name'=>$this->input->post('packager_company_name'),'quality_check'=>$this->input->post('quality_check')
        ,'quality_checker_name'=>$this->input->post('quality_checker_name'),'person_incharge'=>$this->input->post('person_incharge'));
        $this->order_model->update_order_packager_status($data);
        $data2=array('order_status'=>4);
        $this->order_model->update_order_details($order_id,$data2);
        redirect('orders/order_search');
    }
    public function update_courier_status()
    {
        $order_id = $this->uri->segment(3);
        $data=array('order_id'=>$order_id,'courier_company_name'=>$this->input->post('courier_company_name'),'quality_check'=>$this->input->post('quality_check')
        ,'quality_checker_name'=>$this->input->post('quality_checker_name'),'person_incharge'=>$this->input->post('person_incharge'),'delivery_date'=>$this->input->post('delivery_date'),'delivery_place'=>$this->input->post('delivery_place'),'dispatch_date'=>$this->input->post('dispatch_date'));
        $this->order_model->update_order_courier_status($data);
        $data2=array('order_status'=>5);
        $this->order_model->update_order_details($order_id,$data2);
        redirect('orders/order_search');
    }

}