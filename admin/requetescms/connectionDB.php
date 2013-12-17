<?
	$db = mysql_connect('db2612.1and1.fr', 'dbo337144275', 'heuz43yp');
	if (!$db) {
	    die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db('db337144275', $db);
?>