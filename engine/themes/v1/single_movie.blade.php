@extends(config('tmdb.theme').'.layouts')

@section('footer')
    <script src="{{ asset('/assets/v1/js/s.js') }}"></script>
@endsection

@section('content')
    <section class="px-4r">
        <div class="backdrop" style="background-image: url({{ $backdrop }})"></div>
        <div class="container">
            @include(config('tmdb.theme').'._player', ['backdrop' => $backdrop, 'video' => asset('/assets/v1/video/movie.mp4')])
            <script>var playDuration = 129*60;</script>
        </div>
        <div class="container py-4">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a href="{{ Mopie::route('loading', ['id' => $movie->getID() ,'title' => $movie->getOriginalTitle()]) }}" class="btn btn-outline-theme mx-1">{{ __('utilities.watch_now') }} <i class="fa fa-film" aria-hidden="true"></i></a>
                    <a href="{{ Mopie::route('loading', ['id' => $movie->getID() ,'title' => $movie->getOriginalTitle()]) }}" class="btn btn-outline-theme mx-1">{{ __('utilities.download') }} <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-3">
                        <img class="img-fluid" src="{{ Mopie::imgPoster($movie->getPoster()) }}" alt="Poster {{ $movie->getTitle() }} {{ $movie->getYear() }}" title="Poster {{ $movie->getTitle() }} {{ $movie->getYear() }}">
                    </div>
                    <div class="col-md-10 col-sm-8 col-9">
                        <div class="entry-title d-flex flex-column-reverse flex-md-row justify-content-between">
                            <h1 class="h2">{{ $movie->getTitle() }} <span class="tiny text-muted">{{ $movie->getYear() }}</span></h1>
                            <div class="sub-r">
                                <a href="{{ Mopie::route('loading', ['id' => $movie->getID() ,'title' => $movie->getOriginalTitle()]) }}" class="btn subs">{{ __('utilities.subscribe_watch') }}</a>
                            </div>
                        </div>
                        <div class="entry-info mb-3">
                            <div class="__rate">
                                @for ($i = 0; $i < 10; $i++)
                                    @if ($i < round($movie->getVoteAverage()))
                                        <i class="fa fa-star text-warning"></i>
                                    @else
                                        <i class="fa fa-star-o text-muted"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="__info">
                                <span class="text-muted small">{{ $movie->getVoteAverage() }}/10</span> <span class="text-muted small">{{ __('utilities.by') }} {{ $movie->getVoteCount() }} {{ __('utilities.users') }}</span>
                            </div>
                        </div>
                        <div class="entry-desciption text-muted">
                            <p>{{ $movie->getOverview() }}</p>
                        </div>
                        <div class="entry-table">
                            <ul>
                                <li>{{ __('utilities.released') }}: <span>{{ $movie->getReleaseDate() }}</span></li>
                                <li>{{ __('utilities.runtime') }}: <span>{{ $movie->getRuntime() }} {{ __('utilities.minutes') }}</span></li>
                                <li>{{ __('utilities.genre') }}: <span>{!! $movie->getGenreComma() !!}</span></li>
                                <li>{{ __('utilities.stars') }}: <span>{!! $movie->getStarComma(5) !!}</span></li>
                                <li>{{ __('utilities.director') }}: <span>{!! $movie->getDirectorComma(5) !!}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
        <div class="h6">{{ __('utilities.download') }} : <strong class="text-color-theme">MKV</strong></div>
        <ul class="down-list mb-4">
            <li>
                <div class="dt"><strong>360p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>480p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>720p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>1080p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
        </ul>
        <div class="h6">{{ __('utilities.download') }} : <strong class="text-color-theme">MP4</strong></div>
        <ul class="down-list">
            <li>
                <div class="dt"><strong>360p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>480p</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>MP4HD</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
            <li>
                <div class="dt"><strong>FULLHD</strong></div>
                <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
            </li>
        </ul>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="h4">{{ __('section.title.movie_similar') }}</h3>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach ($movie->getSimilars() as $item)
                @include(config('tmdb.theme').'._item_movie', ['class' => ''])
            @endforeach
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="h4">{{ __('section.title.movie_recommendation') }}</h3>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach ($movie->getRecommendations() as $item)
                @include(config('tmdb.theme').'._item_movie', ['class' => ''])
            @endforeach
        </div>
    </section>

    @include(config('tmdb.theme').'._modal_watch', ['backdrop' => $backdrop, 'id' => $movie->getID(), 'title' => $movie->getOriginalTitle()])
@endsection

