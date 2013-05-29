//ajax show books
// var xmlhttp;

// function loadbook(url, func) {
// 	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
// 		xmlhttp = new XMLHttpRequest();
// 	} else { // code for IE6, IE5
// 		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
// 	}
// 	xmlhttp.onreadystatechange = func;
// 	xmlhttp.open("GET", url);
// 	xmlhttp.send();
// }
// function loadtitle(){
// 	var url = "../include/book.php?cover=true";
// 	loadbook(url,function(){
// 		if(xmlhttp.readyState==4 && xmlhttp.status, func)
// 	});
// }
// function loadcover(){
// 	var url ="../include/book.php?cover=true";
// 	loadbook(url,function(){
// 		if(xmlhttp.readyState==4&&xmlhttp.status==200){
// 			$(".shelf").append(xmlhttp.responseText);
// 			$('.shelf').append("<div class='row'>
// 				<div class='loc'>
// 					<div> <div class='sample thumb4' sample='magazine1'></div> </div>
// 					<div> <div class='sample thumb5' sample='magazine2'></div> </div>
// 					<div> <div class='sample thumb6' sample='magazine3'></div> </div>
// 				</div>
// 			</div>");
// 		}
// 	});
// }

// $('.shelf').append("<div class='row-5'>
// 				<div class='loc'>
// 					<div> <div class='sample thumb4' sample='magazine1'></div> </div>
// 					<div> <div class='sample thumb5' sample='magazine2'></div> </div>
// 					<div> <div class='sample thumb6' sample='magazine3'></div> </div>
// 				</div>
// 			</div>");
function loadtitle(){
	alert("3");
	var url ="../include/book.php";
	$.post(url,function(data){
		alert(data);
	});
	alert("4");
}


//turn.js special effects
$(document).ready(function() {
	$(".cover").click(function() {
		if ($("#openbook").css("display") == "none") {
			$("#openbook").css("z-index", "100");
			//$("#openbook").css("display", "block");
			//$("#openbook").css("background-color","red");
			$("#openbook").slideDown(1000);
		}
	});
	$(".quit").click(function(){
		//$("#openbook").css("display","none");
		$("#openbook").fadeOut(1000);
	});
	//loadtitle();
//$('.shelf').append("<div class='row'><div class='loc'><div> <div class='sample thumb4' sample='magazine1'></div> </div>></div></div>");

});

$(function(){

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

$('.magazine-viewport').zoom({
		flipbook: $('.viewport'),
		max: function() { 
			
			return largeMagazineWidth()/$('.viewport').width();

		}, 
		when: {
			tap: function(event) {

				if ($(this).zoom('value')==1) {
					$('.viewport').
						removeClass('animated').
						addClass('zoom-in');
					$(this).zoom('zoomIn', event);
				} else {
					$(this).zoom('zoomOut');
				}
			},

			resize: function(event, scale, page, pageElement) {

				if (scale==1)
					loadSmallPage(page, pageElement);
				else
					loadLargePage(page, pageElement);

			},

			zoomIn: function () {
				
				$('.thumbnails').hide();
				$('.made').hide();
				$('.viewport').addClass('zoom-in');

				if (!window.escTip && !$.isTouch) {
					escTip = true;

					$('<div />', {'class': 'esc'}).
						html('<div>Press ESC to exit</div>').
							appendTo($('body')).
							delay(2000).
							animate({opacity:0}, 500, function() {
								$(this).remove();
							});
				}
			},

			zoomOut: function () {

				$('.esc').hide();
				$('.thumbnails').fadeIn();
				$('.made').fadeIn();

				setTimeout(function(){
					$('.viewport').addClass('animated').removeClass('zoom-in');
					resizeViewport();
				}, 0);

			},

			swipeLeft: function() {

				$('.viewport').turn('next');

			},

			swipeRight: function() {
				
				$('.viewport').turn('previous');

			}
		}
	});