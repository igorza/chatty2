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
if($_REQUEST['past']){
	$result=$bdd->query('SELECT * FROM chatitems WHERE id >'.mysql_real_escape_string($_REQUEST['past']).' ORDER BY added LIMIT 50');
}
else{
	$result=$bdd->query('SELECT * FROM chatitems ORDER BY added LIMIT 50');
}
?>
<chat>
	<?php
	while ($row = mysql_fetch_assoc($result)) {
	?>
		<message added="<?php echo($row['added'])?>" id="<?php echo($row['id'])?>">
			<user><?php echo(htmlentities($row['user'])) ?></user>
			<text><?php echo(htmlentities($row['message'])) ?></text>
		</message>
	<?php
	}
	mysqli_free_result($result); ?>
</chat>
<!-- ($row = mysql_fetch_assoc($result)) -->
<!-- ($row = $result->fetch_assoc()) -->
