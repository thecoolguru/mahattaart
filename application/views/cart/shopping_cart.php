<?php 
 //echo  $this->session->userdata('userid');
 $continue_shopping_redirect=$this->session->userdata('continue_shopping');
 //echo base_url();
	if($this->session->userdata('userid')){
	$Obj=new Cart();
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
	}
	if($this->session->userdata('userid')==''){
			 header('location:'.base_url().'index.php/frontend/logout');
		 
	}
?>
	<?php  
	if(!$key){
		$key="flower";
	}?>
	<?php
    $userName=$this->cart_model->get_userDetails($this->session->userdata('userid'));
	?>

	<script>
	$(document).ready(function(){
	var product_id = '<?php echo $this->session->userdata('userid');?>'; 
		if(product_id){
		//$('.descript1').hide();		
		//$('.descript2').hide();
		}else{
		//$('.descript1').show();		
		//$('.descript2').show();	
		}
	});
	</script>
	<script>
	function page_refresh(){
		setTimeout(function(){
		window.location.href="<?=base_url()?>cart/cart_view"; 
		},100);
	}
	</script>
	<style>
	/*.item.showforprintonly {
	width: 190px;
	float: left;
	}*/
	#fir{padding:2px; background-color:white;
	box-shadow:2px 2px 1px black inset;
	}
	.cart-removepopupshow span {
	  font-size:16px;
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
		<style>
	.container3D {
		/*min-height: 180px;*/
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
    
        <!-- shopping cart -->
	<div class="row">
	  <div id="no-more-tables" style="overflow-x:scroll">
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
       
		if($this->session->userdata('userid') ){ 
		  $data=$this->cart_model->get_usercart($this->session->userdata('userid'));   
		  $subtotal=0; $i=1;
          $update_srno=$_REQUEST['search'];
		  $qty_update_tbl=$_REQUEST['qty_update'];
		  $sr_no = $data[0]['sr_no'];
		 	foreach($data as $image){
                  //echo $image['cart_id'].'ssss';
                  //$row=$this->search_model->get_image_data($image['image_id']); 
                  $url = base_url();
				  if($this->session->userdata('page')){
					$size_data = getimagesize($url."application/views/frontend/upload_images/".$image['image_name']);  
				  }else{
				  $size_data = getimagesize("http://static.mahattaart.com/200x200/media/".$image['image_name']);
                  }
				  $cart_id = $image['cart_id'];
				  $file_name = $image['image_name'];
					$image_alignment="";
					$image_width=$size_data[0];
					$image_height=$size_data[1];
					$newimage_width=$image_width+13;
					if($size_data[0]>$size_data[1]){
					$image_alignment="horizontal";
					$frameborder_width="89px";
					}else{
					$image_alignment="vertical";
					$frameborder_width="65px";
					}
					$image_alignment;
			        if($i%2==0){
                        $classes='bgc-even';
                    }elseif($i%2!=0){
                        $classes='bgc-odd'; 
                    }
				    ?>
				
 <?php
 $search_file = "http://api.indiapicture.in/wallsnart/search.php?q=$file_name&page=1&per_page=1";
 $opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
 $context = stream_context_create($opts);

$search_data_file = file_get_contents($search_file, false, $context);
$search_data_r=json_decode($search_data_file,TRUE);
//print_r($search_data_r);
 $collection_id=$search_data_r['results'][0]['image_collection_id'];
 $search_data_r['results'][0]['image_description'];
?>
<?php if($image['size']!=''){
	$redirect_details=base_url().'frontend/product_detail/'.$file_name.'/'.$image['size'].'/'.$image['image_id'];
	 } else{ 
	 $redirect_details=base_url().'search/image_detail/'.$file_name.'/'.$image['image_id'].'/'.$collection_id;
	 }?>
           <tr>
                <td> 
					<div>
					<?=$i;?>
					</div>
				</td>
				<td class="item showforprintonly">
                    <?php   
						if($image['frame_color']=='Streched Canvas Gallary Wrap'){?>
							 

		<section class="container3D" style="min-height:<?= $size_data[1]+20?>px;min-width:<?= $size_data[0]+20?>px">
            <div id="cube">
                 <figure class="front">
                   <a href="<?=$redirect_details?>">  <img src="<?php if($image['path'] == 1){ echo base_url()."application/views/frontend/upload_images/".$file_name;}else{ echo"http://static.mahattaart.com/200x200/media/".$image['image_name'];}?>" class="img-responsive" /></a>
					<figure class="right"></figure>
					<figure class="bottom"></figure>
                </figure>
            </div>
            </section>
			<?php
				 }else{
					if($image['frame_cost']!=0 && $image['mount_size']!=0){
						$padding=10;
					}else{
						$padding=0;
					}
				 ?> 
				 <div  id="topa2">
				   <a href="<?=$redirect_details?>"> 
					 <img src="<?php if($image['path'] == 1){ echo base_url()."application/views/frontend/upload_images/".$file_name;}else{ echo"http://static.mahattaart.com/158/".$image['image_name'];};?>" class="img-responsive mainhor" style="border-image: url('<?=base_url()?>images/uploaded_pdf/frames/horizontal/<?=$image['frame_color']?>.jpg') 30 30 30 30 round round;background:url('<?=base_url()?>images/uploaded_pdf/mount/<?=$image['mount_color']?>.jpg') no-repeat scroll 0 0 / cover; padding:<?=$padding?>px" /></a>
				 </div>
            <?php } ?>
          </td>
			<br>
          <td class="des" class="descript2"><?php echo substr($search_data_r['results'][0]['image_description'],0,130)?> </td>
			<td class="des">
				<h4>
					<strong><?php // print substr($row->images_caption,0,20); ?>
					  <?php echo $file_name;?></strong>
				</h4>
			<?php $xyz=explode("%20",$image['image_print_type']); $kk=count($xyz);$print_type="";
				for($k=0;$k<$kk;$k++){
					$print_type =$print_type." ".$xyz[$k];
				}echo $print_type.'<br>';
				//echo $image['image_size'];
				if($image['frame_cost']==0){
				$tax_prctg=12;
				$hsn_code='49119100';
			?>
			Art Print:
			<?php echo $image['image_size'].'(Inch)<br>w/0 Border:'.$image['borderd_image_size'].'<br>';
				  if($image['frame_color']=='Streched Canvas Gallary Wrap'){
					echo 'Frame Type:  '.$image['frame_color'].'<br>';
				  }
				}
				if($image['frame_cost']!=0){
				$tax_prctg=18;
				$hsn_code='39203090';
				?>
				Framed Art Print:<?=$image['framed_image_size'].'(Inch)<br>'?>
				Frame Size:<?=$image['frame_size'].'(Inch)<br>'?>
				Frame Name:<?=$image['frame_color'].'<br>'?>
                 <?php if($image['mount_size']!=0){?>
                    Mount Size:<?php echo $image['mount_size'].'(Inch)<br>';?>Mount Name:<?=$image['mount_code'].'<br>'?>
                 <?php } ?>
                Glass:<?php echo $image['glass_type'];}?>
				</td>
                <td class="qua">
					<form class="form-horizontal">
						 <div class="form-group" style="margin-bottom: 2px;">
							<div class="col-md-12">
							   <input name="f" type="text" readonly id="p_qty<?=$i?>" class="qua-inp text-center" value="<?= $image['qty'];?>"  style=" width:60px;"/>
							</div>
						 </div>
						<div class="form-group">
						  <div class="col-md-12">
							<button type="button" id="edit_button<?=$i?>" onclick="edit_qty(<?=$i?>);" style="min-width: 60px;"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
						  </div>
						</div>
					</form>
					<div id="divfor_update<?=$i?>" style="display:none;">
                       <form class="form-horizontal">
                          <div class="form-group" style="margin-bottom: 2px;">
                           	<div class="col-md-12">
	                           <input type="text" maxlength="4" name="qty_update" class="by_keyup_update text-center" id="qty_update<?=$i?>" value="<?=$image['qty']?>" style="width:73px;">
                            </div>
                          </div>
						  <?php //echo $image['image_name'].','.$image['image_size'].','.$image['image_print_type'].','.$image['price'].','.$image['qty'].','.$image['qty'].','.$image['frame_size'].','.$image['frame_color'].','.$image['mount_color'].','.$image['glass_type']; ?>
						<div class="form-group">
                         	<div class="col-md-12">
                                <button onclick="choose_qty('<?=$i?>','<?=$image['image_name']?>','<?=$image['image_size']?>','<?=$image['image_print_type']?>','<?=$image['price']?>','<?=$image['qty']?>','<?=$image['frame_size']?>','<?=$image['frame_color']?>','<?=$image['mount_color']?>','<?=$image['glass_type']?>');" type="submit" class="" style="min-width:73px;"><span class="glyphicon glyphicon-refresh"></span>Update</button>
                                   <button type="submit" class="" style="min-width: 73px;"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                            </div>
                        </div>
					  </form>
					</div>
				</td>
                  <td class="pri" >Rs.<?php  echo $wd_tax_price=$image['price']; ?>
					<input type="hidden" id="hidid<?=$i?>" value="<?= $image['cart_id'];?>" />
						<input type="hidden" id="hidprice<?=$i?>" value="<?=$image['price'];?>" />
							<input type="hidden" name="hsn_code" value="<?=$hsn_code?>" />
				  </td>
					<td><?=$tax_prctg?></td>
						<td><?php   
								$tax_amt=(($wd_tax_price*$tax_prctg)/100);
								echo $tax_amt_fnl=round($tax_amt,2);
						?></td>
						<td><?php $total_amt_product=$wd_tax_price + $tax_amt ;
							echo $total_amt_product_fnl=round($total_amt_product,2);?>
						</td>
                       	<td class="text-center">
							<a href="<?=base_url()?>index.php/cart/Cart_remove/<?=$image['user_id']?>/<?=$image['cart_id'];?>">
								<div>
									<span class="fnl-cart-wishopt cart-removepopupshow">
										<span class="glyphicon glyphicon-trash"></span>
									</span>
								</div>
							</a>
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
							   $this->cart_model->update_serail_noforcart($this->session->userdata('userid'),$i,$cart_id,$tax_prctg,$tax_amt_fnl,$total_amt_product_fnl,$hsn_code);
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
		<li class="shop-itm">
			<a href="#"><img src="http://www.indiapicture.in/wallsnart/158/<?= $image['name'];?>"/></a>
				<div class="shop-itm-detail">
					<h4><strong></strong></h4>
						By | Giclee Print | | Item #: 11787261A <a href="#"
						class="shop-frameit-bt">Frame It</a>
				</div>
		</li>
		<li class="shop-opt"><a href="#" class="shoplnks">Frame It</a> 
			<a href="#" class="shoplnks">Mount</a>
		</li>
		<li class="shop-qty">
			<input name="f" data-id="<?= $i?>" type="text" id="f<?= $i?>" value="<?= $image['qty'];?>"/> 
			<input type="hidden" id="hidid<?=$i?>" data-id="<?= $i?>" value="<?= $image['rowid'];?>"/>
			<input type="hidden" data-id="<?= $i?>" id="hidprice<?=$i?>" value="<?= $image['price'];?>"/>
			<a href="#" class="shoplnks" onclick="update('<?=$i?>');">Update</a>
			<a href="<?=base_url()?>index.php/cart/remove_cart/<?= $image['rowid'];?>/<?= $key;?>" class="shoplnks">Remove</a>
		</li>
		<li class="shop-price">
			<img src="<?=base_url()?>assets/images/rupee-img-price.gif"/> <?= $image['subtotal'];?>
		</li>
	</ul>
	<?php } } ?>         
      <!-- <div id="coupon" class="margin-bottom">Apply Coupon Code : <input name="" type="text" /><input type="button" value="Apply Coupon" class="couponcode" /></div>-->
         <?php //print_r();
		 if(count($data)!='0'){ ?>
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
						  <!-- <tr>
                            <td class="data1">Gift Wrap Charges</td>
                            <td class="data1">Rs. xxxx</td>
                          </tr> -->
                          
                          <tr>
                            <td class="data2">Payable Amount </td>
                            <td class="data2">Rs. <?php  $TexTotal=$subtotal+$shppigCarge;
                               
                               echo round(($TexTotal),2);
                               ?></td>
                          </tr>
                        </table>
						<a <?php if($userName){?>href="<?php echo base_url().'index.php/cart/check_out';?>"<?php }else{?> href="" onclick="login('');return false;" <?php }?> > Check out</a> <a href="<?php if($image['path']){ echo base_url().'index.php/frontend/photostoart_inner';}else{ echo base_url().'index.php/'.$continue_shopping_redirect; } ?>">Continue Shopping</a>
        <!-- shopping cart -->
						<div id="total" class="margin-bottom"></div>
						<?php } else{?>
								<p>Your Shopping Cart is empty.</p>
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
             success:function(data){    
                
             }
         });
}

	function by_keyup_update(id_val){
		$(".by_keyup_update").keyup(function () { 
		var newValue = $('#qty_update'+id_val).val().replace(/[^1-9]/g,'');
			if(newValue.length>=1){
			var newValue = $('#qty_update'+id_val).val().replace(/[^0-9]/g,'');
			}
		$('#qty_update'+id_val).val(newValue);
		});
	}

	function edit_qty(x){
	by_keyup_update(x);
	$('#p_qty'+x).hide();
	$('#edit_button'+x).hide();
	$('#divfor_update'+x).show();
	}
	
	function choose_qty(sn,filenam,imgsize,papersurface,imgprice,mainqty,frame_s,frame_name,mount_name,glass){
	var v = $('#qty_update'+sn).val();
	//alert(filenam+','+imgsize+','+papersurface+','+imgprice+','+mainqty+','+frame_s+','+frame_name+','+mount_name+','+glass);
	if(v==0){
	return false;
	}
	var mydata = '<?= $this->session->userdata('userid')?>';
	 $.ajax({
	      type:'post',
		  url:'<?=base_url()?>index.php/frontend/update_qty_for_cart',
		  data:'filenam='+filenam+'&imgsize='+imgsize+'&papersurface='+papersurface+'&v='+v+'&imgprice='+imgprice+'&mainqty='+mainqty+'&frame_s='+frame_s+'&frame_name='+frame_name+'&mount_name='+mount_name+'&glass='+glass,
		  success: function(response){
			if(mydata)
			page_refresh();
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
