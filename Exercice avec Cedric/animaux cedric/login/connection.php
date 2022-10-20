<?php
$db_host="localhost"; 
$db_user="root";
//$db_password="root"; mac
$db_password=""; // PC window
$db_name="animaux";

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



