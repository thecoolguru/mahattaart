<style>
h2,h3{text-transform:uppercase}
.call-to-action-1 .call-to-action-1-button {
  display: inline-block;
  margin-left: 50px;
  position: relative;
  top: -4px;
}

.call-to-action-1-button.btn.btn-default{
  color: #fff;
  text-transform: uppercase
}
.btn {
  border-radius: 0;
  font-size: inherit;
  letter-spacing: inherit;
  line-height: inherit;
  transition: all 0.3s ease-in-out 0s;
}
.call-to-action-1-button.btn.btn-default {
  background: #359bcc;
  padding: 10px 35px;
}
</style>

<div class=" container">
	<div class="row text-center" style="margin-top:40px">
    	<h2>Your payment has been made successfully!</h2>
        <h3>Thank you for your Purchase!</h3>
        <div>
			<span>Transaction Id <b>#<?=$transection_id;?></b> </span>  <br>      
			<span>Your Order <b>#<?=$order_id;?></b> </span>        
        </div>
    </div>
    
    <div class="row text-center" style="margin:20px 0 40px 0">
    	<div class="col-md-6 col-md-push-3 ">
        	<span>You can track your order status in </span>
        	<a  class="call-to-action-1-button btn btn-default" href="<?=base_url()?>index.php/user/order_history">ORDER HISTORY </a>
        </div>
    </div>
</div>