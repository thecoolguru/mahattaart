<?php 
 echo $total_rows;
print_r($total_rows);
if($this->session->userdata('userid'))
{
$Obj=new Frontend();
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;

    $splitUrl=split('/', $_SERVER['REQUEST_URI']);
    $ipaddress = getenv('HTTP_CLIENT_IP');
    $Obj->save_user_login_details($this->session->userdata('userid'),$url,$ipaddress);
 }
 if($this->session->userdata('userid')=='')
{
     header('location:'.base_url().'frontend/logout');
 }
?>
<?php
$user_id=$this->session->userdata('userid');
?>
<script type="text/javascript">
function sorting_lightbox(a)
{
  if(a==1||a==2)
  { 
   var url="<?php echo base_url();?>frontend/lightbox_sorting/"+a;
     window.location.assign(url);
  }
}

function edit(a,b,c,d)
{	 
	 $.ajax({
		type: "GET",
	       url: "<?php print base_url();?>frontend/edit_lightbox?lightbox_id="+a +"&lightbox_name="+b+"&filename="+d,
	       success: function(data)
		   {   
              //alert(data);		   
		     $("#entry_no"+c).html(data);
			 
           }	 
	 });
}
</script>

<script>
$(document).ready(function($){
    $('.megamenu').megaMenuCompleteSet({
        menu_speed_show : 300, // Time (in milliseconds) to show a drop down
        menu_speed_hide : 200, // Time (in milliseconds) to hide a drop down
        menu_speed_delay : 200, // Time (in milliseconds) before showing a drop down
        menu_effect : 'hover_fade', // Drop down effect, choose between 'hover_fade', 'hover_slide', etc.
        menu_click_outside : 1, // Clicks outside the drop down close it (1 = true, 0 = false)
        menu_show_onload : 0 // Drop down to show on page load (type the number of the drop down, 0 for none)
    });
	$("#crt_btn").click(function(){
	 if($('#fname').val()=="")
	 {
	  $("#fname_error").html("Please Enter Gallery Name");
	  return false;
	 }
	 else
	 {
	  $("#fname_error").html("");
	  var nm=$('#fname').val();
      var de=$('#desc').val();
	  var ck='1';
      var url='<?php echo base_url();?>frontend/lightbox?check='+ck +'&lt_nm='+ nm +'&lt_des='+de;
	  //alert(url);
      window.location.assign(url);
	  //alert("Gallery created");
	 }
	  
	 });
});
</script>

<script language="JavaScript">
$(document).ready(function() {
	$(".createmygal").accordion({
		accordion:false,
		speed: 500,
		closedSign: '<img src="<?php echo base_url();?>assets/images/arrow-circular.png"  align="absmiddle" style="margin-left:4px">',
		openedSign: '<img src="<?php echo base_url();?>assets/images/arrow-circular-dwn.png"  align="absmiddle" style="margin-left:4px">'
	});
	$("#crt_btn").click(function(){
	 if($('#fname').val()=="")
	 {
	  $("#fname_error").html("Please Enter Gallery Name");
	  return false;
	 }
	 else
	 {
	  $("#fname_error").html("");
	  var nm=$('#fname').val();
      var de=$('#desc').val();
	  var ck='1';
      var url='<?php echo base_url();?>frontend/lightbox?check='+ck +'&lt_nm='+ nm +'&lt_des='+de;
	  //alert(url);
      window.location.assign(url);
	 
	 }
	  
	 });
});

function share_gallery(lightbox_id)
{
	$('#lightbox_id').val(lightbox_id);
	document.getElementById('share_gallery').style.display='block';document.getElementById('fade').style.display='block';
       
}

function Genrate_images_id(lightbox_id)
{
//    var fileName_id=document.getElementById('fileName_id').value;
//       alert(fileName_id);
        $.ajax({
             type:"POST",
	     url:"<?php echo base_url();?>frontend/GetLight_box_details",
             data:"light_box_id="+lightbox_id, 
             success:function(data)  
             {    
                 
                 var row=data.length;
                 //alert(row);
                 document.getElementById('show_images_id').value=data;
                 var input=  document.getElementById("show_images_id");
                input.rows = row;
              }
          });
          
       $('#lightbox_id').val(lightbox_id);
	document.getElementById('generate_images_id').style.display='block';document.getElementById('fade').style.display='block';
       
}

function call_remove(imageid,name,page_no)
{	
	var user_input=confirm("Are you sure you want to delete gallery" +name);
	var url="<?php print base_url();?>frontend/delete_lightbox/"+imageid+"/"+page_no;
	if(user_input==true)
		window.location=url;
}
x
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
	function close_sharegallary(){
	 location.reload();
		}
</script>

<div id="share_gallery" class="mailid">
		<!----------------------------------Sign up---------------------------------->
		<form action="<?php print base_url();?>frontend/share_lightbox" method="post" name="login_form" id="login_form">
		<a href="javascript:close();" onclick="close_sharegallary();" style="float: right;color: black;">Close</a>			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="35" align="left" valign="middle"><span style="font-size: 14px;font-weight: bold;">Share Gallery</span></td>
					</tr>
					<tr>
						<td align="left" valign="middle">
                                                    <span id="email_next_error" style="color: red"></span>
						<input type="text" name="email_to" id="email_to" placeholder="Send Email To">
						
						</td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td align="left" valign="middle">
						<input type="text" name="subject" id="subject" placeholder="Subject">
						
						</td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td align="left" valign="middle">
						<textarea rows="4" cols="20" id="message" name="message" placeholder="Message"></textarea>
						
						<input type="hidden" id="lightbox_id" name="lightbox_id">
						</td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td><input name="next" id="next" type="submit" value="Share"
                                                           onclick="return ShareGalleryValidation(); "style="padding: 0 10 0 10 px;width: 80px;height: 30px;border: none;background-color: #999" />
						</td>
					</tr>
				</table>				
		</form>
	</div>


<div id="generate_images_id" class="mailid">
		<!----------------------------------Sign up---------------------------------->
		<form action="<?php print base_url();?>frontend/share_lightbox" method="post" name="login_form" id="login_form">
		<a href="javascript:close();" onclick="close_sharegallary();" style="float: right;color: black;">Close</a>			
                <h3>File name</h3>	
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td align="left" valign="middle">
						<textarea rows="8" cols="20" id="show_images_id" name="message" ></textarea>
						
						<input type="hidden" id="lightbox_id" name="lightbox_id">
						</td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					
				</table>				
		</form>
	</div>

	<div id="fade" class="black_overlay"></div>


<style>
.black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 200%;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.5;
	opacity: .50;
	filter: alpha(opacity =   80);
}

.mailid {
	display: none;
	position: fixed;
	top: 33%;
	left: 40%;
	width: auto;
	padding: 15px;
	border: 2px solid #FFFFFF;
	background-color: white;
	z-index: 1002;
	overflow: auto;
	text-align: center;
        border-radius: 13px;
}
textarea {
    padding: 6px;
    font-size: 15px;
    border-radius: 2px;
    border: 1px solid ;
    margin-top: 10px;
    height: 80px;
    width: 100%;
}
* {
    padding: 0;
    margin: 0;
}
input[type=text] {
    margin-top: 10px;
    padding: 6px;
    width: 100%;
    font-size: 15px;
    border-radius: 2px;
    height: 34px !important;
    border: 1px solid;
}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/gallery.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jqueryplugins.js"></script>

<!--Add to cart -sizes window-->
<link type="text/css" href="<?php echo base_url();?>assets/css/jquery.window.css" rel="stylesheet" />

<!-- JavaScript Includes -->

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.window.js"></script>

<div class="main-container">
    	
        <div class="pagination">
        	<span><a href="<?php echo base_url();?>frontend/index">Home</a> -> <a href="<?php  echo base_url();?>frontend/lightbox"> My
                        Gallery</a></span> 
        </div>
        
        <!-- art style -->
        <div class="art-style">
        	
            <!-- aside -->
            <aside class="left-panel-page">
                <p><a href="<?php  echo base_url();?>frontend/lightbox">My Gallery</a></p>
            	<div class="list">
                	<ul>
                    	<?php if(isset($result)){ 
							$i=0; foreach($result as $results){
							$rows=$this->frontend_model->count_images_lightbox($results->lightbox_id);?>
						<input type="hidden" id="lightbox_id<?php echo $i;?>" name="lightbox_id<?php echo $i;?>" value="<?php echo $results->lightbox_id;?>" />
						<li><a href="<?php echo base_url();?>frontend/lightbox_view/<?php echo $results->lightbox_id;?>">
                                                    <?php echo $results->lightbox_name;?></td>
						 <?php }$i++;}?> </a>
						</li>
                    </ul>
                </div>

            </aside>
            <!-- aside -->
            
            <!-- right panel -->
            <div class="right-panel-page">
            	
                <div class="sortby">
                	<p>
                    	<span class="sortby-txt">Sort by:</span>
                    	<select name="select" id="select"
						onchange="javascript:sorting_lightbox(this.value);">

							<option value="1" <?php if(isset($option)){if($option=='1'){?>
								selected="selected" <?php }}?>>Gallery Name</option>
							<option value="2" <?php if(isset($option)){if($option=='2'){?>
								selected="selected" <?php }}?>>Date created on</option>
					</select>
                    </p>
                    <?php if(isset($success)){
					echo $success;
}?>

				<?php if($this->session->flashdata('share_message')){print $this->session->flashdata('share_message');}?>
                    
                </div>
                
                  
                
                
                <!-- gallery block -->
                <div class="gallery-img">
				<p style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></p>
                	<form>
				
				
				<table width="100%" border="0" cellspacing="0" class="mygal-table">
					<tr class="galhdr">
						<td width="100">&nbsp;</td>
						<td width="100">Name</td>
						<td width="200">Description</td>
						<td width="65">No. of Images</td>
						<td width="80">Created on</td>
						<td>Tools</td>
					</tr>
					<?php 
					//print_r($images);
					if(isset($result)){ 
						$i=0;foreach($result as $results){
						 //echo $results->image_id;
							$rows=$this->frontend_model->count_images_lightbox($results->lightbox_id);
							$images=$this->frontend_model->get_images_lightbox($results->lightbox_id); 
							$img_count=count($images);
							$resultant="";
							if($img_count!='0'){
								$img_arr=array();$j=0;
								foreach($images as $image)
								{
									$img_arr[$j]=$image->image_id;
									$j++;
								}
								$img_src=$this->frontend_model->get_most_selling_image($img_arr);

								$counts=count($img_src);
									
								$max_sales_counter=$img_src['0']->sales_counter;
								$resultant=$img_src['0']->images_filename;
								for($k=1;$k<$counts;$k++)
								{
									if(($img_src[$k]->sales_counter)>$max_sales_counter)
									{
										$resultant=$img_src[$k]->images_filename;
									}
								}
							}
							?>
					<tr id="entry_no<?php echo $i;?>">
						<td><?php if($resultant){?>
                                  <a href="<?php echo base_url();?>frontend/lightbox_view/<?php echo $results->lightbox_id;?>"><img src="http://static.mahattaart.com/158/<?php print $resultant;?>" style="width: 100px" /></a>
							<?php }else{ echo "No Image";}?></td>
						<td><a href="<?php echo base_url();?>frontend/lightbox_view/<?php echo $results->lightbox_id;?>"><?php echo $results->lightbox_name;?></a></td>
						<td><?php if($results->lightbox_description)echo $results->lightbox_description;else echo "--";?>
						</td>
						<td><?php if($rows)echo $rows; else echo '0';?></td>
						<td><?php echo date('d-m-Y ',strtotime($results->creation_date)); ?>
						</td>

						<td>
                                                <?php if($rows){?>
                                               <a href="javascript:edit('<?php echo $results->lightbox_id;?>','<?php echo $results->lightbox_name;?>','<?php echo $i;?>','<?php print $resultant;?>');"
							id="ed-lt-bx">Edit</a>
                                                  <?}else {

                                                       }?>

                                                    <br /> 
                                                    <?php if($rows){?>
							<a href="<?php echo base_url();?>frontend/lightbox_view/<?php echo $results->lightbox_id;?>">View</a>
                                                         <?}else {

                                                       }?>
							<br> <a href="javascript:call_remove('<?php echo $results->lightbox_id;?>','<?php echo $results->lightbox_name;?>','<?=$page_no?>');">Remove</a>
							<br> <a href="javascript:share_gallery('<?php echo $results->lightbox_id;?>');">Share Gallery</a>
                                                        <br> <a href="javascript:Genrate_images_id('<?php echo $results->lightbox_id;?>');">Generate Image Id</a>
						</td>
					</tr>
					<?php $i++;
						}
}?>
				</table>
			</form>
			<p style="margin-left:40%"><?php   echo $this->pagination->create_links(); ?></p>
                </div>
                <!-- gallery block -->
                
<!--                <div class="sortby margin-bottom">
                	<p>
                    	<span class="sortby-txt">Sort by:</span>
                    	<select name="select" id="select"
						onchange="javascript:sorting_lightbox(this.value);">

							<option value="1" <?php if(isset($option)){if($option=='1'){?>
								selected="selected" <?php }}?>>Gallery Name</option>
							<option value="2" <?php if(isset($option)){if($option=='2'){?>
								selected="selected" <?php }}?>>Date created on</option>
					</select>
                    </p>
                    
                    
                    
                </div>-->
                
            </div>
            <!-- right panel -->
            
        </div>
        <!-- art style -->
        
    </div>
