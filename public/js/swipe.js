var pageWidth = window.innerWidth || document.body.clientWidth;
var treshold = Math.max(1,Math.floor(0.01 * (pageWidth)));
var touchstartX = 0;
var touchstartY = 0;
var touchendX = 0;
var touchendY = 0;

const limit = Math.tan(45 * 1.5 / 180 * Math.PI);
const gestureZone = document.getElementById('sidebar');
const gestureZone1 = document.getElementById('content');
const gestureZone2 = document.getElementById('overlay');

gestureZone.addEventListener('touchstart', function(event) {
    touchstartX = event.changedTouches[0].screenX;
    touchstartY = event.changedTouches[0].screenY;
}, false);

gestureZone1.addEventListener('touchstart', function(event) {
    touchstartX = event.changedTouches[0].screenX;
    touchstartY = event.changedTouches[0].screenY;
}, false);

gestureZone2.addEventListener('touchstart', function(event) {
    touchstartX = event.changedTouches[0].screenX;
    touchstartY = event.changedTouches[0].screenY;
}, false);

gestureZone.addEventListener('touchend', function(event) {
    touchendX = event.changedTouches[0].screenX;
    touchendY = event.changedTouches[0].screenY;
    handleGesture(event);
}, false);

gestureZone1.addEventListener('touchend', function(event) {
    touchendX = event.changedTouches[0].screenX;
    touchendY = event.changedTouches[0].screenY;
    handleGesture1(event);
}, false);

gestureZone2.addEventListener('touchend', function(event) {
    touchendX = event.changedTouches[0].screenX;
    touchendY = event.changedTouches[0].screenY;
    handleGesture2(event);
}, false);

function handleGesture(e) {
    var x = touchendX - touchstartX;
    var y = touchendY - touchstartY;
    var xy = Math.abs(x / y);
    var yx = Math.abs(y / x);
    if (Math.abs(x) > treshold || Math.abs(y) > treshold) {
        if (yx <= limit) {
            if (x < 0) {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $("body").css("overflow","auto");
            }
        }
    }
}
function handleGesture1(e) {
    var x = touchendX - touchstartX;
    var y = touchendY - touchstartY;
    var xy = Math.abs(x / y);
    var yx = Math.abs(y / x);
    if (Math.abs(x) > treshold || Math.abs(y) > treshold) {
        if (yx <= limit) {
            if (x < 0) {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $("body").css("overflow","auto");
            } else {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $("body").css("overflow","hidden");
                $("body").scrollTop(0);
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            }
        }
    }
}
function handleGesture2(e) {
    var x = touchendX - touchstartX;
    var y = touchendY - touchstartY;
    var xy = Math.abs(x / y);
    var yx = Math.abs(y / x);
    if (Math.abs(x) > treshold || Math.abs(y) > treshold) {
        if (yx <= limit) {
            if (x < 0) {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $("body").css("overflow","auto");
            }
        }
    }
}