<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Help</title>

 <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <!--colorbox Login/Signup-->
    <link media="screen" rel="stylesheet" href="<?php echo base_url()?>assets/css/colorbox.css" />
    <script src="<?php echo base_url()?>assets/js/colorbox/jquery.colorbox.js"></script>  

<script>
 function submit()
 {
     var email=document.getElementById('email').value;
     var contact= document.getElementById('contact').value;
     var datastring='email=' + email  +  '&contact=' + contact ;
     $.ajax({
         type: "POST",
         url: "<?php print base_url()?>frontend/query",
         data: datastring,
         success: function(data)
         {
             alert('you will be contacted by our sales team shortly');
          /*   if(data=="successful")
             {
                 window.location.assign('<?=base_url()?>user/index');
             }
             else
             {
                 $('#login_error').html("<br>Invalid Email or Password");
             }*/
         }
     });
 }
</script>

    <style type="text/css">
        body,td,th {font-family: arial; margin:0; padding:0}
        .helpbox-container{width:424px; height:auto;}
        .header-container{float:left; width:382px; background:#7f7f7f; font-size:16px; color:#fff; padding:8px 0 8px 42px;}
        .helpbox-inner-container{float:left; width:382px; padding:38px 0 20px 42px;  color:#7f7f7f}
        .helpbox-inner-container strong{ color:#2b2b2b; font-family:Arial, Helvetica, sans-serif}
        .callus{float:left; width:125px;  line-height:24px; }
        .or{float:left; font-size:18px; padding:12px;}
        .mailus{float:left; width:130px;  line-height:24px; margin-left:15px }
        .mailus a{color:#7f7f7f; text-decoration:none}
        .mailus a:hover{color:#2b2b2b; text-decoration:none}
        .seperator{float:left; width:330px; height:1px; border-bottom:1px solid #bfbfbf; margin:25px 0}
        .form-container{float:left; width:330px}
        .textbox{background:#f6f6f6; width:270px; border:1px solid #d3d3d3; padding:6px 10px; font-size:14px; color:#999898; margin-top:15px;}
        .submit-bt{background:#f9a21a; border:0; margin:25px 0 10px 0; color:#fff; padding:5px 30px; text-transform:uppercase; font-size:16px; cursor:pointer}
    </style>
</head>
<body>
<div class="helpbox-container">
    <div class="header-container">Need Help?</div>
    <div class="helpbox-inner-container">
        <div class="callus"> <strong>Call us at:</strong><br/> 91-11-41828972</div> <div class="or"> OR </div>
        <div class="mailus"> <strong>Mail us at:</strong><br/>
            <a href="mailto:sales@wallsnart.com">sales@wallsnart.com </a></div>
        <div class="seperator"></div>
        <div class="form-container">
            <form action="<?php echo base_url();?>frontend/query" method="post">
                Would you prefer us to revert back at:
                <br>
                   <?php
                    $user_id=$this->session->userdata('userid');
                    $user_data=$this->user_model->get_user_details($user_id);
      if($user_data->first_name!=="")
       {
        echo '<label> <input type="text" name="reg-id" id="reg-id" class="textbox" placeholder="Registered email address" value="'.$user_data->email_id.'"></label>';
        }            ?>
                <label>                  <input type="email" name="email" id="email" class="textbox" placeholder=" Email address"></label>
                <label>                  <input type="number" name="contact" id="contact" class="textbox" placeholder="Contact Number"> </label>
                <br>
                <input type="submit" name="submit" id="submit" value="Submit" class="submit-bt">
            </form>
        </div>
    </div>
</div>
</body>
</html>