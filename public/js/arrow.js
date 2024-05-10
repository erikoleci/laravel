var box = $(".box-inner"), x;


var hovered = false;
var loop = window.setInterval(function () {
    if (hovered) {
        // ...
    }
}, 250);

var clicks=0;

var scrollSize=450;
var windowWidth=$( "table" ).width();
var maxClicks=Math.floor(windowWidth/scrollSize);
console.log('wwidth: ', windowWidth, 'scrolls: ', scrollSize, 'maxClicks: ',maxClicks);
$(".arrow").click(


    function() {
        if ($(this).hasClass("arrow-right")) {
            if (clicks<maxClicks){
                clicks=clicks+1;
            }
            else{
                $('#arrowRight').css('display','none');
            }

            if ($(this).scrollLeft){
                $('#arrowLeft').css('display','inline-block');
            }
            console.log(clicks);

            x = ((box.width()));
            // console.log('im right');
            box.animate({scrollLeft: scrollSize*clicks}
            )
        } else {
            if (clicks>=1){
                clicks=clicks-1;
                $('#arrowRight').css('display','inline-block');

            }
            if (clicks===0){
                $('#arrowLeft').css('display','none');
            }
            // clicks=clicks-1;

            // console.log('im left');
            x = ((box.width()));
            box.animate({
                    scrollLeft: scrollSize*clicks,
                }
            )
        }
    }
)
