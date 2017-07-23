<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mahatta Gallery</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
</head>

<body id="home">

<div class="container"><div class="join-submain">


    <div id="recommend" style="color:red" >
	
	</div>
			<form action="javascript:" method="post" id="advisory_save_form">
			<div class="contact-join">
			    <h2>How can we help you with your project?</h2>
                <p>Please fill out the form below and we will get back to you shortly.</p>
				<label>Name*</label>
				<input name="name" id="name" value="" placeholder="Username"  type="text">
				<label>Email Address*</label>
				<input name="email_add" id="email_add" placeholder="Enter Your City Name"  type="text">
				<label>Contact</label>
				<input name="contact" id="contact" placeholder=""  type="text">
				<label>Message*</label>
                <textarea  placeholder="Type your message" name="comment" id="comment"></textarea>
                </div>
               <div class="send-button">
					<input value="Submit" onClick="save_art_advisory();" type="submit">
				</div> 
			</form>
		<div class="clearfix"></div>
	</div></div>
	<script>
	function save_art_advisory(){
	//alert('dd')
	
	var name=$('#name').val();
	if(!name){
	//alert('blank')
	$('#name').css("border","solid 1px red");
	$("#name").focus(function(){
	$(this).css("border","");
	});
	return false;
	//alert('blank')
	}
	var email_add=$('#email_add').val();
	if(!email_add){
	alert('blank')
	$('#email_add').css("border","solid 1px red");
	$("#email_add").focus(function(){
	$(this).css("border","");
	});
	return false;
	}
	var contact=$('#contact').val();
	
	var comment=$('#comment').val();
	if(!comment){
	
	$('#comment').css("border","solid 1px red");
	$("#comment").focus(function(){
	$(this).css("border","");
	});
	return false;
	}
	$.ajax({
	   type:'post',
	   url:'<?=base_url()?>frontend/save_art_advisory',
	   data:'name='+name+'&email_add='+email_add+'&contact='+contact+'&comment='+comment,
	   success:function(response){
	   alert(response)
	   if(response==1){
	      $('#recommend').html('Successfully Submitted');
	   
	   }
	   else{
	   $('#recommend').html('Error Occured');
	   }
	   }
	});
	$('#advisory_save_form')[0].reset();
		return false;
	}
	</script>
	
</div>    

<style>
.join-submain {
  margin-top: 2.2em;
}
.join-submain {
  width: 80%;
  margin:20px auto 0
}
.contact-join {
  position: relative;
  text-align: left;
  width: 100%;
}
.join-submain h2 {
  font-size: 2em;
  letter-spacing: 2px;
  text-align: left;
}
.contact-join label {
  color: #000;
  display: inline-block;
  font-size: 18px;
  font-weight: normal;
  width: 100%;
}
.contact-join input[type="text"], .contact-join input[type="email"], .contact-join textarea {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: #fff none repeat scroll 0 0;
  border-color: currentcolor currentcolor #cecfd3;
  border-image: none;
  border-style: solid;
  border-width: 2px;
  
  font-family: "Nunito",sans-serif;
  font-size: 1em;
  margin: 2px 0 31px;
  outline: medium none;
  padding: 10px 6px;
}

.contact-join input[type="text"], .contact-join input[type="email"], .contact-join textarea {
  width: 92%;
}
input[type="submit"] {
  background-color: #006dcc;
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  border: medium none;
  color: #fff;
  cursor: pointer;
  display: block;
  font-family: "Nunito",sans-serif;
  font-size: 1em;
  letter-spacing: 2px;
  outline: medium none;
  padding: 1em 0;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  width: 20%;
}
</style>
</body>
</html>
