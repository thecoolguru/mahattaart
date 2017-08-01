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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>In Room View</title>
    <link href="<?php echo base_url()?>css/wallsnart2.2.css" type="text/css" rel="stylesheet"  />
    <link media="screen" rel="stylesheet" href="<?php echo base_url()?>assets/css/colorbox.css" />
    <script src="<?php echo base_url()?>assets/js/colorbox/jquery.colorbox.js"></script>
</head>

<body>
<div style="width:726px; height:558px;">
    <div style="background:#f0f0f0; border-bottom:1px solid #c0c0c0; padding:6px; text-align:center; font-size:14px; font-weight:700; text-transform:uppercase">frame detail</div>

    <div style="display:block; width:612px; margin:42px auto 0 auto">
        <div style="float:left; width:275px; height:275px; border:1px solid #d2d2d2"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/triangle_shaped_frames/<?php echo $details->frame_upload_image_name;?>"  height="260" width="260"/></div>
        <div style="float:left; width:275px; height:275px; border:1px solid #d2d2d2; margin-left:58px"><img src="<?php echo base_url()?>uploaded_pdf/new_frames/l_shaped_frames/<?php echo $details->frame_upload_image_name;?>" height="260" width="260"/></div>
        <div style="float:left; display:block; clear:both; margin-top:25px; font-size:12px;" >True to its name, SOHO embraces all artwork from ultra contemporary to traditional. Versatile and sleek, this is our most popular collection. Available in black, white, gray, natural, espresso, mahogany, silver, gold and bronze.  For smaller pieces, try the Chelsea collection.</div>

        <div style="float:left; display:block; clear:both; margin-top:25px; font-size:12px; width:100%; color:#666" >
            <table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                    <td width="100" height="25">Profile:</td>
                    <td width="250">SOHO <?php echo $details->frame_colour?></td>
                    <td width="80">Color:</td>
                    <td><?php echo $details->frame_colour ?></td>
                </tr>
                <tr>
                    <td height="25">Material:</td>
                    <td><?php echo $details->frame_type?></td>
                    <td>Finish:</td>
                    <td>Gesso</td>
                </tr>
                <tr>
                    <td height="25">Style:</td>
                    <td>Contemporary</td>
                    <td>Price</td>
                    <td><strong>1500 INR</strong></td>
                </tr>
            </table>
        </div>

        <div style="float:left; width:60%; font-size:12px; color:#555; margin-top:20px; padding-top:5px; border-top:1px dotted #aaa">Frame ID: <?php echo $details->frame_code ?></div>



    </div>


</div>
</body>
</html>
