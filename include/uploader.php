<?php
$fp = fopen("1.txt","w+");
fwrite($fp, "test");
fclose($fp);
if(count($_FILES)>0) {
        if( move_uploaded_file( $_FILES['upload']['tmp_name'] , $upload_folder.'/'.$_FILES['upload']['name'] ) ) {
                echo 'done';
                 $fp = fopen("test.txt","w+");
        fwrite($fp, "binary");
fclose($fp);
        }
        exit();
} else if(isset($_GET['up'])) {
        if(isset($_GET['base64'])) {
                $content = base64_decode(file_get_contents('php://input'));
        } else {
                $content = file_get_contents('php://input');
        }
        $headers = getallheaders();
        $headers = array_change_key_case($headers, CASE_UPPER);
        $name = $headers['UP-FILENAME'];
        $type = $headers['UP-TYPE'];
        $size = $headers['UP-SIZE'];
        session_start();
        $userid = $_SESSION['userid'];
        $file = "data/".$userid."/$name";
        mkdir($file);
        $fp = fopen($file, "w+");
        fwrite($fp, $content);
        fclose($fp);
     //    $mysql_hostname = "localhost";
    	// $mysql_user = "root";
    	// $mysql_password = "zsq001";
   		// $mysql_database = "db_book";
   		// $bd2 = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)or die(mysql_error());
    	// mysql_select_db($mysql_database, $bd2) or die(mysql_error());
     //    $sql="INSERT into books(userid,data,type,name,size) values('$userid','$content','$type','$name','$size')";
     //    mysql_query($sql) or die(mysql_error());
     //    mysql_close($bd2);
        exit();
}
?>