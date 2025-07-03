import videojs from 'video.js';
import DisableProgressBar from 'videojs-disable-progress-bar';

var mopiePlayer =  videojs('play-video');
var firstClick = true;
mopiePlayer.duration = function() {return playDuration;}

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
