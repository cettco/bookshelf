<?php
session_start();
        $userid = $_SESSION['userid'];
        $mysql_hostname = "localhost";
        $mysql_user = "root";
        $mysql_password = "zsq001";
        $mysql_database = "db_book";
        $bd2 = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)or die(mysql_error());
        mysql_select_db($mysql_database, $bd2) or die(mysql_error());
        //$userid = $_SESSION['userid'];
        $sql = "SELECT title FROM books WHERE userid='$userid'";
        $result = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($result);
        //$name = "http://127.0.0.1:9999/bookshelf/include"
        $m = 1;
        $var = "";
        //$style ="style='background-image: url(http://127.0.0.1:9999/include/;'";
        for($i = 1;$i<=$count;$i++){
            $row = mysql_fetch_array($result);
            if($i%3==0){
                $title = $row['title'];
                $img ="data/".$title.".1/0.png";
                $url ="background-image: url(http://127.0.0.1:9999/bookshelf/include/$img);";
                $name = "http://127.0.0.1:9999/bookshelf/include/data/".$userid."/".$title.".1";
                $var=$var."<div class='column'><div class='sample thumb3 cover' name='$title' style='$url'></div><div class='delete-icon' name='$title'></div></div></div></div>";
                $m++;
            }
            else if($i%3==1){
                $title = $row['title'];
                $img ="data/".$title.".1/0.png";
                $url ="background-image: url(http://127.0.0.1:9999/bookshelf/include/$img);";
                $name = "http://127.0.0.1:9999/bookshelf/include/data/".$userid."/".$title.".1";
                $var=$var."<div class='row'><div class='loc'><div class='column'><div class='sample thumb1 cover' name='$title' style='$url'></div><div class='delete-icon' name='$title'></div></div>";
            }
            else{
                $title = $row['title'];
                $img ="data/".$title.".1/0.png";
                $url ="background-image: url(http://127.0.0.1:9999/bookshelf/include/$img);";
                $name = "http://127.0.0.1:9999/bookshelf/include/data/".$userid."/".$title.".1";
                $var=$var."<div class='column'><div class='sample thumb2 cover' name='$title' style='$url'></div><div class='delete-icon' name='$title'></div></div>";
            }
        }    
        mysql_close($bd2);
        echo $var;
?>