<?php 
ob_start();
error_reporting(0);
require_once('classes/settings.php');
$get=new My_function();
 
$row1= $get->Get_photographerName('tbl_adminusers');
 $code= $get->Get_photographerCode('tbl_adminusers');
 $mail= $get->Get_photographerEmail('tbl_adminusers');


    

?>

  
   
<div id="page-wrapper">
			<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Photographer List</h2>
					</div>
                                    
				
<div class="panel panel-widget">
    
	<h4>Filter Option:</h4>
        <br>  <br> 
        By name <select onchange="return GetByName();" id="photographer_name" name="photographer_name"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Name--</option>
</optgroup>
<option value="all" >All User</option>
<?php while($result=$get->My_Fetch_Ass($row1)){?>
<option value="<?=$result['adminusers_id'];?>"><?=$result['adminusers_fullname'];?></option>
<?php }?>
    </select>  
        
        
        &nbsp; 
        
  By Code <select onchange="return GetByCode();" id="photographer_code" name="photographer_code"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Code--</option>
</optgroup>
<?php while($result=$get->My_Fetch_Ass($code)){?>
<option value="<?=$result['adminusers_reference_id'];?>"><?=$result['adminusers_reference_id'];?></option>
<?php }?>
    </select> 
  &nbsp; 
     
  By Email Id <select onchange="return GetByEmailid();" id="photographer_email" name="photographer_email"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
<optgroup  >
<option value="">--Select Email Id--</option>
</optgroup>
<?php while($result=$get->My_Fetch_Ass($mail)){?>
<option value="<?=$result['adminusers_email'];?>"><?=$result['adminusers_email'];?></option>
<?php }?>
    </select> 
  
  <br><br>
  
  
  
  <div class="checkbox">
      Select By Portal  <label>WallsnArt</label> <label><input name="radio" <?php if(@$_REQUEST['search_portal']=='wallsnart'){?> checked=""<?php }?> type="radio" id="wallsnart" value="wallsnart"></label>&nbsp;<label>Indiapicture</label> <label><input type="radio"  <?php if(@$_REQUEST['search_portal']=='indiapicture'){?> checked=""<?php }?> id="indiapicture" name="radio" value="indiapicture">&nbsp;</label>&nbsp;<label>IbudgetPhoto</label> <label><input id="ibudgetphoto" type="radio" name="radio" <?php if(@$_REQUEST['search_portal']=='ibudgetphoto'){?> checked=""<?php }?> value="ibudgetphoto"></label>

      &nbsp;
      <button type="button" class="btn btn-success" id="search_portal" onclick="return GetByPortal();">Search By Portal</button>
      <br>
      <span id="error_msg" style="margin-left: 129px; color:red;"></span>
  </div>
       
<div class="checkbox">
            <h4>Select Date Range</h4>
            <input type="text" id="config-demo" class="form-control"  style="padding: 23px 16px; width: 220px">
           
          </div>
  
  
<script type="text/javascript">
    
    
      $(document).ready(function() {
        
    updateConfig();
     
        function updateConfig() {
          var options = {};
         
          $('#config-demo').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
           
        }
    
      });
     
     
     
     
     
      function GetByPortal(){
              
             if($('input[type=radio]:checked').length == 0)
            {
        //alert('Please choose at least one for search!');
        $('#error_msg').html('Please choose at least one for search!')
        $('#wallsnart').focus();
        return false;
    }else{
       
     var checkedcount=   $('input[type=radio]:checked').val();
    
          
       window.location.href="view_photographer.php?search_portal="+checkedcount;
    }
             
            }   



     
     
            function GetByDateRange(){
                
                var daterangepicker_start=  $('#daterangepicker_start').val();
                var daterangepicker_end=  $('#daterangepicker_end').val();
              window.location.href="view_photographer.php?daterangepicker_start="+daterangepicker_start+"&daterangepicker_end="+daterangepicker_end;
            }
            
             function GetByEmailid(){
              var photographer_email=  $('#photographer_email').val();
              window.location.href="view_photographer.php?photographer_email="+photographer_email;
            }
            
            function GetByName(){
              var photographer_name=  $('#photographer_name').val();
              window.location.href="view_photographer.php?photographer_name="+photographer_name;
            }
            
            function GetByCode(){
              var photographer_code=  $('#photographer_code').val();
              window.location.href="view_photographer.php?photographer_code="+photographer_code;
            }
            </script>
          <style type="text/css">
      .demo { position: relative; }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
      </style>
    <br>
	<div style="clear:both;"></div>
            <div class="tables">
<!--              <h4></h4>-->
<table> 
                <thead>
                    
                  <tr>
                    <th>S.R. No.</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Email Id</th>
                    <th>Password</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Name Of Bank</th>
                    <th>A/C Number</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $srn=1;
                      
                      if($_REQUEST['photographer_name']=='all')
                            {
                          
                           $rows= $get->Get_photographer_details('tbl_adminusers');
                          
                            }else
                      
                      if(isset($_REQUEST['search_portal']))
                            {
                           $rows= $get->SearchByPortal($_REQUEST['search_portal'],'tbl_adminusers');
                            }else
                            if(isset($_REQUEST['daterangepicker_start']) && isset($_REQUEST['daterangepicker_end']))
                            {
                           $rows= $get->SearchBydataRange($_REQUEST['daterangepicker_start'],$_REQUEST['daterangepicker_end'],'tbl_adminusers');
                            }
                      elseif(isset($_REQUEST['photographer_email']))
                            {
                           $rows= $get->SearchByEmail($_REQUEST['photographer_email'],'tbl_adminusers');
                            }       
                      elseif(isset($_REQUEST['photographer_name']))
                            {
                           $rows= $get->SearchByName($_REQUEST['photographer_name'],'tbl_adminusers');
                            } 
                         elseif(isset($_REQUEST['photographer_code']))
                            {
                           $rows= $get->SearchByCode($_REQUEST['photographer_code'],'tbl_adminusers');
                            } else{
                               $rows= $get->Get_photographer_details('tbl_adminusers');  
                            }
                                      if($get->My_Num_rows($rows)>0)
                                      {
                                                    while($result=$get->My_Fetch_Ass($rows)){
                                                    //echo $result['adminusers_id'];
                                                    
                                                        if($srn%2==0)
                                                        {
                                                            $color='#d9edf7';
                                                        }if($srn%2!=0)
                                                        {
                                                            $color='#ffff';
                                                        }
                                                        ?>
                    <tr style="background-color: <?=$color;?>">
                    <th scope="row"><?=$srn;?></th>
                    <td><?php echo $result['adminusers_first_name'].' '.$result['adminusers_last_name'];?></td>
                    <td><?=$result['adminusers_reference_id'];?></td>
                    <td><?=$result['adminusers_email'];?></td>
                    <td><?=$result['adminusers_ppassword'];?></td>
                    <td><?=$result['adminusers_mobile'];?></td>
                    <td><?=$result['adminusers_address_line1'];?></td>
                    <td><?=$result['adminusers_bank_name'];?></td>
                    <td><?=$result['adminusers_ac_no'];?></td>
                  </tr>
                                                    <?php $srn++;}?>
                                      <?php }else{?>
                  
                  
                  <tr>
                    <th ></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong style="color:#fd5c63">Sorry No records found</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                                      <?php }?>
                </tbody>
              </table>
            </div>
</div>

				</div>
				<!--//grids-->
				
			</div>
		</div>