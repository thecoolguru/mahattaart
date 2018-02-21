<!doctype html>
<html>
<head>
<title>
Mahatta
</title>

<link href="<?php  echo base_url('assets\booking_slots\slot_css\style.css');?>" rel="stylesheet">  
<link href="css\style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link  href="<?php  echo base_url('assets\booking_slots\slot_css\font-awesome.min.css');?>" rel="stylesheet">
</head>
<body>
<div class="wrap">
<form  method="post" action="<?php echo base_url('frontend/users_slot_booking2'); ?>">
<input type="NAME" name="name"  id="name" placeholder="Full Name:" value="<?php  if($this->input->post('name')){echo $this->input->post('name'); }?>" >
<input type="mail" name="email" id="email" placeholder="Email:" value="<?php  if($this->input->post('email')){echo $this->input->post('email'); }?>">
<br>
<input type="phone" onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="10" name="mobile" id="mobile" placeholder=" Phone No:" value="<?php  if($this->input->post('mobile')){echo $this->input->post('mobile'); }?>" >
<br>

<div class=" event-place">
<span class="location-select">Event Place </span>
<select name="event_place" id="event_place">
  <option value="" >Select</option>
  <option value="logix mall Noida" selected>logix mall Noida</option>
</select>

</div>

<div class="dob">
<span style="font-size:14px; color:#e4e1e1;"> Age </span>
<select name="day">
<option>Day</option>
<?php for($i=1; $i<=31;$i++){ ?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>


</select>

<select name="month">
<option>Month</option>
<?php 
$month=array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12');
?>
<option>Month</option>
<?php foreach ($month as  $key => $months){ ?>
<option value="<?php echo $key ?>"><?php echo $months ?></option>
<?php
}
?>


</select>

<select name="year">
<option>Year</option>
<?php for($i=2010; $i>=1975;$i--){ ?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>

</select>

</div>
<br>
<div class=" gender-one">
<span class="gender"> Gender</span>
<input type="radio" name="gender" id="male" value="Male" checked> <span class="selector" >Male</span>
<input type="radio" name="gender" id="female" value="Female"> <span class="selector">Female </span>
</div>
<br>



<lable class="march1"> Select Time</lable>

<section class="container-Two">
    <table class="cal">
      <caption>
        <span class="prev"><a href="">&larr;</a></span>
        <span class="next"><a href="">&rarr;</a></span>
        March 2018
      </caption>
      <thead>
        <tr>
          <th>Mon</th>
          <th>Tue</th>
          <th>Wed</th>
          <th>Thu</th>
          <th>Fri</th>
          <th>Sat</th>
          <th>Sun</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="off"><a href="">26</a></td>
          <td class="off"><a href="" >27</a></td>
          <td class="off"><a href="" >28</a></td>
          <td class="off"><a href="" >29</a></td>
          <td class="off"><a href="" >30</a></td>
          <td class="off"><a href="">31</a></td>
          <td><a href="">1</a></td>
        </tr>
        <tr>
          <td><a href="" >2</a></td>
          <td><a href="" >3</a></td>
          <td><a href="" >4</a></td>
          <td><a href="" >5</a></td>
          <td><a href="" >6</a></td>
          <td><a href="" >7</a></td>
          <td><a href="" >8</a></td>
        </tr>
        <tr>
          <td><a href="" >9</a></td>
          <td><a href="" >10</a></td>
          <td><a href="" >11</a></td>
          <td><a href="" >12</a></td>
          <td><a href="">13</a></td>
          <td><a href="">14</a></td>
          <td><a href="" >15</a></td>
        </tr>
        <tr>
          <td><a href="http://www.mahattaart.com/" target="black">16</a></td>
          <td><a href="" >17</a></td>
          <td><a href="" >18</a></td>
          <td><a href="" >19</a></td>
          <td><a href="" >20</a></td>
          <td><a href="" >21</a></td>
          <td><a href="">22</a></td>
        </tr>
        <tr>
          <td><a href="" >23</a></td>
          <td><a href="" >24</a></td>
          <td class="active"><a class="march"href="">25</a>
		          
				  
	  
		  
		  
		  </td>
          <td><a href="">26</a></td>
          <td><a href="">27</a></td>
          <td ><a href="">28</a></td>
          <td><a href="">29</a></td>
        </tr>
        <tr>
          <td><a href="">30</a></td>
          <td><a href="">31</a></td>
          <td class="off"><a href="">1</a></td>
          <td class="off"><a href="">2</a></td>
          <td class="off"><a href="">3</a></td>
          <td class="off"><a href="">4</a></td>
          <td class="off"><a href="">5</a></td>
        </tr>
      </tbody>
    </table>
	
</section>
  <div class="timing-one" id="">				   
				   
<ul class="timing">
 <li >
 <div id="slot_times">
 <button type="button" name='time' value="12:00pm">12:00pm </button>
 <button type="button" name='time' value="12:15pm">12:15pm </button>
 <button type="button" name='time[]' value="12:30pm">12:30pm </button>
 <button type="button" name='time[]' value="12:45pm">12:45pm </button>
 <button type="button" name='time[]' value="1:00pm">1:00pm </button>
 <button type="button" name='time[]' value="1:15pm">1:15pm </button>
 <button type="button" name='time[]' value="1:30pm">1:30pm </button>
 <button type="button" name='time[]' value="1:45pm">1:45pm </button>
 <button type="button" name='time[]' value="2:00pm">2:00pm </button>
 <button type="button" name='time[]' value="2:30pm">2:30pm </button>
 <button type="button" name='time[]' value="2:45pm">2:45pm </button>
 <button type="button" name='time[]' value="3:00pm">3:00pm </button>
 <button type="button" name='time[]' value="3:15pm">3:15pm </button>
 <button type="button" name='time[]' value="3:45pm">3:45pm </button>
 <button type="button" name='time[]' value="4:00pm">4:00pm </button>
 <button type="button" name='time[]' value="4:15pm">4:15pm </button>
 
 <button type="button" name='time[]' value="4:45pm"> 4:45pm </button>
 <button type="button" name='time[]' value="5:00pm"> 5:00pm </button>
 <button type="button" name='time[]' value="5:15pm"> 5:15pm </button>
 <button type="button" name='time[]' value="5:30pm"> 5:30pm </button>

 <button type="button" name='time[]' value="5:45pm"> 5:45pm </button>
 <button type="button" name='time[]' value="6:00pm"> 6:00pm </button>
 <button type="button" name='time[]' value="6:15pm"> 6:15pm </button>
 <button type="button" name='time[]' value="6:30pm"> 6:30pm </button>
 <button type="button" name='time[]' value="6:45pm"> 6:45pm </button>
 <button type="button" name='time[]' value="7:00pm"> 7:00pm </button>
 <button type="button" name='time[]' value="7:15pm"> 7:15pm </button>
 <button type="button" name='time[]' value="7:45pm"> 7:45pm </button>
 <button type="button" name='time[]' value="7:00pm"> 7:00pm </button>
 <button type="button" name='time[]' value="7:15pm"> 7:15pm </button>
 <button type="button" name='time[]' value="7:45pm"> 7:45pm </button>
 <button type="button" name='time[]' value="8:00pm"> 8:00pm </button>
 <button type="button" name='time[]' value="8:15pm"> 8:15pm </button>
 <button type="button" name='time[]' value="8:30pm"> 8:30pm </button>
 <button type="button" name='time[]' value="8:45pm"> 8:45pm </button>
 <button type="button" name='time[]' value="9:00pm"> 9:00pm </button>
</div>
</li>

</ul>
</div>
<div>	

	<input type="hidden"  name="time_selected" value="" id="time_selected">
<!--
<ul >
 <li class="timing">
 <button> 3:00pm </button>
<button> 3:15pm </button>
<button> 3:45pm </button>
<button> 4:00pm </button>
<button> 4:15pm </button>

<button> 4:45pm </button>
<button> 5:00pm </button>
<button> 5:15pm </button>
<button> 5:30pm </button>

<button> 5:45pm </button>
<button> 6:00pm </button>
<button> 6:15pm </button> 
<button> 6:30pm </button>
<button> 6:45pm </button>
<button> 7:00pm </button>
<button> 7:15pm </button>
<button> 7:45pm </button>
<button> 7:00pm </button>
<button> 7:15pm </button>
<button> 7:45pm </button>
<button> 8:00pm </button>
<button> 8:15pm </button>
<button> 8:30pm </button>
<button> 8:45pm </button>
<button> 9:00pm </button>

</li>

</ul>

-->

<span class="slots"> </span>
<input type="submit" class="submit" value="BOOK YOUR SLOT" id="submit"></button>  
<P class=" register-one"> 

 <br>  <input type="checkbox" name="register" value="YES" checked><span class="link">Register<span>Here to receive updates about  <br> latest events and exciting offers </p> 



 
</form>


</div>
<script src="<?php  echo base_url('assets\booking_slots\slot_js\jquery-3.3.1.min.js');?>"></script>

<script type ="text/javascript">
$(document).ready(function(){
    		
			$.ajax({
		    type:"POST",
		    url:"<?php echo base_url('frontend/check_slot_time'); ?>",
			data:"slot_time="+slot_time,
			success:function(response)
			 {
               $("#time_selected").html(response);
			    
			 }	
			 
		    })
});
</script>

<script type ="text/javascript">

$(document).ready(function()
	{
		$('button').click(function()
		{
          $(this).css("background","lightgreen",0);
		  slot_time = $(this).val();
		  slot_time = $('#time_selected').val(slot_time);
		  
		  $.ajax({
		    type:"POST",
		    url:"<?php echo base_url('frontend/users_slot_booking2'); ?>",
			data:"slot_time="+slot_time,
			success:function(response)
			 {
               $("#time_selected").html(response);
			    
			 }	
			 
		    })	
		  
        	
       });
    });
	
    </script>
    
    
    
    <script>
			  $(document).ready(function(e) {
				
				$('#submit').click(function(e) {
				 
				 var name=$('#name').val();
				 var email=$('#email').val();
				 var mobile=$('#mobile').val();
				 var time_selected=$('#time_selected').val();
				 
				 var email_check=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				 var mob_check=/^\d{10}$/;
				 time_selected
				 
				 if($("#name").val()=='')
			      {
			 	     alert('Please Enter  Your Name.');
				     $("#name").focus()
				      return false	
			     }
			    else if($("#email").val()=='')
			    {
			 	     alert('Please Enter Your Email.');
				     $("#email").focus()
				     return false	
			    } 
				else if(!email_check.test(email))
				  {
					  alert('Please Enter A Valid Email.')
					  $("#email").focus()
					  return false;
				  }
				else  if(mobile=='')
				 {
					 alert('Please Enter Your Mobile Number.')
					 $("#mobile").focus()
					 return false;
				 }
				 else if(!mob_check.test(mobile))
				 {
					 alert('Please Enter 10 Digit Mobile Number.')
					 $("#mobile").focus()
					 return false;
				 } 
				 else if($("#time_selected").val()=='')
			    {
			 	     alert('Please Select Slot Time.');
				     $("#time_selected").focus()
				     return false	
			    } 
				
				 
					 
				});
				
				});
        </script>

    
    
    
</body>
</html>