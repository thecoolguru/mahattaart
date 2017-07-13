function SetValue(DivId,DValue){
    
    document.getElementById(DivId).value=DValue;
    if(DValue=='Other'){
        HideRow('returnOther');
    }else{
        HideRow1('returnOther');
    }
    if(DValue=='Airport'){
        HideRow('return_airport');   
        Multiple('returnAddressRow','returnCityRow','returnzipcodeRow');
        HideRow('returnAirline');
        HideRow('returnflight');
    }
    if(DValue=='Location'){
        HideRow1('return_airport');
        MultipleRow('returnAddressRow','returnCityRow','returnzipcodeRow');
        HideRow1('returnAirline');
        HideRow1('returnflight');
    }
    if(DValue=='Select'){
        HideRow1('return_airport');
        Multiple('returnAddressRow','returnCityRow','returnzipcodeRow');
        HideRow1('returnOther');
        HideRow1('returnAirline');
        HideRow1('returnflight');
    }
}
function HideDiv(DivId){
    if(document.getElementById(DivId).style.display=='none'){
        document.getElementById(DivId).style.display='block';
    }
}
function HideDiv1(DivId){
    if(document.getElementById(DivId).style.display=='block'){
        document.getElementById(DivId).style.display='none';
    }
}
function HideRow(rowId){    
   if(document.getElementById(rowId).style.display=='none'){
        document.getElementById(rowId).style.display='table-row';
    } 
}
function HideRow1(rowId){
    if(document.getElementById(rowId).style.display=='table-row'){
        document.getElementById(rowId).style.display='none';
    }
}
function MultipleRow(rowId1,rowId2,rowId3){
    if((document.getElementById(rowId1).style.display=='none')&&(document.getElementById(rowId2).style.display=='none')&&(document.getElementById(rowId3).style.display=='none')){
        document.getElementById(rowId1).style.display='table-row';
        document.getElementById(rowId2).style.display='table-row';
        document.getElementById(rowId3).style.display='table-row';
    }
}
function Multiple(rowId1,rowId2,rowId3){
    if((document.getElementById(rowId1).style.display=='table-row')&&(document.getElementById(rowId2).style.display=='table-row')&&(document.getElementById(rowId3).style.display=='table-row')){
            document.getElementById(rowId1).style.display='none';
            document.getElementById(rowId2).style.display='none';
            document.getElementById(rowId3).style.display='none';
    }
}
    function DynamicContent(divId,QueryPage){
        var xmlhttp;
         if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById(divId).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET",QueryPage,true);
        xmlhttp.send(); 
    }
    
    
    
     function calculator_show()
                    {
                       
                        var license_cost = document.getElementsByName('license_cost[]');
                        var print_height = document.getElementsByName('print_height[]');
                        var print_width = document.getElementsByName('print_width[]');
                        var frame_width = document.getElementsByName('frame_width[]');
                        var mount_width = document.getElementsByName('mount_width[]');
                        var Q_total=document.getElementsByName('Q_total[]');
                        var cover=$('#cover').val(); 
                       
                          var finalTotal=0;
                        
                        for(i=0;i<=print_height.length;i++)
                            {
                              var license_cost_set= license_cost[i].value; 
                              var print_height_values= print_height[i].value; 
                              var print_width_values= print_width[i].value; 
                             var frame_width_values= frame_width[i].value; 
                             var mount_width_values= mount_width[i].value; 
                                 
                                if(frame_width_values=='')
                                    {
                                        frame_width_values=0;
                                    }else{
                                        frame_width_values=frame_width_values;
                                    }
                                    if(mount_width_values=='')
                                    {
                                        mount_width_values=0;
                                    }else{
                                        mount_width_values=mount_width_values;
                                    }
                                  
                               
                                
                                 
                                   var OrgPrintCost=parseFloat(license_cost_set)+parseFloat(print_height_values)* parseFloat(print_width_values)*2;
                                   
                                    $('#print_cost'+[i]).val(OrgPrintCost);
                                        if(mount_width_values!='')
                                    {
                                        print_height_values=print_height_values;
                                        print_width_values=print_width_values;
                                    }else if(mount_width_values=='')
                                    {
                                     
                                        print_height_values=0;
                                        print_width_values=0;
                                    }
                                    
                                    
                                var OrgMountHeight = parseFloat(print_height_values)+parseFloat(mount_width_values*2) ;
                                var OrgMountWidth=    parseFloat(print_width_values)+parseFloat(mount_width_values*2);
                                var OrgMountArea= OrgMountHeight * OrgMountWidth;
                                var OrgMountCost =   OrgMountArea * 2// rate;
                               $('#mount_cost'+[i]).val(OrgMountCost);
                                var OrgFrametRuningArea = (parseFloat(OrgMountHeight)+parseFloat(frame_width_values)*2) * (parseFloat(OrgMountWidth)+ parseFloat(frame_width_values*2));
                                var OrgFramCost=(OrgFrametRuningArea)/(12)*2.5;//rate 2
                               $('#frame_cost'+[i]).val(OrgFramCost);
                               var mountarea=parseFloat(print_height_values)* parseFloat(print_width_values)*2;
                               var print_cost=OrgMountArea+mountarea*.2;// rate 2
                                $('#glass_cost'+[i]).val(print_cost);
             
             if(frame_width_values!='')
                                    {
                                        OrgFramCost=OrgFramCost;
                                    }else{
                                        
                                        OrgFramCost=0;
                                    }
                                
                               
                                 var totalCost=parseInt(OrgPrintCost+OrgFramCost+OrgMountCost);
                                //alert(OrgPrintCost+' '+OrgMountCost+' '+OrgFramCost)
                                  if (!isNaN(totalCost)){ 
                                    document.getElementById("total"+[i]).value = totalCost;
                                    } 
                              
                               
                               var total_val= parseInt(Q_total[i].value);
                               //finalTotal= parseFloat(finalTotal) + parseFloat(total_val);
                                finalTotal += total_val;
                                //alert(finalTotal);
                            
                                var _tax=finalTotal*5/100;
                               var after_tax_val=parseInt(_tax+finalTotal);
                               
                               var discount= $('#discount').val();
                               var discount_val=after_tax_val*discount/100;
                               var after_discount=parseInt(after_tax_val-discount_val);
                              
                               if(discount!='')
                               {
                                    $('#after_discount').val(after_discount);
                                     
                                after_tax_val=   after_discount;
                                indian_money_format(after_tax_val);
                               }else if(discount==''){
                                    $('#after_discount').val('0.00');
                                    after_tax_val=   after_tax_val;
                                    indian_money_format(after_tax_val);
                               }
                                
                            }
                    
                    
                    }// end function
                    
                    
    function indian_money_format(after_tax_val)
    {
        if (!isNaN(after_tax_val)){ 
                            // document.getElementById("Total_txt_amount").value = after_tax_val; 
                                var x=after_tax_val;
                                x=x.toString();
                                var lastThree = x.substring(x.length-3);
                                var otherNumbers = x.substring(0,x.length-3);
                                if(otherNumbers != '')
                                lastThree = ',' + lastThree;
                                var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;

                               //alert(res);
                                    
                                document.getElementById("finalTotal_txt").value = res; 
                                  }
    }
                    