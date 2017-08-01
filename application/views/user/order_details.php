<script type="text/javascript">
			$(document).ready(function() {

				//syntax highlighter
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();

				//accordion
				$('h3.accordion').accordion({
					defaultOpen: 'body-section1',
					cookieName: 'accordion_nav',
					speed: 'slow',
					animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) { //replace the standard slideDown with custom function
						elem.next().slideFadeToggle(opts.speed);
					}
				});
	

				//custom animation for open/close
				$.fn.slideFadeToggle = function(speed, easing, callback) {
					return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
				};

			});
		</script>

    <script>
		$(document).ready(function(){

		$("#form1").submit(function(){	
		var passw=$('#pwd').val();
		var repassw=$('#conpwd').val();
		if($('#pwd').val()=="")
		{
			$('#pwd_error').html("Please Enter The Password");
			return false;
		}
		else if($('#conpwd').val()=="")
		{   
			$('#pwd_error').html("");
		    $('#conpwd_error').html("Please Re Enter The Password");
		return false;
	     }
		else if(passw!=repassw)
	     {    $('#pwd_error').html("");
	          $('#conpwd_error').html("");
	           $('#conpwd_error').html("Please Re Enter The Same Password");
	            return false;
		}
		else if($('#fname').val()=="")
		{ 
			    $('#pwd_error').html(""); 
				$('#conpwd_error').html("");
			    $('#fname_error').html("Please Enter The First Name");
			            return false;
				}
		      else if($('#phone').val().length<'10')
				{
					$('#pwd_error').html(""); 
					$('#conpwd_error').html("");
				    $('#fname_error').html("");
				    $('#phone_error').html("Please Enter 10 digit Mobile No.");
				    return false;
				}
		
	});

		
	
			//Examples of how to assign the ColorBox event to elements
			
			$(".loginlogout").colorbox({width:"308px", height:"380px", iframe:true});

			
		});
                
                
           function numbersonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if (unicode<48||unicode>57) //if not a number
		return false //disable key press
		}
	}		
	     
</script>
<div class="container">
<div class="row">
        <!-- art style -->
        <div class="art-style col-md-12">
        <div class="pagination">
 <span> <a href="<?php print base_url();?>index.php">HOME</a> > My Account > <span> Profile</span> </span>
        </div>
        <div class="row">
        	
            <!-- aside -->
            <aside class="left-panel-page col-md-2 col-xs-3">
            	<p>Let Us Help</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/contact">Contact us</a></li>
                        <li><a href="<?=base_url()?>frontend/faq">FAQ's</a></li>
                        <li><a href="#">Ordering</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                    </ul>
                </div>

                <p>My Account</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/contact">My Profile</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="<?=base_url()?>user/order_history">Order History</a></li>
                    </ul>
                </div>
                
                <p>Mahatta art</p>
            	<div class="list">
                	<ul>
                    	<li><a href="<?=base_url()?>frontend/about">The Company</a></li>
<!--                        <li><a href="<?=base_url()?>frontend/media_center">Media Center</a></li>-->
                        <li><a href="<?=base_url()?>frontend/career">Careers</a></li>
                        <li><a href="<?=base_url()?>frontend/partner">Partners</a></li>
                    </ul>
                </div>
                
            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page col-md-10 col-xs-9">
            	
                <!--  Art Movements -->
                	<div class="art-movements">
                        <div class="art-inner">
                            <p>Order History</p>
                            <img src="<?php print base_url();?>assets/img/profile.jpg" class="img-responsive">
                        </div>
                    </div>
					
            
            <!-- right panel -->
            
                
                
                <div class="row">
<div class="col-md-12">
<table class="table table-striped orderhistroywrap">
    <thead>
        <tr style=" background-color:#d4d4d4">
            <th>Product Id</th>
            <th>Order ID</th>
            <th>File Name</th>
            <th>Product Image</th>
            <th>Status</th>
            <th>AWB No./Courier Partner(Useful for tracking.)</th>
        </tr>
    </thead>
    <tbody>
                 <?php 
				 //print_r($order_idd);
				// $orders=$this->frontend_model->get_tbl_order_details();
				// print_r($orders);
				 foreach($order_idd as $order_id){
				 $sr_id=$order_id->sr_id;
				 $invoice_id=$order_id->invoice_id;
				 $xyz=$this->user_model->get_tracking_id($sr_id,$invoice_id);
				 //print_r($xyz);
				 $file_name=$order_id->sku_id;
 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$file_name&page=1&per_page=1";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r=json_decode($search_data_file,TRUE);
//print_r($search_data_r);
$collection_id=$search_data_r['results'][0]['image_collection_id'];
$image_id=$search_data_r['results'][0]['image_id'];

				 ?>
        <tr>
            <td><?=$order_id->sr_id;?></td>
            <td><?=$order_id->invoice_id;?></td>
            <td><?=$order_id->sku_id;?></td>
            <td style="background:rgba(0, 0, 0, 0) url('<?=base_url()?>images/uploaded_pdf/mount/<?=$order_id->mount_color;?>.jpg') no-repeat scroll 0 0 / cover ; border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/<?=$order_id->frame_color;?>.jpg') 10 10 10 10 round round; width:110px" class="mainhor"><a href="<?=base_url()?>search/image_detail/<?=$file_name?>/<?=$image_id?>/<?=$collection_id?>"><img src="http://static.mahattaart.com/398/<?=$order_id->sku_id;?>"width="100%" /></a></td>
            <td class="odd"><?=$order_id->updated_status;?></td>
            <td>
				<?php 
                foreach($xyz as $trk_id){
                //$trk_id->sub_tracking_id;
                ?><p><?=$trk_id->tracking_id;?></p><br> <?php
                }
                ?>
            </td>
        </tr>
                        <?php
                        }
                        ?>
    </tbody>
</table>
</div>
</div>
                <!--  Art Movements -->
 
            </div>
            <!-- right panel -->
            
        </div>
        </div>
        <!-- art style -->
        
    </div>
</div>
    <!-- container -->
    
    
    <!-- footer -->
 <style>
.mainhor {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  
  border-color: transparent;
 
  border-style: solid;
  border-width: 10px;
  padding: 10px;
}

 </style>
