<link rel="stylesheet" href="<?=base_url()?>/assets/css/light-box-model.css" type="text/css"/>
<?php 
//phpinfo();
if($this->session->userdata('userid'))
{
$Obj=new Cart();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<?php  //echo $key;
if(!$key){
	$key="flower";
}?>
<?php
              $userName=$this->cart_model->get_userDetails($this->session->userdata('userid'));
             ?>
	<style>
.mainhor {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: transparent;
  border-style: solid;
  border-width: 15px;
  padding: 10px;
}
.detail table tr:first-child {
	background: #f9f9f9 !important;
}   
	</style>		
    
    <style>
.uploader_popup_header{
	background-color: #f1f1f1;
	height: 30px;
	position: relative;
	padding: 0 10px;
}

#uploader_popup_goofy_a {
	display: block;
	font-family: Arial;
	position: absolute;
	width: 210px;
	z-index: 10000012;
	background: #fff;
	box-shadow: 3px 1px 5px #888;
	right: -78px;
	bottom: 141px;
	right:0px
}

.uploader_popup_header > h2 {
	font-size: 22px;
	font-weight: bold;
	text-transform: uppercase;
	margin: 0;
	font-family: 'BebasNeueRegular' !important;
	padding-top: 2px;
}

.uploader_popup_upload-icon > img {
border: medium none;
bottom: 0;
box-shadow: none;
box-sizing: border-box;
left: 0;
margin: 40px 0 10px;
position: relative;
right: 0;
top: 0;
}
.popup-default-message > h2 {
color: #ef9223;
font-size: 20px;
line-height: 18px;
cursor:pointer;
padding-bottom:10px
}
.popup-default-message > p, .popup-default-footer > p {
color: #888;
font-size: 12px;
}
.popup-default-message > p {
cursor:pointer
}

#goofy_a > div {
padding: 10px;
}
.uploader_popup_upload-icon {
	height: 260px;
	margin-top: 10px;
	overflow: auto;
	position: relative;
	margin-bottom: 10px;
}
#imgInp {
background: white none repeat scroll 0 0;
cursor: inherit;
display: block;
font-size: 100px;
height: 100px;
left: 50%;
margin-left: -50px;
margin-top: -50px;
opacity: 0;
position: absolute;
top: 50%;
width: 100px;
}
.dz-upload-image {
display: none;
}
.popup-default-footer {
	display: block;
	height: 40px;
	clear: both;
	margin: 10px;
}
a.lightbox-close {
	background: transparent;
	box-sizing: border-box;
	color: black;
	display: block;
	height: 100%;
	position: absolute;
	right: 0;
	text-decoration: none;
	top: 2px;
	width: 30px;
}
a.lightbox-close::before {
	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(45deg);
	width: 1px;
}
a.lightbox-close::after {
	background: black none repeat scroll 0 0;
	content: "";
	display: block;
	height: 25px;
	left: 15px;
	position: absolute;
	top: 0;
	transform: rotate(-45deg);
	width: 1px;
}
</style>

<script>
function price_details(){
		$('#price_detail').show();	
	}
	
	function remove_pricing(){
	$('#uploader_popup_goofy_a').hide();	
	}
</script>
<div class="container">
<div class="row">
    	
        <div class="pagination">
        	<span> <a href="<?=base_url()?>index.php/frontend/index">HOME</a> > <span> Check Out</span> </span>
        </div>
        
        <!-- checkout -->
        <div class="checkout">
        	<div class="checkout-l-c col-md-7 col-sm-7 col-xs-12">
            <div id="uploader_popup_goofy_a" style="display: none;">
                    <div class="uploader_popup_header">
                    <h2 class="text-center">Promo Codes</h2>
                    <a class="lightbox-close" href="" onclick="remove_pricing(); return false;"></a>
                    </div>
					<?php
					
					foreach($tbl_clearence as $clearence_dets){
					//print_r($clearence_dets);



					if($clearence_dets->active=='1'){
					$validation="Apply";
					}else{
					$validation="Not Aplicable";
					}
					
					?>
					
                    <div class="frame-it-pricing" style="padding: 10px;">
					
                        <div class="row">
                            <div class="frame-it-content">
                                <div class="col-md-6 col-sm-6 text-left">
                                	<strong><?php echo $clearence_dets->offer_code; ?></strong>
                                </div>
                                <div class="col-md-6 col-sm-6 text-right">
                                	<strong <?php if($validation=='Apply'){?>onclick="appply_promo_code('<?=$clearence_dets->sr_no?>','<?=$clearence_dets->offer_precentage?>','<?=$clearence_dets->offer_code?>')"<?php } ?> id="apply_text<?=$clearence_dets->sr_no?>"><?php echo $validation; ?> </strong>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php  }?>
                </div>
            	<p>Shipping Information <a id="select" href="javascript:void(0)" onClick="drop('slidedrop','select')" class="drop"><i class="ci"></i></a></p>
                
                <div style="display:block;" id="slidedrop">
                
                
                    <div class="checkout-form" id="">
                        <br>
                        <span id="field_blank" style=" margin-left: 177px;  color: red"></span>
                	<form method="post">
                    	<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" value="<?php echo ucwords($userName->first_name.' '.$userName->last_name);?>" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="c_name" value="<?=$userName->company_name;?>" id="company_name"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">GST NO.</label>
                            <div class="col-sm-9">
                                <input type="text" name="c_gst_no" value="<?=$userName->gst_no;?>" id="c_gst_no"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">PAN NO.</label>
                            <div class="col-sm-9">
                                <input type="text" name="c_pan_no" value="<?=$userName->pan_no;?>" id="c_pan_no"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea name="address" id="address" class="form-control"><?=$userName->address;?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                            <select name="state" id="state" class="form-control">
                                <option value="">------------Select State------------</option>

                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option <?php if($userName->state=='Daman and Diu'){?> selected=""<?php }?> value="Daman and Diu">Daman and Diu</option>
                                <option <?php if($userName->state=='delhi'){?> selected=""<?php }?> value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option <?php if($userName->state!=""){echo 'selected="selected"';} ?> value="West Bengal"><?=$userName->state?></option>
                              </select>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" name="city" id="city" value="<?=$userName->city;?>" class="form-control" />
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Pincode</label>
                            <div class="col-sm-9">
                                <input type="text" name="pincode" id="pincode" maxlength="6" onkeypress="return numbersonly(event)" value="<?=$userName->zip_code;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" id="phone" name="phone" maxlength="10" onkeypress="return numbersonly(event)" value="<?=$userName->contact;?>" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Email Receipt to</label>
                            <div class="col-sm-9">
                              <input id="email_reciept" name="email_reciept" value="<?=$userName->email_reciept;?>" class="form-control"   type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                            <label>What is the purpose of this purchase? (optional) </label>
                            <label class=""> <input class="purpose" onclick="purpose(this.value);" name="sign" value="Personal/Home" type="radio"> Personal/Home </label>
                            <label class=""> <input class="purpose" onclick="purpose(this.value);" value="Business/Company" name="sign" type="radio">  Business/Company </label> 
                            </div>
                        </div>
						<input type="hidden" value="" id="getpurpose" />
						<input type="hidden" value="" id="setaddress" />
                    </form>
                </div>
                
                <script>
			    function BillingAdress(vvv)
				 	{
					//alert('vvv')
					$('#validateaddress').hide();
						var radios = document.getElementsByName('sameaddress');
						
							for (var i = 0, length = radios.length; i < length; i++) {
							if (radios[i].checked) {
							
							  if(radios[i].value=='yes')
							  	{
								document.getElementById('another_billingaddress').style.display='none';
								}else
								if(radios[i].value=='no')
							  	{
								document.getElementById('another_billingaddress').style.display='block';
								}
								break;
							}
						}// loop
					 
					 $('#setaddress').val(vvv);
					}// end function
				function purpose(v){
				
				$('#getpurpose').val(v);
				};
				
				</script>
                <script type="text/javascript" language="javascript">
				 
				</script>
				<?php
				//$shipping_address=$this->frontend_model->get_order_details();
				//print_r($shipping_address);
				?>
                <div class="checkout-billing">
                	<p>
                    	<span class="span">Billing Address </span>
                        <span>Same as Shipping Address</span>
                        <span><input type="radio" name="sameaddress"  onclick="BillingAdress(this.value);" id="" class="sameaddress" value="yes"></span>
                        <span>YES</span>
                        <span><input type="radio" name="sameaddress"  id="" onClick="return BillingAdress(this.value)" class="sameaddress" value="no"></span>
                        <span>NO</span>
						<p id="validateaddress"></p>
<!--                        <span><a href="#" class="btn-c">Continue</a></span>-->
                    </p>
                </div>
                <div class="checkout-form" id="another_billingaddress" style="display:none;">
                        <br>
                        <span id="field_blank" style=" margin-left: 177px;  color: red"></span>
                	<form method="post">
                    	<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="s_name" value="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="s_c_name" id="s_c_name"  class="form-control" />
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">GST NO.</label>
                            <div class="col-sm-9">
                                <input type="text" name="s_c_gst_no" value="" id="s_c_gst_no"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">PAN NO.</label>
                            <div class="col-sm-9">
                                <input type="text" name="s_c_pan_no" value="" id="s_c_pan_no"  class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                            <textarea id="s_address" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                            <select name="state" id="s_state" class="form-control">
                                          <option value="">------------Select State------------</option>
                                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                          <option value="Assam">Assam</option>
                                          <option value="Bihar">Bihar</option>
                                          <option value="Chandigarh">Chandigarh</option>
                                          <option value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                          <option <?php if($userName->state=='Daman and Diu'){?> selected=""<?php }?> value="Daman and Diu">Daman and Diu</option>
                                          <option <?php if($userName->state=='delhi'){?> selected=""<?php }?> value="Delhi">Delhi</option>
                                          <option value="Goa">Goa</option>
                                          <option value="Gujarat">Gujarat</option>
                                          <option value="Haryana">Haryana</option>
                                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                          <option value="Jharkhand">Jharkhand</option>
                                          <option value="Karnataka">Karnataka</option>
                                          <option value="Kerala">Kerala</option>
                                          <option value="Lakshadweep">Lakshadweep</option>
                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                          <option value="Maharashtra">Maharashtra</option>
                                          <option value="Manipur">Manipur</option>
                                          <option value="Meghalaya">Meghalaya</option>
                                          <option value="Mizoram">Mizoram</option>
                                          <option value="Nagaland">Nagaland</option>
                                          <option value="Orissa">Orissa</option>
                                          <option value="Pondicherry">Pondicherry</option>
                                          <option value="Punjab">Punjab</option>
                                          <option value="Rajasthan">Rajasthan</option>
                                          <option value="Sikkim">Sikkim</option>
                                          <option value="Tamil Nadu">Tamil Nadu</option>
                                          <option value="Tripura">Tripura</option>
                                          <option value="Uttaranchal">Uttaranchal</option>
                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                          <option value="West Bengal">West Bengal</option>
										 
										  
                                          </select>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" name="city" id="s_city" value="" class="form-control" />
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Pincode</label>
                            <div class="col-sm-9">
                                <input type="text" name="pincode" id="s_pincode" maxlength="6" onkeypress="return numbersonly(event)" value="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" id="s_phone" name="phone" maxlength="10" onkeypress="return numbersonly(event)" value="" class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="checkout-billing">
				<p style="text-align:center" id="errors_foform"></p>
                	<p class="tac">
		
			
						<a href="javascript:" class="savencoti-btn" onclick="return checkValidateSelect1();">Save & Continue</a>
		
					</p>
                </div>
                
                </div>
               
                <div class="paymet">
                	<p>Order Details <a id="select1" href="javascript:void(0)" onClick="drop('slidedrop1','select1')" class="drop disablofstep"><i id="disablefordetails" class="ci"></i></a></p>
                    <div class="paymet01" style="display:none;" id="slidedrop1">
                        
               	
                            <div class="clr"></div>
                            <div class="detail">
							
                            <div class="row">
		 <div id="no-more-tables">
                           <table class="col-md-12 table-bordered table-striped table-condensed cf">
                	<thead class="cf">
                        <tr>
                            <th>S.No.</th>
                            <th>Item</th>
                            <th>Quantity</th>
							<th>Price</th>
							<th>Tax(%)</th>
							<th>Tax Amt.</th>
                            <th >Total Price</th>
						</tr>
                    </thead>
				<tbody>
					</tr>
                        <?php if($this->session->userdata('userid')){ 
					    $grand_total=$sub_total=$total_tax_amt=0;
						$qty_update_tbl=$_REQUEST['qty_update'];
		                $data=$this->cart_model->get_usercart($this->session->userdata('userid'));     $subtotal=0; $i=1;$sr=1;
		                    $k = 0;
                        foreach($data as $image){
                            if($cart_data[$k] == 0){
                           $source = "http://static.mahattaart.com/158x158/media/".$image['image_name'];    
                            }else{
                           $url = base_url();
                           $source = $url."application/views/frontend/upload_images/".$image['image_name'];
                        }
                        $k++;?>
                            <tr>
							  <td><?=$sr?></td>
                                  <td class="showforprintonly">
                                      <?php if($image['frame_or_print']==1){ ?>
            <img src="<?php echo base_url()?>600/<?= $image['frame_name'];?>" width="70" height="70"/>
                <?php } if($image['frame_color']=='Streched Canvas Gallary Wrap'){?>
                    <style>
                        .container3D {
                        	min-height: 180px;
                        	position: relative;
                        	min-width: 100%;
                        }
                            
                            #cube {
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            -webkit-transform-style: preserve-3d;
                            -moz-transform-style: preserve-3d;
                            -o-transform-style: preserve-3d;
                            transform-style: preserve-3d;
                            -webkit-transform: translateZ( -100px );
                            -moz-transform: translateZ( -100px );
                            -o-transform: translateZ( -100px );
                            transform: translateZ( -100px );
                            }
                            #cube .front {
                            -webkit-transform: translateZ( 100px );
                            -moz-transform: translateZ( 100px );
                            -o-transform: translateZ( 100px );
                            transform: translateZ( 100px );
                            }
                            #cube figure {
                            display: block;
                            position: absolute;
                            }
                            
                            figure {
                            margin: 0;
                            }
                            
                            #cube .right {
                            -webkit-transform: rotateY( 90deg ) translateZ( 100px );
                            -moz-transform: rotateY( 90deg ) translateZ( 100px );
                            -o-transform: rotateY( 90deg ) translateZ( 100px );
                            transform: skewY(45deg) translate(20px,-10px);
                            width: 20px;
                            height: 100%;
                            right: 0px;
                            top: 0;
                            }
                            
                            #cube .right {
                            background: #000;
                            }
                            #cube .bottom {
                            -webkit-transform: rotateX( -90deg ) translateZ( 100px );
                            -moz-transform: rotateX( -90deg ) translateZ( 100px );
                            -o-transform: rotateX( -90deg ) translateZ( 100px );
                            transform: skewX(45deg) translate(-11px,21px);
                            height: 20px;
                            width: 100%;
                            bottom: 1px;
                            }
                            #cube .bottom {
                            background: #ddd;
                            }
                        </style>
                            <section class="container3D">
                                <div id="cube" class=" ">
                                    <figure class="front">
                                        <img src="<?= $source ?>" class="img-responsive" />
                                        <figure class="right"></figure>
                                        <figure class="bottom"></figure>
                                    </figure>
                                </div>
                            </section>
						<?php }else { ?>
                 <img src="<?= $source?>" class="img-responsive mainhor" style="border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/<?=$image['frame_color']?>.jpg') 30 30 30 30 round round;background:url('<?=base_url()?>images/uploaded_pdf/mount/<?=$image['mount_color']?>.jpg') no-repeat scroll 0 0 / cover;" />
                <?php }?>
                </td>
                                
                <td><span id="qty_btn<?=$image['cart_id']?>"><?= $image['qty'];?></span><button style="margin-left:10px;" id="edit_button<?=$image['cart_id']?>" onclick="edit_qty(<?=$image['cart_id']?>);"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
				<div id="divfor_update<?=$image['cart_id']?>" style="display:none;">
				<form class="form-horizontal">
        		    <div class="form-group">
                        <div class="col-xs-10">
        				   <input type="text" style="width:30px" class="by_keyup_update" maxlength="4" name="qty_update" value="<?=$image['qty']?>" id="qty_update<?=$image['cart_id']?>" >
                   </div>
                </div>
                    <div class="form-group row">
                        <button onclick="choose_qty('<?=$image['cart_id']?>','<?=$image['image_name']?>','<?=$image['image_size']?>','<?=$image['image_print_type']?>','<?=$image['price']?>','<?=$image['qty']?>','<?=$image['frame_size']?>','<?=$image['frame_color']?>','<?=$image['mount_color']?>','<?=$image['glass_type']?>');" type="submit" class=""><span class="glyphicon glyphicon-refresh "></span>Update</button>
                    <button type="submit" class=""><span class="	glyphicon glyphicon-remove"></span>Cancel</button>
                    </div>
                </form>
			</div>
		</td>
    <td>
    <?php if($image['updated_price']){?>
        <img src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?php echo $price_updt_ornot=$image['updated_price'];?>
            <?php } else{?>
        <img src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?php echo $price_updt_ornot=$image['price'];?>
        <?php }?>
    </td>
		<?php $cart_id=$image['cart_id'];?>
				<td><?php echo $tax_prctg=$image['tax_goods'];?></td>
				<td><?php $tax_amt=(($price_updt_ornot*$tax_prctg)/100);
				echo $tax_amt_fnl=round($tax_amt,2);?></td>
				<td><?php echo $total_price_per=$tax_amt_fnl+$price_updt_ornot;?></td>
            </tr>
                <?php 
				 $sub_total=$sub_total + $price_updt_ornot;
				 $total_tax_amt=$total_tax_amt + $tax_amt_fnl;
				 $grand_total=$grand_total+$total_price_per;
				 if($qty_update_tbl!=''){
				 $this->cart_model->update_serail_noforcart($this->session->userdata('userid'),$sr,$cart_id,$tax_prctg,$tax_amt_fnl,$total_price_per);
				 }
				$sr++; } } ?>
				</tbody>
                            </table>
                            </div>
							</div>
                            </div>
							
                            <script>
							
							
	function sameaddress(val){ 
	$('#setaddress').val(val);
     	
	}
	
							function edit_qty(x){
	//alert(x);
	by_keyup_update(x);
	$('#qty_btn'+x).hide();
	$('#edit_button'+x).hide();
	$('#divfor_update'+x).show();
	
	}
	function choose_qty(sn,filenam,imgsize,papersurface,imgprice,mainqty,frame_s,frame_name,mount_name,glass){
	//alert(mainqty);
	//alert('coose');
	var v=$('#qty_update'+sn).val();
	//alert(v);
	$.ajax({
	      type:'post',
		  url:'<?=base_url()?>index.php/frontend/update_qty_for_cart',
		  data:'filenam='+filenam+'&imgsize='+imgsize+'&papersurface='+papersurface+'&v='+v+'&imgprice='+imgprice+'&mainqty='+mainqty+'&frame_s='+frame_s+'&frame_name='+frame_name+'&mount_name='+mount_name+'&glass='+glass,
		  success: function(response){
		 // alert(response);
		 
		  
		  }
	
	});
	
	}
	function apply_promo(){
	
	//alert('jjj')
	$('#uploader_popup_goofy_a').show();
	}
						</script>
						 
                            <div class="discount">
                            
                            
                            <table width="100%" cellpadding="10px;" cellspacing="0">

                                
                              <tr>
                                <td>Sub Total Amount</td>
                                <td><img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <span id="sub_total_amount"><?= $sub_total;?></span>&nbsp;&nbsp;<span id="final_amount_after_discount"></span></td>
                              </tr>
							   
							   <tr>
							   
							   <tr id="discount_row" style="color:red;display:none">
                                <td>Promo Offer<br>
								FLAT &nbsp;<span id="promo_code"></span>%
								</td>
                                <td><img src="<?=base_url()?>assets/images/rupee-img-price.gif" />&nbsp;<span id="discounted_amount"></span></td>
                              </tr>
                                                          <tr>
                                <td>GST Tax Amount</td>
                                <td><img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <span id="total_gst_amount"><?= $total_tax_amt;?></span></td>
                              </tr>
							   
							   <tr>
							   
                                <td>Apply Coupon Code</td>
                                <td><input type="text" name="apply_coupon"  id="apply_coupon" value=""><button class="" onclick="apply_promo();">Apply Codes</button>
                                </td>
                              </tr>
							   <tr>
							   
                                <td>Grand Total Amount</td>
                                <td id=""><img src="<?=base_url()?>assets/images/rupee-img-price.gif" /><span class="grand_total_amt"> <?php
					 echo $grand_total;
					 ?></span></td>
                              </tr>
							 
                            </table>
							<script>
							function appply_promo_code(sr_no,offer_prctg,offer_code){
							//alert(sr_no);
							if(sr_no=='' || offer_prctg=='' || offer_code=='' ){
							return false;
							}
							if(sr_no!='none' || offer_prctg!='none' || offer_code!='none'){
							var sub_total_amount=$('#sub_total_amount').html();
							$('#discount_row').show();
							var discounted_amount=((parseFloat(sub_total_amount)*parseFloat(offer_prctg))/100).toFixed(2);
							$('#discounted_amount').html(discounted_amount);
							var total_gst_amount=$('#total_gst_amount').html();
														var final_amount_afteroffer=Math.round(parseFloat(sub_total_amount)-parseFloat(discounted_amount)+parseFloat(total_gst_amount)).toFixed(2);
							$('#sub_total_amount').css("text-decoration","line-through");
							$('#final_amount_after_discount').html(Math.round((parseFloat(sub_total_amount)-parseFloat(discounted_amount).toFixed(2))));
							$('#final_amount_after_discount').css("color","red");
							//alert(final_amount_afteroffer) .css("color","red")
							$('#promo_code').html(offer_prctg);
							$('#apply_text'+sr_no).html('Applied').css("color","red");
							$('#apply_coupon').val(offer_code);
							$('.grand_total_amt').html(final_amount_afteroffer);
							$('.grand_total_amt').val(final_amount_afteroffer);
							}
							
							}
							</script>
				        <form  id="payment_action" method="post" action="#" name="payment_ccavenue">
                         
						 <?php
						 //http://mahattaart.com/index.php/cart/CCAvenue_check_out
						 $seven_d_r_no=mt_rand(1000000,9999999);
						 $invoice_id_auto='MAI'.$seven_d_r_no;
						 $six_digit_random_number = mt_rand(100000, 999999);
						 $order_id_auto='MA'.$six_digit_random_number;
	 $result= $this->cart_model->get_cart_user_details($this->session->userdata('userid'));
              
                $billerName= $result[0]->first_name.' '.$result[0]->last_name;
	$redirect_url='http://mahattaart.com/index.php/cart/response';
       $cancel_url='http://mahattaart.com/index.php/cart/cancel_url';  
	?>
	
	<?php
	date_default_timezone_set('Asia/Calcutta');
	 $order_date=date("Y-m-d H:i:s");
	?>
	
	<input type="hidden" name="merchant_id" value="<?php echo '64544'; ?>">
  
 <input type="hiden" name="currency" value="<?php echo 'INR' ?>">
 <input type="hiden" name="amount" class="grand_total_amt" value="<?php echo $grand_total; ?>">
  <input type="hidden" name="order_id" value="<?=$order_id_auto?>">
  <input type="hidden" name="redirect_url" value="<?=$redirect_url?>" />
<input type="hidden" name="cancel_url" value="<?=$cancel_url?>" />
<input type="hidden" name="language" value="en">
<input type="hidden" name="billing_name" id="billing_name" value="" />
<input type="hidden" name="billing_address" id="billing_address" value="" />
<input type="hidden" name="billing_city" id="billing_city" value="" />
<input type="hidden" name="billing_state" id="billing_state" value="" />
<input type="hidden" name="billing_zip" id="billing_zip" value="" />
<input type="hidden" name="billing_country"  id="billing_country" value="India" />
<input type="hidden" name="billing_tel" id="billing_tel" value="" />
<input type="hidden" name="billing_email" id="billing_email" value="<?=$result[0]->email_id?>" />
<input type="hidden" id="delivery_name" name="delivery_name" value="" />
<input type="hidden" id="delivery_address" name="delivery_address" value="" />
<input type="hidden" id="delivery_city" name="delivery_city" value="" />
<input type="hidden" id="delivery_state" name="delivery_state" value="" />
<input type="hidden" id="delivery_zip" name="delivery_zip" value="" /> 
<input type="hidden" id="delivery_country" name="delivery_country" value="" />
<input type="hidden" id="delivery_tel" name="delivery_tel" value="" />
<input type="hidden" name="merchant_param1" value="<?=$this->session->userdata('userid')?>" />
<input type="hidden" name="merchant_param2" value="<?=$invoice_id_auto;?>" />
<input type="hidden" id="merchant_param3" name="merchant_param3" value="" />
<input type="hidden" id="merchant_param4" name="merchant_param4" value="" />
<input type="hidden" id="merchant_param5" name="merchant_param5" value="" />

<input type="hidden" name="promo_code" value="" />
<input type="hidden" name="tid" value="123" />

  <!--  <input type="submit"  value="Proceed For Payment" onclick="return save_order_id_to_cart('');" class="checout_btn btn btn-info center-block" style="border: none; height:40px; width:auto;margin-top:10px;" />-->
    <div class="col-md-12">
    	<div class="row">
        	<div class="col-md-4">
            	<span style="margin-top: 20px;display: block;">Payment Mode</span>
            </div>
        	<div class="col-md-8" style="margin-top:10px">
    			<input type="submit" class="btn" onclick="return save_order_id_to_cart('cod');" value="COD" style="display: inline-block;/* margin: 20px 0 0 0; *//* padding: 6px 12px; */color: #fff;background: #14479a;text-decoration: none;border: 1px solid #14479a;border-radius: 0;"> 
        		<input type="submit" class="btn" onclick="return save_order_id_to_cart('online');" value="ONLINE" style="display: inline-block;/* margin: 20px 0 0 0; *//* padding: 6px 12px; */color: #fff;background: #14479a;text-decoration: none;border: 1px solid #14479a;margin-left: 28px;border-radius: 0;"> 
    </div>
        </div>

    </div>
    
    
    </form>
							
                            <p class="cartfare">
                                <span class="dblock">
                                 Other ways to  order call us at +91-11418289722 or
								 email us at info@mahattaart.com
                                </span>
                             
						</div>
                         
                    </div>
                    
                    
                    
                </div>
                
            </div>
			
           <!-- <div class="checkout-r-c">
            	<p>Your Shipping Cart</p>
                
                <div class="cart-deatils">
                	<ul>
                    	<li class="item">Item</li>
                        <li class="des">Description</li>
                        <li class="qua">Quantity</li>
                        <li class="pri">Price</li>
                    </ul>
                </div>
                
                <div class="cart-deatils bgc-even">
				<?php if($this->session->userdata('userid')){ 
		$data=$this->cart_model->get_usercart($this->session->userdata('userid')); 
                                    $subtotal=0; $i=1;foreach($data as $image){
		
		
		 $row=$this->search_model->get_image_data($image['image_id']);
             $frame_price = $this->frontend_model->get_frame_data($image['image_id'],$image['user_id']);
      if($image['frame_or_print']==1){ 
	  $price = $frame_price->print_price;}else{$price = $image['price'];}
			?>
                	<ul>
						<li class="item">
						
				<? if($image['frame_or_print']==1){?>
                <img src="<?php echo base_url()?>600/<?= $image['frame_name'];?>" width="auto" height="60" />
            <?  }else {?>
                 <img src="http://static.mahattaart.com/media/<?= $image['image_name'];?>" width="auto" height="30"/>
            <? }?>	
						</li>
						 
                        <li class="des"><?php print substr($row->images_caption,0,15); ?> </li>
						<li class="qua">
			<input name="f" type="text" id="f<?= $i?>" value="<?= $image['cart_quantity'];?>" class="qua-inp" /> 
		<input type="hidden" id="hidid<?=$i?>" value="<?= $image['cart_id'];?>" />
	<input type="hidden" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
						<a href="#" class="shoplnks" onClick="update('<?=$i?>');">Update</a>
<a href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['cart_id'];?>/<?= $key;?>" class="shoplnks">Remove</a>
						</li>
						
                        <li class="pri"><? if($image['updated_price']){?>
            <img
                src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['updated_price'];?>
                <? } else{?>
                <img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['total_amount'];?>
                <? }?></li>
                    </ul>
               
                
                <?php $i++;   if($image['cart_quantity']>1)
            {
            $subtotal=$subtotal+$image['updated_price'];
            }
            else
            {
                $subtotal=$subtotal+$image['total_amount'];
            }
		}
	} else{

		$subtotal=0; $i=1;
		
		foreach($this->cart->contents() as $image){
		
		$row=$this->search_model->get_image_data($image['image_id']);
             $frame_price = $this->frontend_model->get_frame_data($image['image_id'],$image['user_id']);
      if($image['frame_or_print']==1){ $price = $frame_price->print_price;}else{$price = $image['price'];}

			?>
			
						<ul>
                    	<li class="item">
						
				<a href="#"><img
				src="http://static.mahattaart.com/media/<?= $image['name'];?>" />
		</a>
						</li>
                        <li class="des"><?php print substr($row->images_caption,0,15); ?> </li>
						<li class="qua">
						<input name="f" type="text" id="f<?= $i?>"
						value="<?= $image['qty'];?>" class="qua-inp" /> <input type="hidden"
						id="hidid<?=$i?>" value="<?= $image['rowid'];?>" /><input
						type="hidden" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
						<a href="#" class="shoplnks" onClick="update('<?=$i?>');">Update</a>
						<a
						href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['rowid'];?>/<?= $key;?>"
						class="shoplnks">Remove</a></li>
                        <li class="pri"><? if($image['updated_price']){?>
            <img
                src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['updated_price'];?>
                <? } else{?>
                <img
                    src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['price'];?>
                <? }?></li>
                   	 </ul>	
		<?php $i++; $subtotal=$subtotal+$image['subtotal']; 
		}
} ?>	
 </div>		
 
 	
<div class="fareprice">
                	<p class="cartfare">
                    	<span class="fll">Sub Total</span>
                        <span class="flr"><img
			src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $subtotal;?></span>
                    </p>
                   <!-- 
                    <p class="cartfare">
                    	<span class="fll">Shipping Charges</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                    <p class="cartfare">
                    	<span class="fll">Gift Wrap Charges</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                    <p class="cartfare">
                    	<span class="fll">Tax Collected (*)</span>
                        <span class="flr">Rs. xxx</span>
                    </p>
                    
                     <p class="cartfare bgc">
                    	<span class="fll"><strong>Payable Amount</strong></span>
                        <span class="flr"><strong>Rs. 20,0000</strong></span>
                    </p>
                    -->
              </div>
                
            </div></div>
        </div>
        <!-- checkout -->
        
        
        
		</div>
<script>
function save_order_id_to_cart(values){
//alert(values)

if(values=='cod'){
//alert(values)
$('#payment_action').attr('action','<?=base_url()?>cart/payment_by_cod');
}else if(values=='online'){
$('#payment_action').attr('action','http://mahattaart.com/index.php/cart/CCAvenue_check_out');
}}
</script>

<script type="text/javascript">
function update(i)
{  
     var row_id=$('#hidid' +i).val();
	 var price=$('#hidprice' +i).val();
	 var qty=$('#f' +i).val();
	 var search_txt="<?= $key;?>";
	 var url= '<?=base_url()?>index.php/cart/update_cart/' +qty + '/' +row_id +'/' +price + '/' +search_txt;
	 window.location.assign(url);
}
</script>
<script type="text/javascript">
function back()
{  
javascript:window.history.back();
	//var url="<?=base_url()?>index.php/search/search_view?searchtext=<?= $key;?>&search_submit=Search";
         //var url= "<?=base_url()?>index.php/frontend/index";
	//window.location.assign(url);
}

</script>

<script type="text/javascript">
function unhide(divID) {
    var item = document.getElementById(divID);
    if (item) {
        item.className=(item.className=='hidden')?'unhidden':'hidden';
    }
}
function close()
{	
	location.replace('<?=  $_SERVER['PHP_SELF'];?>');
}

function validation_for_forminfo(value){
//alert(value)

document.getElementById(value).style.border = "1px solid #ff0000";
      document.getElementById(value).focus();
	  $('#'+value).keypress(function(){
	  $(this).css('border','');
	  });
	  

}
 $("#pincode").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);
	 
 });
  $("#phone").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);
	 
 });
 $("#s_pincode").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);
	 
 });
  $("#s_phone").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);
	 
 });
 
function checkValidateSelect1()
{    
    var setaddress=$('#setaddress').val();
	
	
    if (setaddress==''){
	$('#validateaddress').html('Please select shipping address').css('color','red');
	return false;
	}
	
      if(document.getElementById('name').value=='')
     {
     validation_for_forminfo('name');
      return false;
     }
	 if(document.getElementById('c_gst_no').value!='' && document.getElementById('c_pan_no').value=='' ){
	  validation_for_forminfo('c_pan_no');
      return false;
	 
	 }
     if(document.getElementById('pincode').value=='')
     {
         
      validation_for_forminfo('pincode');
      return false;
     }
     if(document.getElementById('pincode').value.length<6)
     {
	 validation_for_forminfo('pincode');
		$('#errors_foform').html('Pincode is not valid').css('color','red');
		return false;
     }
     if(document.getElementById('address').value=='')
     {
      validation_for_forminfo('address');
      return false;
     }
         if(document.getElementById('city').value=='')
     {
     validation_for_forminfo('city');
      return false;
     }
         if(document.getElementById('state').value=='')
     {
      validation_for_forminfo('state');
      return false;
     }
         if(document.getElementById('phone').value=='')
     {
     validation_for_forminfo('phone');
      return false;
     }
	 
         if(document.getElementById('phone').value.length<10)
     {
	 validation_for_forminfo('phone');
      $('#errors_foform').html('Contact Number is not valid').css('color','red');
      return false;
     }
	 
         if(document.getElementById('email_reciept').value=='')
     {
      validation_for_forminfo('email_reciept');
      return false;
     }
	 
	 else
     {
	
	 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(document.getElementById('email_reciept').value) ) {
				$('#errors_foform').html('Please enter valid email.').css('color','red');
				validation_for_forminfo('email_reciept');
				return false;
                } 
	
	 var name=$('#name').val();
	 var result=name.split(' ');
	 //alert(result[0]);
	 var firstname=result[0];
	 var lastname=result[1];
	 $('#billing_name').val(firstname+' '+lastname);
	 var company_name=$('#company_name').val();
	 
	  var pincode=$('#pincode').val();
	  $('#billing_zip').val(pincode);
	  var address=$('#address').val();
	  $('#billing_address').val(address);
	  var city=$('#city').val();
	  $('#billing_city').val(city);
	 var state=$('#state').val();
	 $('#billing_state').val(state);
	  var phone=$('#phone').val();
	  $('#billing_tel').val(phone);
	
	  var email_reciept=$('#email_reciept').val();
	  var purpose=$('#getpurpose').val();
	  	///  alert(b_purpose)
	  var sameaddress_no=$('#sameaddress_no').val();
	  var setaddress=$('#setaddress').val();
	  var c_gst_no=$('#c_gst_no').val();
	  var c_pan_no=$('#c_pan_no').val();
	 //alert(setaddress)
	  $.ajax({
	      type:'post',
		  url:'<?=base_url()?>index.php/cart/update_customer',
		  data:'name='+firstname+'&company_name='+company_name+'&pincode='+pincode+'&address='+address+'&city='+city+'&state='+state+'&phone='+phone+'&lastname='+lastname+'&email_reciept='+email_reciept+'&getpurpose='+purpose+'&c_gst_no='+c_gst_no+'&c_pan_no='+c_pan_no,
		  success: function(response){
		//alert(response);
	
		
		  
		  }
	
	});
	  
	  
	
	 if(setaddress=='yes'){
	// alert('yes')
	 $('#delivery_name').val(firstname);
	 $('#merchant_param3').val(company_name);
     $('#delivery_zip').val(pincode);
     $('#delivery_address').val(address);
     $('#delivery_city').val(city);
     $('#delivery_state').val(state);
	  $('#delivery_tel').val(phone);
	  $('#merchant_param4').val(c_gst_no);
	  $('#merchant_param5').val(c_pan_no);
	  
	 }
  if(setaddress=='no'){
// alert('no')
  if(document.getElementById('s_name').value=='')
     {
      validation_for_forminfo('s_name');
      return false;
     }
     if(document.getElementById('s_pincode').value=='')
     {
         
      validation_for_forminfo('s_pincode');
      return false;
     }
     if(document.getElementById('s_address').value=='')
     {
      validation_for_forminfo('s_address');
      return false;
     }
	  if(document.getElementById('s_c_gst_no').value!='' && document.getElementById('s_c_pan_no').value=='' ){
	  validation_for_forminfo('s_c_pan_no');
      return false;
	 
	 }
	 
         if(document.getElementById('s_city').value=='')
     {
     validation_for_forminfo('s_city');
      return false;
     }
         if(document.getElementById('s_state').value=='')
     {
      validation_for_forminfo('s_state');
      return false;
     }
         if(document.getElementById('s_phone').value=='')
     {
     validation_for_forminfo('s_phone');
      return false;
     }
  
  var name=$('#s_name').val();
  $('#delivery_name').val(name);
  
  var s_c_name=$('#s_c_name').val();
  //alert(s_c_name)
  $('#merchant_param3').val(s_c_name);
  var pincode=$('#s_pincode').val();
  $('#delivery_zip').val(pincode);
	  var address=$('#s_address').val();
	  $('#delivery_address').val(address);
	  var city=$('#s_city').val();
	  $('#delivery_city').val(city);
	 var state=$('#s_state').val();
	 $('#delivery_state').val(state);
	  var phone=$('#s_phone').val();
	  $('#delivery_tel').val(phone);
	  var gst_number=$('#s_c_gst_no').val();
	  $('#merchant_param4').val(gst_number);
	   var pan_number=$('#s_c_pan_no').val();
	  $('#merchant_param5').val(pan_number);
	  
	 
  
  }
	/// alert(sameaddress_no);
	 
	
         document.getElementById('phone').style.border = "";
        drop('slidedrop1','select1');
         return true;
     }
      
     
}// end function ...

$(document).ready(function(){
$('#disablefordetails').click(function(){return false;});

});
function by_keyup_update(id_val){
$(".by_keyup_update").keyup(function () { 
//alert(id_val)
   // var id=$('.by_keyup_update').attr('id');
	//alert(id)
    var newValue = $('#qty_update'+id_val).val().replace(/[^1-9]/g,'');
	//	alert(newValue.length)
	
	if(newValue.length>=1){
	//alert('sss')
	var newValue = $('#qty_update'+id_val).val().replace(/[^0-9]/g,'');
	//alert(newValue.length)
	
	}
	
    $('#qty_update'+id_val).val(newValue);
	 
 });
 }
</script>
