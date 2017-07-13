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
	<div style="width: 100%; border: 1px solid; border-radius: 10px; height: 253px; margin: 40px 0px;;">
    	<div style="background: rgb(235, 248, 255) none repeat scroll 0% 0%; border-radius: 10px 10px 0px 0px; padding: 19px; font-size: 16px; font-weight: 600;">
        	ERROR
			<?=$msg?>
        </div>
        <div class="row text-center" style="margin:20px 0 40px 0">
            <h3>Unfortunately your transaction couldn't be processed!</h3>
            <div style="margin-top:30px">
			<?php
			
			?>
                <span>Please <a href="javascript:">try again</a> </span>
				
				
            </div>
        </div>
    </div>
</div>