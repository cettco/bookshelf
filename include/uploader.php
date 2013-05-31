<?php
$fp = fopen("1.txt","w+");
fwrite($fp, "test");
fclose($fp);
 function getPageTotal($path){
    
        // 打开文件
        if (!$fp = fopen($path,'r')) {
            $error = "failed";
            return false;
        }
        else {
            $max=0;
            while(!feof($fp)) {
                $line = fgets($fp,255);
                if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                    preg_match('/[0-9]+/',$matches[0], $matches2);
                    if ($max<$matches2[0]) $max=$matches2[0];
                     }
                }
             fclose($fp);
            // 返回页数
                return $max;
            }
        }
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
        $fp = fopen($file, "w+");
        fwrite($fp, $content);
        fclose($fp);
        $folder = $file.".1";
        mkdir($folder);
        $num = getPageTotal($file);
        $title =$userid."/".$name;
        require('./config.php');
        $sql="INSERT into books(userid,title,page) values('$userid','$title','$num')";
        mysql_query($sql) or die(mysql_error());

        for($i=0;$i<$num;$i++){
            $cmd ="convert ".$file."[".$i."] "."$folder/".$i.".png";
            exec($cmd);
        }
        exit();
}
?>