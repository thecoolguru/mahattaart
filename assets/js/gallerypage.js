
function linkForm(action){var f;f=document.getElementById('globalLinkForm');if(!f){f=document.getElementById('aspnetForm');}
f.action=action;f.submit();}
function swapFooter(x)
{document.getElementById(x).style.display='none';document.getElementById(x+'_a').style.display='block';document.getElementById(x).parentNode.style.backgroundColor='#CDC2B1';}
function restoreFooter(x)
{document.getElementById(x+'_a').style.display='none';document.getElementById(x).style.display='block';document.getElementById(x).parentNode.style.backgroundColor='#E7E2D9';}
function opencat(id)
{var cat=document.getElementById(id);if(cat)
{if(cat.style.display=="")
{cat.style.display="none";}
else
{cat.style.display="";}}}
function styledisp(id,disp)
{var id=document.getElementById(id);if(id)
{id.style.display=disp;}}
function curl(url)
{window.location=url.replace(/___/g,"'");}
function ShipSameDayWindow(bOverrideSameDayMessage,customerZoneID)
{ShipWindow=window.open('','ShipTime','height=320,width=430,resizable=yes,top=100,left=100');var tmp=ShipWindow.document;tmp.write('<html><head><title>Ship Time</title>');tmp.write('</head><body><p style=\"font-family:Verdana;font-size:12px;\"><b>Ship Time</b></p>');if(!bOverrideSameDayMessage)
{if(customerZoneID==3)
{tmp.write('<p style=\"font-family:Verdana;font-size:12px;line-height:120%\">Items that are designated by "Usually ships within 24 hours" normally leave our facilities on the same business day if the order is placed before 5:00pm EST.</p>');}
else
{tmp.write('<p style=\"font-family:Verdana;font-size:12px;line-height:120%\">Items that are designated by "Usually ships within 24 hours" normally leave our facilities on the same business day if the order is placed before 16:00GMT.</p>');}}
tmp.write('<p style=\"font-family:Verdana;font-size:12px;line-height:120%\">Ship time indicates the typical number of business days it takes for your item(s) to leave our facilities but does not include transit time from our facilities to the final destination.</p>');tmp.write('<p style=\"font-family:Verdana;font-size:12px;line-height:120%\">Orders that contain multiple items with different ship times will be shipped out based on the item with the longest ship time.</p>');if(!isTrustedDomain()){tmp.write('<p style=\"font-family:Verdana;font-size:12px;line-height:120%\"><b>Please note: Ship time is determined based on the method of payment chosen.</b></p>');tmp.write("<p><div style=\"font-family:Verdana;font-size:12px;cursor:pointer;color:#000077\" onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\" onclick=\"window.open('\/asp\/customerservice\/shipping.asp','','height=678,width=900,scrollbars=yes,resizable=yes,titlebar=yes,toolbar=yes,menubar=yes')\">Shipping FAQ</div>");tmp.write("<div style=\"font-family:Verdana;font-size:12px;cursor:pointer;color:#000077\" onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\" onclick=\"window.open('\/asp\/ship_rates.asp','','height=678,width=900,scrollbars=yes,resizable=yes,titlebar=yes,toolbar=yes,menubar=yes')\">Shipping Rates</div><br/></p>");}
tmp.write('</body></html>');tmp.close();}
function setCookie(c_name,value,expiredays)
{var exdate=new Date();exdate.setDate(exdate.getDate()+expiredays);document.cookie=c_name+"="+value+
((expiredays==null)?"":";expires="+exdate.toGMTString())+";path=/";}
function getCookie(c_name)
{if(document.cookie.length>0)
{c_start=document.cookie.indexOf(c_name+"=");if(c_start!=-1)
{c_start=c_start+c_name.length+1;c_end=document.cookie.indexOf(";",c_start);if(c_end==-1)c_end=document.cookie.length;return unescape(document.cookie.substring(c_start,c_end));}}
return"";}
function checkcookie()
{alert("all cookie:"+document.cookie);alert("ENDECA cookie:"+getCookie("ENDECA"));}
function selectNs(val)
{setEndecaCookie(val,"&Ns=");var url=redirectNtt(changePg(window.location,1));window.location=url;}
function selectNn(toRecordPerpage,curRecordPerpage,curPageNumber,totalRecords)
{setEndecaCookie(toRecordPerpage,"&Nn=");com.art.core.cookie.Cookie.prototype.setCookieDictionary('WT','WT.cg_n',"Gallery+Number+Change",'/',com.art.core.cookie.Cookie.prototype.getCookieDomain('art'));var toPageNumber=calcPageNumber(toRecordPerpage,curRecordPerpage,curPageNumber,totalRecords);var url=redirectNtt(changePg(window.location,toPageNumber));window.location=url;}
function calcPageNumber(toRecordPerpage,curRecordPerpage,curPageNumber,totalRecords)
{var toRecordPerpage=parseInt((parseInt(curRecordPerpage)*parseInt(curPageNumber-1))/parseInt(toRecordPerpage))+1;return toRecordPerpage;}
function redirectNtt(url)
{if(ntt&&ntt.length>0&&url.indexOf("searchstring")==-1)
{var index=url.lastIndexOf("/");if(index>-1)
{url=url.substring(0,index)+url.substring(index)+"&searchstring="+ntt;}}
return url;}
var ntt;function addSearchString(ntt)
{this.ntt=ntt;}
function gobacktosearch(ntt)
{this.ntt=ntt;var url=window.location.toString();url=url.replace(/___/g,"'");window.location=redirectNtt(url);}
function setEndecaCookie(val,pname)
{var endeca=getCookie("ENDECA");if(endeca.length>0)
{endeca=endeca.replace(/\+\&\+/g,"___");var tokens=endeca.split("&");var new_endeca="";var found=false;for(var i=0;i<tokens.length;i++)
{if(tokens[i].indexOf(pname)==0)
{tokens[i]=pname+val;found=true;}
new_endeca+="&"+tokens[i];}
endeca=new_endeca.substring(1);if(!found)
{endeca+="&"+pname+val;}}
else
{endeca=pname+val;}
endeca=endeca.replace(/&&/g,"&");endeca=endeca.replace(/___/g,escape("+&+"));setCookie("ENDECA",endeca,365);}
function changePg(url,pg)
{var sUrl=url.toString();var aPos=sUrl.indexOf("_p");if(pg==1)
{if(aPos>0)
{var aStr=sUrl.substring(0,aPos);var cPos=sUrl.indexOf(".",aPos);var bStr=sUrl.substring(cPos);sUrl=aStr+bStr;}}
if(pg>1)
{var bPos=sUrl.lastIndexOf("_p");if(bPos>0)
{var dPos=sUrl.indexOf(".",bPos);var dStr=sUrl.substring(dPos);sUrl=sUrl.substring(0,bPos)+"_p"+pg+dStr;}}
return sUrl;}
var XMLHttpFactories=[function(){return new XMLHttpRequest()},function(){return new ActiveXObject("Msxml2.XMLHTTP")},function(){return new ActiveXObject("Msxml3.XMLHTTP")},function(){return new ActiveXObject("Microsoft.XMLHTTP")}];function createXMLHTTPObject(){var xmlhttp=false;for(var i=0;i<XMLHttpFactories.length;i++){try{xmlhttp=XMLHttpFactories[i]();}
catch(e){continue;}
break;}
return xmlhttp;}
function isCurrentPageInSsl(){var protocol=window.location.protocol;if(protocol.indexOf("https")>=0)
return true;else
return false;}
var WTFlag=false;function requestHeaderData(flag){if(flag!=undefined)
WTFlag=true;var SslFlag="";if(isCurrentPageInSsl())
SslFlag="&ssl=true";var randomnumber=Math.floor(Math.random()*10000)
theURL="/asp/include/global/getHeader.asp?ui="+getuid()+"&r="+randomnumber+SslFlag+"&clientcall=YES";req=createXMLHTTPObject();req.open("GET",theURL,true);req.onreadystatechange=getHeaderResponse;req.send(null);requestFooterData();}
function getHeaderResponse()
{if(req.readyState==4)
{var header=document.getElementById("ctl00_ctl00_mc_hdr_headersection");if(header!=null)
{var res=req.responseText
try{if(WTFlag){var aPosition=res.indexOf("<!-- @@Webtrends  -->");var secondPos=res.indexOf("<!-- @@Webtrends  -->",aPosition+1);if(aPosition>0&&secondPos>0){res=res.substring(0,aPosition+21)+' '+res.substring(secondPos);}
header.innerHTML=res;}
else{header.innerHTML=(req.responseText);}
var zIndexNumber=1000;$('#Header > div').each(function(){$(this).css('zIndex',zIndexNumber);zIndexNumber-=1;});}
catch(e)
{var t=document.createElement('div');t.innerHTML=req.responseText;header.removeChild(header.firstChild);header.appendChild(t);}
hidePromo();}}}
function getuid()
{var uid=document.getElementById("uid");if(uid)return uid.value;else return"";}
function hidePromo()
{hideElem("dhtml_Email_Container");hideElem("CSModuleChangeLanguageContainer");hideElem("CSModuleChangeCountryContainer");}
function hideElem(id)
{var elm=document.getElementById(id);if(elm)elm.style.display="none";}
var reqObj,req,theURL;function requestFooterData()
{var SslFlag="";if(isCurrentPageInSsl())
SslFlag="&ssl=true";theURL="/asp/include/global/getFooter.asp?ui="+getuid()+SslFlag;;reqObj=createXMLHTTPObject();reqObj.open("GET",theURL,true);reqObj.onreadystatechange=getFooterResponse;reqObj.send(null);}
function getFooterResponse()
{if(reqObj.readyState==4)
{var footer=document.getElementById("ctl00_ctl00_mc_ftr_footersection");if(footer!=null)
{var html=reqObj.responseText;if(html.indexOf("PageContainer")>0)
{html=html.substring(html.indexOf("PageContainer")-14);var index=html.indexOf("<script");if(index>0)
{html=html.substring(0,index);}
footer.innerHTML=html;}}}}
function fireSearch(boxid){var searchbox=document.getElementById(boxid);if(searchbox)
{var term=searchbox.value;term=term.replace(/@/g,"").replace(/#/g,"").replace(/$/g,"").replace(/%/g,"").replace(/^/g,"");term=term.replace(/^\s+|\s+$/g,"");if(term.length==0)
{document.getElementById("yoursearch").innerHTML="Please enter a valid search term.";searchbox.value="";return;}
var f=document.forms['aspnetForm'];if(!f){f=document.aspnetForm;}
f.action="/asp/search_do-asp/_/posters.htm?ID=0&searchstring="+escape(term)+"&ui="+gup("ui");f.submit();}}
function gup(name)
{name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(window.location.href);if(results==null)
return"";else
return results[1];}
function popOpen(url,name,attributes)
{windowHandle=window.open(url,name,attributes);}
function rollover(img,src1,src2)
{img.src=img.src.replace(src1,src2);}
function rolloverparent(parent,src1,src2)
{for(var i=0;i<parent.childNodes.length;i++)
{var child=parent.childNodes[i];if(child.nodeName=="IMG")
{child.src=child.src.replace(src1,src2);}}}
function GotoStudio(APNum,LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,PODConfigID,qs_sessionid,glbCustomerZoneID,CountryCode)
{var winPop;var newWindow=false;var mTop=10;var mLeft=10;var pParameters="apnum="+APNum+"&PODConfigID="+PODConfigID;var WindowName="FrameStudio"+new Date().getTime();winPop=window.open("/FrameStudio/default.asp?"+pParameters+"&ui="+qs_sessionid+"&customerzoneid="+glbCustomerZoneID,WindowName,'toolbar=no,location=no,status=no,statusbar=no,menubar=no,height=678,width=900,scrollbars=no,resizable=no,top='+mTop+',left='+mLeft);if(winPop){if(winPop.focus){winPop.focus()}}else{window.location.href="/FrameStudio/error.asp?error=popup&"+pParameters+"&ui="+qs_sessionid;}}
function GotoStudioInline(APNum,LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,PODConfigID,qs_sessionid,glbCustomerZoneID,CountryCode,Pid,Spid)
{var url;var pParameters="apnum="+APNum+"&PODConfigID="+PODConfigID+"&pd="+Pid+"&sp="+Spid;url="/FrameStep/default.asp?"+pParameters+"&ui="+qs_sessionid+"&customerzoneid="+glbCustomerZoneID;window.location.href=url;}
function toggle(pElementID,aTag){var pElem=document.getElementById(pElementID);if(aTag.innerHTML=="close")
{aTag.innerHTML="learn more";pElem.style.display="none";}
else
{aTag.innerHTML="close";pElem.style.display="block";}}
var mycarousel_itemList=new Array();function fnLoadImages(){if($('#ctl00_ctl00_mc_mc_dimsrch_hdnImageUrl').length>0){var hdnImageUrl=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnImageUrl");var hdnGalleryUrl=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnGalleryUrl");var hdnAltText=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnAltText");var hdnDimensionName=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnDimensionName");var hdnImageHght=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnImageHght");var hdnImageWidth=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnImageWidth");var hdnImageMarginTop=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnImageMarginTop");var hdnDimensionCnt=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnDimensionCnt");var hdnGalleryItemStr=document.getElementById("ctl00_ctl00_mc_mc_dimsrch_hdnGalleryItemStr");var hdnImageUrlArray=hdnImageUrl.innerHTML.split(";");var hdnGalleryUrlArray=hdnGalleryUrl.innerHTML.split(";");var hdnAltTextArray=hdnAltText.innerHTML.split(";");var hdnDimensionNameArray=hdnDimensionName.innerHTML.split(";");var hdnImageHghtArray=hdnImageHght.innerHTML.split(";");var hdnImageWidthArray=hdnImageWidth.innerHTML.split(";");var hdnImageMarginTopArray=hdnImageMarginTop.innerHTML.split(";");var hdnDimensionCntArray=hdnDimensionCnt.innerHTML.split(";");var hdnGalleryItemStrArray=hdnGalleryItemStr.innerHTML.split(";");for(i=0;i<hdnImageUrlArray.length-1;i++){var obj=new Object();obj.ImgSrc=hdnImageUrlArray[i];obj.GalUrl=hdnGalleryUrlArray[i];obj.AltTxt=hdnAltTextArray[i];obj.DimName=hdnDimensionNameArray[i];obj.ImgHeight=hdnImageHghtArray[i];obj.ImgWidth=hdnImageWidthArray[i];obj.ImgMarginTop=hdnImageMarginTopArray[i];obj.ItemCount=hdnDimensionCntArray[i];obj.ParentPath=hdnGalleryItemStrArray[i];mycarousel_itemList[i]=obj;}}}
function mycarousel_itemLoadCallback(carousel,state){for(var i=carousel.first;i<=carousel.last;i++){if(carousel.has(i)){continue;}
if(i>mycarousel_itemList.length){break;}
carousel.add(i,mycarousel_getItemHTML(mycarousel_itemList[i-1]));}};function fnRedirectToUrl(link)
{location.href=link;}
function mycarousel_getItemHTML(item){item.ImgMarginTop=82-(item.ImgHeight)
var htmlstring='<a class="jcarousel-atag" href="'+item.GalUrl+'" onclick="setDMCookie()"; title="'+item.AltTxt+' Gallery"><div class="jcarousel-imgParent"><img class="shadow" style="margin-top:'+item.ImgMarginTop+'px;" src="'+item.ImgSrc+'" width="'+item.ImgWidth+'" height="'+item.ImgHeight+'" alt="'+item.AltTxt+'" onclick="fnRedirectToUrl(\''+item.GalUrl+'\');" /></div>';htmlstring+='<div class="jcarousel-text"><span>'+item.DimName+'</span> <span class="jcarousel_nodeco_text">in</span> <span>'+item.ParentPath+'</span></div>';htmlstring+="</a>";return htmlstring;};jQuery(document).ready(function(){fnLoadImages();jQuery('#mycarousel').jcarousel({scroll:5,visible:5,size:mycarousel_itemList.length,itemLoadCallback:{onBeforeAnimation:mycarousel_itemLoadCallback}});$(".dmsrchseeall").hover(function(){$(this).css("text-decoration","underline");},function(){$(this).css("text-decoration","none");});});function createonclickforli(){$('.jcarousel-item').each(function(i){var onclick="curl('"+$(this).find('.jcarousel-atag').attr('href')+"')";$(this).attr('onclick',onclick);});}
function Comma(number){number=''+number;if(number.length>3){var mod=number.length%3;var output=(mod>0?(number.substring(0,mod)):'');for(i=0;i<Math.floor(number.length/3);i++){if((mod==0)&&(i==0))
output+=number.substring(mod+3*i,mod+3*i+3);else
output+=','+number.substring(mod+3*i,mod+3*i+3);}
return(output);}
else{return number;}}
function setDMCookie(){Set_wt_Cookie('WTDS','1',365,'/','','')}
function Set_wt_Cookie(name,value,expires,path,domain,secure){var today=new Date();today.setTime(today.getTime());if(expires){expires=expires*1000*60*60*24;}
var expires_date=new Date(today.getTime()+(expires));document.cookie=name+"="+escape(value)+
((path)?";path="+path:"")+
((domain)?";domain="+domain:"")+
((secure)?";secure":"");}
isWorking=false;function GetPopupDivByName()
{var popup=document.getElementById('popupplaceholder');if(popup==null)
{popup=document.body.insertBefore(document.createElement("div"),document.body.firstChild);popup.style.position='absolute';popup.style.display='block';popup.style.zIndex=1001;popup.id='popupplaceholder';}
return popup;}
function CallbackReload(url)
{if(isWorking)return;isWorking=true;var len=url.indexOf("/asp/");if(len>0)
{url=url.substring(len);}
req=createXMLHTTPObject();req.open("GET",url+"&rnd="+Math.random(),true);req.onreadystatechange=ReloadPage;req.send(null);return true;}
function ReloadPage()
{if(req.readyState==4)
{var url=window.location.toString();var len=url.length;if(url.substring(len-1)=="#")url=url.substring(0,len-1);window.location=url;}}
function PopupCallback(tmpl,nameValuePairs)
{if(isWorking)return;isWorking=true;req=createXMLHTTPObject();var url="/asp/pop_up/popup_callback.asp?tmpl="+tmpl+nameValuePairs+"&rnd="+Math.random();req.open("GET",url,true);req.onreadystatechange=CallbackResponse;req.send(null);return true;}
function CallbackResponse()
{if(req.readyState==4)
{var response=eval("("+req.responseText+")");var template=response.jsonRecord.Template.replace(/&quot;/g,"\"");popup=GetPopupDivByName();if(popup!=null)
{$popup=$('#popupplaceholder');$popup.html(template);popup.style.top=(displayBoxPos[1])+'px';popup.style.left=(displayBoxPos[0]-75)+'px';if(displayBoxPos[0]<100)popup.style.left='100px';theItemTop=parseInt(popup.style.top);theItemLeft=parseInt(popup.style.left);var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;qscreenHeight=y;qscreenWidth=x;var theScrollTop=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;theScrollTop=parseInt(theScrollTop);if((theItemTop-theScrollTop+$popup.height())>(qscreenHeight)){theItemTop=theScrollTop-(($popup.height())-qscreenHeight)-30;}
else if(theItemTop<theScrollTop){theItemTop=theScrollTop;}
if((theItemLeft+$popup.width())>(qscreenWidth)){theItemLeft=qscreenWidth-$popup.width();}
$popup.css('top',theItemTop);$popup.css('left',theItemLeft);$popup.show();if(isVisualSearch){centerCartPopup();}}
isWorking=false;divobj.style.cursor='pointer';setFocus('emailaddress');setFocus('password');}}
function setFocus(id)
{var inputobj=document.getElementById(id);if(inputobj)
{inputobj.focus();}}
function findElementPos(obj)
{var curleft=0;var curtop=0;if(obj.offsetLeft==0||obj.offsetTop==0){if(obj.offsetParent){curleft=obj.offsetLeft
curtop=obj.offsetTop
while(obj=obj.offsetParent){curleft+=obj.offsetLeft
curtop+=obj.offsetTop}}}
else{curleft=obj.offsetLeft;curtop=obj.offsetTop;}
return[curleft,curtop];}
var XMLHttpFactories=[function(){return new XMLHttpRequest()},function(){return new ActiveXObject("Msxml2.XMLHTTP")},function(){return new ActiveXObject("Msxml3.XMLHTTP")},function(){return new ActiveXObject("Microsoft.XMLHTTP")}];function createXMLHTTPObject(){var xmlhttp=false;for(var i=0;i<XMLHttpFactories.length;i++){try{xmlhttp=XMLHttpFactories[i]();}
catch(e){continue;}
break;}
return xmlhttp;}
function Browser(){var ua,s,i;this.isIE=false;this.isNS=false;this.version=null;ua=navigator.userAgent;s="MSIE";if((i=ua.indexOf(s))>=0){this.isIE=true;this.version=parseFloat(ua.substr(i+s.length));return;}
s="Netscape6/";if((i=ua.indexOf(s))>=0){this.isNS=true;this.version=parseFloat(ua.substr(i+s.length));return;}
s="Gecko";if((i=ua.indexOf(s))>=0){this.isNS=true;this.version=6.1;return;}}
var browser=new Browser();var dragObj=new Object();dragObj.zIndex=0;var x,y;function dragStart(event,id){var el;if(id)
dragObj.elNode=document.getElementById(id);else{if(browser.isIE)
dragObj.elNode=window.event.srcElement;if(browser.isNS)
dragObj.elNode=event.target;if(dragObj.elNode.nodeType==3)
dragObj.elNode=dragObj.elNode.parentNode;}
findMousePos(event);dragObj.cursorStartX=x;dragObj.cursorStartY=y;dragObj.elStartLeft=parseInt(dragObj.elNode.style.left,10);dragObj.elStartTop=parseInt(dragObj.elNode.style.top,10);if(isNaN(dragObj.elStartLeft))dragObj.elStartLeft=0;if(isNaN(dragObj.elStartTop))dragObj.elStartTop=0;dragObj.zIndex=100;dragObj.elNode.style.zIndex=++dragObj.zIndex;if(browser.isIE){document.attachEvent("onmousemove",dragGo);document.attachEvent("onmouseup",dragStop);window.event.cancelBubble=true;window.event.returnValue=false;}
if(browser.isNS){document.addEventListener("mousemove",dragGo,true);document.addEventListener("mouseup",dragStop,true);event.preventDefault();}}
function dragGo(event){findMousePos(event);dragObj.elNode.style.left=(dragObj.elStartLeft+x-dragObj.cursorStartX)+"px";dragObj.elNode.style.top=(dragObj.elStartTop+y-dragObj.cursorStartY)+"px";if(browser.isIE){window.event.cancelBubble=true;window.event.returnValue=false;}
if(browser.isNS)
event.preventDefault();}
function dragStop(event){dragObj.elNode=null;if(browser.isIE){document.detachEvent("onmousemove",dragGo);document.detachEvent("onmouseup",dragStop);}
if(browser.isNS){document.removeEventListener("mousemove",dragGo,true);document.removeEventListener("mouseup",dragStop,true);}}
function findMousePos(event)
{if(browser.isIE){x=window.event.clientX+document.documentElement.scrollLeft
+document.body.scrollLeft;y=window.event.clientY+document.documentElement.scrollTop
+document.body.scrollTop;}
if(browser.isNS){x=event.clientX+window.scrollX;y=event.clientY+window.scrollY;}}var vsDataType={"similarcolors":0,"similarimages":1,"sameartist":2,"samesubject":3,"cloudTag":4,"recentlyviewed":5};var vsTagType={"light":0,"medium":1,"heavy":2,"superHeavy":3};var BackgroundImagesForRencetlyViewed=new Array("http://cache1.artprintimages.com/images/VisualSearch/STEP2Image01.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image02.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image03.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image04.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image05.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image06.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image07.png","http://cache1.artprintimages.com/images/VisualSearch/STEP2Image08.png");var vsSearchResult;var vsRecentlyViewedResult;var selectedItemToPass='';var SessionInfo;var RecordThumbDetails;var tagWithCategoryID=''
var vsHoverSearchClicked=false;var $vsHoverPopup;var $vsTagCloud,$vsTagCloudDetail;var gTagID;var wt_Enabled='false';var vsData={directionLeft_top:100,directionTop_left:122,directionTop_width:160,directionTop_height:60,directionLeft_width:60,directionLeft_height:196,popup_height:454,popup_width:436,image_size:400,popupPadding:5,noArtist:false};function SetGlobalSessionInfo($item){var dataUI=$item.find('#hiddenValues').metadata({type:'attr',name:'data'});SessionInfo=new Object();SessionInfo.CountryCode=dataUI.CountryCode;SessionInfo.CurrencyCode=dataUI.CurrencyCode;SessionInfo.CurrencyID=dataUI.CurrencyId;SessionInfo.CustomerZoneID=dataUI.CustomerZoneId;SessionInfo.LanguageID=dataUI.LanguageId;SessionInfo.RecordsPerPage="20";SessionInfo.PageNo="1";SessionInfo.SortBy="P_SiteRank";SessionInfo.RequestMode="Subjects";SessionInfo.PopupMode="Initial";SessionInfo.VisualSearchUrl=dataUI.SearchServerUrl;}
function SetRecordThumbDetails($item){var dataUI=$item.find('#hiddenValues').metadata({type:'attr',name:'data'});RecordThumbDetails=new Object();RecordThumbDetails.Title=dataUI.Title;RecordThumbDetails.ImageUrl=dataUI.ImageUrl;RecordThumbDetails.ArtistName=dataUI.ArtistName;RecordThumbDetails.Price=dataUI.Price;RecordThumbDetails.LargeImageWidth=dataUI.ImageLargeWidth;RecordThumbDetails.LargeImageHeight=dataUI.ImageLargeHeight;RecordThumbDetails.Position=dataUI.ItemId;RecordThumbDetails.ImageID=dataUI.ImageId;RecordThumbDetails.ArtistCategoryID=dataUI.ArtistCategoryId;RecordThumbDetails.CategoryID=dataUI.CategoryId;RecordThumbDetails.ProductPageUrl=dataUI.ProductPageUrl;RecordThumbDetails.MasterProductID=dataUI.MasterProductId;RecordThumbDetails.MasterSpecID=dataUI.MasterSpecId;RecordThumbDetails.Apnum=dataUI.MasterApnum;RecordThumbDetails.OtherSizes=dataUI.OtherSizes;RecordThumbDetails.ImageMedWidth=dataUI.ImageMedWidth;RecordThumbDetails.ImageMedHeight=dataUI.ImageMedHeight;RecordThumbDetails.ArtistUrl=dataUI.ArtistUrl;RecordThumbDetails.ShowMarkDown=dataUI.ShowMarkDown;RecordThumbDetails.MarkDownPrice=dataUI.MarkDownPrice;RecordThumbDetails.ItemGroupTypeID=dataUI.ItemGroupTypeID;RecordThumbDetails.ItemWidth=dataUI.ItemWidth;RecordThumbDetails.ItemHeight=dataUI.ItemHeight;RecordThumbDetails.ShipTime=dataUI.ShipTime;RecordThumbDetails.Metric=dataUI.Metric;RecordThumbDetails.PODConfigID=dataUI.PODConfigID;RecordThumbDetails.MyGalItemDisplayedTypeId=dataUI.MyGalItemDisplayedTypeId;RecordThumbDetails.MyGalItemPrice=dataUI.MyGalItemPrice;RecordThumbDetails.MyGalImageUrl=dataUI.MyGalImageUrl;RecordThumbDetails.ShowCanvas=dataUI.ShowCanvas;}
function SifPop(divobj,displayBox,pid,spid,isBuyingFunnel){SetPos(divobj,displayBox,-60);var FilteredPODConfigId=$(divobj).parents('.galActions').children('#FilteredItemLeastPODConfig').text();var FilteredItemLeastZProductID=$(divobj).parents('.galActions').children('#FilteredItemLeastZProductID').text();if(FilteredPODConfigId.length>0){PopupCallback("SeeItFramed","&pid="+pid+"&spid="+spid+"&BuyingFunnel="+isBuyingFunnel+"&PODConfig="+FilteredPODConfigId);}
else if(!(FilteredPODConfigId.length>0)&&FilteredItemLeastZProductID.length>0){PopupCallback("SeeItFramed","&pid="+pid+"&spid="+spid+"&BuyingFunnel="+isBuyingFunnel+"&FZoneProductID="+FilteredItemLeastZProductID);}
else{PopupCallback("SeeItFramed","&pid="+pid+"&spid="+spid+"&BuyingFunnel="+isBuyingFunnel);}}
function CartPop(divobj,displayBox,pid,spid,cid,scid,isBuyingFunnel,Apnum,OffsetVal){SetPos(divobj,displayBox,-60,OffsetVal);var FilteredPODConfigId=$(divobj).parents('.galActions').children('#FilteredItemLeastPODConfig').text();var FilteredItemLeastZProductID=$(divobj).parents('.galActions').children('#FilteredItemLeastZProductID').text();if(FilteredPODConfigId.length>0){PopupCallback("AddToCart","&pid="+pid+"&spid="+spid+"&cid="+cid+"&scid="+escape(scid)+"&BuyingFunnel="+isBuyingFunnel+"&Apnum="+Apnum+"&PODConfig="+FilteredPODConfigId);}
else if(!(FilteredPODConfigId.length>0)&&FilteredItemLeastZProductID.length>0){PopupCallback("AddToCart","&pid="+pid+"&spid="+spid+"&cid="+cid+"&scid="+escape(scid)+"&BuyingFunnel="+isBuyingFunnel+"&Apnum="+Apnum+"&FZoneProductID="+FilteredItemLeastZProductID);}
else{PopupCallback("AddToCart","&pid="+pid+"&spid="+spid+"&cid="+cid+"&scid="+escape(scid)+"&BuyingFunnel="+isBuyingFunnel+"&Apnum="+Apnum);}}
function SetPos(divobj,displayBox,left,Offsetval){isVisualSearch=false;this.divobj=divobj;divobj.style.cursor='wait';var delta=displayBox%4;var index=displayBox-delta;displayBoxPos=findElementPos(document.getElementById(index));displayBoxPos[0]=displayBoxPos[0]+195*delta+left;displayBoxPos[1]=displayBoxPos[1]+40;var top=parseInt(document.body.scrollTop)-parseInt(displayBoxPos[1]);if(top>0){displayBoxPos[1]=displayBoxPos[1]+250;}
if(Offsetval!=null){isVisualSearch=true;displayBoxPos[0]=Offsetval.left+260;displayBoxPos[1]=Offsetval.top-70;}}
function ShowDiv(id,disp){if(browser.isIE){var divObj=document.getElementById(id);if(divObj){divObj.style.visibility=disp;}}}
String.prototype.startsWith=function(str)
{return(this.match("^"+str)==str)}
String.prototype.endsWith=function(str)
{return(this.match(str+"$")==str)}
function replaceDashDash(url){return url=url.replace(/--/g,"@dashdash");}
function getRadioButtonValue(radiobutton){for(i=0;i<radiobutton.length;i++){if(radiobutton[i].checked)return radiobutton[i].value;}
return"not found";}
function replaceSingleQuote(str){return str.replace(/'/g,"@(singlequote)");}
function removeSingleQuote(str){return str.replace(/'/g,"");}
function HighlightRow(radio){var radios=document.getElementsByName("radiobutton");if(radios){for(var i=0;i<radios.length;i++){radios[i].parentNode.parentNode.className="pop_text";}}
radio.parentNode.parentNode.className="pop_bldtext";}
function launchStudio(sessionid,zone,countryCode,LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,PODConfigID){var radios=document.getElementsByName("radiobutton");if(radios){for(var i=0;i<radios.length;i++){if(radios[i].checked){var vals=(radios[i].value).split(":");GotoStudio(vals[0],LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,vals[1],sessionid,zone,countryCode);}}}}
function launchGalleryFramingStudio(sessionid,zone,countryCode,LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,PODConfigID,BuyingFunnel){var radios=document.getElementsByName("radiobutton");if(radios){for(var i=0;i<radios.length;i++){if(radios[i].checked){var vals=(radios[i].value).split(":");if(BuyingFunnel.toLowerCase()=="true"){GotoStudioInline(vals[0],LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,vals[1],sessionid,zone,countryCode,vals[2],vals[3]);}
else{GotoStudio(vals[0],LanguageID,CurrencyCode,CurrencySymbol,CurrencyID,vals[1],sessionid,zone,countryCode);}}}}}
function launchCart(sessionid,zone,cid,scid,BuyingFunnel,Apnum,wt_curr){var radios=document.getElementsByName("radiobutton");var wt_enabled=$('#wtEnabledDiv').text();var url;var urlFrameStep;var isIOS=isiOSDevice();if(radios){for(var i=0;i<radios.length;i++){if(radios[i].checked){var vals=(radios[i].value).split(":");if(wt_enabled=='true'){var wt_sku=vals[0]+vals[1];dcsMultiTrack('WT.ti','Add-To-Cart','DCS.dcsuri','/root/pages/cart/add.aspx','WT.pn_sku',wt_sku,'WT.tx_u','1','WT.tx_e','a','WT.cg_n','Add-To-Cart','WT.si_n','Shopping','WT.si_x','3','WT.z_cur',wt_curr,'WT.dl','10','WT.z_atcloc','Gallery-Pop Up','WT.z_pod',vals[2]);}
if(BuyingFunnel.length>0&&vals.length>3&&!(isIOS)){if(BuyingFunnel.toLowerCase()=="true"&&vals[3].toLowerCase()=="true"){url="/asp/include/addtocart.asp/_/PDTA--"+vals[0]+"/SP--"+vals[1]+"/ID--"+cid+"/posters.htm?Add_to_Cart=Y&XHN=1"+scid+"&ui="+sessionid+"&PODConfigID="+vals[2];urlFrameStep="/framestep/?Add_To_Cart=Y&XHN=1"+scid+"&ApNum="+vals[4]+"&PODConfigID="+vals[2]+"&pd="+vals[0]+"&sp="+vals[1];"javascript:"+makeAjaxCallToAddToCart(url,urlFrameStep);}
else{GotoCart(vals[0],vals[1],sessionid,zone,cid,scid,vals[2]);}}
else{GotoCart(vals[0],vals[1],sessionid,zone,cid,scid,vals[2]);}}}}}
function GotoCart(pid,spec,qs_sessionid,gblCustomerZoneID,cid,scid,PODConfigID){window.location="/asp/place_order-asp/_/PDTA--"+pid+"/SP--"+spec+"/ID--"+cid+"/posters.htm?Add_to_Cart=Y&XHN=1"+scid+"&ui="+qs_sessionid+"&PODConfigID="+PODConfigID;}
var ImageUrlForPickitUp='';var ApnumForVisualSearch='';var titlePrefix='More items like ';var recordThumbHtlml='';var popupStatus='';var popupHovered=false;var initialPopUp=false;function RefreshRecordThumbDetailsPanel(searchItem){var MasterZoneProductID=searchItem.ZoneProductID;var MasterSpecID=MasterZoneProductID.substring(MasterZoneProductID.length-1);var MasterProductID=MasterZoneProductID.substring(0,MasterZoneProductID.length-1);RecordThumbDetails.MasterProductID=MasterProductID;RecordThumbDetails.MasterSpecID=MasterSpecID;RecordThumbDetails.Apnum=searchItem.APNum;RecordThumbDetails.OtherSizes=searchItem.NumberOfSizes;$('#ImageDetContainer').html('');var RecordThumHtml='';RecordThumHtml=GetRecordDetailsHtml(searchItem,false);$('#ImageDetContainer').html(RecordThumHtml);}
function RefreshResultsGridPanel(callbackResults){$('.pageparent').remove();var totalRecordCount=GetTotalRecordCount(callbackResults);var totalpages=Math.ceil(totalRecordCount/20);var listResult='';var item;for(var i=0;i<Math.min(callbackResults.ImageDetails.length,20);i++){item=callbackResults.ImageDetails[i];listResult+='<div id="dlstImages'+i+'" class="clstImages" dataIndex="'+i+'"onmouseover="fnMouseOverRV(this);" onmouseout="fnMouseOutRV(this);" >'+'<img id="eachimg" src="'+item.UrlInfo.CroppedSquareImageUrl+'" title="'+item.Title+'" alt="'+item.Title+'"/>'+'<div id="dProductPageUrl" class="cProductPageUrl">'+item.UrlInfo.ProductPageUrl+'|'+item.Title+'|'+item.UrlInfo.ImageUrl+'|'+item.ImageId+'|'+item.Artist.ArtistCategoryId+'</div>'+'</div>';}
if($.browser.msie){listResult+='<div style="clear:both;height:4px;"></div>';}
listResult+=GetPaginationHtml(SessionInfo.PageNo,totalpages);if(listResult!='')$('#dpopupImg').append(listResult);$('#dpopupImg').css('opacity','1');$('#dpopupImg').css('left','0');$('#dpopupImg').fadeIn('normal');}
function MakeAjaxCallToVisualSearchForDetailedPage(requesttype,searchItem,tagID,$item){var urlSeemore='';if(requesttype==vsDataType.similarcolors){SessionInfo.RequestMode=requesttype;SetTitle(searchItem.Title,requesttype);urlSeemore=GetServerUrl(requesttype,searchItem.APNum);}
else if(requesttype==vsDataType.similarimages){SessionInfo.RequestMode=requesttype;SetTitle(searchItem.Title,requesttype);urlSeemore=GetServerUrl(requesttype,searchItem.APNum);}
else if(requesttype==vsDataType.sameartist){SessionInfo.RequestMode=requesttype;var artistName=searchItem.Artist.FirstName+searchItem.Artist.LastName;SetTitle(artistName,requesttype);urlSeemore=GetServerUrl(requesttype,'');}
else if(requesttype==vsDataType.cloudTag){SessionInfo.RequestMode=vsDataType.cloudTag;urlSeemore=GetServerUrl(requesttype,gTagID);}
else{urlSeemore=GetServerUrl(requesttype,'');}
$.ajax({url:urlSeemore,type:"GET",contentType:"application/json; charset=utf-8",dataType:"json",beforeSend:function(){},success:function(callbackResults){if(!CheckErrorsOrNoResults(callbackResults)){SetCookieForRecentlyViewed(RecordThumbDetails.ImageID);vsSearchResult=callbackResults.ImageDetails;$('#bottomtitle').hide();$('#dback').hide();$('#highResImage').fadeOut('normal',function(){$('#dpopupImg').empty();var sujbectsTitle=GetSubjectsTitle(callbackResults);if(sujbectsTitle.length>1&&requesttype==vsDataType.cloudTag){SetTitle(sujbectsTitle,requesttype);}
RefreshRecordThumbDetailsPanel(searchItem);RefreshResultsGridPanel(callbackResults);});MakeAjaxCallToShowRecentlyViewedImages();}
else{busyMode($item,requesttype,true,false,true);vsHoverSearchClicked=false;}},error:function(textStatus,errorThrown){}});}
function MakeAjaxCallToVisualSearchService($item,requesttype){var totalRecordCount='';var urlSeemore='';if(requesttype==vsDataType.similarcolors){urlSeemore=GetServerUrl(requesttype,ApnumForVisualSearch);SetTitle(RecordThumbDetails.Title,requesttype);SessionInfo.RequestMode=requesttype;}
else if(requesttype==vsDataType.similarimages){urlSeemore=GetServerUrl(requesttype,ApnumForVisualSearch);SetTitle(RecordThumbDetails.Title,requesttype);SessionInfo.RequestMode=requesttype;}
else if(requesttype==vsDataType.sameartist){SetTitle(RecordThumbDetails.ArtistName,requesttype);SessionInfo.RequestMode=requesttype;urlSeemore=GetServerUrl(requesttype,'');}
else if(requesttype==vsDataType.cloudTag){SessionInfo.RequestMode=vsDataType.cloudTag;urlSeemore=GetServerUrl(requesttype,tagWithCategoryID);}
$.ajax({url:urlSeemore,type:"GET",contentType:"application/json; charset=utf-8",dataType:"json",beforeSend:function(){},success:function(callbackResults){vsSearchResult=callbackResults.ImageDetails;if(!CheckErrorsOrNoResults(callbackResults)){var sujbectsTitle=GetSubjectsTitle(callbackResults);totalRecordCount=GetTotalRecordCount(callbackResults);if(sujbectsTitle.length>1&&requesttype==vsDataType.cloudTag){SetTitle(sujbectsTitle,requesttype);}
var resultsTemp=callBackSeeMoreResults(callbackResults,totalRecordCount);if($item.length){if(resultsTemp.length>0){GreyoutBackground();PositionSeeMorePopUp($item.offset(),resultsTemp,'ResultsWindow');MakeAjaxCallToShowRecentlyViewedImages();$('.cSeemoreLikeItInnerImg').fadeIn(600);}}
else{PositionSeeMorePopUp('',resultsTemp,'DetailedWindow');}}
else{busyMode($item,requesttype,false,false,true);vsHoverSearchClicked=false;}},error:function(textStatus,errorThrown){}});}
function MakeAjaxCallToShowRecentlyViewedImages(){var urlSeemore=GetServerUrl(vsDataType.recentlyviewed,GetImageIDsFromCookie());$.ajax({url:urlSeemore,type:"GET",contentType:"application/json; charset=utf-8",dataType:"json",beforeSend:function(){},success:function(callbackResults){if(!CheckErrorsOrNoResults(callbackResults)){vsRecentlyViewedResult=callbackResults.ImageDetails;SetRecentlyViewedImagesBlock(callbackResults);}},error:function(textStatus,errorThrown){}});}
var jsonobjSeeMore='';var imageTitle='';var parentDiv='';var recordThumbPosition='';function loadPopup(){if($(this).parent()[0].className=="canvaswrap3"){parentDiv=$(this).parent().parent().parent().parent().parent().parent();}
else{parentDiv=$(this).parent().parent();}
NewVisualSearchPopup($(parentDiv));}
function NewVisualSearchPopup($item){SetRecordThumbDetails($item);SetGlobalSessionInfo($item);imageTitle=RecordThumbDetails.Title;$('#vsNewTitle').text(imageTitle);if($item.find('.pLnk').length>0){$('#vsArtist').show();$("#vsBy").show();$('#vsArtist').text(RecordThumbDetails.ArtistName);vsData.noArtist=false;}
else{$('#vsArtist').hide();$("#vsBy").hide();vsData.noArtist=true;}
if(RecordThumbDetails.OtherSizes>1){var size="("+RecordThumbDetails.OtherSizes+" sizes available)";$('#vsNewSize').text(size);}
else{$('#vsNewSize').text(RecordThumbDetails.ItemWidth+" x "+RecordThumbDetails.ItemHeight+" "+RecordThumbDetails.Metric);}
$('#vsNewPrice').text(RecordThumbDetails.Price);ApnumForVisualSearch=RecordThumbDetails.Apnum;ImageUrlForPickitUp=RecordThumbDetails.ImageUrl;recordThumbPosition=RecordThumbDetails.Position;var LrgImageWidth=RecordThumbDetails.LargeImageWidth;var LrgImageHeight=RecordThumbDetails.LargeImageHeight;var temp='';ImageUrlForPickitUp=ImageUrlForPickitUp.replace("MED","LRG");var pos=ImageUrlForPickitUp.indexOf("MXW");if(pos>1){ImageUrlForPickitUp=ImageUrlForPickitUp.replace(ImageUrlForPickitUp.substr(pos,ImageUrlForPickitUp.indexOf("MXH")-pos),'MXW:'+LrgImageWidth+'+');pos=ImageUrlForPickitUp.indexOf("MXH");ImageUrlForPickitUp=ImageUrlForPickitUp.replace(ImageUrlForPickitUp.substr(pos,ImageUrlForPickitUp.indexOf("QLT")-pos),'MXH:'+LrgImageHeight+'+');}
var $popImage=$("#popImage");}
function unloadPopup(){disablePopup(false);}
$(document).ready(function(){$('.createStreamGalleries').click(function(){var obj=$('.hideDiv').attr('data');var catObject=eval('('+obj+')');var categoryIds=catObject.CategoryId.split("-");var stream={};stream.CategoryID=categoryIds;if(!isMygalleriesMainLoaded)$.getScript('/scripts/mygalleriesmain.js',function(){isMygalleriesMainLoaded=true;MyGalleriesCore.registerModule(new com.art.myGalleries.modules.VerticalNavigationModule({},MyGalleriesCore));MyGalleriesCore.getModel().setStreamObject(stream);MyGalleriesCore.sendNotification(new com.art.core.utils.Note(MyGalleriesCore.events.SHOW_CREATE_GALLERY_MODAL));});return false;});});$(document).ready(function(){wt_Enabled=$('#webtrendsEnabled').text();wt_Enabled=wt_Enabled.toLowerCase();$vsTagCloud=$("#tagCloud").hide();$('.centerImage').hoverIntent({over:loadPopup,timeout:500,interval:300,out:unloadPopup});$('.direction').live('click',function(){vsHoverSearchClicked=true;var dataType;if(this.id=='directionRight'){dataType=vsDataType.samesubject;vsHoverSearchClicked=false;trackEventsForGA('HoverClickSubjectsArrow');}
else if(this.id=='directionTop'){dataType=vsDataType.similarimages;trackEventsForGA('HoverClickSimilarArrow');}
else if(this.id=='directionLeft'){dataType=vsDataType.similarcolors;trackEventsForGA('HoverClickColorsArrow');}
else{dataType=vsDataType.sameartist;trackEventsForGA('HoverClickArtistArrow');}
busyMode($(this),dataType,false,false,false);if(dataType==vsDataType.samesubject){trackEventsForGA('HoverClickTagClaud');clickProcess4TagCloud($(this));}
else clickProcess($(this),dataType);});$('#tagCloud a').live('click',function(){busyMode($("#directionRight"),vsDataType.samesubject,false,false,false);vsHoverSearchClicked=true;tagWithCategoryID=$(this).attr('tagid');clickProcess($(this),vsDataType.cloudTag);trackEventsForGA('HoverClickTagID');});$('#tagCloudDetail a').live('click',function(){busyMode($("#directionDetailsRight"),vsDataType.samesubject,false,false,false);vsHoverSearchClicked=true;var tagid=$(this).attr('tagid');gTagID=tagid;MakeAjaxCallToVisualSearchForDetailedPage(vsDataType.cloudTag,selectedItemToPass,tagid);trackEventsForGA('ResultsClickTagID');});$('.iconcart').live('click',function(){var vsAbtest="VSControlATC"
showVisualSearch=$('#dShowVisualSearch').text();if(showVisualSearch.toLowerCase()=="false"){trackEventsForGA(vsAbtest);}
else if(showVisualSearch.toLowerCase()=="true"){trackEventsForGA('ResultClickAddtoCart');}});$('.thmbd').live('click',function(){var vsAbtest="VSControlProductclick"
showVisualSearch=$('#dShowVisualSearch').text();if(showVisualSearch.toLowerCase()=="false"){trackEventsForGA(vsAbtest);}});$('.directionDetails').live('click',function(){var dataType;SessionInfo.PopupMode="Det";SessionInfo.PageNo="1";if(this.id=='directionDetailsRight'){dataType=vsDataType.samesubject;trackEventsForGA('ResultsClickSubjectsArrow');}
else if(this.id=='directionDetailsTop'){dataType=vsDataType.similarimages;trackEventsForGA('ResultsClickSimilarArrow');}
else if(this.id=='directionDetailsLeft'){dataType=vsDataType.similarcolors;trackEventsForGA('ResultsClickColorsArrow');}
else{dataType=vsDataType.sameartist;trackEventsForGA('ResultsClickArtistArrow');}
busyMode($(this),dataType,true,false,false);var url=RecordThumbDetails.ImageUrl
url=url.replace("LRG","MED");if(dataType==vsDataType.samesubject){clickProcess4TagCloud($(this));trackEventsForGA('ResultsClickTagClaud');}
else MakeAjaxCallToVisualSearchForDetailedPage(dataType,selectedItemToPass,'',$(this));});$('#dclose').live('click',function(){closeVSPopup();trackEventsForGA("ResultsClickCloseButton");});$('#dvsdAddtoCart').live('click',function(){var offsetval=$('#dvsdAddtoCart').offset();var masterProductID=RecordThumbDetails.MasterProductID;var masterSpecID=RecordThumbDetails.MasterSpecID;var apnum=RecordThumbDetails.Apnum;var catIDDimvals='&iSalesCategoryId=0&dimVals='+RecordThumbDetails.CategoryID;if(RecordThumbDetails.OtherSizes>1){CartPop(this,RecordThumbDetails.Position,masterProductID,masterSpecID,'0',catIDDimvals,'true',apnum,offsetval);}
else{var ui=getCookie('CustSessionID');var cartUrl='/asp/include/addtocart.asp/_/PDTA--'+masterProductID+'/SP--'+masterSpecID+'/ID--0/posters.htm?Add_to_Cart=Y&XHN=1&iSalesCategoryId=0&ui='+ui+'&dimVals='+RecordThumbDetails.CategoryID;var FrameStepUrl='/framestep/?Add_To_Cart=Y&ApNum='+apnum+'&dimVals='+RecordThumbDetails.CategoryID+'&iSalesCategoryId=0&PODConfigID=&pd='+masterProductID+'&sp='+masterSpecID;makeAjaxCallToAddToCart(cartUrl,FrameStepUrl);}
trackEventsForGA('ResultClickAddtoCart');});$(document).keypress(function(e){if(e.keyCode==27&&popupStatus==1){disablePopup(true);}});$('#dproductDetails').live('click',function(){var theURL=$(this).find('.cproductPageUrl').text();location.href=theURL+"?sorig=cat&sorigid=0&dimvals="+RecordThumbDetails.CategoryID+"&ui="+getCookie('CustSessionID');trackEventsForGA("ResultClickImageLeft");});$('.cproductDtails').live('click',function(){var theURL=$(this).find('#hiddenProductUrl').text();location.href=theURL+"?sorig=cat&sorigid=0&dimvals="+RecordThumbDetails.CategoryID+"&ui="+getCookie('CustSessionID');trackEventsForGA("ResultClickProductDetails");});$('#wrapper,#fullDetailsInfoGallery, #vsMoreProductLink').live('click',function(){var theURL=RecordThumbDetails.ProductPageUrl;location.href=theURL;trackEventsForGA("HoverImageClick");});$('#fullDetailsAddToCartGallery').live('click',function(){var offsetval=$('#fullDetailsAddToCartGallery').offset();var masterProductID=RecordThumbDetails.MasterProductID;var masterSpecID=RecordThumbDetails.MasterSpecID;var apnum=RecordThumbDetails.Apnum;var catIDDimvals='&iSalesCategoryId=0&dimVals='+RecordThumbDetails.CategoryID;if(RecordThumbDetails.OtherSizes>1){CartPop(this,RecordThumbDetails.Position,masterProductID,masterSpecID,'0',catIDDimvals,'true',apnum,offsetval);}
else{var ui=getCookie('CustSessionID');var cartUrl='/asp/include/addtocart.asp/_/PDTA--'+masterProductID+'/SP--'+masterSpecID+'/ID--0/posters.htm?Add_to_Cart=Y&XHN=1&iSalesCategoryId=0&ui='+ui+'&dimVals='+RecordThumbDetails.CategoryID;var FrameStepUrl='/framestep/?Add_To_Cart=Y&ApNum='+apnum+'&dimVals='+RecordThumbDetails.CategoryID+'&iSalesCategoryId=0&PODConfigID=&pd='+masterProductID+'&sp='+masterSpecID;makeAjaxCallToAddToCart(cartUrl,FrameStepUrl);}
trackEventsForGA('ResultClickAddtoCart');popupHovered=false;disablePopup(false);});$('.pop_x').live('click',function(){$('#popupplaceholder').hide();});$('#lfProductPageBk').live('click',function(){var theURL=$(this).find('#lfProductPageBkUrl').text();theURL=theURL+"?sorig=cat&sorigid=0&dimvals="+RecordThumbDetails.CategoryID+"&ui="+getCookie('CustSessionID');location.href=theURL;trackEventsForGA('ResultClickImageLeft');});$("#vsfullDetailsAddSelectionGallery").mouseenter(function(){$(this).css("background-position","0px -1387px");});$("#vsfullDetailsAddSelectionGallery").mouseleave(function(){$(this).css("background-position","0px -1362px");});$("#vsfullDetailsSaveToGallery").mouseenter(function(){$(this).css("background-position","-66px -1387px");});$("#vsfullDetailsSaveToGallery").mouseleave(function(){$(this).css("background-position","-66px -1362px");});$("#fullDetailsAddToCartGallery").mouseenter(function(){$(this).css("background-position","-132px -1387px");});$("#fullDetailsAddToCartGallery").mouseleave(function(){$(this).css("background-position","-132px -1362px");});$('#fullDetailsInfoGallery').mouseenter(function(){$(this).css("background-position","-27px -27px");});$('#fullDetailsInfoGallery').mouseleave(function(){$(this).css("background-position","0px -27px");});$('#vsfullDetailsAddSelectionGallery').live('click',function(){popupHovered=false;disablePopup(false);trackEventsForGA('VSPopupSimilarImages');if(wt_Enabled=='true')dcsMultiTrack("WT.ti","Gallery Search for Similar Images","DCS.dcsuri","/gallery/search-for-similar-images.aspx","WT.z_vs","1","WT.dl","10","WT.cg_n","Visual Search","WT.cg_s","Match My Image");if(!isVSALoaded)$.getScript(VSjsFilepath,function(){VisualSearchApplication_vsfullDetailsAddSelectionGallery()
isVSALoaded=true;});else{VisualSearchApplication_vsfullDetailsAddSelectionGallery()}});function VisualSearchApplication_vsfullDetailsAddSelectionGallery(){VisualSearchCore.init(visualSearchCoreEnvironment);var pi=new com.art.core.vos.ImageVO();pi.parseCatalogImageDetail(RecordThumbDetails.Apnum,RecordThumbDetails.Title,RecordThumbDetails.ImageID,RecordThumbDetails.ArtistCategoryID,RecordThumbDetails.ImageUrl,RecordThumbDetails.ImageUrl,RecordThumbDetails.Price,RecordThumbDetails.MarkDownPrice,RecordThumbDetails.ArtistName,RecordThumbDetails.MasterProductID,RecordThumbDetails.MasterSpecID,RecordThumbDetails.MasterProductID+RecordThumbDetails.MasterSpecID,RecordThumbDetails.LargeImageWidth,RecordThumbDetails.LargeImageHeight,RecordThumbDetails.ImageMedWidth,RecordThumbDetails.ImageMedHeight,RecordThumbDetails.ArtistUrl,RecordThumbDetails.ItemWidth,RecordThumbDetails.ItemHeight,RecordThumbDetails.ShipTime,RecordThumbDetails.ProductPageUrl);VisualSearchCore.registerModule(new art.visualSearch.modules.ModuleLightbox({"target":"body"},VisualSearchCore));VisualSearchCore.registerModule(new art.visualSearch.modules.ModuleCurrentSearch({"target":"body","content":{}},VisualSearchCore));VisualSearchCore.registerModule(new art.visualSearch.modules.ModuleSearchResults({"target":".VSResultsContentRight","content":{}},VisualSearchCore));VisualSearchCore.startModule("ModuleLightbox");VisualSearchCore.sendNotification(new art.core.Note(VisualSearchCore.events.SEARCH_FROM_CATALOG,{pivotImage:pi},'vo'));};$('#vsfullDetailsSaveToGallery').live('click',function(){var imageObj={};imageObj.ImageUrl=RecordThumbDetails.MyGalImageUrl;imageObj.Imageid=RecordThumbDetails.ImageID;imageObj.ItemId=RecordThumbDetails.Position;imageObj.Width=RecordThumbDetails.LargeImageWidth;imageObj.Height=RecordThumbDetails.LargeImageHeight;imageObj.ZoneProductID=RecordThumbDetails.MasterProductID;imageObj.ItemPrice=RecordThumbDetails.MyGalItemPrice;imageObj.Price=RecordThumbDetails.Price;imageObj.ArtistName=RecordThumbDetails.ArtistName;if(RecordThumbDetails.ArtistCategoryID.length==0){imageObj.ArtistId=0;}
else{imageObj.ArtistId=RecordThumbDetails.ArtistCategoryID;}
imageObj.Title=RecordThumbDetails.Title;imageObj.PODConfigID=RecordThumbDetails.PODConfigID;imageObj.APNum=RecordThumbDetails.Apnum;if(RecordThumbDetails.OtherSizes>1)imageObj.AvailableInOtherSizes="True";else imageObj.AvailableInOtherSizes="False";imageObj.ItemDisplayTypeID=RecordThumbDetails.MyGalItemDisplayedTypeId;imageObj.Source="GalleryPage";MyGalleriesCore.getModel().setSelectedImageObject(imageObj);});$('#vsTitle').live('click',function(){location.href=RecordThumbDetails.ProductPageUrl;});$('#vsArtist').live('click',function(){location.href=RecordThumbDetails.ArtistUrl;});$('#vsTitle,#vsArtist, #vsMoreProductLink').hover(function(){$(this).addClass('ImageTitleHoverStyle');},function(){$(this).removeClass('ImageTitleHoverStyle');});$(window).scroll(function(){if(initialPopUp==false){var top=($(window).height()-$('.cSeemoreLikeItInnerImg').height())/2+$(window).scrollTop();$('.cSeemoreLikeItInnerImg').stop(true).animate({top:top},350);}});});var ImageWidthFromService;var ImageHeightFromService;function UpdateHtmlforDetailedImageDirections(selectedItem){var imageHtml='';var imgLocation='';var artistExists=false;ImageWidthFromService=selectedItem.PhysicalDimensions.Width;ImageHeightFromService=selectedItem.PhysicalDimensions.Height;imgLocation=selectedItem.UrlInfo.ImageUrl;imgLocation=imgLocation.replace("MED","LRG");imageSrc=imgLocation;var maxW=390;var maxH=280;var artistName;if(selectedItem.Artist.ArtistCategoryId>0){artistExists=true;artistName=selectedItem.Artist.FirstName+selectedItem.Artist.LastName;}
imageHtml+='<div id="dproductDetails">';imageHtml+='<img id="hiResImg" title="'+selectedItem.Title+'" alt="'+selectedItem.Title+'" src="'+imgLocation+'"/>';imageHtml+='<div id="dproductPageUrl" class="cproductPageUrl" style="display:none">'+selectedItem.UrlInfo.ProductPageUrl+'</div> ';imageHtml+='</div>';imageHtml+='<div class="cproductDtails"><span id="hiddenProductUrl" style="display:none">'+selectedItem.UrlInfo.ProductPageUrl+'</span>view product details </div>';imageHtml+='<div id="bottomInfo"><div id="eachImgtitle">'+autoEllipseText(selectedItem.Title,52)+'</div>';imageHtml+='<div id="bottomArtistLine">by <span id="bottom"/>'+artistName+'</div>';imageHtml+='</div>';imageHtml+='<div id="tagCloudDetail" />';imageHtml+='<div id="directionDetailsTop" class="directionDetails" ><a href="" onclick="return false;" /></div>';imageHtml+='<div id="directionDetailsRight" class="directionDetails" ><a href="" onclick="return false;" /></div>';imageHtml+='<div id="directionDetailsBottom" class="directionDetails" ><a href="" onclick="return false;" /></div>';imageHtml+='<div id="directionDetailsLeft" class="directionDetails"  ><a href="" onclick="return false;" /></div>';imageHtml+='<div id="busyTopDetail" class="vsBusyDetail"/>';imageHtml+='<div id="busyLeftDetail" class="vsBusyDetail"/>';imageHtml+='<div id="busyRightDetail" class="vsBusyDetail"/>';imageHtml+='<div id="busyBottomDetail" class="vsBusyDetail"/>';$('#highResImage').hide().html(imageHtml);if(!artistExists){$("#directionDetailsBottom").css('visibility','hidden');$("#bottomArtistLine").css('visibility','hidden');}
$vsTagCloudDetail=$("#tagCloudDetail");$vsTagCloudDetail.hide();}
function SetDetailedFourDirectionsWithHighResImage(){var $container=$("#highResImage");var containerWidth=$container.width();var containerHeight=$container.height();var topOffset=-10;$('.vsBusyDetail').hide();$('#bottomtitle').hide();$('#dpopupImg').hide();$('.pagenav').hide();$('#toptitle').hide();$('#bottomtitle').hide();var $hiResImg=$('#hiResImg');var h=ImageHeightFromService;var w=ImageWidthFromService;var maxW=390;var maxH=280;var top,left;if((h/w)<(maxH/maxW)){$hiResImg.css('height','');$hiResImg.css('width',maxW);maxH=h/w*maxW;}
else{$hiResImg.css('height',maxH);maxW=w/h*maxH;$hiResImg.css('width','');}
top=((containerHeight-maxH)/2)+topOffset;left=(containerWidth-maxW)/2;$hiResImg.css('top',top);$hiResImg.css('left',left);var marginToPic=5;var $top=$("#directionDetailsTop");var $bottom=$("#directionDetailsBottom");var $left=$("#directionDetailsLeft");var $right=$("#directionDetailsRight");top=((containerHeight-maxH)/2)-vsData.directionTop_height-marginToPic;left=(containerWidth-vsData.directionTop_width)/2;$top.css({'top':top+topOffset,'left':left-1});$bottom.css({'bottom':top-topOffset,'left':left});top=((containerHeight-vsData.directionLeft_height)/2)+topOffset;left=((containerWidth-maxW)/2)-vsData.directionLeft_width-marginToPic;if($.browser.msie){$left.css({'top':top+10,'left':left});$right.css({'top':top+10,'right':left});}
else{$left.css({'top':top,'left':left});$right.css({'top':top,'right':left});}
$('#dback').fadeIn('slow');$('#highResImage').fadeIn('slow');}
function busyMode($busyItem,dataType,isDetail,isReverse,isNoResultsFromVS){var className="vsBusy";var removeclass="direction";var mode;var marginLeft=0;var centerImg=$('#cSeemoreLikeIt').css('display')=="block"?$('#cSeemoreLikeIt'):$('#highResImage');if(dataType==vsDataType.similarcolors){mode="Left";}
else if(dataType==vsDataType.similarimages){mode="Top";marginLeft=(centerImg.width()-16)/2;}
else if(dataType==vsDataType.sameartist){mode="Bottom";marginLeft=(centerImg.width()-16)/2;}
else{mode="Right";}
if(isDetail){mode+="Detail";className+="Detail";removeclass+="Details";}
if(isNoResultsFromVS){$busyItem.attr('id',$busyItem.attr('id')+"NoResult").show().css('visibility','').removeClass(removeclass);$("#busy"+mode).hide().css('visibility','hidden');if(dataType==vsDataType.sameartist)$busyItem.css("visibility","visible");}
else{if(isReverse){$("#busy"+mode).hide().css('visibility','hidden');if(dataType==vsDataType.sameartist)$busyItem.css("visibility","visible");$busyItem.show();}
else{if(dataType==vsDataType.sameartist)$busyItem.css("visibility","hidden");else $busyItem.hide();if(mode==="Bottom"||mode==="Top"){marginLeft=marginLeft-7;}
if(mode==="TopDetail"){marginLeft=marginLeft-13;}
$("#busy"+mode).css('margin-left',marginLeft);$("#busy"+mode).show().css('visibility','');}}}
function clickProcess($btnClicked,dataType){SetCookieForRecentlyViewed(RecordThumbDetails.ImageID);initialPopUp=false;recordThumbHtlml='';recordThumbHtlml+=GetRecordDetailsHtml(RecordThumbDetails,true);recordThumbHtlml+=AddToCart();recordThumbHtlml+='<div id="recentlyViewedMainBlock" class="recentlyViewedMainBlock"></div>';recordThumbHtlml+='<div class="clearHeight"></div>';recordThumbHtlml+=FeedBack();MakeAjaxCallToVisualSearchService($btnClicked,dataType);}
function GetRecordDetailsHtml(ImageDetails,FromGallery){var recordDetailsLeftPanel='';var width,height,ProductPageUrl,ImageUrl,Title,ArtistUrl,ArtistName,Price,ShowMarkDown,MarkDownPrice,PriceClass='';var isArtistExists=false;if(FromGallery){width=ImageDetails.ImageMedWidth;height=ImageDetails.ImageMedHeight;ProductPageUrl=ImageDetails.ProductPageUrl;ImageUrl=ImageDetails.ImageUrl;Title=ImageDetails.Title;ArtistUrl=ImageDetails.ArtistUrl;if(ImageDetails.ArtistName!=''){ArtistName=ImageDetails.ArtistName;isArtistExists=true;}
Price=ImageDetails.Price;ShowMarkDown=RecordThumbDetails.ShowMarkDown;MarkDownPrice=RecordThumbDetails.MarkDownPrice;if(ShowMarkDown.toLowerCase()=="true")ShowMarkDown=true;else ShowMarkDown=false;}
else{width=ImageDetails.ImageDimensions[0].PixelWidth;height=ImageDetails.ImageDimensions[0].PixelHeight;ProductPageUrl=ImageDetails.UrlInfo.ProductPageUrl;ImageUrl=ImageDetails.UrlInfo.ImageUrl;Title=ImageDetails.Title;ArtistUrl=ImageDetails.Artist.ArtistUrl;ArtistUrl="http://"+window.location.hostname+ArtistUrl+"?ui="+getCookie('CustSessionID');if(ImageDetails.Artist.ArtistCategoryId>0){ArtistName=ImageDetails.Artist.FirstName+' '+ImageDetails.Artist.LastName;isArtistExists=true;}
Price=ImageDetails.ItemPrice.DisplayPrice;ShowMarkDown=ImageDetails.ItemPrice.ShowMarkDownPrice;MarkDownPrice=ImageDetails.ItemPrice.MarkDownPrice;}
if(ShowMarkDown){PriceClass="galleryPriceStrike";}
else{PriceClass="price";}
var DeltaHeight=(176-height)/2;var Deltawidth=(195-width)/2;DeltaHeight=DeltaHeight+15;Deltawidth=Deltawidth+10;recordDetailsLeftPanel+='<div id="ImageDetContainer" style="width:200px;margin-top:5px;">';recordDetailsLeftPanel+='<div style="height:176px;width:195px;margin-bottom:10px;">';recordDetailsLeftPanel+='<div style="padding-left:'+Deltawidth+';padding-top:'+DeltaHeight+';" class="lfProductPageBk" id="lfProductPageBk">';recordDetailsLeftPanel+='<div id="lfProductPageBkUrl" class="lfProductPageBkUrl" style="display:none">'+ProductPageUrl+'</div> ';recordDetailsLeftPanel+='<div class="img-shadow" style="margin-left:6px;"><img id="eachimg" src="'+ImageUrl+'" title="'+Title+'" alt="'+Title+'"width="'+width+'"height="'+height+'"/></div></div>';recordDetailsLeftPanel+='</div>';recordDetailsLeftPanel+='<div class="pttl pCntr">';recordDetailsLeftPanel+='<div class="VsFontType">'+autoEllipseText(Title,27)+'</div>';if(isArtistExists){var gaTrack="trackEventsForGA('ResultsClickArtistLeft')";recordDetailsLeftPanel+='<div class="VsFontTypeArtist" style="margin-top:7px;"><span>by </span><a href="'+ArtistUrl+'" title="'+ArtistName+'" class="pLnk" onclick="'+gaTrack+'">'+ArtistName+'</a></div>';}
recordDetailsLeftPanel+='</div>';recordDetailsLeftPanel+='<div class="pDsp41 pCntr VsFontTypePrice" style="padding-top:12px;height:20px;padding-bottom:7px;"> <span class="'+PriceClass+'" style="font-size:12px;color:#4e4e4e;font-family:Vardana;">'+Price+'</span>';if(ShowMarkDown){recordDetailsLeftPanel+='<span class="gallerySalePrice">'+MarkDownPrice+'</span>';}
recordDetailsLeftPanel+='</div>';recordDetailsLeftPanel+='</div>';recordDetailsLeftPanel+='<div class="clear"></div>';return recordDetailsLeftPanel;}
function SetCookieForRecentlyViewed(Imageid){var existingImageidCookies='';var cookieList='';existingImageidCookies=GetCookieDictionary('arts','ImageidVisualSearch');if(existingImageidCookies.length>0){var arrpropInfo=existingImageidCookies.split("|");if(arrpropInfo.length==8&&(!CheckIFImageidExistInCookie(Imageid))){arrpropInfo.unshift(Imageid);arrpropInfo.pop();cookieList='';for(x in arrpropInfo){cookieList=cookieList+"|"+arrpropInfo[x];}
cookieList=cookieList.substring(1);}
else{if(!CheckIFImageidExistInCookie(Imageid)){cookieList=Imageid+"|"+existingImageidCookies;}}
if(cookieList.length>0){SetCookieDictionary('arts','ImageidVisualSearch',cookieList,'','/',GetCookieDomain());}}
else{if(!CheckIFImageidExistInCookie(Imageid)){SetCookieDictionary('arts','ImageidVisualSearch',Imageid,'','/',GetCookieDomain());}}}
function GetImageIDsFromCookie(){var ImageIDCookies=GetCookieDictionary('arts','ImageidVisualSearch');var cookieList='';if(ImageIDCookies.length>0){var arrpropInfo=ImageIDCookies.split("|");cookieList='';for(x in arrpropInfo){cookieList=cookieList+","+arrpropInfo[x];}}
cookieList=cookieList.substring(1);return cookieList;}
function CheckIFImageidExistInCookie(Imageid){var existingImageidCookies='';existingImageidCookies=GetCookieDictionary('arts','ImageidVisualSearch');var arrpropInfo=existingImageidCookies.split("|");if(arrpropInfo.length>0){for(x in arrpropInfo){if(arrpropInfo[x]==Imageid){return true;}}}
return false;}
function SetRecentlyViewedImagesBlock(RecentlyViewedResults){var maxShowCount=8;var ImageResults=RecentlyViewedResults.ImageDetails;var html='';var croppedUrl='';if(ImageResults!=''){maxShowCount=ImageResults.length;}
if(maxShowCount>8){maxShowCount=8;}
var imageListFromCookie=GetImageIDsFromCookie();var imageIds=imageListFromCookie.split(",");html+='<div class="cRecentlyViewedImages">';html+='</div>';html+='<div class="rViewedImgLst">';for(var j=0;j<imageIds.length;j++){for(var i=0;i<maxShowCount;i++){if(imageIds[j]==ImageResults[i].ImageId){croppedUrl=ImageResults[i].UrlInfo.CroppedSquareImageUrl.replace('&maxw=100&maxh=100','&maxw=42&maxh=42');html+='<div id="rViewedImg'+i+'" class="rViewedImg" dataIndex="'+i+'"  style="background-image:url('+croppedUrl+');"></div>';}}}
for(var count=maxShowCount;count<8;count++){html+='<div  class="rViewedImg_numbers" style="background-image:url('+BackgroundImagesForRencetlyViewed[count]+');"></div>';}
html+='</div>';html+='<div class="clearHeight"></div>';$('#recentlyViewedMainBlock').html(html);trackEventsForGA('LoadingRecentlyShowBreadCrumb');}
function clickProcess4TagCloud($this){var isDetailPage=false;var urlSeemore=GetServerUrl(vsDataType.samesubject,'');$.ajax({url:urlSeemore,type:"GET",contentType:"application/json; charset=utf-8",dataType:"json",beforeSend:function(){},success:function(callbackResults){if(!CheckErrorsOrNoResults(callbackResults)&&callbackResults.ImageDetails[0].Tags){var items='';var tags=callbackResults.ImageDetails[0].Tags;var tagCloud;;if($this.attr('id').indexOf('Detail')>0){tagCloud=$vsTagCloudDetail;isDetailPage=true;busyMode($this,vsDataType.samesubject,true,true,false);}
else{tagCloud=$vsTagCloud;busyMode($this,vsDataType.sazmesubject,false,true,false);}
tagCloud.empty();for(var i=0;i<tags.length;i++){items+='<a href="" onclick="return false;" tagid="'+tags[i].TagId+'" class="weight'+(tags[i].TagFontSize-1)+'" > '+tags[i].TagName+'</a>';}
var popUpHeight=''
if(isDetailPage){popUpHeight=$('#cSeemoreLikeItInnerImg').height();}
else{popUpHeight=$('#cSeemoreLikeIt').height();}
tagCloud.append(items).show();var elemTop=popUpHeight-tagCloud.height();elemTop=elemTop/2;if(isDetailPage)elemTop=elemTop-35;else elemTop=elemTop-15;tagCloud.css('top',elemTop);}
else{if($this.attr('id').indexOf('Detail')>0){busyMode($this,vsDataType.samesubject,true,true,true);}
else{busyMode($this,vsDataType.sazmesubject,false,true,true);}
vsHoverSearchClicked=false;}},error:function(textStatus,errorThrown){}});}
function autoEllipseText(text,limit){var temp;if(text.length-1>limit){temp=text.substring(0,limit-3)+'...';}
else{temp=text;}
return temp;}
function centerPopup(){var windowWidth=document.body.clientWidth;var windowHeight=document.body.clientHeight;var popupHeight=$("#cSeemoreLikeItInnerImg").height();var popupWidth=$("#cSeemoreLikeItInnerImg").width();if(!window.screen){windowWidth=800;windowHeight=600;}
if(popupWidth>windowWidth){popupWidth=(windowWidth)*(0.9);}
if(popupHeight>windowHeight){popupHeight=(windowHeight)*(0.9);}
var objControl=document.getElementById("cSeemoreLikeItInnerImg");if(objControl!=null){if(objControl.offsetParent!=null){var left=(objControl.offsetParent.clientWidth/2)-(objControl.clientWidth/2)+objControl.offsetParent.scrollLeft;var top=(objControl.offsetParent.clientHeight/2)-(objControl.clientHeight/2)+objControl.offsetParent.scrollTop;$('#cSeemoreLikeItInnerImg').css({"position":"absolute","top":top,"left":left});}}}
function centerCartPopup(){var windowWidth=document.body.clientWidth;var windowHeight=document.body.clientHeight;var popupHeight=$('#popupplaceholder').height();var popupWidth=$('#popupplaceholder').width();if(!window.screen){windowWidth=800;windowHeight=600;}
if(popupWidth>windowWidth){popupWidth=(windowWidth)*(0.9);}
if(popupHeight>windowHeight){popupHeight=(windowHeight)*(0.9);}
var objControl=document.getElementById("popupplaceholder");if(objControl!=null){if(objControl.offsetParent!=null){var left=(objControl.offsetParent.clientWidth/2)-(objControl.clientWidth/2)+objControl.offsetParent.scrollLeft;var top=(objControl.offsetParent.clientHeight/2)-(objControl.clientHeight/2)+objControl.offsetParent.scrollTop;$('#popupplaceholder').css({"position":"absolute","top":top,"left":left});}}}
function GreyoutBackground(){if($.browser.msie){var docHeight=Math.max($(document).height(),$(window).height(),document.documentElement.clientHeight);var docWidth=Math.max($(document).width(),$(window).width(),document.documentElement.clientWidth);$("#VbackgroundPopup").css({"height":docHeight,"width":docWidth-20});}
$("#VbackgroundPopup").css({"background-color":"#000000","filter":"alpha (opacity=70)","filter":"progid:DXImageTransform.Microsoft.Alpha(style=0, opacity=70)","-moz-opacity":"0.7","opacity":"0.7","-khtml-opacity":".7","zoom":"1"});$("#VbackgroundPopup").css({"opacity":"0.6"});$("#VbackgroundPopup").show();}
function disablePopup(forceClose){if(forceClose||(popupHovered==false&&!vsHoverSearchClicked)){$('#cSeemoreLikeIt').fadeOut();popupStatus=0;$vsTagCloud.hide();}}
function closeVSPopup(){$('.cSeemoreLikeItInnerImg').fadeOut();$('.cSeemoreLikeItInnerImg').hide();$('#highResImage').hide();$("#VbackgroundPopup").fadeOut("slow");$('#cSeemoreLikeIt').fadeOut();$('#popupplaceholder').hide();}
function AddToCart(){var htmlOutput='';htmlOutput+='<div class="pfuButton btnAddtoCart"  id="dvsdAddtoCart" ><div class="primary_buttons btns_orange" style="width:15em" onmouseover="fnMouseOverVS(this);" onmouseout="fnMouseOutVS(this);"><div class="txtlabel">ADD TO MY CART</div></div></div>';return htmlOutput}
function GetSubjectsTitle(callbackResults){var subjectsTitle='';if(callbackResults.ResultSummary.SelectedDimensionValues.length){subjectsTitle=callbackResults.ResultSummary.SelectedDimensionValues[0].Name;}
return subjectsTitle;}
function GetTotalRecordCount(callbackResults){var totalRecordCount='';if(callbackResults.ResultSummary.TotalRecordCount>20){totalRecordCount=callbackResults.ResultSummary.TotalRecordCount;}
return totalRecordCount;}
function GetServerUrl(requesttype,params){var urlSeemore=SessionInfo.VisualSearchUrl;var dynParam='';if(RecordThumbDetails.ItemGroupTypeID!="1"&&SessionInfo.PopupMode=="Initial"){dynParam="ImageFilePath="+RecordThumbDetails.ImageUrl;}
else{dynParam="Apnum="+params;}
if(requesttype==vsDataType.similarcolors){urlSeemore+='GetImagesByImageColor?method=?&'+dynParam+'&RecordsPerPage='+SessionInfo.RecordsPerPage+'&PageNumber='+SessionInfo.PageNo+'&CustomerZoneId='+SessionInfo.CustomerZoneID+'&CurrencyCode='+SessionInfo.CurrencyCode;}
else if(requesttype==vsDataType.similarimages){urlSeemore+='GetSimilarImagesForImage?method=?&'+dynParam+'&RecordsPerPage='+SessionInfo.RecordsPerPage+'&PageNumber='+SessionInfo.PageNo+'&CustomerZoneId='+SessionInfo.CustomerZoneID+'&CurrencyCode='+SessionInfo.CurrencyCode;}
else if(requesttype==vsDataType.sameartist){urlSeemore+='GetSearchResultInSimpleFormat?method=?&Refinements=&Search=&RecordsPerPage='+SessionInfo.RecordsPerPage+'&PageNumber='+SessionInfo.PageNo+'&CustomerZoneId='+SessionInfo.CustomerZoneID+'&SortBy='+SessionInfo.SortBy+'&ArtistCategoryId='+RecordThumbDetails.ArtistCategoryID+'&APNumList=&ImageIdList=&CurrencyCode='+SessionInfo.CurrencyCode;}
else if(requesttype==vsDataType.cloudTag){urlSeemore+='GetSearchResultInSimpleFormat?method=?&Refinements='+params+'&Search=&RecordsPerPage='+SessionInfo.RecordsPerPage+'&PageNumber='+SessionInfo.PageNo+'&CustomerZoneId='+SessionInfo.CustomerZoneID+'&SortBy='+SessionInfo.SortBy+'&ArtistCategoryId=0&APNumList=&ImageIdList=&CurrencyCode='+SessionInfo.CurrencyCode;}
else if(requesttype==vsDataType.recentlyviewed){urlSeemore+='GetSearchResultInSimpleFormat?method=?&Refinements=&Search=&RecordsPerPage='+SessionInfo.RecordsPerPage+'&PageNumber=1&CustomerZoneId='+SessionInfo.CustomerZoneID+'&SortBy='+SessionInfo.SortBy+'&ArtistCategoryId=0&APNumList=&ImageIdList='+params+'&CurrencyCode='+SessionInfo.CurrencyCode;}
else{urlSeemore+='GetImageInformation?method=?&ImageId='+RecordThumbDetails.ImageID+'&CustomerZoneId='+SessionInfo.CustomerZoneID+'&CurrencyCode='+SessionInfo.CurrencyCode;}
return urlSeemore;}
function CheckErrorsOrNoResults(callbackResults){if(callbackResults.ResponseCode!="200"){return true;}
if(callbackResults.ResultSummary!=''){if(callbackResults.ResultSummary.TotalRecordCount<1)return true;}
false;}
String.format=function(){var s=arguments[0];for(var i=0;i<arguments.length-1;i++){var reg=new RegExp("\\{"+i+"\\}","gm");s=s.replace(reg,arguments[i+1]);}
return s;}
String.prototype.endsWith=function(suffix){return(this.substr(this.length-suffix.length)===suffix);}
String.prototype.startsWith=function(prefix){return(this.substr(0,prefix.length)===prefix);}
String.prototype.autoEllipseText=function(limit){if(this.length-1>limit)return this.substr(0,limit-3)+'...';return this;}
function trackEventsForGA(eventName){try{console.log('Google tracking : Event ='+eventName);}
catch(e){}
if(typeof(_gaq)!="undefined"){var tmpEventName="\'"+eventName+"\'";_gaq.push(['t1._trackEvent','VisualSearch',tmpEventName,tmpEventName]);}}
function trackGAEvent(eventName,pageName){try{console.log('Google tracking : Event ='+eventName);}
catch(e){}
if(typeof(_gaq)!="undefined"){var tmpEventName="\'"+eventName+"\'";var tmpPageName="\'"+pageName+"\'";_gaq.push(['t1._trackEvent',tmpPageName,tmpEventName,tmpEventName]);}}
$('#p2alink').live('click',function(){trackGAEvent('_trackPageview','/p2a-cta/gallery-page');setTimeout(function(){location.href='/photostoart';},200);return false;});$('div.divBtn > img.icongal').live('click',function(){var imgObject=$(this).parent().find('.mygalrecInfo').text();var myObject=eval('('+imgObject+')');MyGalleriesCore.getModel().setSelectedImageObject(myObject);MyGalleriesCore.externalAddToGallery(MyGalleriesCore.constants.GALLERY_PAGE);});$(document).ready(function(){var param=$('#lastPageUrl').text();var cookieobject=new com.art.core.cookie.Cookie();cookieobject.setCookieDictionary('arts','lastPage',param,'/',cookieobject.getCookieDomain('art'));});var ImageCount;$(document).ready(function(){ImageCount=$('#arItemCount').text();jQuery('.jcarousel-skin-ar').jcarousel({size:ImageCount,visible:4,scroll:4});jQuery('.jcarousel-no-scroll').jcarousel({size:ImageCount,visible:8,scroll:8,buttonNextHTML:null,buttonPrevHTML:null});});$('.jcarousel-skin-ar li .itemBox').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.jcarousel-skin-ar li .itemBox').bind('mouseleave',function(){$(this).css('cursor','hand');});$('.jcarousel-skin-ar li img').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.jcarousel-skin-ar li img').bind('mouseleave',function(){$(this).css('cursor','hand');});$('.arTop li .itemBoxSeeMore').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.arTop li .itemBoxSeeMore').bind('mouseleave',function(){$(this).css('cursor','hand');});$('.arTop li .itemBox').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.arTop li .itemBox').bind('mouseleave',function(){$(this).css('cursor','hand');});$('.arTop li img').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.arTop li img').bind('mouseleave',function(){$(this).css('cursor','hand');});$('.infoIcon').live('click',function(){var offset=$(this).offset();var heightOfToolTipContainer=$('.arModuleToolTip').height();var widthOfToolTipContainer=$('.arModuleToolTip').width();if($('.arModuleToolTip').css('display')=='none'){showToolTip((offset.top-(heightOfToolTipContainer+62)),(offset.left-(widthOfToolTipContainer/2)));}
else if($('.arModuleToolTip').css('display')=='block'){$('.arModuleToolTip').hide();}});$('.infoIconArTop').live('click',function(){var offset=$(this).offset();var heightOfToolTipContainer=$('.arModuleToolTip').height();if($('.arModuleToolTip').css('display')=='none'){showToolTip((offset.top-heightOfToolTipContainer),(offset.left+30));}
else if($('.arModuleToolTip').css('display')=='block'){$('.arModuleToolTip').hide();}});function showToolTip(topPos,leftPos){if($.browser.msie&&parseInt($.browser.version,10)<9){$('.arcontainer').css('top',topPos+5);}
else
{$('.arcontainer').css('top',topPos);}
$('.arModuleToolTip').show()}
$('.tooltipClose').live('click',function(){$('.arModuleToolTip').hide();});$('.arTop li').live('click',function(){var index=$(this).index();var URL=$(this).find('#destinationURL').text();if(ImageCount==index+1){goToURL(URL,"gallery");}
else{goToURL(URL,"product");}});$('.jcarousel-skin-ar li').live('click',function(){var index=$(this).index();var URL=$(this).find('#destinationURL').text();if(ImageCount==index+1){goToURL(URL,"gallery");}
else{goToURL(URL,"product");}});$('.arClose').live('click',function(){$('.arProductContainer').hide();$("#ModuleLightbox").remove();});$('.arClose').bind('mouseenter',function(){$(this).css('cursor','pointer');});$('.arClose').bind('mouseleave',function(){$(this).css('cursor','hand');});function goToURL(URL,type){SetHeaderCookie();if(type=="product"){var lb=new com.art.core.components.LightBox("ModuleLightbox","body",0.7);lb.show();$('.arProductContainer').css({"position":"absolute","z-index":"1008"});$('.arProductDetailsContainer').html(showLoadingImage());$('.arProductDetailsContainer img').centerElement();$('.arProductContainer').center();this.detailsDelayTimerID=setTimeout(function(){$('.arProductDetailsContainer').html(getProductPageHTML(URL));},1000);$('.arProductContainer').show();}
else
{window.location.href=URL;}}
function getProductPageHTML(productURL){var str="";productURL=productURL+"?inLightBox=true";str+="<iframe src='"+productURL+"' class='arProductDetails' frameBorder=0></iframe>";return str;}
function showLoadingImage()
{var str="<img src='http://cache1.artprintimages.com/images/photostoart/loading.gif' id='spinner'/>"
return str;}
function SetHeaderCookie(){var cookieExpdate=new Date();var showValue=1;cookieExpdate.setDate(cookieExpdate.getDate()+730);com.art.core.cookie.Cookie.prototype.setCookieDictionary('ap','ARvisited',showValue,'/',com.art.core.cookie.Cookie.prototype.getCookieDomain('art'),cookieExpdate);SetARTCookie(window.location.href,"false");}
var t;var currentSortByID='P_SiteRank';var strSortBy='<font color="#888888">SORT BY: </font>'
var $selectedThumb;$(document).ready(function(){var currentSortBy='';currentSortBy=GetCookieDictionary('ENDECA','Ns');if(currentSortBy!=''){$('.gal-sortby').each(function(){if($(this).attr('id')==currentSortBy){currentSortByID=$(this).attr('id');newSortByText=$(this).text();$('#gal-customcombobox').text(newSortByText);setSelectedSortBy(currentSortByID);}});}
$('#gal-customcomboboxcontainer').hover(function(){if(isiOSDevice()){$('#gal-customcombooptions').toggle();return false;}
else{$('#gal-hovercombobox').show();$('#gal-hovercombobox').html($.trim($('#gal-customcombobox').html()));}},function(){$('#gal-hovercombobox').hide();}).click(function(){$('#gal-customcombooptions').toggle();return false;});$('#gal-customcombobox').html(strSortBy+$.trim($('#gal-customcombobox').text()));$('.gal-sortby').bind('click',function(){var comboBoxTxt=$.trim($(this).text());$('#gal-customcombobox').html(strSortBy+comboBoxTxt);currentSortByID=$(this).attr('id');$('#gal-customcombooptions').hide();com.art.core.cookie.Cookie.prototype.setCookieDictionary('WT','WT.cg_n',"Gallery+Sort+Change",'/',com.art.core.cookie.Cookie.prototype.getCookieDomain('art'));selectNs(currentSortByID);setSelectedSortBy(currentSortByID);}).hover(function(){$('.gal-sortby').css({"backgroundColor":""});$(this).css({"backgroundColor":"#000000"});},function(){});$('.galActions .galButton,.gal-button,.gal-icon-button').hover(function(){if(!$(this).hasClass('disabled'))
$(this).addClass('hover');},function(){$(this).removeClass('hover');});$('#gal-gotop,.arrow-icon').hover(function(){$('#gal-gotop').addClass('hover');$('.arrow-icon').addClass('hover');},function(){$('#gal-gotop').removeClass('hover');$('.arrow-icon').removeClass('hover');});$('#gal-gotop-icon,#gal-gotop').live('click',function(){$('html, body').animate({scrollTop:0},'slow');});$(document).bind('click',function(){$('#gal-customcombooptions').hide();$('#gal-zoom').hide();});$('#gal-zoom').bind('click',function(){$(this).hide();});$('.gal-product-size-multi').hover(function(){$(this).addClass('gal-hover');},function(){$(this).removeClass('gal-hover');});$('.galThumbContainer .galTitle, .galThumbContainer .galPricing, .galThumbContainer .galProductType, .galThumbContainer .gal-product-size, .galThumbContainer .galProductType, .galThumbContainer .gal-product-size-multi ').bind('click',function(){productHref=$(this).parents('.galThumbContainer').find('.galImageCell a').attr('href');location.href=productHref;});$('#gal-zoom .galTitle,#gal-zoom .gal-product-size-multi').live('click',function(){productHref=$(this).parents('#gal-zoom').find('.gal-zoom-img-href').attr('href');location.href=productHref;});$('.galImage').click(function(e){if($('#popupplaceholder').is(':visible'))
e.preventDefault();});$('.galArtistProduct').find('.galProductType').each(function(){var theType=$(this).text();if(theType=="Art Print"||theType=="Giclee Print"||theType=="Photographic Print"||theType=="Serigraph"||theType=="Wall Tapestry"||theType=="Stetched Canvas Transfer"||theType=="Hand Painted Art"||theType=="Limited Edition")
$(this).addClass('type-tooltip-link');});$('.type-tooltip-link').live('mouseenter',function(){if($(this).parents('#gal-zoom')>0)
return false;clearTimeout(t);displayTypeTooltip($(this));});$('.type-tooltip-link').live('mouseleave',function(){clearTimeout(t);t=setTimeout('hideTypeTooltip()',500);});$('#type-tooltip').hover(function(){clearTimeout(t);},function(){clearTimeout(t);t=setTimeout('hideTypeTooltip()',500);});$('#type-tooltip-more').hover(function(){$(this).css('color','#EF9223');},function(){$(this).css('color','#888');});$('#type-tooltip-more').bind('click',function(){var ttType=$('#type-tooltip-title').text();var features="dialog=1,resizable=0,menubar=0,scrollbars=0,status=0,toolbar=0,width=430,height=456";var typeParam='productType='+ttType;window.open('/asp/ProductTypeInfo/ProductTypeInfo.asp?'+typeParam,'',features);});if($.browser.msie&&parseInt($.browser.version,10)<9){$("<style>.gal-zoom-img-href .shadow{margin: 0px auto !important;} #gal-zoom-inner {padding-right:8px !important;} </style>").appendTo('head');}
$('.gal-zoom-add-to-cart').bind('click',function(){$selectedThumb.find('.galAddToCart').trigger('click');});$('.gal-zoom-frame-it').bind('click',function(){$selectedThumb.find('.galFrameIt').trigger('click');});$('.gal-save-to-gallery').bind('click',function(){$selectedThumb.find('.gal-save-to-gal').trigger('click');});$('.galImage').mouseenter(function(){var $this=$(this).parents('.galThumbContainer');$selectedThumb=$this;var $zoom=$('#gal-zoom');$zoom.hide();var $img=$(this);var $zoomImg=$zoom.find('.gal-zoom-image');var itemHref=$(this).parent().attr('href');$('.gal-zoom-img-href').attr('href',itemHref);if($('#popupplaceholder').is(':visible')){clearTimeout(t);return false;}
$theImage=$img;medImageWidth=$theImage.width();medImageHeight=$theImage.height();var maxImgWidth=350;var maxImgHeight=390;var theImageRatio;if(medImageWidth>=medImageHeight){theImageRatio=medImageHeight/medImageWidth;lrgImageWidth=maxImgWidth;lrgImageHeight=Math.round(lrgImageWidth*theImageRatio);}
else{theImageRatio=medImageWidth/medImageHeight;lrgImageHeight=maxImgHeight;lrgImageWidth=Math.round(lrgImageHeight*theImageRatio);}
theItemImageSrc=$theImage.attr('src');$zoomImg.attr('src',theItemImageSrc);$zoomImg.attr('width',lrgImageWidth);$zoomImg.attr('height',lrgImageHeight);newItemImageSrc=theItemImageSrc.replace('MED','LRG');var pos=theItemImageSrc.indexOf("MXW");if(pos>1){newItemImageSrc=theItemImageSrc.replace(theItemImageSrc.substr(pos,theItemImageSrc.indexOf("MXH")-pos),'MXW:'+maxImgWidth+'+');pos=newItemImageSrc.indexOf("MXH");newItemImageSrc=newItemImageSrc.replace(newItemImageSrc.substr(pos,newItemImageSrc.indexOf("QLT")-pos),'MXH:'+maxImgHeight+'+');}
$zoomImg.attr('src',newItemImageSrc);if($img.hasClass('shadow'))
$zoomImg.addClass('shadow');else
$zoomImg.removeClass('shadow');var detailsText=$this.find('.galDetailsContainer').html();$zoom.find('.gal-zoom-text').html(detailsText);$zoom.find('.gal-zoom-text > .galArtistProduct').css('margin-bottom','15px');$zoom.find('.galTitle').text($img.attr('title'));var $artist=$zoom.find('.gal-artist');$artist.attr('onmouseover','this.style.color="#EF9223"');$artist.attr('onmouseout','this.style.color="#888"');var cartOnClick=$this.find('.galAddToCart').attr('onclick');var frameOnClick=$this.find('.galFrameIt').attr('onclick');var galOnClick=$this.find('.gal-save-to-gal').attr('onclick');$zoom.find('.gal-zoom-frame-it').removeClass('disabled').text('frame it');if($this.find('.galFrameIt').css('visibility')=='hidden'){$zoom.find('.gal-zoom-frame-it').addClass('disabled').text('can\'t frame');$zoom.find('.gal-zoom-frame-it').attr('onclick','');}
var offset=$this.offset();theItemTop=offset.top;theItemLeft=offset.left;zoomWidth=lrgImageWidth+42;if(zoomWidth<335)
zoomWidth=335;$zoom.width(zoomWidth);largeImageTop=$theImage.offset().top-(lrgImageHeight-medImageHeight)/2;theItemLeft=theItemLeft-($zoom.width()-$this.width())/2;theItemTop=largeImageTop-21;var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;qscreenHeight=y;qscreenWidth=x;var theScrollTop=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;theScrollTop=parseInt(theScrollTop);if((theItemTop-theScrollTop+$zoom.height())>(qscreenHeight)){theItemTop=theScrollTop-(($zoom.height())-qscreenHeight)-30;}
else if(theItemTop<theScrollTop){theItemTop=theScrollTop;}
if((theItemLeft+$zoom.width())>(qscreenWidth)){theItemLeft=qscreenWidth-$zoom.width();}
$zoom.css('top',theItemTop);$zoom.css('left',theItemLeft);t=setTimeout('showImageZoom()',500);SetRecordThumbDetails($this);if(RecordThumbDetails.ShowCanvas=="True"){$("#gal-zoom-inner > #wrap1").addClass('canvaswrap1');$("#gal-zoom-inner > #wrap1 > #wrap2").addClass('canvaswrap2');$("#gal-zoom-inner > #wrap1 > #wrap2 > #wrap3").addClass('canvaswrap3');}
else{$("#gal-zoom-inner > #wrap1").removeClass('canvaswrap1');$("#gal-zoom-inner > #wrap1 > #wrap2").removeClass('canvaswrap2');$("#gal-zoom-inner > #wrap1 > #wrap2 > #wrap3").removeClass('canvaswrap3');}
SetGlobalSessionInfo($this);});$('#gal-zoom').bind('mouseleave',function(){hideImageZoom();});$('.galImage').bind('mouseout',function(){clearTimeout(t);});$("#galleft #pane2 .jspVerticalBar").show();if($('#seeAllSubjectId').length>0){var showExpand=false;$("#galleft #pane2").css('height',"155px");$("#galleft #pane2 .jspVerticalBar").hide();$('#seeAllSubjectId .seeMore').live('click',function(){$(this).hide();$('#seeAllSubjectId .seeLess').show();$("#galleft #pane2").css('height',"355px");$("#galleft #pane2 .jspVerticalBar").show();});$('#seeAllSubjectId .seeLess').live('click',function(){$(this).hide();$('#seeAllSubjectId .seeMore').show();$("#galleft #pane2").css('height',"155px");$("#galleft #pane2 .jspVerticalBar").hide();$('#galleft #pane2 .jspPane').css('top','0px');$('#galleft #pane2 .jspDrag').css('top','0px');});$('#seeAllSubjectId .seeMore, #seeAllSubjectId .seeLess').live('mouseover',function(){$(this).css('color','#EF9223');});$('#seeAllSubjectId .seeMore, #seeAllSubjectId .seeLess').live('mouseout',function(){$(this).css('color','#888888');});}});function showImageZoom(){$('#gal-zoom').fadeIn('fast');clearTimeout(t);}
function hideImageZoom(){$('#gal-zoom').hide();$('#type-tooltip').hide();}
function setSelectedSortBy(sortByKey){$('.gal-sortby').each(function(){if($(this).attr('id')==sortByKey){$('.gal-sortby').css({"backgroundColor":""});$(this).css({"backgroundColor":"#000000"});}});}
function DisplayTooltipText(tooltipvalue){var artTooltip;switch(tooltipvalue)
{case"Art Print":artTooltip="Expertly produced reproduction using high-quality paper and printing.";break;case"Giclee Print":artTooltip="A high precision printing process delivered on heavy-weight, watercolor paper.";break;case"Photographic Print":artTooltip="Exceptional detail and color captured on heavy-weight photographic paper.";break;case"Serigraph":artTooltip="Silk screening produces a bold, vibrant art print of gallery quality.";break;case"Wall Tapestry":artTooltip="Textile art created with cotton or blended yarns on Jacquard looms.";break;case"Stetched Canvas Transfer":artTooltip="Artist-grade cotton canvas wrapped on stretcher bars with hand-painted edges.";break;case"Hand Painted Art":artTooltip="A handpainted original created by the same artist from start to finish.";break;case"Limited Edition":artTooltip="Often signed and/or numbered, prints certified in a limited one-time printing. ";break;default:artTooltip="";}
return artTooltip;}
function displayTypeTooltip($link){var $tooltip=$('#type-tooltip');$tooltip.hide();var ttProductType=$link.text();var ttText=DisplayTooltipText(ttProductType);$('#type-tooltip-title').text(ttProductType);$('#type-tooltip-text').text(ttText);var offset=$link.offset();var topPos=offset.top-$tooltip.height()-10;if($.browser.msie&&parseInt($.browser.version,10)<9){var topPos=offset.top-$tooltip.height()-2;$("div#type-tooltip-arrow").addClass("tooltip-arrow-ie8");}
var leftPos=offset.left;$tooltip.css('top',topPos).css('left',leftPos)-5;t=setTimeout('showTypeTooltip()',500);}
function showTypeTooltip(){clearTimeout(t);$('#type-tooltip').show();}
function hideTypeTooltip(){clearTimeout(t);$('#type-tooltip').hide();}
$('.gal-vsearch-hdr .gal-l-nav-pad').hover(function(){$('#vsimg').removeClass('vsimg');$('#vstext').removeClass('vstext');$('#vsimg').addClass('vsimghover');$('#vstext').addClass('vstexthover');},function(){$('#vstext').removeClass('vstexthover');$('#vsimg').removeClass('vsimghover');$('#vstext').addClass('vstext');$('#vsimg').addClass('vsimg');});$('.clrallbtn, .leftnav-clrall').hover(function(){$('.clrallbtn').addClass('hover');$('.leftnav-clrall').addClass('catlnkover');},function(){$('.clrallbtn').removeClass('hover');$('.leftnav-clrall').removeClass('catlnkover');$('.leftnav-clrall').addClass('catlnk');});$('.leftnav-clrsel-header').hover(function(){$(this).siblings().addClass('hover');$(this).addClass('catlnkover');},function(){$(this).siblings().removeClass('hover');$(this).removeClass('catlnkover');$(this).addClass('catlnk');});$('.clrsel-btn').hover(function(){$(this).addClass('hover');$(this).siblings().addClass('catlnkover');},function(){$(this).removeClass('hover');$(this).siblings().removeClass('catlnkover');$(this).siblings().addClass('catlnk');});$('.Next, .previous').hover(function(){$('.Next').addClass('hover');$('.previous').addClass('hover');},function(){$('.Next').removeClass('hover');$('.previous').removeClass('hover');});$(".catlnk").click(function(){var GAcategory="Gallery Static Filter"
var categoryclicked=$(this).text();categoryclicked=categoryclicked.replace(/^\s+|\s+$/g,'');var itemcategory="";var itemcategory=$(this).parent().parent().parent().prev('.leftnav-header-Accordian').text();if(itemcategory=="product types"||itemcategory=="sizes"||itemcategory=="shapes"||itemcategory=="prices"){if(typeof(_gaq)!="undefined"){var msg='GA: Category: ['+GAcategory+'] EventAction: ['+itemcategory+'] EventLabel: ['+categoryclicked+']';try{console.log(msg);}
catch(e){}
_gaq.push(['t1._trackEvent',GAcategory,itemcategory,categoryclicked,undefined,true]);}}
if($(this).parent().parent().parent().prev('div').hasClass('leftnav-subtitle-noindent')||$(this).parent().parent().parent().prev('div').hasClass('leftnav-subtitle')){itemcategory=$(this).parent().parent().parent().prev().prev().prev('.leftnav-header-Accordian').text();if(itemcategory=="product types"){if(typeof(_gaq)!="undefined"){var msg='GA: Category: ['+GAcategory+'] EventAction: ['+itemcategory+'] EventLabel: ['+categoryclicked+']';try{console.log(msg);}
catch(e){}
_gaq.push(['t1._trackEvent',GAcategory,itemcategory,categoryclicked,undefined,true]);}}}});$(".cat").click(function(){var GAcategory="Gallery Static Filter"
var categoryclicked=$(this).text();categoryclicked=categoryclicked.replace(/^\s+|\s+$/g,'');var itemcategory="";itemcategory=$(this).parent().parent().parent().prev('.leftnav-header-Accordian').text();if(itemcategory=="product types"){if(typeof(_gaq)!="undefined"){var msg='GA: Category: ['+GAcategory+'] EventAction: ['+itemcategory+'] EventLabel: ['+categoryclicked+']';try{console.log(msg);}
catch(e){}
_gaq.push(['t1._trackEvent',GAcategory,itemcategory,categoryclicked,undefined,true]);}}
if($(this).parent().parent().parent().prev('div').hasClass('leftnav-subtitle-noindent')||$(this).parent().parent().parent().prev('div').hasClass('leftnav-subtitle')){itemcategory=$(this).parent().parent().parent().prev().prev().prev('.leftnav-header-Accordian').text();if(itemcategory=="product types"){if(typeof(_gaq)!="undefined"){var msg='GA: Category: ['+GAcategory+'] EventAction: ['+itemcategory+'] EventLabel: ['+categoryclicked+']';try{console.log(msg);}
catch(e){}
_gaq.push(['t1._trackEvent',GAcategory,itemcategory,categoryclicked,undefined,true]);}}}});$(".mod_clr_swtch").click(function(){var GAcategory="Gallery Static Filter"
var colorclicked=$(this).attr("title");var itemcategory="";var itemcategory=$(this).parent().parent().prev().prev('.leftnav-header-Accordian').text();if(typeof(_gaq)!="undefined"){var msg='GA: Category: ['+GAcategory+'] EventAction: ['+itemcategory+'] EventLabel: ['+colorclicked+']';try{console.log(msg);}
catch(e){}
_gaq.push(['t1._trackEvent',GAcategory,itemcategory,colorclicked,undefined,true]);}});$(document).bind('click',function(event){var $target=$(event.target);if(($target.attr('id')!='popupplaceholder')&&$target.parents('#popupplaceholder').length<=0)
{$('#popupplaceholder').hide();}});$('.galgoback').hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover');});if($('#gobackmain').length>0){var noresultstext="<span class=\"gCustomFont gal-header-text\" style=\"line-height:60px; \">NO RESULTS FOUND</span>";$('#didyoumeanc').append(noresultstext);}