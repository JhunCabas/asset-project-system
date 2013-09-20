<?php
include 'config.php';

mysql_query('INSERT INTO student (studentName,studentSurname,studentAge) VALUE ("'.$_GET['studentName'].'","'.$_GET['studentSurname'].'","'.$_GET['studentAge'].'")');

?>