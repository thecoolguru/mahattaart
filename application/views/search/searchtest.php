<form action="<?php print base_url(); ?>index.php/search/search_test" method="post">
<input type="text" name="keyword" value="<?php if(isset($keyword)){print $keyword; }?>">
<br>
<input type="submit" value="Search">
</form>

<?php 
if(isset($search_data))
{
	//print_r($search_data);
	print "Total Results Found : ".count($search_data);
	print "<br><br>";
	print "<table>";
	foreach ($search_data as $data){
?>
<tr>
	<td>
		<img src="http://www.indiapicture.in/wallsnart/398/<?php print $data->images_filename; ?>" style="max-height: 120px" />
	</td>
	<td>
		<p><?php print $data->images_keywords; ?></p>
	</td>
</tr>		
<?php 	
}
print "</table>";
}
?>