<?php
    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "zsq001";
    $mysql_database = "db_book";
    $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
    or die(mysql_error());
    mysql_select_db($mysql_database, $bd) or die(mysql_error());
?>