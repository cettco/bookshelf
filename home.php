<?php
session_start();
if(isset($_SESSION['username'])){
	//echo $_SESSION['username'];
}
else{
	header("location:./index.php");
}
?>
<html>
<head>
	    <title>Read Book</title>  
	    <meta http-equiv="Content-Type" content="text/html; utf-8" />
    <meta name="description" content="Play Chess Online.">  
    <link rel="icon" href="./book-library.png">
    <link rel="stylesheet" href="stylesheets/reset.css">
    <link rel="stylesheet" href="stylesheets/layout.css">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/defaults.css">
    <link rel="stylesheet" href="stylesheets/book.css">
    <script src="scripts/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/jquery.mousewheel.min.js"></script>
    <script src="scripts/turn.js"></script>
    <script src="scripts/turn.min.js"></script>
    <script type="text/javascript" src="scripts/upload.js"></script>
    <script type="text/javascript" src="scripts/book.js"></script>
</head>
<body onload="new uploader('drop', 'status', 'include/uploader.php', null);">
	
	<div class="splash">
		<div id="logout"><a href="./include/logout.php">Sign Out</a></div>
	<div class="center">
	<div class="details">
		<i class="turnjs"></i>
		<h1>Read Book</h1>
		<ul>
			<li>It's Greate</li>
			<li>Help you be smarter</li>
			<li>Drag file to this area</li>
<!-- 			<li title="Minimized and Gzipped">Lightweight, 10K</li>
 -->	</ul>
 		<div id="box">
 			<div id="status"></div>
 			<div id="drop"></div>
 		</div>
		
	</div>

	
	<div id='right'>
	<div class="bookshelf">
		<div class="shelf">
			<?php
			require("./include/book.php");
			?>
		</div>
	</div>
	<!-- Samples-->
	<!-- <div class="samples" id="openbook">
		<div class="bar">
			<div class="share">
				<i class="icon table-contents" title="Table of contents"></i>
				<i class="icon zoom-in" title="Zoom in"></i>
				<i class="icon share-facebook" title="Share on facebook"></i>
				<i class="icon share-twitter" title="Share on Twitter"></i>
				<i class="icon share-plus" title="Share on G+"></i>
				<i class="icon share-pinterest" title="Share on Pinterest"></i>
			</div>
			<a class="icon quit"></a>
		</div>
		<div id="book-wrapper">
			<div class="magazine-viewport">
				<div class="container">
					<div class="viewport">
						Next button
						<div ignore="1" class="next-button">next-button</div>
						Previous button
						<div ignore="1" class="previous-button"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="slider-bar" class="turnjs-slider">
			<div id="slider"></div>
		</div>
	
	</div> -->
</div>
<!-- end end -->
<!-- End samples -->
	<div class="samples" id="openbook">
		<div class="bar">
			<div class="share">
				<i class="icon table-contents" title="Table of contents"></i>
				<i class="icon zoom-in" title="Zoom in"></i>
				<i class="icon share-facebook" title="Share on facebook"></i>
				<i class="icon share-twitter" title="Share on Twitter"></i>
				<i class="icon share-plus" title="Share on G+"></i>
				<i class="icon share-pinterest" title="Share on Pinterest"></i>
			</div>
			<a class="icon quit"></a>
		</div>
		<div id="book-wrapper">
			<div class="magazine-viewport">
				<div class="container">
					<div class="viewport">
						<!-- Next button -->
						<div ignore="1" class="next-button">next-button</div>
						<!-- Previous button -->
						<div ignore="1" class="previous-button"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="slider-bar" class="turnjs-slider">
			<div id="slider"></div>
		</div>

	</div>
</div>
</div>
	
</body>
</html>