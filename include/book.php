<?php
		$userid = $_SESSION['userid'];
        $mysql_hostname = "localhost";
    	$mysql_user = "root";
    	$mysql_password = "zsq001";
   		$mysql_database = "db_book";
   		$bd2 = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)or die(mysql_error());
    	mysql_select_db($mysql_database, $bd2) or die(mysql_error());
    	$userid = $_SESSION['userid'];
    	$sql = "SELECT name FROM books WHERE userid='$userid'";
    	$result = mysql_query($sql) or die(mysql_error());
    	$count = mysql_num_rows($result);
    	$m = 1;
    	$var = "";
    	for($i = 1;$i<=$count;$i++){
    		$row = mysql_fetch_array($result);
    		if($i%3==0){
    			$title = $row['name'];
    			$var=$var."<div><div class='sample thumb3'>$title</div></div></div></div>";
    			$m++;
    		}
    		else if($i%3==1){
    			$title = $row['name'];
    			$var=$var."<div class='row'><div class='loc'><div><div class='sample thumb2'>$title</div></div>";
    		}
    		else{
    			$title = $row['name'];
    			$var=$var."<div><div class='sample thumb2'>$title</div></div>";
    		}
    	}	
        mysql_close($bd2);
        echo $var;
?>