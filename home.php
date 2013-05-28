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
    <meta name="description" content="Play Chess Online.">  
    <link rel="icon" href="./book-library.png">
    <link rel="stylesheet" href="stylesheets/reset.css">
    <link rel="stylesheet" href="stylesheets/layout.css">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/defaults.css">
    <link rel="stylesheet" href="stylesheets/book.css">
    <script src="scripts/jquery-1.8.3.min.js"></script>
    <script src="scripts/jquery-ui-1.8.23.custom.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/jquery.mousewheel.min.js"></script>
    <script src="scripts/turn.js"></script>
    <script src="scripts/turn.min.js"></script>
<!--     <script type="text/javascript" src="scripts/bookshelf.js"></script>
<script type="text/javascript" src="scripts/zoom.min.js"></script> -->
    <script type="text/javascript" src="scripts/book.js"></script>
</head>
<body>
	
	<div class="splash">
		<div id="logout"><a href="./include/logout.php">Sign Out</a></div>
	<div class="center">
	<div class="details">
		<i class="turnjs"></i>
		<h1>Read Book</h1>
		<ul>
			<li>It's Greate</li>
			<li>Help you be smarter</li>
<!-- 			<li title="Minimized and Gzipped">Lightweight, 10K</li>
 -->		</ul>
		<!-- <p class="production">
			<a href="get" class="get-now">Get now</a>
		</p>
		<div class="options">
			<p><i class="icon development"></i> <a href="get">Get Development Version</a></p>
			<p><i class="icon github"></i> <a href="http://www.github.com/blasten/turn.js">Fork on GitHub</a> </p>
		</div> -->
	</div>

	<div class="bookshelf">
		<div class="shelf">
			<div class="row-1">
				<div class="loc">
					<div> <div class="sample thumb1 cover" sample="steve-jobs"></div> </div>
					<div> <div class="sample thumb2" sample="html5"></div> </div>
					<div> <div class="sample thumb3" sample="docs"></div> </div>
				</div>
			</div>
			<div class="row-2">
				<div class="loc">
					<div> <div class="sample thumb4" sample="magazine1"></div> </div>
					<div> <div class="sample thumb5" sample="magazine2"></div> </div>
					<div> <div class="sample thumb6" sample="magazine3"></div> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- Samples-->
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
						<div ignore="1" class="next-button"></div>
						<!-- Previous button -->
						<div ignore="1" class="previous-button"></div>
					</div>
				</div>
			</div>
			<div id="magazine" class="centerStart">
				<div id="page1" class="page">
    				<div class="img1">
        <!-- The pageNum span can be either on the left, or the right if the page
        is odd/even. -->
        				<span class="pageNum right">
            				1 // 32
        				</span>
        				<img src="http://b.hiphotos.baidu.com/album/w%3D2048/sign=1a560359f31fbe091c5ec4145f580d33/64380cd7912397ddc0d9a42b5882b2b7d0a28778.jpg" alt="Cover" />
    				</div>
			</div>
			<div id="page2" class="page">
    			<div class="img2">
        			<span class="pageNum left">
            			2 // 32
       				</span>
        		<img src="http://jpp1.imghb.com/pic/pic/68/70/79/1397377668707913_a602x602.jpg" alt="Little tulips" />
    		</div>
			</div>
			<div id="page3" class="page">
			 	<div class="img3">
			        <span class="pageNum right">
			            3 // 32
			        </span>
			        <img src="http://jpp2.imghb.com/pic/pic/96/64/95/1400679996649546_a602x602.jpg" alt="My style" />
			    </div>
			</div>
			</div>
			</div>
		<div id="slider-bar" class="turnjs-slider">
			<div id="slider"></div>
		</div>

	</div>

<!-- End samples -->
</div>
</div>
	
</body>
</html>