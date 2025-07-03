<div id="player-1" class="row">
    <div class="embed-responsive embed-responsive-16by9">
        <video id="play-video" class="video-js vjs-16-9 vjs-big-play-centered" controls="" preload="none" width="600" height="315" poster="{{ $backdrop }}" data-setup="" webkit-playsinline="true" playsinline="true">
            <source src="{{ $video }}" type="video/mp4" label="SD">
            <source src="{{ $video }}" type="video/mp4" label="HD">
            <track kind="subtitles" src="" srclang="en" label="English">
            <track kind="subtitles" src="" srclang="fr" label="French">
            <track kind="subtitles" src="" srclang="de" label="Germany">
            <track kind="subtitles" src="" srclang="nl" label="Netherland">
            <track kind="subtitles" src="" srclang="it" label="Italy">
        </video>
    </div>
</div>
