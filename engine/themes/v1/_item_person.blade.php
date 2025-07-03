<article id="{{ $item->getID() }}" class="item {{ $class }}">
    <div class="thumb mb-4">
        <a href="{{ Mopie::route('people.single', ['id' => $item->getID()]) }}" rel="bookmark">
            <div class="_img_holder">
                <img class="img-fluid rounded" src="{{ Mopie::imgPoster($item->getProfilePath()) }}" alt="Image {{ $item->getName() }}">
                <div class="_overlay_link">
                    {{-- <button class="play-button play-button--small" type="button"></button> --}}
                    <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white">{{ $item->getPopularity() }}</span></div>
                </div>
            </div>
        </a>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="{{ Mopie::route('people.single', ['id' => $item->getID()]) }}" class="_title" rel="bookmark">{{ $item->getName() }}</a>
            </h2>
        </header>
    </div>
</article>
