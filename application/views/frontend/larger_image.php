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
<title>Larger Image</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/smoothness/style.css">
<div id="icons">
    <img  src="<?php echo base_url()?>600/<?php echo $this->uri->segment(3);?>"class="drag-image" id="draggable"   style="height:auto">
</div>

