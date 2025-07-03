import videojs from 'video.js';
import DisableProgressBar from 'videojs-disable-progress-bar';

var mopiePlayer =  videojs('play-video');
var firstClick = true;

mopiePlayer.duration = function() {
    return 129*60;
}

mopiePlayer.on('timeupdate', function(){
    if (firstClick) {
        if (mopiePlayer.currentTime() >= 6) {
            firstClick = false;
            $('#modal-watch').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
            mopiePlayer.exitFullscreen();
            mopiePlayer.exitFullWindow();
        }
    }
})

mopiePlayer.DisableProgressBar().disable();

$(".down-list>li>span").click(function() {
    $('#modal-watch').modal({
        show: true,
        keyboard: false,
        backdrop: 'static'
    });
})
