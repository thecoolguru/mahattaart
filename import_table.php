<?
ini_set("upload_max_filesize","536870912M");
ini_set('memory_limit','536870912M'); 
ini_set('max_execution_time','30000'); 

$con=mysql_connect('localhost','beta_mahattaart','beta_mahattaart@321');
mysql_select_db('beta_mahattaart',$con);



$templine = '';
// Read in entire file
$filename='wallsnart_beta.sql';
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>

