<?php //print_r($search_data);?>


  
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.css">

  <script src="<?=base_url()?>assets/js/jquery.min2.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-select.js"></script>
<div id="middle-wrapper">
<div id="middle-container" style="width:96%"> 
<span><div class="main-hdr"> View Promo Code</div><div style="text-align:right"><a href="<?=base_url()?>backend/create_promo_code"><button style="background:green">Add Promo Code</button></a></div></span>


<div id="PhotographersListDiv" >

<div class="view-cp-list">
<?php if($msg<>'') {?>
          <script>
              setTimeout(function(){outtime()},3000);
              function outtime(){
                  window.location.href="<?=base_url()?>index.php/backend/online_order";
              }
           </script>
          <?php echo $msg;
		  }?>
          
           
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
	
      <td><div class="viewcplist-inner">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="hdrs">
		     <td>Promo Code</td>
			 
              <td>Offer (%)</td>
			 
		  <td>Valid Days</td>
		  <td> Active</td>
		 <td> Update</td>
		  <td> Delete</td>
                               

                                                     
							   
          
          
          <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1050,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

       
}




</script>
         
          </tr>
   
<?php
   // print_r($web_price_tbl);
   foreach($web_price_tbl as $web_tbl){
   if($web_tbl->valid_days==8){
   $valid_days="All Days";
   }else if($web_tbl->valid_days==9){
   $valid_days="Weekend";
   }else if($web_tbl->valid_days==10){
   $valid_days="Weekdays";
   }else if($web_tbl->valid_days==1){
   $valid_days="Monday";
   }else if($web_tbl->valid_days==2){
   $valid_days="Tuesday";
   }else if($web_tbl->valid_days==3){
   $valid_days="Wednesday";
   }else if($web_tbl->valid_days==4){
   $valid_days="Thursday";
   }else if($web_tbl->valid_days==5){
   $valid_days="Friday";
   }else if($web_tbl->valid_days==6){
   $valid_days="Saturday";
   }else if($web_tbl->valid_days==7){
   $valid_days="Sunday";
   }
   ?>
             
   <tr>
		<input type="hidden" name="tbl_id[]" value="<?php echo $web_tbl->sr_no ;?>">
		
   <td><?php echo $web_tbl->offer_code ;?></td> 
         <td><?php echo $web_tbl->offer_precentage;?></td>
  <td><?php echo $valid_days;?></td>
	
		 
				  <td ><?php $active=$web_tbl->active ;
				   if($active=='0'){
				   echo "<span style='color:red'>No</span>";
				   }else{
				   echo "Yes";
				   }
				  ?></td>
				 
				  
			 <td>
		     <a href="<?=base_url()?>index.php/backend/create_promo_code/<?=$web_tbl->sr_no;?>">Edit</a>
</td>
 <td>
		     <a href="<?=base_url()?>index.php/backend/delete_promo_code/<?=$web_tbl->sr_no;?>">Delete</a>
</td>


	  </tr>
				<?php
				}
				?>
				
       
      </table>
               
      </div></td>
      </tr>
  </table>
</div>
</div>




</div>
<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
            <br>
             <span style="font-size: 14px; float: left;">If you want to send for multi user Then separate with (,). <br>Example: 
            mail1@gmail.com,mail2@gmail.com
            </span><br>
            <input type="hidden" name="mail" id="mail_send" value="">
             <input type="hidden" name="order_id" id="send_order_id" value="">
             <textarea name="mail_id" id="mail_id" cols="44" rows="6"></textarea>
             <br><span id="error_msg" style="font-size:14px; color:red;"></span>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" id="send_mail_btn" >Send</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<style>
    textarea { font-size: 18px; }
    </style>
<script>
    $(document).on('click','#send_mail_btn',function(){
         
       var mailsend= $('#mail_send').val();
         var mail_id= $('#mail_id').val();
       var order_id= $('#send_order_id').val();
        if($('#mail_id').val()=='')
        {
            $('#error_msg').html('Please enter mail id');
        }else{
           $('#error_msg').html(''); 
        
        
         $.ajax({
            type:"post",
           url:"<?=base_url()?>index.php/backend/sendmail",
             data:"order_id="+order_id+"&mailsend="+mailsend+"&mail_id="+mail_id,
             success:function(response){
                $('#error_msg').html(response); 
             }
         });
         }
        
    });
    $(document).on('click','.sendmail',function(){
        var mailsend=$(this).data('mail');
        var order_id=$(this).data('id');
        $('#mail_send').val(mailsend);
        $('#send_order_id').val(order_id);
        });
    </script>