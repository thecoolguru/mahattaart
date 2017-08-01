
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tree/styles.css " media="screen"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add main category</title>
</head>

<body>
<div id="middle-wrapper">

    <div class="main-hdr"> Add Category</div>
    <div class="add-newcp">

    <form class="add_main_category" name="add_main_category" action="<?=base_url()?>index.php/backend/save_category" method="post">
   <table>
        <tr>
          <td> Parent ID:</td>
          <td><input type="text" value="<?php echo "$id"; ?>" name="parentid" id="parentid" readonly class="inputbxs" / ></td>
       </tr>
       <tr>
           <td> Parent Name:</td>
           <td><input type="text" value="<?php echo urldecode( $name); ?>" name="parentname" id="parentname" readonly class="inputbxs"/></td>
       </tr>
       <tr>
     <td> Name :</td> <td> <input type="text" name="catname" id="catname" class="inputbxs"/></td>
           </tr>
       <tr>
    <td>Keywords:</td><td><textarea  name="keywords" id="keywords" placeholder="abc,bcd,dfg" class="inputbxs"></textarea></td>
    
           </tr>
       <tr>
   <td> Status:</td>
   <td> <select name="status" class="inputbxs" >
           <option value="1"> Active</option>
           <option value="0"> Deactive</option>
           </select>
   </td>
           </tr>
           <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           </tr>
           <tr>
           <td>&nbsp;</td>
           <td><input type="submit" value="save" name="savecategory" class="bt-sbt-upload"  ></td>
           </tr>

   </table>
   
</form>
        </div>

        <div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>
</body>
</html>
