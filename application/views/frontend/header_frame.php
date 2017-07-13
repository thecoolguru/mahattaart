<?php //echo $api_image_id;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mahatta Art | Art Prints, Framed Art, and Mahatta Art Collections</title>	
<!-- header -->
<link rel="stylesheet" href="<?php print base_url();?>assets/css/bootstrap.min.css" type="text/css">
<!-- stylesheet css -->
<link rel="stylesheet" href="<?php print base_url();?>assets/css/style.css" type="text/css">
<link href="<?php print base_url();?>assets/css/nav.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/wallsnart2.2.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/slider.css" rel="stylesheet" type="text/css" />
<link href="<?php print base_url();?>assets/css/jquery.bxslider.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/flexslider.css" type="text/css" media="screen" />
 <link href="<?php print base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php print base_url();?>assets/css/gallery.css" type="text/css"/>

<link rel="icon" href="<?php print base_url();?>assets/favicon.png" sizes="24x24" type="image/png">

 <!-- jquery -->    
<script src="<?php print base_url();?>assets/js/jquery.js"></script>
<script src="<?php print base_url();?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php print base_url();?>assets/js/thumbnail-slider.js" type="text/javascript"></script>
<script src="<?php print base_url();?>assets/js/custom.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1">



<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<script type="text/javascript">

function get_more_find_art(a,b)
{
    var url='<?php echo base_url();?>index.php/search/search_view?searchtext='+a+'&art_type='+b;
    window.location.assign(url);
}
function subject_subcateg(main_category,keyword)
{
    var url ='<?php echo base_url();?>index.php/search/search_view?main_categ='+main_category+'&searchtext='+keyword+'&sortby=6';
    window.location.assign(url);
}
function artstyles_link(a,b,c)
{
    var url='<?php echo base_url();?>index.php/search/search_view?artstyles='+a+'&searchtext='+b+'&sortby=6&lot_pl='+c;
    window.location.assign(url);
}

function unhide(divID) {

    var item = document.getElementById(divID);
    if (item) {
        item.className=(item.className=='hidden')?'unhidden':'hidden';
    }
}
function close()
{
    location.replace('<?=  $_SERVER['PHP_SELF'];?>');
	return false;
}
function changeview(id)
{

    if(id==1)
    {
        $('#tab2').hide();
        $('#tab1').show();
    }
    else if(id==2)
    {
        $('#tab2').show();
        $('#tab1').hide();

    }
    else
    {
        $('#tab1').hide();
        $('#tab2').hide();
        $('#retrievepw').show();
    }

}

function call_search(category_id)
{
    var url="<?php print base_url(); ?>index.php/search/dosearch/"+category_id;
    location.replace(url);
}
function call_artists($keyword)
{
    var url='<?=base_url()?>index.php/search/dosearch/none/1/64/'+$keyword+'/3/none/none/none';
    window.location.assign(url);
}
function call_artstyles($keyword)
{
    var url='<?=base_url()?>index.php/search/dosearch/none/1/64/'+$keyword+'/3/none/none/none';
    window.location.assign(url);
}

function page_view(per_page)
{
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/'+per_page+'/<?php print $search_text;?>/<?php print $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>/<?php print $filterColor ?>';
    window.location.assign(url);
}

function call_filter(id)
{
    //alert(id);
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php print $search_text;?>/<?php print $sort_by;?>/<?php print $filter_product_type;  ?>/'+id+'/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>/<?php echo $filterColor; ?>';
    window.location.assign(url);
}

function call_filter2(id)
{
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php print $search_text;?>/<?php print $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/'+id+'/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>';
    window.location.assign(url);
}

function call_filter3(id)
{
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php print $search_text;?>/<?php print $sort_by;?>/'+id+'/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>';
    window.location.assign(url);
}

function call_filter_subject(category_id)
{
    var url='<?=base_url()?>index.php/search/dosearch/'+category_id+'/<?php print $page;?>/<?php print $limit; ?>/<?php print $search_text;?>/<?php print $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>';
    window.location.assign(url);
}

function call_filter_price(slab)
{
 
   // var sel_size=$('#sizes').val();
	/*if(sel_size=="")
	{
		//alert("Please select size ");
	}
	else
	{*/
		
	
	
   // var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php echo $search_text;?>/<?php echo $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/'+sel_size+'/'+slab+'/<?php print $shape ?>';
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php echo $search_text;?>/<?php echo $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/12/'+slab+'/<?php print $shape ?>';
    //alert(url);
    window.location.assign(url);
	//}
}

function call_filter_color(filterColor){
 
 //var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php echo $search_text;?><?php print $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/<?php print $shape ?>/'+filterColor;
  var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php echo $search_text;?>/<?php echo $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/12/<?php print $price_slab;  ?>/<?php print $shape ?>/'+filterColor;  
    window.location.assign(url);	
}

function call_filter_shapes(shape)
{
    var url='<?=base_url()?>index.php/search/dosearch/<?php print $category_id;?>/<?php print $page;?>/<?php print $limit; ?>/<?php echo $search_text;?>/<?php print $sort_by;?>/<?php print $filter_product_type;  ?>/<?php print $filter_collection;  ?>/<?php print $filter_medium;  ?>/<?php print $size;  ?>/<?php print $price_slab;  ?>/'+shape+'/<?php echo $filterColor; ?>';
    window.location.assign(url);
}


function category_filter(category)
{
    //alert(1);
    var url='<?=base_url()?>index.php/search/dosearch/none/1/64/'+category+'/none/none/none/none';
    window.location.assign(url);
}


function call_collection(filter_collection)
{
    //alert(id);
	var url='<?=base_url()?>index.php/search/dosearch/none/1/none/none/none/none/'+filter_collection;
	
   //var url='<?=base_url()?>index.php/search/dosearch/'+filter_collection;  
    window.location.assign(url);
}


function call_products(product_type)
{
    //alert(id);
    var url='<?=base_url()?>index.php/search/dosearch/none/1/64/none/none/'+product_type+'/none/none';
    window.location.assign(url);
}





function OnClickSearch()
{
	var searchtext=$('#searchtext').val();
   
           
            var sort=$('#sortby_dropdown').val();
            //var url='<?php echo base_url();?>index.php/search/dosearch/'+keyword+'/'+sort;
            //var url='<?php echo base_url();?>index.php/search/dosearch/<?php if(isset($category_id)){print $category_id;} else {print "none";} ?>/<?php if(isset($page)){print $page;} else {print "none";} ?>/<?php if(isset($limit)){print $limit;} else {print "none";} ?>/'+keyword+'/'+sort;
           // var url='<?php echo base_url();?>index.php/search/dosearch/none/none/none/'+keyword+'/'+sort+'/none/none/none';
             var url='<?php echo base_url();?>index.php/search/dosearch/none/1/64/'+searchtext+'/'+3+'/none/none/none';
			window.location.assign(url);
            return  true;
       
    
}





function checkSubmit(e)
{
	
    if(e && e.keyCode == 13)
    {
        if($('#searchtext').val()=="")
        {
            $('#search_error').html("<br>Enter a search keyword");
            return false;
        }
        else
        {
            $('#search_error').html("");
            var keyword=$('#searchtext').val();
            var sort=$('#sortby_dropdown').val();
            //var url='<?php echo base_url();?>index.php/search/dosearch/'+keyword+'/'+sort;
            //var url='<?php echo base_url();?>index.php/search/dosearch/<?php if(isset($category_id)){print $category_id;} else {print "none";} ?>/<?php if(isset($page)){print $page;} else {print "none";} ?>/<?php if(isset($limit)){print $limit;} else {print "none";} ?>/'+keyword+'/'+sort;
           // var url='<?php echo base_url();?>index.php/search/dosearch/none/none/none/'+keyword+'/'+sort+'/none/none/none';
             var url='<?php echo base_url();?>index.php/search/dosearch_frame/none/1/64/'+keyword+'/'+3+'/none/none/none';
			window.location.assign(url);
            return  true;
        }
    }
}

$(document).ready(function(){
// jquery written by kunal saxena

    $("#sign_up_submit").click(function() {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if($('#email_reg').val()=="")
        {
            $('#email_error').html("Please Enter Email");
            return false;
        }
        if(!emailReg.test($('#email_reg').val()))
        {
            $('#email_error').html("Enter a valid email");
            return false;
        }
        else if($('#password').val()=="")
        {
            $('#email_error').html("");
            $('#password_error').html("Enter a Password");
            return false;
        }
        else if($('#cpassword').val()=="")
        {
            $('#password_error').html("");
            $('#cpassword_error').html("Enter confirm Password");
            return false;
        }
        else if($('#cpassword').val()!=$('#password').val())
        {
            $('#password_error').html("");
            $('#cpassword_error').html("Password and confirm password do not match");
            return false;
        }
        else
        {
            $('#cpassword_error').html("");
            $.ajax({
                type: "POST",
                url: "<?php print base_url() ?>index.php/frontend/register",
                data: $("#signup_form").serialize(),
                success: function(data)
                {
                    if(data=="successful")
                    {
						$("#success_result").html("<center><span style='color:red; font-size:18px;'>Thank You For Registering!</span></center>");
                       // location.replace('<?php print base_url() ?>index.php/frontend/register_success');
                    }
                    else
                    {
                        $('#cpassword_error').html(data);
                    }
                }
            });
			$('#signup_form')[0].reset();
            return false;
        }
    });
	
	$('#dsend').click(function(){
		//alert(1);
	    if($('#dname').val()=="")
        {
           document.getElementById('dname').style.border = "solid 1px red";
            //alert("Please Enter Your Name.");
			
			return false;
        }
		else if($('#demail').val()=="")
        {
           document.getElementById('demail').style.border = "solid 1px red";
            //alert("Please Enter Your EamilId.");
			
			return false;
        }
		else{
		$.ajax({
			type:"POST",
			url:"<?php print base_url() ?>index.php/contact/process",
			data:$("#contactus_save").serialize(),
			success:function(data){
//alert(data);
					 $('#results').html(data);
					 //$('#frm_contact')[0].reset();
			}
			//$(".myform")[0].reset();
			
		});
		$('#contactus_save')[0].reset();
		return false;
		}
		
	});
	
	
	
	

    $('#login').click(function(){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if($('#email_login').val()=="")
        {
            $('#email_login_error').html("Please Enter Email");
            return false;
        }
        else if(!emailReg.test($('#email_login').val()))
        {
            $('#email_login_error').html("Enter a valid email");
            return false;
        }
        else if($('#password_login').val()=="")
        {
            $('#email_login_error').html("");
            $('#password_login_error').html("Enter a Password");
            return false;
        }
        else
        {
            var email = $('#email_login').val();

            var password= $('#password_login').val();
            var datastring='email=' + email  +  '&password=' + password ;
			//alert(datastring);
            $.ajax({
                type: "POST",
                url: "<?php print base_url() ?>index.php/frontend/login",
                data: datastring,
                success: function(data)
                {

                    if(data=="successful")
                    {
                        //window.location.assign('<?=base_url()?>index.php/user/index');
                        location.replace('<?=base_url()?>index.php');
                    }
                    else
                    {
                        $('#login_error').html("<br>Invalid Email or Password");
                    }
                }
            });
            return false;
        }

    });

    $("#forgot_password_bt").click(function() {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!emailReg.test($('#email_forgot').val()))
        {
            $('#email_forgot_error').html("Enter a valid email");
            return false;
        }
        else
        {
            var email = $('#email_forgot').val();
            var datastring='email=' + email;
            $.ajax({
                type: "POST",
                url: "<?php print base_url() ?>index.php/frontend/forgot_password",
                data: datastring,
                success: function(data)
                {

                    if(data=="success")
                    {
                        unhide('retrievepwconfirm');
                    }
                    else
                    {
                        $('#retrieve_pass_error').html("<br>Invalid Email");
                    }

                }
            });
            return false;
        }
    });

});
</script>


<script>
function valid(frm)
{
 if(frm.name.value=="")
 {
    alert("Please Enter Your Name...");
	frm.name.focus();
	return false;
 }
 if(frm.email.value=="")
 {
    alert("Please Enter Your email...");
	frm.email.focus();
	return false;
 }
 if(frm.mobile.value=="")
 {
    alert("Please Enter Your mobile...");
	frm.mobile.focus();
	return false;
 }
 if(frm.city.value=="")
 {
    alert("Please Enter Your city...");
	frm.city.focus();
	return false;
 }
 return true;
}
window.onload = function () {
     //document.getElementById("slider").style.display = "block";
};
$(document).ready(function(){
	$("#close_window").click(function(){
		$("#mailid").hide();
	});
	 $(document).bind('keydown', function(e) { 
        if (e.which == 27) {
           // alert('esc pressed');
			$("#mailid").hide();
        }
    });
	 $(document).bind('keydown', function(e) { 
        if (e.which == 27) {
           // alert('esc pressed');
			$("#logindiv").hide();
        }
    });
	$(".helpopbox").click(function(){
		$(".helpbox-container").show();
	});
	
	 $(document).bind('keydown', function(e) { 
        if (e.which == 27) {
           // alert('esc pressed');
			$("#light").hide();
        }
    });
});

 
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#target").submit(function(){
			var email 			= $('#email').val();
			var contact 			= $('#contact').val()
			var emailcheck 			= /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
			var contact_check 		= /^([0-9\-\+])+$/;
			if((email=='') && (contact==''))
			{
				alert("Please enter one of the feild");
				$("#email").focus();
				return false;
			}
			else if((email!='') && (emailcheck.test(email)=="")){
				alert("Please enter valid email");
				$("#email").focus();
				return false;
			}
			else if((contact!='') && (contact_check.test(contact)=="")){
				alert("Please enter valid number");
				$("#contact").focus();
				return false;
			}
			else{
				return true;
			}
		});
	});
        
     
	 
	 
    function get_lightBoxName(img_id)
 {
     
     $.ajax({
	             type: "POST",
		      url: "<?php print base_url() ?>index.php/frontend/get_light_boxName",
		      data:"img_id="+img_id,
		      success: function(response)
		      {    
                          //alert(response);
                         $('#show_ligt_box_name').val(response);
	                  
                      }
	    });
     
 }// end function
    
 
    
 
	
        
        function call_create_lightbox()
{
    //alert('call for create gallary');
	if($('#lightbox_name').val()=="")
	 {
	 	$("#lightbox_error").html("Enter Gallery Name.");
                return false;
	 }
	 else if($("#lightbox_des").val()=="")
	 {
	   $("#lightbox_error").html("Enter Gallery Description.");
	   return false;
	 }
	 else 
	 {
             
	   $("#lightbox_error").html("successfully created Gallary");
	    $.ajax({
	             type: "POST",
		      url: "<?php print base_url() ?>index.php/frontend/create_lightbox",
		      data: $("#lightbox_submit").serialize(),
		      success: function(response)
		      {    
                              
	                    var data = $.parseJSON(response);
			   var str= toTitleCase(data.data1[0]);
	                    $("#lightbox_des").val("");
	                    $('#lightbox_name').val("");
	                    alert("Gallery has been created.");
			   alert('Please select "'+str+'" from "My Gallery" option mentioned below to add this image');
	                    $("#lightbox_list_dropdown").append('<option value='+data.data2[0]+'>'+data.data1[0]+'</option>');
	          }
	          });
	  }
}

        function show_subjects(subjects,name_id)
            {
               // alert(subjects+'-'+name_id);
               document.getElementById('menus_id').innerHTML=subjects+'<a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;';
               document.getElementById('name_id').innerHTML=name_id+'<a href="javascript:goBack();"><img src="<?php echo base_url()?>assets/images/delete.png"  width="10" height="10"/>&nbsp;';
            }// end function
        
        
        
	</script>
	<?php if($this->session->flashdata('help_message')){//print $this->session->flashdata('help_message'); ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#light").show();
		});
		</script>
	<?php } ?>

</head>
    
    <script type="text/javascript">
        function GetTotalImages() { 
           
      var totalnoofimages= document.getElementById('totalnoofimages').value;
            document.getElementById('totalnoimages').innerHTML=totalnoofimages;
             }
        </script>
     
    <body onload="return GetTotalImages();">
    
    
<? //$user_id=$this->session->userdata('userid');?>





       <header role="banner" class="navbar navbar-default">
    
        
        <div class="news pull-right">  
        
        
        <p style="float:right;"> <a href="#" class="header_link"> <i class="glyphicon glyphicon-earphone"></i>  011-41828972</a>    &nbsp; &nbsp;     <a href="mailto:info@wallsnart.com" class="header_link"> <i class="glyphicon glyphicon-envelope"></i> info@wallsnart.com</a> </p>   
        
        
        
        
        </div>
        
        
        <a id="toggle" href="#"><i class="fa fa-bars"></i></a>
        
        
<div id="overlay"></div>
        
        
      
      
      
      
    
   
    
    
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

   
    
    
	  
	  
	  <script>$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
        </script>
        
        
      
<style>.search-input button {
        border: 0;
    background: none;
    padding: 2px 5px;
    margin-top: -23px;
    position: absolute;
    right: 22px;
    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    }
 
    .search-input:focus + button {
        z-index: 3;   
    }
    tt
    </style>
        
       
        
    	<div class="header-content" onmouseover="return dropdownout('drop1','drop2','drop3','drop4','drop5','drop6','drop7','drop8','drop9');">
        
        <div class="col-md-4" style="padding:3px 0px;">
        
        	<a href="<?php print base_url(); ?>"><img src="<?php print base_url(); ?>assets/img/one.png" border="0" width="auto" height="55px" class="fll"></a>
            
            
           </div> 
           
           
          
          <div class="col-md-3" style="padding: 18px 48px; box-sizing: border-box;"> 
          <span class="search-input">
                	
					
					 <span class="search-input">
                	<input  name="searchtext" id="searchtext" type="text" placeholder="Search What You Want..." value="<?php if((isset($search_text))&&($search_text!="none")){print str_replace('%20', ' ', $search_text); } ?>" onkeydown="checkSubmit(event);">
                </span>
                <button type="submit" class="btn tt" onclick="return OnClickSearch();"><i class="glyphicon glyphicon-search"></i></button>
				
            </span> 
            </div>
           
           
         
           <div class="col-md-5 help">
           
           <ul style="margin:0px; padding:3px 0px;">
           
           
           <li> <a href="<?php print base_url(); ?>index.php/frontend/contact"> <i class="glyphicon glyphicon-earphone"></i>  Help </a> </li>
           <li>  <a <?php    if(!$this->session->userdata('userid')){?>
                href="javascript:void(0)"
                onclick="login('');"
            <?php  }else{ ?>
                href="<?php  echo base_url();?>index.php/frontend/lightbox" 
            <?php }?>> <i class="glyphicon glyphicon-user"></i>  My Gallery </a>    </li>
            
            
          
          
          <?php if($this->session->userdata('userid')){
            $user_id=$this->session->userdata('userid');
            $user_data=$this->user_model->get_user_details($user_id);?>
            
                <a  href="<?=base_url()?>index.php/frontend/logout">Sign Out</a>
           
           
                <a  href="<?=base_url()?>index.php/user/profile"> Welcome 
				
				<?php if ($user_data->first_name){
                        echo $user_data->first_name;
                    }else echo "User";?>
                </a>
             <?php }else{?>   
           <li> <a href="#" onclick="return login('');"> <i class="glyphicon glyphicon-lock"  ></i>  Sign up | </a>    </li>
           
            <li> <a href="#" onclick="return login('');">   Log in </a>  </li>
            <?php }
			if($this->session->userdata('userid')){
			?>
           <li> <a style="position:relative" href="<?=base_url()?>index.php/cart/cart_view"> <i class="glyphicon glyphicon-shopping-cart cart-size">  </i>   <span id="HeaderCartCount" class="hdr-cart-count"><?php if($this->session->userdata('userid')){
                        $num=$this->cart_model->count_cart_byid($this->session->userdata('userid')); $sum=0;foreach($num as $quant){
                            $sum=$sum + $quant['qty'];
                        } print $sum;
                    }

                    else
                    {
                        
    echo '0';}?></span> </a> </li>
           <?php }if(!$this->session->userdata('userid')){?>
            
             <li> <a style="position:relative" href="#" onclick="return login('');"> <i class="glyphicon glyphicon-shopping-cart cart-size">  </i>   <span id="HeaderCartCount" class="hdr-cart-count">0</span> </a> </li>
             <? }?>
           </ul>
    
           
           
           
           
           </div> 
            
            
            
            
             <div id="slide" style="right:-400px;">
<div id="sideba" onclick="open_panel()"><img src="<?php print base_url(); ?>images/contact.png"></div>
<div id="heade">
<div id="results" style="color:red"></div>

<form name="frm_contact" id="contactus_save" >
					
					
			<div class="pull-left" style="display:block; width:100%; margin-bottom:10px;">
                              <div class="pull-left"> <strong>Call us at:</strong><br>
                                
                               <a href="#"> +91-11-41828972</a></div><div class="pull-left"> OR </div><div style="margin-left:17px;" class="pull-left"> <strong>Mail us at:</strong><br>
                        <a href="mailto:info@wallsnart.com">info@wallsnart.com</a></div>
                        </div>
			<p class="inline_text">Submit the details below and our client executive will get in touch with you.</p>
					<input class="formtex" type="text" name="dname" placeholder="Your Name *" id="dname" >
					<input class="formtex" type="text" name="demail" placeholder="Your Email *" id="demail" >
					<input class="formtex" type="text" name="dmobile" placeholder="Your Mobile Number" id="dmobile">
					<input class="formtex" type="text" name="dcompany" placeholder="Your Company" id="dcompany">
					<input class="formtex" type="text" name="dcity" placeholder="Your City" id="dcity">
                                       <textarea class="formtex"  placeholder="Your Query" name="dtarea" id="dtarea"></textarea>
					<button class="center-block" id="dsend">Send Message</button>
					</form></div>
</div>

<script>
/*
------------------------------------------------------------
Function to activate form button to open the slider.
------------------------------------------------------------
*/
function open_panel() {
slideIt();
var a = document.getElementById("sideba");
a.setAttribute("id", "sidebar1");
a.setAttribute("onclick", "close_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (open form)
------------------------------------------------------------
*/
function slideIt() {
var slidingDiv = document.getElementById("slide");
var stopPosition = 0;
if (parseInt(slidingDiv.style.right) < stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
setTimeout(slideIt);
}
}
/*
------------------------------------------------------------
Function to activate form button to close the slider.
------------------------------------------------------------
*/
function close_panel() {
slideIn();
a = document.getElementById("sidebar1");
a.setAttribute("id", "sideba");
a.setAttribute("onclick", "open_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (slide in form)
------------------------------------------------------------
*/
function slideIn() {
var slidingDiv = document.getElementById("slide");
var stopPosition = -400;
if (parseInt(slidingDiv.style.right) > stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
setTimeout(slideIn, 1);
}
}
</script>
<style>
#dsend {
    background: none repeat scroll 0 0 orange;
    border: none;
    color: #fff;
    width: 60%;
    font-size: 22px;
    font-weight: bolder;
    padding:3px;
    border-radius: 3px;
    cursor: pointer;
    margin-top: 20px;
}

#slide {
width:572px;
top:100px;
z-index:9;

    top: 0;
    bottom: 0;
position:fixed


}
#heade {
margin-top:50px;
width:400px;
height:530px;
position:absolute;
right:0;
border:1px solid #d8d8d8;
margin-left:40px;
padding:20px 40px;
border-radius:3px;
background:white;

box-shadow:0 0 8px gray
}
#sideba {
position:absolute;
top:180px;
left:125px;
box-shadow:0 0 8px gray
}
#sideba img { cursor:pointer;}
#sidebar1 img {cursor:pointer;}

#sidebar1 {
position:absolute;
top:180px;
left:128px;
box-shadow:0 0 8px gray
}
h3 {
font-family:'Roboto Slab',serif
}
.formtex{
margin-top:10px;
padding:6px;
width:100%;
font-size:15px;
border-radius:2px;
border:3px solid #98d0f1
}
h4 {
font-size:15px
}





</style>
       
            
         
				
             
        
    </header>
    
    
    
    
    
    <!-- header -->
    
    
    
    
    
    
    
    
    
    


    <style>
	.product-up p , .product-up2  p { text-align:center !important;}
	p{font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; margin:inherit;}
	
div#overlay { display: none; }
a#toggle {
  position: fixed;
  top: 10px;
  left: 10px;
  width: 40px;
  height: 40px;
  background-color: #444444;
  text-align: center;
  color: white;
  display: none;
  transition: all ease-out 0.3s;
}
.artist li{ float:none !important;}
.artstyle2{ width:199px !important;}

a#toggle i {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}

main#content { padding: 10px;}

#menu {
  text-align: center;
  transition: all ease-out 0.3s;
}

#menu ul {
  margin: 0;
  padding: 0;
  
  position:relative;
}

#menu ul li {
	float:left;
	
	 
  
}

.menu2 li{ float: none !important;}
#menu ul li ul li a {
	
	    font-size: 15px; !important;; 
}

#menu ul li > a {
  display:block;
  color:#FFF;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
   padding: 11px 16px 10px 0px;
    font: 13px/100% HelveticaNeue,"Helvetica Neue",Helvetica,Arial,sans-serif;
    letter-spacing: 1.25px;
  
  
}
.fistn-layer{ width:20%;}

#menu .menu2 li a{padding: 5px 13px; letter-spacing:inherit !important;} 

#menu ul li > a > i {
  margin-left: 15px;
  transition: all ease-out 0.3s;
  -webkit-transition: all ease-out 0.1s;
}


.menu2 { width:auto !important;}
#menu ul li ul {
      display: none;
    position: absolute;
    top: 16px;
    width: 200px;
    text-align: left;
    margin: auto;
    left: 0px;
    width: 100%;
	/*width: 75%;*/
    margin: 0px auto;
    right: 0px;
}
#menu .menu2 {
position:static !important;
}

#menu .menu2 li a { color:#000 !important;}
#menu ul li ul li { display: block; }
#menu ul li ul li a { display: block; }

#menu li > a:hover{ color:#ff9800; text-decoration:none;}

#menu .menu2 li:hover > a { color: #e19a28 !important; }

#menu ul li:hover > a > i { transform: rotateZ(90deg); text-decoration:none; }

#menu ul li:hover ul { display: block; }

#mouse-over {
    width: 100%;
    background: #fff;
    padding: 12px;
    position: absolute;
    top: 16px;
    left: 0px;
    border: 3px solid #e19a28;
    min-height: 470px;
    -webkit-box-shadow: 0px 6px 7px #CCC;
    -moz-box-shadow: 0px 6px 7px #CCC;
    box-shadow: 0px 6px 7px #CCC;
    z-index: 9999;
}

#sub-pic {
    width: 197px;
    float: left;
    height: 200px;
	padding: 10px;
}

#sub-pi img { float:left;}

.n-layer{ float:left; }

.rowour{ background-color:##f7f7f7; width:100%;}
#menu ul li > a > i { display:none;}

.collections-one ul { margin-top:255px !important;}
.collections-one ul { line-height:15px;}
.collections-one ul li > a { padding: 3px 18px !important; color:#000 !important; }
.collections-one li > a:hover { color: #e19a28 !important;}
.normal-sub{
    left: inherit !important;
    width: 192px !important;
    z-index: 9999;
    top: 34px !important;
    margin: 0px 19% 0% 0% !important;
	
}
.collct{ width:294px;}
.collct ul li{ float:none !important;}
.product-our { width:294px;}
.normal-sub li a { background-color:rgba(0,0,0, 0.6);}
.normal-sub li a:hover{ background-color:rgba(0,0,0, 0.8);}
.artist{ float:left;}
@media screen and (max-width: 767px) {

a#toggle { display: block; }
#menu ul li > a > i { display:block;}
.artist{ float:none; width:auto;}
main#content {
  margin-top: 65px;
  transition: all ease-out 0.3s;
}
.n-layer{ float:none;}
#menu {
  position: fixed;
  width: 250px;
  height: 100%;
  top: 0;
  left: 0;
  overflow: hidden;
  overflow-y: auto;
  background-color: #444444;

  transform: translateX(-250px);
}

#menu ul {
  text-align: left;
  background-color: transparent;
  
}

#menu ul li { display: block; }

#menu ul li a { display: block; }

#menu ul li a > i { float: right; }

#menu ul li ul {
  display: none;
  position: static;
  width: 100%;
  
}

#menu ul li:hover > ul { display: none; }

#menu ul li:hover > a > i { transform: rotateZ(0); }

#menu ul li.open > a { background-color: #444444; }

#menu ul li.open > a > i { transform: rotateZ(90deg); }

#menu ul li.open > ul { display: block; }

div#overlay {
  display: block;
  visibility: hidden;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: #444444;
  transition: all ease-out 0.3s;
  z-index: 1;
  opacity: 0;
}

html.open-menu { overflow: hidden; }

html.open-menu div#overlay {
  visibility: visible;
  opacity: 1;
  width: calc(-150%);
  left: 250px;
}

html.open-menu a#toggle,
 html.open-menu main#content { transform: translateX(250px); }

html.open-menu nav#menu {
  z-index: 3;
  transform: translateX(0);
}
#mouse-over{ position:static;}
.n-layer , #mouse-over{ width:auto;}

}
</style>
    
    
   <div style=" background-color:#999; height:35px;"> 
 
    <div class="offers">
    
    <nav id="menu" >
  <ul>
  <li> <a href="#">HOME </a> </li>
  
    <li><a href="<?php print base_url(); ?>index.php/frontend/art_subject"> SUBJECTS </a>
    
            
    <ul>
    
    <div id="mouse-over">
    
    
   
       
          
            <?php 
           $sub_val=$this->frontend_model->get_header_images(1);
         
          
            ?>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[0]->keyword?>" ><img src="<?php print base_url();?><?=$sub_val[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[0]->title)?><!--Animal--> </span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[1]->keyword?>" ><img src="<?php print base_url();?><?=$sub_val[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[1]->title)?><!--Animal--> </span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[2]->keyword?>" ><img src="<?php print base_url();?><?=$sub_val[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($sub_val[2]->title)?>   <!--Cuisine--></span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[3]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($sub_val[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[4]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($sub_val[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$sub_val[5]->keyword?>"><img src="<?php print base_url();?><?=$sub_val[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($sub_val[5]->title)?>  <!--Animal--> </span></a></div>
           
           
            
          
			
              
           
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer fistn-layer">
         
         <ul class="menu2">
         
        
        
         <?php
                       $subjects=$this->search_model->get_subcategory(1);
                        for($i=0;$i<=7;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
         
        
            
         </ul>
         
         </div>
         
         
         
         
         
         
         
         
         
         <div class="n-layer fistn-layer">
         <ul class="menu2">
         
        <?php
                        for($i=8;$i<=15;$i++){
						
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer fistn-layer">
         <ul class="menu2">
          <?php
                        for($i=16;$i<=23;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords?>');"><?php print ucwords($subjects[$i]->name);?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer fistn-layer">
         <ul class="menu2">
          <?php
                        for($i=24;$i<=30;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         <div class="n-layer fistn-layer">
         <ul class="menu2">
           <?php
                        for($i=31;$i<=41;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#"> See all Subjects </a> </a> </div>
			<!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/art_subject"> See all Subjects </a> </a> </div>-->
            
            </div>
    
     </ul>
    
    
    
    </li>
    
    
  <!---dddcdc-->
  
    
    
    
    
    
    
    
    
    <li> 
	<a href="<?php echo base_url();?>index.php/frontend/artists"> ARTISTS </a>
    
    <ul>
    
    <div id="mouse-over">
          
           <?php  
           $drop2=$this->frontend_model->get_header_images(2);
          //print_r($drop2);
          
            ?>
            <div  id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop2[0]->keyword?>" ><img src="<?php print base_url();?><?=$drop2[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop2[0]->title)?> <!--Architecture--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop2[1]->keyword?>" ><img src="<?php print base_url();?><?=$drop2[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop2[1]->title)?><!--Animal--> </span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop2[2]->keyword?>" ><img src="<?php print base_url();?><?=$drop2[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop2[2]->title)?>   <!--Cuisine--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/michelangelo/3/none/none/none/<?=$drop2[3]->keyword?>"><img src="<?php print base_url();?><?=$drop2[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop2[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop2[4]->keyword?>"><img src="<?php print base_url();?><?=$drop2[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop2[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop2[5]->keyword?>"><img src="<?php print base_url();?><?=$drop2[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($drop2[5]->title)?>  <!--Animal--> </span></a></div>
           
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer">
         
         
         <ul class="menu2">
         
		 <div class="col-md-8" style="width:724px; border-right:solid 1px #FC0;margin:8px 0px;">
		 
		 
		 <div class="artist">
		
        
        <a style="display:block; padding:8px 0px; text-align:center; font-weight:600;" href="<?php echo base_url();?>index.php/frontend/artists">International Artist  </a>
                    <div style="float:left; width:230px;">
                    
                 
                    
                     <?php
                        $subjects=$this->search_model->get_subcategory(84);
						//print_r($subjects);
                        for($i=0;$i<=7;$i++){
                           $artist= $subjects[$i]->name;
                       if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
                           
					 
                            ?>
                        <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                             
                     <?php }}?>

                
                    </div>
                      
                    
                     <div style="float:left; width:230px;">
                    
                   
                     <?php 
                       for($i=8;$i<=14;$i++){
                           $artist= $subjects[$i]->name;
                       if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
					 
                            ?>
                        <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                     <?php }}?>
                   
                   
				   
				    
                    
                   </div>
				   
				   
				   <div style="float:left; width:230px;">
				    <?php 
					 for($i=15;$i<=22;$i++){
					  $artist= $subjects[$i]->name;
                      if($artist!='Deepali Mundra' && $artist!='Narahari Bhawandla' && $artist!='Prashant Yampure' && $artist!='Shweta Sharma' && $artist!='Subhasish Chakravarty' && $artist!='Vinayak Jarang') {
                           
					 
                            ?>
                        <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                     <?php }}?>
				   </div>
                   
                   
                   </div></div>
				   
		 <div class="col-md-2">
		 
		 
		 
		 
		 <div class="artist">
                   
                   <div style="float:left; margin:8px 0px;">
        
        <a style="display:block; padding:8px 0px; text-align:center; font-weight:600;" href="<?php echo base_url();?>index.php/frontend/artists"> Indian Artist  </a>
                    <div style="width:230px; float:left;">
                    
                 
                    
                     <?php 
                       for($i=0;$i<=count($subjects);$i++){
					   
					   $artist= $subjects[$i]->name;
                       if($artist=='Deepali Mundra' || $artist=='Narahari Bhawandla' || $artist=='Prashant Yampure' || $artist=='Shweta Sharma' || $artist=='Subhasish Chakravarty' || $artist=='Vinayak Jarang') {
                            ?>
                        <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                     <?php }}?>

                
                    </div>
                    
                     <div style="width:230px; float:left;">
                    
                   
                                     
                   
                    
                   </div>
                   
                   </div>
                   
                   
                    
                   
                  
                    </div></div>
					
		 <div class="col-md-1"><div class="col-sm-2" style="width:230px; float:left;">
                   
                   <div style="width:12px; float:left; margin:8px 0px;">
        
        
                    <div style="width:170px; float:left;border-left: solid 1px #FC0; margin:8px 0px; padding:0px 10px;">
        
        <a style="display:block; padding:8px 0px; text-align:center; font-weight:600;" href="<?php echo base_url();?>index.php/frontend/artists"> NEW & EXCLUSIVE  </a>
                    <div style="width:160px; float:left;">
                    
               
                        <a href="#"> <img src="<?php print base_url();?>assets/img/art-style/get.JPG"  border="0" width="100%"> </a>
                        <p>Get to know today's  </p>

                
                    </div>
                    
                    <!---we can any write-->
                    
                     
                   
                   </div>
                    
                    
                   
                   </div>
                   
                  
                    </div></div>
		 
		 
		 
		 
        
        
                   
                   
                   
                    
                    
                    
                    
                    
                    
                    
            
         </ul>
         
         </div>
         
         
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;" href="#"> See all Artists </a> </div>
			
			 <!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;" href="<?php echo base_url();?>index.php/frontend/artists"> See all Artists </a> </div>-->
            
            </div>
    
     </ul>
    
    
    </li>
    
    
    
    <!---3333-->
    
    
    <li> <a href="<?php echo base_url();?>index.php/frontend/art_styles">ART STYLES </a>
    
    
    <ul>
    
    <div id="mouse-over">
    
    
   
       
          
           <?php 
           $drop3=$this->frontend_model->get_header_images(3);
          //print_r($drop3);
          
            ?>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[0]->keyword?>" ><img src="<?php print base_url();?><?=$drop3[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop3[0]->title)?> <!--Architecture--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[1]->keyword?>" ><img src="<?php print base_url();?><?=$drop3[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop3[1]->title)?><!--Animal--> </span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[2]->keyword?>" ><img src="<?php print base_url();?><?=$drop3[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop3[2]->title)?>   <!--Cuisine--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[3]->keyword?>"><img src="<?php print base_url();?><?=$drop3[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop3[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[4]->keyword?>"><img src="<?php print base_url();?><?=$drop3[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop3[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop3[5]->keyword?>"><img src="<?php print base_url();?><?=$drop3[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($drop3[5]->title)?>  <!--Animal--> </span></a></div>
           
           
            
          
			
              
           
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer artstyle2">
         
         <ul class="menu2">
         
        
        
        <?php
                        $subjects=$this->search_model->get_subcategory(2);
                        for($i=0;$i<=3;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
         
        
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2 ">
         
      <?php
                        for($i=4;$i<=8;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2 ">
          <?php
                        for($i=9;$i<=13;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name);?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
          <?php
                        for($i=14;$i<=18;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
          <?php
                        for($i=19;$i<=25;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Art Styles</a> </div>
			
			<!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php echo base_url();?>index.php/frontend/art_styles">See all Art Styles</a> </div>-->
            
            </div>
    
     </ul>
      
      </li>
      
      
      
      
     
      
      
      
        <!----5 end----> 
    
  <!--  
    <li> <a href="<?php print base_url(); ?>index.php/frontend/product_type">PRODUCTS</a>
    
     <ul>
    
    <div id="mouse-over">
    
    
   
       
           <?php 
           $drop5=$this->frontend_model->get_header_images(4);
          //print_r($drop5);
          
            ?>
            
            
            <div>
			
            <div class="product-up product-our col-md-3"> <p style="padding:5px 0px; font-size:18px;"> <?php echo ucwords($drop5[0]->title)?> </p> <a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop5[0]->keyword?>"><img src="<?php print base_url();?><?=$drop5[0]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <!--Cuisine--></span></a></div>
            
            <div class="product-up2 product-our col-md-3"><p style="padding:5px 0px; font-size:18px;"> <?php echo ucwords($drop5[1]->title)?> </p> <a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop5[1]->keyword?>"><img src="<?php print base_url();?><?=$drop5[1]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><!--Cuisine--></span></a></div>
            
            <div class="product-up product-our col-md-3"><p style="padding:5px 0px; font-size:18px;"> <?php echo ucwords($drop5[2]->title)?> </p><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop5[2]->keyword?>"><img src="<?php print base_url();?><?=$drop5[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <!--Cuisine--></span></a>
          </div>
          
          
          <div class="product-up product-our col-md-3"><p style="padding:5px 0px; font-size:18px;"> <?php echo ucwords($drop5[3]->title)?> </p><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop5[3]->keyword?>"><img src="<?php print base_url();?><?=$drop5[3]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <!--Cuisine--></span></a>
          </div>
            
            </div>
           
           
            
          
			
              
           
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer">
         
         <ul class="menu2">
         
         
         </ul>
         
         </div>
         
         
         <div class="n-layer">
         
         <ul class="menu2">
         
     
            
         </ul>
         
         </div>
         
         <div class="n-layer">
         <ul class="menu2">
          
         </ul>
         
         </div>
         
         <div class="n-layer">
         <ul class="menu2">
          <?php
                        for($i=24;$i<=30;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         
         <div class="n-layer">
         <ul class="menu2">
         
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Products</a> </div>
			
			 <!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/product_type">See all Products</a> </div>-->
            
            </div>
    
     </ul>
    
    </li>
    -->
    
      <!----5 end----> 
      
      
      
      <!----4---->
      
      
      
    
     <li><a href="<?php print base_url(); ?>index.php/frontend/collection">COLLECTIONS</a>
       <ul>
        <div id="mouse-over">
          
            <?php 
           $drop4=$this->frontend_model->get_header_images(5);
          //print_r($drop4);
          
            ?>
        <div class="collections-one collct ourcol-md-3">
                 
                 
                 <p style="padding:5px 0px; font-size:18px;"> <?=$drop4[0]->title?> </p> <a href="#"><img src="<?php print base_url();?><?=$drop4[0]->menu_image?>"  border="0" width="100%" style="padding:0px 0px 5px 0px;" /></a>
                 
                 
                 <?php   $collection=$this->search_model->get_subcategory(85);
				 
                  // print_r($collection);
                    ?>
                   
                    <br />
                    <ul style="padding: 36px 0px;">
                           <?php 
						   $api_collections=$this->frontend_model->get_collection();
           
                           // print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==4){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                               
                              
                           ?>
                      </ul>
                 
                 </div>
                 
                 
                 <div class="collections-one collct col-md-3">
                 <p style="padding:5px 0px; font-size:18px;"> <?=$drop4[1]->title?>  </p> <a href="#"><img src="<?php print base_url();?><?=$drop4[1]->menu_image?>"  border="0" width="100%" style="padding:0px 0px 5px 0px;" /></a>
                 
                 <br />
        
             <ul style="padding: 36px 0px;">
                          <?php 
                           
                   // print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==2){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              
                           ?>
                    </ul>
         
                    
                 </div>
                 
                 
                 <div class="collections-one collct col-md-3">
                 <p style="padding:5px 0px; font-size:18px;"> <?=$drop4[2]->title?></p> <a href="#"><img src="<?php print base_url();?><?=$drop4[2]->menu_image?>"  border="0" width="100%" style="padding:0px 0px 5px 0px;" /></a>
                 
                  <br />
                <ul style="padding: 36px 0px;">
                           <?php 
                           
                   /// print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==3){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              

                           ?>
                    </ul>
                    
                    

                 </div>
                 
                 
                 <div class="collections-one collct col-md-3">
                 <p style="padding:5px 0px; font-size:18px;"> <?=$drop4[3]->title?>  </p> <a href="#"><img src="<?php print base_url();?><?=$drop4[3]->menu_image?>"  border="0" width="100%" style="padding:0px 0px 5px 0px;" /></a>
                 
                 <br />
               <ul class="menu2">
         <ul style="padding: 36px 0px;">
                            <?php 
                           
                   /// print_r($api_collections);
                           foreach($api_collections as $result){ 
                      $category= $result['category'];
					  $id= $result['id'];
                          if($category==1){
					   echo '<li><a href="javascript:call_collection('.$id.')"> '.ucwords($result['collection_name']).'</a></li>' ;  }
					   
                       }// end loop
                              
                           ?>
                    </ul>
            
         </ul>
                    
                 </div>
                 
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
          
          
          <!--1-->
         <div class="n-layer">
         <ul class="menu2">
         
                
            
         </ul>
         
         </div>
         <!--2-->
         <div class="n-layer">
         
         
         </div>
         <!--3-->
         <div class="n-layer">
         <ul class="menu2">
        
            
         </ul>
         
         </div>
         <!--4-->
         <div class="n-layer">
         
         
         </div>
         
         
         
         

         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Collections</a></a> </div>
			
			
			<!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/collection">See all Collections</a></a> </div>-->
            
            </div>
      </ul>
      
    </li>
    
    
    <!----4 end----> 
    
    
    
    
    
    
      
      
      
      <!--6--->
    
    <li>
	
	<a href="<?php print base_url(); ?>index.php/frontend/rooms">ROOMS</a>
    <ul>
    
    <div id="mouse-over">
    
    
   
       
          
         <?php 
           $drop6=$this->frontend_model->get_header_images(6);
          //print_r($drop6);
          
		    $spit0= split('/',$drop6[0]->keyword);
			 $spit1= split('/',$drop6[1]->keyword);
			  $spit2= split('/',$drop6[2]->keyword);
			   $spit3= split('/',$drop6[3]->keyword);
			    $spit4= split('/',$drop6[4]->keyword);
				 $spit5= split('/',$drop6[5]->keyword);
				
                                     if($spit0[1]=='frontend'){
                                              $url0=$drop6[0]->keyword;
                                          }else{
                                              $url0="index.php/search/dosearch/none/1/64/".$drop6[0]->keyword."";
                                          }if($spit1[1]=='frontend'){
                                              $url1=$drop6[1]->keyword;
                                          }else{
                                              $url1="index.php/search/dosearch/none/1/64/".$drop6[1]->keyword."";
                                          }if($spit2[1]=='frontend'){
                                              $url2=$drop6[2]->keyword;
                                          }else{
                                              $url2="index.php/search/dosearch/none/1/64/".$drop6[2]->keyword."";
                                          }if($spit3[1]=='frontend'){
                                              $url3=$drop6[3]->keyword;
                                          }else{
                                              $url3="index.php/search/dosearch/none/1/64/".$drop6[3]->keyword."";
                                          }if($spit4[1]=='frontend'){
                                              $url4=$drop6[4]->keyword;
                                          }else{
                                              $url4="index.php/search/dosearch/none/1/64/".$drop6[4]->keyword."";
                                          }if($spit5[1]=='frontend'){
                                              $url5=$drop6[5]->keyword;
                                          }else{
                                              $url5="index.php/search/dosearch/none/1/64/".$drop6[5]->keyword."";
                                          }
										 
		  //echo $url2.'_'.$url;
            ?>
            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url0?>" ><img src="<?php print base_url();?><?=$drop6[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop6[0]->title)?> <!--Architecture--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url1?>" ><img src="<?php print base_url();?><?=$drop6[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop6[1]->title)?><!--Animal--> </span></a></div>

            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url2?>" ><img src="<?php print base_url();?><?=$drop6[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop6[2]->title)?>   <!--Cuisine--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url3?>"><img src="<?php print base_url();?><?=$drop6[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop6[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url4?>"><img src="<?php print base_url();?><?=$drop6[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop6[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?><?=$url5?>"><img src="<?php print base_url();?><?=$drop6[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($drop6[5]->title)?>  <!--Animal--> </span></a></div>
           
           
            
          
			
              
           
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer artstyle2">
         
         <ul class="menu2">
         
        
        
         <?php
                        $subjects=$this->search_model->get_subcategory(859);
                        for($i=0;$i<=5;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');" onClick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
         
        
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         
        <?php
                        for($i=6;$i<=11;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         <?php
                        for($i=12;$i<=17;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name);?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
          <?php
                        for($i=18;$i<=22;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
           <?php
                        for($i=23;$i<=29;$i++){
                            ?>
                            <li>

                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Rooms</a> </div>
			
			
			<!-- <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/rooms">See all Rooms</a> </div>-->
            
            </div>
    
     </ul>
    
 </li>
    
    
     <!--6end--->
    
    
    
      <!--7--->
    
    <li> <a href="<?php print base_url(); ?>index.php/frontend/places">PLACES</a>
    
    
    <ul>
    
    <div id="mouse-over">
    
    
   
       
          
        <?php 
           $drop7=$this->frontend_model->get_header_images(7);
          //print_r($drop7);
          
            ?>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[0]->keyword?>" ><img src="<?php print base_url();?><?=$drop7[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop7[0]->title)?> <!--Architecture--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[1]->keyword?>" ><img src="<?php print base_url();?><?=$drop7[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop7[1]->title)?><!--Animal--> </span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[2]->keyword?>" ><img src="<?php print base_url();?><?=$drop7[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop7[2]->title)?>   <!--Cuisine--></span></a></div>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[3]->keyword?>"><img src="<?php print base_url();?><?=$drop7[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop7[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[4]->keyword?>"><img src="<?php print base_url();?><?=$drop7[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop7[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop7[5]->keyword?>"><img src="<?php print base_url();?><?=$drop7[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($drop7[5]->title)?>  <!--Animal--> </span></a></div>
           
           
          
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer artstyle2">
         
         <ul class="menu2">
         
        
        
         <?php
                        $subjects=$this->search_model->get_subcategory(857);
                        for($i=0;$i<=4;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
         
        
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         
       <?php
                        for($i=5;$i<=10;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         <?php
                        for($i=11;$i<=15;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name);?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
          <?php
                        for($i=15;$i<=20;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
           <?php
                        for($i=21;$i<=25;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
           <?php
                        for($i=26;$i<=26;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Places </a></a> </div>
			
			<!-- <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/places">See all Places </a></a> </div>-->
			 
            
            </div>
    
     </ul>
    
    
    </li>
    
    
      <!--7end--->
    
    
      <!--8--->
    <li> <a href="<?php print base_url(); ?>index.php/frontend/themes">THEMES</a>
    
    <ul>
    
    <div id="mouse-over">
    
    
   
       
          
       <?php 
           $drop8=$this->frontend_model->get_header_images(8);
          //print_r($drop8);
          
            ?>
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop8[0]->keyword?>" ><img src="<?php print base_url();?><?=$drop8[0]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop8[0]->keyword)?> <!--Architecture--></span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop8[1]->keyword?>" ><img src="<?php print base_url();?><?=$drop8[1]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop8[1]->title)?><!--Animal--> </span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop8[2]->keyword?>" ><img src="<?php print base_url();?><?=$drop8[2]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"> <?php echo ucwords($drop8[2]->title)?>   <!--Cuisine--></span></a></div>
			
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/<?=$drop8[3]->keyword?>"><img src="<?php print base_url();?><?=$drop8[3]->menu_image?>" border="0"width="100%" height="100%"> <span class="dblock1"> <?php echo ucwords($drop8[3]->title)?>  <!--Abstract--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/Jesus%20Christ/3/none/none/none/<?=$drop8[4]->keyword?>"><img src="<?php print base_url();?><?=$drop8[4]->menu_image?>" border="0" width="100%" height="100%"><span class="dblock1"><?php echo ucwords($drop8[4]->title)?> <!--Cuisine--></span></a></div>
            
            <div id="sub-pic"><a href="<?php print base_url(); ?>index.php/search/dosearch/none/1/64/sunrise/3/none/none/none/<?=$drop8[5]->keyword?>"><img src="<?php print base_url();?><?=$drop8[5]->menu_image?>"  border="0" width="100%" height="100%"><span class="dblock1">  <?php echo ucwords($drop8[5]->title)?>  <!--Animal--> </span></a></div>
           
           
            
          
			
              
           
            
            
            
            
            <div style="clear:both;"></div>
           
           
            <div class="sub-hor fist-sub-bar">
           
           <div class="rowour">
           
         <div class="n-layer artstyle2">
         
         <ul class="menu2">
         
        
        
        <?php
                        $subjects=$this->search_model->get_subcategory(880);
                        for($i=0;$i<=4;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');" onclick="return show_subjects('subjects','<?php print ucwords($subjects[$i]->name)?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
         
        
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         
      <?php
                        for($i=5;$i<=10;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
        <?php
                        for($i=11;$i<=15;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name);?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         <?php
                        for($i=16;$i<=20;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
         <?php
                        for($i=21;$i<=25;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         <div class="n-layer artstyle2">
         <ul class="menu2">
          <?php
                        for($i=26;$i<=26;$i++){
                            ?>
                            <li>
                                <a href="javascript:category_filter('<?php echo $subjects[$i]->keywords ?>');"><?php print ucwords($subjects[$i]->name); ?></a>
                            </li>
                        <?php } ?>
            
         </ul>
         
         </div>
         
         
         
         </div>
    
    
           <div style="clear:both;"></div>
           
            </div>
           
            <div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="#">See all Themes </a></a> </div>
			
			
			<!--<div class="rowour" style="text-align:center;"> <a style="padding:10px; color:#960; font-size:20px; text-align:center;"href="<?php print base_url(); ?>index.php/frontend/themes">See all Themes </a></a> </div>-->
			
            
            </div>
    
     </ul>
    
    
    </li>
    
      <!--8end--->
    
    
    
    <li> <a href="#">MAHATTA DESIGNS</a>
    
   
                <ul class="normal-sub">
                <li style="width:150px;"> <a style="padding: 6px 16px 10px 10px;" href="<?php print base_url(); ?>index.php/frontend/curators">  Curators  </a> </li>
                <li style="width:150px;"> <a style="padding: 6px 16px 10px 10px;" href="<?php print base_url(); ?>index.php/frontend/curators"> Testimonials </a> </li>
                
                </ul>
               
    
    </li>
    
   
  </ul>
</nav>
    
   </div>
    
   </div>
   
    <div id="blank" onmouseover="dropdownout('')">&nbsp;</div>
    
    <!-- navigation -->
    

<input type="hidden" id="api_image_id" value="<?=$api_image_id;?>" ></input>
<input type="hidden" id="image_id" value="<?=$images_id;?>" ></input>
<input type="hidden" id="img_id" value="<?=$images_id;?>" ></input>
<input type="hidden" id="show_ligt_box_name" value="" ></input>
<input type="hidden" id="image_filename" value="<?=$image_name;?>" ></input>









<div class="offers">

 <div class="col-md- off">
            
           <div id="skinnybanner_stp" class="walbanner">

</div>
            </div>
           </div>
           


<script>
(function($){
  var ico = $('<i class="fa fa-caret-right"></i>');
  $('nav#menu li:has(ul) > a').append(ico);
  
  $('nav#menu li:has(ul)').on('click',function(){
    $(this).toggleClass('open');
  });
  
  $('a#toggle').on('click',function(e){
    $('html').toggleClass('open-menu');
    return false;
  });
  
 
  
  $('div#overlay').on('click',function(){
    $('html').removeClass('open-menu');
  })
  
  
  
})(jQuery)
</script>

<script>
// create image if exist by sajid

 function check_exist_img(a,cat_id)
{
    
    
   
   if(a!=0)
     {
         
         var light_box_name=document.getElementById('show_ligt_box_name').value;
    
	       
             var gallery_img_id=$("#api_image_id").val();
            //alert(gallery_img_id);
              if(gallery_img_id!='')
              {
                var  image_id=gallery_img_id;
              }else{
                  image_id=$("#image_id").val();    
                }
                
        var img_id=$("#img_id").val(); 
        
      	 var k=$("#total_cost").html();
       	 var j=$("#c_sizes").html();
	   	 var l=$("#print_type_for_image").html();
    	 var datastring='gallery_img_id='+image_id+'&lightbox_id='+ a + '&image_id='+img_id+'&price='+ k +'&size='+ j +'&print_type='+l;
    	 $.ajax({
             type: "POST",
	     url: "<?php print base_url() ?>index.php/frontend/check_img_exist_status",
             data:datastring,
             success:function(datam)  
             {
              // alert(datam);
                if(datam==1)
                {
                var r=confirm("Do you want to add this image in this Gallery? " +light_box_name+" ");
                    if(r)
                     { 
           var str='gallery_img_id='+image_id+'&lightbox_id='+ a + '&image_id='+img_id +'&price='+ k +'&size='+ j +'&print_type='+l +'&check=1'+'&cat_id='+cat_id;
                  
            $.ajax({
    type: "POST",
            url: "<?php print base_url() ?>index.php/frontend/check_img_exist_status",
    data:str,
    success:function(datam)  
    {
        
       alert("Image has been successfully added to the Gallery. ");
          allclose('');
    }
 });
                }
	} else
                
      alert("This image already exists in this "+light_box_name+". Please choose another Gallery.");
             }
           });
		}
  }  
        
	 
	
        
      

</script>


<script>
    $(document).on('click','#add_to_cart', function(){
        var image_id=$(this).data('image_id');
        var image_filename=$(this).data('image_filename');
        var user_id=$('#user_id').val(); 
        var image_original_height=$('#image_original_height'+image_id).val(); 
        var image_original_width=$('#image_original_width'+image_id).val(); 
       var total_size=image_original_height+'X'+image_original_width;
    
        $.ajax({
           type:'post',
           url:'<?php print base_url() ?>index.php/cart/cart_detail_save',
           data:'image_id='+image_id+'&image_filename='+image_filename+'&user_id='+user_id+'&total_size='+total_size+'&action_method=search',
           success:function(response){
              // alert(response);
           }
           
       });
       
    });
    
    
  


$(document).on('click','#frame_add_to_cart', function(){
       var total_cost=$('#total_cost').html();
       var image_id=$('#image_id').val();
       var api_image_id=$('#api_image_id').val();
       var image_filename=$('#image_filename').val();
        var user_id=$('#user_id').val(); 
        var total_size=$('#sizes').val(); 
         var print_sizes=$('#print_sizes').val(); 
       
        $.ajax({
           type:'post',
           url:'<?php print base_url() ?>index.php/cart/cart_detail_save',
           data:'print_sizes='+print_sizes+'&total_cost='+total_cost+'&image_id='+image_id+'&api_image_id='+api_image_id+'&image_filename='+image_filename+'&user_id='+user_id+'&total_size='+total_size+'&action_method=search',
           success:function(response){
              if(response!='')
              {
                location.reload(); 
              }
           }
           
       });
       
    });
    
   
  
  function frame_it_addtocart(){
   
   var glasses= document.getElementById('glass').value;
  var glasses_coste= document.getElementById('glass_coste').value;
    
    var total_price=document.getElementById('total_price').innerHTML;
    var MountCost=document.getElementById('MountCost').innerHTML;
    var FrameCost=document.getElementById('FrameCost').innerHTML;
     var print_size=document.getElementById('print_h_w').value;
    var price=document.getElementById('print_price').innerHTML;
        
        var image_id=document.getElementById('image_id').value;
        var image_type=document.getElementById('imagsTypes').value;
        var user_id=document.getElementById('user_id').value;
        var mat1_size=document.getElementById('mount_size').innerHTML;
        var mat1_color=document.getElementById('mat1_color').value;
        var frame_color=document.getElementById('frame_color').value;
        var frameSize=document.getElementById('fat_frame').value;
     
        $.ajax({
             type: "POST",
	     url: "<?=base_url()?>index.php/frontend/frameit_addtocart",
             data: "glasses_coste="+glasses_coste+"&glasses="+glasses+"&FrameCost="+FrameCost+"&MountCost="+MountCost+"&total_price="+total_price+"&user_id="+user_id+"&img_id="+image_id+"&image_type="+image_type+"&mat_color="+mat1_color+"&mat_size="+mat1_size+"&frame_color="+frame_color+"&frameSize="+frameSize+"&images_size="+print_size+"&images_price="+price,
             success:function(response)  
             {
                if(response!=''){
             location.reload();
              }  
             }
               
         });
}// end function


    </script>




