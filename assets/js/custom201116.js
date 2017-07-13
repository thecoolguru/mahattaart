// JavaScript Document
//alert("go");

function dropmenu(allid){
    setTimeout(function(){ ChangeTimedrop(allid)},0);
    }
function ChangeTimedrop(allid){
	var layer=['drop1','drop2','drop3','drop4','drop5','drop6','drop7','drop8','drop9']
		for(a=0;a<9;a++){
			if(allid==layer[a]){
				$("#"+allid).fadeIn(100)
				$("#blank").show()
				}
					else
				{
					$("#"+layer[a]).hide()}
				}
			}
function dropdownout(allid){	
	$("#drop1").hide()
	$("#drop2").hide()
	$("#drop3").hide()
	$("#drop4").hide()
	$("#drop5").hide()
	$("#drop6").hide()
    $("#drop7").hide()
    $("#drop8").hide()
    $("#drop9").hide()
	$("#blank").hide()
}

$(document).ready(function(){
	$('#slider').bxSlider({
		auto: true,
		autoControls: false,
		pause: 6000
	});
});


    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
 	 });
 });
	
	  
        
function login(){
    
    
    
	if( (document.getElementById("back").style.display=="none")||(document.getElementById("loginpop").style.display=="none"))

		{
			$("#back").fadeIn(300)
			$("#loginpop").fadeIn(300)
			$("#signpop").hide()
                      
			
		}
                
                

	}
        
        
 function addtogallery(api_image_id,images_id){
   
//alert(api_image_id+'__'+images_id);        
	//get_lightBoxName(images_id);
 if( (document.getElementById("back").style.display=="none")||(document.getElementById("loginpop").style.display=="none"))

		{
                    document.getElementById("lightbox_list_dropdown").selectedIndex = "0";
                    //$('#image_id').HTML+image_id;
                    document.getElementById('img_id').value=images_id;
                    document.getElementById('image_id').value=images_id;
                    document.getElementById('api_image_id').value=api_image_id;     
                    $("#addtogallery").fadeIn(300)
                        $("#back").fadeIn(300)
			$("#loginpop").hide(300)
			$("#signpop").hide()
			
		}
 
	}
 
        


function signup(){
	if( document.getElementById("signpop").style.display=="none")
		{
		  $("#signpop").fadeIn(300)
		  $("#loginpop").hide()
                  
		}

	}



function frameit(){
	if( (document.getElementById("back").style.display=="none")||(document.getElementById("frameitpop").style.display=="none"))

		{
			$("#back").fadeIn(300)
			$("#frameitpop").fadeIn(300)
			$("#signpop").hide()
			
                         
		}
	}




function allclose(){
		$("#back").fadeOut(300)
		$("#signpop").fadeOut(300)  
		$("#loginpop").fadeOut(300)  
		
                $("#frameitpop").fadeOut(300)
                $("#addtogallery").fadeOut(300)
                $("#signpo").fadeOut(300)
                $("#close_create_pwd").fadeOut(300)
                $("#signppp").fadeOut(300)
                
}

function searchbar(){
		if( document.getElementById("home-search").style.display=="none")
		{
		$("#home-search").slideDown(300)
		}
	else
		{
			$("#home-search").slideUp(300)	
		}
}


function drop(allid,allid1){
	var layer=['slidedrop','slidedrop1','slidedrop2']
	var layer1=['select','select1', 'select2']
	for(a=0;a<3;a++)
	{
		if(allid==layer[a] && document.getElementById(allid).style.display=="none")
	{
		$("#"+allid).slideDown(300)	
		$("#"+allid1).addClass('active')	
	}
	else{
			$("#"+layer[a]).slideUp(300)
			$("#"+layer1[a]).removeClass('active')		
			}	
		}
	}
	
	function change(allid,allid1)
	{
		$(".name").removeClass('current')
		$(".pay").hide()
		$("#"+allid).addClass('current')
		$("#"+allid1).show()
	}


	function change(allid,allid1)
	{
		$(".name").removeClass('active')
		$(".tabbox").hide()
		$("#"+allid).addClass('active')
		$("#"+allid1).show()
	}


function gift()
{
$("#gift").fadeIn(700);
$("#black").fadeIn();
}
function closebox()
{
$("#gift").fadeOut(700);
$("#black").fadeOut();
}

function gift2()
{
$("#gift2").fadeIn(700);
$("#black").fadeIn();
}
function closebox2()
{
$("#gift2").fadeOut(700);
$("#black").fadeOut();
}



function mobileshopping(allid,allid1)
{

if(document.getElementById(allid).style.display=="none")
{	
$(".boxdrop").slideUp(300);
$("#"+allid).slideDown(300);
$(".boxselect").removeClass('active');
$("#"+allid1).addClass('active');

}
else
{
$(".boxdrop").slideUp(300);	
$(".boxselect").removeClass('active');
}
}