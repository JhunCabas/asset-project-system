<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_DATABASE = 'b542150005_workshop';

mysql_connect($DB_HOST,$DB_USER,$DB_PASS) or die(mysql_error());
mysql_select_db($DB_DATABASE) or die(mysql_error());
mysql_query('SET NAMES "utf8"');


?>