<?php
header( 'Content-type: text/xml' );
try
{
	$bdd = new mysqli('localhost:/tmp/mysql.sock','root','','chat');

}
catch(Exception $e)
{
	die('Erreur:'.$e->getMessage());
}
$req=$bdd->query("INSERT INTO chatitems VALUES ( null, null, '".
	mysql_real_escape_string( $_REQUEST['user'] ).
	"', '".
	mysql_real_escape_string( $_REQUEST['user_d'] ).
	"', '".
	mysql_real_escape_string( $_REQUEST['message'] ).
	"')" );
?>
<success />



