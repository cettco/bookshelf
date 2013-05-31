<?php
$fp = fopen("show.txt","w+");
fclose($fp);
$title = $_GET['title'];
$userid = $_SESSION['userid'];
require('config.php');
$sql = "SELECT page from books where userid='$userid' and title='$title'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
echo $row['page'];
?>