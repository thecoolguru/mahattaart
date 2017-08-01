<?php 
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Help</title>
<script type="text/javascript">
function closeSelf(){
    self.close();
    return true;
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
        <div class="callus"> <strong>Call us at:</strong><br/> 91-11-41828972 </div> <div class="or"> OR </div>
        <div class="mailus"> <strong>Mail us at:</strong><br/>
            <a href="mailto:sales@wallsnart.com">sales@wallsnart.com </a></div>
        <div class="seperator"></div>
        <div class="form-container">
            <form action="<?php echo base_url();?>frontend/query_normal" method="post">
                Would you prefer us to revert back at:
                <br>
                
                <label>                  <input type="email" name="email" id="email" class="textbox" placeholder=" Email address"></label> OR
                <label>                  <input type="number" name="contact" id="contact" class="textbox" placeholder="Contact Number"> </label>
                <br>
                <input type="submit" name="submit" id="submit" value="Submit" class="submit-bt" ;>
            </form>
        </div>
    </div>
</div>
</body>
</html>