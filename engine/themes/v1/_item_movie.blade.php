<article id="{{ $item->getID() }}" class="item {{ $class }}">
    <div class="thumb mb-4">
        <a href="{{ Mopie::route('movie.single',['id' => $item->getID(), 'slug' => str_slug($item->getOriginalTitle())]) }}" rel="bookmark" title="{{ $item->getTitle() }} ({{ $item->getYear() }})">
            <div class="_img_holder">
                <img class="img-fluid rounded" src="{{ Mopie::imgPoster($item->getPoster()) }}" alt="Image {{ $item->getTitle() }}" title="Image {{ $item->getTitle() }} ({{ $item->getYear() }})">
                <div class="_overlay_link">
                    <button class="play-button play-button--small" type="button"></button>
                    <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white">{{ $item->getVoteAverage() }}/10</span></div>
                </div>
            </div>
        </a>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="{{ Mopie::route('movie.single',['id' => $item->getID(), 'slug' => str_slug($item->getOriginalTitle())]) }}" class="_title" rel="bookmark" title="{{ $item->getTitle() }} ({{ $item->getYear() }})">{{ $item->getTitle() }} ({{ $item->getYear() }})</a>
            </h2>
        </header>
    </div>
</article>
