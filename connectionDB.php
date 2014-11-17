<?php

$db = mysql_connect('localhost', 'root', 'heuz43yp');
if (!$db) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('cdp', $db);

?>