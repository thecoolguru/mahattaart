<head>
    <title>Manage category</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/_styles.css " media="screen"/>
    <script type = "text/javascript">
        $(document).ready(function(){

            $("#add_main_category").submit(function(){

                if(	$('#add').val()=="")
                {
                    $('#add_error').html("Please Enter Name");
                    return false;
                }});
        });
                </script>
</head>
<body>
  <?php

foreach($cat as $array)
{
    $arrayCategories[$array['id']] = array("p_id" => $array['p_id'], "name" =>
    $array['name'] ,"id"=> $array['id'],"keywords"=>$array['keywords'],"status"=>$array['status']);
}
function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
    foreach ($array as  $categoryId => $category) {

        if ($currentParent == $category['p_id']) {

            if ($currLevel > $prevLevel) echo " <ol class='tree'>  ";

            if ($currLevel == $prevLevel) echo " </li> ";

            if($category['status']==0)
            {
            echo '<li>  <label style="color:red; for ="subfolder2" >  '.$category['name'].' &nbsp &nbsp <a href="view_editcategory/'.$category['id'].'">Edit </a>  &nbsp  <a href="add_category/'.$category['id'].'/'.$category['name'].'"> Add </a>&nbsp <a href="view_images/'.$category['id'].'">show_images </a>  </label> <input type="checkbox" id="subfolder2"/>' ;
            }
            if($category['status']==1)
            {
                echo '<li>  <label for ="subfolder2" > '.$category['name'].' &nbsp &nbsp <a href="view_editcategory/'.$category['id'].'">Edit </a>  &nbsp <a href="add_category/'.$category['id'].'/'.$category['name'].'"> Add </a>&nbsp <a href="view_images/'.$category['id'].'">show_images </a>  </label> <input type="checkbox" id="subfolder2"/>' ;
            }

            if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

            $currLevel++;

            createTree ($array, $categoryId, $currLevel, $prevLevel);

            $currLevel--;
        }

    }

    if ($currLevel == $prevLevel) echo " </li>  </ol> ";

}?>
<div id="middle-wrapper">

    <div class="main-hdr"> Manage Category</div>

    <form class="add_main_category" name="add_main_category" action="<?=base_url()?>index.php/backend/add_maincategory" method="post">
    <table>
    <tr>
    <td  colspan="4">Add Main Category :</td>&nbsp
    <td><input type ="text" id="add" name="add" placeholder="Eg:abc"  class="inputbxs" /><span id="add_error" style="color:#F00"></span></td>
        <td> <input type="submit" value="Add" class="bt-category" class="inputbxs"> </td>
    </tr>
        <tr>
        <td></td>

     </table>

    </form>
<br/>
<?php
createTree($arrayCategories, 0); ?>


<div style="margin:100px 0 25px 40px"><a href="javascript:window.history.back()" class="bt-back"> Back </a></div></div>
</body>
</html>