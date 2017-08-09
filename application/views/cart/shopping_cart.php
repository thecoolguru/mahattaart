<?php 
//echo  $this->session->userdata('userid');
 $continue_shopping_redirect=$this->session->userdata('continue_shopping');
//echo base_url();
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
			 <style>
			 
#fir{padding:2px; background-color:white;
box-shadow:2px 2px 1px black inset;
}
.cart-removepopupshow span {
  margin-right: 10px;
}
.mainhor {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: transparent;
  
  border-style: solid;
  border-width: 15px;
  padding: 0;
}

.showforprintonly > img {
    box-shadow: -20px 5px 5px #000000;
    transform: perspective(600px) rotateY(12deg);
}   
			 </style>
<div class="container">
    	
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
		<div class="row">
		 <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf">
                	<thead class="cf">
                                                <tr>
                                                                <th>S.No.</th>
                                                                <th>Item</th>
                                                                <th>Description</th>
                                                                <th>Detail</th>
                                                                <th>Quantity</th>
																  <th>Price</th>
																<th>Tax(%)</th>
																<th>Tax Amt.</th>
                                                                <th >Total Price</th>
																  <th>Delete</th>
																
                                                </tr>
                                </thead>
								<tbody>
       <?php //echo $this->session->userdata('userid');
       
       if($this->session->userdata('userid')){ 
		$data=$this->cart_model->get_usercart($this->session->userdata('userid')); 
               //print_r($data);
                $subtotal=0; $i=1;
          $update_srno=$_REQUEST['search'];
		  $qty_update_tbl=$_REQUEST['qty_update'];
		   $sr_no=$data[0]['sr_no'];
		  // print_r($sr_no);
                foreach($data as $image){
                   //  echo $image['cart_id'].'ssss';
                    //$row=$this->search_model->get_image_data($image['image_id']); 
                    $size_data = getimagesize("http://static.mahattaart.com/158/".$image['image_name']);
                   $cart_id=$image['cart_id'];
				  
            $image_alignment="";
              $image_width=$size_data[0];
            $image_height=$size_data[1];
                   $newimage_width=$image_width+13;
            if($size_data[0]>$size_data[1])
            {
            $image_alignment="horizontal";
			$frameborder_width="89px";
            }else{
            $image_alignment="vertical";
			$frameborder_width="65px";
            }
             $image_alignment;
           // print_r($image);
                    if($i%2==0)
                    {
                        $classes='bgc-even';
                    }elseif($i%2!=0)
                    {
                        $classes='bgc-odd'; 
                    }
                    //echo $image['image_id'];
                    ?>
        
               
                	 
                                                <tr>
                            <td> <div><?=$i;?></div></td>
                            <td class="item">
                             <?php   
							 if($image['frame_color']=='Streched Canvas Gallary Wrap'){?>
							 
							 <div class="showforprintonly" id="topa2">
                                <img src="http://static.mahattaart.com/158/<?= $image['image_name'];?>"  />
                             </div>
							 <?php
							 }else{
							 if($image['frame_cost']!=0 && $image['mount_size']!=0){
							 $padding=10;
							 }else{
							 $padding=0;
							 }
							  $file_name=$image['image_name'];
							 ?>  
   <div class="mainhor" style="border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/<?=$image['frame_color']?>.jpg') 30 30 30 30 round round;">
 <div style=" background:url('<?=base_url()?>images/uploaded_pdf/mount/<?=$image['mount_color']?>.jpg') no-repeat scroll 0 0 / cover; padding:<?=$padding?>px">
 <?php
 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$file_name&page=1&per_page=1";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r=json_decode($search_data_file,TRUE);
//print_r($search_data_r);
$collection_id=$search_data_r['results'][0]['image_collection_id'];


 
 ?>
             
                            <div class="" id="topa2">
                               <a href="<?=base_url()?>index.php/search/image_detail/<?=$file_name?>/<?=$image['image_id']?>/<?=$collection_id?>">  <img src="http://static.mahattaart.com/158/<?= $image['image_name'];?>"  /></a>
                                  
                           
                </div>
            </div>
                                  								 
          </div>
		  <?php } ?>
                                
                   
                            </td>
							
                            <br>
                            <td class="des"><?php echo substr($search_data_r['results'][0]['image_description'],0,130)?> </td>
                        <td class="des"><h4>
					<strong><?php // print substr($row->images_caption,0,20); ?>
                                            <?php echo $file_name;?></strong>
				</h4>
				<?php $xyz=explode("%20",$image['image_print_type']); $kk=count($xyz);$print_type="";
				for($k=0;$k<$kk;$k++)
				{
					$print_type =$print_type." ".$xyz[$k];
				}echo $print_type.'<br>';
				//echo $image['image_size'];
				if($image['frame_cost']==0){
				$tax_prctg=12;
				
				?>
				
				Art Print:
				<?php echo $image['image_size'].'(Inch)<br>w/0 Border:'.$image['borderd_image_size'].'<br>';
			     
				  if($image['frame_color']=='Streched Canvas Gallary Wrap'){
				  echo 'Frame Type:  '.$image['frame_color'].'<br>';
				  }
				}
				if($image['frame_cost']!=0){
				$tax_prctg=18;
				?>
				Framed Art Print:<?=$image['framed_image_size'].'(Inch)<br>'?>
				Frame Size:<?=$image['frame_size'].'(Inch)<br>'?>
				 Frame Name:<?=$image['frame_color'].'<br>'?>
                                <?php if($image['mount_size']!=0){?>
                                Mount Size:<?php echo $image['mount_size'].'(Inch)<br>';?>Mount Name:<?=$image                             ['mount_code'].'<br>'?>
                               <?php } ?>
                                Glass:<?php echo $image['glass_type'];}?>
				
                        </td>
                        <td class="qua">
                                <input name="f" type="text" readonly id="p_qty<?=$i?>" class="qua-inp" 
                                       value="<?= $image['qty'];?>"  style="margin-left:30px;border:none;"/>
                                
								
								<button id="edit_button<?=$i?>" onclick="edit_qty(<?=$i?>);"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
								<div id="divfor_update<?=$i?>" style="display:none;">
								<form class="form-horizontal">
								
								
    <div class="form-group">
      
        <div class="col-xs-10">
                               <input type="text" style="width:40px" maxlength="4" name="qty_update" class="by_keyup_update" id="qty_update<?=$i?>" value="<?=$image['qty']?>" >
		                        
        </div>
    </div>
     
    
    <div class="form-group row">
        <button onclick="choose_qty('<?=$i?>','<?=$image['image_name']?>','<?=$image['image_size']?>','<?=$image['image_print_type']?>','<?=$image['price']?>','<?=$image['qty']?>','<?=$image['frame_size']?>','<?=$image['frame_color']?>','<?=$image['mount_color']?>','<?=$image['glass_type']?>');" type="submit" class=""><span class="glyphicon glyphicon-refresh"></span>Update</button>
		
           <button type="submit" class=""><span class="	glyphicon glyphicon-remove"></span>Cancel</button>
			 
       
		
    </div>
</form>
								</div>
								</td>
                                <td class="pri" >Rs.<?php  echo $wd_tax_price=$image['price']; ?>
                  <input type="hidden" id="hidid<?=$i?>" value="<?= $image['cart_id'];?>" />
                    <input type="hidden" id="hidprice<?=$i?>" value="<?=$image['price'];?>" />
								</td>
								<td><?=$tax_prctg?></td>
								<td><?php   
								$tax_amt=(($wd_tax_price*$tax_prctg)/100);
								echo $tax_amt_fnl=round($tax_amt,2);
								
								?></td>
								
								<td><?php $total_amt_product=$wd_tax_price + $tax_amt ;
								echo $total_amt_product_fnl=round($total_amt_product,2);
								
								?></td>
                       
						<td>
						<a href="<?=base_url()?>index.php/cart/Cart_remove/<?=$image['user_id'];?>/<?=$image['cart_id']?>"><div><span class="fnl-cart-wishopt cart-removepopupshow"><span class="glyphicon glyphicon-trash"></span>Remove</span></div></a>
						</td>
						</tr>
        
        <?php if($image['updated_price']<>'' && $image['updated_price']<>'0'){
        $price=$image['updated_price']; 
		
        
                }else{
                 $price=$image['price'];   
                }
                $subtotal=$subtotal+$total_amt_product_fnl; 
				//echo $total_amt_product_fnl;
				//echo $i.'sss';
				if($update_srno=='removed' || $image['tax_goods']=='' || $qty_update_tbl!=''){
				   $this->cart_model->update_serail_noforcart($this->session->userdata('userid'),$i,$cart_id,$tax_prctg,$tax_amt_fnl,$total_amt_product_fnl);
				  }
		$i++; } ?>
		
          						
                    </tbody>
					</table>
                
				</div>
				</div>
     <?php
            
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
		<li class="shop-qty"><input name="f" data-id="<?= $i?>" type="text" id="f<?= $i?>"
			value="<?= $image['qty'];?>" /> <input type="hidden"
			id="hidid<?=$i?>" data-id="<?= $i?>" value="<?= $image['rowid'];?>" /><input
			type="hidden" data-id="<?= $i?>" id="hidprice<?=$i?>" value="<?= $image['price'];?>" />
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
         <?php  
			 //print_r();
			 if(count($data)!='0'){
			 ?>
               <div id="total" class="margin-bottom">
                        <table width="30%" id="mobile-table" cellpadding="0" cellspacing="0">
                          <tr>
                            <td class="data1">Sub Total</td>
                            <td class="data1"><img
			src="<?=base_url()?>assets/images/rupee-img-price.gif" />  <?= $subtotal;?></td>
                          </tr>
                            <tr>
                            <td class="data2">Shipping Charges</td>
                            <td class="data2">Rs. <?php if($subtotal>=1000){
							$shppigCarge=0;
							}else{
							$shppigCarge=100;
							}
                            echo $shppigCarge;?></td>
                          </tr>
<!--                          <tr>
                            <td class="data1">Gift Wrap Charges</td>
                            <td class="data1">Rs. xxxx</td>
                          </tr>-->
                          
                          <tr>
                            <td class="data2">Payable Amount </td>
                            <td class="data2">Rs. <?php  $TexTotal=$subtotal+$shppigCarge;
                               
                               echo round(($TexTotal),2);
                               ?></td>
                          </tr>
                        </table>

						<a href="<?php print base_url();?>index.php/cart/check_out">Check out</a> <a href="<?php echo base_url().'index.php/'.$continue_shopping_redirect; ?>">Continue Shopping</a>
				</div><?php } else{?>
        <!-- shopping cart -->
<div id="total" class="margin-bottom">
    <p>   Your Shopping Cart is empty.</p>
</div>
<?php } ?>
        <!-- shopping cart -->

		</div>
        <!-- checkout -->
        
        
        
		</div>

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

	function edit_qty(x){
	//alert(x);
	by_keyup_update(x);
	$('#p_qty'+x).hide();
	$('#edit_button'+x).hide();
	$('#divfor_update'+x).show();
	
	}
	
	

	
	function choose_qty(sn,filenam,imgsize,papersurface,imgprice,mainqty,frame_s,frame_name,mount_name,glass){
	//alert(mainqty);
	//alert('coose');
	//alert(frame_name);
	
	var v=$('#qty_update'+sn).val();
	//alert(v);
	
	if(v==0){
	return false;
	}
	$.ajax({
	      type:'post',
		  url:'<?=base_url()?>index.php/frontend/update_qty_for_cart',
		  data:'filenam='+filenam+'&imgsize='+imgsize+'&papersurface='+papersurface+'&v='+v+'&imgprice='+imgprice+'&mainqty='+mainqty+'&frame_s='+frame_s+'&frame_name='+frame_name+'&mount_name='+mount_name+'&glass='+glass,
		  success: function(response){
		 // alert(response);
		  
		  }
	
	});
	
	}

	
function update_cart(i,cart_id){   
       
  
         var row_id=$('#hidid'+i).val();
	 var price=$('#hidprice'+i).val();
	 var qty=$('#p_qty'+i).val();
	 
	 $.ajax({
           type:'post',
           url:'<?php print base_url() ?>index.php/cart/cart_update',
           data:'row_id='+row_id+'&price='+price+'&qty='+qty+'&action_method=update',
           success:function(response){
              if(response!=''){
                 location.reload();
              }
           }
           
       });
     }
</script>
