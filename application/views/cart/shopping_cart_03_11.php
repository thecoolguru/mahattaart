<?php 
 
//echo  $this->session->userdata('userid');
if($this->session->userdata('userid'))
{
$Obj=new Cart();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 if($this->session->userdata('userid')=='')
{
     header('location:'.base_url().'index.php/frontend/logout');
 }
?>
<?php  //echo $key;
if(!$key){
	$key="flower";
}?>
<?php
              $userName=$this->cart_model->get_userDetails($this->session->userdata('userid'));
             ?>
<div class="main-container">
    	
        <div class="pagination">
        	<span> <a href="<?=base_url()?>index.php/frontend/index">HOME</a> > <span> Check Out</span> </span>
        </div>
    <div style="margin-left: 38%;">
      <?php if(isset($success)){
					echo $success;
}?>

				<?php if($this->session->flashdata('share_message')){print $this->session->flashdata('share_message');}?>
    </div> 
    <br>
        <!-- shopping cart -->
        <div class="shoppingcart">
                	<ul>
                    	<li class="item">Item</li>
                        <li class="des">Description</li>
                        <li class="qua">Detail</li>
                        <li class="qua">Quantity</li>
                        <li class="pri">Price</li>
                    </ul>
                </div>
       <?php //echo $this->session->userdata('userid');
       
       if($this->session->userdata('userid')){ 
		$data=$this->cart_model->get_usercart($this->session->userdata('userid')); 
               //print_r($data);
                $subtotal=0; $i=1;
 
                foreach($data as $image){
                    
                    $row=$this->search_model->get_image_data($image['image_id']); 
                    $size_data = getimagesize("http://www.indiapicture.in/wallsnart/70/".$image['image_name']);
            //print_r($size_data);
                   
            $image_alignment="";
            //  0=>width and 1=>height :::: 4:3->1.3333 and 2:3->0.667 :::: 12,16,24,32,40,44
              $image_width=$size_data[0];
            $image_height=$size_data[1];
                   $newimage_width=$image_width+13;
            if($size_data[0]>$size_data[1])
            {
            $image_alignment="horizontal";
            }else{
            $image_alignment="vertical";
            }
             $image_alignment;
            
                    if($i%2==0)
                    {
                        $classes='bgc-even';
                    }elseif($i%2!=0)
                    {
                        $classes='bgc-odd'; 
                    }
                    //echo $image['image_id'];
                    ?>
        
                <div class="shoppingcart <?=$classes;?>">
                	<ul>
                            
                            <li class="item">
                                <div style="margin:auto;
	background-image: url('<?=base_url()?>uploaded_pdf/new_frames/split_frame/<?php echo $image['frame'];?>');
        background:repeat;
    -moz-background-size: cover;
    -o-background-size: cover;
    display:block;">
   <div style="padding: 5px; 
         background-color:<?php echo $image['mount'];?>; <?php if($image_alignment=="horizontal"){?> width:<?=$newimage_width.'px'?>;<?php }elseif($image_alignment=="vertical"){?>width:<?=$newimage_width.'px'?>;<?php }?>" >
 <div style="padding:2px; background-color:white;
box-shadow:2px 2px 2px black inset;  ">
                <div id="fir1">
                    <div id="topa1">
                        <div id="fir2">
                            <div id="topa2">
                                <img src="http://www.indiapicture.in/wallsnart/70/<?= $image['image_name'];?>" width="<?=$image_width?>;" height="80px;" >
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                  </div>
          </div>
                                
                   
                            </li>
                            <br>
                            <li class="des"><?php echo substr($row->images_description,0,100)?> </li>
                        <li class="des"><h4>
					<strong><?php // print substr($row->images_caption,0,20); ?>
                                            <?php echo $row->images_filename;?></strong>
				</h4>
				<?php $xyz=explode("%20",$image['image_print_type']); $kk=count($xyz);$print_type="";
				for($k=0;$k<$kk;$k++)
				{
					$print_type =$print_type." ".$xyz[$k];
				}echo $print_type;
				?>
				/
				<?php echo $image['image_size'];?>
				 /Frame Id:<?php if($image['frame']=='332x395.jpg'){ echo 'BL';}if($image['frame']=='700 DVR.jpg'){ echo 'BR';}if($image['frame']=='802 BK.jpg' || $image['frame']=='101 Black.jpg' || $image['frame']=='168Black.jpg'){ echo 'BL';}if($image['frame']=='168 White.jpg'){ echo 'WT';}if($image['frame']=='700white.jpg'){ echo 'WT';}?> / Width :<?php echo $image['frame_size'].'Inch';?>
                                 /Color:&nbsp;
                                <?php  if($image['frame']=='332x395.jpg'){ echo 'Black';}if($image['frame']=='700 DVR.jpg'){ echo 'Brown';}if($image['frame']=='802 BK.jpg' || $image['frame']=='101 Black.jpg' || $image['frame']=='168Black.jpg'){ echo 'Black';}if($image['frame']=='168 White.jpg'){ echo 'White';}if($image['frame']=='700white.jpg'){ echo 'White';}?>
                                /Mount Code:<?php if($image['mount']=='white'){ echo 'WTM';}?>/Width:<?php echo $image['mount_size'].'Inch';?>
                                Color:<?php ECHO $image['mount'];?>
                                /Glass Code:<?php ECHO $image['glasses'];?>
				
                        </li>
                        <li class="qua"><a href="#">
                                <input name="f" type="text"  class="qua-inp" id="f<?= $i?>"
                                       value="<?= $image['cart_quantity'];?>"  style="margin-left:30px;"/>
                                </a></li>
                        <li class="pri">Rs.<?=$image['total_amount'];?></li>
                        <li>
                        	<p>
                            	<a href="#" onClick="gift(); getShareGallary(<?php echo $image['image_id']?>);">
                                	Send as a Gift
                                	<img src="<?php echo base_url()?>assets/img/gift.png" class="gift"  />
                                </a>
                                <span class="dblock">
                  <input type="hidden" id="hidid<?=$i?>" value="<?= $image['rowid'];?>" />
                    <input type="hidden" id="hidprice<?=$i?>" value="<?=$data[0]['total_amount']?>" />
<!--	<a href="#" class="edit" onclick="update('<?=$i?>');">Update</a>
            <a href="#" class="edit">View</a>
                                </span>-->
                                <span class="dblock">
            <a href="<?=base_url()?>index.php/cart/Cart_remove/<?=$image['user_id'];?>/<?=$image['cart_id']?>"
               class="remove"style="    width: 19px;
" ><img src="<?=base_url()?>assets/img/remove.png"></span></a>
                                    
                                	
                                </span>
                    		</p>
                        </li>
                    </ul>
                </div>
        
        <?php $i++; $subtotal=$subtotal+$image['total_amount']; 
		}
 
       }else{
       $subtotal=0; $i=1;
                foreach($this->cart->contents() as $image){
			?>

	<ul class="shop-detail-holder">
		<li class="shop-itm"><a href="#"><img
				src="http://www.indiapicture.in/wallsnart/158/<?= $image['name'];?>" />
		</a>
			<div class="shop-itm-detail">
				<h4>
					<strong></strong>
				</h4>
				By | Giclee Print | | Item #: 11787261A <a href="#"
					class="shop-frameit-bt">Frame It</a>
			</div>
		</li>
		<li class="shop-opt"><a href="#" class="shoplnks">Frame It</a> <a
			href="#" class="shoplnks">Mount</a></li>
		<li class="shop-qty"><input name="f" type="text" id="f<?= $i?>"
			value="<?= $image['qty'];?>" /> <input type="hidden"
			id="hidid<?=$i?>" value="<?= $image['rowid'];?>" /><input
			type="hidden" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
			<a href="#" class="shoplnks" onclick="update('<?=$i?>');">Update</a>
			<a
			href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['rowid'];?>/<?= $key;?>"
			class="shoplnks">Remove</a></li>
		<li class="shop-price"><img
			src="<?=base_url()?>assets/images/rupee-img-price.gif" /> <?= $image['subtotal'];?>
		</li>
	</ul>
	<?php 
		}
} ?>         
                
               
<!--               <div id="coupon" class="margin-bottom">Apply Coupon Code : <input name="" type="text" /><input type="button" value="Apply Coupon" class="couponcode" /></div>-->
               <div id="total" class="margin-bottom">
                        <table width="30%" id="mobile-table" cellpadding="0" cellspacing="0">
                          <tr>
                            <td class="data1">Sub Total</td>
                            <td class="data1"><img
			src="<?=base_url()?>assets/images/rupee-img-price.gif" />  <?= $subtotal;?></td>
                          </tr>
                            <tr>
                            <td class="data2">Shipping Charges</td>
                            <td class="data2">Rs. <?php $shppigCarge=100;
                            echo $shppigCarge;?></td>
                          </tr>
<!--                          <tr>
                            <td class="data1">Gift Wrap Charges</td>
                            <td class="data1">Rs. xxxx</td>
                          </tr>-->
                          <tr>
                            <td class="data1">Tax Collected (*) VAT</td>
                            <td class="data1">Rs. <?='5%'?></td>
                          </tr>
                          <tr>
                            <td class="data2">Payable Amount </td>
                            <td class="data2">Rs. <?php  $TexTotal=$subtotal+$shppigCarge;
                               $afterTex=$TexTotal*5/100;
                               echo $subtotal+$afterTex;
                               ?></td>
                          </tr>
                        </table>

						<a href="<?php print base_url();?>index.php/cart/check_out>">Check out</a> <a href="#">Continue Shopping</a>
				</div>
        <!-- shopping cart -->

		</div>
        <!-- checkout -->
        
        
        
		</div>
<form action="<?php print base_url();?>index.php/frontend/share_ShoppingCartlightbox" method="post" name="login_form" id="login_form">
                <div id="black" style="display:none;" onClick="closebox('')">&nbsp;</div>
    <div id="gift" style="display:none;" class="pop-up">
    <a href="#" onClick="closebox()"><img src="<?php echo base_url()?>assets/img/close.png" class="close" /></a>
    <h1>Add A Personal Message</h1>
  
    <input type="hidden" id="shara_gallary_image_id" value="">
    <div id="pop-form">
    <span id="email_next_error" style="color: red"></span><br>
        <input name=""  type="text" id="email_to" placeholder="To" />
        <input name=""  type="text" id="subject" placeholder="Subject" class="" />
        <textarea name="" cols="" id="message" rows="" class=""  placeholder="Message"></textarea>
        <input type="submit" name="send" value="send" class="send" onclick="ShareGalleryValidation();">
    </div>
    <div id="pop-form"><img src="<?php echo base_url()?>assets/img/Git-pop-up.png" /></div>
    <p>Cash on delivery not available on gift wrap orders. Gift packaging slip, invoice and product tags would not include any pricing, discount or payment information<br />
    <br />
    To keep this gift a surprise, please mention your own phone number while filling the shipping details. However, you may receive a call from our delivery partner for coordinating the delivery</p>
    </div>
</form>
<script type="text/javascript">
    function ShareGalleryValidation()
    {
        if($('#email_to').val()=='')
        {
          $('#email_next_error').html('Enter email id');
          $('#email_to').focus();
          return false;
        }   
     if($('#subject').val()=='')
        {
          $('#email_next_error').html('Enter subject');
          $('#subject').focus();
          return false;
        }  
        
       if($('#message').val()=='')
        {
          $('#email_next_error').html('Enter message');
          $('#message').focus();
          return false;
        }   
        
    }// end funciton
function getShareGallary(images_id)
{
    //alert(images_id);
    document.getElementById('shara_gallary_image_id').value=images_id;
}
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

function Cart_remove(id)
{
    var user_id=document.getElementById('user_id').value;
        
    $.ajax({
             type: "POST",
	     url: "<?=base_url()?>index.php/frontend/frameit_addtocart",
             data: "user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mat1_color+"&mat1_size="+mat1_size+"&frame_color="+frame_color+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price,
             success:function(data)  
             {    
                 alert(data);
                
              }
         });
}
function checkValidateSelect1()
{
    
//     if($('#name').val()=='' || $('#pincode').val()=='' || $('#address').val()=='' || $('#city').val()=='' || $('#state').val()=='' || $('#phone').val()=='')
//     {
//         document.getElementById('field_blank').innerHTML="Fill the blank field";
//         return false;
//     }else{ 
//    drop('slidedrop1','select1');
//     }
     if(document.getElementById('name').value=='')
     {
      document.getElementById('name').style.border = "1px solid #ff0000";
      document.getElementById('name').focus();
      return false;
     }else
     if(document.getElementById('pincode').value=='')
     {
         
      document.getElementById('pincode').style.border = "1px solid #ff0000";
      document.getElementById('pincode').focus();
      document.getElementById('name').style.border = "";
      return false;
     }else
     if(document.getElementById('address').value=='')
     {
      document.getElementById('address').style.border = "1px solid #ff0000";
      document.getElementById('address').focus();
      document.getElementById('pincode').style.border = "";
      return false;
     }else
         if(document.getElementById('city').value=='')
     {
      document.getElementById('city').style.border = "1px solid #ff0000";
      document.getElementById('city').focus();
       document.getElementById('address').style.border = "";
      return false;
     }else
         if(document.getElementById('state').value=='')
     {
      document.getElementById('state').style.border = "1px solid #ff0000";
      document.getElementById('state').focus();
       document.getElementById('city').style.border = "";
      return false;
     }else
         if(document.getElementById('phone').value=='')
     {
      document.getElementById('phone').style.border = "1px solid #ff0000";
      document.getElementById('phone').focus();
      document.getElementById('state').style.border = "";
      return false;
     }else
     {
         document.getElementById('phone').style.border = "";
        drop('slidedrop1','select1');
         return true;
     }
     
     
}// end function ...

	
function changeview(id)
{
	
	if(id==1)
	{
		$('#tab2').hide();
		$('#tab1').show();
	}
	else if(id==2)
	{
		$('#tab2').show();
		$('#tab1').hide();
		
	}
	else
	{
		$('#tab1').hide();
		$('#tab2').hide();
		$('#retrievepw').show();
	}
	
}
	

</script>