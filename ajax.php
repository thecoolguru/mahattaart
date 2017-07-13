<?php $sel=mysql_connect('localhost','admin_wallsnart','arts@#009')or die('connection error');
$con=mysql_select_db("wallsnart_beta")or die(mysql_error().'database Error');
if($_POST['act'])
{
$_POST['act']();
}

function Registor()
{

	$ips=$_SERVER['REMOTE_ADDR'];
	$bro=$_SERVER['HTTP_USER_AGENT'];
	
	 $q1="select * from registor_counter where ips='ips' and bro='$bro'";
	$rs=mysql_query($q1)or die(mysql_error());
		if(mysql_num_rows($rs))
		{
		$Q=" insert into registor_counter set c='1', ips='$ips' ,bro='$bro' ";
		}
		else
		{
		$Q=" update  registor_counter set c = c+1 where  ips='$ips' and bro='$bro'";
		}
	mysql_query($Q)or die(mysql_error());
	$qf="select c from registor_counter where ips='$ips' and bro='$bro' ";
	$rrf=mysql_query($qf)or die(mysql_error()); //$CON->query($qf)or die($CON->error);
	$d=mysqli_affected_assoc($rrf);

	print_r($d['c']); //print_r($_REQUEST);

}


?>