<?php
session_start();
$fp = fopen("show.txt","w+");
//fclose($fp);
$title = $_POST['title'];
$userid = $_SESSION['userid'];
fwrite($fp, "begin".$title.$userid);
require('config.php');
$sql = "SELECT page from books where userid='$userid' and title='$title'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$num =intval($row['page']);
fwrite($fp, $row['page']);
fclose($fp);
?>
<html>
<head>
	<script src="../scripts/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../scripts/turn.js"></script>
	<link rel="stylesheet" href="../stylesheets/book.css">
</head>
<body>
	<div id="magazine">
	<?php
	for($i=0;$i<$num;$i++){
	?>
	<div id="page<?=$i+1?>" class="page" class="centerStart">
		<div class="img<?=$i+1?>">
			<img src="include/data/<?=$title?>.1/<?=$i?>.png">
		</div>
	</div>
	<?php
}
	?>
	</div>
	<script type="text/javascript">

	$(document).ready(function(){
		 var mag = $('#magazine');

    // initiazlie turn.js on the #magazine div
    mag.turn();

    // turn.js defines its own events. We are listening
    // for the turned event so we can center the magazine
    mag.bind('turned', function(e, page, pageObj) {

        if(page == 1 && $(this).data('done')){
            mag.addClass('centerStart').removeClass('centerEnd');
        }
        else if (page == 32 && $(this).data('done')){
            mag.addClass('centerEnd').removeClass('centerStart');
        }
        else {
            mag.removeClass('centerStart centerEnd');
        }

    });

    setTimeout(function(){
        // Leave some time for the plugin to
        // initialize, then show the magazine
        mag.fadeTo(500,1);
    },1000);

    $(window).bind('keydown', function(e){

        // listen for arrow keys

        if (e.keyCode == 37){
            mag.turn('previous');
        }
        else if (e.keyCode==39){
            mag.turn('next');
        }

    });
	});
	
	</script>
</body>
</html>