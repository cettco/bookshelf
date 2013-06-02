function turnjs(){

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

}
//turnjs();

//turn.js special effects
	$(".cover").click(function() {

		//turnjs();
		var mytitle = $(this).attr('name');
		var url = "http://127.0.0.1:9999/bookshelf/include/show.php";
		$("#book-wrapper").load(url,{title:mytitle});
        //alert($("#book-wrapper").html());
        //alert($("#openbook").text());
		if ($("#openbook").css("display") == "none") {
			$("#openbook").css("z-index", "100");
			$("#openbook").slideDown(1000);
		}
	});
	$(".quit").click(function(){
		//$("#openbook").css("display","none");
		$("#openbook").fadeOut(1000);
        $("#book-wrapper").empty();
	});