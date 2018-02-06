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