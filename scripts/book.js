function turnjs() {

    var mag = $('#magazine');

    // initiazlie turn.js on the #magazine div
    mag.turn();

    // turn.js defines its own events. We are listening
    // for the turned event so we can center the magazine
    mag.bind('turned', function(e, page, pageObj) {

        if (page == 1 && $(this).data('done')) {
            mag.addClass('centerStart').removeClass('centerEnd');
        } else if (page == 32 && $(this).data('done')) {
            mag.addClass('centerEnd').removeClass('centerStart');
        } else {
            mag.removeClass('centerStart centerEnd');
        }

    });

    setTimeout(function() {
        // Leave some time for the plugin to
        // initialize, then show the magazine
        mag.fadeTo(500, 1);
    }, 1000);

    $(window).bind('keydown', function(e) {

        // listen for arrow keys

        if (e.keyCode == 37) {
            mag.turn('previous');
        } else if (e.keyCode == 39) {
            mag.turn('next');
        }

    });

}
//turnjs();

//turn.js special effects
$(document).ready(function() {
    $(".cover").click(function() {

        //turnjs();
        var mytitle = $(this).attr('name');

        var url = "http://127.0.0.1:9999/bookshelf/include/show.php";
        $("#book-wrapper").load(url, {
            title: mytitle
        });

        if ($("#openbook").css("display") == "none") {
            $("#openbook").css("z-index", "100");
            //$("#openbook").css("display", "block");
            //$("#openbook").css("background-color","red");
            $("#openbook").slideDown(1000);
        }
    });
    $(".quit").click(function() {
        //$("#openbook").css("display","none");
        $("#openbook").fadeOut(1000);
        $("#book-wrapper").empty();
    });

    $(function() {
        var dragSrcEl = null;

        function handleDragStart(e) {

            dragSrcEl = this;

            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDragOver(e) {
            //alert("over");
            if (e.preventDefault) {
                e.preventDefault(); // Necessary. Allows us to drop.
            }

            e.dataTransfer.dropEffect = 'move'; // See the section on the DataTransfer object.

            return false;
        }

        function handleDragEnter(e) {
            // this / e.target is the current hover target.
            //alert("endter");
            this.classList.add('over');
        }

        function handleDragLeave(e) {
            //alert("leaver");
            this.classList.remove('over'); // this / e.target is previous target element.
        }

        function handleDrop(e) {

            if (e.stopPropagation) {
                e.stopPropagation(); // Stops some browsers from redirecting.
            }

            // Don't do anything if dropping the same column we're dragging.
            if (dragSrcEl != this) {
                // Set the source column's HTML to the HTML of the column we dropped on.
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
                $.getScript("http://127.0.0.1:9999/bookshelf/scripts/updatebook.js");
            }

            return false;
        }

        function handleDragEnd(e) {
            [].forEach.call(cols, function(col) {
                col.classList.remove('over');
            });
        }

        var cols = document.querySelectorAll('.column');
        [].forEach.call(cols, function(col) {
            col.addEventListener('dragstart', handleDragStart, false);
            col.addEventListener('dragenter', handleDragEnter, false);
            col.addEventListener('dragover', handleDragOver, false);
            col.addEventListener('dragleave', handleDragLeave, false);
            col.addEventListener('drop', handleDrop, false);
            col.addEventListener('dragend', handleDragEnd, false);
        });
    });
});